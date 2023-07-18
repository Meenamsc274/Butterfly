<?php 
include 'dbc.php'; 
page_protect();
$created_by = $_SESSION['userid'];
$approved_by = "";
?>
<?php
if($_POST['submit'] == "Submit"){
$id = mysqli_real_escape_string($link,$_POST['id']);
$company_id = mysqli_real_escape_string($link,$_POST['company_id']);
$company_name = mysqli_real_escape_string($link,$_POST['company_name']);
$industry = mysqli_real_escape_string($link,$_POST['industry']);
$company_type = mysqli_real_escape_string($link,$_POST['company_type']);
$company_address = mysqli_real_escape_string($link,$_POST['company_address']);
$company_country = mysqli_real_escape_string($link,$_POST['company_country']);
$company_state = mysqli_real_escape_string($link,$_POST['company_state']);
$company_district = mysqli_real_escape_string($link,$_POST['company_district']);
$company_city = mysqli_real_escape_string($link,$_POST['company_city']);
$company_area = mysqli_real_escape_string($link,$_POST['company_area']);
$company_pincode = mysqli_real_escape_string($link,$_POST['company_pincode']);
$reg_type = mysqli_real_escape_string($link,$_POST['reg_type']);
$reg_date = mysqli_real_escape_string($link,$_POST['reg_date']);
$reg_no = mysqli_real_escape_string($link,$_POST['reg_no']);
$pan_no = mysqli_real_escape_string($link,$_POST['pan_no']);
$gst_no = mysqli_real_escape_string($link,$_POST['gst_no']);
$company_email_id = mysqli_real_escape_string($link,$_POST['company_email_id']);
$phone_number = mysqli_real_escape_string($link,$_POST['phone_number']);
$company_url = mysqli_real_escape_string($link,$_POST['company_url']);
$facebook_link = mysqli_real_escape_string($link,$_POST['facebook_link']);
$twitter_link = mysqli_real_escape_string($link,$_POST['twitter_link']);
$youtube_link = mysqli_real_escape_string($link,$_POST['youtube_link']);
$account_name = mysqli_real_escape_string($link,$_POST['account_name']);
$account_bank = mysqli_real_escape_string($link,$_POST['account_bank']);
$account_branch = mysqli_real_escape_string($link,$_POST['account_branch']);
$account_ifsc = mysqli_real_escape_string($link,$_POST['account_ifsc']);
$account_number = mysqli_real_escape_string($link,$_POST['account_number']);
$account_type = mysqli_real_escape_string($link,$_POST['account_type']);
$account_swift = mysqli_real_escape_string($link,$_POST['account_swift']);
$branches = mysqli_real_escape_string($link,$_POST['branches']);
$warehouse = mysqli_real_escape_string($link,$_POST['warehouse']);
$logo = mysqli_real_escape_string($link,$_POST['logo']);
if(mysqli_query($link,"INSERT INTO `company_tbl` (`id`, `company_id`, `company_name`, `industry`, `company_type`, `company_address`, `company_country`, `company_state`, `company_district`, `company_city`, `company_area`, `company_pincode`, `reg_type`, `reg_date`, `reg_no`, `pan_no`, `gst_no`, `company_email_id`, `phone_number`, `company_url`, `facebook_link`, `twitter_link`, `youtube_link`, `account_name`, `account_bank`, `account_branch`, `account_ifsc`, `account_number`, `account_type`, `account_swift`, `branches`, `warehouse`, `logo`, `date`, `ip_address`, `browser`, `created_by`, `approved_by`) VALUES ('$id', '$company_id', '$company_name', '$industry', '$company_type', '$company_address', '$company_country', '$company_state', '$company_district', '$company_city', '$company_area', '$company_pincode', '$reg_type', '$reg_date', '$reg_no', '$pan_no', '$gst_no', '$company_email_id', '$phone_number', '$company_url', '$facebook_link', '$twitter_link', '$youtube_link', '$account_name', '$account_bank', '$account_branch', '$account_ifsc', '$account_number', '$account_type', '$account_swift', '$branches', '$warehouse', '$logo', '$date', '$ip_address', '$browser', '$created_by', '$approved_by')")){

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
  mysqli_query($link,"update `company_tbl` set logo='$new_filename' where `company_id`='$company_id'");
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
$company_id = mysqli_real_escape_string($link,$_POST['company_id']);
$company_name = mysqli_real_escape_string($link,$_POST['company_name']);
$industry = mysqli_real_escape_string($link,$_POST['industry']);
$company_type = mysqli_real_escape_string($link,$_POST['company_type']);
$company_address = mysqli_real_escape_string($link,$_POST['company_address']);
$company_country = mysqli_real_escape_string($link,$_POST['company_country']);
$company_state = mysqli_real_escape_string($link,$_POST['company_state']);
$company_district = mysqli_real_escape_string($link,$_POST['company_district']);
$company_city = mysqli_real_escape_string($link,$_POST['company_city']);
$company_area = mysqli_real_escape_string($link,$_POST['company_area']);
$company_pincode = mysqli_real_escape_string($link,$_POST['company_pincode']);
$reg_type = mysqli_real_escape_string($link,$_POST['reg_type']);
$reg_date = mysqli_real_escape_string($link,$_POST['reg_date']);
$reg_no = mysqli_real_escape_string($link,$_POST['reg_no']);
$pan_no = mysqli_real_escape_string($link,$_POST['pan_no']);
$gst_no = mysqli_real_escape_string($link,$_POST['gst_no']);
$company_email_id = mysqli_real_escape_string($link,$_POST['company_email_id']);
$phone_number = mysqli_real_escape_string($link,$_POST['phone_number']);
$company_url = mysqli_real_escape_string($link,$_POST['company_url']);
$facebook_link = mysqli_real_escape_string($link,$_POST['facebook_link']);
$twitter_link = mysqli_real_escape_string($link,$_POST['twitter_link']);
$youtube_link = mysqli_real_escape_string($link,$_POST['youtube_link']);
$account_name = mysqli_real_escape_string($link,$_POST['account_name']);
$account_bank = mysqli_real_escape_string($link,$_POST['account_bank']);
$account_branch = mysqli_real_escape_string($link,$_POST['account_branch']);
$account_ifsc = mysqli_real_escape_string($link,$_POST['account_ifsc']);
$account_number = mysqli_real_escape_string($link,$_POST['account_number']);
$account_type = mysqli_real_escape_string($link,$_POST['account_type']);
$account_swift = mysqli_real_escape_string($link,$_POST['account_swift']);
$branches = mysqli_real_escape_string($link,$_POST['branches']);
$warehouse = mysqli_real_escape_string($link,$_POST['warehouse']);
$logo = mysqli_real_escape_string($link,$_POST['logo']);
if(mysqli_query($link,"UPDATE `company_tbl` SET `company_name` = '$company_name', `industry` = '$industry', `company_type` = '$company_type', `company_address` = '$company_address', `company_country` = '$company_country', `company_state` = '$company_state', `company_district` = '$company_district', `company_city` = '$company_city', `company_area` = '$company_area', `company_pincode` = '$company_pincode', `reg_type` = '$reg_type', `reg_date` = '$reg_date', `reg_no` = '$reg_no', `pan_no` = '$pan_no', `gst_no` = '$gst_no', `company_email_id` = '$company_email_id', `phone_number` = '$phone_number', `company_url` = '$company_url', `facebook_link` = '$facebook_link', `twitter_link` = '$twitter_link', `youtube_link` = '$youtube_link', `account_name` = '$account_name', `account_bank` = '$account_bank', `account_branch` = '$account_branch', `account_ifsc` = '$account_ifsc', `account_number` = '$account_number', `account_type` = '$account_type', `account_swift` = '$account_swift', `branches` = '$branches', `warehouse` = '$warehouse', `logo` = '$logo', `date` = '$date', `ip_address` = '$ip_address', `browser` = '$browser', `created_by` = '$created_by', `approved_by` = '$approved_by' WHERE `company_id`='$company_id'")){
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
  mysqli_query($link,"update `company_tbl` set logo='$new_filename' where `company_id`='$company_id'");
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
                        <div class="col-lg-6"><h3 class="box-heading"> Company <small>Add / Update  Details</small></h3></h3></div>
                        <div class="col-lg-6">
                          <div class="breadcrumb">
                            <a href="index.php" class="breadcrumb_a">Home</a> 
                            <i class="fa fa-angle-double-right angle_double_right"></i>
                            <a href="pincode_view.php" class="breadcrumb_a">Company </a> 
                            <i class="fa fa-angle-double-right angle_double_right" aria-hidden="true"></i>
                            <a href="#" class="breadcrumb_a">Add / Update Company </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="box-body">
                      <!-- <h5 class="second_heading">Add City</h5> -->
                      <form method="post" class="padding-10">
                         <?php
                         $company_id = mysqli_real_escape_string($link,$_GET['company_id']);
  $update = mysqli_real_escape_string($link,$_GET['update']);
  if($update == "yes"){
  $sel_row = mysqli_query($link,"select * from company_tbl where `company_id`='$company_id'");
  $row = mysqli_fetch_object($sel_row);
  $upload_id = $row->company_id;
  }
  else
  {
  $max_id = maxOfAll("id","company_tbl");
  $max_id=$max_id+1;
  $upload_id="com-".$max_id;
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
        <label class="margin-left-10" for="industry_name">Company ID</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
          <input type="text" class="form-control" name="company_id" id="company_id" placeholder="Enter the Company Id" value="<?php echo $upload_id; ?>" readonly="readonly" required="required">
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Company Name</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
          <input type="text" class="form-control" name="company_name" id="company_name" placeholder="Enter the Company name" value="<?php echo $row->company_name; ?>"  required="required">
        </div>
      </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Industry</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
          <select name="industry" id="industry" class="form-control" required="required">
        <?php
        $sel_rw1 = mysqli_query($link,"select industry_name from industry_tbl");
        while($row1 = mysqli_fetch_object($sel_rw1)){
        ?>

        <option value="<?php echo $row1->industry_name; ?>"><?php echo $row1->industry_name; ?></option>

        <?php } ?>
        </select>
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Company Type</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
          <select name="company_type" id="company_type" class="form-control" required="required">
          <option value="private limited company">Private Limited Company</option>
          <option value="public limited company">Public Limited Company</option>
          <option value="unlimited company">Unlimited Company</option>
          <option value="LLP">Limited Liability Partnership</option>
          <option value="partnership">Partnership</option>
          <option value="sole proprietorship">Sole Proprietorship</option>
        </select>
        </div>
      </div>
    </div>


    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_id">Company Address</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
        <textarea class="form-control" name="company_address" id="company_address" placeholder="Enter the company Address"  required="required">
        <?php echo $row->company_address; ?></textarea>
        </div>
      </div>
    </div>
    
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Country</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
        <select name="company_country" id="company_country" class="form-control" required="required">
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

        <select name="company_state" id="company_state" class="form-control" required="required">
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
        <select name="company_district" id="company_district" class="form-control" required="required">
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
        <select name="company_city" id="company_city" class="form-control" required="required">
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
        <select name="company_area" id="company_area" class="form-control" required="required">
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
        <select name="company_pincode" id="company_pincode" class="form-control" required="required">
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
        <input type="date" class="form-control" name="reg_date" id="reg_date" placeholder="" value="<?php echo $row->reg_date; ?>"  required="required">
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Registration No</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
        <input type="text" class="form-control" name="reg_no" id="reg_no" placeholder="Enter the Reg No" value="<?php echo $row->reg_no; ?>"  required="required">
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">PAN No</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
        <input type="text" class="form-control" name="pan_no" id="pan_no" placeholder="Enter the Pan No" value="<?php echo $row->pan_no; ?>">
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">GST No</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
        <input type="text" class="form-control" name="gst_no" id="gst_no" placeholder="Enter the gst no" value="<?php echo $row->gst_no; ?>"  required="required">
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Email Id</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
        <input type="email" class="form-control" name="company_email_id" id="company_email_id" placeholder="Enter the Email ID" value="<?php echo $row->company_email_id; ?>"  required="required">
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Phone Number</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
        <input type="tel" class="form-control" name="phone_number" id="phone_number" placeholder="Enter the Phone Number" value="<?php echo $row->phone_number; ?>"  required="required">
        </div>
      </div>
    </div>
   
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">URL</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
        <input type="url" class="form-control" name="company_url" id="company_url" placeholder="Enter the Company Website URL" value="<?php echo $row->company_url; ?>">
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Facebook Page Link</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
        <input type="text" class="form-control" name="facebook_link" id="facebook_link" placeholder="Enter the Company Facebook Link" value="<?php echo $row->facebook_link; ?>">
        </div>
      </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Twitter Page Link</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
        <input type="text" class="form-control" name="twitter_link" id="twitter_link" placeholder="Enter the Company Twitter Link" value="<?php echo $row->twitter_link; ?>">
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Youtube Page Link</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
        <input type="text" class="form-control" name="youtube_link" id="youtube_link" placeholder="Enter the Company Youtube Link" value="<?php echo $row->youtube_link; ?>">
        </div>
      </div>
    </div>

     <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Account Name</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
        <input type="text" class="form-control" name="account_name" id="account_name" placeholder="Enter the Bank Account Name" value="<?php echo $row->account_name; ?>"  required="required">
        </div>
      </div>
    </div>
    
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Bank Name</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
        <input type="text" class="form-control" name="account_bank" id="account_bank" placeholder="Enter the Bank Name" value="<?php echo $row->account_bank; ?>"  required="required">
        </div>
      </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Bank Branch</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
        <input type="text" class="form-control" name="account_branch" id="account_branch" placeholder="Enter the Branch Name" value="<?php echo $row->account_branch; ?>"  required="required">
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">IFSC Code</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
        <input type="text" class="form-control" name="account_ifsc" id="account_ifsc" placeholder="Enter the IFSC Code" value="<?php echo $row->account_ifsc; ?>"  required="required">
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Account Number</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
        <input type="text" class="form-control" name="account_number" id="account_number" placeholder="Enter the Bank Account Number " value="<?php echo $row->account_number; ?>"  required="required">
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Account Type</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
        <input type="text" class="form-control" name="account_type" id="account_type" placeholder="Please Select Account Type" value="<?php echo $row->account_type; ?>"  required="required">
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Swift Code</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
        <input type="text" class="form-control" name="account_swift" id="account_swift" placeholder="Enter the SWIFT Number" value="<?php echo $row->account_swift; ?>"  required="required">
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">No Of Branches</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
        <input type="text" class="form-control" name="branches" id="branches" placeholder="Enter the Branches" value="<?php echo $row->branches; ?>">
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">No Of Warehouse</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
        <input type="text" class="form-control" name="warehouse" id="warehouse" placeholder="Enter the Warehouse" value="<?php echo $row->warehouse; ?>">
        </div>
      </div>
    </div>

     <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Company Logo</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
        <input class="form-control" name="logo" id="logo" type="file"      />
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
$("#industry option[value='<?php echo $row->industry; ?>']").attr("selected", "selected");
$("#company_type option[value='<?php echo $row->company_type; ?>']").attr("selected", "selected");
$("#company_country option[value='<?php echo $row->company_country; ?>']").attr("selected", "selected");
$("#company_state option[value='<?php echo $row->company_state; ?>']").attr("selected", "selected");
$("#company_district option[value='<?php echo $row->company_district; ?>']").attr("selected", "selected");
$("#company_city option[value='<?php echo $row->company_city; ?>']").attr("selected", "selected");
$("#company_area option[value='<?php echo $row->company_area; ?>']").attr("selected", "selected");
$("#company_pincode option[value='<?php echo $row->company_pincode; ?>']").attr("selected", "selected");
$("#reg_type option[value='<?php echo $row->reg_type; ?>']").attr("selected", "selected");
$("#status option[value='<?php echo $row->status; ?>']").attr("selected", "selected");
});
</script>
<script type="text/javascript">
       
    $(document).ready(function() {
      $("#company_country").change(function() {
      $.get('get_state.php?country=' + $(this).val(), function(data) {
      $("#company_state").html(data);
      $('#loader').slideUp(200, function() {
      $(this).remove();
      });
      });
      });
      $("#company_state").change(function() {
      $.get('get_district.php?country='+ $("#company_country").val() +'&state=' + $(this).val(), function(data) {
      $("#company_district").html(data);
      $('#loader').slideUp(200, function() {
      $(this).remove();
      });
      });
      });
      $("#company_district").change(function() {
      $.get('get_city.php?country='+ $("#company_country").val() +'&state='+ $("#company_state").val() +'&district='+ $(this).val(), function(data) {
      $("#company_city").html(data);
      $('#loader').slideUp(200, function() {
      $(this).remove();
      });
      });
      });
      $("#company_city").change(function() {
      $.get('get_area.php?country='+ $("#company_country").val() +'&state='+ $("#company_state").val() +'&district='+ $("#company_district").val() +'&city='+ $(this).val(), function(data) {
      $("#company_area").html(data);
      $('#loader').slideUp(200, function() {
      $(this).remove();
      });
      });
      });
      $("#company_area").change(function() {
      $.get('get_pincode.php?country='+ $("#company_country").val() +'&state='+ $("#company_state").val() +'&district='+ $("#company_district").val() +'&city='+ $("#company_city").val() +'&area='+ $(this).val(), function(data) {
      $("#company_area").html(data);
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