<?php 
include 'dbc.php'; 
page_protect();
$created_by = $_SESSION['userid'];
$approved_by = "";
?>
<?php
if($_POST['submit'] == "Submit"){
$id = mysqli_real_escape_string($link,$_POST['id']);
$brand_id = mysqli_real_escape_string($link,$_POST['brand_id']);
$brand_name = mysqli_real_escape_string($link,$_POST['brand_name']);
$brand_desc = mysqli_real_escape_string($link,$_POST['brand_desc']);
$brand_logo = mysqli_real_escape_string($link,$_POST['brand_logo']);
$status = mysqli_real_escape_string($link,$_POST['status']);
$sort_order = mysqli_real_escape_string($link,$_POST['sort_order']);
if(mysqli_query($link,"INSERT INTO `brand_tbl` (`id`, `brand_id`, `brand_name`, `brand_desc`, `brand_logo`, `ip_address`, `browser`, `date`, `created_by`, `approved_by`, `status`, `sort_order`) VALUES ('$id', '$brand_id', '$brand_name', '$brand_desc', '$brand_logo', '$ip_address', '$browser', '$date', '$created_by', '$approved_by', '$status', '$sort_order')")){

  $fname = $_FILES['brand_logo']['name'];
  if($fname != ""){
  $upload_dir = "uploads/brand_logo/";
    $ftype = $_FILES['brand_logo']['type'];
    $filename_part = explode(".", $fname);
  $upload_name = $filename_part[0];
  $ext = $filename_part[1];
  $max_id = maxOfAll("id","upload_tbl");
  $max_id=$max_id+1;
  $upload_id="U-".$max_id;
  $new_filename = $upload_dir.$upload_name."_".$upload_id.".".$ext;
  $page="";
  $title="";
    $movetofolder = (@copy($_FILES['brand_logo']['tmp_name'],$new_filename));
  //Insert or Update statement to be included here
  mysqli_query($link,"update `brand_tbl` set brand_logo='$new_filename' where `brand_id`='$brand_id'");
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
$brand_id = mysqli_real_escape_string($link,$_POST['brand_id']);
$brand_name = mysqli_real_escape_string($link,$_POST['brand_name']);
$brand_desc = mysqli_real_escape_string($link,$_POST['brand_desc']);
$brand_logo = mysqli_real_escape_string($link,$_POST['brand_logo']);
$status = mysqli_real_escape_string($link,$_POST['status']);
$sort_order = mysqli_real_escape_string($link,$_POST['sort_order']);
if(mysqli_query($link,"UPDATE `brand_tbl` SET `id` = '$id', `brand_id` = '$brand_id', `brand_name` = '$brand_name', `brand_desc` = '$brand_desc', `brand_logo` = '$brand_logo', `ip_address` = '$ip_address', `browser` = '$browser', `date` = '$date', `created_by` = '$created_by', `approved_by` = '$approved_by', `status` = '$status', `sort_order` = '$sort_order' WHERE `brand_id`='$brand_id'")){
  $fname = $_FILES['brand_logo']['name'];
  if($fname != ""){
  $upload_dir = "uploads/brand_logo/";
    $ftype = $_FILES['brand_logo']['type'];
    $filename_part = explode(".", $fname);
  $upload_name = $filename_part[0];
  $ext = $filename_part[1];
  $max_id = maxOfAll("id","upload_tbl");
  $max_id=$max_id+1;
  $upload_id="U-".$max_id;
  $new_filename = $upload_dir.$upload_name."_".$upload_id.".".$ext;
  $page="";
  $title="";
    $movetofolder = (@copy($_FILES['brand_logo']['tmp_name'],$new_filename));
  //Insert or Update statement to be included here
  mysqli_query($link,"update `brand_tbl` set brand_logo='$new_filename' where `brand_id`='$brand_id'");
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
                        <div class="col-lg-6"><h3 class="box-heading"> Brand <small>Add / Update  Details</small></h3></h3></div>
                        <div class="col-lg-6">
                          <div class="breadcrumb">
                            <a href="index.php" class="breadcrumb_a">Home</a> 
                            <i class="fa fa-angle-double-right angle_double_right"></i>
                            <a href="brand_view.php" class="breadcrumb_a">Brand </a> 
                            <i class="fa fa-angle-double-right angle_double_right" aria-hidden="true"></i>
                            <a href="#" class="breadcrumb_a">Add / Update Brand </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="box-body">
                      <!-- <h5 class="second_heading">Add City</h5> -->
                      <form method="post" class="padding-10" enctype="multipart/form-data">
                        <?php
  $brand_id = mysqli_real_escape_string($link,$_GET['brand_id']);
  $update = mysqli_real_escape_string($link,$_GET['update']);
  if($update == "yes"){
  $sel_row = mysqli_query($link,"select * from brand_tbl where `brand_id`='$brand_id'");
  $row = mysqli_fetch_object($sel_row);
  $upload_id = $row->brand_id;
  }
  else
  {
  $max_id = maxOfAll("id","brand_tbl");
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
    <input type="hidden" class="form-control" name="id" id="id" placeholder="Enter the Id" value="<?php echo $row->id; ?>" readonly="readonly" >
                          
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Brand Id</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
          <input type="text" class="form-control" name="brand_id" id="brand_id" placeholder="Enter the Brand Id" value="<?php echo $upload_id; ?>" readonly="readonly">
        </div>
      </div>
    </div>
    
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Brand Name</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
          <input type="text" class="form-control" name="brand_name" id="brand_name" placeholder="Enter the Brand Name" value="<?php echo $row->brand_name; ?>" required="required">
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Description </label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
          <textarea class="form-control" name="brand_desc" id="brand_desc" placeholder="Enter the Description" required="required">
        <?php echo $row->brand_desc; ?></textarea>
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_id">Brand Logo</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
        <input class="form-control" name="brand_logo" id="brand_logo" type="file"/>
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