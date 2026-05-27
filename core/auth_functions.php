<?php

// Performs all actions necessary to log in an admin
function log_in_admin($admin) {
// Renerating the ID protects the admin from session fixation.
    session_regenerate_id();
    $_SESSION['admin_id'] = $admin['id'];
    //$_SESSION['last_login'] = time();
    //$_SESSION['username'] = $admin['username'];
    setcookie('admin_id', $admin['id'], (time() + 60*60*24*365));
    return true;
}

function check_login() {
    if(isset($_COOKIE['admin_id']) && !isset($_SESSION['admin_id'])) {
        $_SESSION['admin_id'] = $_COOKIE['admin_id'];
    }
    if(!isset($_SESSION['admin_id'])) {
      redirect_to(url_for('admin/login.php'));
    } else {
        $admin = find_admin_by_id($_SESSION['admin_id']);
    }
    return $admin;
}

?>