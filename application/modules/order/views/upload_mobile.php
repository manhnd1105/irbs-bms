<?php
/**
 * Created by PhpStorm.
 * User: Tuan Long
 * Date: 10/6/2014
 * Time: 3:17 PM
 */
echo '<link rel="stylesheet" href="'.base_url() . 'assets/css/admin_template/upload.css"/>';
echo
'<div class="row">
    <div class="panel panel-default">';

/** @var $module string */
/** @var $controller string */
/** @var $action string */
echo form_open($module . '/' . $controller . '/' . $action,'enctype="multipart/form-data" id="uploadForm"');
//echo '<input id="upload" type="file" name="upload"/>';
echo '<div class="panel-heading">
        <div class="btn-group-xs">';
echo '<a class="btn btn-warning fileinput-button">
         <i class="fa fa-file-image-o fa-fw"></i>
         <span>Add images...</span>';
echo '<input type="file" name="files[]" multiple="multiple">';
echo '</a>';
echo '<button type="submit" class="btn btn-primary">
                    <i class="fa fa-cloud-upload fa-fw"></i>
                    <span>Start upload</span>
                </button>';
echo'<button type="reset" class="btn btn-outline btn-default pull-right">
                    <i class="fa fa-refresh fa-fw"></i>
                </button>
            </div>
        </div>';
//end panel-heading & form
echo '<div class="panel-body" id="images_upload">
            <div class="row">
                <div class="col-xs-4">
                    <a href="#" class="thumbnail">
                        <img src="http://placehold.it/200x200" alt="..."/>
                    </a>
                </div>
                <div class="col-xs-4">
                    <a href="#" class="thumbnail">
                        <img src="http://placehold.it/200x200" alt="..."/>
                    </a>
                </div>
                <div class="col-xs-4">
                    <a href="#" class="thumbnail">
                        <img src="http://placehold.it/200x200" alt="..."/>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>';

