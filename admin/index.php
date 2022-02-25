<?php
require_once('../core/initialize.php');

if(!isset($_SESSION['admin_id'])) {
    redirect_to(url_for('admin/login.php'));
} else {
    redirect_to(url_for('admin/order.php'));
}
