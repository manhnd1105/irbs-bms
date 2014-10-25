<ol class="breadcrumb">
    <li><a href="#">Images by Status</a></li>
    <li><a href="#">Images by Order</a></li>
    <li><a href="#">Images by Worker</a></li>
    <li class="active">Demo </li>
</ol>
<?php
/**
 * Created by PhpStorm.
 * User: Tuan Long
 * Date: 10/11/2014
 * Time: 11:59 AM
 */

echo form_open('file/file_controller/update');
echo form_hidden('id',$image_id);
echo form_fieldset('File Information');
echo '<p>';
echo form_label($image['name']);
echo '</p>';
echo '<p>';
echo form_label($image['type']);
echo '</p>';
echo '<p>';
echo form_label($image['size']);
echo '</p>';
echo '<p>';
echo form_label('Worker: '.$image['worker_id']);
echo '</p>';
echo '<p>';
echo form_label('Order: '.$image['order_id']);
echo '</p>';
echo '<p>';
echo form_label('File path: <a href="'.$image['path'].'">'.$image['path'].'</a>');
echo '</p>';
echo '<p>';
echo form_label('Update Path: ');
echo form_input('path');
echo form_error('path');
echo '</p>';
echo form_fieldset_close();
echo form_submit('submit', 'Confirm');

