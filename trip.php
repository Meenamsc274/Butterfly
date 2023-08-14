<?php 
include 'dbc.php'; 
page_protect();
$created_by = $_SESSION['userid'];
$approved_by = "";
$page = "trip"; ?>
<?php 

if(isset($_POST['submit'])){
    if($_POST['submit']=='Create'){
        var_dump($_POST);
        $autoid = mysqli_real_escape_string($link,$_POST['autoid']);
        $employee = mysqli_real_escape_string($link,$_POST['employee']);
        $start_date = mysqli_real_escape_string($link,$_POST['start_date']);
        $end_date =  $_POST['end_date'];
        $purpose_of_trip = mysqli_real_escape_string($link,$_POST['purpose_of_trip']);
        $country = mysqli_real_escape_string($link,$_POST['country']);
     
        $reason = mysqli_real_escape_string($link,$_POST['reason']);

        if(mysqli_query($link,"INSERT INTO `trip_tbl` (`autoid`, `employee`, `start_date`, `end_date`, `purpose_of_trip`, `country`, `reason`,  `ip_address`, `browser`, `created_at`, `created_by`, `approved_by`) VALUES ( '$autoid', '$employee', '$start_date', '$end_date', '$purpose_of_trip', '$country', '$reason', '$ip_address', '$browser', NOW(), '$created_by', '$approved_by')")){
            $msg[] = "Successfully Saved!";
             
        }else{
            $err[] = "Try again later";
        }
    }
    if($_POST['submit']=='Update'){
        $autoid = mysqli_real_escape_string($link,$_POST['autoid']);
        $employee = mysqli_real_escape_string($link,$_POST['employee']);
        $start_date = mysqli_real_escape_string($link,$_POST['start_date']);
        $end_date = mysqli_real_escape_string($link,$_POST['end_date']);
        $purpose_of_trip = mysqli_real_escape_string($link,$_POST['purpose_of_trip']);
        $country = mysqli_real_escape_string($link,$_POST['country']);
     
        $reason = mysqli_real_escape_string($link,$_POST['reason']);

        if(mysqli_query($link,"UPDATE `trip_tbl` SET `employee`='$employee', `start_date`='$start_date', `end_date`='$end_date', `purpose_of_trip`='$purpose_of_trip', `country`='$country', `reason`='$reason',  `ip_address`='$ip_address', `browser`='$browser', `created_by` = '$created_by', `approved_by`='$approved_by' where autoid='$autoid'")){

            $msg[] = "Successfully Saved!";
        }
        
    }
}



