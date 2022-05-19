<?php

require_once('core/initialize.php');
$page_title = "Походные комплекты: Прокат палаток в Санкт-Петербурге";
$page_keywords = "походный набор, палатка спальник, палатка спальник коврик прокат, прокат походный комплект";
$page_description = "Прокат готовых походных комплектов для любой компании. Для семьи, для двоих, для большой компании, для фуршета на природе";
$page_breadcrumbs = "Походные комплекты";
$page_content_class = "set";
include(TPL_PATH . '/header.php');

?>
    <h1>Походные комплекты</h1>

    <div class="set-item card">        
        <img class="box saturate" alt="Комплект Большая семья" src="<?php echo url_for(WWW_IMG . '/inventory/set/big_family.jpg'); ?>">
        <div class="">
            <h2>"Большая семья" - Комплект для четырёх человек<a id="big_famliy"></a></h2>
            <ul>
                <li><a href="<?php echo WWW_ROOT . '/palatki/prokat-6-mestnoi-2-komnatnoi-palatki-helios-bora/'; ?>">Двухкомнатная палатка с тамбуром</a></li>
                <li><a href="<?php echo WWW_ROOT . '/kovriki/forestmat/'; ?>">4 самонадувающихся коврика</a></li>
                <li><a href="<?php echo WWW_ROOT . '/spalniki/prokat-spalnika-oasis/'; ?>">4 спальника Oasis +7</a></li>
                <li><a href="<?php echo WWW_ROOT . '/poleznie-veshi/table/'; ?>">Складной стол и 4 табурета</a></li>
            </ul>
            <ul class="price">
                <li><p>первые двое суток: 8 200 ₽</p></li>
                <li><p>последующие сутки: 1 600 ₽/сут.</p></li>
                <li><p>залог: 20 000 ₽ без <a href="<?php echo WWW_ROOT . '/howto.php?question=deposit'; ?>">документа</a> / 2 000 ₽ с <a href="<?php echo WWW_ROOT . '/howto.php?question=deposit'; ?>">документом</a></p></li>
            </ul>
        </div>
        <p class="set-description">Двухкомнтатная палатка позволяет комфортно разместиться семье из четырёх человек. В большом центральном тамбуре можно сложить вещи или установить стол с табуретами.</p>
    </div>

    <div class="set-item card">
        <img class="box saturate" alt="Комплект Для двоих" src="<?php echo url_for(WWW_IMG . '/inventory/set/for_two.jpg'); ?>">
        <div class="">
            <h2>"Для двоих" - Комплект для двух человек<a id="for_two"></a></h2>
            <ul>
                <li><a href="<?php echo WWW_ROOT . '/palatki/q3/'; ?>">Палатка Quechua Easy 3</a></li>
                <li><a href="<?php echo WWW_ROOT . '/kovriki/forestmat/'; ?>">2 самонадувающихся коврика</a></li>
                <li><a href="<?php echo WWW_ROOT . '/spalniki/prokat-spalnika-oasis/'; ?>">2 спальника Oasis +7</a></li>
                <li><a href="<?php echo WWW_ROOT . '/poleznie-veshi/prokat-lampy-dlya-palatki/'; ?>">Кемпинговый фонарь</a></li>
            </ul>
            <ul class="price">
                <li><p>первые двое суток: 4 000 ₽</p></li>
                <li><p>последующие сутки: 950 ₽/сут.</p></li>
                <li><p>залог: 15 000 ₽ без <a href="<?php echo WWW_ROOT . '/howto.php?question=deposit'; ?>">документа</a> / 1 500 ₽ с <a href="<?php echo WWW_ROOT . '/howto.php?question=deposit'; ?>">документом</a></p></li>
            </ul>
        </div>
        <p class="set-description">Палатка автоматической сборки легко и быстро устанавливается и подходит даже для неопытных путешественников. Самонадувающиеся коврики изолируют холод от земли и обеспечивают ровную поверхность для сна. Коврики состёгиваются друг с другом, а два спальника можно объединить в один большой.</p>
    </div>

    <div class="set-item card">
        <img class="box saturate" alt="Комплект Соло" src="<?php echo url_for(WWW_IMG . '/inventory/set/solo.jpg'); ?>">
        <div class="">
            <h2>"Соло" - Комплект для одного человека<a id="solo"></a></h2>
            <ul>
                <li><a href="<?php echo WWW_ROOT . '/palatki/prokat-palatki-outventure-dome-2/'; ?>">Палатка Outventure Dome 2</a></li>
                <li><a href="<?php echo WWW_ROOT . '/kovriki/forestmat/'; ?>">Самонадувающийся коврик</a></li>
                <li><a href="<?php echo WWW_ROOT . '/spalniki/prokat-spalnika-oasis/'; ?>">Спальник Oasis +7</a></li>
                <li><a href="<?php echo WWW_ROOT . '/poleznie-veshi/prokat-lampy-dlya-palatki/'; ?>">Кемпинговый фонарь</a></li>
            </ul>
            <ul class="price">
                <li><p>первые двое суток:  2 300 ₽</p></li>
                <li><p>последующие сутки:  550 ₽/сут.</p></li>
                <li><p>залог: 8 500 ₽ без <a href="<?php echo WWW_ROOT . '/howto.php?question=deposit'; ?>">документа</a> / 850 ₽ с <a href="<?php echo WWW_ROOT . '/howto.php?question=deposit'; ?>">документом</a></p></li>
            </ul>
        </div>
        <p class="set-description">Всё необходимое снаряжение для одного человека: компактная палатка, комфортный самонадувающийся коврик и спальник. Фонарик можно подвесить под потолком палатки или установить на полу.</p>
    </div>

    <!--div class="set-item card">
        <img class="box saturate" alt="Комплект Фуршет на природе" src="<?php #echo url_for(WWW_IMG . '/inventory/set/diner.jpg'); ?>">
        <div class="">
            <h2>"Фуршет на природе" - Комплект для любой компании<a id="diner"></a></h2>
            <ul>
                <li><a href="<?php #echo WWW_ROOT . '/shatry-i-tenty/prokat-shatra-sorang/'; ?>">Шатёр полуавтомат</a></li>
                <li><a href="<?php #echo WWW_ROOT . '/poleznie-veshi/table/'; ?>">Складной стол и 4 табурета</a></li>
                <li><a href="<?php #echo WWW_ROOT . '/poleznie-veshi/holod/'; ?>">Походный холодильник с охлаждающим брикетом</a></li>
                <li><a href="<?php #echo WWW_ROOT . '/poleznie-veshi/prokat-trenogi-s-kotelkom/'; ?>">Тренога с котелком</a></li>
            </ul>
            <ul class="price">
                <li><p>первые двое суток:  4 400 ₽</p></li>
                <li><p>последующие сутки:  1 100 ₽/сут.</p></li>
                <li><p>залог: 15 000 ₽ без <a href="<?php #echo WWW_ROOT . '/howto.php?question=deposit'; ?>">документа</a> / 1 500 ₽ с <a href="<?php #echo WWW_ROOT . '/howto.php?question=deposit'; ?>">документом</a></p></li>
            </ul>
        </div>
        <p class="set-description">Дополнение к любому комплекту. Шатёр комфортно вмещает стол с табуретами и 4-6 человек. Москитные сетки защищают от насекомых. Походный холодильник с охлаждающим брикетом сохраняет охлаждёнными продукты и напитки. В котелке можно подогреть воду для чая, приготовить уху на костре.</p>
    </div-->

<?php include(TPL_PATH . '/footer.php'); ?>