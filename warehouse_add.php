<?php 
include 'dbc.php'; 
page_protect();
$created_by = $_SESSION['userid'];
$approved_by = "";
?>
<?php
if($_POST['submit'] == "Submit"){

$id = mysqli_real_escape_string($link,$_POST['id']);
$warehouse_id = mysqli_real_escape_string($link,$_POST['warehouse_id']);
$branch_id = mysqli_real_escape_string($link,$_POST['branch_id']);
$company_id = mysqli_real_escape_string($link,$_POST['company_id']);
$warehouse_name = mysqli_real_escape_string($link,$_POST['warehouse_name']);
$warehouse_type = mysqli_real_escape_string($link,$_POST['warehouse_type']);
$warehouse_address = mysqli_real_escape_string($link,$_POST['warehouse_address']);
$warehouse_country = mysqli_real_escape_string($link,$_POST['warehouse_country']);
$warehouse_state = mysqli_real_escape_string($link,$_POST['warehouse_state']);
$warehouse_district = mysqli_real_escape_string($link,$_POST['warehouse_district']);
$warehouse_city = mysqli_real_escape_string($link,$_POST['warehouse_city']);
$warehouse_area = mysqli_real_escape_string($link,$_POST['warehouse_area']);
$warehouse_pincode = mysqli_real_escape_string($link,$_POST['warehouse_pincode']);
$reg_type = mysqli_real_escape_string($link,$_POST['reg_type']);
$reg_date = mysqli_real_escape_string($link,$_POST['reg_date']);
$reg_no = mysqli_real_escape_string($link,$_POST['reg_no']);
$warehouse_pan_no = mysqli_real_escape_string($link,$_POST['warehouse_pan_no']);
$gst_no = mysqli_real_escape_string($link,$_POST['gst_no']);
$warehouse_email_id = mysqli_real_escape_string($link,$_POST['warehouse_email_id']);
$phone_number = mysqli_real_escape_string($link,$_POST['phone_number']);
$logo = mysqli_real_escape_string($link,$_POST['logo']);
if(mysqli_query($link,"INSERT INTO `warehouse_tbl` (`id`, `warehouse_id`, `company_id`, `branch_id`, `warehouse_name`, `warehouse_type`, `warehouse_address`, `warehouse_country`, `warehouse_state`, `warehouse_district`, `warehouse_city`, `warehouse_area`, `warehouse_pincode`, `reg_type`, `reg_date`, `reg_no`, `warehouse_pan_no`, `gst_no`, `warehouse_email_id`, `phone_number`, `logo`, `date`, `ip_address`, `browser`, `created_by`, `approved_by`) VALUES ('$id', '$warehouse_id', '$company_id', '$branch_id', '$warehouse_name', '$warehouse_type', '$warehouse_address', '$warehouse_country', '$warehouse_state', '$warehouse_district', '$warehouse_city', '$warehouse_area', '$warehouse_pincode', '$reg_type', '$reg_date', '$reg_no', '$warehouse_pan_no', '$gst_no', '$warehouse_email_id', '$phone_number', '$logo', '$date', '$ip_address', '$browser', '$created_by', '$approved_by')")){

  $fname = $_FILES['logo']['name'];
  if($fname != ""){
  $upload_dir = "uploads/logo/";
    $ftype = $_FILES['logo']['type'];
    $filename_part = explode(".", $fname);
  $upload_name = $filename_part[0];
  $ext = $filename_part[1];
  $max_id = maxOfAll("id","upload_tbl");
  $max_id=$max_id+1;
  $upload_id="U-".$max_id;
  $new_filename = $upload_dir.$upload_name."_".$upload_id.".".$ext;
  $page="";
  $title="";
    $movetofolder = (@copy($_FILES['logo']['tmp_name'],$new_filename));
  //Insert or Update statement to be included here
  mysqli_query($link,"update `warehouse_tbl` set logo='$new_filename' where `warehouse_id`='$warehouse_id'");
  mysqli_query($link,"INSERT INTO `upload_tbl` (`id`, `autoid`, `userid`, `upload_type`, `upload_location`, `page`, `title`, `date`, `ip_address`) VALUES (NULL, '$upload_id', '$userid', '$ext', '$new_filename', '$page', '$title', NOW(), '$user_ip')");
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
$warehouse_id = mysqli_real_escape_string($link,$_POST['warehouse_id']);
$branch_id = mysqli_real_escape_string($link,$_POST['branch_id']);
$company_id = mysqli_real_escape_string($link,$_POST['company_id']);
$warehouse_name = mysqli_real_escape_string($link,$_POST['warehouse_name']);
$warehouse_type = mysqli_real_escape_string($link,$_POST['warehouse_type']);
$warehouse_address = mysqli_real_escape_string($link,$_POST['warehouse_address']);
$warehouse_country = mysqli_real_escape_string($link,$_POST['warehouse_country']);
$warehouse_state = mysqli_real_escape_string($link,$_POST['warehouse_state']);
$warehouse_district = mysqli_real_escape_string($link,$_POST['warehouse_district']);
$warehouse_city = mysqli_real_escape_string($link,$_POST['warehouse_city']);
$warehouse_area = mysqli_real_escape_string($link,$_POST['warehouse_area']);
$warehouse_pincode = mysqli_real_escape_string($link,$_POST['warehouse_pincode']);
$reg_type = mysqli_real_escape_string($link,$_POST['reg_type']);
$reg_date = mysqli_real_escape_string($link,$_POST['reg_date']);
$reg_no = mysqli_real_escape_string($link,$_POST['reg_no']);
$warehouse_pan_no = mysqli_real_escape_string($link,$_POST['warehouse_pan_no']);
$gst_no = mysqli_real_escape_string($link,$_POST['gst_no']);
$warehouse_email_id = mysqli_real_escape_string($link,$_POST['warehouse_email_id']);
$phone_number = mysqli_real_escape_string($link,$_POST['phone_number']);
$logo = mysqli_real_escape_string($link,$_POST['logo']);
if(mysqli_query($link,"UPDATE `warehouse_tbl` SET `company_id`='$company_id', `branch_id`='$branch_id', `warehouse_name` = '$warehouse_name', `warehouse_type` = '$warehouse_type', `warehouse_address` = '$warehouse_address', `warehouse_country` = '$warehouse_country', `warehouse_state` = '$warehouse_state', `warehouse_district` = '$warehouse_district', `warehouse_city` = '$warehouse_city', `warehouse_area` = '$warehouse_area', `warehouse_pincode` = '$warehouse_pincode', `reg_type` = '$reg_type', `reg_date` = '$reg_date', `reg_no` = '$reg_no', `warehouse_pan_no` = '$warehouse_pan_no', `gst_no` = '$gst_no', `warehouse_email_id` = '$warehouse_email_id', `phone_number` = '$phone_number', `logo` = '$logo', `date` = '$date', `ip_address` = '$ip_address', `browser` = '$browser', `created_by` = '$created_by', `approved_by` = '$approved_by' WHERE `id`='$id'")){
  $fname = $_FILES['logo']['name'];
  if($fname != ""){
  $upload_dir = "uploads/logo/";
    $ftype = $_FILES['logo']['type'];
    $filename_part = explode(".", $fname);
  $upload_name = $filename_part[0];
  $ext = $filename_part[1];
  $max_id = maxOfAll("id","upload_tbl");
  $max_id=$max_id+1;
  $upload_id="U-".$max_id;
  $new_filename = $upload_dir.$upload_name."_".$upload_id.".".$ext;
  $page="";
  $title="";
    $movetofolder = (@copy($_FILES['logo']['tmp_name'],$new_filename));
  //Insert or Update statement to be included here
  mysqli_query($link,"update `warehouse_tbl` set logo='$new_filename' where `warehouse_id`='$warehouse_id'");
  mysqli_query($link,"INSERT INTO `upload_tbl` (`id`, `autoid`, `userid`, `upload_type`, `upload_location`, `page`, `title`, `date`, `ip_address`) VALUES (NULL, '$upload_id', '$userid', '$ext', '$new_filename', '$page', '$title', NOW(), '$user_ip')");
  }
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
                        <div class="col-lg-6"><h3 class="box-heading"> Warehouse <small>Add / Update  Details</small></h3></h3></div>
                        <div class="col-lg-6">
                          <div class="breadcrumb">
                            <a href="index.php" class="breadcrumb_a">Home</a> 
                            <i class="fa fa-angle-double-right angle_double_right"></i>
                            <a href="warehouse_view.php" class="breadcrumb_a">Warehouse </a> 
                            <i class="fa fa-angle-double-right angle_double_right" aria-hidden="true"></i>
                            <a href="#" class="breadcrumb_a">Add / Update Warehouse </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="box-body">
                      <!-- <h5 class="second_heading">Add City</h5> -->
                      <form method="post" class="padding-10" enctype="multipart/form-data">
                        <?php
  $id = mysqli_real_escape_string($link,$_GET['id']);
  $update = mysqli_real_escape_string($link,$_GET['update']);
  if($update == "yes"){
  $sel_row = mysqli_query($link,"select * from warehouse_tbl where `id`='$id'");
  $row = mysqli_fetch_object($sel_row);
  $upload_id = $row->id;
  }
  else
  {
  $max_id = maxOfAll("id","warehouse_tbl");
  $max_id=$max_id+1;
  $upload_id="war-".$max_id;
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
    <input type="hidden" class="form-control" name="id" id="id" placeholder="" value="<?php echo $row->id; ?>" readonly="readonly"required="required">
                          
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Warehouse ID</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
          <input type="text" class="form-control" name="warehouse_id" id="warehouse_id" placeholder="Enter the Warehouse Id" value="<?php echo $upload_id; ?>" readonly="readonly">
        </div>
      </div>
    </div>
    
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Company</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
          <select name="company_id" id="company_id" class="form-control">
        <?php
        $sel_rw = mysqli_query($link,"select company_name,company_id from company_tbl");
        while($row1 = mysqli_fetch_object($sel_rw)){
        ?>

        <option value="<?php echo $row1->company_id; ?>"><?php echo $row1->company_name; ?></option>

        <?php } ?>
        </select>
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Branch </label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
          <select name="branch_id" id="branch_id" class="form-control">
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
        <label class="margin-left-10" for="industry_id">Warehouse Name</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
        <input type="text" class="form-control" name="warehouse_name" id="warehouse_name" placeholder="Enter the Warehouse Name" value="<?php echo $row->warehouse_name; ?>"required="required">
        </div>
      </div>
    </div>
    
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Warehouse Type</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
        <select name="warehouse_type" id="warehouse_type" class="form-control" required="required">
          <option value="company">Company</option>
          <option value="franchise">Franchise</option>
        </select>
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Warehouse Address</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">

        <textarea class="form-control" name="warehouse_address" id="warehouse_address" placeholder="Enter the Warehouse Address"required="required">
        <?php echo $row->warehouse_address; ?></textarea>
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Country</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
        <select name="warehouse_country" id="warehouse_country" class="form-control" required="required">
        <?php
        $sel_rw1 = mysqli_query($link,"select country_name from country_tbl");
        while($row1 = mysqli_fetch_object($sel_rw1)){
        ?>

        <option value="<?php echo $row1->country_name; ?>"><?php echo $row1->country_name; ?></option>

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
        <select name="warehouse_state" id="warehouse_state" class="form-control" required="required">
        <?php
        $sel_rw1 = mysqli_query($link,"select state_name from state_tbl");
        while($row1 = mysqli_fetch_object($sel_rw1)){
        ?>

        <option value="<?php echo $row1->state_name; ?>"><?php echo $row1->state_name; ?></option>

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
        <select name="warehouse_district" id="warehouse_district" class="form-control" required="required">
        <?php
        $sel_rw1 = mysqli_query($link,"select district_name from district_tbl");
        while($row1 = mysqli_fetch_object($sel_rw1)){
        ?>

        <option value="<?php echo $row1->district_name; ?>"><?php echo $row1->district_name; ?></option>

        <?php } ?>
        </select>
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">City</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
        <select name="warehouse_city" id="warehouse_city" class="form-control" required="required">
        <?php
        $sel_rw1 = mysqli_query($link,"select city_name from city_tbl");
        while($row1 = mysqli_fetch_object($sel_rw1)){
        ?>

        <option value="<?php echo $row1->city_name; ?>"><?php echo $row1->city_name; ?></option>

        <?php } ?>
        </select>
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Area</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
        <select name="warehouse_area" id="warehouse_area" class="form-control" required="required">
        <?php
        $sel_rw1 = mysqli_query($link,"select area_name from pincode_tbl");
        while($row1 = mysqli_fetch_object($sel_rw1)){
        ?>

        <option value="<?php echo $row1->area_name; ?>"><?php echo $row1->area_name; ?></option>

        <?php } ?>
        </select>
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Pincode</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
        <select name="warehouse_pincode" id="warehouse_pincode" class="form-control" required="required">
        <?php
        $sel_rw1 = mysqli_query($link,"select pin_code from pincode_tbl");
        while($row1 = mysqli_fetch_object($sel_rw1)){
        ?>

        <option value="<?php echo $row1->pin_code; ?>"><?php echo $row1->pin_code; ?></option>

        <?php } ?>
        </select>
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Registraion Type</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
        <select name="reg_type" id="reg_type" class="form-control" required="required">
          <option value="msme">MSME</option>
          <option value="ssi">SSI</option>
        </select>
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Registration Date</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
        <input type="date" class="form-control" name="reg_date" id="reg_date" placeholder="" value="<?php echo $row->reg_date; ?>">
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Registration No</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
        <input type="text" class="form-control" name="reg_no" id="reg_no" placeholder="Eneter the Registration No" value="<?php echo $row->reg_no; ?>"required="required">
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Warehouse PAN No</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
        <input type="text" class="form-control" name="warehouse_pan_no" id="warehouse_pan_no" placeholder="Eneter the Pan No" value="<?php echo $row->warehouse_pan_no; ?>"required="required">
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">GST No</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
        <input type="text" class="form-control" name="gst_no" id="gst_no" placeholder="Enter the Gst Number" value="<?php echo $row->gst_no; ?>"required="required">
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Email Id</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
        <input type="email" class="form-control" name="warehouse_email_id" id="warehouse_email_id" placeholder="Enter The Email" value="<?php echo $row->warehouse_email_id; ?>"required="required">
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Phone Number</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
        <input type="tel" class="form-control" name="phone_number" id="phone_number" placeholder="Eneter the Phone No" value="<?php echo $row->phone_number; ?>"   min="10" max="15" required="required">
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Warehouse Logo</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
        <input class="form-control" name="logo" id="logo" type="file" />
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

 
</html>