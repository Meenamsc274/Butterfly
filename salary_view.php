<?php 
include 'dbc.php'; 
page_protect();
$created_by = $_SESSION['userid'];
$approved_by = "";
$page = "salary_view"; ?>


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
	              				<div class="col-lg-6">
                                    <h3 class="box-heading">Manage Employee Salary 
                                    <div class="breadcrumb">
	              						<a href="index.php" class="breadcrumb_a">Home</a> 
                            			<i class="fa fa-angle-double-right angle_double_right"></i>
		              					<a href="#" class="breadcrumb_a">Manage Employee Salary </a> 
	              					</div>
                                </div>
                                    </h3> 
                                  
	              				<div class="col-lg-6">
                                  <a class="btn btn-sm bg-default float-right margin-28" href="salary_add.php"  ><i class="fa fa-plus"></i></a>
	              					
	              				</div>
	              			</div>
							<!--<div class="row">
	              				<div class="col-lg-6"><h3 class="box-heading">Manage Employee Salary</h3> </div>
	              				<div class="col-lg-6">
								
	              					<div class="breadcrumb">
									<a href="salary_add.php" class="btn btn-success"style="font-size:10px;margin-right:9px"><i class="fa fa-plus"></i></a> 
                            			<a href="index.php" class="breadcrumb_a">Home</a> 
                            			<i class="fa fa-angle-double-right angle_double_right"></i>
		              					<a href="#" class="breadcrumb_a">Employee Salary </a> 
	              					</div>
	              				</div>
	              			</div>-->
	              		</div>
	              		<div class="box-body">
	              			<!-- <h5 class="second_heading">Add Industry</h5> -->
                   <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr>
					<th>Employee Id</th>
					<th>Name</th>
					<th>Payroll Type</th>
					<th>Salary</th>
					<th>Net Salary</th>
					<th>Actions</th>
                </tr>
                </thead>
                <tbody>
        <?php
		$all_amt=0;
        $sel_rw = mysqli_query($link,"select * from  salarydetails_tbl");
        while($row = mysqli_fetch_object($sel_rw)){
			$emp_id=$row->employee_id;
			$all=mysqli_query($link,"select SUM(amount) as amt from allowance where emp_id='$emp_id'");
			$al_row = mysqli_fetch_object($all);
			$com=mysqli_query($link,"select SUM(amount) as amt from commission where emp_id='$emp_id'");
			$com_row = mysqli_fetch_object($com);
			$loan=mysqli_query($link,"select SUM(amount) as amt from loan where emp_id='$emp_id'");
			$loan_row = mysqli_fetch_object($loan);
			$deduction=mysqli_query($link,"select SUM(amount) as amt from deduction where emp_id='$emp_id'");
			$deduction_row = mysqli_fetch_object($deduction);
			$other_payment=mysqli_query($link,"select SUM(amount) as amt from other_payment where emp_id='$emp_id'");
			$other_row = mysqli_fetch_object($other_payment);
			$overtime=mysqli_query($link,"SELECT days * hours * rate AS total_price FROM overtime where emp_id='$emp_id'");
			while($overtime_row = mysqli_fetch_object($overtime))
			{
			$all_amt =$all_amt+$overtime_row->total_price;
			}
			
			$amt = $row->salary_structure + $al_row->amt + $com_row->amt - $deduction_row->amt + $other_row->amt + $all_amt - $loan_row->amt;
			
        ?>

                <tr>
					<td><a href="salary_singleview.php?emp_id=<?php echo $row->employee_id; ?>" class="border border-success text-success p-2 rounded" >#<?php echo $row->employee_id; ?></a></td>
					<td><?php echo $row->employee_name; ?></td>
					<td><?php echo $row->payroll_type; ?></td>
					<td><?php echo $row->salary_structure; ?></td>
					<td><?php echo $amt; ?></td>
					<td>
						<a href="salary_singleview.php?emp_id=<?php echo $row->employee_id; ?>" title=" Details"><i class="fa fa-eye"></i></a>
					</td>
        </tr>
        <?php } ?>
                </tbody>
              </table>
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