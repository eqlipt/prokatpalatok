<?php

ob_start();
session_start();

define("CORE_PATH", dirname(__FILE__));
define("PROJECT_PATH", dirname(CORE_PATH));
define("TPL_PATH", PROJECT_PATH . '/tpl');
define("WWW_ROOT", '/html/prokat/dev');
define("WWW_CSS", '/css');
define("WWW_JS", '/js');
define("WWW_IMG", '/img');

require_once('functions.php'); 
require_once('database.php');
require_once('query_functions.php');
require_once('validation_functions.php');

// Price constants
define("PRICE_DELIVERY_THRESHOLD_CITY", '3 000');
define("PRICE_DELIVERY_THRESHOLD_SUBURBS", '6 000');


$db = db_connect();

?>