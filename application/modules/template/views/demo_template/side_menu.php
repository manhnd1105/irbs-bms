<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 8/29/14
 * Time: 2:56 PM
 */

echo '<li>' . anchor('order/order_controller/index','Manage Order','class="active"').'</li>';
echo '<li>' . anchor('order/order_controller/view_create', 'Create Order','class="active"') . '</li>';
echo '<li>' . anchor('order/order_controller/view_progress', 'Progress','class="active"') . '</li>';
echo '<li>' . anchor('order/order_controller/view_payment', 'Payment','class="active"') . '</li>';
echo '<li>' . anchor('order/order_controller/view_crud_custom', 'Order Custom View','class="active"') . '</li>';
echo '<li>' . anchor('order/order_controller/view_order_tracking', 'Order Tracking','class="active"') . '</li>';
echo '<li>' . anchor('price_list/price_controller/view_price', 'View Price','class="active"') . '</li>';
echo '<li>' . anchor('order/detail_controller', 'Assign workers','class="active"') . '</li>';

echo '<li><a href="#collapseUpload" data-toggle="collapse" data-parent="#accordion"><i class="fa fa-cloud-upload fa-fw"></i> Upload form<i class="pull-right fa fa-plus"></i></a>'
.'<div id="collapseUpload" class="panel-collapse collapse">'
.'<ul class="nav nav-second-level">';
    echo '<li>' . anchor('order/upload_controller/view_upload','<i class="fa fa-upload fa-fw"></i>Upload File') . '</li>';
    echo '<li>' . anchor('order/upload_controller/view_mobile_upload', '<i class="fa fa-mobile fa-fw"></i>Mobile Upload File') . '</li>';
echo '</ul>'
.'</div>'
.'</li>';

echo '<li><a href="#collapseEmail" data-toggle="collapse" data-parent="#accordion"><i class="fa fa-envelope fa-fw"></i> Email form<i class="pull-right fa fa-plus"></i></a>'
    .'<div id="collapseEmail" class="panel-collapse collapse">'
    .'<ul class="nav nav-second-level">';
echo '<li>' . anchor('/email/email_controller/view_email','Test sender','class="active"').'</li>';
echo '<li>' . anchor('/email/email_controller/view_email','<i class="fa fa-cog fa-fw"></i>Email Config','class="active"').'</li>';
echo '</ul>'
    .'</div>'
    .'</li>';