<?php 
include 'dbc.php'; 
page_protect();
$created_by = $_SESSION['userid'];
$approved_by = "";
?>
<?php
if($_POST['submit'] == "Submit"){
$autoid = mysqli_real_escape_string($link,$_POST['autoid']);
$employee = mysqli_real_escape_string($link,$_POST['employee']);
$branch = mysqli_real_escape_string($link,$_POST['branch']);
$goal_type = mysqli_real_escape_string($link,$_POST['goal_type']);
$start_date = mysqli_real_escape_string($link,$_POST['start_date']);
$end_date = mysqli_real_escape_string($link,$_POST['end_date']);
$subject = mysqli_real_escape_string($link,$_POST['subject']);
$target = mysqli_real_escape_string($link,$_POST['target']);
$description = mysqli_real_escape_string($link,$_POST['description']);
$status = mysqli_real_escape_string($link,$_POST['status']);
$rating = mysqli_real_escape_string($link,$_POST['rating']);


//echo"INSERT INTO `appraisal` (`autoid`, `employee`,`remark`, `branch`, `department`, `designation`,`appraisal_date`, `business_process`, `allocating_resource`, `oral_communication`, `project_management`, `leadership`,`overall`,`added_by`,`created_at`) VALUES ('$autoid', '$employee','$remark','$branch', '$department', '$designation','$appraisal_date', '$business', '$allocating', '$oral', '$project', '$leader','$overall','Butterfly Paints','$date')";
if(mysqli_query($link,"INSERT INTO `goal_tracking` (`autoid`, `employee`, `branch`, `goal_type`, `start_date`,`end_date`, `subject`, `target`, `description`, `status`, `rating`) VALUES ('$autoid', '$employee','$branch', '$goal_type', '$start_date','$end_date', '$subject', '$target', '$description', '$status', '$rating')")){
	
	$msg[] = "Successfully Saved!";
	}
	else
	{
		$err[] = "Error in saving data!";
	}
	}
	?>

