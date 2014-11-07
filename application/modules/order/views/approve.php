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
echo "<script src='" . base_url() . "application/modules/order/views/js/comment.js'></script>";

echo form_open($action, "class='form-horizontal'");
echo form_hidden('id', $id, "id='id'");
echo '
<br/>
<div class="row">
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
            <li class="list-group-item">';
    echo '<div><a href="' . $info['file_path'] . '" class="thumbnail"><img src="' . $info['file_path'] . '" /></a></div>';
echo '           </li>';
echo '
        </ul>
    </div>
    <div class="col-sm-1 col-lg-2"></div>
</div>
';

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

echo '<div class="row">
    <div class="col-sm-1 col-lg-2"></div>
    <div class="col-sm-10 col-lg-8">
        <ul class="list-group">
            <li class="list-group-item">';
            if(!isset($comment) && empty($comment)){
                $comment = array();
            };
            echo '<div id="wrap_comment"';
            foreach($comment as $c){
                echo'<!-- Comment -->
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                            </a>
                ';
                echo'
                            <div class="media-body">
                                <h4 class="media-heading"><span class="label label-warning" id="reviewer">'.$c['reviewer'].'</span>
                                    <small>said at: '.$c['time_commented'].'</small>
                                </h4>
                                '.$c['content'].'
                            </div>

                        </div>
                ';
            }
            echo '</div>';
echo '
            </li>
        </ul>
    </div>
    <div class="col-sm-1 col-lg-2"></div>
</div>
';
//echo '<div id ="wrap_comment">';

//if(!isset($comment) && empty($comment)){
//    $comment = array();
//};
///** @var $comment array */


//echo '<div class="col-sm-1 col-lg-2"></div>
//</div>';