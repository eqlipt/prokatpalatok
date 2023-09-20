<?php

if(!isset($order)) {
// заказ не выбран и корзина пуста
    echo "Ещё нет товаров в корзине";

} else {
// заказ существует
?>

<!-- начало формы -->
<!-- передаём в process.php данные о заказе -->
<form action="process.php" method="post">

    <!-- передаём в process.php номера заказа order_id -->
    <input type="hidden" name="order_id" value="<?php echo (isset($order['id']) ? $order['id'] : ""); ?>">

<div id="table-actions">
    <!-- шапка таблицы -->
    <table id="table-products">
        <tr>
            <td colspan="3">
                <!-- отображение номера и статуса заказа -->
                <h4><?php echo 'Заказ № ' . $order['id'] . ': ' . $status = find_status_by_status_id($order['status_id']); ?></h4>
            </td>
            <!-- единицы измерения -->
            <td style="text-align: center;">шт</td>
            <td></td>
            <td style="text-align: center;">прокат</td>
            <td style="text-align: center;">залог</td>
        </tr>

    <?php

    // выделяем переменные для подсчёта стоимости второго и последующих дней проката
    $day2price = 0;
    $day3price = 0;
    // проверяем есть ли в заказе товары
    if(not_empty($order['inventory'])) {
    // товары есть

        // формируем массив с товарами
        $inventory = unserialize($order['inventory']);
        // для каджого товара из корзины формируем строку таблицы
        foreach($inventory as $inventory_id => $quantity) {
            $inventory_item = find_inventory_by_id($inventory_id);
            $category = find_category_by_id($inventory_item['category_id']);

            // в зависимости от срока проката подсчитываем полную стоимость за единицу товара
            $price = calculate_price($inventory_id, $order['duration']);

            // подсчитываем стоимость второго и последующих дней проката для всех товаров
            $day2price += $inventory_item['price2'] * $quantity;
            $day3price += $inventory_item['price3'] * $quantity;

            // в зависимости от количества товара подсчитываем стоимость залога за всё количество данного товара
            $deposit = calculate_deposit($inventory_id, $quantity);
        ?>

        <!-- тело таблицы -->
        <tr>
            <td class="button-placeholder">
                <!-- поле действия по удалению товара -->
                <!-- [remove] => inventory_id -->
                <button type="submit" class="img-placeholder" name="remove" value="<?php echo $inventory_item['id']; ?>"><img class="button" src="<?php echo url_for(WWW_IMG . '/inventory/' . $inventory_item['inventory_item_img_path'] . '_160.jpg'); ?>"></button>
            </td>

            <td class="name">
                <!-- наименование товара -->
                <a href="<?php echo url_for('/' . $category['path'] . '/' . $inventory_item['path'] . '/'); ?>" target="new"><?php echo $inventory_item['name']; ?></a>
            </td>

            <td class="button">
                <!-- кнопка уменьшения количества товара -->
                <!-- minus-button-[inventory_id] -->
                <button type="button" id="minus-button-<?php echo $inventory_item['id']; ?>">-</button>
            </td>

            <td>
                <!-- поле ввода количества товара -->
                <!-- [inventory_id] => quantity -->
                <input type="text" id="<?php echo $inventory_item['id']; ?>" name="<?php echo $inventory_item['id']; ?>" value="<?php echo h($quantity); ?>">
            </td>

            <td class="button">
                <!-- кнопка увеличения количества товара -->
                <!-- plus-button-[inventory_id] -->
                <button type="button" id="plus-button-<?php echo $inventory_item['id']; ?>">+</button>
            </td>

            <td class="main-text">
                <!-- стоимость проката -->
                <?php echo $price * $quantity; ?>
            </td>

            <td class="main-text">
                <!-- стоимость залога -->
                <?php echo $deposit; ?>
            </td>
        </tr>
        <?php } 
    } else { 
    // заказ есть, но товаров в корзине нет
    ?>
        <tr>
            <td>Корзина пуста</td>
        <tr>
    <?php } ?>

    <!-- Итог корзины -->
        <tr>
            <!-- строка выбора срока проката -->
            <td colspan="2">
                <h4>Длительность: / Итого:</h4>
            </td>

            <td class="button">
                <!-- кнопка уменьшения количества дней -->
                <!-- minus-button-duration -->
                <button type="button" id="minus-button-duration">-</button>
            </td>

            <td style="height: 20px;">
                <!-- поле ввода срока проката -->
                <!-- [duration] => days -->
                <input id="duration" type="text" name="duration" value="<?php echo h($order['duration']); ?>">
            </td>

            <td class="button">
                <!-- кнопка увеличения количества дней -->
                <!-- plus-button-duration -->
                <button type="button" id="plus-button-duration">+</button>
            </td>

            <!-- общая стоимость -->
            <td class="result-cell">
                <!-- проката -->
                <h4 class="result-text"><?php echo $order['price']; ?></h4>
            </td>
            <td class="result-cell">
                <!-- залога -->
                <h4 class="result-text"><?php echo $order['deposit']; ?></h4>
            </td>
        </tr>
    </table>

    <!-- блок действий с заказом -->
    <div class="basket-actions">
        <!-- кнопка пересчёта стоимости коризны (submit всех полей формы с меткой recount) -->
        <!-- [recount] => recount -->
        <button type="submit" name="recount" value="recount">Пересчитать</button>

        <!-- кнопка вывода квитанции (submit всех полей формы с меткой receipt) -->
        <!-- [receipt] => receipt -->
        <button type="submit" name="receipt" value="receipt">Квитанция</button>

        <!-- кнопка повторения заказа (submit всех полей формы с меткой repeat) -->
        <!-- [repeat] => repeat -->
        <button type="submit" name="repeat" value="<?php echo h($order['id']); ?>">Повторить</button>

        <!-- кнопка нового заказа (submit всех полей формы с меткой new) -->
        <!-- [new] => new -->
        <button type="submit" name="new" value="new">Новый заказ</button>
    </div>
    <div class="basket-actions">
        <!-- кнопка открыть заказ (submit всех полей формы с меткой open) -->
        <!-- [open] => open -->
        <?php if($order['status_id'] == 6 || $order['status_id'] == 0) {
            echo '<button type="submit" name="open" value="open">Открыть</button>';
        } ?>

        <!-- кнопка отменить заказ (submit всех полей формы с меткой cancel) -->
        <!-- [cancel] => cancel -->
        <?php if($order['status_id'] != 0) {
        	echo '<button type="submit" name="cancel" value="cancel">Отменить</button>';
				} ?>
        <!-- кнопка бронь (submit всех полей формы с меткой book) -->
        <!-- [book] => book -->
        <?php if($order['status_id'] == 1) {        
            echo '<button type="submit" name="book" value="book">Бронь</button>';
        } ?>
        
        <!-- кнопка В прокате (submit всех полей формы с меткой active) -->
        <!-- [active] => active -->
        <?php if($order['status_id'] != 3) {        
            echo '<button type="submit" name="active" value="active">В прокате</button>';
        } ?>

        <!-- кнопка повреждение (submit всех полей формы с меткой damage) -->
        <!-- [damage] => damage -->
        <?php if(($order['status_id'] != 1) && ($order['status_id'] != 2) && ($order['status_id'] != 4)) {
            echo '<button type="submit" name="damage" value="damage">Повреждения</button>';
        } ?>

        <!-- кнопка недоимки (submit всех полей формы с меткой unfinish) -->
        <!-- [unfinish] => unfinish -->
        <?php if(($order['status_id'] != 1) && ($order['status_id'] != 2) && ($order['status_id'] != 5)) {
            echo '<button type="submit" name="unfinish" value="unfinish">Недоимка</button>';
        } ?>

        <!-- кнопка завершения заказа (submit всех полей формы с меткой finish) -->
        <!-- [finish] => finish -->
        <?php if($order['status_id'] != 6) { 
            echo '<button type="submit" name="finish" value="finish">Завершить</button>';
        } ?>
    </div>
</div>

<!-- блок данных о клиенте -->
<div id="customer-data">
    <div id="customer-data__left">
        <p>Имя:</p>
        <p>Телефон:</p>
        <p>Адрес:</p>
        <p>Комментарий:</p>
        <p>Предоплата:</p>
    </div>
    <div id="customer-data__right">
        <div id="customer-data__right-name">
            <input id="returning" type="checkbox" name="customer_returning"<?php echo $order['customer_returning'] == 1 ? ' checked' : ''; ?>>
            <input id="name" type="text" name="customer_name" value="<?php echo isset($order['customer_name']) ? h($order['customer_name']) : ''; ?>">
        </div>
        <input id="phone" type="text" name="customer_tel" value="<?php echo isset($order['customer_tel']) ? h($order['customer_tel']) : ''; ?>"><br>
        <input id="address" type="text" name="customer_address" value="<?php echo isset($order['customer_address']) ? h($order['customer_address']) : ''; ?>">
        <input id="comment" type="text" name="comment" value="<?php echo isset($order['comment']) ? h($order['comment']) : ''; ?>">
        <input id="upfront" type="text" name="upfront" value="<?php echo isset($order['upfront']) ? h($order['upfront']) : ''; ?>">
    </div>
</div>

    <div id="bottom-part">
        <!-- Календарь -->
        <input type="hidden" id="dates" name="dates" data-multiple-dates-separator=" - " class="datepicker-here" value="<?php echo $order['start_date'] . ' - ' . $order['end_date']; ?>"/>

        <!-- Памятка -->
<textarea><?php echo '🔑 Заказ №' . $order['id'] . ' в сервисе prokatpalatok.ru пункт в Купчино

📆 Даты проката: ' . date('d/m', strtotime($order['start_date'])) . ' - ' . date('d/m', strtotime($order['end_date'])) . ' (' . $order['duration'] . ' сут.)

⛺' . "\r\n";
//Если заказ не пустой
if(isset($inventory)) {
    //Перечисляем инвентарь
    foreach($inventory as $inventory_id => $quantity) {
        $inventory_item = find_inventory_by_id($inventory_id);
        $price = calculate_price($inventory_id, $order['duration']);
        $deposit = calculate_deposit($inventory_id, $quantity);
        $order_item = $inventory_item['name_order'];
        if($inventory_item['name_order'] === 'Доставка' && isset($order['customer_address'])) $order_item .= ' ' . $order['customer_address'];
        $order_item .= ' - ' . $quantity . ' шт: ' . number_format(($price * $quantity), 0, '', ' ') . ' ₽
';        
        echo $order_item; 

    }
}
echo  "\r\n" . '💵 Итого: ' . number_format($order['price'], 0, '', ' ') . ' ₽'; ?>


<?php echo '🔄 Стоимость продления проката: ';
    if($order['duration'] == 1) {
        echo number_format($day2price, 0, '', ' ') . ' ₽ за вторые сутки и ';
    }
    echo number_format($day3price, 0, '', ' ') . ' ₽ за каждые последующие сутки.';
?>


<?php echo '💰 Залог'; if($order['customer_returning'] == 1){echo ' не требуется.';} else {echo ': ' . number_format(($order['deposit']/10), 0, '', ' ') . ' ₽ с документом / ' .  number_format($order['deposit'], 0, '', ' ') . ' ₽ без документа.';} ?>

<?php if($order['customer_returning'] != 1) {echo 'Документы для залога: загранпаспорт, водительские права, военный билет.
';}?>

<?php echo '💳 Предоплата для бронирования: '; echo number_format(round($order['price']*0.3, -2), 0, '', ' '); echo ' ₽
Карта Сбербанк на имя Алексей Дмитриевич К. привязана к номеру ' . $admin['telephone']; ?>

<?php // echo 'Номер карты для предоплаты: 4817 7603 3383 8583 на имя Алексей Дмитриевич К.'; ?>
<?php echo  "\r\n" . '----------------------------------------------------------------------------------------------------' . "\r\n"; ?>

<?php if($order['upfront'] != '0') {
	echo '💵 ';
	echo not_empty($order['customer_name']) ? $order['customer_name'] . ', платёж ' : 'Платёж '; echo number_format(($order['upfront']), 0, '', ' '); echo ' ₽ пришёл, бронь подтверждаем.' . "\n";
	if($order['upfront'] == $order['price']) {
		echo 'Заказ оплачен полностью.';
		if( $order['customer_returning'] != 1 ) { echo ' При получении потребуется только оставить залог.'; }
	}
	else {
		echo 'К оплате при получении: ' . number_format( ( $order['price'] - $order['upfront'] ), 0, '', ' ' ) . ' ₽'; if( $order['customer_returning'] != 1 ) { echo ' + залог.' . "\r\n"; }
	}
}
?>

<?php echo '📍 Адрес: ' . $admin['address'] . $admin['apt_address'] . "\r\n"; ?>

<?php echo '🕗 Режим работы: ' . CONTACTS_WORKING_HOURS_KUPCHINO . "\r\n"; ?>

<?php echo '📲 Перед визитом, пожалуйста, позвоните за час.';?>

<?php echo $admin['telephone'];?>

<?php echo  "\r\n" . '----------------------------------------------------------------------------------------------------' . "\r\n"; ?>

<?php echo 'Принята оплата: ' . number_format( ( $order['price'] - $order['upfront'] ), 0, '', ' ' ) . ' ₽' . "\n" . 'Принят залог: военный билет / загран паспорт / водительские права + ' . number_format(($order['deposit']/10), 0, '', ' ') . ' ₽'; ?>

<?php /*if(isset($inventory)) {
    echo 'При задержке с возвратом снаряжения просим уведомить нас. Стоимость продления проката составит ';
    if($order['duration'] == 1) {
        echo number_format($day2price, 0, '', ' ') . ' ₽ за вторые сутки и ';
    }
    echo number_format($day3price, 0, '', ' ') . ' ₽ за каждые последующие сутки.';
} */?>

<?php echo (not_empty($order['customer_name']) ? $order['customer_name'] . ', в' : 'В') .' следующий раз можно без залога, напомните, что уже брали у нас.' . "\r\n"; ?>
<?php echo 'Буду рад отзыву Вконтакте https://vk.com/topic-53310491_28269369 или в Гугле https://g.page/r/CbwB0yi40pLcEBI/review' . "\r\n";?>

<?php echo (not_empty($order['customer_name']) ? $order['customer_name'] . ', благодарим' : 'Благодарим') . ' за бережное обращение со снаряжением. При следующих арендах залог не требуется.' . "\r\n"; ?>
<?php echo 'Будем рады Вашему отзыву о прокате: Вконтакте https://vk.com/topic-53310491_28269369 или в Гугле https://g.page/r/CbwB0yi40pLcEBI/review';?>
</textarea></div>
</form>
<?php } ?>