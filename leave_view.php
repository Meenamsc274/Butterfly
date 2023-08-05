<?php 
include 'dbc.php'; 
page_protect();
$created_by = $_SESSION['userid'];
$approved_by = "";
$page = "trainer_list_view"; ?>
<?php 

if(isset($_POST['submit'])){
    if($_POST['submit']=='Create'){
        $autoid = mysqli_real_escape_string($link,$_POST['autoid']);
        $employee = mysqli_real_escape_string($link,$_POST['employee']);
        $leave_type = mysqli_real_escape_string($link,$_POST['leave_type']);
        $start_date = mysqli_real_escape_string($link,$_POST['start_date']);
        $end_date = mysqli_real_escape_string($link,$_POST['end_date']);
        $leave_reason = mysqli_real_escape_string($link,$_POST['leave_reason']);
        $remark = mysqli_real_escape_string($link,$_POST['remark']);

        $date1=date_create($start_date);
        $date2=date_create($end_date);
        $diff=date_diff($date1,$date2);
        $total_days = $diff->format("%a days");

        if(mysqli_query($link,"INSERT INTO `leave_tbl` (`autoid`, `employee`, `leave_type`, `start_date`, `end_date`, `leave_reason`, `remark`, `ip_address`, `browser`, `date`, `created_by`, `approved_by`,`status`,`total_days`) VALUES ( '$autoid', '$employee', '$leave_type',  '$start_date', '$end_date', '$leave_reason', '$remark', '$ip_address', '$browser', NOW(), '$created_by', '$approved_by','0','$total_days')")){
            $msg[] = "Successfully Saved!";
        }
        else
        {
            $err[] = "Error in saving data!";
        }
    }

    if($_POST['submit']=='Update'){
        $autoid = mysqli_real_escape_string($link,$_POST['autoid']);
        $employee = mysqli_real_escape_string($link,$_POST['employee']);
        $leave_type = mysqli_real_escape_string($link,$_POST['leave_type']);
        $start_date = mysqli_real_escape_string($link,$_POST['start_date']);
        $end_date = mysqli_real_escape_string($link,$_POST['end_date']);
        $leave_reason = mysqli_real_escape_string($link,$_POST['leave_reason']);
        $remark = mysqli_real_escape_string($link,$_POST['remark']);

        $date1=date_create($start_date);
        $date2=date_create($end_date);
        $diff=date_diff($date1,$date2);
        $total_days = $diff->format("%a days");

        if(mysqli_query($link,"update `leave_tbl` set `employee`='$employee', `leave_type`='$leave_type', `start_date`='$start_date', `end_date`='$end_date', `leave_reason`='$leave_reason', `remark`='$remark', `ip_address`='$ip_address', `browser`='$browser', `date`=NOW(), `created_by`='$created_by', `approved_by`='$approved_by',`total_days`='$total_days' where autoid = '$autoid'")){
            $msg[] = "Successfully Saved!";
        }
        else
        {
            $err[] = "Error in saving data!";
        }
    }
}

if(isset($_POST['action'])){

    if($_POST['action']=="Approval"){
        $status = '1';
    }
    if($_POST['action']=="Reject"){
        $status = '2';
    }
    
    $autoid = $_POST['autoid'];
    $update = mysqli_query($link,"update leave_tbl set status='$status' where autoid='$autoid'");
    if($update){
        $msg[] = 'Status changed!';
    }else{
        $err[] = 'Error-Something went wrong';
    }
}

