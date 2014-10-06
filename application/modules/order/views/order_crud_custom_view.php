<?php
/**
 * Created by PhpStorm.
 * User: TUNG
 * Date: 9/29/2014
 * Time: 9:17 AM
 */

echo '<div class="row">';
echo '<div  class="col-sm-4">';
echo '   <ul class="">';
echo '  <li class="active"><a href="#">Dashboard</a></li>';
echo '<li>' . anchor('', 'Make order') . '</li>';
echo '<li>' . anchor('', 'Trade orders') . '</li>';
echo '<li>' . anchor('order/order_controller/view_payment', 'Payment') . '</li>';
echo ' </ul>';
echo '</div >';
echo '<div  class="col-sm-8">';
echo '<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">';

/** @var string $module_name name of module need to load */
/** @var string $file_uri URI that need to load */
$this->load->view($module_name . '/' . $file_uri); //TODO extend to multi module views like Joomla
echo '</div>';
echo '</div >';

echo '</div >';
