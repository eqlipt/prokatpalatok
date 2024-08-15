<?php

ob_start();
session_start();

define("CORE_PATH", dirname(__FILE__));
define("PROJECT_PATH", dirname(CORE_PATH));
define("TPL_PATH", PROJECT_PATH . '/tpl');
define("WWW_ROOT", '/prokat-dev/prokatpalatok');
define("WWW_CSS", '/css');
define("WWW_JS", '/js');
define("WWW_IMG", '/img');

require_once('config.php');
require_once('functions.php');
require_once('database.php');
require_once('query_functions.php');
require_once('validation_functions.php');


$db = db_connect();

?>