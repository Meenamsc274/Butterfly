<?php 
include 'dbc.php'; 
page_protect();
$created_by = $_SESSION['userid'];
$approved_by = "";
?>
<?php
if($_POST['submit'] == "Submit"){

$id = mysqli_real_escape_string($link,$_POST['id']);
$accountcategory_id = mysqli_real_escape_string($link,$_POST['accountcategory_id']);
$accountcategory_name = mysqli_real_escape_string($link,$_POST['accountcategory_name']);
$accountcategory_date = mysqli_real_escape_string($link,$_POST['accountcategory_date']);
$accountcategory_desc = mysqli_real_escape_string($link,$_POST['accountcategory_desc']);
$accountcategory_type = mysqli_real_escape_string($link,$_POST['accountcategory_type']);
$status = mysqli_real_escape_string($link,$_POST['status']);



if(mysqli_query($link,"INSERT INTO `accountcategory_tbl` ( `accountcategory_id`, `accountcategory_name`, `accountcategory_date`, `accountcategory_desc`, `accountcategory_type`, `date`, `created_by`, `approved_by`, `status`, `sort_order`) VALUES ( '$accountcategory_id', '$accountcategory_name', '$accountcategory_date', '$accountcategory_desc', '$accountcategory_type', '$date', '$created_by', '$approved_by', '$status', '$sort_order')")){

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
$accountcategory_id = mysqli_real_escape_string($link,$_POST['accountcategory_id']);
$accountcategory_name = mysqli_real_escape_string($link,$_POST['accountcategory_name']);
$accountcategory_date = mysqli_real_escape_string($link,$_POST['accountcategory_date']);
$accountcategory_desc = mysqli_real_escape_string($link,$_POST['accountcategory_desc']);
$accountcategory_type = mysqli_real_escape_string($link,$_POST['accountcategory_type']);
$status = mysqli_real_escape_string($link,$_POST['status']);

if(mysqli_query($link,"UPDATE `accountcategory_tbl` SET `accountcategory_name` = '$accountcategory_name', `accountcategory_date` = '$accountcategory_date', `accountcategory_desc` = '$accountcategory_desc', `accountcategory_type` = '$accountcategory_type', `date` = '$date', `created_by` = '$created_by', `approved_by` = '$approved_by', `status` = '$status', `sort_order` = '$sort_order' WHERE `accountcategory_id`='$accountcategory_id'")){ $msg[] = "Successfully Saved!";
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
                        <div class="col-lg-6"><h3 class="box-heading"> Account category <small>Add / Update  Details</small></h3></h3></div>
                        <div class="col-lg-6">
                          <div class="breadcrumb">
                            <a href="index.php" class="breadcrumb_a">Home</a> 
                            <i class="fa fa-angle-double-right angle_double_right"></i>
                            <a href="accountcategory_view.php" class="breadcrumb_a">Account category </a> 
                            <i class="fa fa-angle-double-right angle_double_right" aria-hidden="true"></i>
                            <a href="#" class="breadcrumb_a">Add / Update Account category </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="box-body">
                      <!-- <h5 class="second_heading">Add City</h5> -->
                      <form method="post" class="padding-10" enctype="multipart/form-data">
                        <?php
$accountcategory_id = mysqli_real_escape_string($link,$_GET['accountcategory_id']);
  $update = mysqli_real_escape_string($link,$_GET['update']);
  if($update == "yes"){
  $sel_row = mysqli_query($link,"select * from accountcategory_tbl where `accountcategory_id`='$accountcategory_id'");
  $row = mysqli_fetch_object($sel_row);
  
  $upload_id = $accountcategory_id;
  }
  else
  {
  $max_id = maxOfAll("id","accountcategory_tbl");
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
    <input type="hidden" class="form-control" name="id" id="id" placeholder="Enter the Id" value="<?php echo $row->id; ?>" readonly="readonly" disabled="disabled" min="0" max="0" >
                          
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Account Category Id</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
          <input type="text" class="form-control" name="accountcategory_id" id="accountcategory_id" placeholder="Enter the Account Category Id" value="<?php echo $upload_id; ?>" readonly="readonly">
        </div>
      </div>
    </div>
     
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Account Category Name</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
          <input type="text" class="form-control" name="accountcategory_name" id="accountcategory_name" placeholder="Enter the Account Category Name" value="<?php echo $row->accountcategory_name; ?>" required="required">
        </div>
      </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Account Category Date</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
          <input type="date" class="form-control" name="accountcategory_date" id="accountcategory_date" placeholder="Enter the Account Category Date" value="<?php echo $row->accountcategory_date; ?>" required="required">
        </div>
      </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Account Category Description</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
          <textarea class="form-control" name="accountcategory_desc" id="accountcategory_desc" placeholder="Enter the Account Category Description" required="required">
        <?php echo $row->accountcategory_desc; ?></textarea>
        </div>
      </div>
    </div>
     <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Account Category Type</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
          <input type="text" class="form-control" name="accountcategory_type" id="accountcategory_type" placeholder="Enter the Account Category Type" value="<?php echo $row->accountcategory_type; ?>" required="required">
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
$("#userid option[value='<?php echo $row->userid; ?>']").attr("selected", "selected");

});
</script>
 
</html>