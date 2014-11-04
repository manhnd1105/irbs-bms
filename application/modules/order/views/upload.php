<script type="text/javascript">
    base_url = '<?=base_url()?>';
</script>
<br/>
<?php
echo "<script src='" . base_url() . "application/modules/order/views/js/upload.js'></script>";
echo '<link rel="stylesheet" href="'.base_url() . 'assets/css/admin_template/upload.css"/>';
echo
'<div class="row">
    <div class="col-sm-1 col-lg-2"></div>
    <div class="col-sm-10 col-lg-8">';
/** @var $module string
 *  @var $controller string
 *  @var $action string
 *  @var $name string
 * @var $email string
 * @var $address string
 * @var $phone string
 */
echo form_open($module . '/' . $controller . '/' . $action,'enctype="multipart/form-data" id="uploadForm"');
echo'<ul class="list-group">
            <li class="list-group-item">
                <img src="
                '.base_url().'application/modules/order/views/img/step2.png'.'" class="img-responsive"/><br/>
            </li>';
echo'<li class="list-group-item">';
if (isset($name)&&isset($email)&&isset($address)&&isset($phone)) {
    echo'<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">';
    echo '<span class="text-danger"><i class="fa fa-plus-square"></i></span>';
    echo'</a>';
    echo'<span class="text-info small"><i class="fa fa-user fa-fw"></i>Customer: </span><input class="form-control" value="'.$name.'" disabled/><br/>';
    echo'<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">';
    echo '<span class="text-info small"><i class="fa fa-envelope fa-fw"></i>Email: </span><input class="form-control" value="'.$email.'" disabled/><br/>';
    echo '<span class="text-info small"><i class="fa fa-mobile fa-fw"></i>Phone number: </span><input class="form-control" value="'.$phone.'" disabled/><br/>';
    echo '<span class="text-info small"><i class="fa fa-map-marker fa-fw"></i>Address: </span><input class="form-control" value="'.$address.'" disabled/><br/>';
    echo'</div>';
}
echo'</li>';
//end li customer information
echo'<li class="list-group-item">';
echo '<div class="row">';
echo '<div class="col-sm-5">';
echo '<div class="btn-group-sm">';
echo '<a class="btn btn-primary btn-outline fileinput-button">
         <i class="fa fa-file-image-o fa-fw"></i>
         <span>Add images...</span>';
echo '<input type="file" name="files" multiple="multiple" accept="image/*" id="files">';
echo '</a>';
echo '<button class="btn btn-primary btn-outline" id="submit">
                    <i class="fa fa-cloud-upload fa-fw"></i>
                    <span>Start upload</span>
                </button>';
echo '<button class="btn btn-primary btn-outline" id="test" type="button">
                    <i class="fa fa-cloud-upload fa-fw"></i>
                    <span>Test</span>
                </button>';
echo '</div>';
echo '</div>';
echo '<div class="col-sm-7">';
echo '
<div class="progress" id ="progress" style="display: none;">
  <div class="progress-bar progress-bar-info progress-bar-striped" id ="progress-bar" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100" style="width: 1%">
    1%
  </div>
</div>
';
echo '</div>';
echo'</div>';
echo'</li>';
//end li button control

echo '<li class="list-group-item">';
echo'<div class="row" id="upload_image"></div>';
echo'</li>';
//end li-panel

echo'</ul>';
//end ul

echo'</div>
    <div class="col-sm-1 col-lg-2"></div>
</div>';





