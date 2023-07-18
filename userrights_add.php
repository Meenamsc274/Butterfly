<?php 
include 'dbc.php'; 
page_protect();
$created_by = $_SESSION['userid'];
$approved_by = "";
?><?php
if($_POST['submit'] == "Submit"){
$id = mysqli_real_escape_string($link,$_POST['id']);
$userrights_id = mysqli_real_escape_string($link,$_POST['userrights_id']);
$desi_id = mysqli_real_escape_string($link,$_POST['desi_id']);
$dept_id = mysqli_real_escape_string($link,$_POST['dept_id']);
$emp_id = mysqli_real_escape_string($link,$_POST['emp_id']);
$parent = mysqli_real_escape_string($link,$_POST['parent']);
$submenu = mysqli_real_escape_string($link,$_POST['submenu']);
$childmenu = mysqli_real_escape_string($link,$_POST['childmenu']);
$read = mysqli_real_escape_string($link,$_POST['read']);
$write = mysqli_real_escape_string($link,$_POST['write']);
$menu_id = mysqli_real_escape_string($link,$_POST['menu_id']);
$status = mysqli_real_escape_string($link,$_POST['status']);
$sort_order = mysqli_real_escape_string($link,$_POST['sort_order']);
if(mysqli_query($link,"INSERT INTO `userrights_tbl` (`id`, `userrights_id`, `desi_id`, `dept_id`, `emp_id`, `parent`, `submenu`, `childmenu`, `read`, `write`, `menu_id`, `date`, `created_by`, `approved_by`, `status`, `sort_order`) VALUES ('$id', '$userrights_id', '$desi_id', '$dept_id', '$emp_id', '$parent', '$submenu', '$childmenu', '$read', '$write', '$menu_id', '$date', '$created_by', '$approved_by', '$status', '$sort_order')")){
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
$userrights_id = mysqli_real_escape_string($link,$_POST['userrights_id']);
$desi_id = mysqli_real_escape_string($link,$_POST['desi_id']);
$dept_id = mysqli_real_escape_string($link,$_POST['dept_id']);
$emp_id = mysqli_real_escape_string($link,$_POST['emp_id']);
$parent = mysqli_real_escape_string($link,$_POST['parent']);
$submenu = mysqli_real_escape_string($link,$_POST['submenu']);
$childmenu = mysqli_real_escape_string($link,$_POST['childmenu']);
$read = mysqli_real_escape_string($link,$_POST['read']);
$write = mysqli_real_escape_string($link,$_POST['write']);
$menu_id = mysqli_real_escape_string($link,$_POST['menu_id']);
$status = mysqli_real_escape_string($link,$_POST['status']);
$sort_order = mysqli_real_escape_string($link,$_POST['sort_order']);
if(mysqli_query($link,"UPDATE `userrights_tbl` SET `id` = '$id', `userrights_id` = '$userrights_id', `desi_id` = '$desi_id', `dept_id` = '$dept_id', `emp_id` = '$emp_id', `parent` = '$parent', `submenu` = '$submenu', `childmenu` = '$childmenu', `read` = '$read', `write` = '$write', `menu_id` = '$menu_id', `date` = '$date', `created_by` = '$created_by', `approved_by` = '$approved_by', `status` = '$status', `sort_order` = '$sort_order' WHERE `userrights_id`='$userrights_id'")){$msg[] = "Successfully Saved!";
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
                        <div class="col-lg-6"><h3 class="box-heading"> User Rights <small>Add / Update  Details</small></h3></h3></div>
                        <div class="col-lg-6">
                          <div class="breadcrumb">
                            <a href="index.php" class="breadcrumb_a">Home</a> 
                            <i class="fa fa-angle-double-right angle_double_right"></i>
                            <a href="userrights_view.php" class="breadcrumb_a">User Rights </a> 
                            <i class="fa fa-angle-double-right angle_double_right" aria-hidden="true"></i>
                            <a href="#" class="breadcrumb_a">Add / Update User Rights </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="box-body">
                      <!-- <h5 class="second_heading">Add City</h5> -->
                      <form method="post" class="padding-10" enctype="multipart/form-data">
                       <?php
	$userrights_id = mysqli_real_escape_string($link,$_GET['userrights_id']);
	$update = mysqli_real_escape_string($link,$_GET['update']);
	if($update == "yes"){
	$sel_row = mysqli_query($link,"select * from userrights_tbl where `userrights_id`='$userrights_id'");
	$row = mysqli_fetch_object($sel_row);
	$upload_id = $row->userrights_id;
	}
	else
	{
	$max_id = maxOfAll("id","userrights_tbl");
	$max_id=$max_id+1;
	$upload_id="use-".$max_id;
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
        <label class="margin-left-10" for="industry_name">Userrights Id</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
          <input type="text" class="form-control" name="userrights_id" id="userrights_id" placeholder="Enter the auotid" value="<?php echo $upload_id; ?>" readonly="readonly"    required="required">
        </div>
      </div>
    </div>
    
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Designation</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
          <select name="desi_id" id="desi_id" class="form-control"    min="0" max="0" required="required">
<?php
        $sel_rw = mysqli_query($link,"select designation_name,designation_id from designation_tbl");
        while($row1 = mysqli_fetch_object($sel_rw)){
        ?>

        <option value="<?php echo $row1->designation_id; ?>"><?php echo $row1->designation_name; ?></option>

        <?php } ?>
        </select>
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Department</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
         <select name="dept_id" id="dept_id" class="form-control"      required="required">
<?php
				$sel_rw = mysqli_query($link,"select department_name,department_id from department_tbl");
				while($row1 = mysqli_fetch_object($sel_rw)){
				?>

				<option value="<?php echo $row1->department_id; ?>"><?php echo $row1->department_name; ?></option>

				<?php } ?>
				</select>
	
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Employee</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
          <select name="emp_id" id="emp_id" class="form-control"      required="required">
<?php echo "select first_name,employee_id from employee_tbl";
				$sel_rw = mysqli_query($link,"select first_name,employee_id from employee_tbl");
				while($row1 = mysqli_fetch_object($sel_rw)){
				?>

				<option value="<?php echo $row1->employee_id; ?>"><?php echo $row1->first_name; ?></option>

				<?php } ?>
				</select>
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Main Menu</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
         <select name="parent" id="parent" class="form-control"      required="required">
<?php
				$sel_rw = mysqli_query($link,"select parent from menu_tbl");
				while($row1 = mysqli_fetch_object($sel_rw)){
				?>

				<option value="<?php echo $row1->parent; ?>"><?php echo $row1->parent; ?></option>

				<?php } ?>
				</select>
        </div>
      </div>
    </div>
   
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_id">Sub Menu </label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
          <select name="submenu" id="submenu" class="form-control"      required="required">
<?php
				$sel_rw = mysqli_query($link,"select submenu from menu_tbl");
				while($row = mysqli_fetch_object($sel_rw)){
				?>

				<option value="<?php echo $row->submenu; ?>"><?php echo $row->submenu; ?></option>

				<?php } ?>
				</select>
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_id">Child Menu </label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
         <select name="childmenu" id="childmenu" class="form-control"      required="required">
<?php
				$sel_rw = mysqli_query($link,"select childmenu from menu_tbl");
				while($row1 = mysqli_fetch_object($sel_rw)){
				?>

				<option value="<?php echo $row1->childmenu; ?>"><?php echo $row1->childmenu; ?></option>

				<?php } ?>
				</select>

        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_id">Read </label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
         <input type="text" class="form-control" name="read" id="read" placeholder="" value="<?php echo $row->read; ?>"     required="required">

        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_id">Write </label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
        <input type="text" class="form-control" name="write" id="write" placeholder="" value="<?php echo $row->write; ?>"     required="required">

        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_id">Menu Id </label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
       <select name="menu_id" id="menu_id" class="form-control"      required="required">
<?php
				$sel_rw = mysqli_query($link,"select menu_id from menu_tbl");
				while($row1 = mysqli_fetch_object($sel_rw)){
				?>

				<option value="<?php echo $row1->menu_id; ?>"><?php echo $row1->menu_id; ?></option>

				<?php } ?>
				</select>

        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_id">Status </label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
        <select name="status" id="status" class="form-control"      required="required">
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
        <input type="text" class="form-control" name="sort_order" id="sort_order" placeholder="Enter the Sortorder" value="<?php echo $row1->sort_order; ?>"     required="required">
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
$("#desi_id option[value='<?php echo $row->designation_id; ?>']").attr("selected", "selected");
$("#dept_id option[value='<?php echo $row->department_id; ?>']").attr("selected", "selected");
$("#emp_id option[value='<?php echo $row->employee_id; ?>']").attr("selected", "selected");
$("#parent option[value='<?php echo $row->parent; ?>']").attr("selected", "selected");
$("#submenu option[value='<?php echo $row->submenu; ?>']").attr("selected", "selected");
$("#childmenu option[value='<?php echo $row->childmenu; ?>']").attr("selected", "selected");
$("#menu_id option[value='<?php echo $row->menu_id; ?>']").attr("selected", "selected");
});
</script>
 
</html>