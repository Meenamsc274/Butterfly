<?php 
include 'dbc.php'; 
page_protect();
$created_by = $_SESSION['userid'];
$approved_by = "";
$page = "salary_view"; ?>
<?php 
	$emp_id = $_GET['emp_id'];
    $sel_rw = mysqli_query($link,"select * from salarydetails_tbl where employee_id='$emp_id'");
    $row = mysqli_fetch_object($sel_rw);
	
	if(isset($_GET['del'])){
		if($_GET['del'] == 'allowance'){
			$autoid = $_GET['id'];
			mysqli_query($link,"delete from allowance where autoid='$autoid'");
			$msg = 'Allowance Removed';
		}
		if($_GET['del'] == 'commission'){
			$autoid = $_GET['id'];
			mysqli_query($link,"delete from commission where autoid='$autoid'");
			$msg = 'Commission Removed';
		}
		if($_GET['del'] == 'loan'){
			$autoid = $_GET['id'];
			mysqli_query($link,"delete from loan where autoid='$autoid'");
			$msg = 'Loan Removed';
		}
		if($_GET['del'] == 'deduction'){
			$autoid = $_GET['id'];
			mysqli_query($link,"delete from deduction where autoid='$autoid'");
			$msg = 'Deduction Removed';
		}
		if($_GET['del'] == 'other_payment'){
			$autoid = $_GET['id'];
			mysqli_query($link,"delete from other_payment where autoid='$autoid'");
			$msg = 'Other Payment Removed';
		}
		if($_GET['del'] == 'overtime'){
			$autoid = $_GET['id'];
			mysqli_query($link,"delete from overtime where autoid='$autoid'");
			$msg = 'Overtime Removed';
		}
	}
	?>
	<?php
	include "insert.php";
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
	.box-bg
	{
		background:#f9f9f9!important;
		
	}
	.box
	{
		background:none!important;
	}
	.btn-success
	{
		background:#1CBDBA!important;
	}
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
	              				<div class="col-lg-6"><h3 class="box-heading"> Employee Set Salary
								  <div class="breadcrumb">
										<a href="index.php" class="breadcrumb_a">Home</a> 
                            			<i class="fa fa-angle-double-right angle_double_right"></i>
		              					<a href="#" class="breadcrumb_a">Employee Set Salary </a> 
	              					</div>
								</h3> 
							</div>
	              				<div class="col-lg-6">	 
									<?php if(!empty($msg)){ ?>
									<div id="status" class="alert alert-success alert-dismissible mt-2">
										<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
										<span><?php echo $msg; ?>!</span>
									</div>   
									<?php } ?> 
									<?php if(!empty($err)){ ?>
									<div id="status" class="alert alert-danger alert-dismissible mt-2">
										<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
										<span><?php echo $err; ?>!</span>
									</div>   
									<?php } ?>         					
	              				</div>
	              			</div>
	              		</div>
	              		<div class="box-body">
	              			<!-- <h5 class="second_heading">Add Industry</h5> -->
							<?php $payslip_type_id = $row->payroll_type;
							list($payslip_type_name) = mysqli_fetch_row(mysqli_query($link,"select name from payslip_type_tbl where autoid='$payslip_type_id'")); ?>
                   <div class="row">
                   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                   <div class="card">
  <div class="card-body">
    <h5 class="card-title">Employee Salary <span>
	<button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#myModal"style="font-size:10px;margin-right:9px;float:right"><i class="fa fa-plus"></i></button> </span></h5>
	<hr/>
   <table  class="table " cellspacing="0" border="0" width="100%">
                <thead>
                <tr>
					<th>Payslip Type</th>
					<th>Salary</th>
                </tr>
                </thead>
                <tbody>
				<tr>
				<td><?php echo $payslip_type_name; ?></td>
				<td><?php echo $row->salary_structure; ?></td>
				</tr>
				</tbody>
				</table>
  </div> 
