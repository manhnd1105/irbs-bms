<script type="text/javascript">
    base_url = '<?=base_url()?>';
</script>

<?php
/**
 * Created by PhpStorm.
 * User: manh
 * Date: 11/1/14
 * Time: 4:13 AM
 */
echo '<div>&nbsp;</div>';
echo '<div>&nbsp;</div>';
echo '<div>&nbsp;</div>';
echo "<script src='" . base_url() . "application/modules/order/views/js/refine_upload.js'></script>";

//echo form_open($action, "class='form-horizontal'");
echo form_hidden('id', $id);
echo '<div class="row">
    <div class="col-sm-1 col-lg-2"></div>
    <div class="col-sm-10 col-lg-8">
        <ul class="list-group">
            <li class="list-group-item">
                <span class="pull-left text-info small"><i class="fa fa-user fa-fw"></i>Description</span><br/>
                <div class="form-group">
                    <input name ="description" class="form-control" value="' . $description . '"/>
                </div>
            </li>';
echo '
            <li class="list-group-item">
            <span class="pull-left text-info small"><i class="fa fa-user fa-fw"></i>Original image</span><br/>';
    echo '<div><a href="' . $info['file_path'] . '" class="thumbnail"><img src="' . $info['file_path'] . '" /></a></div>';
echo '           </li>';

if (!isset($info['file_changed_path']) || $info['file_changed_path'] == null) {
    $file_changed_path = $info['file_path'];
} else {
    $file_changed_path = $info['file_changed_path'];
}
echo '<li class="list-group-item">
            <span class="pull-left text-info small"><i class="fa fa-user fa-fw"></i>Lastest version of image</span><br/>';
    echo '<div><a href="' . $file_changed_path . '" class="thumbnail"><img id ="lastest_img" src="' . $file_changed_path . '" /></a></div>';
echo '           </li>';

echo '<li class="list-group-item">
        <div>
            <a class="btn btn-primary btn-outline file input-button">
                <i class="fa fa-file-image-o fa-fw"></i>
                <span>Upload new version</span>
                <input type="file" name="files" multiple="multiple" accept="image/*" id="files">
            </a>
        </div>
        </br>
        <div>
            <button class="btn btn-primary btn-outline" id="btn_submit_upload">
                <i class="fa fa-cloud-upload fa-fw"></i>
                <span>Start upload</span>
            </button>
        </div>
</li>
<li class="list-group-item">
    <div class="row" id="upload_image"></div>
    <input type="hidden" id="image_links"/>
</li>
<li class="list-group-item text-center">
    <button class="btn btn-default" id="btn_submit">Save</button>
</li>
<div class="col-sm-1 col-lg-2"></div>
</div>';
echo '
        </ul>
    </div>
</div>
';