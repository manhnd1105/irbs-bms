<?php
/**
 * Created by PhpStorm.
 * User: Tuan Long
 * Date: 10/6/2014
 * Time: 3:17 PM
 */
/** @var $module string */
/** @var $controller string */
/** @var $action string */

echo form_open($module . '/' . $controller . '/' . $action,'enctype="multipart/form-data" id="uploadForm"');
echo form_fieldset('Mobile form');
echo '<input id="upload" type="file" name="upload"/>';
echo '<button class="btn btn-danger btn-sm" type="submit" id="submit" name="submit">
<i class="fa fa-upload fa-fw"></i>Upload
</button>';

//echo form_submit('submit','<i class="fa fa-upload fa-fw"></i>Upload','class="btn btn-danger btn-sm" id="submit"');
//echo form_button('submit', '<i class="fa fa-upload fa-fw"></i>Upload', 'class="btn btn-danger btn-sm" id="submit"');