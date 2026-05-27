<?php
require_once('../core/initialize.php');

unset($_SESSION['admin_id']);
unset($_SESSION['username']);
unset($_SESSION['order']);

redirect_to(url_for('admin/login.php'));

?>