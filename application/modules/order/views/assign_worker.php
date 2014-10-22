<script type="text/javascript">
    base_url = '<?=base_url()?>';
</script>

<?php
/**
 * Created by PhpStorm.
 * User: manh
 * Date: 10/22/14
 * Time: 10:32 PM
 */
echo "<script src='" . base_url() . "assets/js/jquery.js'></script>";
echo "<script src='" . base_url() . "application/modules/order/views/js/index.js'></script>";


echo '<div>&nbsp;</div>';
echo '<div>&nbsp;</div>';
echo '<div>&nbsp;</div>';


echo '<p>Orders</p>';
echo '<ul>';
foreach ($orders as $row)
{
    echo "<li><a entity_id='{$row['id']}' href='#' class='order_info'>{$row['description']}</a></li>";
}
echo '</ul>';

echo '<p>Workers</p>';
echo '<ul>';
foreach ($workers as $row)
{
    echo "<li><a entity_id='{$row['id']}' href='#' class='acc_info'>{$row['id']}</a></li>";
}
echo '</ul>';

echo form_open($module . '/' . $controller . '/' . $action);
echo form_hidden('order_id', '', "id='order_id'");
echo form_label('Selected order: ', 'selected_order');
echo form_hidden('acc_id', '', "id='acc_id'");
echo form_label('Selected worker: ', 'selected_acc');

echo form_button('btn_assign', 'Assign', "id='btn_assign'");