if($_GET['del'] == "yes"){
	$autoid=$_GET['autoid'];
    if(mysqli_query($link,"delete from `trip_tbl` where `autoid`='$autoid'")){
		header("location:trip.php");
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
                                    <h3 class="box-heading">Manage Trip 
                                    <div class="breadcrumb">
	              						<a href="index.php" class="breadcrumb_a">Home</a> 
                            			<i class="fa fa-angle-double-right angle_double_right"></i>
		              					<a href="#" class="breadcrumb_a">Manage  </a> 
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
					<th>S.No</th>
					<th>Employee Name</th>
					<th>Start Date</th>
					<th>End Date</th>
					<th>Purpose Of Trip</th>
					<th>Country</th>
					<th>Description</th>
					<th>Actions</th>
                </tr>
                </thead>
                <tbody>
       	<?php $i=1;
				$sel_rw = mysqli_query($link,"select * from trip_tbl");
                
				while($row = mysqli_fetch_object($sel_rw)){
                     $emp_id = $row->employee;
                    
                    list($emp_name) = mysqli_fetch_row(mysqli_query($link,"select name from employee where emp_id = '$emp_id'"));
                    
				?>

                <tr>
				<td><?php echo $i; ?></td>
					
					<td><?php echo $emp_name; ?></td>
					
					<td><?php echo date('M d, Y',strtotime($row->start_date)); ?></td>
					<td><?php echo date('M d, Y',strtotime($row->end_date)); ?></td>
					
                    <td><?php echo $row->purpose_of_trip; ?></td>
                    <td><?php echo $row->country; ?></td>
                    <td><?php echo $row->reason; ?></td>
					          
                    <td>
                        <button class="btn btn-sm btn-success edit" id="edit<?php echo $row->autoid; ?>"  type="button" data-bs-toggle="modal" data-bs-target="#myModalEdit"><i class="fa fa-edit"></i></button>

						<a class="btn btn-sm bg-danger text-white" href="trip.php?autoid=<?php echo $row->autoid; ?>&del=yes" title="Delete Details"><i class="fa fa-trash"></i></a>
					</td>
					
				</tr>
				<?php $i++; } ?>
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
                        <h4 class="modal-title">Create New Trip</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                    <form method="post" class="padding-10" enctype="multipart/form-data">
                        <?php $max_id = maxOfAll("id","trip_tbl");
                        $max_id=$max_id+1;
                        $upload_id="RES-".$max_id; ?>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
                                <div class="form-group row">
                                    <label  for="industry_name">Employee </label>
                                    <select name="employee" class="form-control" style="width:90%" required>
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
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
                                <div class="form-group row">
                                    <label  for="industry_id">Start Date</label>
                                    <input type="date" name="start_date" style="width:90%" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
                                <div class="form-group row">
                                    <label  for="industry_id">End Date</label>
                                    <input type="date" name="end_date" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
                                <div class="form-group row">
                                    <label  for="industry_id">Purpose Of Trip</label>
                                    <input type="text" name="purpose_of_trip" class="form-control" style="width:90%" required>
                                </div>
                            </div>

                            
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
                                <div class="form-group row">
                                    <label  for="industry_id">Country</label>
                                    <select name="country" class="form-control" required="required">
                                        <?php
                                        $sel_rw1 = mysqli_query($link,"select country_name from country_tbl");
                                        while($row1 = mysqli_fetch_object($sel_rw1)){
                                        ?>

                                        <option value="<?php echo $row1->country_name; ?>"><?php echo $row1->country_name; ?></option>

                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-pad">
                            <div class="form-group row">
                                <label for="industry_id">Description</label>
                                <textarea rows="7" name="reason" placeholder="Enter Description" class="form-control"></textarea>
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
                        <h4 class="modal-title">Edit Trip</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                    <form method="post" class="padding-10" enctype="multipart/form-data">
                       
                        <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
                    <div class="form-group row">
                        <label  for="industry_name">Employee </label>
                        
                            <select name="employee" class="form-control" id="employee" required style="width:90%">
                                <option value="">Select Employee</option>
                                <?php $sel_emp = mysqli_query($link,"select emp_id,name from employee"); 
                                while($fet_emp = mysqli_fetch_object($sel_emp)){
                                    ?><option value="<?php echo $fet_emp->emp_id; ?>"><?php echo $fet_emp->name; ?></option><?php
                                } ?>
                                
                            </select>
                            <input type="hidden" class="autoid" name="autoid" id="autoid">
                        
                    </div>
                    </div>
                    <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
                                <div class="form-group row">
                                    <label  for="industry_id">Start Date</label>
                                    <input type="date" id="start_date" name="start_date" style="width:90%" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
                                <div class="form-group row">
                                    <label  for="industry_id">End Date</label>
                                    <input type="date" id="end_date" name="end_date" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
                                <div class="form-group row">
                                    <label  for="industry_id">Purpose Of Trip</label>
                                    <input type="text" id="purpose_of_trip" name="purpose_of_trip" class="form-control" style="width:90%" required>
                                </div>
                            </div>

                            
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
                                <div class="form-group row">
                                    <label  for="industry_id">Country</label>
                                    <select name="country" id="country" class="form-control" required="required">
                                        <?php
                                        $sel_rw1 = mysqli_query($link,"select country_name from country_tbl");
                                        while($row1 = mysqli_fetch_object($sel_rw1)){
                                        ?>

                                        <option value="<?php echo $row1->country_name; ?>"><?php echo $row1->country_name; ?></option>

                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-pad">
                            <div class="form-group row">
                                <label for="industry_id">Description</label>
                                <textarea rows="7" name="reason" id="reason"  placeholder="Enter Description" class="form-control"></textarea>
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
                var url = 'ajax_request/get_trip.php';
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
                        $("#country option[value='"+ data.country +"']").attr("selected", "selected");
                        
                        $('#start_date').val(data.start_date);
                        $('#end_date').val(data.end_date);
                        $('#purpose_of_trip').val(data.purpose_of_trip);
                        
                        $('#reason').val(data.reason);
                        
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