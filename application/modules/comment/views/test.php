<br/>
<?php
echo "<script src='" . base_url() . "application/modules/comment/views/js/comment.js'></script>";
/** @var $module string */
/** @var $controller string */
/** @var $action string */
/** @var $img_id int */
echo form_open($module . '/' . $controller . '/' . $action);
if(!isset($img_id) && empty($img_id)){
    $img_id = 0;
};
echo '
   <div class="row">
       <div class="col-sm-3">
            <h3>Test with image id: '.$img_id.'</h3>
            <div class="input-group">
                <input type="text" id="img_id" name="img_id" class="form-control" placeholder="Enter image id here.." value="'.$img_id.'" />
            </div>
            <br/>
            <button type="submit" class="btn btn-block btn-outline btn-primary">Show commnents</button>
       </div>
';
echo'
       <div class="col-sm-9">
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
                    <h4 class="media-heading">Reviewer id: '.$c['reviewer_id'].'
                        <small>'.$c['time_commented'].'</small>
                    </h4>
                    '.$c['content'].'
                </div>

            </div>
    ';
}
echo '</div>';
echo'
       </div>
   </div>
';
?>

<!--foreach($comment as $c){-->
<!--echo $c['id'];-->
<!--echo $c['image_id'];-->
<!--echo $c['reviewer_id'];-->
<!--echo $c['content'];-->
<!--echo $c['time_commented'];-->
<!--echo $c['status'];-->
