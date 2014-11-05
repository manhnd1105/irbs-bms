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
echo "<script src='" . base_url() . "application/modules/order/views/js/assign_worker.js'></script>";

echo '<div>&nbsp;</div>';
echo '<div>&nbsp;</div>';
echo '<div>&nbsp;</div>';

echo '<div class="panel panel-default">';
echo '<div class="panel-heading">Orders</div>';
echo "<div class='table-responsive'>";
echo '<table class="table">';
echo '<tr>';
echo '<td></td>';
echo '<td> Id</td>';
echo '<td> Description</td>';
echo '<td> Create date </td>';
echo '<td> Creator</td>';

echo '</tr>';
$i = 1;
foreach ($orders as $row) {
    $order_id = $row['id'];
    if ($i % 2 == 1) {
        echo '<tr class="success">';
    } else {
        echo '<tr>';
    }
    echo '<td >' . form_checkbox('order_list[]', $row['id']) . '</td>';
    echo '<td >' . $row['id'] . '</td>';
    echo '<td >' . $row['description'] . '</td>';
    echo '<td>' . $row['creation_date'] . '</td>';
    echo '<td>' . $row['creator'] . '</td>';
    echo '</tr>';
    $i++;
}

echo '</table>';
echo '</div>';
echo '</div>';


echo '<div class="panel panel-default">';
echo '<div class="panel-heading">Workers</div>';
echo "<div class='table-responsive' id='order_list'>";
echo '<table class="table">';
echo '<tr>';
echo '<td></td>';
echo '<td> Id</td>';
echo '<td> Account name</td>';
echo '<td> Real name </td>';
echo '<td> Email</td>';

echo '</tr>';
$i = 1;
foreach ($workers as $row) {
    $order_id = $row['id'];
    if ($i % 2 == 1) {
        echo '<tr class="success">';
    } else {
        echo '<tr>';
    }
    echo '<td >' . form_checkbox('acc_list[]', $row['id']) . '</td>';
    echo '<td >' . $row['id'] . '</td>';
    echo '<td >' . $row['account_name'] . '</td>';
    echo '<td>' . $row['staff_name'] . '</td>';
    echo '<td>' . $row['email'] . '</td>';
    echo '</tr>';
    $i++;
}
echo '</table>';
echo '</div>';
echo '</div>';

echo form_button('btn_assign', 'Assign', "id='btn_assign'");