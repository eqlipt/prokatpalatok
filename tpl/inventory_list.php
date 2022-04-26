<table class="selection">

<?php
$inventory_set = find_inventory_items_in_stock();
while($inventory_item = mysqli_fetch_assoc($inventory_set)) {
$category = find_category_by_id($inventory_item['category_id']);
?>
    <!-- передаём в process.php под меткой add идентификатор товара $inventory_item['id'] -->
    <form action="process.php" method="post">
        
        <!-- передаём в process.php номер заказа order_id -->
        <input type="hidden" name="order_id" value="<?php echo (isset($order['id']) ? $order['id'] : ""); ?>">

        <tr>
            <td class="button-placeholder">
                <!-- поле действия по добавлению товара в количестве одного -->
                <!-- [add] => inventory_id -->
                <button type="submit" class="img-placeholder" name="add" value="<?php echo $inventory_item['id']; ?>">
                    <img class="button" src="<?php echo url_for(WWW_IMG . '/inventory/' . $inventory_item['inventory_item_img_path'] . '_160.jpg'); ?>">
                </button>
            </td>
            <td>
                <!-- наименование товара -->
                <a href="<?php echo url_for('/' . $category['path'] . '/' . $inventory_item['path'] . '/'); ?>" target="new"><?php echo $inventory_item['name']; ?></a>
            </td>
        </tr>
    </form>
    <?php } ?>
    <?php mysqli_free_result($inventory_set); ?>
</table>