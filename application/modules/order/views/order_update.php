<?php
/** @var $module string */
/** @var $controller string */
/** @var $action string */
/** @var $order_info array */
echo form_open($module . '/' . $controller . '/' . $action);
echo form_fieldset('Information');
echo form_hidden('id', $order_info['id']);


echo '<div class="form-group-sm">';
echo form_label('Description');
echo form_input('description', $order_info['description']);
echo form_error('description');
echo '</div>';
echo '<div class="form-group-sm">';
echo form_label('Creation date');
echo form_input('creation_date', $order_info['creation_date']);
echo form_error('creation_date');
echo '</div>';
echo '<div class="form-group-sm">';
echo form_label('Creator');
echo form_input('creator', $order_info['creator']);
echo form_error('creator');
echo '</div>';

echo form_fieldset('Details');
echo form_fieldset_close();
echo form_submit('submit', 'Confirm', "class='btn btn-success'");
echo ' ';
echo form_button('', 'Cancel', "class='btn btn-success'");
echo ' ';
echo form_button('', 'Save change', "class='btn btn-success'");
