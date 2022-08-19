<?php

require_once('core/initialize.php'); 
$page_title = "Наши преимущества: Прокат палаток в Санкт-Петербурге";
$page_keywords = "честный прокат, качественный прокат, прокат качественного снаряжения, хорошее снаряжение, хорошая палатка прокат, аренда хорошей палатки, арендовать качественную палатку, качественное снаряжение";
$page_description = "Конкурентные преимущества Проката палаток: качественное снаряжение, удобная оплата, доставка, скидки, маста для отдыха";
$page_breadcrumbs = "Наши преимущества";
$page_content_class = "infopage";
$to_include = '<!-- Splide script & stylesheet -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>
<style>
.splide__arrow--prev {
    left: -2.5em;
}
.splide__arrow--next {
    right: -2.5em;
}
@media(max-width:880px) {
    .splide__arrow--prev,
    .splide__arrow--next {
        display: none;
    }
}
</style>';
include(TPL_PATH . '/header.php');
include(TPL_PATH . '/left.php');

?>

    <!-- center -->			
    <section id="center">
        <article>
            <div class="grid grid-infopage">
                <h1>Почему выбирают Прокат палаток</h1>
                <div class="card sticker">
                    <img src="<?php echo url_for(WWW_IMG . '/buttons/tent.jpg'); ?>"/>
                    <p>Для Проката палаток мы подбираем только качественное снаряжение, которое сами берём в походы.</p>
                </div>
                <div class="card sticker">
                    <img src="<?php echo url_for(WWW_IMG . '/buttons/watch.jpg'); ?>"/>
                    <p>В Прокате палаток нет расчётного часа. Вы можете вернуть снаржение до 21:00, независимо от того, в какое время взяли его в прокат.</p>
                </div>
                <div class="card sticker">
                    <img src="<?php echo url_for(WWW_IMG . '/buttons/map.jpg'); ?>"/>
                    <p>В Прокате палаток мы посоветуем, куда можно поехать с палаткой и где провести мероприятие.</p>
                </div>
                <div class="card sticker">
                    <img src="<?php echo url_for(WWW_IMG . '/buttons/v.jpg'); ?>"/>
                    <p>Прокат палаток проверяет всё снаряжение перед сдачей в аренду. Наше снаряжение в хорошем состоянии и всегда обслужено.</p>
                </div>
                <div class="card sticker">
                    <img src="<?php echo url_for(WWW_IMG . '/buttons/support.jpg'); ?>"/>
                    <p>Если не получается установить палатку - звоните, объясним.</p>
                </div>
                <div class="card sticker">
                    <img src="<?php echo url_for(WWW_IMG . '/buttons/guarantee2.jpg'); ?>"/>
                    <p>Прокат Палаток даёт 100% гарантию качества обслуживания: если Вам не понравится снаряжение или сервис – мы вернём Вам деньги.</p>
                </div>
                <div class="card sticker">
                    <img src="<?php echo url_for(WWW_IMG . '/buttons/watch.jpg'); ?>"/>
                    <p>В Прокате палаток сутки проката - это не 24 часа, а почти 48. Берите снаряжение утром, возвращайте вечером следующего дня.</p>
                </div>
                <div class="card sticker">
                    <img src="<?php echo url_for(WWW_IMG . '/buttons/gift.jpg'); ?>"/>
                    <p>Прокат палаток дарит скидку 5% к Вашему дню рождения. Узнайте про все <a href="<?php echo url_for('/pay.php'); ?>">скидки</a> в Прокате палаток.</p>
                </div>
                <div class="card sticker">
                    <img src="<?php echo url_for(WWW_IMG . '/buttons/car.jpg'); ?>"/>
                    <p>Прокат палаток осуществляет <a href="<?php echo url_for('/delivery.php'); ?>">доставку</a> и монтаж снаряжения в Санкт-Петербурге и Ленобласти.</p>
                </div>
            </div>

            <h2 style="margin: 40px 0 20px 0;">Нам доверяют</h2>
            <div id="secondary-slider" class="splide">
                <div class="splide__track">
                    <ul class="splide__list">
                        <li class="splide__slide">
                            <a href="https://beefzavod.com/" target="new"><img src="img/logo/partners/part9.jpg"></a>
                        </li>
                        <li class="splide__slide">
                            <a href="https://advita.ru/" target="new"><img src="img/logo/partners/part8.jpg"></a>
                        </li>
                        <li class="splide__slide">
                            <a href="http://www.aledo-pro.ru" target="new"><img src="img/logo/partners/part7.jpg"></a>
                        </li>
                        <li class="splide__slide">
                            <a href="http://www.loyaltyplant.com" target="new"><img src="img/logo/partners/part3.jpg"></a>
                        </li>
                        <li class="splide__slide">
                            <a href="http://www.lenfilm.ru" target="new"><img src="img/logo/partners/part1.jpg"></a>
                        </li>
                        <li class="splide__slide">
                            <a href="https://vk.com/club11220199" target="new"><img src="img/logo/partners/part4.jpg"></a>
                        </li>
                        <li class="splide__slide">
                            <a href="http://camp4rest.ru/" target="new"><img src="img/logo/partners/part5.jpg"></a>
                        </li>
                        <li class="splide__slide">
                            <a href="https://www.lenalpsport.ru" target="new"><img src="img/logo/partners/part6.jpg"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </article>
    </section>
    <!-- /center -->
    <script>
    document.addEventListener( 'DOMContentLoaded', function () {
        new Splide( '#secondary-slider', {
            padding: {
                left: '5px',
            },
            perMove: 3,
            perPage: 6,
            breakpoints: {
                1370: {
                    perPage: 5,
                    perMove: 2,
                },
                1220: {
                    perPage: 4,
                    perMove: 2,
                },
                1050: {
                    perPage: 3,
                    perMove: 2,
                },
                880: {
                    perPage: 5,
                    perMove: 2,
                },
                720: {
                    perPage: 4,
                    perMove: 2,
                },
                570: {
                    perPage: 3,
                    perMove: 2,
                },
                440: {
                    perPage: 2,
                    perMove: 1,
                },
                280: {
                    perPage: 1,
                    perMove: 1,
                },
            },
            rewind    : false,
            pagination: false,
        } ).mount();
    } );
    </script>
<?php include(TPL_PATH . '/right.php'); ?>
<?php include(TPL_PATH . '/footer.php'); ?>