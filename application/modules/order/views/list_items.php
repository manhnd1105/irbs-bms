<?php
/**
 * Created by PhpStorm.
 * User: manh
 * Date: 11/1/14
 * Time: 3:10 AM
 */



echo '<div>&nbsp;</div>';
echo '<div>&nbsp;</div>';
echo '<div>&nbsp;</div>';


echo '<div class="panel panel-default">';
echo '<div class="panel-heading">Image Management</div>';
echo "<div class='table-responsive' id='order_list'>";
echo '<table class="table">';
echo '<tr>';
echo '<td> Id</td>';
echo '<td> Description</td>';
echo '<td> Link </td>';
echo '<td> Status</td>';
echo '</tr>';

if (isset($info)) {
$i = 1;
    foreach ($info as $row) {
        if ($i % 2 == 1) {
            echo '<tr class="success">';
        } else {
            echo '<tr>';
        }
        echo '<td >' . $row['id'] . '</td>';
        echo '<td >' . $row['description'] . '</td>';
        echo '<td>' . $row['file_changed_path'] . '</td>';
        echo '<td>' . $row['file_status'] . '</td>';
        echo '<td>' . anchor('order/img_controller/view_approve/' . $row['id'], 'Approve') . '</td>';
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