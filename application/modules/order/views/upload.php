<script type="text/javascript">

</script>
<?php

/** @var $module string */
/** @var $controller string */
/** @var $action string */


echo form_open($module . '/' . $controller . '/' . $action,'enctype="multipart/form-data"');
echo form_fieldset('Upload picture');

//echo form_button('','Add file',"class='btn btn-success'");

echo '<input id="upload" type="file" name="upload" multiple="multiple" />';
echo ' ';
echo '<div>&nbsp;</div>';
echo '<button class="btn btn-danger btn-sm" type="submit" id="submit" name="submit">
          <i class="glyphicon glyphicon-upload"></i> Upload
      </button>';
//echo form_submit('submit', 'Upload', "class='btn btn-success'");

echo '<br/>';



