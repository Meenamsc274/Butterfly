<?php 
include 'dbc.php'; 
page_protect();
$created_by = $_SESSION['userid'];
$approved_by = "";
?>
<?php
if($_POST['submit'] == "Submit"){

$id = mysqli_real_escape_string($link,$_POST['id']);
$status_id = mysqli_real_escape_string($link,$_POST['status_id']);
$status_name = mysqli_real_escape_string($link,$_POST['status_name']);
$description = mysqli_real_escape_string($link,$_POST['description']);
$status = mysqli_real_escape_string($link,$_POST['status']);
$sort_order = mysqli_real_escape_string($link,$_POST['sort_order']);

if(mysqli_query($link,"INSERT INTO `status_tbl` (`id`, `status_id`, `status_name`, `description`, `status`, `sort_order`, `ip_address`, `browser`, `created_by`, `approved_by`) VALUES ('$id', '$status_id', '$status_name', '$description', '$status', '$sort_order', '$ip_address', '$browser', '$created_by', '$approved_by')")){
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
$status_id = mysqli_real_escape_string($link,$_POST['status_id']);
$status_name = mysqli_real_escape_string($link,$_POST['status_name']);
$description = mysqli_real_escape_string($link,$_POST['description']);
$status = mysqli_real_escape_string($link,$_POST['status']);
$sort_order = mysqli_real_escape_string($link,$_POST['sort_order']);
if(mysqli_query($link,"UPDATE `status_tbl` SET `status_name` = '$status_name', `description` = '$description', `status` = '$status', `sort_order` = '$sort_order', `ip_address` = '$ip_address', `browser` = '$browser', `created_by` = '$created_by', `approved_by` = '$approved_by' WHERE `status_id`='$status_id'")){$msg[] = "Successfully Saved!";
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
                        <div class="col-lg-6"><h3 class="box-heading"> Status <small>Add / Update  Details</small></h3></h3></div>
                        <div class="col-lg-6">
                          <div class="breadcrumb">
                            <a href="index.php" class="breadcrumb_a">Home</a> 
                            <i class="fa fa-angle-double-right angle_double_right"></i>
                            <a href="status_view.php" class="breadcrumb_a">Status </a> 
                            <i class="fa fa-angle-double-right angle_double_right" aria-hidden="true"></i>
                            <a href="#" class="breadcrumb_a">Add / Update Status </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="box-body">
                      <!-- <h5 class="second_heading">Add City</h5> -->
                      <form method="post" class="padding-10" enctype="multipart/form-data">
                        <?php
$status_id = mysqli_real_escape_string($link,$_GET['status_id']);
  $update = mysqli_real_escape_string($link,$_GET['update']);
  if($update == "yes"){
  $sel_row = mysqli_query($link,"select * from status_tbl where `status_id`='$status_id'");
  $row = mysqli_fetch_object($sel_row);
  
  $upload_id = $status_id;
  }
  else
  {
  $max_id = maxOfAll("id","status_tbl");
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
        <label class="margin-left-10" for="industry_name">Status Id</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
          <input type="text" class="form-control" name="status_id" id="status_id" placeholder="Enter the Status Id" value="<?php echo $upload_id; ?>" readonly="readonly">
        </div>
      </div>
    </div>
     
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Status Name</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
          <input type="text" class="form-control" name="status_name" id="status_name" placeholder="Enter the Status Name" value="<?php echo $row->status_name; ?>" required="required">
        </div>
      </div>
    </div>

    <div class="col-lg-12 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-2 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Description</label>
        </div>
        <div class="col-lg-10 col-md-8 col-sm-12 col-xs-12 no-pad">
          <textarea class="form-control" name="description" id="description" placeholder="Enter the Status Description" required="required">
        <?php echo $row->description; ?></textarea>
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
$("#userid option[value='<?php echo $row->userid; ?>']").attr("selected", "selected");

});
</script>
 
</html>