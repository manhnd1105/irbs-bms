<br/>
<div class="row">
    <div class='col-sm-8'>
    </div>
    <div class='col-sm-4'>
        <div class="form-group">
            <div class='input-group date' id='datetimepicker5'>
                <input type='text' class="form-control" data-date-format="YYYY/MM/DD"/>
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
					</span>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(function () {
            $('#datetimepicker5').datetimepicker({
                pickTime: false
            });
        });
    </script>
</div>

<div class="row">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <strong>Order number <?php echo $order_id ?> detail</strong>
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <!--<th>File ID</th>-->
                        <th>Image</th>
                        <th>Worker - Image Status</th>
                        <th>Process</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        $index = 1;
                        foreach($order as $row){
                            echo '<tr>';
                            echo '<td>'.$index.'</td>';
                            //echo '<td>'.$row['file_id'].'</td>';
                            echo '<td>';
                            echo anchor('reviewer/review_controller/image_detail/' .$row['file_id'], '<img class="thumbnail" src=""; style="width: 90px; height: 90px;"/>','class="pull-left img-responsive"');
                            echo '</td>';
                            echo '<td>';
                            echo '<p><span>Worder:'.$row['worker_id'].' </span></p>';
                            echo '<p><span>Status:'.$row['file_status'].' </span></p>';
                            echo '</td>';
                            echo '<td>';
                            if($row['file_changed_path'] == null){
                                echo '<span class="label label-info">In processing</span>';
                            }else{
                                echo '<img class="thumbnail" src="'.$row['file_changed_path'].'"; style="width: 90px; height: 90px;"/>';
                            }
                            echo '</td>';
                            echo '<td>';
                            echo '<a class="btn btn-default btn-sm" href="#">Do something here..</a>';
                            echo '</td>';
                            echo '</tr>';
                            $index++;
                        }
                    ?>
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
</div>