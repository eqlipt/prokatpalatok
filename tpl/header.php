<?php
require_once(PROJECT_PATH . '/test.php');
/* check what kind of page will be rendered and prepare variables */
// individual inventory page
if(isset($inventory_id)) {
	$inventory_item = find_inventory_by_id($inventory_id);
	$category_item = find_category_by_id($inventory_item['category_id']);

	// seo
	$page_keywords = $inventory_item['page_keywords'];
	$page_description = $inventory_item['page_description'];
	$page_title = $inventory_item['page_title'];

	// css
	$aux_css_url = url_for(WWW_CSS . '/infopage.css');
	$to_include = '<link rel="stylesheet" type="text/css" href="' . $aux_css_url . '">';

// category page
} elseif(isset($category_id)) {
	$category_item = find_category_by_id($category_id);

	// seo
	$page_keywords = $category_item['page_keywords'];
	$page_description = $category_item['page_description'];
	$page_title = $category_item['page_title'];

	// css
	$aux_css_url = url_for(WWW_CSS . '/inventory.css');
	$to_include = '<link rel="stylesheet" type="text/css" href="' . $aux_css_url . '">';
}

//main showcase & infopages (those have their own set of variables)
?>
<!-- prokat palatok web-site -->
<!DOCTYPE html>
<html lang='ru'>
<head>
  <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<meta name="keywords" content="<?php echo $page_keywords; ?>">
	<meta name="description" content="<?php echo $page_description; ?>">

  <title><?php echo $page_title; ?></title>
	
	<!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous"> -->

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

<body itemscope itemtype="https://schema.org/Service">
	<meta itemprop="serviceType" content="Прокат туристического снаряжения" />
	<header>
	<div id="overlay" class="overlay"></div>
	<!-- slider -->	
	<div id="slider">
		<div id="about" itemscope itemtype="https://schema.org/Organization">
			<a class="header-link" href="<?php echo WWW_ROOT; ?>" itemprop="url"><span itemprop="name">Прокат палаток</span> и туристического снаряжения в <span itemprop="areaServed"><?php echo CONTACTS_ADDRESS_CITY; ?></span>е</a>
			<a class="header-link contacts" href="<?php echo WWW_ROOT . '/contacts/#contacts_kupchino'; ?>"><span>м. Купчино</span> <span itemprop="telephone"><?php echo CONTACTS_PHONE_KUPCHINO; ?></span></a>
		</div>
		<nav id="header-nav" aria-label="header-nav">
			<ul id="menu-top">
				<li><a href="<?php echo WWW_ROOT . '/usloviya-prokata/'; ?>">Условия проката</a></li>
				<li><a href="<?php echo WWW_ROOT . '/nashi-preimuschestva/'; ?>">Наши преимущества</a></li>
				<li><a href="https://vk.com/topic-53310491_28269369" target="new" >Отзывы</a></li>
				<li><a href="<?php echo WWW_ROOT . '/contacts/'; ?>">Пункты проката</a></li>
			</ul>			
			<a class="header-link contacts" href="<?php echo WWW_ROOT . '/contacts/#contacts_dybenko'; ?>">Кудрово <?php echo CONTACTS_PHONE_KUDROVO; ?></a>
		</nav>
		<a id="quotes-link" href="https://vk.com/topic-53310491_28269369" target="new">
		<div id="quotes">
			<!-- <p><script type="text/javascript" language="JavaScript" src="<?php //echo url_for(WWW_JS . '/quotes.js'); ?>"></script></p> -->
			<p><?php echo $result['text']; ?><br><?php echo $result['user'] == 'DELETED' ? '' : $result['user'] . ', '; ?> <?php echo $result['date']; ?></p>
		</div>
		</a>
	</div>
	<!-- /slider -->
</header>

