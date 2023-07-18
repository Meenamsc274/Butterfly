<?php 
include 'dbc.php'; 
page_protect();
$created_by = $_SESSION['userid'];
$approved_by = "";
?>
<?php
if($_POST['submit'] == "Submit"){
$id = mysqli_real_escape_string($link,$_POST['id']);
$tax_id = mysqli_real_escape_string($link,$_POST['tax_id']);
$tax_name = mysqli_real_escape_string($link,$_POST['tax_name']);
$tax_value = mysqli_real_escape_string($link,$_POST['tax_value']);
$tax_desc = mysqli_real_escape_string($link,$_POST['tax_desc']);
$country = mysqli_real_escape_string($link,$_POST['country']);
$state = mysqli_real_escape_string($link,$_POST['state']);
$sort_order = mysqli_real_escape_string($link,$_POST['sort_order']);
$status = mysqli_real_escape_string($link,$_POST['status']);
if(mysqli_query($link,"INSERT INTO `tax_tbl` (`id`, `tax_id`, `tax_name`, `tax_value`, `tax_desc`, `country`, `state`, `sort_order`, `status`, `ip_address`, `browser`, `date`, `created_by`, `approved_by`) VALUES ('$id', '$tax_id', '$tax_name', '$tax_value', '$tax_desc', '$country', '$state', '$sort_order', '$status', '$ip_address', '$browser', '$date', '$created_by', '$approved_by')")){
$country1 = $_POST['country'];
$i=0;
foreach($country1 as $country2){
$country = mysqli_real_escape_string($link,$_POST['country'][$i]);
$state = mysqli_real_escape_string($link,$_POST['state'][$i]);
mysqli_query($link,"INSERT INTO `tax_tbl` (`id`, `tax_id`, `tax_name`, `tax_value`, `tax_desc`, `country`, `state`, `sort_order`, `status`, `ip_address`, `browser`, `date`, `created_by`, `approved_by`) VALUES ('$id', '$tax_id', '$tax_name', '$tax_value', '$tax_desc', '$country', '$state', '$sort_order', '$status', '$ip_address', '$browser', '$date', '$created_by', '$approved_by')");
	$i++;
	}
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
$tax_id = mysqli_real_escape_string($link,$_POST['tax_id']);
$tax_name = mysqli_real_escape_string($link,$_POST['tax_name']);
$tax_value = mysqli_real_escape_string($link,$_POST['tax_value']);
$tax_desc = mysqli_real_escape_string($link,$_POST['tax_desc']);
$country = mysqli_real_escape_string($link,$_POST['country']);
$state = mysqli_real_escape_string($link,$_POST['state']);
$sort_order = mysqli_real_escape_string($link,$_POST['sort_order']);
$status = mysqli_real_escape_string($link,$_POST['status']);
if(mysqli_query($link,"UPDATE `tax_tbl` SET `tax_name` = '$tax_name', `tax_value` = '$tax_value', `tax_desc` = '$tax_desc', `country` = '$country', `state` = '$state', `sort_order` = '$sort_order', `status` = '$status', `ip_address` = '$ip_address', `browser` = '$browser', `date` = '$date', `created_by` = '$created_by', `approved_by` = '$approved_by' WHERE `tax_id`='$tax_id'")){$msg[] = "Successfully Saved!";
	}
	else
	{
		$err[] = "Error in saving data!";
	}
	}
?><!DOCTYPE html>
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
                        <div class="col-lg-6"><h3 class="box-heading"> Tax <small>Add / Update  Details</small></h3></h3></div>
                        <div class="col-lg-6">
                          <div class="breadcrumb">
                            <a href="index.php" class="breadcrumb_a">Home</a> 
                            <i class="fa fa-angle-double-right angle_double_right"></i>
                            <a href="tax_view.php" class="breadcrumb_a">Tax </a> 
                            <i class="fa fa-angle-double-right angle_double_right" aria-hidden="true"></i>
                            <a href="#" class="breadcrumb_a">Add / Update Tax </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="box-body">
                      <!-- <h5 class="second_heading">Add City</h5> -->
                      <form method="post" class="padding-10" enctype="multipart/form-data">
                      <?php
	$tax_id = mysqli_real_escape_string($link,$_GET['tax_id']);
	$update = mysqli_real_escape_string($link,$_GET['update']);
	if($update == "yes"){
	$sel_row = mysqli_query($link,"select * from tax_tbl where `tax_id`='$tax_id'");
	$row = mysqli_fetch_object($sel_row);
	$upload_id = $row->tax_id;
	}
	else
	{
	$max_id = maxOfAll("id","tax_tbl");
	$max_id=$max_id+1;
	$upload_id="tax-".$max_id;
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
    <input type="hidden" class="form-control" name="id" id="id" placeholder="Enter the Id" value="<?php echo $row->id; ?>" readonly="readonly" disabled="disabled" min="0" max="0" >
                          
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Tax   Id</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
          <input type="text" class="form-control" name="tax_id" id="tax_id" placeholder="Enter the Tax Id" value="<?php echo $upload_id; ?>" readonly="readonly">
        </div>
      </div>
    </div>
    
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Tax Name</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
         <input type="text" class="form-control" name="tax_name" id="tax_name" placeholder="Enter the Tax Name" value="<?php echo $row->tax_name; ?>" required="required">
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Tax Value</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
         <input type="text" class="form-control" name="tax_value" id="tax_value" placeholder="Enter the Tax Value" value="<?php echo $row->tax_value; ?>" required="required">
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Tax Description</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
         <textarea class="form-control" name="tax_desc" id="tax_desc" placeholder="Enter the Tax Description" required="required">
				<?php echo $row->tax_desc; ?></textarea>
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Country</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
         <input type=" select" class="form-control" name="country" id="country" placeholder="Please select the Country" value="<?php echo $row->country; ?>" required="required">
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">State</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
         <input type=" select" class="form-control" name="state" id="state" placeholder="Please select the State" value="<?php echo $row->state; ?>" required="required">
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_id">Status </label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
        <select name="status" id="status" class="form-control"      required="required">
<option value="active">Active</option>
<option value="disable">Disable</option>
</select>

        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_id">Sort Order </label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
        <input type="text" class="form-control" name="sort_order" id="sort_order" placeholder="Enter the Sortorder" value="<?php echo $row->sort_order; ?>"     required="required">
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
$("#desi_id option[value='<?php echo $row->designation_id; ?>']").attr("selected", "selected");
$("#dept_id option[value='<?php echo $row->department_id; ?>']").attr("selected", "selected");
$("#emp_id option[value='<?php echo $row->employee_id; ?>']").attr("selected", "selected");
$("#parent option[value='<?php echo $row->parent; ?>']").attr("selected", "selected");
$("#submenu option[value='<?php echo $row->submenu; ?>']").attr("selected", "selected");
$("#childmenu option[value='<?php echo $row->childmenu; ?>']").attr("selected", "selected");
$("#menu_id option[value='<?php echo $row->menu_id; ?>']").attr("selected", "selected");
});
</script>
 
</html>