<?php

require_once('../core/initialize.php'); 
$page_title = "Контакты: Прокат палаток в Санкт-Петербурге";
$page_keywords = "телефон, местонахождение, контакты, связаться, как найти, на карте, все пункты";
$page_description = "Пункты Проката палаток в Санкт-Петербурге. Адрес на карте, телефон, электронная почта, время работы";
$page_breadcrumbs = "Контакты";
$page_content_class = "infopage";

// css
$aux_css_url = url_for(WWW_CSS . '/infopage.css');
$to_include = '<link rel="stylesheet" type="text/css" href="' . $aux_css_url . '">';

include(TPL_PATH . '/header.php');
include(TPL_PATH . '/left.php');

?>

<!-- center -->
<section id="center">
    <article>
        <h1>Контакты</h1>
				<div itemprop="provider" itemscope itemtype="https://schema.org/LocalBusiness">
					<h2 class="branch" id="contacts_kupchino" itemprop="name">Прокат палаток в Купчино</h2>
					<p class="sub lighter-yellow" itemprop="address">
							<img class="sign" src="<?php echo url_for(WWW_IMG . '/buttons/location.png'); ?>"/> Адрес: <?php echo CONTACTS_ADDRESS_CITY . ', ' . CONTACTS_ADDRESS_STREET_KUPCHINO . '. Перед визитом звоните.'; ?>
					</p>
					<p class="sub lighter-yellow" itemprop="telephone">
							<img class="sign" src="<?php echo url_for(WWW_IMG . '/buttons/phonecall.png'); ?>"/> Тел.: <a href="tel:<?php echo CONTACTS_PHONE_KUPCHINO; ?>"><?php echo CONTACTS_PHONE_KUPCHINO; ?></a>
							<a href="https://wa.me/<?php echo preg_replace('/[^\d+]/', '', CONTACTS_PHONE_KUPCHINO); ?>"><img class="sign messenger" src="<?php echo url_for(WWW_IMG . '/buttons/whatsapp.png'); ?>"/></a>
							<a href="https://t.me/<?php echo preg_replace('/[^\d+]/', '', CONTACTS_PHONE_KUPCHINO); ?>"><img class="sign messenger" src="<?php echo url_for(WWW_IMG . '/buttons/telegram.png'); ?>"/></a>
					</p>
					<p class="sub lighter-yellow" itemprop="email">
							<img class="sign" src="<?php echo url_for(WWW_IMG . '/buttons/mailru.png'); ?>"/> E-mail: prokatpalatok@inbox.ru
					</p>
					<p class="sub lighter-yellow">
							<img class="sign" src="<?php echo url_for(WWW_IMG . '/buttons/hours.png'); ?>"/> Режим работы: <?php echo CONTACTS_WORKING_HOURS_KUPCHINO; ?>
					</p>
					<meta itemprop="openingHours" content="We-Fr, Su 08:00−20:00, Sa 08:00-12:00"></meta>
					<iframe class="map" src="https://yandex.ru/map-widget/v1/?um=constructor%3AO9cNFsNT6JOb397YEJD0RC2DffHxj3pj&amp;source=constructor" frameborder="0"></iframe>
				</div>

				<div itemprop="provider" itemscope itemtype="https://schema.org/LocalBusiness">
					<h2 class="branch" id="contacts_dybenko" itemprop="name">Прокат палаток Camp4rest в Кудрово</h2>
					<p class="sub lighter-yellow" itemprop="address">
							<img class="sign" src="<?php echo url_for(WWW_IMG . '/buttons/location.png'); ?>"/> Адрес: <?php echo CONTACTS_ADDRESS_CITY; ?>, Кудровский проезд 2, гаражный кооператив ПО-11, 4 ряд, секции 36, 37, 38. Сотрудник проката встретит у шлагбаума. Въезд бесплатный.
					</p>
					<p class="sub lighter-yellow" itemprop="telephone">
							<img class="sign" src="<?php echo url_for(WWW_IMG . '/buttons/phonecall.png'); ?>"/> Тел.: <a href="tel:<?php echo CONTACTS_PHONE_KUDROVO; ?>"><?php echo CONTACTS_PHONE_KUDROVO; ?></a>
							<!-- <img class="sign" src="<?php //echo url_for(WWW_IMG . '/buttons/whatsapp.png'); ?>"/>
							<img class="sign" src="<?php //echo url_for(WWW_IMG . '/buttons/viber.png'); ?>"/>
							<img class="sign" src="<?php //echo url_for(WWW_IMG . '/buttons/telegram.png'); ?>"/> -->
					</p>
					<p class="sub lighter-yellow" itemprop="email">
							<img class="sign" src="<?php echo url_for(WWW_IMG . '/buttons/mailru.png'); ?>"/> E-mail: 4restcamp@gmail.com
					</p>
					<p class="sub lighter-yellow">
							<img class="sign" src="<?php echo url_for(WWW_IMG . '/buttons/hours.png'); ?>"/> Режим работы: ежедневно - с 10 до 19. Перед визитом звоните.
					</p>
					<meta itemprop="openingHours" content="10:00−19:00"></meta>
					<iframe class="map" src="https://yandex.ru/map-widget/v1/?um=constructor%3A5b3981a2f61cd625a1fa2e7ae5a749a95dc73eb14e8d35e0d7c8d5194d2f7bae&amp;source=constructor" frameborder="0"></iframe>
				</div>

				<div itemprop="provider" itemscope itemtype="https://schema.org/LocalBusiness">
					<h2 class="branch" id="contacts_komendantskiy" itemprop="name">Прокат палаток на Комендантском</h2>
					<p class="sub lighter-yellow" itemprop="address">
							<img class="sign" src="<?php echo url_for(WWW_IMG . '/buttons/location.png'); ?>"/> Адрес: <?php echo CONTACTS_ADDRESS_CITY; ?>, <?php echo CONTACTS_ADDRESS_STREET_KOMEND; ?>
					</p>
					<p class="sub lighter-yellow" itemprop="telephone">
							<img class="sign" src="<?php echo url_for(WWW_IMG . '/buttons/phonecall.png'); ?>"/> Тел.: <?php echo CONTACTS_PHONE_KOMEND; ?>
							<a href="https://wa.me/<?php echo preg_replace('/[^\d+]/', '', CONTACTS_PHONE_KOMEND); ?>"><img class="sign messenger" src="<?php echo url_for(WWW_IMG . '/buttons/whatsapp.png'); ?>"/></a>
							<a href="https://t.me/<?php echo preg_replace('/[^\d+]/', '', CONTACTS_PHONE_KOMEND); ?>"><img class="sign messenger" src="<?php echo url_for(WWW_IMG . '/buttons/telegram.png'); ?>"/></a>
					</p>
					<p class="sub lighter-yellow">
							<img class="sign" src="<?php echo url_for(WWW_IMG . '/buttons/hours.png'); ?>"/> Режим работы: по договорённости, обязательно звоните!
					</p>
					<iframe class="map" src="https://yandex.ru/map-widget/v1/?um=constructor%3Aec7bde08945c8b772d303db69503610220848afb64416b42bfd63957c246eaa7&amp;source=constructor" frameborder="0"></iframe>
				</div>

    </article>
</section>
<!-- /center -->

<?php include(TPL_PATH . '/right.php'); ?>
<?php include(TPL_PATH . '/footer.php'); ?>