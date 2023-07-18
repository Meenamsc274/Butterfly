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
$branch_id = mysqli_real_escape_string($link,$_POST['branch_id']);
$section_id = mysqli_real_escape_string($link,$_POST['section_id']);
$section_name = mysqli_real_escape_string($link,$_POST['section_name']);
$section_type = mysqli_real_escape_string($link,$_POST['section_type']);
$section_desc = mysqli_real_escape_string($link,$_POST['section_desc']);
$floor_id = mysqli_real_escape_string($link,$_POST['floor_id']);
$layout_id = mysqli_real_escape_string($link,$_POST['layout_id']);
$category = mysqli_real_escape_string($link,$_POST['category']);
$sub_category = mysqli_real_escape_string($link,$_POST['sub_category']);
$printer_ip = mysqli_real_escape_string($link,$_POST['printer_ip']);
$sort_order = mysqli_real_escape_string($link,$_POST['sort_order']);
$status = mysqli_real_escape_string($link,$_POST['status']);
if(mysqli_query($link,"INSERT INTO `section_tbl` (`id`, `company_id`, `branch_id`, `section_id`, `section_name`, `section_type`, `section_desc`, `floor_id`, `layout_id`, `category`, `sub_category`, `printer_ip`, `sort_order`, `status`, `ip_address`, `browser`, `date`, `created_by`, `approved_by`) VALUES ('$id', '$company_id', '$branch_id', '$section_id', '$section_name', '$section_type', '$section_desc', '$floor_id', '$layout_id', '$category', '$sub_category', '$printer_ip', '$sort_order', '$status', '$ip_address', '$browser', '$date', '$created_by', '$approved_by')")){
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
$branch_id = mysqli_real_escape_string($link,$_POST['branch_id']);
$section_id = mysqli_real_escape_string($link,$_POST['section_id']);
$section_name = mysqli_real_escape_string($link,$_POST['section_name']);
$section_type = mysqli_real_escape_string($link,$_POST['section_type']);
$section_desc = mysqli_real_escape_string($link,$_POST['section_desc']);
$floor_id = mysqli_real_escape_string($link,$_POST['floor_id']);
$layout_id = mysqli_real_escape_string($link,$_POST['layout_id']);
$category = mysqli_real_escape_string($link,$_POST['category']);
$sub_category = mysqli_real_escape_string($link,$_POST['sub_category']);
$printer_ip = mysqli_real_escape_string($link,$_POST['printer_ip']);
$sort_order = mysqli_real_escape_string($link,$_POST['sort_order']);
$status = mysqli_real_escape_string($link,$_POST['status']);
if(mysqli_query($link,"UPDATE `section_tbl` SET `company_id` = '$company_id', `branch_id` = '$branch_id', `section_id` = '$section_id', `section_name` = '$section_name', `section_type` = '$section_type', `section_desc` = '$section_desc', `floor_id` = '$floor_id', `layout_id` = '$layout_id', `category` = '$category', `sub_category` = '$sub_category', `printer_ip` = '$printer_ip', `sort_order` = '$sort_order', `status` = '$status', `ip_address` = '$ip_address', `browser` = '$browser', `date` = '$date', `created_by` = '$created_by', `approved_by` = '$approved_by' WHERE `section_id`='$section_id'")){$msg[] = "Successfully Saved!";
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
                        <div class="col-lg-6"><h3 class="box-heading"> Section <small>Add / Update  Details</small></h3></h3></div>
                        <div class="col-lg-6">
                          <div class="breadcrumb">
                            <a href="index.php" class="breadcrumb_a">Home</a> 
                            <i class="fa fa-angle-double-right angle_double_right"></i>
                            <a href="section_view.php" class="breadcrumb_a">Section </a> 
                            <i class="fa fa-angle-double-right angle_double_right" aria-hidden="true"></i>
                            <a href="#" class="breadcrumb_a">Add / Update Section </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="box-body">
                      <!-- <h5 class="second_heading">Add City</h5> -->
                      <form method="post" class="padding-10" enctype="multipart/form-data">
                        <?php
$section_id = mysqli_real_escape_string($link,$_GET['section_id']);
  $update = mysqli_real_escape_string($link,$_GET['update']);
  if($update == "yes"){
  $sel_row = mysqli_query($link,"select * from section_tbl where `section_id`='$section_id'");
  $row = mysqli_fetch_object($sel_row);
  
  $upload_id = $section_id;
  }
  else
  {
  $max_id = maxOfAll("id","section_tbl");
  $max_id=$max_id+1;
  $upload_id="sec-".$max_id;
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
        <label class="margin-left-10" for="industry_name">Company Id</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
          <select name="company_id" id="company_id" class="form-control"    min="0" max="0" >
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
        <label class="margin-left-10" for="industry_name">Branch Id</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
          <select name="branch_id" id="branch_id" class="form-control"    min="0" max="0" required="required">
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
        <label class="margin-left-10" for="industry_name">Section Id</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
          <input type="text" class="form-control" name="section_id" id="section_id" placeholder="Ente the Section Id" value="<?php echo $upload_id; ?>" readonly="readonly"  min="0" max="0" >
        </div>
      </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Section Name</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
          <input type="text" class="form-control" name="section_name" id="section_name" placeholder="Enter the Section Name" value="<?php echo $row->section_name; ?>"  min="0" max="0" required="required">
        </div>
      </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Section Type</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
          <select name="section_type" id="section_type" class="form-control"    min="0" max="0" required="required">
            <option value="kitchen">Kitchen</option>
            <option value="drinks">Drinks</option>
            <option value="bar">Bar</option>
            <option value="chat">Chat</option>
            <option value="others">Others</option>
          </select>
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Section Description</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
          <textarea class="form-control" name="section_desc" id="section_desc" placeholder="Enter the Section Description"   min="0" max="0" required="required">
        <?php echo $row->section_desc; ?></textarea>
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Floor Id</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
          <select name="floor_id" id="floor_id" class="form-control" min="0" max="0" required="required">
        <?php
        $sel_rw = mysqli_query($link,"select floor_name,floor_id from floor_tbl");
        while($row1 = mysqli_fetch_object($sel_rw)){
        ?>

        <option value="<?php echo $row1->floor_id; ?>"><?php echo $row1->floor_name; ?></option>

        <?php } ?>
        </select>
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Layout Id</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
          <select name="layout_id" id="layout_id" class="form-control"    min="0" max="0" required="required">
        <?php
        $sel_rw = mysqli_query($link,"select layout_name,layout_id from layout_tbl");
        while($row1 = mysqli_fetch_object($sel_rw)){
        ?>

        <option value="<?php echo $row1->layout_id; ?>"><?php echo $row1->layout_name; ?></option>

        <?php } ?>
        </select>
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Category</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
          <select name="category" id="category" class="form-control"    min="0" max="0" required="required">
        <?php
        $sel_rw = mysqli_query($link,"select category_name from category_tbl");
        while($row1 = mysqli_fetch_object($sel_rw)){
        ?>

        <option value="<?php echo $row1->category_name; ?>"><?php echo $row1->category_name; ?></option>

        <?php } ?>
        </select>
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Sub Category</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
          <select name="sub_category" id="sub_category" class="form-control"    min="0" max="0" required="required">
<?php
        $sel_rw = mysqli_query($link,"select subcategory_name from subcategory_tbl");
        while($row1 = mysqli_fetch_object($sel_rw)){
        ?>

        <option value="<?php echo $row1->subcategory_name; ?>"><?php echo $row1->subcategory_name; ?></option>

        <?php } ?>
        </select>
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Printer Ip</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
          <input type="text" class="form-control" name="printer_ip" id="printer_ip" placeholder="Enter the Printer Ip" value="<?php echo $row->printer_ip; ?>" required="required">
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