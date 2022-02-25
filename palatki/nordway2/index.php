<?php

require_once('../../core/initialize.php'); 
$page_title = "Палатка Nordway Dome 2: Прокат палаток в Санкт-Петербурге";
$page_keywords = "палатка двухместная прокат, палатка 2 прокат, палатка 2 аренда, легкая палатка аренда, маленькая палатка аренда, палатка для двоих прокат, Nordway Dome 2 прокат, Nordway Dome 2 аренда";
$page_description = "Прокат двухместной палатки Nordway Dome 2. Характеристики, стоимость, залог";
$page_breadcrumbs = '<a href="' . WWW_ROOT . '">Снаряжение</a>' . ' > Палатка Nordway 2';
$page_content_class = "infopage";

$page_inventory_h1 = "Прокат двухместной палатки Nordway Dome 2";
$page_inventory_images = array("inv1", "scheme", "inv2", "inv3", "inv4", "inv5");
$page_inventory_image_alt = "Nordway Dome 2";
$page_inventory_price1 = 400;
$page_inventory_price2 = 200;
$page_inventory_price3 = 100;
$page_inventory_deposit1 = 3000;
$page_inventory_deposit2 = 300;
$page_inventory_description = '<p>Походная палатка для одного или двух человек. Компактная и лёгкая в собранном виде. Небольшой тамбур при входе, антимоскитная сетка на двери. Выдерживает умеренный дождь.</p>
<p>Простота сборки: средняя, ~10 мин.</p>
<p>На сайте производителя: <a href="https://www.sportmaster.ru/product/1193657/">https://www.sportmaster.ru/product/1193657/</a></p>';
$page_inventory_technical = "<p>Модель: Nordway Dome 2</p>
<p>Ширина: 140 см</p>
<p>Длина: 270 см</p>
<p>Высота: 115 см</p>
<p>Размер в сложенном виде (дл. х шир. х выс.):	58 x 16 x 16 см</p>
<p>Водостойкость тента: 2000 мм водного столба</p>
<p>Вес: 3,65 кг</p>";

include(TPL_PATH . '/header.php');
include(TPL_PATH . '/left.php');
include(TPL_PATH . '/inventory.php');
include(TPL_PATH . '/right.php');
include(TPL_PATH . '/footer.php');
?>