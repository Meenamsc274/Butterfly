<?php 
include 'dbc.php'; 
page_protect();
$created_by = $_SESSION['userid'];
$approved_by = "";
?>
<?php
if($_POST['submit'] == "Submit"){
$id = mysqli_real_escape_string($link,$_POST['id']);
$name = mysqli_real_escape_string($link,$_POST['name']);
$phone = mysqli_real_escape_string($link,$_POST['phone']);
$dob = mysqli_real_escape_string($link,$_POST['dob']);
$gender = mysqli_real_escape_string($link,$_POST['gender']);
$address = mysqli_real_escape_string($link,$_POST['address']);
$email = mysqli_real_escape_string($link,$_POST['email']);
$emp_id = mysqli_real_escape_string($link,$_POST['emp_id']);
$branch = mysqli_real_escape_string($link,$_POST['branch']);
$department = mysqli_real_escape_string($link,$_POST['department']);
$designation = mysqli_real_escape_string($link,$_POST['designation']);
$doj = mysqli_real_escape_string($link,$_POST['doj']);
$certificate = mysqli_real_escape_string($link,$_POST['certificate']);
$photo = mysqli_real_escape_string($link,$_POST['photo']);
$resume = mysqli_real_escape_string($link,$_POST['resume']);
$acc_holder = mysqli_real_escape_string($link,$_POST['acc_holder']);
$acc_no = mysqli_real_escape_string($link,$_POST['acc_no']);
$bank_name = mysqli_real_escape_string($link,$_POST['bank_name']);
$bank_ifsc = mysqli_real_escape_string($link,$_POST['bank_ifsc']);
$branch_location = mysqli_real_escape_string($link,$_POST['branch_location']);
$tax_payer = mysqli_real_escape_string($link,$_POST['tax_payer']);
//echo"INSERT INTO `employee` (`name`, `phone`, `dob`, `gender`, `address`, `email`, `emp_id`, `branch`, `department`, `designation`, `doj`, `acc_holder`,  `acc_no`, `bank_name`, `bank_ifsc`, `branch_location`, `tax_payer`) VALUES ('$name', '$phone', '$dob', '$gender', '$address', '$email', '$emp_id', '$branch', '$department', '$designation', '$doj', '$acc_holder', '$acc_no', '$bank_name', '$bank_ifsc', '$branch_location', '$tax_payer')";
if(mysqli_query($link,"INSERT INTO `employee` (`name`, `phone`, `dob`, `gender`, `address`, `email`, `emp_id`, `branch`, `department`, `designation`, `doj`, `acc_holder`,  `acc_no`, `bank_name`, `bank_ifsc`, `branch_location`, `tax_payer`) VALUES ('$name', '$phone', '$dob', '$gender', '$address', '$email', '$emp_id', '$branch', '$department', '$designation', '$doj', '$acc_holder', '$acc_no', '$bank_name', '$bank_ifsc', '$branch_location', '$tax_payer')")){
	
	

	$fname = $_FILES['certificate']['name'];
	if($fname != ""){
	$upload_dir = "uploads/employee/certificate/";
    $ftype = $_FILES['certificate']['type'];
    $filename_part = explode(".", $fname);
	$upload_name = $filename_part[0];
	$ext = $filename_part[1];
	$max_id = maxOfAll("id","employee");
	$max_id=$max_id+1;
	$upload_id="U-".$max_id;
	$new_filename = $upload_dir.$upload_name."_".$upload_id.".".$ext;
	$page="";
	$title="";
    $movetofolder = (@copy($_FILES['certificate']['tmp_name'],$new_filename));
	}
	$fname = $_FILES['photo']['name'];
	if($fname != ""){
	$upload_dir = "uploads/employee/photo/";
    $ftype = $_FILES['photo']['type'];
    $filename_part = explode(".", $fname);
	$upload_name = $filename_part[0];
	$ext = $filename_part[1];
	$max_id = maxOfAll("id","employee");
	$max_id=$max_id+1;
	$upload_id="U-".$max_id;
	$new_filename1 = $upload_dir.$upload_name."_".$upload_id.".".$ext;
	$page="";
	$title="";
    $movetofolder = (@copy($_FILES['photo']['tmp_name'],$new_filename1));
	}
	$fname = $_FILES['resume']['name'];
	if($fname != ""){
	$upload_dir = "uploads/employee/resume/";
    $ftype = $_FILES['resume']['type'];
    $filename_part = explode(".", $fname);
	$upload_name = $filename_part[0];
	$ext = $filename_part[1];
	$max_id = maxOfAll("id","employee");
	$max_id=$max_id+1;
	$upload_id="U-".$max_id;
	$new_filename2 = $upload_dir.$upload_name."_".$upload_id.".".$ext;
	$page="";
	$title="";
    $movetofolder = (@copy($_FILES['resume']['tmp_name'],$new_filename2));
	}
	//Insert or Update statement to be included here
	//echo"update `employee` set certificate='$new_filename',photo='$new_filename1',resume='$new_filename2' where `emp_id`='$emp_id'";
	mysqli_query($link,"update `employee` set certificate='$new_filename',photo='$new_filename1',resume='$new_filename2' where `emp_id`='$emp_id'");
	
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
$name = mysqli_real_escape_string($link,$_POST['name']);
$phone = mysqli_real_escape_string($link,$_POST['phone']);
$dob = mysqli_real_escape_string($link,$_POST['dob']);
$gender = mysqli_real_escape_string($link,$_POST['gender']);
$address = mysqli_real_escape_string($link,$_POST['address']);
$email = mysqli_real_escape_string($link,$_POST['email']);
$emp_id = mysqli_real_escape_string($link,$_POST['emp_id']);
$branch = mysqli_real_escape_string($link,$_POST['branch']);
$department = mysqli_real_escape_string($link,$_POST['department']);
$designation = mysqli_real_escape_string($link,$_POST['designation']);
$doj = mysqli_real_escape_string($link,$_POST['doj']);
$certificate = mysqli_real_escape_string($link,$_POST['certificate']);
$photo = mysqli_real_escape_string($link,$_POST['photo']);
$resume = mysqli_real_escape_string($link,$_POST['resume']);
$acc_holder = mysqli_real_escape_string($link,$_POST['acc_holder']);
$acc_no = mysqli_real_escape_string($link,$_POST['acc_no']);
$bank_name = mysqli_real_escape_string($link,$_POST['bank_name']);
$bank_ifsc = mysqli_real_escape_string($link,$_POST['bank_ifsc']);
$branch_location = mysqli_real_escape_string($link,$_POST['branch_location']);
$tax_payer = mysqli_real_escape_string($link,$_POST['tax_payer']);
if(mysqli_query($link,"UPDATE `employee` SET `name` = '$name', `phone` = '$phone', `dob` = '$dob', `gender` = '$gender', `address` = '$address', `email` = '$email', `branch` = '$branch', `department` = '$department', `designation` = '$designation', `doj` = '$doj', `acc_holder` = '$acc_holder', `acc_no` = '$acc_no', `bank_name` = '$bank_name', `bank_ifsc`='$bank_ifsc', `branch_location` = '$branch_location', `tax_payer` = '$tax_payer' WHERE `emp_id`='$emp_id'")){
	
	
	
	$fname = $_FILES['certificate']['name'];
	if($fname != ""){
	$upload_dir = "uploads/employee/certificate/";
    $ftype = $_FILES['certificate']['type'];
    $filename_part = explode(".", $fname);
	$upload_name = $filename_part[0];
	$ext = $filename_part[1];
	$max_id = maxOfAll("id","employee");
	$max_id=$max_id+1;
	$upload_id="U-".$max_id;
	$new_filename = $upload_dir.$upload_name."_".$upload_id.".".$ext;
	$page="";
	$title="";
    $movetofolder = (@copy($_FILES['certificate']['tmp_name'],$new_filename));
	}
	$fname = $_FILES['photo']['name'];
	if($fname != ""){
	$upload_dir = "uploads/employee/photo/";
    $ftype = $_FILES['photo']['type'];
    $filename_part = explode(".", $fname);
	$upload_name = $filename_part[0];
	$ext = $filename_part[1];
	$max_id = maxOfAll("id","employee");
	$max_id=$max_id+1;
	$upload_id="U-".$max_id;
	$new_filename1 = $upload_dir.$upload_name."_".$upload_id.".".$ext;
	$page="";
	$title="";
    $movetofolder = (@copy($_FILES['photo']['tmp_name'],$new_filename1));
	}
	$fname = $_FILES['resume']['name'];
	if($fname != ""){
	$upload_dir = "uploads/employee/resume/";
    $ftype = $_FILES['resume']['type'];
    $filename_part = explode(".", $fname);
	$upload_name = $filename_part[0];
	$ext = $filename_part[1];
	$max_id = maxOfAll("id","employee");
	$max_id=$max_id+1;
	$upload_id="U-".$max_id;
	$new_filename2 = $upload_dir.$upload_name."_".$upload_id.".".$ext;
	$page="";
	$title="";
    $movetofolder = (@copy($_FILES['resume']['tmp_name'],$new_filename2));
	}
	//Insert or Update statement to be included here
	//echo"update `employee` set certificate='$new_filename',photo='$new_filename1',resume='$new_filename2' where `emp_id`='$emp_id'";
	mysqli_query($link,"update `employee` set certificate='$new_filename',photo='$new_filename1',resume='$new_filename2' where `emp_id`='$emp_id'");

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
                        <div class="col-lg-6"><h3 class="box-heading"> Employee <small>Add / Update  Details</small></h3></h3></div>
                        <div class="col-lg-6">
                          <div class="breadcrumb">
                            <a href="index.php" class="breadcrumb_a">Home</a> 
                            <i class="fa fa-angle-double-right angle_double_right"></i>
                            <a href="employee_view.php" class="breadcrumb_a">Employee </a> 
                            <i class="fa fa-angle-double-right angle_double_right" aria-hidden="true"></i>
                            <a href="#" class="breadcrumb_a">Add / Update Employee </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="box-body">
                      <!-- <h5 class="second_heading">Add City</h5> -->
                      <form method="post" class="padding-10" enctype="multipart/form-data">
                        <?php
$emp_id = $_GET['emp_id'];
  $update = mysqli_real_escape_string($link,$_GET['update']);
  if($update == "yes"){
  $sel_row=mysqli_query($link,"select * from employee where `emp_id`='$emp_id'");
  $row5 = mysqli_fetch_object($sel_row);
  $upload_id = $emp_id;
  }
  else
  {
  $max_id = maxOfAll("id","employee");
  $max_id=$max_id+1;
  $upload_id="EMP00-".$max_id;
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
 <h4>Personal Details</h4>
    <input type="hidden" class="form-control" name="id" id="id" placeholder="Enter the Id" value="<?php echo $row->id; ?>" readonly="readonly" disabled="disabled" min="0" max="0" >
                          
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Name</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
        <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name " value="<?php echo $row5->name; ?>" required="required"  >  
        </div>
      </div>
    </div>
    
   
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Phone</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
          <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter Phone" value="<?php echo $row5->phone; ?>"  >
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">DoB</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
          <input type="date" class="form-control" name="dob" id="dob" placeholder="Enter DoB" value="<?php echo $row5->dob; ?>"  min="0" max="0" required="required">
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Gender</label>
         </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
         <input type="radio"  name="gender" id="gender"  value="Male"  > Male
         <input type="radio" name="gender" id="gender"  value="Female"  > Female
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="product_name">Address </label>
          </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
         <input type="text" class="form-control" name="address" id="address" placeholder="Enter Address " value="<?php echo $row5->address; ?>"  min="0" max="0" required="required">
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="product_desc">Email</label>
         </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
         <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email " value="<?php echo $row5->email; ?>"  min="0" max="0" required="required">
        </div>
      </div>
    </div>
	<h4>Company Details</h4>
   <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Employee Id</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
          <input type="text" class="form-control" name="emp_id" id="emp_id" placeholder="Enter the Product Id" value="<?php echo $upload_id; ?>" readonly="readonly"  min="0" max="0" >
        </div>
      </div>
    </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Branch Id</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
          <select name="branch" id="branch" class="form-control"    min="0" max="0" required="required">
<?php
        $sel_rw = mysqli_query($link,"select branch_name,branch_id from branch_tbl");
        while($row1 = mysqli_fetch_object($sel_rw)){
        ?>

        <option value="<?php echo $row1->branch_name; ?>"><?php echo $row1->branch_name; ?></option>

        <?php } ?>
        </select>
        </div>
      </div>
    </div>
	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="sub_category">Department</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
           <select name="department" id="department" class="form-control" required="required">
				<?php
				$sel_rw1 = mysqli_query($link,"select * from department_tbl");
				while($row1 = mysqli_fetch_object($sel_rw1)){
				?>

				<option value="<?php echo $row1->department_name; ?>"><?php echo $row1->department_name; ?></option>

				<?php } ?>
				</select>
		
        </div>
      </div>
    </div> 
	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="brand_id">Designation</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
           <select name="designation" id="designation" class="form-control" required="required">
				<?php
				$sel_rw1 = mysqli_query($link,"select * from designation_tbl");
				while($row1 = mysqli_fetch_object($sel_rw1)){
				?>

				<option value="<?php echo $row1->designation_name; ?>"><?php echo $row1->designation_name; ?></option>

				<?php } ?>
				</select>
		
        </div>
      </div>
    </div>
	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="doj">Company Date of Joining</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
           <input type="date" class="form-control" name="doj" id="doj" placeholder="Please enter the HSN / SAC Code" value="<?php echo $row5->doj; ?>" required="required">
		
        </div>
      </div>
    </div>
   <h4>Document</h4>
   <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="product_img">Certificate</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
		 <?php
                            if($_GET['action']=="Update"){
                                $product_img = $row5->certificate;
                            }else{
                               $product_img =""; 
                            }
                            if($product_img == ""){
                                $required = "yes";
                            }
                            else
                            {
                                $required = "no";   
                            }    
                            if($product_img != ""){
                            ?>
                            <input type="file" class="form-control" id="certificate" name="certificate" value="<?php echo $product_img; ?>" />
                            <?php
                            }
                            ?>
           <input type="file" class="form-control" name="certificate" id="certificate"  value="<?php echo $row->product_img; ?>"  min="0" max="0" required="required">
        </div>
      </div>
    </div>
	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="product_img">Resume</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
		 <?php
                            if($_GET['action']=="Update"){
                                $product_img = $row5->resume;
                            }else{
                               $product_img =""; 
                            }
                            if($product_img == ""){
                                $required = "yes";
                            }
                            else
                            {
                                $required = "no";   
                            }    
                            if($product_img != ""){
                            ?>
                            <input type="file" class="form-control" id="resume" name="resume" value="<?php echo $product_img; ?>" />
                            <?php
                            }
                            ?>
           <input type="file" class="form-control" name="resume" id="resume"  value="<?php echo $row->product_img; ?>"  min="0" max="0" required="required">
        </div>
      </div>
    </div>
	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="product_img">Photo</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
		 <?php
                            if($_GET['action']=="Update"){
                                $product_img = $row5->photo;
                            }else{
                               $product_img =""; 
                            }
                            if($product_img == ""){
                                $required = "yes";
                            }
                            else
                            {
                                $required = "no";   
                            }    
                            if($product_img != ""){
                            ?>
                            <img src="<?php echo $product_img; ?>" class="img-responsive" style="height:100px;" />
                            <?php
                            }
                            ?>
           <input type="file" class="form-control" name="photo" id="photo"  value="<?php echo $row->photo; ?>"  min="0" max="0" required="required">
        </div>
      </div>
    </div>
   <h4>Bank Account Details</h4>
	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="lowstock_alert">Account Holder Name </label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
          <input type="text" class="form-control" name="acc_holder" id="acc_holder" placeholder="Enter Account Holder Name" value="<?php echo $row5->acc_holder; ?>" required="required">
        </div>
      </div>
    </div>
	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="expirydays_alert">Account No </label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
          <input type="text" class="form-control" name="acc_no" id="acc_no" placeholder="Enter the Account No" value="<?php echo $row5->acc_no; ?>" required="required">
        </div>
      </div>
    </div>
	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="expirydays_alert">Bank Name </label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
          <input type="text" class="form-control" name="bank_name" id="bank_name" placeholder="Enter the Bank Name" value="<?php echo $row5->bank_name; ?>" required="required">
        </div>
      </div>
    </div>
	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="expirydays_alert">Bank Identifier Code </label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
          <input type="text" class="form-control" name="bank_ifsc" id="bank_ifsc" placeholder="Enter the Bank Identifier Code" value="<?php echo $row5->bank_ifsc; ?>" required="required">
        </div>
      </div>
    </div>
	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="expirydays_alert">Branch Location </label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
          <input type="text" class="form-control" name="branch_location" id="branch_location" placeholder="Enter the Branch Location" value="<?php echo $row5->branch_location; ?>" required="required">
        </div>
      </div>
    </div>
	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="expirydays_alert">Tax Payer Id </label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
          <input type="text" class="form-control" name="tax_payer" id="tax_payer" placeholder="Enter the Tax Payer Id" value="<?php echo $row5->tax_payer; ?>" required="required">
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
$("#gender option[value='<?php echo $row5->gender; ?>']").attr("checked", "checked");
$("#branch_id option[value='<?php echo $row1->branch_id; ?>']").attr("selected", "selected");
$("#category option[value='<?php echo $row1->category; ?>']").attr("selected", "selected");
$("#sub_category option[value='<?php echo $row1->sub_category; ?>']").attr("selected", "selected");
$("#brand_id option[value='<?php echo $row1->brand_id; ?>']").attr("selected", "selected");
$("#unit option[value='<?php echo $row1->unit; ?>']").attr("selected", "selected");
$("#tax option[value='<?php echo $row1->tax; ?>']").attr("selected", "selected");
$("#batch_stock option[value='<?php echo $row1->batch_stock; ?>']").attr("selected", "selected");
$("#stockable option[value='<?php echo $row1->stockable; ?>']").attr("selected", "selected");
$("#price_changeable option[value='<?php echo $row1->price_changeable; ?>']").attr("selected", "selected");
$("#show option[value='<?php echo $row1->show; ?>']").attr("selected", "selected");
$("#status option[value='<?php echo $row1->status; ?>']").attr("selected", "selected");
});
</script>
 
</html>