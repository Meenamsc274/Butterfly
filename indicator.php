<?php 
include 'dbc.php'; 
page_protect();
$created_by = $_SESSION['userid'];
$approved_by = "";
$page = "indicator"; ?>
<?php if($_GET['del'] == "yes"){
	$emp_id = $_GET['emp_id'];
    if(mysqli_query($link,"delete from `indicator` where `autoid`='$emp_id'")){
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
   <style> 
   .checked {
  color: orange;
}
   </style> 
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
                                    <h3 class="box-heading"> Manage Indicator 
                                    <div class="breadcrumb">
	              						<a href="index.php" class="breadcrumb_a">Home</a> 
                            			<i class="fa fa-angle-double-right angle_double_right"></i>
		              					<a href="#" class="breadcrumb_a">Indicator  </a> 
	              					</div>
                                </div>
                                    </h3> 
                                  
	              				<div class="col-lg-6">
                                  <a class="btn btn-sm bg-default float-right margin-28" href="indicator_add.php"  ><i class="fa fa-plus"></i></a>
	              					
	              				</div>
	              			</div>
					
	              		</div>
	              		<div class="box-body">
	              			<!-- <h5 class="second_heading">Add Industry</h5> -->
                   <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr>
					<th>Branch</th>
					<th>Department</th>
					<th>Designation</th>
					<th>Overall Rating</th>
					<th>Added By</th>
					<th>Created At</th>
					<th>Actions</th>
                </tr>
                </thead>
                <tbody>
        <?php
		
  $sel_row=mysqli_query($link,"select * from indicator ");
  while($row5 = mysqli_fetch_object($sel_row))
  {
	  $dept_id=$row5->department;
	  $branch_id=$row5->branch;
	  $d_row=mysqli_query($link,"select * from department_tbl where department_id='$dept_id' ");
      $row1 = mysqli_fetch_object($d_row);
	  $b_row=mysqli_query($link,"select * from branch_tbl where branch_id='$branch_id' ");
      $row2 = mysqli_fetch_object($b_row);
		?>
		<tr>
		<td><?php echo $row2->branch_name; ?></td>
		<td><?php echo $row1->department_name; ?></td>
		<td><?php echo $row5->designation; ?></td>
		<td><?php 
		for($i=1;$i<=5;$i++)
		{ 
	if($i<= $row5->overall)
	{
		?>
		<span class="fa fa-star checked"></span>
		<?php
	}
	else{ ?>
		<span class="fa fa-star "></span>
  <?php }
		}  ?>
		(<?php echo $row5->overall; ?>)</td>
		<td><?php echo $row5->added_by; ?></td>
		<td><?php echo $row5->created_at; ?></td>
		<td>
		<a href="indicator_view.php?emp_id=<?php echo $row5->autoid; ?>" title="View Details" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>				
		
		<button class="btn btn-sm btn-success edit" data-id="<?php echo $row->autoid; ?>"  type="button" data-bs-toggle="modal" data-bs-target="#myModalEdit"><i class="fa fa-edit"></i></button>
		
		<a href="indicator.php?emp_id=<?php echo $row5->autoid; ?>&del=yes" title="Delete Details" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure want to delete?');"><i class="fa fa-trash"></i></a>				
		</td>
		</tr>
		<?php
  }
  ?>
                </tbody>
              </table>
	              		</div>
	              	</div>
            	</div>
          	</div>
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
        });
		
    </script>
  

 
</html>