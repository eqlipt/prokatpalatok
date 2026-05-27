<?php
require_once('../core/initialize.php');
require_once('../core/order_functions.php');
require_once('../core/auth_functions.php');
require_once('../core/validation_functions.php');

$errors = [];
$username = '';
$password = '';

if(is_post_request()) {

    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // валидация формы
    if(is_blank($username)) {
        $errors[] = 'Username cannot be blank';
    }
    if(is_blank($password)) {
        $errors[] = 'Password cannot be blank';
    }

    if(empty($errors)) {
        // нет ошибок валидации username и password
        $admin = find_admin_by_username($username);

        // сообщение об ошибке логина одинаковое не зависимо от ошибки username или password
        $login_fail_message = 'Login failed';

        if($admin) {
            // username существует
            if(password_verify($password, $admin['password'])) {
                // верный пароль
                log_in_admin($admin);
                redirect_to(url_for('admin/order.php'));
            } else {
                // введён неверный пароль
                $errors[] = $login_fail_message;
            }
        } else {
            // username не существует
            $errors[] = $login_fail_message;
        }
    }
}

// отображение ошибок если были
if(!empty($errors)){
    echo display_errors($errors);
}
?>

<!-- форма логина -->
<head>
	<link rel="stylesheet" type="text/css" href="<?php echo url_for(WWW_CSS . '/login.css'); ?>">
</head>
<body>
	<div class="form__wrapper">
		<form action="login.php" method="post" style="margin: auto; display: flex; flex-direction: column; gap: 20px;">
				<input type="text" name="username" value="<?php echo $username ?? ''; ?>" placeholder="login">
				<input type="password" name="password" value="" placeholder="password">
				<input type="submit" value="Login">
				<a href="logout.php">Logout</a>
		</form>
	</div>
<body>