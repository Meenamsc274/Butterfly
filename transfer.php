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
        $branch = mysqli_real_escape_string($link,$_POST['branch']);
        $department = mysqli_real_escape_string($link,$_POST['department']);
        $transfer_date = mysqli_real_escape_string($link,$_POST['transfer_date']);
        $description = mysqli_real_escape_string($link,$_POST['description']);

        if(mysqli_query($link,"INSERT INTO `transfer_tbl` (`autoid`, `employee`, `branch`, `department`, `transfer_date`, `description`,  `ip_address`, `browser`, `created_at`, `created_by`, `approved_by`) VALUES ( '$autoid', '$employee', '$branch',  '$department', '$transfer_date', '$description', '$ip_address', '$browser', NOW(), '$created_by', '$approved_by')")){
            $msg[] = "Successfully Saved!";
        }
        
    }
    if($_POST['submit']=='Update'){
        $autoid = mysqli_real_escape_string($link,$_POST['autoid']);
        $employee = mysqli_real_escape_string($link,$_POST['employee']);
        $branch = mysqli_real_escape_string($link,$_POST['branch']);
        $department = mysqli_real_escape_string($link,$_POST['department']);
        $transfer_date = mysqli_real_escape_string($link,$_POST['transfer_date']);
        $description = mysqli_real_escape_string($link,$_POST['description']);

        if(mysqli_query($link,"UPDATE `transfer_tbl` SET `employee`='$employee', `branch`='$branch', `department`='$department', `transfer_date`='$transfer_date', `description`='$description',  `ip_address`='$ip_address', `browser`='$browser', `created_by` = '$created_by', `approved_by`='$approved_by' where autoid='$autoid'")){

            $msg[] = "Successfully Saved!";
        }
        
    }
}



