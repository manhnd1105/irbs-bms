<div class="Table">
    <div class="Heading">
        <div class="Cell">
            <p>ID</p>
        </div>
        <div class="Cell">
            <p>Description</p>
        </div>
        <div class="Cell">
            <p>Creator</p>
        </div>
        <div class="Cell">
            <p>ID</p>
        </div>
    </div>

    <?php
    /** @var $info array */
    foreach ($info as $row) {
        /* Begin of a row */
        echo "<div class='Row'>";
        $order_id = $row['id'];
        foreach ($row as $cell) {
            if (!is_array($cell)) {
                /* Begin of a cell */
                echo "<div class='Cell'>";
                echo $cell;
                echo "</div>";
                /* End of a cell */
            }
        }
        //Add additional crud cells
        echo "<div class='Cell'>";
        echo anchor('order/order_controller/view_update/' . $order_id, 'Edit');
        echo "</div>";
        echo "<div class='Cell'>";
        echo anchor('order/order_controller/delete/' . $order_id, 'Remove');
        echo "</div>";
        /* End of a row */
        echo '</div>';

    }

    ?>
</div>
<?php
//echo '<div class="row">';
//echo '<div  class="col-sm-4">';
//echo '   <ul class="">';
//echo '  <li class="active"><a href="#">Dashboard</a></li>';
//echo '<li>' . anchor('', 'Make order') . '</li>';
//echo '<li>' . anchor('', 'Trade orders') . '</li>';
//echo '<li>' . anchor('', 'Payment') . '</li>';
//echo ' </ul>';
//echo '</div >';
//echo '<div  class="col-sm-8">';
//
//echo '</div >';
//echo '</div >';

