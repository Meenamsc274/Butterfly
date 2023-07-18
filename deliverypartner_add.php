<?php 
include 'dbc.php'; 
page_protect();
$created_by = $_SESSION['userid'];
$approved_by = "";
?>
<?php
if($_POST['submit'] == "Submit"){
$id = mysqli_real_escape_string($link,$_POST['id']);
$auto_id = mysqli_real_escape_string($link,$_POST['auto_id']);
$deliverypartner_name = mysqli_real_escape_string($link,$_POST['deliverypartner_name']);
$address = mysqli_real_escape_string($link,$_POST['address']);
$country = mysqli_real_escape_string($link,$_POST['country']);
$state = mysqli_real_escape_string($link,$_POST['state']);
$district = mysqli_real_escape_string($link,$_POST['district']);
$city = mysqli_real_escape_string($link,$_POST['city']);
$area = mysqli_real_escape_string($link,$_POST['area']);
$pincode = mysqli_real_escape_string($link,$_POST['pincode']);
$email_id = mysqli_real_escape_string($link,$_POST['email_id']);
$alter_email_id = mysqli_real_escape_string($link,$_POST['alter_email_id']);
$mobile_number = mysqli_real_escape_string($link,$_POST['mobile_number']);
$status = mysqli_real_escape_string($link,$_POST['status']);
$sort_order = mysqli_real_escape_string($link,$_POST['sort_order']);
if(mysqli_query($link,"INSERT INTO `deliverypartner_tbl` (`id`, `auto_id`, `deliverypartner_name`, `address`, `country`, `state`, `district`, `city`, `area`, `pincode`, `email_id`, `alter_email_id`, `mobile_number`, `status`, `sort_order`, `ip_address`, `browser`, `created_by`, `approved_by`) VALUES ('$id', '$auto_id', '$deliverypartner_name', '$address', '$country', '$state', '$district', '$city', '$area', '$pincode', '$email_id', '$alter_email_id', '$mobile_number', '$status', '$sort_order', '$ip_address', '$browser', '$created_by', '$approved_by')")){
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
$auto_id = mysqli_real_escape_string($link,$_POST['auto_id']);
$deliverypartner_name = mysqli_real_escape_string($link,$_POST['deliverypartner_name']);
$address = mysqli_real_escape_string($link,$_POST['address']);
$country = mysqli_real_escape_string($link,$_POST['country']);
$state = mysqli_real_escape_string($link,$_POST['state']);
$district = mysqli_real_escape_string($link,$_POST['district']);
$city = mysqli_real_escape_string($link,$_POST['city']);
$area = mysqli_real_escape_string($link,$_POST['area']);
$pincode = mysqli_real_escape_string($link,$_POST['pincode']);
$email_id = mysqli_real_escape_string($link,$_POST['email_id']);
$alter_email_id = mysqli_real_escape_string($link,$_POST['alter_email_id']);
$mobile_number = mysqli_real_escape_string($link,$_POST['mobile_number']);
$status = mysqli_real_escape_string($link,$_POST['status']);
$sort_order = mysqli_real_escape_string($link,$_POST['sort_order']);
if(mysqli_query($link,"UPDATE `deliverypartner_tbl` SET `deliverypartner_name` = '$deliverypartner_name', `address` = '$address', `country` = '$country', `state` = '$state', `district` = '$district', `city` = '$city', `area` = '$area', `pincode` = '$pincode', `email_id` = '$email_id', `alter_email_id` = '$alter_email_id', `mobile_number` = '$mobile_number', `status` = '$status', `sort_order` = '$sort_order', `ip_address` = '$ip_address', `browser` = '$browser', `created_by` = '$created_by', `approved_by` = '$approved_by' WHERE `auto_id`='$auto_id'")){
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
                        <div class="col-lg-6"><h3 class="box-heading"> Deliverypartner <small>Add / Update  Details</small></h3></h3></div>
                        <div class="col-lg-6">
                          <div class="breadcrumb">
                            <a href="index.php" class="breadcrumb_a">Home</a> 
                            <i class="fa fa-angle-double-right angle_double_right"></i>
                            <a href="deliverypartner_view.php" class="breadcrumb_a">Deliverypartner </a> 
                            <i class="fa fa-angle-double-right angle_double_right" aria-hidden="true"></i>
                            <a href="#" class="breadcrumb_a">Add / Update Deliverypartner </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="box-body">
                      <!-- <h5 class="second_heading">Add City</h5> -->
                      <form method="post" class="padding-10" enctype="multipart/form-data">
                        <?php
 $auto_id = mysqli_real_escape_string($link,$_GET['auto_id']);
  $update = mysqli_real_escape_string($link,$_GET['update']);
  if($update == "yes"){
  $sel_row = mysqli_query($link,"select * from deliverypartner_tbl where `auto_id`='$auto_id'");
  $row = mysqli_fetch_object($sel_row);
  $upload_id = $row->auto_id;
  }
  else
  {
  $max_id = maxOfAll("id","deliverypartner_tbl");
  $max_id=$max_id+1;
  $upload_id="del-".$max_id;
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
        <label class="margin-left-10" for="industry_name">Auto Id</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
          <input type="text" class="form-control" name="auto_id" id="auto_id" placeholder="Enter the Autoid" value="<?php echo $upload_id; ?>" readonly="readonly">
        </div>
      </div>
    </div>
    
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Delivery Partner Name</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
          <input type="text" class="form-control" name="deliverypartner_name" id="deliverypartner_name" placeholder="Enter the Delivery Partner Name" value="<?php echo $row->deliverypartner_name; ?>" required="required">
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Address </label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
          <textarea class="form-control" name="address" id="address" placeholder="Enter the Address" required="required">
        <?php echo $row->address; ?></textarea>
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_id">Country</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
        <select name="country" id="country" class="form-control" required="required">
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
        <label class="margin-left-10" for="industry_id">State</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
        <select name="state" id="state" class="form-control" required="required">
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
        <label class="margin-left-10" for="industry_id">District</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
        <select name="district" id="district" class="form-control" required="required">
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
        <label class="margin-left-10" for="industry_id">City</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
        <select name="city" id="city" class="form-control" required="required">
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
        <label class="margin-left-10" for="industry_id">Area</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
        <select name="area" id="area" class="form-control" required="required">
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
        <label class="margin-left-10" for="industry_id">Pincode</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
        <select name="pincode" id="pincode" class="form-control" required="required">
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
        <label class="margin-left-10" for="industry_id">Email Id</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
        <input type="text" class="form-control" name="email_id" id="email_id" placeholder="Enter the Email Id" value="<?php echo $row->email_id; ?>" required="required">
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_id">Alternate Email Id</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
        <input type="text" class="form-control" name="alter_email_id" id="alter_email_id" placeholder="Enter the Alternative Email Id" value="<?php echo $row->alter_email_id; ?>" required="required">
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_id">Mobile Number</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
        <input type="text" class="form-control" name="mobile_number" id="mobile_number" placeholder="Enter the Mobile Number" value="<?php echo $row->mobile_number; ?>"   min="10" max="25" required="required">
        </div>
      </div>
    </div>


    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_id">Status </label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
          <select name="status" id="status" class="form-control" required="required">
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
 
</html>