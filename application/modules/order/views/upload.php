
<?php
echo "<script src='" . base_url() . "application/modules/order/views/js/upload.js'></script>";


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
//echo form_button('submit', '<i class="fa fa-upload fa-fw"></i>Upload', 'class="btn btn-danger btn-sm" id="submit"');


//echo form_submit('submit','<i class="fa fa-upload fa-fw"></i>Upload','class="btn btn-danger btn-sm" id="submit"');
//echo form_button('submit', '<i class="fa fa-upload fa-fw"></i>Upload', 'class="btn btn-danger btn-sm" id="submit"');


echo '<link rel="stylesheet" href="'.base_url() . 'assets/css/admin_template/upload.css"/>';
echo
'<div class="row">
    <div class="panel panel-default" style="border: none;">';

/** @var $module string */
/** @var $controller string */
/** @var $action string */
echo form_open($module . '/' . $controller . '/' . $action,'enctype="multipart/form-data" id="uploadForm"');
//echo '<input id="upload" type="file" name="upload"/>';
echo '<div class="panel-heading">
        <div class="btn-group-sm">';
echo '<a class="btn btn-warning fileinput-button">
         <i class="fa fa-file-image-o fa-fw"></i>
         <span>Add images...</span>';
echo '<input type="file" name="files" multiple="multiple" accept="image/*" id="files">';
echo '</a>';
echo '<button type="submit" class="btn btn-primary">
                    <i class="fa fa-cloud-upload fa-fw"></i>
                    <span>Start upload</span>
                </button>';
echo'<button type="reset" class="btn btn-outline btn-default">
                    <i class="fa fa-refresh fa-fw"></i>Refresh
                </button>
            </div>
        </div>';
//end panel-heading & form
echo '<div class="panel-body">
        <div class="table-responsive" id="upload_table">
            <table class="table">
                <thead>
                    <tr>
                        <td class="text-center">#</td>
                        <td class="text-center"><i class="fa fa-image"></i></td>
                        <td class="text-center">Name</td>
                        <td class="text-center">Type</td>
                        <td class="text-center">Size</td>
                        <td class="text-center">Action</td>
                    </tr>
                </thead>
                <tbody id="items_upload">
                </tbody>
            </table>
        </div>

      </div>

'.'</div>
</div>';

?>





