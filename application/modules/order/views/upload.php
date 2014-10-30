<script type="text/javascript">
    base_url = '<?=base_url()?>';
</script>

<?php
echo "<script src='" . base_url() . "application/modules/order/views/js/upload.js'></script>";
echo '<link rel="stylesheet" href="'.base_url() . 'assets/css/admin_template/upload.css"/>';
echo
'<div class="row">
    <div class="panel panel-default" style="border: none;">';

/** @var $module string */
/** @var $controller string */
/** @var $action string */
echo form_open($module . '/' . $controller . '/' . $action,'enctype="multipart/form-data" id="uploadForm"');

echo '<div class="panel-heading">
        <div class="btn-group-sm">';
echo '<a class="btn btn-warning fileinput-button">
         <i class="fa fa-file-image-o fa-fw"></i>
         <span>Add images...</span>';
echo '<input type="file" name="files" multiple="multiple" accept="image/*" id="files">';
echo '</a>';
echo '<button class="btn btn-primary" id="submit">
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
        <div class="row">
            <div class="col-sm-12" id="upload_image">
            </div>
        </div><br/>
        <div class="row">
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table class="table" id="upload_info">
                    <thead>
                        <tr>
                            <td class="text-center"><strong><i class="fa fa-table"></i></strong></td>
                            <td class="text-center"><strong>Name</strong></td>
                            <td class="text-center"><strong>Size</strong></td>
                            <td class="text-center"><strong>Uploaded</strong></td>
                            <td class="text-center"><strong>Action</strong></td>
                        </tr>
                    </thead>
                    </table>
                </div>
            </div>
        </div>
      </div>

'.'</div>
</div>';

?>




