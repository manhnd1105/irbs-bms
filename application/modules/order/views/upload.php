<script type="text/javascript">
    base_url = '<?=base_url()?>';
</script>
<br/>
<?php
/**
 * @var $module string
 * @var $controller string
 * @var $action string
 * @var $name string
 * @var $email string
 * @var $address string
 * @var $phone string
 */
echo "<script src='" . base_url() . "application/modules/order/views/js/upload.js'></script>";
echo '<link rel="stylesheet" href="' . base_url() . 'assets/css/admin_template/upload.css"/>';
echo
'<div class="row">
    <div class="col-sm-1 col-lg-2"></div>
    <div class="col-sm-10 col-lg-8">';

//echo form_open($module . '/' . $controller . '/' . $action);
echo '<ul class="list-group">
            <li class="list-group-item">
                <img src="
                ' . base_url() . 'application/modules/order/views/img/step2.png' . '" class="img-responsive"/><br/>
            </li>';
echo '<li class="list-group-item">';
if (isset($desc)) {
    echo '<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
<span class="text-danger"><i class="fa fa-plus-square"></i></span>
</a>';
    echo '<span class="text-info small"><i class="fa fa-user fa-fw"></i>Description: </span><input id="desc" class="form-control" value="' . $desc . '" disabled/><br/>';
    echo '<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">';
    echo '<span class="text-info small"><i class="fa fa-envelope fa-fw"></i>Creation date: </span><input id="creation_date" class="form-control" value="' . date('Y-m-d H:i:s') . '" disabled/><br/>';
    echo '<span class="text-info small"><i class="fa fa-envelope fa-fw"></i>Creation date: </span><input id="creator" class="form-control" value="' . $creator . '" disabled/><br/>';
    echo '</div>';
}
echo '</li>';
//end li customer information

echo '<li class="list-group-item">
    <div class="row">
        <div class="col-sm-5">
            <a class="btn btn-primary btn-outline fileinput-button">
                <i class="fa fa-file-image-o fa-fw"></i>
                <span>Add images...</span>
                <input type="file" name="files" multiple="multiple" accept="image/*" id="files">
            </a>
        </div>
        <div class="col-sm-7">
            <button class="btn btn-primary btn-outline" id="btn_submit_upload">
                <i class="fa fa-cloud-upload fa-fw"></i>
                <span>Start upload</span>
            </button>
        </div>
    </div>
    <div class="progress" id="progress" style="display: none;">
        <div class="progress-bar progress-bar-info progress-bar-striped" id="progress-bar" role="progressbar"
             aria-valuenow="1" aria-valuemin="0" aria-valuemax="100" style="width: 1%">
            0%
        </div>
    </div>
</li>
<li class="list-group-item">
    <div class="row" id="upload_image"></div>
    <div class="row" id="uploaded_image"></div>
    <input type="hidden" id="image_links"/>
</li>
<li class="list-group-item text-center">
    <button class="btn btn-default" id="btn_submit" disabled="disabled">Create order</button>
</li></ul>
</div>
<div class="col-sm-1 col-lg-2"></div>
</div>';





