
<?php
echo "<script src='" . base_url() . "application/modules/order/views/js/upload.js'></script>";
/** @var $module string */
/** @var $controller string */
/** @var $action string */
//
//echo form_open('http://localhost/irbs-fms/index.php/file/image_controller/view_crud','enctype="multipart/form-data" id="uploadForm"');
//echo form_fieldset('Upload your images');
//
////echo form_button('','Add file',"class='btn btn-success'");
//
//
//
//    echo '<input id="upload" type="file" name="upload"/>';
//    echo '<button class="btn btn-danger btn-sm" type="submit" id="submit" name="submit">
//              <i class="glyphicon glyphicon-upload"></i> Upload
//          </button>';
//    echo ' <div id="upload_progress" class="progress"></div>';
?>
<form id="uploadForm" enctype="multipart/form-data" method="post">
    <input id="upload" type="file" name="upload" multiple="multiple"/>
    <input type="submit" id="submit" class=" btn btn-danger btn-sm" value="Upload">
</form>
<div id="uploaded" class="row"></div>








