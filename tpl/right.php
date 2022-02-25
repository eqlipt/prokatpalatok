<?php

//prepare items to display on sidebar
$inventory_set = find_sidebar_inventory_items();

?>

<!-- right -->
<section id="right"> 
    <a href="<?php echo WWW_ROOT; ?>">
        <h3>Снаряжение</h3>
    </a>
<?php 
while($inventory_item = mysqli_fetch_assoc($inventory_set)) {
$category_item = find_category_by_id($inventory_item['category_id']); ?>
    <div id="<?php echo $inventory_item['id']; ?>" class="side-card">
        <a href="<?php echo WWW_ROOT . '/' . $category_item['path'] . '/' . $inventory_item['path'] . '/'; ?>">
            <img class="box" alt="<?php $inventory_item['inventory_item_img_alt']; ?>" src="<?php echo url_for(WWW_IMG . '/inventory/' . $inventory_item['inventory_item_img_path'] . '_160.jpg'); ?>"/>
            <p><?php echo $inventory_item['name_sidebar']; ?></p>
        </a>
    </div>
<?php }
mysqli_free_result($inventory_set);
?>
</section>
<!-- /right -->