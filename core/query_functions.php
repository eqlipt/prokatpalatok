<?php

// Inventory
function find_all_inventory_items() {
	global $db;
	
	$sql = "SELECT * FROM inventory ";
	$sql .= "ORDER BY id ASC;";
	
	$result = mysqli_query($db, $sql);
	
	confirm_query_result($result);
	return $result;
}

function find_inventory_items_in_stock() {
	global $db;
	
	$sql = "SELECT * FROM inventory ";
	$sql .= "WHERE quantity>'0' ";
	$sql .= "ORDER BY id ASC;";
	
	$result = mysqli_query($db, $sql);
	
	confirm_query_result($result);
	return $result;
}

function find_sidebar_inventory_items() {
	global $db;
	
	$sql = "SELECT * FROM inventory ";
	$sql .= "WHERE visible='1' ";
	$sql .= "AND display_on_side='1' ";
	$sql .= "ORDER BY RAND() LIMIT 4;";
	
	$result = mysqli_query($db, $sql);
	
	confirm_query_result($result);
	return $result;
}

function find_all_category_items() {
	global $db;
	
	$sql = "SELECT * FROM category ";
	$sql .= "WHERE visible='1' ";
	$sql .= "ORDER BY id ASC;";
	
	$result = mysqli_query($db, $sql);
	
	confirm_query_result($result);
	return $result;
}

function find_inventory_by_category($category_id) {
	global $db;
	
	$sql = "SELECT * FROM inventory ";
	$sql .= "WHERE category_id='" . db_escape($db, $category_id) . "' ";
	$sql .= "AND visible='1';";
	
	$result = mysqli_query($db, $sql);
	confirm_query_result($result);
	return $result;
}

function find_inventory_by_id($id) {
	global $db;

	$sql = "SELECT * FROM inventory ";
	$sql .= "WHERE id='" . db_escape($db, $id) . "';";

	$result = mysqli_query($db, $sql);
	confirm_query_result($result, $sql);
    $inventory_item = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $inventory_item;
}

function find_category_by_id($id) {
	global $db;

	$sql = "SELECT * FROM category ";
	$sql .= "WHERE id='" . db_escape($db, $id) . "' ";
	$sql .= "AND visible='1';";

	$result = mysqli_query($db, $sql);
	confirm_query_result($result, $sql);
    $category_item = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $category_item;
}

// Admins

function create_admin($username) {
	global $db;

	$sql = "INSERT INTO admins ";
	$sql .= "(username) ";
	$sql .= "VALUES (";
	$sql .= "'" . db_escape($db, $username) . "'";
	$sql .= ")";

	$result = mysqli_query($db, $sql);
	confirm_query_result($result);
	return mysqli_insert_id($db);
}

function find_admin_by_id($admin_id) {
    global $db;

	$sql = "SELECT * FROM admins ";
    $sql .= "WHERE id='" . db_escape($db, $admin_id) . "'";

	$result = mysqli_query($db, $sql);
	confirm_query_result($result, $sql);
	$admin = mysqli_fetch_assoc($result);
	mysqli_free_result($result);
	return $admin;
}

function find_admin_by_username($username) {
	global $db;

	$sql = "SELECT * FROM admins ";
	$sql .= "WHERE username='" . db_escape($db, $username) . "' ";
	$sql .= "LIMIT 1";
	
	$result = mysqli_query($db, $sql);
	confirm_query_result($result);
	$admin = mysqli_fetch_assoc($result);
	mysqli_free_result($result);
	return $admin;
}


// Orders
function has_orders($admin_id) {
    global $db;
    
	$sql = "SELECT id FROM orders ";
    $sql .= "WHERE admin_id='" . db_escape($db, $admin_id) . "'";

    $result = mysqli_query($db, $sql);
    if($result->num_rows == 1) {
        return true;
    } else {
        return false;
    }
}

function find_all_orders($admin_id) {
    global $db;

	$sql = "SELECT * FROM orders ";
	$sql .= "WHERE admin_id='" . db_escape($db, $admin_id) . "' ";
    $sql .= "ORDER BY id DESC";

	$result_set = mysqli_query($db, $sql);
	confirm_query_result($result_set, $sql);
	return $result_set;
}

function find_current_orders($admin_id) {
    global $db;

	$sql = "SELECT * FROM orders ";
	$sql .= "WHERE admin_id='" . db_escape($db, $admin_id) . "' ";
	$sql .= "AND (end_date > '" . date('Y') . "-01-01' ";
	$sql .= "OR id >= " . substr(date('Y'), -2) . "000) ";
    $sql .= "ORDER BY id DESC";

	$result_set = mysqli_query($db, $sql);
	confirm_query_result($result_set, $sql);
	return $result_set;
}

function find_last_active_order($admin_id) {
    global $db;
    
	$sql = "SELECT id FROM orders ";
    $sql .= "WHERE admin_id='" . db_escape($db, $admin_id) . "' ";
	$sql .= "AND status_id='1' "; // статус 1 означает "заказ в корзине"
	$sql .= "ORDER BY id DESC "; // самая последняя корзина
	$sql .= "LIMIT 1"; // убеждаемся, что активная корзина будет только одна на случай, если есть по какой-то причине незакрытые корзины

	$result = mysqli_query($db, $sql);
	confirm_query_result($result);
	$order = mysqli_fetch_assoc($result);
	return $order['id'];
}

function find_non_active_orders($admin_id) {
	global $db;

	$sql = "SELECT * FROM orders ";
	$sql .= "WHERE admin_id='" . db_escape($db, $admin_id) . "' ";
	$sql .= "AND status_id > '1' ";
    $sql .= "ORDER BY id DESC";

	$result_set = mysqli_query($db, $sql);
	confirm_query_result($result_set, $sql);
	return $result_set;
}