if($_GET['del'] == "yes"){
	$autoid=$_GET['autoid'];
    if(mysqli_query($link,"delete from `leave_tbl` where `autoid`='$autoid'")){
		$msg[] = "Successfully Deleted!";
	}
	else
	{
		$err[] = "Error - Failed To Delete!";
	}	
}


	?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Butterfly Paint - Store Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <?php include 'assets/common/css_file.php';?> 
    
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    
  </head>
  <body>
    <div class="page-wrapper"> <?php include 'assets/common/header.php';?> 
    	<section class="side-bar">
        	<div class="row"> <?php include 'assets/common/left-sidebar.php';?> <div class="col-lg-10">
            	<div class="container box-bg">
            		<div class="box">
	              		<div class="box-header">
	              			<div class="row">
	              				<div class="col-lg-6">
                                    <h3 class="box-heading">Manage Leave 
                                    <div class="breadcrumb">
	              						<a href="index.php" class="breadcrumb_a">Home</a> 
                            			<i class="fa fa-angle-double-right angle_double_right"></i>
		              					<a href="#" class="breadcrumb_a">Manage Leave </a> 
	              					</div>
                                </div>
                                    </h3> 
                                  
	              				<div class="col-lg-6">
                                  <button class="btn btn-sm bg-default float-right margin-28" type="button" data-bs-toggle="modal" data-bs-target="#myModal"><i class="fa fa-plus"></i></button>
	              					
	              				</div>
	              			</div>
	              		</div>
	              		<div class="box-body">
	              			<!-- <h5 class="second_heading">Add Industry</h5> -->
                            <?php include "display_msg.php"; ?>
                   <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr>
					<th>id</th>
					
					<th>Employee</th>
					<th>Leave Type</th>
					<th>Applied On</th>
					<th>start Date</th>
					<th>End Date</th>
					<th>Total Days</th>
					<th>Leave Reason</th>
					<th>Status</th>
					<th>Actions</th>
                </tr>
                </thead>
                <tbody>
       	<?php
				$sel_rw = mysqli_query($link,"select * from leave_tbl");
				while($row = mysqli_fetch_object($sel_rw)){
                    $emp_id = $row->employee;
                    
                    list($emp_name) = mysqli_fetch_row(mysqli_query($link,"select name from employee where emp_id = '$emp_id'"));
                    
				?>

                <tr>
				<td><?php echo $row->id; ?></td>
					
					<td><?php echo $emp_name; ?></td>
					<td><?php echo $row->leave_type; ?></td>
					<td><?php echo date('M d, Y',strtotime($row->date)); ?></td>
					<td><?php echo date('M d, Y',strtotime($row->start_date)); ?></td>
					<td><?php echo date('M d, Y',strtotime($row->end_date)); ?></td>
                    <td><?php echo $row->total_days; ?></td>
					<td><?php echo $row->leave_reason; ?></td>
					<td>
                        <?php if($row->status=='0'){ ?>
                            <a href="javascript:void(0)" class="btn btn-sm btn-primary"><?php echo 'Pending'; ?></a>
                        <?php } ?>
						<?php if($row->status=='1'){ ?>
                            <a href="javascript:void(0)" class="btn btn-sm btn-success"><?php echo 'Approved'; ?></a><?php } ?>
						<?php if($row->status=='2'){ ?><a href="javascript:void(0)" class="btn btn-sm btn-danger"><?php echo 'Rejected'; ?></a><?php } ?>
                    </td>

                  
                    <td>
                        <button class="btn btn-sm bg-default action" id="action<?php echo $row->autoid; ?>"  type="button" data-bs-toggle="modal" data-bs-target="#myModalAction"><i class="fa fa-caret-right"></i></button>

                        <button class="btn btn-sm btn-success edit" id="edit<?php echo $row->autoid; ?>"  type="button" data-bs-toggle="modal" data-bs-target="#myModalEdit"><i class="fa fa-edit"></i></button>

						<a class="btn btn-sm bg-danger text-white" href="leave_view.php?autoid=<?php echo $row->autoid; ?>&del=yes" title="Delete Details"><i class="fa fa-trash"></i></a>
					</td>
					
				</tr>
				<?php } ?>
                     </tbody>
              </table>
	              		</div>
	              	</div>
            	</div>
          	</div>

             <!-- Add Leave Modal -->
             <div class="modal" id="myModal">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Create Leave</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                    <form method="post" class="padding-10" enctype="multipart/form-data">
                        <?php $max_id = maxOfAll("id","leave_tbl");
                        $max_id=$max_id+1;
                        $upload_id="EMPL-".$max_id; ?>
                        <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
                    <div class="form-group row">
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
                        <label class="margin-left-10" for="industry_name">Employee </label>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
                            <select name="employee" class="form-control" required>
                                <option value="">Select Employee</option>
                                <?php $sel_emp = mysqli_query($link,"select emp_id,name from employee"); 
                                while($fet_emp = mysqli_fetch_object($sel_emp)){
                                    ?><option value="<?php echo $fet_emp->emp_id; ?>"><?php echo $fet_emp->name; ?></option><?php
                                } ?>
                                
                            </select>
                            <input type="hidden" name="autoid" value="<?php echo $upload_id ?>">
                        </div>
                    </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
                    <div class="form-group row">
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
                        <label class="margin-left-10" for="industry_id">Leave Type</label>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
                            <select name="leave_type" class="form-control">
                                <option value="">Select Leave Type</option>
                                <option value="Casual Leave (6)">Casual Leave (6)</option>
                                <option value="Medical Leave (10)">Medical Leave (10)</option>
                            </select>
                        </div>
                    </div>
                    </div>

                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
                            <div class="form-group row">
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
                                <label class="margin-left-10" for="industry_id">Start Date</label>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
                                <input type="date" name="start_date"  class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
                            <div class="form-group row">
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
                                <label class="margin-left-10" for="industry_id">End Date</label>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
                                <input type="date" name="end_date"  class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-pad">
                            <div class="form-group row">
                                <div class="col-lg-2 col-md-4 col-sm-12 col-xs-12 no-pad">
                                <label class="margin-left-10" for="industry_id">Leave Reason</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 no-pad">
                                    <textarea rows="5" name="leave_reason" placeholder="Leave Reason" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-pad">
                            <div class="form-group row">
                                <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 no-pad">
                                    <label class="margin-left-10" for="industry_id">Remark</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 no-pad">
                                    <textarea name="remark" rows="5" placeholder="Leave Remark" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        
                    <input type="submit" name="submit" id="submit" class="btn btn-success float-right" value="Create">
                    </form>
                    
                    </div>

                    </div>
                </div>
            </div>  
            
            <!-- Action Model -->

            <div class="modal" id="myModalAction">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Leave Action</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                    <form method="post" class="padding-10" enctype="multipart/form-data">
                        
                        <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-pad">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
                            <span class="margin-left-10" for="industry_name">Employee </span>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
                                <span id="emp_text"></span>
                                <input type="hidden" name="autoid" id="autoid">
                                <input type="hidden" name="status" id="status">
                            </div>
                        </div>
                        <hr>
                        </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-pad">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
                        <span class="margin-left-10" for="industry_id">Leave Type</span>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
                            <span id="leave_type_text"></span>
                        </div>
                    </div>
                    <hr>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-pad">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
                            <span class="margin-left-10" for="industry_id">Appplied On</span>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
                                <span id="date_text"></span>
                            </div>
                        </div>
                        <hr>
                    </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-pad">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
                                <span class="margin-left-10" for="industry_id">Start Date</span>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
                                    <span id="start_date_text"></span>
                                </div>
                            </div>
                            <hr>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-pad">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
                                <span class="margin-left-10" for="industry_id">End Date</span>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
                                    <span id="end_date_text"></span>
                                </div>
                            </div>
                            <hr>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-pad">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
                                <span class="margin-left-10" for="industry_id">Leave Reason</span>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
                                    <span id="leave_reason_text"></span>
                                </div>
                            </div>
                            <hr>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-pad">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
                                    <span class="margin-left-10" for="industry_id">Status</span>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
                                    <span id="status_text"></span>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                      <input type="submit" name="action" value="Approval" class="btn btn-success">
                      <input type="submit" name="action" value="Reject" class="btn btn-danger">
                    </form>
                    
                    </div>

                    </div>
                </div>
            </div>  

            <!-- Edit Modal -->

            <div class="modal" id="myModalEdit">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Leave</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                    <form method="post" class="padding-10" enctype="multipart/form-data">
                       
                        <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
                    <div class="form-group row">
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
                        <label class="margin-left-10" for="industry_name">Employee </label>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
                            <select name="employee" class="form-control" id="employee" required>
                                <option value="">Select Employee</option>
                                <?php $sel_emp = mysqli_query($link,"select emp_id,name from employee"); 
                                while($fet_emp = mysqli_fetch_object($sel_emp)){
                                    ?><option value="<?php echo $fet_emp->emp_id; ?>"><?php echo $fet_emp->name; ?></option><?php
                                } ?>
                                
                            </select>
                            <input type="hidden" class="autoid" name="autoid" id="autoid">
                        </div>
                    </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
                    <div class="form-group row">
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
                        <label class="margin-left-10" for="industry_id">Leave Type</label>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
                            <select name="leave_type" id="leave_type" class="form-control">
                                <option value="">Select Leave Type</option>
                                <option value="Casual Leave (6)">Casual Leave (6)</option>
                                <option value="Medical Leave (10)">Medical Leave (10)</option>
                            </select>
                        </div>
                    </div>
                    </div>

                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
                            <div class="form-group row">
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
                                <label class="margin-left-10" for="industry_id">Start Date</label>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
                                <input type="date" id="start_date" name="start_date"  class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
                            <div class="form-group row">
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
                                <label class="margin-left-10" for="industry_id">End Date</label>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
                                <input type="date" id="end_date" name="end_date" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-pad">
                            <div class="form-group row">
                                <div class="col-lg-2 col-md-4 col-sm-12 col-xs-12 no-pad">
                                <label class="margin-left-10" for="industry_id">Leave Reason</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 no-pad">
                                    <textarea rows="5" id="leave_reason" name="leave_reason" placeholder="Leave Reason" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-pad">
                            <div class="form-group row">
                                <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 no-pad">
                                    <label class="margin-left-10" for="industry_id">Remark</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 no-pad">
                                    <textarea name="remark" id="remark" rows="5" placeholder="Leave Remark" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        
                    <input type="submit" name="submit" id="submit" class="btn btn-success float-right" value="Update">
                    </form>
                    
                    </div>

                    </div>
                </div>
            </div>  
      	</section>
      <!--body content end--> <?php include 'assets/common/footer.php';?>
    </div>
    <!----header----->
  </body>
  <?php include 'assets/common/js_file.php';?> 
  
    <script>
        $(document).ready(function () {
            $('#example').DataTable();

            $('.action').click(function(){
                var id_name = $(this).attr("id");
                var id = id_name.substr(6);
                var url = 'get_leave.php';
                $.ajax({
                    url : url,
                    type: "POST",
                    data: {id : id},
                    dataType: "JSON",
                    success: function(data)
                    {
                    //if success close modal and reload ajax table
                        $('#autoid').val(data.autoid);
                        $('#emp_text').text(data.emp_name);
                        $('#leave_type_text').text(data.leave_type);
                        $('#date_text').text(data.date);
                        $('#start_date_text').text(data.start_date);
                        $('#end_date_text').text(data.end_date);
                        $('#leave_reason_text').text(data.leave_reason);
                        $('#status_text').text(data.status_text);
                        $('#status').val(data.status);
                    
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                    alert('Error adding / update data');
                    }
                });
            });

            $('.edit').click(function(){
                var id_name = $(this).attr("id");
                var id = id_name.substr(4);
                var url = 'get_leave.php';
                $.ajax({
                    url : url,
                    type: "POST",
                    data: {id : id},
                    dataType: "JSON",
                    success: function(data)
                    {
                    //if success close modal and reload ajax table
                        $('.autoid').val(data.autoid);
                        $("#employee option[value='"+ data.emp_id +"']").attr("selected", "selected");
                        $("#leave_type option[value='"+ data.leave_type +"']").attr("selected", "selected");
                       
                        $('#date').val(data.date);
                        $('#start_date').val(data.start_date1);
                        $('#end_date').val(data.end_date1);
                        $('#leave_reason').val(data.leave_reason);
                        $('#remark').val(data.remark);
                        
                    
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                    alert('Error adding / update data');
                    }
                });
            });
        });
        
    </script>
  
</html>