</div>
</div>
<!---  Panel End -->
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                   <div class="card">
  <div class="card-body">
   <h5 class="card-title">Allowance <span>
	<button class="btn btn-success" type="button" data-bs-toggle="modal" title="Create" data-bs-target="#myModal1"style="font-size:10px;margin-right:9px;float:right"><i class="fa fa-plus"></i></button> </span></h5>
	
   <hr/>
   
   <table id="example" class="table table-striped table-bordered table-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr>
					<th>Employee Name</th>
					<th>Allowance Option</th>
					<th>Title</th>
					<th>Type</th>
					<th>Amount</th>
					<th>Action</th>
                </tr>
                </thead>
                <tbody>
				 <?php
        $sel_rw2 = mysqli_query($link,"select * from allowance where emp_id='$emp_id'");
        while($row2 = mysqli_fetch_object($sel_rw2)){
			$allowance_option_id = $row2->allowance_type;
			list($allowance_option_name) = mysqli_fetch_row(mysqli_query($link,"select name from allowance_option_tbl where autoid='$allowance_option_id'")); 
        ?>
								<tr>
				<td><?php echo $row2->emp_name; ?></td>
				<td><?php echo $allowance_option_name; ?></td>
				<td><?php echo $row2->title; ?></td>
				<td><?php echo $row2->type; ?></td>
				<td><?php echo $row2->amount; ?></td>
				<td>
						
						<button class="btn btn-sm btn-success edit_allowance" title="Edit Details" data-id="<?php echo $row2->autoid; ?>"  type="button" ><i class="fa fa-edit"></i></button>

						<a href="salary_singleview.php?del=allowance&id=<?php echo $row2->autoid; ?>&emp_id=<?php echo $_GET['emp_id']; ?>" class="btn btn-danger btn-sm" title="Delete Details" onclick="return confirm('Are you sure want to delete?')"><i class="fa fa-trash"></i></a>
					</td>
					
				</tr>
				<?php
		}
		?>
								</tbody>
				</table>
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
     <h5 class="card-title">Commission <span>
	<button class="btn btn-success" type="button" data-bs-toggle="modal" title="Create" data-bs-target="#myModal2"style="font-size:10px;margin-right:9px;float:right"><i class="fa fa-plus"></i></button> </span></h5>
	
	<hr/>
  <table id="example1" class="table table-striped table-bordered table-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr>
					<th>Employee Name</th>
					<th>Title</th>
					<th>Type</th>
					<th>Amount</th>
					<th>Action</th>
                </tr>
                </thead>
                <tbody>
				 <?php
        $sel_rw3 = mysqli_query($link,"select * from commission where emp_id='$emp_id'");
        while($row3 = mysqli_fetch_object($sel_rw3)){
        ?>
								<tr>
				<td><?php echo $row3->emp_name; ?></td>
				<td><?php echo $row3->title; ?></td>
				<td><?php echo $row3->type; ?></td>
				<td><?php echo $row3->amount; ?></td>
				<td>
				<button class="btn btn-sm btn-success edit_commission" title="Edit Details" data-id="<?php echo $row3->autoid; ?>"  type="button" ><i class="fa fa-edit"></i></button>

						<a href="salary_singleview.php?del=commission&id=<?php echo $row3->autoid; ?>&emp_id=<?php echo $_GET['emp_id']; ?>" class="btn btn-danger btn-sm" title="Delete Details" onclick="return confirm('Are you sure want to delete?')"><i class="fa fa-trash"></i></a>
					</td>
					
				</tr>
				<?php
		}
		?>
								</tbody>
				</table>
  </div>
