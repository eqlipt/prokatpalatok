<?php
require_once('../core/initialize.php');
require_once('../core/order_functions.php');
require_once('../core/auth_functions.php');

$admin = check_login();

// работаем только с конкретным заказом из базы
if(!isset($_GET['order_id']) || !is_numeric($_GET['order_id']) || $_GET['order_id'] == 0) {
    redirect_to(url_for('admin/order.php'));
} else {
    $order = find_order_by_id($_GET['order_id']);
}

?>

<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
        <link rel="stylesheet" type="text/css" href="<?php echo url_for(WWW_CSS . '/receipt.css'); ?>">
    </head>
    <body>
        <p class="header">www.prokatpalatok.ru</p>
        <h1>Заказ № <?php echo $order['id']; ?></h1>
        <h2>Перечень снаряжения</h2>
        <table>
            <thead>
                <tr>
                    <th>Наименование снаряжения</th> <th>Кол-во<br>(шт.)</th> <th>Стоимость<br>проката (руб.)</th> <th>Залоговая<br>стоимость (руб.)</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach(unserialize($order['inventory']) as $inventory_id => $quantity) {
                        $inventory_item = find_inventory_by_id($inventory_id);
                        $price = calculate_price($inventory_id, $order['duration']);
                        $deposit = calculate_deposit($inventory_id, $quantity);
                        echo
                            '<tr>
                                <td>' . $inventory_item['name'] . '</td>
                                <td>' . $quantity . '</td>
                                <td>' . number_format(($price * $quantity), 0, '', ' ') . '</td>
                                <td>' . number_format(($inventory_item['deposit'] * $quantity), 0, '', ' ') . '</td>
                            </tr>';
                    }
                ?>
                <tr>
                    <td colspan="4">Период проката: <?php echo $order['duration']; ?> сут. (<?php echo date('d/m', strtotime($order['start_date'])); ?> – <?php echo date('d/m', strtotime($order['end_date'])); ?>)</td>
                </tr>
                <tr>
                    <td colspan="2">ИТОГО:</td> <td> <?php echo number_format($order['price'], 0, '', ' '); ?> </td> <td> <?php echo number_format($order['deposit'], 0, '', ' '); ?> </td>
                </tr>
            <tbody>
        </table><br>

        <h3>Принято от арендатора</h3><br>

        <div class='container'>
            <div class='row'>
                <div class='label'>Документ:</div>
                <div class='underline'></div>
            </div>
            <div class='row'>
                <div class='label'>Оплата проката:</div>
                <div class='underline'><?php echo ($order['upfront'] . ' ₽ (предоплата)') ?? ''; ?></div>
            </div>
            <div class='row'>
                <div class='label'>Залог:</div>
                <div class='underline'></div>
            </div>
        </div>

        <div class='sides'>
            <div>
                <h4>Арендодатель</h4>
                <p>Пункт проката «Прокат Палаток»<br>
                г. Санкт-Петербург,<br>
                <?php echo $admin['address']; ?><br>
                www.prokatpalatok.ru<br>
                <?php echo $admin['telephone']; ?></p>
            </div>
            <div>
                <h4>Арендатор</h4>
                <p>ФИО: <?php echo $order['customer_name']; ?></p><br>
                <p>тел.: <?php echo $order['customer_tel']; ?></p><br>
                <p>Адрес доставки: <?php echo $order['customer_address']; ?></p>
            </div>
        </div>

        <p class='center'>ПОДПИСИ СТОРОН:</p><br><br>

        <div class='signatures'>
            <div></div>
            <div></div>
        </div>

    </body>
</html>