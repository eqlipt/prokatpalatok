<?php
require_once('db_credentials.php');

function db_connect() {
	$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	confirm_db_connect();
	mysqli_set_charset($connection, "utf8");
	return $connection;
}

function db_disconnect($connection) {
	if(isset($connection)){
		mysqli_close($connection);
	}
}

function confirm_db_connect() {
	if(mysqli_connect_errno()){
		$msg = "System message: Database connection failed: ";
		$msg .= mysqli_connect_error();
		$msg .= " (" . mysqli_connect_errno() . ")";
		exit($msg);
	}
}

function confirm_query_result($query_result, $sql='') {
	if(!$query_result) {
		exit("Database query failed: " . $sql);
	}
}

function db_escape($db, $string) {
	return mysqli_real_escape_string($db, $string);
}
?>