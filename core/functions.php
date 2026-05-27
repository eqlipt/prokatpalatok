<?php

function url_for($url_path) {
    if($url_path[0] != '/') {
        $url_path = '/' . $url_path;
    }
    return WWW_ROOT . $url_path;
}

function h($string = "") {
    return htmlspecialchars($string);
}

function u($string = "") {
    return urlencode($string);
}

function pre($array) {
	echo "<pre>";
	print_r($array);
	echo "</pre>";
}

function redirect_to($location) {
    header("Location: " . $location);
    exit;
}

function is_post_request() {
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}
  
function is_get_request() {
    return $_SERVER['REQUEST_METHOD'] == 'GET';
}

function display_errors($errors=array()) {
    $output = '';
    if(!empty($errors)) {
      $output .= "<div class='errors'>";
      $output .= "<ul>";
      foreach($errors as $error) {
        $output .= "<li>" . h($error) . "</li>";
      }
      $output .= "</ul></div>";
    }
    return $output;
  }

?>