function find_order_by_id($order_id) {
	global $db;

	$sql = "SELECT * FROM orders ";
	$sql .= "WHERE id='" . db_escape($db, $order_id) . "'";

	$result = mysqli_query($db, $sql);
	confirm_query_result($result, $sql);
	$order = mysqli_fetch_assoc($result);
	mysqli_free_result($result);
	return $order;
}

function find_oldest_cancelled_order() {
	global $db;

	$sql = "SELECT id FROM orders ";
	$sql .= "WHERE status_id='0' "; // статус 0 означает "отменён"
	$sql .= "AND start_date >='" . date('Y') . "-00-00' ";
	$sql .= "ORDER BY id ASC "; // самый старый заказ
	$sql .= "LIMIT 1";

	$result = mysqli_query($db, $sql);
	confirm_query_result($result);
	$order = mysqli_fetch_assoc($result);
	return $order['id'];
}

function create_order($admin_id, $order) {
    global $db;
    
	$sql = "INSERT INTO orders ";
	$sql .= "(admin_id, inventory, duration, price, deposit, customer_returning, customer_name, customer_tel, customer_address, comment, upfront) ";
	$sql .= "VALUES (";
	$sql .= "'" . db_escape($db, $admin_id) . "', ";
	$sql .= "'" . db_escape($db, $order['inventory']) . "', ";
	$sql .= "'" . db_escape($db, $order['duration']) . "', ";
	$sql .= "'" . db_escape($db, $order['price']) . "', ";
	$sql .= "'" . db_escape($db, $order['deposit']) . "', ";
	$sql .= "'" . db_escape($db, $order['customer_returning']) . "', ";
	$sql .= "'" . db_escape($db, $order['customer_name']) . "', ";
	$sql .= "'" . db_escape($db, $order['customer_tel']) . "', ";
	$sql .= "'" . db_escape($db, $order['customer_address']) . "', ";
	$sql .= "'" . db_escape($db, $order['comment']) . "', ";
	$sql .= "'" . db_escape($db, $order['upfront']) . "'";
	$sql .= ")";

	$result = mysqli_query($db, $sql);
	if($result) {
		return mysqli_insert_id($db);
	} else {
		echo mysqli_error($db);
		db_disconnect($db);
		exit($sql);
	}
}

function update_order($order) {
    global $db;
    
	$sql = "UPDATE orders SET ";
	$sql .= "start_date='" . db_escape($db, $order['start_date']) . "', ";
	$sql .= "end_date='" . db_escape($db, $order['end_date']) . "', ";
	$sql .= "inventory='" . db_escape($db, $order['inventory']) . "', ";
	$sql .= "duration='" . db_escape($db, $order['duration']) . "', ";
	$sql .= "price='" . db_escape($db, $order['price']) . "', ";
	$sql .= "deposit='" . db_escape($db, $order['deposit']) . "', ";
	$sql .= "customer_returning='" . db_escape($db, $order['customer_returning']) . "', ";
	$sql .= "customer_name='" . db_escape($db, $order['customer_name']) . "', ";
	$sql .= "customer_tel='" . db_escape($db, $order['customer_tel']) . "', ";
	$sql .= "customer_address='" . db_escape($db, $order['customer_address']) . "', ";
	$sql .= "comment='" . db_escape($db, $order['comment']) . "', ";
	$sql .= "upfront='" . db_escape($db, $order['upfront']) . "' ";
	$sql .= "WHERE id='" . db_escape($db, $order['id']) . "' ";
	$sql .= "LIMIT 1";

	$result = mysqli_query($db, $sql);
	if($result) {
		return true;
	} else {
		echo mysqli_error($db);
		db_disconnect($db);
		exit($sql);
	}
}

function close_order($order_id) {
	update_status($order_id, '2');
}

function update_inventory($order_id, $inventory_items) {
    global $db;
    
	$sql = "UPDATE orders SET ";
	$sql .= "inventory='" . db_escape($db, $inventory_items) . "' ";
	$sql .= "WHERE id='" . db_escape($db, $order_id) . "' ";
	$sql .= "LIMIT 1";

	$result = mysqli_query($db, $sql);
	if($result) {
		return true;
	} else {
		echo mysqli_error($db);
		db_disconnect($db);
		exit($sql);
	}
}

function update_duration($order_id, $duration) {
    global $db;
    
	$sql = "UPDATE orders SET ";
	$sql .= "duration='" . db_escape($db, $duration) . "' ";
	$sql .= "WHERE id='" . db_escape($db, $order_id) . "' ";
	$sql .= "LIMIT 1";

	$result = mysqli_query($db, $sql);
	if($result) {
		return true;
	} else {
		echo mysqli_error($db);
		db_disconnect($db);
		exit($sql);
	}
}

function update_status($order_id, $status_id) {
    global $db;
    
	$sql = "UPDATE orders SET ";
	$sql .= "status_id='" . db_escape($db, $status_id) . "' ";
	$sql .= "WHERE id='" . db_escape($db, $order_id) . "' ";
	$sql .= "LIMIT 1";

	$result = mysqli_query($db, $sql);
	if($result) {
		return true;
	} else {
		echo mysqli_error($db);
		db_disconnect($db);
		exit($sql);
	}
}

function find_status_by_status_id($status_id) {
	global $db;

	$sql = "SELECT status_name FROM order_status ";
	$sql .= "WHERE status_id='" . db_escape($db, $status_id) . "' ";

	$result = mysqli_query($db, $sql);
	confirm_query_result($result);
	$status = mysqli_fetch_assoc($result);
	$status_name = $status['status_name'];
	mysqli_free_result($result);
	return $status_name;
}