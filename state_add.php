<?php 
include 'dbc.php'; 
page_protect();
$created_by = $_SESSION['userid'];
$approved_by = "";
?>
<?php
if($_POST['submit'] == "Submit"){
$id = mysqli_real_escape_string($link,$_POST['id']);
$country_id = mysqli_real_escape_string($link,$_POST['country_id']);
$state_id = mysqli_real_escape_string($link,$_POST['state_id']);
$state_code = mysqli_real_escape_string($link,$_POST['state_code']);
$state_name = mysqli_real_escape_string($link,$_POST['state_name']);
$description = mysqli_real_escape_string($link,$_POST['description']);
$status = mysqli_real_escape_string($link,$_POST['status']);
$sort_order = mysqli_real_escape_string($link,$_POST['sort_order']);
if(mysqli_query($link,"INSERT INTO `state_tbl` (`id`, `country_id`, `state_id`, `state_code`, `state_name`, `description`, `ip_address`, `browser`, `date`, `created_by`, `approved_by`, `status`, `sort_order`) VALUES ('$id', '$country_id', '$state_id', '$state_code', '$state_name', '$description', '$ip_address', '$browser', '$date', '$created_by', '$approved_by', '$status', '$sort_order')")){
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
$id = mysqli_real_escape_string($link,$_POST['id']);
$country_id = mysqli_real_escape_string($link,$_POST['country_id']);
$state_id = mysqli_real_escape_string($link,$_POST['state_id']);
$state_code = mysqli_real_escape_string($link,$_POST['state_code']);
$state_name = mysqli_real_escape_string($link,$_POST['state_name']);
$description = mysqli_real_escape_string($link,$_POST['description']);
$status = mysqli_real_escape_string($link,$_POST['status']);
$sort_order = mysqli_real_escape_string($link,$_POST['sort_order']);
if(mysqli_query($link,"UPDATE `state_tbl` SET `country_id` = '$country_id', `state_code` = '$state_code', `state_name` = '$state_name', `description` = '$description', `ip_address` = '$ip_address', `browser` = '$browser', `date` = '$date', `created_by` = '$created_by', `approved_by` = '$approved_by', `status` = '$status', `sort_order` = '$sort_order' WHERE `state_id`='$state_id'")){
  $msg[] = "Successfully Saved!";
  }
  else
  {
    $err[] = "Error in saving data!";
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
	              				<div class="col-lg-6"><h3 class="box-heading"> State <small>Add / Update  Details</small></h3></h3></div>
	              				<div class="col-lg-6">
	              					<div class="breadcrumb">
	              						<a href="index.php" class="breadcrumb_a">Home</a> 
                            <i class="fa fa-angle-double-right angle_double_right"></i>
		              					<a href="state_view.php" class="breadcrumb_a">State </a> 
                            <i class="fa fa-angle-double-right angle_double_right" aria-hidden="true"></i>
		              					<a href="#" class="breadcrumb_a">Add / Update  State </a>
	              					</div>
	              				</div>
	              			</div>
	              		</div>
	              		<div class="box-body">
	              			<!-- <h5 class="second_heading">Add State</h5> -->
                      <form method="post" class="padding-10">
                        <?php
                          $state_id = mysqli_real_escape_string($link,$_GET['state_id']);
  $update = mysqli_real_escape_string($link,$_GET['update']);
  if($update == "yes"){
  $sel_row = mysqli_query($link,"select * from state_tbl where `state_id`='$state_id'");
  $row = mysql_fetch_object($sel_row);
  $upload_id = $row->state_id;
  }
  else
  {
  $max_id = maxOfAll("id","state_tbl");
  $max_id=$max_id+1;
  $upload_id="sta-".$max_id;
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
                          <input type="hidden" class="form-control" name="id" id="id" placeholder="Enter the Id" value="<?php echo $row->id; ?>" readonly="readonly">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Country</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
          <select name="country_id" id="country_id" class="form-control" required="required">
            <?php
            $sel_rw1 = mysqli_query($link,"select country_name,country_id from country_tbl");
            while($row1 = mysqli_fetch_object($sel_rw1)){
            ?>

            <option value="<?php echo $row1->country_id; ?>"><?php echo $row1->country_name; ?></option>

            <?php } ?>
          </select>
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_id">State Id</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
        <input type="text" class="form-control" name="state_id" id="state_id" placeholder="Enter the State Id" value="<?php echo $upload_id; ?>" readonly="readonly" required="required">
        </div>
      </div>
    </div>
    
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">State Code</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
        <input type="text" class="form-control" name="state_code" id="state_code" placeholder="Enter the State Code" value="<?php echo $row->state_code; ?>" required="required">
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">State Name</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
        <input type="text" class="form-control" name="state_name" id="state_name" placeholder="Enter the State Name" value="<?php echo $row->state_name; ?>" required="required">
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mt-2">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="description">Description</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
        <textarea class="form-control" name="description" id="description" placeholder="Enter the Description" required="required">
        <?php echo $row->description; ?></textarea>
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad mt-2">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="status">Status</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
        <select name="status" id="status" class="form-control" required="required">
          <option value="active">Active</option>
          <option value="disable">Disable</option>
        </select>
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad mt-2">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="sort_order">Sort Order</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
        <input type="text" class="form-control" name="sort_order" id="sort_order" placeholder="Enter the Sortorder" value="<?php echo $row->sort_order; ?>" required="required">
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
$("#status option[value='<?php echo $row->status; ?>']").attr("selected", "selected");
});
</script>
<script type="text/javascript">
       
    $(document).ready(function() {
      $("#state_country").change(function() {
      $.get('get_state.php?country=' + $(this).val(), function(data) {
      $("#state_state").html(data);
      $('#loader').slideUp(200, function() {
      $(this).remove();
      });
      });
      });
      $("#state_state").change(function() {
      $.get('get_district.php?country='+ $("#state_country").val() +'&state=' + $(this).val(), function(data) {
      $("#state_district").html(data);
      $('#loader').slideUp(200, function() {
      $(this).remove();
      });
      });
      });
      $("#state_district").change(function() {
      $.get('get_city.php?country='+ $("#state_country").val() +'&state='+ $("#state_state").val() +'&district='+ $(this).val(), function(data) {
      $("#state_city").html(data);
      $('#loader').slideUp(200, function() {
      $(this).remove();
      });
      });
      });
      $("#state_city").change(function() {
      $.get('get_area.php?country='+ $("#state_country").val() +'&state='+ $("#state_state").val() +'&district='+ $("#state_district").val() +'&city='+ $(this).val(), function(data) {
      $("#state_area").html(data);
      $('#loader').slideUp(200, function() {
      $(this).remove();
      });
      });
      });
      $("#state_area").change(function() {
      $.get('get_pincode.php?country='+ $("#state_country").val() +'&state='+ $("#state_state").val() +'&district='+ $("#state_district").val() +'&city='+ $("#state_city").val() +'&area='+ $(this).val(), function(data) {
      $("#state_area").html(data);
      $('#loader').slideUp(200, function() {
      $(this).remove();
      });
      });
      });
    });
</script>
  <script type="text/javascript">
    $(document).ready(function() {
      $(".cart-expand").hide();
    });
    $(".appicon").click(function(e) {
      $(".cart-expand").toggle();
      e.stopPropagation();
    });
    $(".cart-expand").click(function(e) {
      e.stopPropagation();
    });
    $(document).click(function() {
      $(".cart-expand").hide();
    });
  </script>
 
 
</html>