</div>
</div>
<!---  Panel End -->
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" >
                   <div class="card">
  <div class="card-body">
     <h5 class="card-title">Loan <span>
	<button class="btn btn-success" type="button" data-bs-toggle="modal" title="Create" data-bs-target="#myModal3"style="font-size:10px;margin-right:9px;float:right"><i class="fa fa-plus"></i></button> </span></h5>
	
	<hr/>
  <table id="example2" class="table table-striped table-bordered table-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr>
					<th>Employee Name</th>
					<th>Loan Options</th>
					<th>Title</th>
					<th>Type</th>
					<th>Loan Amount</th>
					<th>Action</th>
                </tr>
                </thead>
                <tbody>
				 <?php
        $sel_rw4 = mysqli_query($link,"select * from loan where emp_id='$emp_id'");
        while($row4 = mysqli_fetch_object($sel_rw4)){
			$loan_option_id = $row4->loan_option;
			list($loan_option_name) = mysqli_fetch_row(mysqli_query($link,"select name from loan_option_tbl where autoid='$loan_option_id'")); 

        ?>
								<tr>
				<td><?php echo $row4->emp_name; ?></td>
				<td><?php echo $loan_option_name; ?></td>
				<td><?php echo $row4->title; ?></td>
				<td><?php echo $row4->type; ?></td>
				<td><?php echo $row4->amount; ?></td>
				<td>
				<button class="btn btn-sm btn-success edit_loan" title="Edit Details" data-id="<?php echo $row4->autoid; ?>"  type="button" ><i class="fa fa-edit"></i></button>

						<a href="salary_singleview.php?del=loan&id=<?php echo $row4->autoid; ?>&emp_id=<?php echo $_GET['emp_id']; ?>" class="btn btn-danger btn-sm" title="Delete Details" onclick="return confirm('Are you sure want to delete?')"><i class="fa fa-trash"></i></a>
					</td>
					
				</tr>
				<?php
		}
		?>
								</tbody>
				</table>
  </div>
</div>
</div>
<!---  Panel End -->
              		</div><br/>
						<!-- Row End -->
<div class="row">
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top:15px;">
                   <div class="card">
  <div class="card-body">
     <h5 class="card-title">Saturation Deduction <span>
	<button class="btn btn-success" type="button" data-bs-toggle="modal" title="Create" data-bs-target="#myModal4"style="font-size:10px;margin-right:9px;float:right"><i class="fa fa-plus"></i></button> </span></h5>
	
	<hr/>
  <table id="example3" class="table table-striped table-bordered table-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr>
					<th>Employee Name</th>
					<th>Deduction Option</th>
					<th>Title</th>
					<th>Type</th>
					<th>Amount</th>
					<th>Action</th>
                </tr>
                </thead>
                <tbody>
				 <?php
        $com = mysqli_query($link,"select * from deduction where emp_id='$emp_id'");
        while($com3 = mysqli_fetch_object($com)){
			$deduction_option_id = $com3->deduction_option;
			list($deduction_option_name) = mysqli_fetch_row(mysqli_query($link,"select name from deduction_option_tbl where autoid='$deduction_option_id'")); 

        ?>
								<tr>
				<td><?php echo $com3->emp_name; ?></td>
				<td><?php echo $deduction_option_name; ?></td>
				<td><?php echo $com3->title; ?></td>
				<td><?php echo $com3->type; ?></td>
				<td><?php echo $com3->amount; ?></td>
				<td>
				<button class="btn btn-sm btn-success edit_deduction" title="Edit Details" data-id="<?php echo $com3->autoid; ?>"  type="button" ><i class="fa fa-edit"></i></button>
						<a href="salary_singleview.php?del=deduction&id=<?php echo $com3->autoid; ?>&emp_id=<?php echo $_GET['emp_id']; ?>" class="btn btn-danger btn-sm" title="Delete Details" onclick="return confirm('Are you sure want to delete?')"><i class="fa fa-trash"></i></a>
					</td>
					
				</tr>
				<?php
		}
		?>
								</tbody>
				</table>
  </div>
