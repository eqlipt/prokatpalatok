<?php

require_once('core/initialize.php'); 
$page_title = "Контакты: Прокат палаток в Санкт-Петербурге";
$page_keywords = "прокат палаток телефон, прокат палаток местонахождение, прокат палаток контакты, прокат палаток связаться";
$page_description = "Контакты Проката палаток в Санкт-Петербурге. Адрес на карте, телефон, электронная почта, время работы";
$page_breadcrumbs = "Контакты";
$page_content_class = "infopage";
include(TPL_PATH . '/header.php');
include(TPL_PATH . '/left.php');

?>

<!-- center -->
<section id="center">
    <article>
        <h1>Контакты</h1>
        <h2 class="branch" id="contacts_kupchino">Прокат палаток в Купчино</h2>
        <p class="sub lighter-yellow">
            <img class="sign" src="<?php echo url_for(WWW_IMG . '/buttons/location.png'); ?>"/> Адрес: <?php echo CONTACTS_ADDRESS_CITY . ', ' . CONTACTS_ADDRESS_STREET_KUPCHINO . '. Перед визитом звоните.'; ?>
        </p>
        <p class="sub lighter-yellow">
            <img class="sign" src="<?php echo url_for(WWW_IMG . '/buttons/phonecall.png'); ?>"/> Тел.: <?php echo CONTACTS_PHONE_KUPCHINO; ?>
            <img class="sign" src="<?php echo url_for(WWW_IMG . '/buttons/whatsapp.png'); ?>"/>
            <img class="sign" src="<?php echo url_for(WWW_IMG . '/buttons/viber.png'); ?>"/>
            <img class="sign" src="<?php echo url_for(WWW_IMG . '/buttons/telegram.png'); ?>"/>
        </p>
        <p class="sub lighter-yellow">
            <img class="sign" src="<?php echo url_for(WWW_IMG . '/buttons/mailru.png'); ?>"/> E-mail: prokatpalatok @ inbox.ru
        </p>
        <p class="sub lighter-yellow">
            <img class="sign" src="<?php echo url_for(WWW_IMG . '/buttons/hours.png'); ?>"/> Режим работы: <?php echo CONTACTS_WORKING_HOURS_KUPCHINO; ?>
        </p>
        <iframe class="map" src="https://yandex.ru/map-widget/v1/?um=constructor%3AO9cNFsNT6JOb397YEJD0RC2DffHxj3pj&amp;source=constructor" frameborder="0"></iframe>

        <h2 class="branch" id="contacts_dybenko">Прокат палаток Camp4rest в Кудрово</h2>
        <p class="sub lighter-yellow">
            <img class="sign" src="<?php echo url_for(WWW_IMG . '/buttons/location.png'); ?>"/> Адрес: <?php echo CONTACTS_ADDRESS_CITY; ?>, Кудровский проезд 2, гаражный кооператив ПО-11, 4 ряд, секции 36, 37, 38. Сотрудник проката встретит у шлагбаума. Въезд бесплатный.
        </p>
        <p class="sub lighter-yellow">
            <img class="sign" src="<?php echo url_for(WWW_IMG . '/buttons/phonecall.png'); ?>"/> Тел.: <?php echo CONTACTS_PHONE_KUDROVO; ?>
            <img class="sign" src="<?php echo url_for(WWW_IMG . '/buttons/whatsapp.png'); ?>"/>
            <img class="sign" src="<?php echo url_for(WWW_IMG . '/buttons/viber.png'); ?>"/>
            <img class="sign" src="<?php echo url_for(WWW_IMG . '/buttons/telegram.png'); ?>"/>
        </p>
        <p class="sub lighter-yellow">
            <img class="sign" src="<?php echo url_for(WWW_IMG . '/buttons/mailru.png'); ?>"/> E-mail: 4restcamp @ gmail.com
        </p>
        <p class="sub lighter-yellow">
            <img class="sign" src="<?php echo url_for(WWW_IMG . '/buttons/hours.png'); ?>"/> Режим работы: ежедневно - с 9 до 21. Перед визитом звоните.
        </p>
        <iframe class="map" src="https://yandex.ru/map-widget/v1/?um=constructor%3A5b3981a2f61cd625a1fa2e7ae5a749a95dc73eb14e8d35e0d7c8d5194d2f7bae&amp;source=constructor" frameborder="0"></iframe>
        

        <h2 class="branch" id="contacts_komendantskiy">Прокат палаток на Комендантском</h2>
        <p class="sub lighter-yellow">
            <img class="sign" src="<?php echo url_for(WWW_IMG . '/buttons/location.png'); ?>"/> Адрес: <?php echo CONTACTS_ADDRESS_CITY; ?>, <?php echo CONTACTS_ADDRESS_STREET_KOMEND; ?>
        </p>
        <p class="sub lighter-yellow">
            <img class="sign" src="<?php echo url_for(WWW_IMG . '/buttons/phonecall.png'); ?>"/> Тел.: <?php echo CONTACTS_PHONE_KOMEND; ?>
            <img class="sign" src="<?php echo url_for(WWW_IMG . '/buttons/whatsapp.png'); ?>"/>
            <img class="sign" src="<?php echo url_for(WWW_IMG . '/buttons/viber.png'); ?>"/>
            <img class="sign" src="<?php echo url_for(WWW_IMG . '/buttons/telegram.png'); ?>"/>
        </p>
        <p class="sub lighter-yellow">
            <img class="sign" src="<?php echo url_for(WWW_IMG . '/buttons/hours.png'); ?>"/> Режим работы: по договорённости, обязательно звоните!
        </p>
        <iframe class="map" src="https://yandex.ru/map-widget/v1/?um=constructor%3Aec7bde08945c8b772d303db69503610220848afb64416b42bfd63957c246eaa7&amp;source=constructor" frameborder="0"></iframe>

    </article>
</section>
<!-- /center -->

<?php include(TPL_PATH . '/right.php'); ?>
<?php include(TPL_PATH . '/footer.php'); ?>