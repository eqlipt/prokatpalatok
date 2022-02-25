<?php

require_once('../../core/initialize.php'); 

$page_content_class = "infopage";

$page_inventory_images = array("inv1", "inv2");echo serialize($page_inventory_images);exit;

include(TPL_PATH . '/header.php');
include(TPL_PATH . '/left.php');
include(TPL_PATH . '/inventory.php');
include(TPL_PATH . '/right.php');
include(TPL_PATH . '/footer.php');

?>