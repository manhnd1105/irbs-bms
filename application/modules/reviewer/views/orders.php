<br/>
<div class="row">
    <div class="col-sm-6">
        <div class="list-group">
            <?php
            //var_dump($orders);
            foreach($orders as $col){
                $order_id = $col['id'];
                echo anchor('reviewer/review_controller/view_order_detail/' . $col['id'],
                    '<h4 class="list-group-item-heading">Order:'.$col['id'].
                    '</h4>'.'<p class="list-group-item-text">'.$col['description'].'</p>'.
                    '<p class="list-group-item-text text-muted">'.$col['creation_date'].'</p>',
                    'class="list-group-item"');
            }
            ?>
        </div>
    </div>

</div>