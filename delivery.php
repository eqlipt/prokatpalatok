<?php

require_once('core/initialize.php'); 
$page_title = "Стоимость доставки: Прокат палаток в Санкт-Петербурге";
$page_keywords = "прокат палаток доставка, прокат снаряжения доставка";
$page_description = "Прокат палаток: стоимость доставки";
$page_breadcrumbs = '<a href="' . WWW_ROOT . '/howto.php' . '">Как арендовать</a>' . ' > Доставка';
$page_content_class = "infopage";
include(TPL_PATH . '/header.php');
include(TPL_PATH . '/left.php');

?>

<!-- center -->
<section id="center">
    <article>
        <h1>Стоимость доставки снаряжения в Санкт-Петербурге и Ленобласти</h1>
        <div class="card text-block padding-block">
            <p>Московский, Фрунзенский,  Кировский: 600 - 800 ₽*</p>
        </div>

        <div class="card text-block padding-block">
            <p>Адмиралтейский, Центральный, Петроградский, Василеостровский, Невский, Красносельский, Пушкинский: 800 - 1 000 ₽*</p>
        </div>

        <div class="card text-block padding-block">
            <p>Выборгский, Калининский, Красногвардейский, Приморский, Павловский, Колпинский: 1 000 - 1 800 ₽*</p>
        </div>

        <div class="card text-block padding-block">
            <p>Доставка за пределами КАД: 800 ₽ + 50 ₽/км**</p>
        </div>
        <br>
        <p class="sub light-yellow">* Доставка осуществляется при заказе от <?php echo PRICE_DELIVERY_THRESHOLD_CITY; ?> ₽. Сумма варьируется в пределах района.</p>
        <p class="sub light-yellow">** Доставка осуществляется при заказе от <?php echo PRICE_DELIVERY_THRESHOLD_SUBURBS; ?> ₽.</p>
    </article>
    <!--article>
        <h1 id="section_novgorod">Стоимость доставки снаряжения в Великом Новгороде и Новгородской области</h1>
        <p class="sub light-yellow">Доставка осуществляется при заказе от 3000 ₽</p>
        <div class="card text-block padding-block">
            <p>Привокзальный, Западный, Псковский, Центральный: 500 ₽</p>
        </div>

        <div class="card text-block padding-block">
            <p>Григорово, Кречивицы, Панковка, Сырково, Трубичино: 800 ₽</p>
        </div>

        <div class="card text-block padding-block">
            <p>Доставка по Новгородской области: 500 ₽ + 50 ₽/км.</p>
        </div>
    </article-->
</section>
<!-- /center -->

<?php include(TPL_PATH . '/right.php'); ?>
<?php include(TPL_PATH . '/footer.php'); ?>