<?php
if($_POST['submit'] == "Update"){
	
$autoid = mysqli_real_escape_string($link,$_POST['autoid']);
$branch = mysqli_real_escape_string($link,$_POST['branch']);
$department = mysqli_real_escape_string($link,$_POST['department']);
$designation = mysqli_real_escape_string($link,$_POST['designation']);
$leader = mysqli_real_escape_string($link,$_POST['leader']);
$date = date('M d,Y');
echo $autoid;
//echo"UPDATE `indicator` SET `branch` = '$branch', `department` = '$department', `designation` = '$designation', `business_process` = '$business', `allocating_resource` = '$allocating', `oral_communication` = '$oral', `leadership` = '$leader', `project_management` = '$project', `overall` = '$overall' WHERE `autoid`='$autoid'";
/* if(mysqli_query($link,"UPDATE `indicator` SET `branch` = '$branch', `department` = '$department', `designation` = '$designation', `business_process` = '$business', `allocating_resource` = '$allocating', `oral_communication` = '$oral', `leadership` = '$leader', `project_management` = '$project', `overall` = '$overall' WHERE `autoid`='$autoid'")){
     $msg[] = "Successfully Saved!";
	}
	else
	{
		$err[] = "Error in saving data!";
	} */
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
  
.star-rating {
   margin: 25px 0 0px;
  font-size: 0;
  white-space: nowrap;
  display: inline-block;
  width: 175px;
  height: 35px;
  overflow: hidden;
  position: relative;
  background: url('data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4IiB3aWR0aD0iMjBweCIgaGVpZ2h0PSIyMHB4IiB2aWV3Qm94PSIwIDAgMjAgMjAiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDIwIDIwIiB4bWw6c3BhY2U9InByZXNlcnZlIj48cG9seWdvbiBmaWxsPSIjREREREREIiBwb2ludHM9IjEwLDAgMTMuMDksNi41ODMgMjAsNy42MzkgMTUsMTIuNzY0IDE2LjE4LDIwIDEwLDE2LjU4MyAzLjgyLDIwIDUsMTIuNzY0IDAsNy42MzkgNi45MSw2LjU4MyAiLz48L3N2Zz4=');
  background-size: contain;
}
.star-rating i {
  opacity: 0;
  position: absolute;
  left: 0;
  top: 0;
  height: 100%;
  width: 20%;
  z-index: 1;
  background: url('data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4IiB3aWR0aD0iMjBweCIgaGVpZ2h0PSIyMHB4IiB2aWV3Qm94PSIwIDAgMjAgMjAiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDIwIDIwIiB4bWw6c3BhY2U9InByZXNlcnZlIj48cG9seWdvbiBmaWxsPSIjRkZERjg4IiBwb2ludHM9IjEwLDAgMTMuMDksNi41ODMgMjAsNy42MzkgMTUsMTIuNzY0IDE2LjE4LDIwIDEwLDE2LjU4MyAzLjgyLDIwIDUsMTIuNzY0IDAsNy42MzkgNi45MSw2LjU4MyAiLz48L3N2Zz4=');
  background-size: contain;
}
.star-rating input {
  -moz-appearance: none;
  -webkit-appearance: none;
  opacity: 0;
  display: inline-block;
  width: 20%;
  height: 100%;
  margin: 0;
  padding: 0;
  z-index: 2;
  position: relative;
}
.star-rating input:hover + i,
.star-rating input:checked + i {
  opacity: 1;
}
.star-rating i ~ i {
  width: 40%;
}
.star-rating i ~ i ~ i {
  width: 60%;
}
.star-rating i ~ i ~ i ~ i {
  width: 80%;
}
.star-rating i ~ i ~ i ~ i ~ i {
  width: 100%;
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
                        <div class="col-lg-6"><h3 class="box-heading"> Goal Tracking <small>Add / Update  Details</small></h3></h3></div>
                        <div class="col-lg-6">
                          <div class="breadcrumb">
                            <a href="index.php" class="breadcrumb_a">Home</a> 
                            <i class="fa fa-angle-double-right angle_double_right"></i>
                            <a href="goal_tracking.php" class="breadcrumb_a">Goal Tracking </a> 
                            <i class="fa fa-angle-double-right angle_double_right" aria-hidden="true"></i>
                            <a href="#" class="breadcrumb_a">Add / Update Goal Tracking </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="box-body">
                      <!-- <h5 class="second_heading">Add City</h5> -->
                      <form method="post" class="padding-10" enctype="multipart/form-data">
                        <?php
$ind_id = $_GET['emp_id'];
  $update = mysqli_real_escape_string($link,$_GET['Update']);
  if($update == "yes"){
  $sel_row=mysqli_query($link,"select * from goal_tracking where `autoid`='$ind_id'");
  $row5 = mysqli_fetch_object($sel_row);
  
  $upload_id = $ind_id;
  }
  else
  {
  $max_id = maxOfAll("id","goal_tracking");
  $max_id=$max_id+1;
  $upload_id="GT-".$max_id;
  }
  ?>
                        <div class="row mt-3">
                          <div class="col-md-12">
  <?php
  foreach($err as $err_msg){
  ?>
  <div class="alert alert-danger alert-dismissible">
       
       <h4><i class="icon fa fa-ban"></i> Alert!</h4>
       <?php echo $err_msg; ?>
    </div>
  <?php } ?>
  <?php
  foreach($msg as $new_msg){
  ?>
  <div class="alert alert-success alert-dismissible">
       
       <h4><i class="icon fa fa-check"></i> Alert!</h4>
       <?php echo $new_msg; ?>
    </div>
    <?php } ?>          
</div>
 <h4>Create New Goal Tracking</h4>
    
	
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Employee </label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
          
		  <select name="employee" id="employee" class="form-control"    min="0" max="0" required="required">
<?php
        $sel_rw = mysqli_query($link,"select name,emp_id from employee");
        while($row1 = mysqli_fetch_object($sel_rw)){
        ?>

        <option value="<?php echo $row1->emp_id; ?>"><?php echo $row1->name; ?></option>

        <?php } ?>
        </select>
        </div>
      </div>
    </div>  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Branch </label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
          
		  <select name="branch" id="branch" class="form-control"    min="0" max="0" required="required">
<?php
        $sel_rw = mysqli_query($link,"select branch_name,branch_id from branch_tbl");
        while($row1 = mysqli_fetch_object($sel_rw)){
        ?>

        <option value="<?php echo $row1->branch_id; ?>"><?php echo $row1->branch_name; ?></option>

        <?php } ?>
        </select>
        </div>
      </div>
    </div>
	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="sub_category">Goal Types</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
          <select name="goal_type" id="goal_type" class="form-control" required="required">
            <option value="">-- Select Goal Type --</option>
            <option value="Event Goal">Event Goal</option>
            <option value="Invoice Goal">Invoice Goal</option>
            <option value="Short Term Goal">Short Term Goal</option>
            <option value="Long Term Goal">Long Term Goal</option>

           
				  </select>
		
        </div>
      </div>
    </div> 
	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="brand_id">Start Date</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
          <input type="date" name="start_date" class="form-control" required>

        </div>
      </div>
    </div>
	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="brand_id">End Date</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
          <input type="date" name="end_date" class="form-control" required>

        </div>
      </div>
    </div>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-pad">
      <div class="form-group ">
         <label class="margin-left-3" for="brand_id">Subject</label>
       <input type="text" name="subject" class="form-control">
				</div>
    </div>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-pad">
      <div class="form-group ">
         <label class="margin-left-3" for="brand_id">Target Achivement</label>
       <input type="text" name="target" class="form-control">
				</div>
    </div>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-pad">
      <div class="form-group ">
         <label class="margin-left-3" for="brand_id">Description</label>
       <textarea col="5" rows="5" name="description" class="form-control"></textarea>
				</div>
    </div>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-pad">
      <div class="form-group ">
         <label class="margin-left-3" for="brand_id">Status</label>
      <select name="status" id="status" class="form-control" required="required">
            <option value="Not Started">Not Started</option>
            <option value="In Progress">In Progress</option>
            <option value="Completed">Completed</option>
			</select>
				</div>
    </div>
	
   
	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
         <span class="star-rating">
  <input type="radio" name="rating" value="1"><i></i>
  <input type="radio" name="rating" value="2"><i></i>
  <input type="radio" name="rating" value="3"><i></i>
  <input type="radio" name="rating" value="4"><i></i>
  <input type="radio" name="rating" value="5"><i></i>
</span>
        </div>
      </div>
    </div>
	
    <div class="box-footer ">
      <div>&nbsp;</div>
      <div style="border-top: 1px solid #ced4da;">&nbsp;</div>
       <center>
       <?php if($update == "yes"){ ?>
        <input type="submit" name="submit" id="submit" class="btn btn-success" value="Update">
       <?php } else { ?>
        <input type="submit" name="submit" id="submit" class="btn btn-success" value="Submit">
       <?php } ?>
       </center>
      </div>
      <div>&nbsp;</div>
                        </div>
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
$(document).ready(function() {
$("#gender option[value='<?php echo $row5->gender; ?>']").attr("checked", "checked");
$("#employee option[value='<?php echo $row5->employee; ?>']").attr("selected", "selected");
$("#branch option[value='<?php echo $row5->branch; ?>']").attr("selected", "selected");
$("#department option[value='<?php echo $row5->department; ?>']").attr("selected", "selected");
$("#designation option[value='<?php echo $row5->designation; ?>']").attr("selected", "selected");
$("#brand_id option[value='<?php echo $row1->brand_id; ?>']").attr("selected", "selected");
$("#unit option[value='<?php echo $row1->unit; ?>']").attr("selected", "selected");
$("#tax option[value='<?php echo $row1->tax; ?>']").attr("selected", "selected");
$("#batch_stock option[value='<?php echo $row1->batch_stock; ?>']").attr("selected", "selected");
$("#stockable option[value='<?php echo $row1->stockable; ?>']").attr("selected", "selected");
$("#price_changeable option[value='<?php echo $row1->price_changeable; ?>']").attr("selected", "selected");
$("#show option[value='<?php echo $row1->show; ?>']").attr("selected", "selected");
$("#status option[value='<?php echo $row1->status; ?>']").attr("selected", "selected");
});
</script>
 
</html>