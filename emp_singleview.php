<?php 
include 'dbc.php'; 
page_protect();
$created_by = $_SESSION['userid'];
$approved_by = "";
$page = "employee_view"; ?>
<?php 
	$emp_id = $_GET['emp_id'];
    $sel_rw = mysqli_query($link,"select * from employee where emp_id='$emp_id'");
    $row = mysqli_fetch_object($sel_rw);
	
	?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Butterfly Paint - Store Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <?php include 'assets/common/css_file.php';?> 
    
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    
  </head>
  <body>
    <div class="page-wrapper"> <?php include 'assets/common/header.php';?> 
    	<section class="side-bar">
        	<div class="row"> <?php include 'assets/common/left-sidebar.php';?> <div class="col-lg-10">
            	<div class="container box-bg">
            		<div class="box">
	              		<div class="box-header">
	              			<div class="row">
	              				<div class="col-lg-6"><h3 class="box-heading"> Employee <small> #<?php echo $row->emp_id; ?> View Details</small></h3> </div>
	              				<div class="col-lg-6">
								
	              					<div class="breadcrumb">
									<a href="employee_add.php?emp_id=<?php echo $row->emp_id; ?>&update=yes" class="btn btn-success"style="font-size:10px;margin-right:9px"><i class="fa fa-pencil"></i></a> 
                            			<a href="index.php" class="breadcrumb_a">Home</a> 
                            			<i class="fa fa-angle-double-right angle_double_right"></i>
		              					<a href="#" class="breadcrumb_a">Employee </a> 
	              					</div>
	              				</div>
	              			</div>
	              		</div>
	              		<div class="box-body">
	              			<!-- <h5 class="second_heading">Add Industry</h5> -->
                   <div class="row">
                   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                   <div class="card">
  <div class="card-body">
    <h5 class="card-title">Personal Details</h5><hr/>
   <div class="row">
   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <p class="card-text"><b>Employee #</b> : <?php echo $row->emp_id; ?></p>
    
  </div>
   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <p class="card-text"><b>Name</b> : <?php echo $row->name; ?></p>
    
  </div>
   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <p class="card-text"><b>Email</b> : <?php echo $row->email; ?></p>
    
  </div>
   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <p class="card-text"><b>Date of Birth</b> : <?php echo $row->dob; ?></p>
    
  </div>
   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <p class="card-text"><b>Phone</b> : <?php echo $row->phone; ?></p>
    
  </div>
   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <p class="card-text"><b>Address</b> : <?php echo $row->address; ?></p>
    
  </div>
  </div>
  </div>
</div>
</div>
<!---  Panel End -->
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                   <div class="card">
  <div class="card-body">
    <h5 class="card-title">Company Detail</h5><hr/>
   <div class="row">
   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <p class="card-text"><b>Branch</b> : <?php echo $row->branch; ?></p>
    
  </div>
   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <p class="card-text"><b>Department</b> : <?php echo $row->department; ?></p>
    
  </div>
   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <p class="card-text"><b>Designation</b> : <?php echo $row->designation; ?></p>
    
  </div>
   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <p class="card-text"><b>Date of Joining</b> : <?php echo $row->doj; ?></p>
    <br/>
  </div>
  </div>
  </div>
</div>
</div>
<!---  Panel End -->
</div><br/>
<!-- Row End-->
<div class="row">
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                   <div class="card">
  <div class="card-body">
    <h5 class="card-title">Document Detail</h5><hr/>
   <div class="row">
   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <p class="card-text"><b>Certificate</b> : <a style="font-size:12px;" href="<?php echo $row->certificate; ?>"><?php echo $row->certificate; ?></a></p>
    
  </div>
   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <p class="card-text"><b>Photo</b> : <img src=" <?php echo $row->photo; ?>" width="110" height="110"></p>
    
  </div>
   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <p class="card-text"><b>Resume</b> : <a style="font-size:12px;" href="<?php echo $row->resume; ?>"><?php echo $row->resume; ?></a></p>
    
  </div>
  </div>
  </div>
</div>
</div>
<!---  Panel End -->
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                   <div class="card">
  <div class="card-body">
    <h5 class="card-title">Bank Account Detail</h5><hr/>
   <div class="row">
   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <p class="card-text"><b>Account Holder Name</b> : <?php echo $row->acc_holder; ?></p>
    
  </div>
   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <p class="card-text"><b>Account No</b> : <?php echo $row->acc_no; ?></p>
    
  </div>
   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <p class="card-text"><b>Bank Name</b> : <?php echo $row->bank_name; ?></p>
    
  </div>
   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <p class="card-text"><b>Bank Identifier Code</b> : <?php echo $row->bank_ifsc; ?></p>
  
  </div>
   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <p class="card-text"><b>Branch Location</b> : <?php echo $row->branch_location; ?></p>
    
  </div>
   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <p class="card-text"><b>Tax Payer Id</b> : <?php echo $row->tax_payer; ?></p>
  
  </div>
  </div>
  </div>
</div>
</div>
<!---  Panel End -->
	              		</div>
						<!-- Row End -->
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
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
  

 
</html>