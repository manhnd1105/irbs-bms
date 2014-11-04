<?php

/** @var $module string */
/** @var $controller string */
/** @var $action string */

echo form_open($module . '/' . $controller . '/' . $action);
echo '
<br/>
<div class="row">
    <div class="col-sm-1 col-lg-2"></div>
    <div class="col-sm-10 col-lg-8">
        <ul class="list-group">
            <li class="list-group-item">
                <img src="
                '.base_url().'application/modules/order/views/img/step1.png'.'" class="img-responsive"/><br/>
            </li>
            <li class="list-group-item">
                <span class="pull-left text-info small"><i class="fa fa-user fa-fw"></i>Enter your name:</span><br/>
                <div class="form-group">
                    <input name ="name" class="form-control" placeholder="etc: John Smith,.."/>
                </div>
                <span class="pull-left text-info small"><i class="fa fa-envelope fa-fw"></i>Email:</span><br/>
                <div class="form-group">
                    <input name ="email" class="form-control" placeholder="etc: John@example.com"/>
                </div>
                <span class="pull-left text-info small"><i class="fa fa-mobile fa-fw"></i>Phone number:</span><br/>
                <div class="form-group">
                    <input name ="phone" class="form-control" placeholder="etc: 097191927"/>
                </div>
                <span class="pull-left text-info small"><i class="fa fa-map-marker fa-fw"></i>Address:</span><br/>
                <div class="form-group">
                    <input name ="address" class="form-control" placeholder="..."/>
                </div>
            </li>
            <li class="list-group-item text-center">
                <button class="btn btn-default" type="submit">Next &NestedGreaterGreater;</button>
            </li>
        </ul>
    </div>
    <div class="col-sm-1 col-lg-2"></div>
</div>
';




