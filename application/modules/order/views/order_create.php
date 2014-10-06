<?php



/** @var $module string */
/** @var $controller string */
/** @var $action string */


echo form_open($module . '/' . $controller . '/' . $action);
echo form_fieldset('Upload picture');

echo '<br/>';
echo '<div class="panel panel-default">';
echo '<div class="panel-heading">Select file</div>';
echo '<table class="table">';
echo '<tr>';
echo '<td> File name</td>';
echo '<td> Size </td>';
echo '<td> Status</td>';
echo '</tr>';

echo '<tr>';
echo '<td>image1</td>';
echo '<td>1024k</td>';
echo '<td>good</td>';
echo '</tr>';
echo '</table>';

echo '</div>';
//echo form_button('','Add file',"class='btn btn-success'");

echo '<input id="file" type="file" name="file[]" multiple="multiple" />';
echo ' ';
echo '<div>&nbsp;</div>';
echo '<button class="btn btn-danger btn-sm" type="submit" id="submit">
          <i class="glyphicon glyphicon-upload"></i> Upload
      </button>';
//echo form_button("upload", '<i class="glyphicon glyphicon-upload"></i> Upload', "class='btn btn-success' id='upload'");
echo '<br/>';
//echo '<div class="form-group">';
//echo form_label('Order description');
//echo form_input('description','',"class='form-control'","id=''");
//echo form_error('description');
//echo '</div>';
//echo '<div class="form-group">';
//echo form_label('Creation date');
//echo form_input('creation_date','',"class='form-control'","id=''");
//echo form_error('creation_date');
//echo '</div>';
//
//echo '<div class="form-group">';
//echo form_label('Creator');
//echo form_input('creator','',"class='form-control'","id=''");
//echo form_error('creator');
//echo '</div>';


echo form_fieldset('Fill request');

echo 'Order ID:';
echo '<br/>';
echo 'Finsh date :';
echo '<br/>';
echo 'Total price :';
echo '<br/>';
echo '<div>&nbsp;</div>';
echo form_submit('submit', 'Accept', "class='btn btn-success'");
echo ' ';
echo form_button('', 'Cancel', "class='btn btn-success'");
echo ' ';
echo form_button('', 'Save change', "class='btn btn-success'");
echo form_fieldset_close();


