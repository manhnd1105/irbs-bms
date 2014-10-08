<div class="Table">
    <div class="Heading">
        <div class="Cell">
            <p>ID</p>
        </div>
        <div class="Cell">
            <p>Price</p>
        </div>
        <div class="Cell">
            <p>Description</p>
        </div>
        <div class="Cell">
            <p>OrderId</p>
        </div>
        <div class="Cell">
            <p>Quantity</p>
        </div>
        <div class="Cell">
            <p>Total</p>
        </div>
    </div>

<?php
foreach ($price_info as $row) {
    echo "<div class='Row'>";
    $price_id_id = $row['id'];
    foreach ($row as $cell) {
        if (!is_array($cell)) {
            echo "<div class='Cell'>";
            echo $cell;
            echo "</div>";
        }
    }

    /* End of a row */
    echo '</div>';
}
    