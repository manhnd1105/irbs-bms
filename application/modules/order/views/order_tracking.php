<?php
/**
 * Created by PhpStorm.
 * User: TUNG
 * Date: 9/29/2014
 * Time: 10:19 AM
 */

echo form_fieldset('Order tracking');
echo 'Completion';
echo '<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 70px">60%</div>';
echo '6/10';
echo '<br/>';
echo 'Remaining days: XXXX days';
echo form_button('', 'Download all completed', "class='btn btn-success'");
echo '<div>&nbsp;</div>';

echo '<div class="table-responsive">';
echo '<table class="table">';
echo '<tr>';
echo '<td> <img src="..." class="img-responsive" alt="Responsive image" width="150" height="150"><br/><p>Picture name</p>  </td>';
echo '<td>------></td>';
echo '<td> <img src="..." class="img-responsive" alt="Responsive image" width="150" height="150">  </td>';
echo '<td> <button type="button" class="btn btn-info btn-sm">Download</button><br/><button type="button" class="btn btn-info btn-sm">Request change</button></td>';
echo '<td> Action</td>';

echo '</tr>';

echo '<tr>';
echo '<td> <img src="..." class="img-responsive" alt="Responsive image" width="150" height="150"><br/><p>Picture name</p> </td>';
echo '<td>------></td>';
echo '<td> <img src="..." class="img-responsive" alt="Responsive image" width="150" height="150">  </td>';
echo '<td><button type="button" class="btn btn-info btn-sm">Download</button><br/><button type="button" class="btn btn-info btn-sm">Request change</button></td>';
echo '<td> Action</td>';

echo '</tr>';

echo '<tr>';
echo '<td> <img src="..." class="img-responsive" alt="Responsive image" width="150" height="150"><br/><p>Picture name</p>  </td>';
echo '<td> In-progress</td>';
echo '<td>  </td>';
echo '<td> <button type="button" class="btn btn-info btn-sm">Comment</button></td>';
echo '<td> Action</td>';

echo '</tr>';


echo '</table>';


echo '<div>';
echo '<ul class="pagination">';
echo ' <li class="disabled"><span>&laquo;</span></li>';
echo '<li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>';
echo ' <li class="disabled"><a href="#">2</a> </span></li>';
echo ' <li class="disabled"><a href="#">3</a></li>';
echo ' <li class="disabled"><span>&raquo;</span></li>';
echo '</ul>';
echo '</div>';
echo form_fieldset_close();