<!-- menutop -->
<div id="wrapper-nav">
	<!-- main navigation -->
	<nav id="main-nav" aria-label="main-nav">
		<ul id="menu-main" itemprop="hasOfferCatalog" itemscope itemtype="https://schema.org/OfferCatalog">
			<li id="equip" itemprop="itemListElement" itemscope itemtype="https://schema.org/OfferCatalog"><a href="<?php echo WWW_ROOT; ?>"><span itemprop="name">Cнаряжение</span></a></li>
			<li id="tent" itemprop="itemListElement" itemscope itemtype="https://schema.org/OfferCatalog"><a href="<?php echo WWW_ROOT . '/palatki/'; ?>"><span itemprop="name">Палатки</span></a></li>
			<li id="sleep" itemprop="itemListElement" itemscope itemtype="https://schema.org/OfferCatalog"><a href="<?php echo WWW_ROOT . '/spalniki/'; ?>"><span itemprop="name">Спальники</span></a></li>
			<li id="mat" itemprop="itemListElement" itemscope itemtype="https://schema.org/OfferCatalog"><a href="<?php echo WWW_ROOT . '/kovriki/'; ?>"><span itemprop="name">Коврики</span></a></li>
			<li id="shelter" itemprop="itemListElement" itemscope itemtype="https://schema.org/OfferCatalog"><a href="<?php echo WWW_ROOT . '/shatry-i-tenty/'; ?>"><span itemprop="name">Шатры и тенты</span></a></li>
			<li id="other" itemprop="itemListElement" itemscope itemtype="https://schema.org/OfferCatalog"><a href="<?php echo WWW_ROOT . '/poleznie-veshi/'; ?>"><span itemprop="name">Полезные вещи</span></a></li>
			<li id="special" itemprop="itemListElement" itemscope itemtype="https://schema.org/OfferCatalog"><a href="<?php echo WWW_ROOT . '/pohodnye-komplekty/'; ?>"><span itemprop="name">Комплекты</span></a></li>
			<li id="camping" itemprop="itemListElement" itemscope itemtype="https://schema.org/OfferCatalog"><a href="<?php echo WWW_ROOT . '/palatochny-lager/'; ?>"><span itemprop="name">Палаточный лагерь</span></a></li>
			<li id="contacts"><a href="<?php echo WWW_ROOT . '/contacts/'; ?>">Контакты</a></li>
		</ul>	
		<div id="menu-btn">
			<!-- <i class="fas fa-bars"></i> -->
			<img width="46" height="46" alt="burger svg" src="<?php echo url_for(WWW_IMG . '/bars.svg'); ?>"></img>
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
			<li><a class="submenu" href="<?php echo WWW_ROOT . '/pohodnye-komplekty/'; ?>">Комплекты</a></li>
			<li><a class="subheader" href="<?php echo WWW_ROOT . '/palatochny-lager/'; ?>">Палаточный лагерь</a></li>
			<li><a class="subheader" href="<?php echo WWW_ROOT . '/usloviya-prokata/'; ?>">Условия аренды</a></li>
			<li><a class="submenu" href="<?php echo WWW_ROOT . '/usloviya-prokata/?question=payment#section_payment'; ?>">Оплата</a></li>
			<li><a class="submenu" href="<?php echo WWW_ROOT . '/usloviya-prokata/?question=bronirovanie#section_bronirovanie'; ?>">Бронирование</a></li>
			<li><a class="submenu" href="<?php echo WWW_ROOT . '/dostavka/'; ?>">Доставка</a></li>
			<li><a class="submenu" href="<?php echo WWW_ROOT . '/usloviya-prokata/?question=discount#section_discount'; ?>">Скидки</a></li>
			<li><a class="submenu" href="<?php echo WWW_ROOT . '/nashi-preimuschestva/'; ?>">Наши преимущества</a></li>
			<li><a class="submenu" href="<?php echo WWW_ROOT . '/politika-vozvrata/'; ?>">Политика возврата</a></li>
			<li><a class="subheader" target="new" href="https://vk.com/topic-53310491_28269369">Отзывы</a></li>
			<li><a class="subheader" href="<?php echo WWW_ROOT . '/contacts/'; ?>">Контакты</a></li>
		</ul>
	</nav>
	<!-- /side navigation -->

<?php /*include('basket.php');*/?>
<!-- /menuTop -->

<!-- content -->
<div id="wrapper">
	<div id="content" class="<?php echo $page_content_class; ?>">

<?php include(TPL_PATH . '/breadcrumbs.php'); ?>