<?php
require_once('../core/initialize.php');
require_once('../core/order_functions.php');
require_once('../core/auth_functions.php');

$admin = check_login();

# Выбираем, какой заказ будет подхвачен корзиной tpl/basket.php
# Если не получен $order_id, то корзиной будет автоматически подхвачен заказ из сессии
# $order_id может быть только у заказа из базы, в скрипте коризны он имеет приоритет перед сессией
# $order_id получаем из GET['order_id']
if(isset($_GET['order_id']) && !empty($_GET['order_id'])) {
    $order_id = $_GET['order_id'];
}

// работа с сессией (заказ пользователя без авторизации)
if(isset($_SESSION['order'])) {
    $order = $_SESSION['order'];
}

// работа с базой (существующий заказ у залогиненного админа)
if(isset($order_id)) {
    $order = find_order_by_id($order_id);
}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo url_for(WWW_CSS . '/main.css'); ?>">
    <link rel="stylesheet" href="<?php echo url_for(WWW_CSS . '/order.css'); ?>">
    <link rel="stylesheet" href="<?php echo url_for(WWW_CSS . '/datepicker.css'); ?>">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo url_for(WWW_IMG . '/favicon.ico'); ?>">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
    <script src="<?php echo url_for(WWW_JS . '/datepicker.js'); ?>"></script>
    <title>Order</title>
</head>
<body>
<div class="wrapper">
    
    <!-- Выбор товара -->
    <?php include(TPL_PATH . '/inventory_list.php'); ?>

    <!-- Центральная часть -->
    <div class="page-block grow">

        <!--Корзина -->
        <h2>Корзина</h2>
        <?php include(TPL_PATH . '/basket.php'); ?>

        <!-- История заказов -->
        <?php # include('tpl/order_history.php'); ?>
    
    </div class="page-block">

    <!-- форма логина и отображение имени пользователя -->
    <?php # include('tpl/login_menu.php'); ?>

    <!-- Правая часть -->
    <div class="page-block">

        <!-- список всех заказов -->
        <h2>Список заказов</h2>
        <p style="text-align: center;"><?php echo $admin['username']; ?></p>
        <?php include(TPL_PATH . '/order_list.php'); ?>
    </div class="page-block">

</div>
</body>
<script src="<?php echo url_for(WWW_JS . '/order.js'); ?>"></script>
</html>