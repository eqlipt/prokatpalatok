<?php
require_once('../core/initialize.php');
require_once('../core/order_functions.php');

# страница работает только в фоновом режиме
if(!is_post_request()) {
    redirect_to(url_for('admin/order.php'));
}

# запрос на пересчёт и запрос на квитанцию
# квитанция подразумевает пересчёт и редирект на страницу квитанции
if(isset($_POST['recount']) || isset($_POST['receipt'])) {

    // определяем квитанция или просто пересчёт
    $receipt = isset($_POST['receipt']) ?? '';

    // обновляем данные о заказе на основе данных из формы
    $order = update_order_data($_POST);

    // апдейтим корзину
    update_basket($order);

    // при работе с сессией просто редирект - всё будет подхвачено автоматически
    if(isset($_SESSION['order'])) {
        redirect_to(url_for('admin/order.php'));
    // при работе с базой передаём id заказа
    } else {
        if($receipt) {redirect_to(url_for('admin/receipt.php?order_id=' . $order['id']));}
        else {redirect_to(url_for('admin/order.php?order_id=' . $order['id']));}
    }
}

# запрос на удаление из корзины
if(isset($_POST['remove'])) {

    $order['id'] = $_POST['order_id'];

    // обновляем данные о заказе на основе данных из формы
    $order = update_order_data($_POST);

    // апдейтим корзину
    update_basket($order);

    // при работе с сессией просто редирект - всё будет подхвачено автоматически
    if(isset($_SESSION['order'])) {
        redirect_to(url_for('order.php'));
    // при работе с базой передаём id заказа
    } else {
        redirect_to(url_for('admin/order.php?order_id=' . $order['id']));
    }
}

# запрос на добавление в корзину
if(isset($_POST['add'])) {
    
    // назначаем в переменную id добавляемого товара
    $inventory_to_add = $_POST['add'];

    # если пользователь залогинен - работаем с базой, если нет - работаем с сессией
    // если пользователь залогинен
    if(isset($_SESSION['admin_id'])) {

        //проверяем, работаем ли с конкретным заказом
        if(isset($_POST['order_id']) && !empty($_POST['order_id'])) {

            // достаём заказ из базы
            $order = find_order_by_id($_POST['order_id']);

            // выбираем массив с товарами
            $inventory_in_basket = unserialize($order['inventory']);

            // если в корзине уже есть конкретно этот товар
            if(in_basket($inventory_to_add, $inventory_in_basket)) {         

                // добавляем единицу к существующему для данного товара значению количества
                $inventory_in_basket[$inventory_to_add] += 1;

            // в корзине нет этого товара
            } else {
                // добавляем в существующий массив назначенный товар в количестве одного
                $inventory_in_basket += array($_POST['add'] => 1);
            }

            // сортируем и упаковываем массив с товаром
            $order['inventory'] = prepare_inventory_for_basket($inventory_in_basket);

            // пересчитываем стоимость всего заказа и залог
            $order['price'] = calculate_total_price($inventory_in_basket, $order['duration']);
            $order['deposit'] = calculate_total_deposit($inventory_in_basket);

            // апдейтим корзину (в базе)
            update_basket($order);
            redirect_to(url_for('admin/order.php?order_id=' . $_POST['order_id']));

        // работаем с новым заказом
        } else {
            
            // создаём новый заказ в базе
            $admin_id = $_SESSION['admin_id'];
            $order['inventory'] = serialize(array($inventory_to_add => 1));
            $order['price'] = calculate_price($inventory_to_add);
            $order['deposit'] = calculate_deposit($inventory_to_add, 1);
            $order['duration'] = '2';
            $order_id = create_order($admin_id, $order);
            redirect_to(url_for('admin/order.php?order_id=' . $order_id));
        }
    }

    // пользователь не залогинен, в сессии открытая корзина
    else if(isset($_SESSION['order'])) {
        $order = $_SESSION['order'];
        // в активном заказе выбираем массив с товарами
        $inventory_in_basket = unserialize($order['inventory']);

        // если в корзине уже есть конкретно этот товар
        if(in_basket($inventory_to_add, $inventory_in_basket)) {         

            // добавляем единицу к существующему для данного товара значению количества
            $inventory_in_basket[$inventory_to_add] += 1;

        // в корзине нет этого товара
        } else {
            // добавляем в существующий массив назначенный товар в количестве одного
            $inventory_in_basket += array($inventory_to_add => 1);
        }

        // сортируем и упаковываем массив с товаром
        $order['inventory'] = prepare_inventory_for_basket($inventory_in_basket);

        // подсчёт общей стоимости проката
        $order['price'] = calculate_total_price($inventory_in_basket, $order['duration']);
        
        // подсчёт общей стоимости залога
        $order['deposit'] = calculate_total_deposit($inventory_in_basket);

        // апдейтим корзину
        update_basket($order);
        redirect_to(url_for('admin/order.php'));
    
    // пользователь не залогинен, корзина не существует
    } else {
        // создаём новый активный заказ в сессии
        $order['id'] = 'Новый заказ';
        $order['inventory'] = serialize(array($inventory_to_add => 1));
        $order['duration'] = '2';
        $order['price'] = calculate_price($inventory_to_add);
        $order['deposit'] = calculate_deposit($inventory_to_add, 1);
        $_SESSION['order'] = $order;
        redirect_to(url_for('admin/order.php'));
    }
}

