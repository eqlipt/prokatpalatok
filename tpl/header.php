<?php
//check what kind of page will be rendered and prepare variables
//inventory infopage
if(isset($inventory_id)) {
	$inventory_item = find_inventory_by_id($inventory_id);
	$category_item = find_category_by_id($inventory_item['category_id']);
	$page_keywords = $inventory_item['page_keywords'];
	$page_description = $inventory_item['page_description'];
	$page_title = $inventory_item['page_title'];

//category showcase
} elseif(isset($category_id)) {
	$category_item = find_category_by_id($category_id);
	$page_keywords = $category_item['page_keywords'];
	$page_description = $category_item['page_description'];
	$page_title = $category_item['page_title'];
}

//main showcase & infopages (those have their own set of variables)
?>
<!-- prokat palatok web-site -->
<html lang='ru'>
<head>
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="keywords" content="<?php echo $page_keywords; ?>">
	<meta name="description" content="<?php echo $page_description; ?>">
    <title><?php echo $page_title; ?></title>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous">
	<!-- Any additional CDN or style a page needs -->
	<?php if(isset($to_include)) {echo $to_include;} ?>	
	<link rel="stylesheet" type="text/css" href="<?php echo url_for(WWW_CSS . '/main.css'); ?>">
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo url_for(WWW_IMG . '/favicon.ico'); ?>">

	<!-- Yandex.Metrika counter -->
	<script type="text/javascript" >
	(function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
	m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
	(window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

	ym(21468835, "init", {
			clickmap:true,
			trackLinks:true,
			accurateTrackBounce:true
	});
	</script>
	<noscript><div><img src="https://mc.yandex.ru/watch/21468835" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
	<!-- /Yandex.Metrika counter -->
</head>

<body itemscope itemtype="https://schema.org/Organization">
<header>
	<!-- slider -->	
	<div id="slider">
		<div id="about">
			<a class="header-link" href="<?php echo WWW_ROOT; ?>" itemprop="url"><span itemprop="name">Прокат палаток</span> и туристического снаряжения в <span itemprop="areaServed">Санкт-Петербург</span>е</a>
			<a class="header-link contacts" href="<?php echo WWW_ROOT . '/contacts.php#contacts_kupchino'; ?>"><span itemprop="location">м. Купчино</span> <span itemprop="telephone"><?php echo CONTACTS_PHONE_KUPCHINO; ?></span></a>
		</div>
		<nav id="header-nav" aria-label="header-nav">
			<ul id="menu-top">
				<li><a href="<?php echo WWW_ROOT . '/howto.php'; ?>">Условия аренды</a></li>
				<li><a href="<?php echo WWW_ROOT . '/pay.php'; ?>">Оплата</a></li>
				<li><a href="<?php echo WWW_ROOT . '/delivery.php'; ?>">Доставка</a></li>
				<li><a href="<?php echo WWW_ROOT . '/pay.php#section_discount'; ?>">Скидки</a></li>
				<li><a href="<?php echo WWW_ROOT . '/news.php'; ?>">Наши преимущества</a></li>
				<li><a href="https://vk.com/topic-53310491_28269369" target="new" >Отзывы</a></li>
				<li><a href="<?php echo WWW_ROOT . '/contacts.php'; ?>">Контакты</a></li>
			</ul>			
			<a class="header-link contacts" href="<?php echo WWW_ROOT . '/contacts.php#contacts_komendantskiy'; ?>">м. Комендантский проспект <?php echo CONTACTS_PHONE_KOMEND; ?></a>
		</nav>
		<a id="quotes-link" href="https://vk.com/topic-53310491_28269369" target="new">
		<div id="quotes">
			<p><script type="text/javascript" language="JavaScript" src="<?php echo url_for(WWW_JS . '/quotes.js'); ?>"></script></p>
		</div>
		</a>
	</div>
	<!-- /slider -->
</header>

<!-- menutop -->
<div id="wrapper-nav">
	<!-- main navigation -->
	<nav id="main-nav" aria-label="main-nav">
		<ul id="menu-main">
			<li id="equip"><a href="<?php echo WWW_ROOT; ?>">Cнаряжение</a></li>
			<li id="tent"><a href="<?php echo WWW_ROOT . '/palatki/'; ?>">Палатки</a></li>
			<li id="sleep"><a href="<?php echo WWW_ROOT . '/spalniki/'; ?>">Спальники</a></li>
			<li id="mat"><a href="<?php echo WWW_ROOT . '/kovriki/'; ?>">Коврики</a></li>
			<li id="shelter"><a href="<?php echo WWW_ROOT . '/shatry-i-tenty/'; ?>">Шатры и тенты</a></li>
			<li id="other"><a href="<?php echo WWW_ROOT . '/poleznie-veshi/'; ?>">Полезные вещи</a></li>
			<li id="special"><a href="<?php echo WWW_ROOT . '/special.php'; ?>">Комплекты</a></li>
			<li id="camping"><a href="<?php echo WWW_ROOT . '/camping.php'; ?>">Палаточный лагерь</a></li>
			<li id="contacts"><a href="<?php echo WWW_ROOT . '/contacts.php'; ?>">Контакты</a></li>
		</ul>	
		<div id="menu-btn">
			<i class="fas fa-bars"></i>
		</div>
	</nav>
	<!-- /main navigation -->
</div>

	<!-- side navigation -->
	<nav id="side-nav" aria-label="side-nav" class="">
		<ul id="menu-mobile">
			<li><a class="subheader" href="<?php echo WWW_ROOT; ?>/">Снаряжение</a></li>
			<li><a class="submenu" href="<?php echo WWW_ROOT . '/palatki/'; ?>">Палатки</a></li>
			<li><a class="submenu" href="<?php echo WWW_ROOT . '/spalniki/'; ?>">Спальники</a></li>
			<li><a class="submenu" href="<?php echo WWW_ROOT . '/kovriki/'; ?>">Коврики</a></li>
			<li><a class="submenu" href="<?php echo WWW_ROOT . '/shatry-i-tenty/'; ?>">Шатры и тенты</a></li>
			<li><a class="submenu" href="<?php echo WWW_ROOT . '/poleznie-veshi/'; ?>">Полезные вещи</a></li>
			<li><a class="submenu" href="<?php echo WWW_ROOT . '/special.php'; ?>">Комплекты</a></li>
			<li><a class="subheader" href="<?php echo WWW_ROOT . '/camping.php'; ?>">Палаточный лагерь</a></li>
			<li><a class="subheader" href="<?php echo WWW_ROOT . '/howto.php'; ?>">Условия аренды</a></li>
			<li><a class="submenu" href="<?php echo WWW_ROOT . '/pay.php'; ?>">Оплата</a></li>
			<li><a class="submenu" href="<?php echo WWW_ROOT . '/delivery.php'; ?>">Доставка</a></li>
			<li><a class="submenu" href="<?php echo WWW_ROOT . '/pay.php#section_discount'; ?>">Скидки</a></li>
			<li><a class="submenu" href="<?php echo WWW_ROOT . '/news.php'; ?>">Наши преимущества</a></li>
			<li><a class="subheader" target="new" href="https://vk.com/topic-53310491_28269369">Отзывы</a></li>
			<li><a class="subheader" href="<?php echo WWW_ROOT . '/contacts.php'; ?>">Контакты</a></li>
		</ul>
	</nav>
	<!-- /side navigation -->

<?php /*include('basket.php');*/?>
<!-- /menuTop -->

<!-- content -->
<div id="wrapper">
	<div id="content" class="<?php echo $page_content_class; ?>">

<?php include(TPL_PATH . '/breadcrumbs.php'); ?>