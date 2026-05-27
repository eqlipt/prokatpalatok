<?php

require_once('../core/initialize.php'); 
$page_title = "Палаточный лагерь: Прокат палаток в Санкт-Петербурге";
$page_keywords = "палаточный лагерь под ключ, организация палаточного лагеря, установить палаточный лагерь, арендовать палаточный лагерь";
$page_description = "Организация палаточного лагеря любой сложности под ключ в ленобласти. Оснащение, доставка, установка, демонтаж";
$page_breadcrumbs = "Палаточный лагерь";
$page_content_class = "infopage";
$up_arrow_url = url_for(WWW_IMG . '/up-arrow.svg');

// css
$aux_css_url = url_for(WWW_CSS . '/infopage.css');
$to_include = '<link rel="stylesheet" type="text/css" href="' . $aux_css_url . '">';

include(TPL_PATH . '/header.php');
include(TPL_PATH . '/left.php');

?>

<!-- center -->
<section id="center">
    <article>
        <h1>Организация палаточного лагеря</h1>
        <div class="showcase">
            <a href="<?php echo url_for(WWW_IMG . '/camping/camping01.jpg'); ?>" onclick="return viewer.show(0)">
            <img class="box saturate" alt="Палаточный лагерь" src="<?php echo url_for(WWW_IMG . '/camping/camping01.jpg'); ?>"></a>
            <a href="<?php echo url_for(WWW_IMG . '/camping/camping02.jpg'); ?>" onclick="return viewer.show(1)">
            <img class="box saturate" alt="Палаточный лагерь" src="<?php echo url_for(WWW_IMG . '/camping/camping02.jpg'); ?>"></a>
            <a href="<?php echo url_for(WWW_IMG . '/camping/camping03.jpg'); ?>" onclick="return viewer.show(2)">
            <img class="box saturate" alt="Палаточный лагерь" src="<?php echo url_for(WWW_IMG . '/camping/camping03.jpg'); ?>"></a>
            <a href="<?php echo url_for(WWW_IMG . '/camping/camping04.jpg'); ?>" onclick="return viewer.show(3)">
            <img class="box saturate" alt="Палаточный лагерь" src="<?php echo url_for(WWW_IMG . '/camping/camping04.jpg'); ?>"></a>
            <a href="<?php echo url_for(WWW_IMG . '/camping/camping05.jpg'); ?>" onclick="return viewer.show(4)">
            <img class="box saturate" alt="Палаточный лагерь" src="<?php echo url_for(WWW_IMG . '/camping/camping05.jpg'); ?>"></a>
            <a href="<?php echo url_for(WWW_IMG . '/camping/camping06.jpg'); ?>" onclick="return viewer.show(5)">
            <img class="box saturate" alt="Палаточный лагерь" src="<?php echo url_for(WWW_IMG . '/camping/camping06.jpg'); ?>"></a>
            <a href="<?php echo url_for(WWW_IMG . '/camping/camping07.jpg'); ?>" onclick="return viewer.show(6)">
            <img class="box saturate" alt="Палаточный лагерь" src="<?php echo url_for(WWW_IMG . '/camping/camping07.jpg'); ?>"></a>
            <a href="<?php echo url_for(WWW_IMG . '/camping/camping08.jpg'); ?>" onclick="return viewer.show(7)">
            <img class="box saturate" alt="Палаточный лагерь" src="<?php echo url_for(WWW_IMG . '/camping/camping08.jpg'); ?>"></a>
            <a href="<?php echo url_for(WWW_IMG . '/camping/camping09.jpg'); ?>" onclick="return viewer.show(8)">
            <img class="box saturate" alt="Палаточный лагерь" src="<?php echo url_for(WWW_IMG . '/camping/camping09.jpg'); ?>"></a>
            <a href="<?php echo url_for(WWW_IMG . '/camping/camping10.jpg'); ?>" onclick="return viewer.show(9)">
            <img class="box saturate" alt="Палаточный лагерь" src="<?php echo url_for(WWW_IMG . '/camping/camping10.jpg'); ?>"></a>
            <a href="<?php echo url_for(WWW_IMG . '/camping/camping11.jpg'); ?>" onclick="return viewer.show(10)"><img class="box" alt="Палаточный лагерь" src="<?php echo url_for(WWW_IMG . '/camping/camping11.jpg'); ?>"></a>
            <a href="<?php echo url_for(WWW_IMG . '/camping/camping12.jpg'); ?>" onclick="return viewer.show(11)"><img class="box" alt="Палаточный лагерь" src="<?php echo url_for(WWW_IMG . '/camping/camping12.jpg'); ?>"></a>
        </div>

        <div class="card text-block padding-block accordion-item">
            <input type="checkbox">
            <div class="accordion-header">
                <div>
                    <img class="button" src="<?php echo url_for(WWW_IMG . '/buttons/camp.png'); ?>"/>
                    <h2>Лагерь под ключ</h2>
                </div>
                <img src="<?php echo $up_arrow_url; ?>"></img>
            </div>
            <div class="accordion-text">
                <p>Прокат палаток специализируется на небольших палаточных лагерях для компаний до 50 человек, выезжающих на природу для проведения командных тренингов, корпоративных мероприятий, празднования событий, и особенно ценящих комфорт и уют.</p>
            </div>
        </div>

        <div class="text-block card padding-block accordion-item">
            <input type="checkbox">
            <div class="accordion-header">
                <div>
                    <img class="button" src="<?php echo url_for(WWW_IMG . '/buttons/lamp.png'); ?>"/>
                    <h2>Оснащение</h2>
                </div>
                <img src="<?php echo $up_arrow_url; ?>"></img>
            </div>
            <div class="accordion-text">
                <p>Мы оснащаем Ваш лагерь только высококачественным снаряжением, особое внимание при этом уделяя комфорту ночлега: технологичные автоматические палатки, выдерживающие сильный ветер и дождь, современные самонадувающиеся коврики, изолирующие холод от земли и обеспечивающие ровную поверхность для сна, всегда чистые спальники без посторонних запахов, создающие уют фонарики. При необходимости установим столы с походными креслами и треноги с котелками.</p>
            </div>
        </div>

        <div class="text-block card padding-block accordion-item">
            <input type="checkbox">
            <div class="accordion-header">
                <div>
                    <img class="button" src="<?php echo url_for(WWW_IMG . '/buttons/map.png'); ?>"/>
                    <h2>Выбор места</h2>
                </div>
                <img src="<?php echo $up_arrow_url; ?>"></img>
            </div>
            <div class="accordion-text">
                <p>Подберём подходящее место, исходя из размера компании и ваших пожеланий: удалённости от города, наличия озера, размера площадки, удобств поблизости и т.д.</p>
            </div>
        </div>

        <div class="text-block card padding-block accordion-item">
            <input type="checkbox">
            <div class="accordion-header">
                <div>
                    <img class="button" src="<?php echo url_for(WWW_IMG . '/buttons/delivery.png'); ?>"/>
                    <h2>Доставка и монтаж</h2>
                </div>
                <img src="<?php echo $up_arrow_url; ?>"></img>
            </div>
            <div class="accordion-text">
                <p>Прокат палаток своими силами доставит всё необходимое снаряжение, произведёт его монтаж, а по окончании мероприятия - осуществит демонтаж палаточного лагеря и обратный вывоз снаряжения.</p>
            </div>
        </div>

        <div class="text-block card padding-block accordion-item">
            <input type="checkbox">
            <div class="accordion-header">
                <div>
                    <img class="button" src="<?php echo url_for(WWW_IMG . '/buttons/star.png'); ?>"/>
                    <h2>Наш опыт</h2>
                </div>
                <img src="<?php echo $up_arrow_url; ?>"></img>
            </div>
            <div class="accordion-text">
                <p>Работая с 2013 года, мы ежегодно производим установку палаточных лагерей в различных местах Ленобласти. Прокат палаток имеет опыт организации кемпингов для детей и подростков в спортивных лагерях.</p>
            </div>
        </div>
    </article>
