<?php 
include 'dbc.php'; 
page_protect();
$created_by = $_SESSION['userid'];
$approved_by = "";
?>
<?php
if($_POST['submit'] == "Submit"){
$id = mysqli_real_escape_string($link,$_POST['id']);
$bank_id = mysqli_real_escape_string($link,$_POST['bank_id']);
$bank_name = mysqli_real_escape_string($link,$_POST['bank_name']);
$acc_type = mysqli_real_escape_string($link,$_POST['acc_type']);
$acc_name = mysqli_real_escape_string($link,$_POST['acc_name']);
$acc_no = mysqli_real_escape_string($link,$_POST['acc_no']);
$hom_branch = mysqli_real_escape_string($link,$_POST['hom_branch']);
$ifsc_code = mysqli_real_escape_string($link,$_POST['ifsc_code']);
$swift_code = mysqli_real_escape_string($link,$_POST['swift_code']);
$description = mysqli_real_escape_string($link,$_POST['description']);
$nostro_code = mysqli_real_escape_string($link,$_POST['nostro_code']);
$opening_bal = mysqli_real_escape_string($link,$_POST['opening_bal']);
$status = mysqli_real_escape_string($link,$_POST['status']);
$sort_order = mysqli_real_escape_string($link,$_POST['sort_order']);
if(mysqli_query($link,"INSERT INTO `bank_tbl` (`id`, `bank_id`, `bank_name`, `acc_type`, `acc_name`, `acc_no`, `hom_branch`, `ifsc_code`, `swift_code`, `description`, `nostro_code`, `opening_bal`, `ip_address`, `browser`, `date`, `created_by`, `approved_by`, `status`, `sort_order`) VALUES ('$id', '$bank_id', '$bank_name', '$acc_type', '$acc_name', '$acc_no', '$hom_branch', '$ifsc_code', '$swift_code', '$description', '$nostro_code', '$opening_bal', '$ip_address', '$browser', '$date', '$created_by', '$approved_by', '$status', '$sort_order')")){
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
$bank_id = mysqli_real_escape_string($link,$_POST['bank_id']);
$bank_name = mysqli_real_escape_string($link,$_POST['bank_name']);
$acc_type = mysqli_real_escape_string($link,$_POST['acc_type']);
$acc_name = mysqli_real_escape_string($link,$_POST['acc_name']);
$acc_no = mysqli_real_escape_string($link,$_POST['acc_no']);
$hom_branch = mysqli_real_escape_string($link,$_POST['hom_branch']);
$ifsc_code = mysqli_real_escape_string($link,$_POST['ifsc_code']);
$swift_code = mysqli_real_escape_string($link,$_POST['swift_code']);
$description = mysqli_real_escape_string($link,$_POST['description']);
$nostro_code = mysqli_real_escape_string($link,$_POST['nostro_code']);
$opening_bal = mysqli_real_escape_string($link,$_POST['opening_bal']);
$status = mysqli_real_escape_string($link,$_POST['status']);
$sort_order = mysqli_real_escape_string($link,$_POST['sort_order']);
if(mysqli_query($link,"UPDATE `bank_tbl` SET `bank_name` = '$bank_name', `acc_type` = '$acc_type', `acc_name` = '$acc_name', `acc_no` = '$acc_no', `hom_branch` = '$hom_branch', `ifsc_code` = '$ifsc_code', `swift_code` = '$swift_code', `description` = '$description', `nostro_code` = '$nostro_code', `opening_bal` = '$opening_bal', `ip_address` = '$ip_address', `browser` = '$browser', `date` = '$date', `created_by` = '$created_by', `approved_by` = '$approved_by', `status` = '$status', `sort_order` = '$sort_order' WHERE `bank_id`='$bank_id'")){
	$msg[] = "Successfully Saved!";
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
                        <div class="col-lg-6"><h3 class="box-heading"> Bank <small>Add / Update  Details</small></h3></h3></div>
                        <div class="col-lg-6">
                          <div class="breadcrumb">
                            <a href="index.php" class="breadcrumb_a">Home</a> 
                            <i class="fa fa-angle-double-right angle_double_right"></i>
                            <a href="bank_view.php" class="breadcrumb_a">Bank </a> 
                            <i class="fa fa-angle-double-right angle_double_right" aria-hidden="true"></i>
                            <a href="#" class="breadcrumb_a">Add / Update Bank </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="box-body">
                      <!-- <h5 class="second_heading">Add City</h5> -->
                      <form method="post" class="padding-10" enctype="multipart/form-data">
                     <?php
	$bank_id = mysqli_real_escape_string($link,$_GET['bank_id']);
	$update = mysqli_real_escape_string($link,$_GET['update']);
	if($update == "yes"){
	$sel_row = mysqli_query($link,"select * from bank_tbl where `bank_id`='$bank_id'");
	$row = mysqli_fetch_object($sel_row);
	$upload_id = $row->bank_id;
	}
	else
	{
	$max_id = maxOfAll("id","bank_tbl");
	$max_id=$max_id+1;
	$upload_id="ban-".$max_id;
	}
	?>     <div class="row mt-3">
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
        <label class="margin-left-10" for="industry_name">Bank   Id</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
          <input type="text" class="form-control" name="bank_id" id="bank_id" placeholder="Enter the Bank Id" value="<?php echo $upload_id; ?>" readonly="readonly">
        </div>
      </div>
    </div>
    
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Bank Name</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
         <input type="text" class="form-control" name="bank_name" id="bank_name" placeholder="Enter the Bank Name" value="<?php echo $row->bank_name; ?>" required="required">
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Account Type</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
         <input type="text" class="form-control" name="acc_type" id="acc_type" placeholder="Enter the Account Type" value="<?php echo $row->acc_type; ?>" required="required">
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Account Name</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
         <input type="text" class="form-control" name="acc_name" id="acc_name" placeholder="Enter the Account Name" value="<?php echo $row->acc_name; ?>" required="required">
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Account Number</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
         <input type="text" class="form-control" name="acc_no" id="acc_no" placeholder="Enter the Account Number" value="<?php echo $row->acc_no; ?>" min="10" max="25" required="required">
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Home Branch</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
         <input type="text" class="form-control" name="hom_branch" id="hom_branch" placeholder="Enter the Home Branch" value="<?php echo $row->hom_branch; ?>" required="required">
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">IFSC Code</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
         <input type="text" class="form-control" name="ifsc_code" id="ifsc_code" placeholder="Enter the IFSC Code" value="<?php echo $row->ifsc_code; ?>" required="required">
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Swift Code</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
         <input type="text" class="form-control" name="swift_code" id="swift_code" placeholder="Enter the Swift Code" value="<?php echo $row->swift_code; ?>" required="required">
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Description</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
         <input type="text" class="form-control" name="description" id="description" placeholder="Enter the Description" value="<?php echo $row->description; ?>" required="required">
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Nostro Code</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
         <input type="text" class="form-control" name="nostro_code" id="nostro_code" placeholder="Enter the Nostro Code" value="<?php echo $row->nostro_code; ?>" required="required">
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Opening Balance</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
        <input type="text" class="form-control" name="opening_bal" id="opening_bal" placeholder="Enter the Opening Balance" value="<?php echo $row->opening_bal; ?>"   min="5" max="15" required="required">
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