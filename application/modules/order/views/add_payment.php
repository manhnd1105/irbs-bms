<?php
/**
 * Created by PhpStorm.
 * User: TUNG
 * Date: 9/27/2014
 * Time: 9:02 AM
 */


echo '<div class="row">';


echo '<div  class="col-sm-12">';

echo form_open('', "class='form-horizontal'");
echo form_fieldset('Add payment method');

echo '<div class="form-group-sm">';
echo form_label('Country');
echo form_input('country', '', "class='form-control'", "id=''");
echo form_error('country');
echo '</div>';

echo '<div class="form-group-sm">';
echo form_label('First name');
echo form_input('first name', '', "class='form-control'", "id=''");
echo form_error('first name');
echo '</div>';

echo '<div class="form-group-sm">';
echo form_label('Last name');
echo form_input('last name', '', "class='form-control'", "id=''");
echo form_error('last name');
echo '</div>';

echo '<div class="form-group-sm">';
echo form_label('Creadit Card Number');
echo form_input('last name', '', "class='form-control'", "id=''");
echo form_error('last name');
echo '</div>';

echo '<div class="form-group-sm">';
echo form_label('City');
echo form_input('city', '', "class='form-control'", "id=''");
echo form_error('city');
echo '</div>';

echo '<div class="form-group-sm">';
echo form_label('Zip code');
echo form_input('zip code', '', "class='form-control'", "id=''");
echo form_error('zip code');
echo '</div>';

echo '<div class="form-group-sm">';
echo form_label('Email');
echo form_input('mail', '', "class='form-control'", "id=''");
echo form_error('mail');
echo '</div>';

echo form_fieldset_close();
echo '<div>&nbsp;</div>';
echo form_submit('submit', 'Add', "class='btn btn-success'");

echo '</div>';
echo '<div  class="col-sm-2">';
echo '</div>';
echo '</div>';