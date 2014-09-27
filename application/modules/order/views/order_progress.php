<?php

echo '<div class="row">';
echo '<div  class="col-sm-4">';
echo '</div >';

echo '<div  class="col-sm-12">';

echo form_fieldset('Order progress');

echo '<div class="panel panel-default">';
echo '<div class="panel-heading">';
echo '<div class="btn-group">';
echo '<button type="button" class="btn btn-default">Show All</button>';
echo '<button type="button" class="btn btn-default">Show In-Progress</button>';
echo '</div>';
echo '</div>';
echo '<table class="table">';
echo '<tr>';
echo '<td> Order Id</td>';
echo '<td> Date </td>';
echo '<td> Finish date</td>';
echo '<td> Number of pics</td>';
echo '<td> Completion</td>';
echo '<td> Action</td>';
echo '</tr>';

echo '<tr>';
echo '<td>xxxx</td>';
echo '<td>xxxx</td>';
echo '<td>xxxx</td>';
echo '<td>xxxx</td>';
echo '<td>';
echo '<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">60%</div>';
echo '</td>';
echo '<td>' . anchor('', 'Details'), '|', anchor('', 'Comment') . '</td>';
echo '</tr>';
echo '</table>';
echo '</div>';

echo '</div >';
echo '<div  class="col-sm-4">';
echo '</div >';
echo '</div>';
echo form_fieldset_close();

