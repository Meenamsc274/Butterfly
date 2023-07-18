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
$district_id = mysqli_real_escape_string($link,$_POST['district_id']);
$city_id = mysqli_real_escape_string($link,$_POST['city_id']);
$city_code = mysqli_real_escape_string($link,$_POST['city_code']);
$city_name = mysqli_real_escape_string($link,$_POST['city_name']);
$description = mysqli_real_escape_string($link,$_POST['description']);
$status = mysqli_real_escape_string($link,$_POST['status']);
$sort_order = mysqli_real_escape_string($link,$_POST['sort_order']);
if(mysqli_query($link,"INSERT INTO `city_tbl` (`id`, `country_id`, `state_id`, `district_id`, `city_id`, `city_code`, `city_name`, `description`, `ip_address`, `browser`, `date`, `created_by`, `approved_by`, `status`, `sort_order`) VALUES ('$id', '$country_id', '$state_id', '$district_id', '$city_id', '$city_code', '$city_name', '$description', '$ip_address', '$browser', '$date', '$created_by', '$approved_by', '$status', '$sort_order')")){
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
$district_id = mysqli_real_escape_string($link,$_POST['district_id']);
$city_id = mysqli_real_escape_string($link,$_POST['city_id']);
$city_code = mysqli_real_escape_string($link,$_POST['city_code']);
$city_name = mysqli_real_escape_string($link,$_POST['city_name']);
$description = mysqli_real_escape_string($link,$_POST['description']);
$status = mysqli_real_escape_string($link,$_POST['status']);
$sort_order = mysqli_real_escape_string($link,$_POST['sort_order']);
if(mysqli_query($link,"UPDATE `city_tbl` SET  `country_id` = '$country_id', `state_id` = '$state_id', `district_id` = '$district_id', `city_code` = '$city_code', `city_name` = '$city_name', `description` = '$description', `ip_address` = '$ip_address', `browser` = '$browser', `date` = '$date', `created_by` = '$created_by', `approved_by` = '$approved_by', `status` = '$status', `sort_order` = '$sort_order' WHERE `city_id`='$city_id'")){
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
	              				<div class="col-lg-6"><h3 class="box-heading"> City <small>Add / Update  Details</small></h3></h3></div>
	              				<div class="col-lg-6">
	              					<div class="breadcrumb">
	              						<a href="index.php" class="breadcrumb_a">Home</a> 
                            <i class="fa fa-angle-double-right angle_double_right"></i>
		              					<a href="district_view.php" class="breadcrumb_a">City </a> 
                            <i class="fa fa-angle-double-right angle_double_right" aria-hidden="true"></i>
		              					<a href="#" class="breadcrumb_a">Add / Update City </a>
	              					</div>
	              				</div>
	              			</div>
	              		</div>
	              		<div class="box-body">
	              			<!-- <h5 class="second_heading">Add City</h5> -->
                      <form method="post" class="padding-10">
                        <?php
                          $city_id = mysqli_real_escape_string($link,$_GET['city_id']);
  $update = mysqli_real_escape_string($link,$_GET['update']);
  if($update == "yes"){
  $sel_row = mysqli_query($link,"select * from city_tbl where `city_id`='$city_id'");
  $row = mysqli_fetch_object($sel_row);
  $upload_id = $row->city_id;
  }
  else
  {
  $max_id = maxOfAll("id","city_tbl");
  $max_id=$max_id+1;
  $upload_id="cit-".$max_id;
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
        <label class="margin-left-10" for="industry_name">State</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
          <select name="state_id" id="state_id" class="form-control" required="required">
          <?php
          $sel_rw1 = mysqli_query($link,"select state_name,state_id from state_tbl");
          while($row1 = mysqli_fetch_object($sel_rw1)){
          ?>

          <option value="<?php echo $row1->state_id; ?>"><?php echo $row1->state_name; ?></option>

          <?php } ?>
          </select>
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">District</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
          <select name="district_id" id="district_id" class="form-control" required="required">
          <?php
          $sel_rw1 = mysqli_query($link,"select district_name,district_id from district_tbl");
          while($row1 = mysqli_fetch_object($sel_rw1)){
          ?>

          <option value="<?php echo $row1->district_id; ?>"><?php echo $row1->district_name; ?></option>

          <?php } ?>
          </select>
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_id">City Id</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
        <input type="text" class="form-control" name="city_id" id="city_id" placeholder="Enter the City Id" value="<?php echo $upload_id; ?>" readonly="readonly" required="required">
        </div>
      </div>
    </div>
    
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">City Code</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
        <input type="text" class="form-control" name="city_code" id="city_code" placeholder="Enter the City Code" value="<?php echo $row->city_code; ?>" required="required">
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">City Name</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
        <input type="text" class="form-control" name="city_name" id="city_name" placeholder="Enter the City Name" value="<?php echo $row->city_name; ?>" required="required">
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
      
      $("#city_country").change(function() {
      $.get('get_state.php?country=' + $(this).val(), function(data) {
      $("#city_state").html(data);
      $('#loader').slideUp(200, function() {
      $(this).remove();
      });
      });
      });
      $("#city_state").change(function() {
      $.get('get_district.php?country='+ $("#city_country").val() +'&state=' + $(this).val(), function(data) {
      $("#city_district").html(data);
      $('#loader').slideUp(200, function() {
      $(this).remove();
      });
      });
      });
      $("#city_district").change(function() {
      $.get('get_city.php?country='+ $("#city_country").val() +'&state='+ $("#city_state").val() +'&district='+ $(this).val(), function(data) {
      $("#city_city").html(data);
      $('#loader').slideUp(200, function() {
      $(this).remove();
      });
      });
      });
      $("#city_city").change(function() {
      $.get('get_area.php?country='+ $("#city_country").val() +'&state='+ $("#city_state").val() +'&district='+ $("#city_district").val() +'&city='+ $(this).val(), function(data) {
      $("#city_area").html(data);
      $('#loader').slideUp(200, function() {
      $(this).remove();
      });
      });
      });
      $("#city_area").change(function() {
      $.get('get_pincode.php?country='+ $("#city_country").val() +'&state='+ $("#city_state").val() +'&district='+ $("#city_district").val() +'&city='+ $("#city_city").val() +'&area='+ $(this).val(), function(data) {
      $("#city_area").html(data);
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