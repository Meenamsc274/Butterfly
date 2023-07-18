<?php 
include 'dbc.php'; 
page_protect();
$created_by = $_SESSION['userid'];
$approved_by = "";
?>
<?php
if($_POST['submit'] == "Submit"){
$id = mysqli_real_escape_string($link,$_POST['id']);
$category_id = mysqli_real_escape_string($link,$_POST['category_id']);
$category_name = mysqli_real_escape_string($link,$_POST['category_name']);
$category_desc = mysqli_real_escape_string($link,$_POST['category_desc']);
$category_img = mysqli_real_escape_string($link,$_POST['category_img']);
$sort_order = mysqli_real_escape_string($link,$_POST['sort_order']);
$status = mysqli_real_escape_string($link,$_POST['status']);
if(mysqli_query($link,"INSERT INTO `category_tbl` (`id`, `category_id`, `category_name`, `category_desc`, `category_img`, `sort_order`, `status`, `date`, `ip_address`, `browser`, `created_by`, `approved_by`) VALUES ('$id', '$category_id', '$category_name', '$category_desc', '$category_img', '$sort_order', '$status', '$date', '$ip_address', '$browser', '$created_by', '$approved_by')")){

  $fname = $_FILES['category_img']['name'];
  if($fname != ""){
  $upload_dir = "uploads/category_img/";
    $ftype = $_FILES['category_img']['type'];
    $filename_part = explode(".", $fname);
  $upload_name = $filename_part[0];
  $ext = $filename_part[1];
  $max_id = maxOfAll("id","upload_tbl");
  $max_id=$max_id+1;
  $upload_id="U-".$max_id;
  $new_filename = $upload_dir.$upload_name."_".$upload_id.".".$ext;
  $page="";
  $title="";
    $movetofolder = (@copy($_FILES['category_img']['tmp_name'],$new_filename));
  //Insert or Update statement to be included here
  mysqli_query($link,"update `category_tbl` set category_img='$new_filename' where `category_id`='$category_id'");
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
$category_id = mysqli_real_escape_string($link,$_POST['category_id']);
$category_name = mysqli_real_escape_string($link,$_POST['category_name']);
$category_desc = mysqli_real_escape_string($link,$_POST['category_desc']);
$category_img = mysqli_real_escape_string($link,$_POST['category_img']);
$sort_order = mysqli_real_escape_string($link,$_POST['sort_order']);
$status = mysqli_real_escape_string($link,$_POST['status']);
if(mysqli_query($link,"UPDATE `category_tbl` SET `id` = '$id', `category_id` = '$category_id', `category_name` = '$category_name', `category_desc` = '$category_desc', `category_img` = '$category_img', `sort_order` = '$sort_order', `status` = '$status', `date` = '$date', `ip_address` = '$ip_address', `browser` = '$browser', `created_by` = '$created_by', `approved_by` = '$approved_by' WHERE `category_id`='$category_id'")){
  $fname = $_FILES['category_img']['name'];
  if($fname != ""){
  $upload_dir = "uploads/category_img/";
    $ftype = $_FILES['category_img']['type'];
    $filename_part = explode(".", $fname);
  $upload_name = $filename_part[0];
  $ext = $filename_part[1];
  $max_id = maxOfAll("id","upload_tbl");
  $max_id=$max_id+1;
  $upload_id="U-".$max_id;
  $new_filename = $upload_dir.$upload_name."_".$upload_id.".".$ext;
  $page="";
  $title="";
    $movetofolder = (@copy($_FILES['category_img']['tmp_name'],$new_filename));
  //Insert or Update statement to be included here
  mysqli_query($link,"update `category_tbl` set category_img='$new_filename' where `category_id`='$category_id'");
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
                        <div class="col-lg-6"><h3 class="box-heading"> Category <small>Add / Update  Details</small></h3></h3></div>
                        <div class="col-lg-6">
                          <div class="breadcrumb">
                            <a href="index.php" class="breadcrumb_a">Home</a> 
                            <i class="fa fa-angle-double-right angle_double_right"></i>
                            <a href="category_view.php" class="breadcrumb_a">Category </a> 
                            <i class="fa fa-angle-double-right angle_double_right" aria-hidden="true"></i>
                            <a href="#" class="breadcrumb_a">Add / Update Category </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="box-body">
                      <!-- <h5 class="second_heading">Add City</h5> -->
                      <form method="post" class="padding-10" enctype="multipart/form-data">
                        <?php
  $category_id = mysqli_real_escape_string($link,$_GET['category_id']);
  $update = mysqli_real_escape_string($link,$_GET['update']);
  if($update == "yes"){
  $sel_row = mysqli_query($link,"select * from category_tbl where `category_id`='$category_id'");
  $row = mysql_fetch_object($sel_row);
  $upload_id = $row->category_id;
  }
  else
  {
  $max_id = maxOfAll("id","category_tbl");
  $max_id=$max_id+1;
  $upload_id="cat-".$max_id;
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
        <label class="margin-left-10" for="industry_name">Category ID</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
          <input type="text" class="form-control" name="category_id" id="category_id" placeholder="Enter the Category Id" value="<?php echo $upload_id; ?>" >
        </div>
      </div>
    </div>
    
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Category Name</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
          <input type="text" class="form-control" name="category_name" id="category_name" placeholder="Enter the Category Name" value="<?php echo $row->category_name; ?>" required="required">
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Category Description </label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
          <input type="text" class="form-control" name="category_desc" id="category_desc" placeholder="Enter the Category Description" value="<?php echo $row->category_desc; ?>" required="required">
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_id">Category Image</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
        <input class="form-control" name="category_img" id="category_img" type="file" />
        </div>
      </div>
    </div>
    
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Sort Order</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
        <input type="text" class="form-control" name="sort_order" id="sort_order" placeholder="Enter the Sort Order" value="<?php echo $row->sort_order; ?>" >
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Status</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
        <select name="status" id="status" class="form-control">
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
});
</script>

 
</html>