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
echo "<script src='" . base_url() . "application/modules/order/views/js/comment.js'></script>";

echo form_open($action, "class='form-horizontal'");
echo '<div class="form-group-sm">';
echo form_label('Description');
echo form_input('desc', $info['description'],"class='form-control'","id='desc'");
echo form_error('desc');
echo '</div>';

echo '<div class="form-group-sm">';
echo form_label('Display image');
echo '</br>';
echo '<img src="' . $info['file_changed_path'] . '" alt=""/>';
echo '</div>';

echo '<div class="form-group-sm">';
echo form_label('Approve');
echo form_input('approve','',"class='form-control'","id=''");
echo form_error('approve');
echo '</div>';

echo '</br>';
echo'
       <!-- Comments Form -->
            <div class="well">
                <h4>Leave a Comment:</h4>
                <form role="form">
                    <div class="form-group">
                        <textarea class="form-control" rows="3" id="content"></textarea>
                    </div>
                    <button type="button" class="btn btn-primary" id="post">Post</button>
                </form>
            </div>
';
echo'<hr/>';

echo '<div id ="wrap_comment">';

if(!isset($comment) && empty($comment)){
    $comment = array();
};
/** @var $comment array */
foreach($comment as $c){
    echo'<!-- Comment -->
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                </a>
    ';
    echo'
                <div class="media-body">
                    <h4 class="media-heading">Reviewer id: <span class="label label-warning" id="reviewer">'.$c['reviewer_id'].'</span>
                        <small>said at: '.$c['time_commented'].'</small>
                    </h4>
                    '.$c['content'].'
                </div>

            </div>
    ';
}