# запрос на повторение заказа
if(isset($_POST['repeat'])) {

    // выбираем нужный заказ по id
    $order = find_order_by_id($_POST['repeat']);
    
    // создаём на основе выбранного заказа аналогичный новый
    $order_id = create_order($_SESSION['admin_id'], $order);
    redirect_to(url_for('admin/order.php?order_id=' . $order_id));
}

# запрос на редактирование заказа
if(isset($_POST['edit'])) {
    redirect_to(url_for('admin/order.php?order_id=' . $_POST['edit']));
}

# запрос на открытие заказа
if(isset($_POST['open'])) {

    // если работаем с залогиненным пользователем (следовательно - заказ из базы)
    if(isset($_SESSION['admin_id'])) {

        // ставим статус "планируется"
        update_status($_POST['order_id'], 1);
        redirect_to(url_for('admin/order.php?order_id=' . $_POST['order_id']));
    
    // если пользователь не залогинен
    } else {
        // перевести на форму регистрации/логина
        redirect_to(url_for('admin/login.php'));
    }
}

# запрос на бронирование заказа
if(isset($_POST['book'])) {

    // если работаем с залогиненным пользователем (следовательно - заказ из базы)
    if(isset($_SESSION['admin_id'])) {

        // ставим статус "планируется"
        update_status($_POST['order_id'], 2);
        redirect_to(url_for('admin/order.php?order_id=' . $_POST['order_id']));
    
    // если пользователь не залогинен
    } else {
        // перевести на форму регистрации/логина
        redirect_to(url_for('admin/login.php'));
    }
}

# запрос на статус заказа "в прокате"
if(isset($_POST['active'])) {

    // если работаем с залогиненным пользователем (следовательно - заказ из базы)
    if(isset($_SESSION['admin_id'])) {

        // ставим статус "в прокате"
        update_status($_POST['order_id'], 3);
        redirect_to(url_for('admin/order.php?order_id=' . $_POST['order_id']));
    
    // если пользователь не залогинен
    } else {
        // перевести на форму регистрации/логина
        redirect_to(url_for('admin/login.php'));
    }
}

# запрос на завершение заказа
if(isset($_POST['finish'])) {

    // если работаем с залогиненным пользователем (следовательно - заказ из базы)
    if(isset($_SESSION['admin_id'])) {

        // закрываем заказ как завершённый
        update_status($_POST['order_id'], 6);
        redirect_to(url_for('admin/order.php'));
    
    // если пользователь не залогинен
    } else {
        // перевести на форму регистрации/логина
        redirect_to(url_for('admin/login.php'));
    }
}

# запрос на изменение статуса заказа: "недоимка"
if(isset($_POST['unfinish'])) {

    // если работаем с залогиненным пользователем (следовательно - заказ из базы)
    if(isset($_SESSION['admin_id'])) {

        // устанавливаем статус 5
        update_status($_POST['order_id'], 5);
        redirect_to(url_for('admin/order.php?order_id=' . $_POST['order_id']));
    
    // если пользователь не залогинен
    } else {
        // перевести на форму регистрации/логина
        redirect_to(url_for('admin/login.php'));
    }
}

# запрос на изменение статуса заказа: "поверждение" 
if(isset($_POST['damage'])) {

    // если работаем с залогиненным пользователем (следовательно - заказ из базы)
    if(isset($_SESSION['admin_id'])) {

        // устанавливаем статус 4
        update_status($_POST['order_id'], 4);
        redirect_to(url_for('admin/order.php?order_id=' . $_POST['order_id']));
    
    // если пользователь не залогинен
    } else {
        // перевести на форму регистрации/логина
        redirect_to(url_for('admin/login.php'));
    }
}

# запрос на отмену заказа
if(isset($_POST['cancel'])) {

    // если работаем с залогиненным пользователем (следовательно - заказ из базы)
    if(isset($_SESSION['admin_id'])) {

        // устанавливаем статус 0
        update_status($_POST['order_id'], 0);
        redirect_to(url_for('admin/order.php?order_id=' . $_POST['order_id']));
    
    // если пользователь не залогинен
    } else {
        // перевести на форму регистрации/логина
        redirect_to(url_for('admin/login.php'));
    }
}

# запрос на новый заказ
if(isset($_POST['new'])) {

    // если работаем с залогиненным пользователем (следовательно - заказ из базы)
    if(isset($_SESSION['admin_id'])) {

        redirect_to(url_for('admin/order.php'));
    
    // если пользователь не залогинен
    } else {
        // перевести на форму регистрации/логина
        redirect_to(url_for('admin/login.php'));
    }
}