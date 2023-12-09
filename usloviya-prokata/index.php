<?php

require_once('../core/initialize.php'); 
$page_title = "Условия проката в прокате палаток в Санкт-Петербурге";
$page_keywords = "правила проката, прокат палаток сутки проката, прокат палаток бронирование, прокат палаток время работы, доставка палатка";
$page_description = "Условия проката туристического снаряжения в Прокате палаток. Залог, оплата, бронирование, сутки проката, доставка, скидки";
$page_breadcrumbs = "Условия проката";
$page_content_class = "infopage";

// css
$aux_css_url = url_for(WWW_CSS . '/infopage.css');
$to_include = '<link rel="stylesheet" type="text/css" href="' . $aux_css_url . '">';

$up_arrow_url = url_for(WWW_IMG . '/up-arrow.svg');

include(TPL_PATH . '/header.php');
include(TPL_PATH . '/left.php');

if(isset($_GET['question'])) {
    $question = $_GET['question'];
} else {
    $question = '';
}

?>

<!-- center -->
<section id="center">
    <article>
        <h1>Условия проката в Прокате палаток</h1>
        <div class="card text-block padding-block accordion-item">
            <input type="checkbox" <?php if($question == 'period') {echo '';} else {echo 'checked';} ?>>
            <div class="accordion-header">
                <div>
                    <img class="button" src="<?php echo url_for(WWW_IMG . '/buttons/stopwatch.png'); ?>"/>
                    <h2>Сутки проката</h2>
                </div>
                <img src="<?php echo $up_arrow_url; ?>"></img>
            </div>
            <div class="accordion-text">
                <p>Сутки проката длятся c 8:00 дня проката до 20:00 <b>следующего</b> дня.</p>
                <p>Пример: Вы берёте снаряжение в 11:00 в среду. Сутки проката заканчиваются в 20:00 в четверг.</p>
                <p>В выходные и праздничные дни минимальный срок проката составляет двое суток.</p>
            </div>
        </div>
        <div  class="card text-block padding-block accordion-item" id="zalog">
            <input type="checkbox" <?php if($question == 'deposit') {echo '';} else {echo 'checked';} ?>>
            <div class="accordion-header">
                <div>
                    <img class="button" src="<?php echo url_for(WWW_IMG . '/buttons/gem.png'); ?>"/>
                    <h2>Залог</h2>
                </div>
                <img src="<?php echo $up_arrow_url; ?>"></img></i>
            </div>
            <div class="accordion-text">
                <p>Предусмотрено два варианта залога:<br>
                1) Полная стоимость снаряжения.<br>
                2) Документ и 10% стоимости снаряжения.</p>
                <p>Из документов мы принимаем загранпаспорт, водительские права, военный билет и СТС.</p>
            </div>
        </div>
        <div class="card text-block padding-block accordion-item">
            <input type="checkbox" <?php if($question == 'booking') {echo '';} else {echo 'checked';} ?>>
            <div class="accordion-header">
                <div>
                    <img class="button" src="<?php echo url_for(WWW_IMG . '/buttons/lock.png'); ?>"/>
                    <h2>Бронирование</h2>
                </div>
                <img src="<?php echo $up_arrow_url; ?>"></img></i>
            </div>
            <div class="accordion-text">
                <p>Для бронирования снаряжения более чем за сутки до проката необходима предоплата в размере 30% от стоимости проката. При отказе от проката менее, чем за 3 дня до даты проката, предоплата не возвращается, но всегда может быть использована для проката в будущем. В случае отказа за 3 дня и более предоплата возвращается в полном размере.</p>
                <p>Предоплату можно осуществить непосредственно в пункте проката, либо переводом. Осуществляя предоплату бронирования переводом, в сопутствующем сообщении (SMS, Whatsapp, Viber, Telegram или e-mail) укажите номер заказа или Ваши контакты, даты проката и наименование снаряжения, бронирование которого осуществляете.</p>
            </div>
        </div>
        <div class="card text-block padding-block accordion-item">
            <input type="checkbox" <?php if($question == 'damage') {echo '';} else {echo 'checked';} ?>>
            <div class="accordion-header">
                <div>
                    <img class="button" src="<?php echo url_for(WWW_IMG . '/buttons/repair.png'); ?>"/>
                    <h2>Повреждения</h2>
                </div>
                <img src="<?php echo $up_arrow_url; ?>"></img></i>
            </div>
            <div class="accordion-text">
                <p>Если вы обнаружили повреждения или недочёты на снаряжении, сделайте фото снимок или видео и отправьте нам в любой мессенджер. Это исключит претензии в Ваш адрес при возврате.</p>
                <p>Если вы повредили снаряжение, просим сообщить об этом при возврате. Если повреждение незначительное, ремонт будет произведён за наш счёт. В случае значительного ущерба снаряжению мы рассчитываем на вашу порядочность и надеемся на возмещение стоимости ремонта или замены снаряжения. В случае сокрытия ущерба или отказа от его возмещения Прокат палаток оставляет за собой право обратиться в суд.</p>
            </div>
        </div>
        <div class="card text-block padding-block accordion-item">
            <input type="checkbox" <?php if($question == 'payment') {echo '';} else {echo 'checked';} ?>>
            <div class="accordion-header">
                <div>
										<img class="button" src="<?php echo url_for(WWW_IMG . '/buttons/coin.png'); ?>"/>
										<h2>Оплата и предоплата</h2>
                </div>
                <img src="<?php echo $up_arrow_url; ?>"></img></i>
            </div>
            <div class="accordion-text">
                <p>Оплата производится за весь срок проката при получении снаряжения.</p>
								<p>Предоплата необходима при бронировании снаряжения более, чем за сутки до проката.</p>
								<p>Способы оплаты:<br>
                - наличными<br>
                - перевод на банковскую карту<br>
								- оплата по счёту (для юридических лиц)</p>
            </div>
        </div>
        <div class="card text-block padding-block accordion-item">
            <input type="checkbox" <?php if($question == 'pickup') {echo '';} else {echo 'checked';} ?>>
            <div class="accordion-header">
                <div>
                    <img class="button" src="<?php echo url_for(WWW_IMG . '/buttons/place.png'); ?>"/>
                    <h2>Самовывоз</h2>
                </div>
                <img src="<?php echo $up_arrow_url; ?>"></img></i>
            </div>
            <div class="accordion-text">
                <p>В Санкт-Петербурге пункты самовывоза находятся по адресам:<br> 
                <a target="new" href="https://yandex.ru/maps/?um=constructor%3AO9cNFsNT6JOb397YEJD0RC2DffHxj3pj&source=constructorLink"><?php echo CONTACTS_ADDRESS_STREET_KUPCHINO; ?></a>. тел. <?php echo CONTACTS_PHONE_KUPCHINO; ?><br>
                <a target="new" href="https://yandex.ru/maps/?um=constructor%3A5b3981a2f61cd625a1fa2e7ae5a749a95dc73eb14e8d35e0d7c8d5194d2f7bae&source=constructorLink"><?php echo CONTACTS_ADDRESS_STREET_KUDROVO; ?></a>. тел. <?php echo CONTACTS_PHONE_KUDROVO; ?><br>
                <a target="new" href="https://yandex.ru/maps/?um=constructor%3Aec7bde08945c8b772d303db69503610220848afb64416b42bfd63957c246eaa7&source=constructorLink"><?php echo CONTACTS_ADDRESS_STREET_KOMEND; ?></a>. тел. <?php echo CONTACTS_PHONE_KOMEND; ?><br>
                Перед визитом, пожалуйста, звоните. Либо воспользуйтесь нашей <a href="<?php echo (WWW_ROOT . '/dostavka/'); ?>">доставкой</a>.</p>
            </div>
        </div>
        <div class="card text-block padding-block accordion-item">
            <input type="checkbox" <?php if($question == 'delivery') {echo '';} else {echo 'checked';} ?>>
            <div class="accordion-header">
                <div>
										<img class="button" src="<?php echo url_for(WWW_IMG . '/buttons/car.png'); ?>"/>
										<h2>Доставка</h2>
                </div>
                <img src="<?php echo $up_arrow_url; ?>"></img></i>
            </div>
            <div class="accordion-text">
                <p>Доставка снаряжения по Санкт-Петербургу осуществляется при заказе от <?php echo PRICE_DELIVERY_THRESHOLD_CITY; ?> ₽, по Ленобласти - от <?php echo PRICE_DELIVERY_THRESHOLD_SUBURBS; ?> ₽. Вы также можете заказать доставку от нас удобной вам курьерской службой - мы передадим снаряжение курьеру.</p>
                <p><a href="<?php echo (WWW_ROOT . '/dostavka/'); ?>">Стоимость доставки</a></p>
            </div>
        </div>
        <div class="card text-block padding-block accordion-item">
            <input type="checkbox" <?php if($question == 'discount') {echo '';} else {echo 'checked';} ?>>
            <div class="accordion-header">
                <div>
										<img class="button" src="<?php echo url_for(WWW_IMG . '/buttons/discount.png'); ?>"/>
										<h2>Скидки</h2>
                </div>
                <img src="<?php echo $up_arrow_url; ?>"></img></i>
            </div>
            <div class="accordion-text">
								<p>Скидки на снаряжение действуют при прокате на срок от двух суток и не суммируются. Применяется наибольшая возможная скидка.</p>
                <p>Скидка 10% за каждую неделю проката вплоть до 30% за третью и последующие недели.</p>
                <p>Скидка 5% ко дню рождения. Скидка распространяется на любое снаряжение и действует в течение 3 дней до и 3 дней после дня рождения.</p>
            </div>
        </div>
        <div class="card text-block padding-block accordion-item">
            <input type="checkbox" <?php if($question == 'age') {echo '';} else {echo 'checked';} ?>>
            <div class="accordion-header">
                <div>
                    <img class="button" src="<?php echo url_for(WWW_IMG . '/buttons/v.png'); ?>"/>
                    <h2>Возрастные ограничения</h2>
                </div>
                <img src="<?php echo $up_arrow_url; ?>"></img></i>
            </div>
            <div class="accordion-text">
                <p>Прокат палаток не сдаёт снаряжение в прокат лицам, не достигшим 18 лет.</p>
            </div>
        </div>
    </article>
</section>
<!-- /center -->

<?php include(TPL_PATH . '/right.php'); ?>
<?php include(TPL_PATH . '/footer.php'); ?>