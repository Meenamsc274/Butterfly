<?php 
include 'dbc.php'; 
page_protect();
$created_by = $_SESSION['userid'];
$approved_by = "";
?>
<?php
if($_POST['submit'] == "Submit"){

$autoid = mysqli_real_escape_string($link,$_POST['autoid']);
$branch = mysqli_real_escape_string($link,$_POST['branch']);
$first_name = mysqli_real_escape_string($link,$_POST['first_name']);
$last_name = mysqli_real_escape_string($link,$_POST['last_name']);
$contact = mysqli_real_escape_string($link,$_POST['contact']);
$email = mysqli_real_escape_string($link,$_POST['email']);
$expertise = mysqli_real_escape_string($link,$_POST['expertise']);
$address = mysqli_real_escape_string($link,$_POST['address']);


if(mysqli_query($link,"INSERT INTO `trainer_tbl` (`autoid`, `branch`, `first_name`, `last_name`, `contact`, `email`, `expertise`, `address`, `ip_address`, `browser`, `date`, `created_by`, `approved_by`) VALUES ( '$autoid', '$branch', '$first_name', '$last_name', '$contact', '$email', '$expertise', '$address', '$ip_address', '$browser', NOW(), '$created_by', '$approved_by')")){

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
    $autoid = mysqli_real_escape_string($link,$_POST['autoid']);
    $branch = mysqli_real_escape_string($link,$_POST['branch']);
    $first_name = mysqli_real_escape_string($link,$_POST['first_name']);
    $last_name = mysqli_real_escape_string($link,$_POST['last_name']);
    $contact = mysqli_real_escape_string($link,$_POST['contact']);
    $email = mysqli_real_escape_string($link,$_POST['email']);
    $expertise = mysqli_real_escape_string($link,$_POST['expertise']);
    $address = mysqli_real_escape_string($link,$_POST['address']);
if(mysqli_query($link,"UPDATE `trainer_tbl` SET `branch` = '$branch', `first_name` = '$first_name', `last_name` = '$last_name', `contact` = '$contact', `email` = '$email', `expertise` = '$expertise', `address` = '$address', `ip_address` = '$ip_address', `browser` = '$browser', `created_by` = '$created_by', `approved_by` = '$approved_by' WHERE `autoid`='$autoid'")){
    $msg[] = "Successfully Updated!";
	}
	else
	{
		$err[] = "Error in saving data!";
	}
	}
?><!DOCTYPE html>
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
                        <div class="col-lg-6">
                            <h3 class="box-heading"> Trainer <small>Add / Update  Details</small>
                            <div class="breadcrumb">
                                <a href="index.php" class="breadcrumb_a">Home</a> 
                                <i class="fa fa-angle-double-right angle_double_right"></i>
                                <a href="trainer_view.php" class="breadcrumb_a">Trainer </a> 
                                <i class="fa fa-angle-double-right angle_double_right" aria-hidden="true"></i>
                                <a href="#" class="breadcrumb_a">Add / Update Trainer </a>
                            </div>
                            </h3>
                        </div>
                        <div class="col-lg-6">
                        <a class="btn btn-sm bg-default float-right margin-28" href="trainer_view.php"><i class="fa fa-eye"></i></a>
                        </div>
                      </div>
                    </div>
                    <div class="box-body">
                      <!-- <h5 class="second_heading">Add City</h5> -->
                      <form method="post" class="padding-10" enctype="multipart/form-data">
                      <?php
	$autoid = mysqli_real_escape_string($link,$_GET['autoid']);
	$update = mysqli_real_escape_string($link,$_GET['update']);
	if($update == "yes"){
	$sel_row = mysqli_query($link,"select * from trainer_tbl where `autoid`='$autoid'");
	$row = mysqli_fetch_object($sel_row);
	$upload_id = $row->autoid;
	}
	else
	{
	$max_id = maxOfAll("id","trainer_tbl");
	$max_id=$max_id+1;
	$upload_id="TR-".$max_id;
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
        <label class="margin-left-10" for="industry_name">Trainer Id</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
          <input type="text" class="form-control" name="autoid" id="autoid" placeholder="Enter the Tax Id" value="<?php echo $upload_id; ?>" readonly="readonly">
        </div>
      </div>
    </div>
    
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Branch</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
            <select name="branch" id="branch" class="form-control" required>
                <?php $sel_branch = mysqli_query($link,"select branch_id,branch_name from branch_tbl"); 
                while($fet_branch = mysqli_fetch_object($sel_branch)){
                    ?><option value="<?php echo $fet_branch->branch_id; ?>"><?php echo $fet_branch->branch_name; ?></option><?php
                } ?>
                
            </select>
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">First Name</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
         <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Enter Your First Name" value="<?php echo $row->first_name; ?>" required="required">
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Last Name</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
        <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Enter Your Last Name" value="<?php echo $row->last_name; ?>" required="required">
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Contact</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
         <input type="text" class="form-control" name="contact" id="contact" placeholder="Enter Your Contact" value="<?php echo $row->contact; ?>" required="required">
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Email</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
         <input type="email" class="form-control" name="email" id="email" placeholder="Enter Your Email" value="<?php echo $row->email; ?>" required="required">
        </div>
      </div>
    </div>

   
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Expertise</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
            <textarea name="expertise" id="expertise" class="form-control" cols="30" rows="10" required><?php echo $row->expertise; ?></textarea>
         
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Address</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
            <textarea name="address" id="address" class="form-control" cols="30" rows="10" required><?php echo $row->address; ?></textarea>
         
        </div>
      </div>
    </div>

    <div class="box-footer ">
      <div>&nbsp;</div>
      <div style="border-top: 1px solid #ced4da;">&nbsp;</div>
       <center>
       <?php if($update == "yes"){ ?>
        <input type="submit" name="submit" id="submit" class="btn bg-default" value="Update">
       <?php } else { ?>
        <input type="submit" name="submit" id="submit" class="btn bg-default" value="Submit">
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
    $("#branch option[value='<?php echo $row->branch; ?>']").attr("selected", "selected");
    $("#country option[value='<?php echo $row->country; ?>']").attr("selected", "selected");
});
</script>
 
</html>