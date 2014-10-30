<?php

/** @var $module string */
/** @var $controller string */
/** @var $action string */

echo form_open($module . '/' . $controller . '/' . $action);
echo '
<br/>
<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
        <ul class="list-group">
            <li class="list-group-item">
                <img src="
                '.base_url().'application/modules/order/views/img/step1.png'.'" class="img-responsive"/><br/>
            </li>
            <li class="list-group-item">
                <span class="pull-left text-muted small"><i class="fa fa-pencil fa-fw"></i> Write information here</span><br/>
                <div class="form-group">
                    <input class="form-control" placeholder="Enter text"/>
                </div>
            </li>
            <li class="list-group-item text-center">
                <button class="btn btn-info" type="submit">Next &NestedGreaterGreater;</button>
            </li>
        </ul>
    </div>
    <div class="col-sm-2"></div>
</div>
';
?>