</div>
</div><br/>
<!---  Panel End -->
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                   <div class="card">
  <div class="card-body">
     <h5 class="card-title">Other Payment <span>
	<button class="btn btn-success" type="button" data-bs-toggle="modal" title="Create" data-bs-target="#myModal5"style="font-size:10px;margin-right:9px;float:right"><i class="fa fa-plus"></i></button> </span></h5>
	
	<hr/>
  <table id="example4" class="table table-striped table-bordered table-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr>
					<th>Employee Name</th>
					<th>Title</th>
					<th>Type</th>
					<th> Amount</th>
					<th>Action</th>
                </tr>
                </thead>
                <tbody>
				 <?php
        $other = mysqli_query($link,"select * from other_payment where emp_id='$emp_id'");
        while($other_row = mysqli_fetch_object($other)){
        ?>
								<tr>
				<td><?php echo $other_row->emp_name; ?></td>
				<td><?php echo $other_row->title; ?></td>
				<td><?php echo $other_row->type; ?></td>
				<td><?php echo $other_row->amount; ?></td>
				<td>
				<button class="btn btn-sm btn-success edit_other_payment" title="Edit Details" data-id="<?php echo $other_row->autoid; ?>"  type="button" ><i class="fa fa-edit"></i></button>

						<a href="salary_singleview.php?del=other_payment&id=<?php echo $other_row->autoid; ?>&emp_id=<?php echo $_GET['emp_id']; ?>" class="btn btn-danger btn-sm" title="Delete Details" onclick="return confirm('Are you sure want to delete?')"><i class="fa fa-trash"></i></a>
					</td>
					
				</tr>
				<?php
		}
		?>
								</tbody>
				</table>
  </div>
</div>
</div>
<!---  Panel End -->
              		</div>
						<!-- Row End -->
<div class="row">
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"style="margin-top:15px;">
                   <div class="card">
  <div class="card-body">
     <h5 class="card-title">Overtime <span>
	<button class="btn btn-success" type="button" data-bs-toggle="modal" title="Create" data-bs-target="#myModal7"style="font-size:10px;margin-right:9px;float:right"><i class="fa fa-plus"></i></button> </span></h5>
	
	<hr/>
  <table id="example6" class="table table-striped table-bordered table-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr>
					<th>Employee Name</th>
					<th>Overtime Title</th>
					<th>Number of Days</th>
					<th>Hours</th>
					<th>Rate</th>
					<th>Action</th>
                </tr>
                </thead>
                <tbody>
				 <?php
        $over = mysqli_query($link,"select * from overtime where emp_id='$emp_id'");
        while($over3 = mysqli_fetch_object($over)){
        ?>
								<tr>
				<td><?php echo $over3->emp_name; ?></td>
				<td><?php echo $over3->title; ?></td>
				<td><?php echo $over3->days; ?></td>
				<td><?php echo $over3->hours; ?></td>
				<td><?php echo $over3->rate; ?></td>
				<td>
				<button class="btn btn-sm btn-success edit_overtime" title="Edit Details" data-id="<?php echo $over3->autoid; ?>"  type="button" ><i class="fa fa-edit"></i></button>

						<a href="salary_singleview.php?del=overtime&id=<?php echo $over3->autoid; ?>&emp_id=<?php echo $_GET['emp_id']; ?>" class="btn btn-danger btn-sm" title="Delete Details" onclick="return confirm('Are you sure want to delete?')"><i class="fa fa-trash"></i></a>
					</td>
					
				</tr>
				<?php
		}
		?>
								</tbody>
				</table>
  </div>
</div>
</div>
<!---  Panel End -->
	              		</div>
						<!-- Row End-->
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
  <?php include 'modal.php';?> 
  
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
            $('#example1').DataTable();
            $('#example2').DataTable();
            $('#example3').DataTable();
            $('#example4').DataTable();
            $('#example6').DataTable();
			$("#payroll_type option[value='<?php echo $row->payroll_type; ?>']").attr("selected", "selected");
			$("#allowance_type option[value='<?php echo $row->allowance_type; ?>']").attr("selected", "selected");
			$("#type option[value='<?php echo $row->type; ?>']").attr("selected", "selected");
			$("#loan_option option[value='<?php echo $row6->loan_option; ?>']").attr("selected", "selected");
			$("#type1 option[value='<?php echo $row6->type; ?>']").attr("selected", "selected");
			$("#type2 option[value='<?php echo $loan_row->type; ?>']").attr("selected", "selected");
			$("#type3 option[value='<?php echo $deduction_row->type; ?>']").attr("selected", "selected");
			$("#deduction_option option[value='<?php echo $deduction_row->deduction_option; ?>']").attr("selected", "selected");

			
        });
    </script>
	<script src="assets/js/employee.js"></script>
 
</html>