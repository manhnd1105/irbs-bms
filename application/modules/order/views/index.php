<!--<div class="Table">-->
<!--    <div class="Heading">-->
<!--        <div class="Cell">-->
<!--            <p>Description</p>-->
<!--        </div>-->
<!--        <div class="Cell">-->
<!--            <p>Creation date</p>-->
<!--        </div>-->
<!--        <div class="Cell">-->
<!--            <p>Creator</p>-->
<!--        </div>-->
<!--        <div class="Cell">-->
<!--            <p>ID</p>-->
<!--        </div>-->
<!--    </div>-->
<!---->
<!--    --><?php
//    /** @var $info array */
//    foreach ($info as $row) {
//        /* Begin of a row */
//        echo "<div class='Row'>";
//        $order_id = $row['id'];
//        foreach ($row as $cell) {
//            if (!is_array($cell)) {
//                /* Begin of a cell */
//                echo "<div class='Cell'>";
//                echo $cell;
//                echo "</div>";
//                /* End of a cell */
//            }
//        }
//        //Add additional crud cells
//        echo "<div class='Cell'>";
//        echo anchor('order/order_controller/view_update/' . $order_id, 'Edit');
//        echo "</div>";
//        echo "<div class='Cell'>";
//        echo anchor('order/order_controller/delete/' . $order_id, 'Remove');
//        echo "</div>";
//        echo "<div class='Cell'>";
//        echo anchor('order/order_controller/view_create', 'Create');
//        echo "</div>";
//        /* End of a row */
//        echo '</div>';
//
//    }
//
//
?>
<!--</div>-->
<?php

echo '<div>&nbsp;</div>';
echo '<div>&nbsp;</div>';
echo '<div>&nbsp;</div>';

echo '<div class="panel panel-default">';
echo '<div class="panel-heading">Order Management</div>';
echo '<div class="table-responsive">';
echo '<table class="table">';
echo '<tr>';
echo '<td> Id</td>';
echo '<td> Description</td>';
echo '<td> Create date </td>';
echo '<td> Creator</td>';
echo '<td> Action</td>';

echo '</tr>';


foreach ($info as $row) {
    $order_id = $row['id'];

    echo '<tr class="success"">';
    echo '<td >' . $row['id'] . '</td>';
    echo '<td >' . $row['description'] . '</td>';
    echo '<td>' . $row['creation_date'] . '</td>';
    echo '<td>' . $row['creator'] . '</td>';
    echo '<td>' . anchor('order/order_controller/view_create', 'Create'), '|', anchor('order/order_controller/view_update/' . $order_id, 'Edit'), '|', anchor('order/order_controller/delete/' . $order_id, 'Remove') . '</td>';

    echo '</tr>';
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