if($_GET['del'] == "yes"){
	$autoid=$_GET['autoid'];
    if(mysqli_query($link,"delete from `transfer_tbl` where `autoid`='$autoid'")){
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
                                    <h3 class="box-heading">Manage Transfer 
                                    <div class="breadcrumb">
	              						<a href="index.php" class="breadcrumb_a">Home</a> 
                            			<i class="fa fa-angle-double-right angle_double_right"></i>
		              					<a href="#" class="breadcrumb_a">Manage Transfer </a> 
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
					<th>Employee Name</th>
					<th>Branch</th>
					<th>Department</th>
					<th>Trasfer Date</th>
					<th>Description</th>
					<th>Actions</th>
                </tr>
                </thead>
                <tbody>
       	<?php
				$sel_rw = mysqli_query($link,"select * from transfer_tbl");
				while($row = mysqli_fetch_object($sel_rw)){
                    $emp_id = $row->employee;
                    $branch_id = $row->branch;
                    $deparment_id = $row->department;
                    
                    list($emp_name) = mysqli_fetch_row(mysqli_query($link,"select name from employee where emp_id = '$emp_id'"));
                    list($branch) = mysqli_fetch_row(mysqli_query($link,"select branch_name from branch_tbl where branch_id = '$branch_id'"));
                    list($department) = mysqli_fetch_row(mysqli_query($link,"select department_name from department_tbl where department_id = '$deparment_id'"));
                    
				?>

                <tr>
				<td><?php echo $row->id; ?></td>
					
					<td><?php echo $emp_name; ?></td>
					<td><?php echo $branch; ?></td>
                    <td><?php echo $department; ?></td>
					<td><?php echo date('M d, Y',strtotime($row->transfer_date)); ?></td>
					
                    <td><?php echo $row->description; ?></td>
					          
                    <td>
                        <button class="btn btn-sm btn-success edit" id="edit<?php echo $row->autoid; ?>"  type="button" data-bs-toggle="modal" data-bs-target="#myModalEdit"><i class="fa fa-edit"></i></button>

						<a class="btn btn-sm bg-danger text-white" href="transfer.php?autoid=<?php echo $row->autoid; ?>&del=yes" title="Delete Details"><i class="fa fa-trash"></i></a>
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
                        <h4 class="modal-title">Create New Transfer</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                    <form method="post" class="padding-10" enctype="multipart/form-data">
                        <?php $max_id = maxOfAll("id","transfer_tbl");
                        $max_id=$max_id+1;
                        $upload_id="TR-".$max_id; ?>
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
                        <label class="margin-left-10" for="industry_id">Branch</label>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
                            <select name="branch" class="form-control" required>
                                <option value="">Select Branch</option>
                                <?php $sel_branch = mysqli_query($link,"select branch_id,branch_name from branch_tbl"); 
                                while($fet_branch = mysqli_fetch_object($sel_branch)){
                                    ?><option <?php if($_GET['branch']==$fet_branch->branch_id){ echo 'selected'; } ?> value="<?php echo $fet_branch->branch_id; ?>"><?php echo $fet_branch->branch_name; ?></option><?php
                                } ?>
                              </select>
                        </div>
                    </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
                    <div class="form-group row">
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
                        <label class="margin-left-10" for="industry_id">Department</label>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
                            <select name="department" class="form-control" required="required">
                                <option value="">Select Department</option>
                                <?php
                                $sel_rw1 = mysqli_query($link,"select * from department_tbl");
                                while($row1 = mysqli_fetch_object($sel_rw1)){
                                ?>

                                <option <?php if($_GET['department']==$row1->department_id){ echo 'selected'; } ?> value="<?php echo $row1->department_id ; ?>"><?php echo $row1->department_name; ?></option>

                                <?php } ?>
                              </select>
                        </div>
                    </div>
                    </div>

                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
                            <div class="form-group row">
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
                                <label class="margin-left-10" for="industry_id"> Transfer Date</label>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
                                <input type="date" name="transfer_date"  class="form-control" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-pad">
                            <div class="form-group row">
                                <div class="col-lg-2 col-md-4 col-sm-12 col-xs-12 no-pad">
                                <label class="margin-left-10" for="industry_id">Description</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 no-pad">
                                    <textarea rows="7" name="description" placeholder="Enter Description" class="form-control"></textarea>
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
           
            <!-- Edit Modal -->

            <div class="modal" id="myModalEdit">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Transfer</h4>
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
                        <label class="margin-left-10" for="industry_id">Branch</label>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
                            <select name="branch" class="form-control" id="branch" required>
                                <option value="">Select Branch</option>
                                <?php $sel_branch = mysqli_query($link,"select branch_id,branch_name from branch_tbl"); 
                                while($fet_branch = mysqli_fetch_object($sel_branch)){
                                    ?><option <?php if($_GET['branch']==$fet_branch->branch_id){ echo 'selected'; } ?> value="<?php echo $fet_branch->branch_id; ?>"><?php echo $fet_branch->branch_name; ?></option><?php
                                } ?>
                              </select>
                        </div>
                    </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
                    <div class="form-group row">
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
                        <label class="margin-left-10" for="industry_id">Department</label>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
                            <select name="department" id="department" class="form-control" required="required">
                                <option value="">Select Department</option>
                                <?php
                                $sel_rw1 = mysqli_query($link,"select * from department_tbl");
                                while($row1 = mysqli_fetch_object($sel_rw1)){
                                ?>

                                <option <?php if($_GET['department']==$row1->department_id){ echo 'selected'; } ?> value="<?php echo $row1->department_id ; ?>"><?php echo $row1->department_name; ?></option>

                                <?php } ?>
                              </select>
                        </div>
                    </div>
                    </div>

                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
                            <div class="form-group row">
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
                                <label class="margin-left-10" for="industry_id"> Transfer Date</label>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
                                <input type="date" name="transfer_date" id="transfer_date" class="form-control" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-pad">
                            <div class="form-group row">
                                <div class="col-lg-2 col-md-4 col-sm-12 col-xs-12 no-pad">
                                <label class="margin-left-10" for="industry_id">Description</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 no-pad">
                                    <textarea rows="7" id="description" name="description" placeholder="Enter description" class="form-control"></textarea>
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

            $('.edit').click(function(){
                var id_name = $(this).attr("id");
                var id = id_name.substr(4);
                var url = 'ajax_request/get_transfer.php';
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
                        $("#branch option[value='"+ data.branch +"']").attr("selected", "selected");
                        $("#department option[value='"+ data.department +"']").attr("selected", "selected");
                       
                        $('#transfer_date').val(data.transfer_date);
                       
                        $('#description').val(data.description);
                    
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