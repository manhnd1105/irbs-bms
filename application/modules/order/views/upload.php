<script type="text/javascript">
    base_url = '<?=base_url()?>';
</script>
<br/>
<?php
echo "<script src='" . base_url() . "application/modules/order/views/js/upload.js'></script>";
echo '<link rel="stylesheet" href="'.base_url() . 'assets/css/admin_template/upload.css"/>';
echo
'<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
    <ul class="list-group">
            <li class="list-group-item">
                <img src="
                '.base_url().'application/modules/order/views/img/step2.png'.'" class="img-responsive"/><br/>
            </li>
            <li class="list-group-item">';


/** @var $module string */
/** @var $controller string */
/** @var $action string */
echo form_open($module . '/' . $controller . '/' . $action,'enctype="multipart/form-data" id="uploadForm"');

echo '<div class="panel-heading">
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

';


echo'</li>
            <li class="list-group-item text-center">';
echo '<div class="btn-group-sm">';
echo '<a class="btn btn-default fileinput-button">
         <i class="fa fa-file-image-o fa-fw"></i>
         <span>Add images...</span>';
echo '<input type="file" name="files" multiple="multiple" accept="image/*" id="files">';
echo '</a>';
echo '<button class="btn btn-default" id="submit">
                    <i class="fa fa-cloud-upload fa-fw"></i>
                    <span>Start upload</span>
                </button>';
echo'<button type="reset" class="btn btn-outline btn-default">
                    <i class="fa fa-refresh fa-fw"></i>Refresh
                </button>
</div>
            </li>
        </ul>
    <div class="panel panel-default" style="border: none;">';

echo'</div>
    </div>
    <div class="col-sm-2"></div>
</div>';

?>





