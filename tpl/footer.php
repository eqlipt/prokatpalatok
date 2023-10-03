</div>
</div>
<!-- /content -->
<footer>
	<div id="footer-top">
		<div class="footer-col">
			<h2>Контактная информация</h2>
			<p itemprop="address" itemscope itemtype="http://schema.org/PostalAddress"><a target="new" href="https://yandex.ru/maps/?um=constructor%3AO9cNFsNT6JOb397YEJD0RC2DffHxj3pj&source=constructorLink"><span itemprop="addressLocality"><?php echo CONTACTS_ADDRESS_CITY; ?></span>,<br><span itemprop="streetAddress"><?php echo CONTACTS_ADDRESS_STREET_KUPCHINO; ?></span></a></p>
			<p><?php echo CONTACTS_PHONE_KUPCHINO; ?></p><br>
			<p><a target="new" href="https://yandex.ru/maps/?um=constructor%3A5b3981a2f61cd625a1fa2e7ae5a749a95dc73eb14e8d35e0d7c8d5194d2f7bae&source=constructorLink"><?php echo CONTACTS_ADDRESS_CITY; ?>,<br><?php echo CONTACTS_ADDRESS_STREET_KUDROVO; ?></a></p>
			<p><?php echo CONTACTS_PHONE_KUDROVO; ?></p><br>
			<p><a target="new" href="https://yandex.ru/maps/?um=constructor%3Aec7bde08945c8b772d303db69503610220848afb64416b42bfd63957c246eaa7&source=constructorLink"><?php echo CONTACTS_ADDRESS_CITY; ?>,<br><?php echo CONTACTS_ADDRESS_STREET_KOMEND; ?></a></p>
			<p><?php echo CONTACTS_PHONE_KOMEND; ?></p>
			<meta itemprop="openingHours" datetime="We-Mo 9:00−21:00"></meta>
		</div>
		<div class="footer-col">
			<h2>Клиентам</h2>
			<p><a href="<?php echo WWW_ROOT . '/howto.php'; ?>">Условия проката</a></p>
			<p><a href="https://vk.com/topic-53310491_28269369">Отзывы</a></p>
			<p><a href="<?php echo WWW_ROOT . '/pay.php'; ?>">Оплата</a></p>
			<p><a href="<?php echo WWW_ROOT . '/dostavka/'; ?>">Доставка</a></p>
			<p><a href="<?php echo WWW_ROOT . '/pay.php#section_discount'; ?>">Скидки</a></p>
			<p><a href="<?php echo WWW_ROOT . '/nashi-preimuschestva/'; ?>">Наши преимущества</a></p>
			<p><a href="<?php echo WWW_ROOT . '/palatochny-lager/'; ?>">Отдых под ключ</a></p>
			<p><a href="<?php echo WWW_ROOT . '/contacts/'; ?>">Контакты</a></p>
		</div>
	</div>
	<div id="footer-bottom">
		<p>&copy; 2013-<?php echo date("Y"); ?> prokatpalatok</p>
		<!--p>Разработано Adequacy Studio</p-->
	</div>
</footer>

<!-- hide navbar on scroll script-->
<script type="text/javascript" language="JavaScript" src="<?php echo url_for(WWW_JS . '/scroll.js'); ?>"></script>
<!-- sidenavbar script -->
<script type="text/javascript" language="JavaScript" src="<?php echo url_for(WWW_JS . '/sidenav.js'); ?>"></script>
<!-- slider script -->	
<script type="text/javascript" language="JavaScript" src="<?php echo url_for(WWW_JS . '/slider.js'); ?>"></script>
<!-- basket script -->	
<!--script type="text/javascript" language="JavaScript" src="<?php echo url_for(WWW_JS . '/basket.js'); ?>"></script-->

</body>
</html>