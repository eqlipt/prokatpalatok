<?php

require_once('../../core/initialize.php'); 
$inventory_id = '6';
$page_content_class = "infopage";

include(TPL_PATH . '/header.php');
include(TPL_PATH . '/left.php');
include(TPL_PATH . '/inventory.php');
include(TPL_PATH . '/right.php');
include(TPL_PATH . '/footer.php');

?>