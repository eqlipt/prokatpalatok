<div id="order-list">
<?php 
if(isset($_SESSION['admin_id'])) {
    $order_list = find_current_orders($_SESSION['admin_id']);?>

    <!-- список заказов -->
    <form action="process.php" method="post">
        <table style="margin-left: auto; margin-right: 10px;">
        <?php while($order = mysqli_fetch_assoc($order_list)) { ?>
            <?php $status = find_status_by_status_id($order['status_id']); ?>
            <tr>
                <td>
                    <a class="margin" href="<?php echo url_for('admin/order.php?order_id=' . h(u($order['id'])));?>"><?php echo h($order['id']);?></a>
                </td>

                <td class="main-text">
                    <?php echo h($status);?>
                </td>
            </tr>
        <?php } ?>
        </table>
    </form>

<?php } ?>

</div>