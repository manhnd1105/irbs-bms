<!--<div class="Table">-->
<!--    <div class="Heading">-->
<!--        <div class="Cell">-->
<!--            <p>ID</p>-->
<!--        </div>-->
<!--        <div class="Cell">-->
<!--            <p>Price</p>-->
<!--        </div>-->
<!--        <div class="Cell">-->
<!--            <p>Description</p>-->
<!--        </div>-->
<!--        <div class="Cell">-->
<!--            <p>OrderId</p>-->
<!--        </div>-->
<!--        <div class="Cell">-->
<!--            <p>Quantity</p>-->
<!--        </div>-->
<!--        <div class="Cell">-->
<!--            <p>Total</p>-->
<!--        </div>-->
<!--    </div>-->
<!---->
<?php
//foreach ($price_info as $row) {
//    echo "<div class='Row'>";
//    $price_id_id = $row['id'];
//    foreach ($row as $cell) {
//        if (!is_array($cell)) {
//            echo "<div class='Cell'>";
//            echo $cell;
//            echo "</div>";
//        }
//    }
//
//    /* End of a row */
//    echo '</div>';
//}
//

echo '<div class="row">';

echo '<div  class="col-sm-12">';


echo '<div class="panel panel-default">';
echo '<div class="panel-heading">Account Management</div>';
echo '<div class="table-responsive">';
echo '<table class="table">';
echo '<tr>';
echo '<td> ID</td>';
echo '<td> Price </td>';
echo '<td> Description </td>';
echo '<td> Order ID </td>';
echo '<td> Quantity </td>';
echo '<td> Total </td>';

echo '</tr>';


foreach ($price_info as $row) {
    $id = $row['id'];

    echo '<tr class="success"">';
    echo '<td >' . $id . '</td>';
    echo '<td >' . $row['price'] . '</td>';
    echo '<td>' . $row['description'] . '</td>';
    echo '<td>' . $row['order_id'] . '</td>';
    echo '<td>' . $row['quantity'] . '</td>';
    echo '<td>' . $row['total'] . '</td>';
    echo '</tr>';
}

echo '</table>';
echo '</div>';
echo '</div>';