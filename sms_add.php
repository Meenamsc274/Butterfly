<?php 
include 'dbc.php'; 
page_protect();
$created_by = $_SESSION['userid'];
$approved_by = "";
?>
<?php
if($_POST['submit'] == "Submit"){
$id = mysqli_real_escape_string($link,$_POST['id']);
$sms_id = mysqli_real_escape_string($link,$_POST['sms_id']);
$mobile_number = mysqli_real_escape_string($link,$_POST['mobile_number']);
$sms_msg = mysqli_real_escape_string($link,$_POST['sms_msg']);
$page = mysqli_real_escape_string($link,$_POST['page']);
$status = mysqli_real_escape_string($link,$_POST['status']);
$sort_order = mysqli_real_escape_string($link,$_POST['sort_order']);
if(mysqli_query($link,"INSERT INTO `sms_tbl` (`id`, `sms_id`, `mobile_number`, `sms_msg`, `page`, `status`, `sort_order`, `ip_address`, `browser`, `date`, `created_by`, `approved_by`) VALUES ('$id', '$sms_id', '$mobile_number', '$sms_msg', '$page', '$status', '$sort_order', '$ip_address', '$browser', '$date', '$created_by', '$approved_by')")){
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
$sms_id = mysqli_real_escape_string($link,$_POST['sms_id']);
$mobile_number = mysqli_real_escape_string($link,$_POST['mobile_number']);
$sms_msg = mysqli_real_escape_string($link,$_POST['sms_msg']);
$page = mysqli_real_escape_string($link,$_POST['page']);
$status = mysqli_real_escape_string($link,$_POST['status']);
$sort_order = mysqli_real_escape_string($link,$_POST['sort_order']);
if(mysqli_query($link,"UPDATE `sms_tbl` SET `mobile_number` = '$mobile_number', `sms_msg` = '$sms_msg', `page` = '$page', `status` = '$status', `sort_order` = '$sort_order', `ip_address` = '$ip_address', `browser` = '$browser', `date` = '$date', `created_by` = '$created_by', `approved_by` = '$approved_by' WHERE `sms_id`='$sms_id'")){
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
                        <div class="col-lg-6"><h3 class="box-heading"> Sms <small>Add / Update  Details</small></h3></h3></div>
                        <div class="col-lg-6">
                          <div class="breadcrumb">
                            <a href="index.php" class="breadcrumb_a">Home</a> 
                            <i class="fa fa-angle-double-right angle_double_right"></i>
                            <a href="sms_view.php" class="breadcrumb_a">Sms </a> 
                            <i class="fa fa-angle-double-right angle_double_right" aria-hidden="true"></i>
                            <a href="#" class="breadcrumb_a">Add / Update Sms </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="box-body">
                      <!-- <h5 class="second_heading">Add City</h5> -->
                      <form method="post" class="padding-10" enctype="multipart/form-data">
                        <?php
$sms_id = mysqli_real_escape_string($link,$_GET['sms_id']);
  $update = mysqli_real_escape_string($link,$_GET['update']);
  if($update == "yes"){
  $sel_row = mysqli_query($link,"select * from sms_tbl where `sms_id`='$sms_id'");
  $row = mysqli_fetch_object($sel_row);
  
  $upload_id = $sms_id;
  }
  else
  {
  $max_id = maxOfAll("id","sms_tbl");
  $max_id=$max_id+1;
  $upload_id="sms-".$max_id;
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
        <label class="margin-left-10" for="industry_name">SMS Id</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
          <input type="text" class="form-control" name="sms_id" id="sms_id" placeholder="Enter the Auot Id" value="<?php echo $upload_id; ?>" readonly="readonly">
        </div>
      </div>
    </div>
     
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Mobile Number</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
          <input type="text" class="form-control" name="mobile_number" id="mobile_number" placeholder="Enter the Mobile No" value="<?php echo $row->mobile_number; ?>" min="10" max="15" required="required">
        </div>
      </div>
    </div>

    <div class="col-lg-12 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-2 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">SMS Message</label>
        </div>
        <div class="col-lg-10 col-md-8 col-sm-12 col-xs-12 no-pad">
          <input type="text" class="ckeditor form-control" name="sms_msg" id="sms_msg" placeholder="Enter the Message" value="<?php echo $row->sms_msg; ?>" required="required">
        </div>
      </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Page</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
          <input type="text" class="form-control" name="page" id="page" placeholder="Enter the Page" value="<?php echo $row->page; ?>" required="required">
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
          <input type="text" class="form-control" name="sort_order" id="sort_order" placeholder="Enter the Sort order" value="<?php echo $row->sort_order; ?>" required="required">
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
$("#company_id option[value='<?php echo $row->company_id; ?>']").attr("selected", "selected");
$("#branch_id option[value='<?php echo $row->branch_id; ?>']").attr("selected", "selected");
$("#section_type option[value='<?php echo $row->section_type; ?>']").attr("selected", "selected");
$("#floor_id option[value='<?php echo $row->floor_id; ?>']").attr("selected", "selected");
$("#layout_id option[value='<?php echo $row->layout_id; ?>']").attr("selected", "selected");
$("#category option[value='<?php echo $row->category; ?>']").attr("selected", "selected");
$("#sub_category option[value='<?php echo $row->sub_category; ?>']").attr("selected", "selected");
});
</script>
 
</html>