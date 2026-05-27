<?php

//universal start of breadcrumbs line
$breadcrumbs = '<a href="' . WWW_ROOT . '">prokatpalatok.ru</a> > ';

//case of inventory item breadcrumbs
if(isset($inventory_item)) {
    $breadcrumbs .=  '<a href="' . WWW_ROOT . '/' . $category_item['path'] . '/">' . $category_item['name'] . '</a> > ' . $inventory_item['name'];

//case of category only breadcrumbs
} elseif (isset($category_item)) {
    $breadcrumbs .= $category_item['name'];

//case of other infopages breadcrumbs
} else {
    $breadcrumbs .= isset($page_breadcrumbs) ? $page_breadcrumbs : '';
}

?>
	<!-- breadcrumbs -->
	<div id="breadcrumbs">
		<p><?php echo $breadcrumbs; ?></p>
	</div>
	<!-- /breadcrumbs -->