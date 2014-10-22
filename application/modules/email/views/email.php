<?php
/**
 * Created by PhpStorm.
 * User: Tuan Long
 * Date: 10/16/2014
 * Time: 10:22 AM
 */

/** @var $module string */
/** @var $controller string */
/** @var $action string */
echo form_open($module . '/' . $controller . '/' . $action);
echo '<br/>';
echo '
    <div class="col-lg-6">
        <div class="form-group">
            <label>To</label>
            <input class="form-control" placeholder="To" name="to[]" type="text"/>
            <p class="help-block">etc: email@example.com</p>
        </div>
        <div class="form-group">
            <label>Cc</label>
            <input class="form-control" placeholder="Cc" name="cc[]" type="text">
        </div>
        <div class="form-group">
            <label>Bcc</label>
            <input class="form-control" placeholder="Bcc" name="bcc[]" type="text">
        </div>
        <div class="form-group">
            <label>Subject</label>
            <input class="form-control" placeholder="subject" name="subject">
        </div>
        <div class="form-group">
            <label>Text area</label>
            <textarea class="form-control" rows="3" name="message"></textarea>
        </div>
';
echo form_submit('submit',' Test Send Email','class="btn btn-danger"');
echo '</div>';
?>