</section>
<!-- /center -->

<!--Import image slider script-->
<script type="text/javascript" src="<?php echo url_for(WWW_JS . '/slide.js'); ?>"></script>
<script type="text/javascript">
    var viewer = new PhotoViewer();
    viewer.disableEmailLink();
    viewer.disablePhotoLink();
    viewer.add('<?php echo url_for(WWW_IMG . "/camping/camping01.jpg"); ?>');
    viewer.add('<?php echo url_for(WWW_IMG . "/camping/camping02.jpg"); ?>');
    viewer.add('<?php echo url_for(WWW_IMG . "/camping/camping03.jpg"); ?>');
    viewer.add('<?php echo url_for(WWW_IMG . "/camping/camping04.jpg"); ?>');
    viewer.add('<?php echo url_for(WWW_IMG . "/camping/camping05.jpg"); ?>');
    viewer.add('<?php echo url_for(WWW_IMG . "/camping/camping06.jpg"); ?>');
    viewer.add('<?php echo url_for(WWW_IMG . "/camping/camping07.jpg"); ?>');
    viewer.add('<?php echo url_for(WWW_IMG . "/camping/camping08.jpg"); ?>');
    viewer.add('<?php echo url_for(WWW_IMG . "/camping/camping09.jpg"); ?>');
    viewer.add('<?php echo url_for(WWW_IMG . "/camping/camping10.jpg"); ?>');
    viewer.add('<?php echo url_for(WWW_IMG . "/camping/camping11.jpg"); ?>');
    viewer.add('<?php echo url_for(WWW_IMG . "/camping/camping12.jpg"); ?>');
</script>

<?php include(TPL_PATH . '/right.php'); ?>
<?php include(TPL_PATH . '/footer.php'); ?>

