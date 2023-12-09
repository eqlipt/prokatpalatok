<?php

require_once('core/initialize.php');
$page_title = "Прокат палаток в Санкт-Петербурге";
$page_keywords = "прокат палаток спб, аренда спальников, аренда шатров, аренда туристического снаряжения";
$page_description = "Палатки, спальники, коврики, пенки, шатры, рюкзаки и другие полезные вещи для походов и отдыха на природе";
$page_breadcrumbs = "Снаряжение";
$page_content_class = "inventory";

// css
$aux_css_url = url_for(WWW_CSS . '/inventory.css');
$to_include = '<link rel="stylesheet" type="text/css" href="' . $aux_css_url . '">';

include(TPL_PATH . '/header.php');

//showcase has to be rendered for each category
$category_set = find_all_category_items();
while($category_item = mysqli_fetch_assoc($category_set)) {
include(TPL_PATH . '/showcase.php');
}
mysqli_free_result($category_set);

include(TPL_PATH . '/footer.php');

?>