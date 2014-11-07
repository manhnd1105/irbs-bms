<script type="text/javascript">
    base_url = '<?=base_url()?>';
</script>

<?php
echo "<script src='" . base_url() . "assets/js/jquery.js'></script>";
//echo "<script src='" . base_url() . "application/modules/order/views/js/index.js'></script>";


echo '<div>&nbsp;</div>';
echo '<div>&nbsp;</div>';
echo '<div>&nbsp;</div>';

//echo form_label('ID');
//echo form_input('id', '', "id='id'");
//echo form_label('Description');
//echo form_input('desc', '', "id='desc'");
//echo form_label('Creation Date');
//echo form_input('creation_date', '', "id='creation_date'");
//echo form_label('Creator');
//echo form_input('creator', '', "id='creator'");
//echo form_button('btn_filter', 'OK', "id='btn_filter'");

echo '<div class="panel panel-default">';
echo '<div class="panel-heading">Order Management</div>';
echo "<div class='table-responsive' id='order_list'>";
echo '<table class="table">';
echo '<tr>';
echo '<td> Id</td>';
echo '<td> Description</td>';
echo '<td> Create date </td>';
echo '<td> Creator</td>';
echo '<td> Completion</td>';
echo '<td> Action</td>';

echo '</tr>';

if (isset($info)) {
$i = 1;
    foreach ($info as $row) {
        $order_id = $row['id'];
        if ($i % 2 == 1) {
            echo '<tr class="success">';
        } else {
            echo '<tr>';
        }
        echo '<td >' . $row['id'] . '</td>';
        echo '<td >' . anchor('order/order_controller/view_update/' . $order_id, substr($row['description'], 0, 30)) . '</td>';
        echo '<td>' . $row['creation_date'] . '</td>';
        echo '<td>' . $row['creator'] . '</td>';
        echo '<td><div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: ' . $row['progress']. ';">'. $row['progress'] . '</div></td>';
        echo '<td>' . anchor('order/order_controller/delete/' . $order_id, 'Remove') . '</td>';
        echo '</tr>';
        $i++;
    }
}
echo '</table>';
echo '</div>';
echo '</div>';


echo '<div>';
echo '<ul class="pagination">';
echo ' <li class="disabled"><span>&laquo;</span></li>';
echo '<li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>';
echo ' <li class="disabled"><a href="#">2</a> </span></li>';
echo ' <li class="disabled"><a href="#">3</a></li>';
echo ' <li class="disabled"><span>&raquo;</span></li>';
echo '</ul>';
echo '</div>';