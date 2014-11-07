<?php
/**
 * @var string $module string
 * @var $controller string
 * @var $action string
 * @var $order_info array
 */
echo form_open($module . '/' . $controller . '/' . $action);
echo form_hidden('id', $order_info['id']);

echo '
<br/>
<div class="row">
    <div class="col-sm-1 col-lg-2"></div>
    <div class="col-sm-10 col-lg-8">
        <ul class="list-group">
            <li class="list-group-item">
                <span class="pull-left text-info small"><i class="fa fa-user fa-fw"></i>Description</span><br/>
                <div class="form-group">
                    <input name ="description" class="form-control" value="' . $order_info['description'] . '"/>
                </div>

                <span class="pull-left text-info small"><i class="fa fa-user fa-fw"></i>Creation date</span><br/>
                <div class="form-group">
                    <input name ="creation_date" class="form-control" value="' . $order_info['creation_date'] . '"/>
                </div>

                <span class="pull-left text-info small"><i class="fa fa-user fa-fw"></i>Creator</span><br/>
                <div class="form-group">
                    <input name ="creator" class="form-control" value="' . $order_info['creator'] . '"/>
                </div>
            </li>';
echo '
            <li class="list-group-item">';
foreach ($img_links as $row) {
    echo '<div><a href="' . $row . '" class="thumbnail"><img src="' . $row . '" /></a></div>';
}
echo '           </li>';
echo '
            <li class="list-group-item text-center">
                <button class="btn btn-default" type="submit">Confirm</button>
            </li>
        </ul>
    </div>
    <div class="col-sm-1 col-lg-2"></div>
</div>
';