<?php 
include 'dbc.php'; 
page_protect();
$created_by = $_SESSION['userid'];
$approved_by = "";
?>
<?php
if($_POST['submit'] == "Submit"){
$id = mysqli_real_escape_string($link,$_POST['id']);
$branch_id = mysqli_real_escape_string($link,$_POST['branch_id']);
$company_id = mysqli_real_escape_string($link,$_POST['company_id']);
$branch_name = mysqli_real_escape_string($link,$_POST['branch_name']);
$branch_type = mysqli_real_escape_string($link,$_POST['branch_type']);
$branch_address = mysqli_real_escape_string($link,$_POST['branch_address']);
$branch_country = mysqli_real_escape_string($link,$_POST['branch_country']);
$branch_state = mysqli_real_escape_string($link,$_POST['branch_state']);
$branch_district = mysqli_real_escape_string($link,$_POST['branch_district']);
$branch_city = mysqli_real_escape_string($link,$_POST['branch_city']);
$branch_area = mysqli_real_escape_string($link,$_POST['branch_area']);
$branch_pincode = mysqli_real_escape_string($link,$_POST['branch_pincode']);
$reg_type = mysqli_real_escape_string($link,$_POST['reg_type']);
$reg_date = mysqli_real_escape_string($link,$_POST['reg_date']);
$reg_no = mysqli_real_escape_string($link,$_POST['reg_no']);
$branch_pan_no = mysqli_real_escape_string($link,$_POST['branch_pan_no']);
$gst_no = mysqli_real_escape_string($link,$_POST['gst_no']);
$branch_email_id = mysqli_real_escape_string($link,$_POST['branch_email_id']);
$phone_number = mysqli_real_escape_string($link,$_POST['phone_number']);
$account_name = mysqli_real_escape_string($link,$_POST['account_name']);
$account_bank = mysqli_real_escape_string($link,$_POST['account_bank']);
$account_branch = mysqli_real_escape_string($link,$_POST['account_branch']);
$account_ifsc = mysqli_real_escape_string($link,$_POST['account_ifsc']);
$account_number = mysqli_real_escape_string($link,$_POST['account_number']);
$account_type = mysqli_real_escape_string($link,$_POST['account_type']);
$account_swift = mysqli_real_escape_string($link,$_POST['account_swift']);
if(mysqli_query($link,"INSERT INTO `branch_tbl` (`id`, `branch_id`, `company_id`, `branch_name`, `branch_type`, `branch_address`, `branch_country`, `branch_state`, `branch_district`, `branch_city`, `branch_area`, `branch_pincode`, `reg_type`, `reg_date`, `reg_no`, `branch_pan_no`, `gst_no`, `branch_email_id`, `phone_number`, `account_name`, `account_bank`, `account_branch`, `account_ifsc`, `account_number`, `account_type`, `account_swift`, `date`, `ip_address`, `browser`, `created_by`, `approved_by`) VALUES ('$id', '$branch_id', '$company_id', '$branch_name', '$branch_type', '$branch_address', '$branch_country', '$branch_state', '$branch_district', '$branch_city', '$branch_area', '$branch_pincode', '$reg_type', '$reg_date', '$reg_no', '$branch_pan_no', '$gst_no', '$branch_email_id', '$phone_number', '$account_name', '$account_bank', '$account_branch', '$account_ifsc', '$account_number', '$account_type', '$account_swift', '$date', '$ip_address', '$browser', '$created_by', '$approved_by')")){
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
$branch_id = mysqli_real_escape_string($link,$_POST['branch_id']);
$company_id = mysqli_real_escape_string($link,$_POST['company_id']);
$branch_name = mysqli_real_escape_string($link,$_POST['branch_name']);
$branch_type = mysqli_real_escape_string($link,$_POST['branch_type']);
$branch_address = mysqli_real_escape_string($link,$_POST['branch_address']);
$branch_country = mysqli_real_escape_string($link,$_POST['branch_country']);
$branch_state = mysqli_real_escape_string($link,$_POST['branch_state']);
$branch_district = mysqli_real_escape_string($link,$_POST['branch_district']);
$branch_city = mysqli_real_escape_string($link,$_POST['branch_city']);
$branch_area = mysqli_real_escape_string($link,$_POST['branch_area']);
$branch_pincode = mysqli_real_escape_string($link,$_POST['branch_pincode']);
$reg_type = mysqli_real_escape_string($link,$_POST['reg_type']);
$reg_date = mysqli_real_escape_string($link,$_POST['reg_date']);
$reg_no = mysqli_real_escape_string($link,$_POST['reg_no']);
$branch_pan_no = mysqli_real_escape_string($link,$_POST['branch_pan_no']);
$gst_no = mysqli_real_escape_string($link,$_POST['gst_no']);
$branch_email_id = mysqli_real_escape_string($link,$_POST['branch_email_id']);
$phone_number = mysqli_real_escape_string($link,$_POST['phone_number']);
$account_name = mysqli_real_escape_string($link,$_POST['account_name']);
$account_bank = mysqli_real_escape_string($link,$_POST['account_bank']);
$account_branch = mysqli_real_escape_string($link,$_POST['account_branch']);
$account_ifsc = mysqli_real_escape_string($link,$_POST['account_ifsc']);
$account_number = mysqli_real_escape_string($link,$_POST['account_number']);
$account_type = mysqli_real_escape_string($link,$_POST['account_type']);
$account_swift = mysqli_real_escape_string($link,$_POST['account_swift']);
if(mysqli_query($link,"UPDATE `branch_tbl` SET `company_id`='$company_id', `branch_name` = '$branch_name', `branch_type` = '$branch_type', `branch_address` = '$branch_address', `branch_country` = '$branch_country', `branch_state` = '$branch_state', `branch_district` = '$branch_district', `branch_city` = '$branch_city', `branch_area` = '$branch_area', `branch_pincode` = '$branch_pincode', `reg_type` = '$reg_type', `reg_date` = '$reg_date', `reg_no` = '$reg_no', `branch_pan_no` = '$branch_pan_no', `gst_no` = '$gst_no', `branch_email_id` = '$branch_email_id', `phone_number` = '$phone_number', `account_name` = '$account_name', `account_bank` = '$account_bank', `account_branch` = '$account_branch', `account_ifsc` = '$account_ifsc', `account_number` = '$account_number', `account_type` = '$account_type', `account_swift` = '$account_swift', `date` = '$date', `ip_address` = '$ip_address', `browser` = '$browser', `created_by` = '$created_by', `approved_by` = '$approved_by' WHERE `branch_id`='$branch_id'")){
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
                        <div class="col-lg-6"><h3 class="box-heading"> Branch <small>Add / Update  Details</small></h3></h3></div>
                        <div class="col-lg-6">
                          <div class="breadcrumb">
                            <a href="index.php" class="breadcrumb_a">Home</a> 
                            <i class="fa fa-angle-double-right angle_double_right"></i>
                            <a href="branch_view.php" class="breadcrumb_a">Branch </a> 
                            <i class="fa fa-angle-double-right angle_double_right" aria-hidden="true"></i>
                            <a href="#" class="breadcrumb_a">Add / Update Branch </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="box-body">
                      <!-- <h5 class="second_heading">Add City</h5> -->
                      <form method="post" class="padding-10" enctype="multipart/form-data">
                        <?php
                         $branch_id = mysqli_real_escape_string($link,$_GET['branch_id']);
  $update = mysqli_real_escape_string($link,$_GET['update']);
  if($update == "yes"){
  $sel_row = mysqli_query($link,"select * from branch_tbl where `branch_id`='$branch_id'");
  $row = mysqli_fetch_object($sel_row);
  $upload_id = $row->branch_id;
  }
  else
  {
  $max_id = maxOfAll("id","branch_tbl");
  $max_id=$max_id+1;
  $upload_id="bra-".$max_id;
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
        <label class="margin-left-10" for="industry_name">Branch ID</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
          <input type="text" class="form-control" name="branch_id" id="branch_id" placeholder="Enter the Branch Id" value="<?php echo $upload_id; ?>" readonly="readonly"required="required">
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Branch Name</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
          <input type="text" class="form-control" name="branch_name" id="branch_name" placeholder="Enter the Branch Name" value="<?php echo $row->branch_name; ?>" required="required">
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
        <label class="margin-left-10" for="industry_name">Branch Type</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
          <select name="branch_type" id="branch_type" class="form-control"  required="required">
          <option value="company">Company</option>
          <option value="franchise">Franchise</option>
        </select>
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_id">Branch Address</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
        <textarea class="form-control" name="branch_address" id="branch_address" placeholder="Enter the Address" required="required">
        <?php echo $row->branch_address; ?></textarea>
        </div>
      </div>
    </div>
    
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Country</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
        <select name="branch_country" id="branch_country" class="form-control" required="required">
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

        <select name="branch_state" id="branch_state" class="form-control" required="required">
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
        <select name="branch_district" id="branch_district" class="form-control" required="required">
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
        <select name="branch_city" id="branch_city" class="form-control" required="required">
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
        <select name="branch_area" id="branch_area" class="form-control" required="required">
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
        <select name="branch_pincode" id="branch_pincode" class="form-control" required="required">
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
        <select name="reg_type" id="reg_type" class="form-control">
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
        <input type="text" class="form-control" name="reg_no" id="reg_no" placeholder="Enter the Reg No" value="<?php echo $row->reg_no; ?>">
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">PAN No</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
        <input type="text" class="form-control" name="branch_pan_no" id="branch_pan_no" placeholder="Enter the Pan Number" value="<?php echo $row->branch_pan_no; ?>">
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">GST No</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
        <input type="text" class="form-control" name="gst_no" id="gst_no" placeholder="Enter the GST No" value="<?php echo $row->gst_no; ?>" required="required">
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Email Id</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
        <input type="email" class="form-control" name="branch_email_id" id="branch_email_id" placeholder="Enter the Email Id" value="<?php echo $row->branch_email_id; ?>" required="required">
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Phone Number</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
        <input type="tel" class="form-control" name="phone_number" id="phone_number" placeholder="Enter the Phone Number" value="<?php echo $row->phone_number; ?>" required="required">
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Account Name</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
        <input type="text" class="form-control" name="account_name" id="account_name" placeholder="Enter the Account Name" value="<?php echo $row->account_name; ?>" required="required">
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Bank Name</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
        <input type="text" class="form-control" name="account_bank" id="account_bank" placeholder="Enter the Account Bank" value="<?php echo $row->account_bank; ?>" required="required">
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Bank Branch</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
        <input type="text" class="form-control" name="account_branch" id="account_branch" placeholder="Enter the Account Branch" value="<?php echo $row->account_branch; ?>" required="required">
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">IFSC Code</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
        <input type="text" class="form-control" name="account_ifsc" id="account_ifsc" placeholder="Enter the Account IFSC" value="<?php echo $row->account_ifsc; ?>" required="required">
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Account Number</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
        <input type="text" class="form-control" name="account_number" id="account_number" placeholder="Enter the Acc Number" value="<?php echo $row->account_number; ?>" required="required">
        </div>
      </div>
    </div>
    
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Account Type</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
        <input type="text" class="form-control" name="account_type" id="account_type" placeholder="Enter the Account Type" value="<?php echo $row->account_type; ?>" required="required">
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Swift Code</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
        <input type="text" class="form-control" name="account_swift" id="account_swift" placeholder="Enter the Account Swift" value="<?php echo $row->account_swift; ?>">
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