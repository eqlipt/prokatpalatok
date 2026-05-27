<?php

require_once('../core/initialize.php'); 
$page_title = "Стать частью сети Прокат палаток: Прокат палаток в Санкт-Петербурге";
$page_keywords = "франшиза проката, открыть свой пункт проката снаряжения";
$page_description = "Как стать частью сети Прокат палаток. Как открыть пункт проката в своём городе";
$page_breadcrumbs = "Партнёрам";
$page_content_class = "set";
$to_include = '
<style>
h2 {
	display: inline-block;
	vertical-align: middle
}
h1 {
	margin-top: 50px;
}
</style>';
include(TPL_PATH . '/header.php');

?>

<!-- center -->
<section id="center">
    <article>
        <h1>Работа под брендом Прокат палаток</h1>

        <div class="text-block card padding-block accordion-item">
            <div class="accordion-header">
                <div>
                    <img class="button" src="<?php echo url_for(WWW_IMG . '/buttons/camp.png'); ?>"/>
                    <h2>Кому подойдёт</h2>
                </div>
            </div>
            <div class="accordion-text">
                <p>Есть ли у вас свой прокат снаряжения или вы только думаете об открытии пункта в вашем городе, сдаёте снаряжение на досках объявлений или имеете свой сайт - мы сможем быть полезны друг другу.</p>
            </div>
        </div>

        <div class="card text-block padding-block accordion-item">
            <div class="accordion-header">
                <div>
                    <img class="button" src="<?php echo url_for(WWW_IMG . '/buttons/star.png'); ?>"/>
                    <h2>На первых позициях</h2>
                </div>
            </div>
            <div class="accordion-text">
                <p>Прокат палаток находится в ТОПЕ выдачи основных поисковиков по ключевым запросам. Став частью сети, вы будете гарантировано получать заказы.</p>
            </div>
        </div>

        <div class="text-block card padding-block accordion-item">
            <div class="accordion-header">
                <div>
                    <img class="button" src="<?php echo url_for(WWW_IMG . '/buttons/magnifier.png'); ?>"/>
                    <h2>База знаний</h2>
                </div>
            </div>
            <div class="accordion-text">
                <p>С 2013 года мы отточили бизнес-процессы в области проката туристического снаряжения и готовы делиться своим опытом. Новичков проведём "от и до", сопровождая на всех этапах; для опытных партнёров найдём в арсенале уникальные лайфхаки по обслуживанию снаряжения, оценке рисков и повышению лояльности клиентов.</p>
            </div>
        </div>

        <div class="text-block card padding-block accordion-item">
            <div class="accordion-header">
                <div>
                    <img class="button" src="<?php echo url_for(WWW_IMG . '/buttons/repair.png'); ?>"/>
                    <h2>Простой учёт</h2>
                </div>
            </div>
            <div class="accordion-text">
                <p>Создание и учёт заказов ведётся в простой онлайн-системе, в функции которой входит бронирование, расчёт стоимости проката, залога, предоплаты, а также - хранение данных о клиенте. Учёт остатков и финансов мы ведём в таблицах Excel, разобраться в которых не составит особого труда.</p>
            </div>
        </div>

        <div class="text-block card padding-block accordion-item">
            <div class="accordion-header">
                <div>
                    <img class="button" src="<?php echo url_for(WWW_IMG . '/buttons/phone.png'); ?>"/>
                    <h2>Коммуникации с клиентами</h2>
                </div>
            </div>
            <div class="accordion-text">
                <p>Исчерпывающие шаблоны для быстрых и точных ответов на любые запросы клиентов всегда под рукой в личном кабинете.</p>
            </div>
        </div>

        <div class="text-block card padding-block accordion-item">
            <div class="accordion-header">
                <div>
                    <img class="button" src="<?php echo url_for(WWW_IMG . '/buttons/coin.png'); ?>"/>
                    <h2>Стоимость</h2>
                </div>
            </div>
            <div class="accordion-text">
                <p>Вне Санкт-Петербурга присоединиться к сети прокатов туристического снаряжения "Прокат палаток" можно бесплатно.</p>
            </div>
        </div>

				<div class="button-link">
					<a href="https://forms.yandex.ru/u/651f985ff47e7359b20f4c75/">Оставить заявку</a>
				</div>

    </article>
</section>
<!-- /center -->

<?php include(TPL_PATH . '/footer.php'); ?>

