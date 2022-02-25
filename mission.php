<?php

require_once('core/initialize.php'); 
$page_title = "Миссия и ценности Проката палаток в Санкт-Петербурге";
$page_keywords = "миссия проката палаток, ценности проката палаток, убеждения проката палаток";
$page_description = "Миссия и ценности Проката палаток";
$page_breadcrumbs = "Миссия и ценности";
$page_content_class = "infopage";
include(TPL_PATH . '/header.php');
include(TPL_PATH . '/left.php');

?>
<!-- center -->
<section id="center">
    <article>
        <h1>Миссия и ценности Проката палаток</h1>
        <div class="card text-block padding-block">
            <div>
                <img class="button" src="<?php echo url_for(WWW_IMG . '/buttons/stopwatch.png'); ?>"/>
                <h2>Миссия</h2>
            </div>
            <div>
                <p>Миссия Проката палаток — сделать отдых с палаткой доступным, а подбор и аренду снаряжения быстрыми и удобными.</p>
            </div>
        </div>
        <div class="card text-block padding-block" id="zalog">
            <div>
                <img class="button" src="<?php echo url_for(WWW_IMG . '/buttons/gem.png'); ?>"/>
                <h2>Доступность</h2>
            </div>
            <div>
                <p>Арендовать всегда значительно дешевле, нежели покупать. Особенно, если вы собираетесь воспользоваться снаряжением всего 1-2 раза в сезон. Экономится место под хранение снаряжения. Не нужно после каждого похода чистить и стирать снаряжение, а в случае поломок — ремонтировать или искать мастерскую.</p>
            </div>
        </div>
        <div class="card text-block padding-block">
            <div>
                <img class="button" src="<?php echo url_for(WWW_IMG . '/buttons/lock.png'); ?>"/>
                <h2>Удобство</h2>
            </div>
            <div>
                <p>Пункты Проката палаток располагаются на основных выездах из города и работают с 9 утра до 9 вечера. При необходимости возможна доставка снаряжения.</p>
            </div>
        </div>
        <div class="card text-block padding-block">
            <div>
                <img class="button" src="<?php echo url_for(WWW_IMG . '/buttons/coin.png'); ?>"/>
                <h2>Комфорт</h2>
            </div>
            <div>
                <p>Мы подбираем для проката только высококачественное разнообразное снаряжение под любые запросы и компании. Наше снаряжение всегда исправное, чистое, не имеет посторонних запахов.</p>
            </div>
        </div>
        <div class="card text-block padding-block">
            <div>
                <img class="button" src="<?php echo url_for(WWW_IMG . '/buttons/car.png'); ?>"/>
                <h2>Быстрота</h2>
            </div>
            <div>
                <p> Выбор снаряжения интуитивно прост, а при необходимости мы всегда посоветуем снаряжение именно под ваши задачи. Оформление проходит быстро, оплата — любым удобным способом.</p>
            </div>
        </div>
    </article>
</section>
<!-- /center -->

<?php include(TPL_PATH . '/right.php'); ?>
<?php include(TPL_PATH . '/footer.php'); ?>