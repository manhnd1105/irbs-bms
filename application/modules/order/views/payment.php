<?php
/**
 * Created by PhpStorm.
 * User: TUNG
 * Date: 9/27/2014
 * Time: 8:46 AM
 */
echo '<div class="row">';


echo '<div  class="col-sm-12">';
echo form_fieldset('Payment');
echo form_button('', 'Add payment method', "class='btn btn-success'");
echo '<div>&nbsp;</div>';
echo '<br/>';
echo '<div class="panel panel-default">';
echo '<div class="panel-heading">Select method to pay</div>';
echo '<table class="table">';
echo '<tr>';
echo '<td> Payment method</td>';
echo '<td> Validation</td>';
echo '<td> Selected</td>';
echo '<td> Action</td>';
echo '</tr>';

echo '<tr>';
echo '<td>Visa</td>';
echo '<td>xxxx</td>';
echo '<td>';
echo '<input type="radio">';
echo '</td>';
echo '<td>' . anchor('', 'Delete'), '|', anchor('', 'Update') . '</td>';
echo '</tr>';

echo '<tr>';
echo '<td>PayPal</td>';
echo '<td>xxxx</td>';
echo '<td>';
echo '<input type="radio">';
echo '</td>';
echo '<td>' . anchor('', 'Delete'), '|', anchor('', 'Update') . '</td>';
echo '</tr>';

echo '</table>';

echo '</div>';

echo '</div >';
echo '<div  class="col-sm-2">';
echo '</div >';
echo '</div>';
echo form_fieldset_close();