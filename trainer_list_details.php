<?php 
include 'dbc.php'; 
page_protect();
$created_by = $_SESSION['userid'];
$approved_by = "";
$page = "training details"; ?>
<?php 
	$autoid = $_GET['autoid'];
    $sel_rw = mysqli_query($link,"select * from trainer_list_tbl where autoid='$autoid'");
    $row = mysqli_fetch_object($sel_rw);
	$trainer_id = $row->trainer;

    list($trainer) = mysqli_fetch_row(mysqli_query($link,"select first_name from trainer_tbl where autoid='$trainer_id'"));

    if(isset($_POST['submit'])){
      $autoid = mysqli_real_escape_string($link,$_POST['id']);
      $performance = mysqli_real_escape_string($link,$_POST['performance']);
      $status = mysqli_real_escape_string($link,$_POST['status']);
      $remarks = mysqli_real_escape_string($link,$_POST['remarks']);
      
      $update = mysqli_query($link,"update trainer_list_tbl set performance='$performance', status='$status', remarks='$remarks' where autoid='$autoid'");
      if($update){
        $msg[] = 'Status updated';
      }else{
        $err[] ='Error - Something went wrong';
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
	              				<div class="col-lg-6"><h3 class="box-heading"> Training Details 
                                  <div class="breadcrumb">
									
                            			<a href="index.php" class="breadcrumb_a">Home</a> 
                            			<i class="fa fa-angle-double-right angle_double_right"></i>
		              					<a href="trainer_list_view.php" class="breadcrumb_a">Training   </a> 
                                          <i class="fa fa-angle-double-right angle_double_right"></i>
		              					<a href="#" class="breadcrumb_a">Training Details  </a> 
	              					</div>
                                </h3> </div>
	              				<div class="col-lg-6">
								
	              					
	              				</div>
	              			</div>
	              		</div>
	              		<div class="box-body">
	              			<!-- <h5 class="second_heading">Add Industry</h5> -->
                   <div class="row mt-3">
                   <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                   <div class="card card_box_shadow">
  <div class="card-body">
    
   <div class="row">
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-6 row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <p class="font_weight_normal">Training Type</p>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <p class="font_weight_normal"><?php echo $row->training_type; ?> </p>
        </div>
  </div>
  <hr>
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-6 row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <span class="font_weight_normal">Trainer</span>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <p class="font_weight_normal"> <?php echo $trainer; ?> </p>
        </div>
  </div>
  <hr>
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <p class="font_weight_normal">Training Cost</p>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <p class="font_weight_normal"><?php echo $row->trainer_cost; ?> </p>
        </div>
  </div><hr>
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <p class="font_weight_normal">Start Date</p>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <p class="font_weight_normal"><?php echo $row->start_date; ?> </p>
        </div>
    
  </div><hr>
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <p class="font_weight_normal">End Date</p>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <p class="font_weight_normal"><?php echo $row->end_date; ?> </p>
        </div>
  </div><hr>
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <p class="font_weight_normal"><?php echo $row->description; ?> </p>
    
  </div>
  </div>
  </div>
</div>
</div>
<!---  Panel End -->
<?php $emp_id = $row->employee;
 $sel_emp = mysqli_query($link,"select name,designation,photo from employee where emp_id='$emp_id'"); 
 $fet_emp = mysqli_fetch_object($sel_emp); ?>

<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                   <div class="card card_box_shadow" >
  <div class="card-body">
    <h5 class="card-title">Training Employee</h5><hr/>
   <div class="row">
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="float_left">
        <img class="margin-20 border_radius_50" src="<?php echo $fet_emp->photo; ?>">
      </div>
      <div class="float_left">
      <span class="display_block font_weight_normal margin_top_40"> <?php echo $fet_emp->name; ?></span>
      <span class="display_block font_weight_normal"> <?php echo $fet_emp->designation; ?></span>
      </div>
</div>
  <div class="col-lg-12">
    <p class="card-text"><b>Update Status</b></p>
    <hr>
  </div>
  <form method="post">
    <?php include "display_msg.php"; ?>
    <div class="row">
   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
    <div class="form-group">
      <label>Performance</label>
      <select name="performance" class="form-control" id="performance">
        <option value="Not Concluded">Not Concluded</option>
        <option value="Satisfactory">Satisfactory</option>
        <option value="Average">Average</option>
        <option value="Poor">Poor</option>
        <option value="Excellent">Excellent</option>
      </select>
      <input type="hidden" name="id" value="<?php echo $_GET['autoid']; ?>">
    </div>
  </div>
   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
   <div class="form-group">
      <label>Status</label>
      <select name="status" class="form-control" id="status">
        <option value="Pending">Pending</option>
        <option value="Started">Started</option>
        <option value="Completed">Completed</option>
        <option value="Terminated">Terminated</option>
      </select>
    </div>
    
  </div>
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <label>Remarks</label>
    <textarea name="remarks" class="form-control" placeholder="Remarks" id="remarks"><?php echo $row->remarks; ?></textarea>
    <input type="submit" class="btn bg-default mt-4 float-right" name="submit" value="Save">
  </div></div>
  </form>
  </div>
  </div>
</div>
</div>
<!---  Panel End -->
</div><br/>

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
      $("#status option[value='<?php echo $row->status; ?>']").attr("checked", "checked");
      $("#performance option[value='<?php echo $row->performance; ?>']").attr("selected", "selected");
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
  

 
</html>