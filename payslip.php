<?php 
include 'dbc.php'; 

include("export_data.php");
page_protect();
$created_by = $_SESSION['userid'];
$approved_by = "";
$page = "salary_view"; ?>

           <tbody>
        <?php
if(isset($_POST['pay']))
{
$emp = mysqli_real_escape_string($link,$_POST['emp']);
$salary = mysqli_real_escape_string($link,$_POST['salary']);
$amt = mysqli_real_escape_string($link,$_POST['amt']);
$day = mysqli_real_escape_string($link,$_POST['day']);
$autoid = mysqli_real_escape_string($link,$_POST['autoid']);
$date = date("Y-m");

mysqli_query($link,"UPDATE `payslip_tbl` SET `status`='Paid' WHERE `emp_id`='$emp' and `salary_slip`='$date'");
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
    
  </head>
  <body>
    <div class="page-wrapper"> <?php include 'assets/common/header.php';?> 
    	<section class="side-bar">
        	<div class="row"> <?php include 'assets/common/left-sidebar.php';?> 
			<div class="col-lg-10">
	            <div class="container box-bg">
            		<div class="box">
					<div class="box-header">
	              			<div class="row">
	              				<div class="col-lg-6">
                                    <h3 class="box-heading"> Payslip
                                    <div class="breadcrumb">
	              						<a href="index.php" class="breadcrumb_a">Home</a> 
                            			<i class="fa fa-angle-double-right angle_double_right"></i>
		              					<a href="#" class="breadcrumb_a">Payslip </a> 
	              					</div>
                                </div>
                                    </h3> 
                                  
	              			</div>
	              		</div>
						  <div class="box-body">
						  <form method="post">
                        <div class="form-group row form_box_shadow">
                          
                          <div class="col-lg-12 row">
                            
                            <div class="col-lg-2 offset-lg-6">
                              <label>Select Month</label>
								<select name="month" id="month" class="form-control">
									<option value="01">JAN</option>
									<option value="02">FEB</option>
									<option value="03">MAR</option>
									<option value="04">APR</option>
									<option value="05">MAY</option>
									<option value="06">JUN</option>
									<option value="07">JUL</option>
									<option value="08">AUG</option>
									<option value="09">SEP</option>
									<option value="10">OCT</option>
									<option value="11">NOV</option>
									<option value="12">DEC</option>
								</select>
                            </div>
                            <div class="col-lg-2">
                              	<label>Select Year</label>
                              	<select name="year" id="year" class="form-control">
									<?php for($i=2023;$i<=2050;$i++){ ?>
									<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
									<?php } ?>
								</select>
                            </div>
                            <div class="col-lg-2">
							<input type="submit" name="submit1" id="submit" class="btn bg-default margin_top_40" value="Generate Payslip"></div>
                          </div>
                          
                        </div>
                        </form>
	    <?php
if($_POST['submit1'] == "Generate Payslip"){
$month = mysqli_real_escape_string($link,$_POST['month']);
$year = mysqli_real_escape_string($link,$_POST['year']);

}
else{
	$month =date('m');
	$year =date('Y');
}
$day=$year."-".$month;
?>          		

						<form action="<?php echo $_SERVER["PHP_SELF"]; ?>?day=<?php echo $day; ?>" method="post">					
						<button id="export_data" name='export_data' value="Export to excel" class="btn bg-default" style="float:right;margin:15px!important;">Export</button><br/><br>
	              			</form>
							<!-- <h5 class="second_heading">Add Industry</h5> -->
                    <form action="" method="post" class="padding-10" enctype="multipart/form-data">
				   <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr>
					<th>Employee Id</th>
					<th>Name</th>
					<th>Payroll Type</th>
					<th>Salary</th>
					<th>Net Salary</th>
					<th>Status</th>
					<th>Actions</th>
                </tr>
                </thead>
                <tbody>
        
<?php
		$all_amt=0;
        $sel_rw = mysqli_query($link,"select * from  payslip_tbl where  salary_slip like '$day%'");
        while($row = mysqli_fetch_object($sel_rw)){
			$emp_id=$row->employee_id;
			//echo"select SUM(amount) as amt from allowance where emp_id='$emp_id' and date like '$day%'";
			/* $pay=mysqli_query($link,"select * from payslip where emp_id='$emp_id' and date like '$day%'");
			$n=mysqli_num_rows($pay);
			$all=mysqli_query($link,"select SUM(amount) as amt from allowance where emp_id='$emp_id' and date like '$day%'");
			$al_row = mysqli_fetch_object($all);
			$com=mysqli_query($link,"select SUM(amount) as amt from commission where emp_id='$emp_id' and date like '$day%'");
			$com_row = mysqli_fetch_object($com);
			$loan=mysqli_query($link,"select SUM(amount) as amt from loan where emp_id='$emp_id' and date like '$day%'");
			$loan_row = mysqli_fetch_object($loan);
			$deduction=mysqli_query($link,"select SUM(amount) as amt from deduction where emp_id='$emp_id' and date like '$day%'");
			$deduction_row = mysqli_fetch_object($deduction);
			$other_payment=mysqli_query($link,"select SUM(amount) as amt from other_payment where emp_id='$emp_id' and date like '$day%'");
			$other_row = mysqli_fetch_object($other_payment);
			$overtime=mysqli_query($link,"SELECT days * hours * rate AS total_price FROM overtime where emp_id='$emp_id' and date like '$day%'");
			while($overtime_row = mysqli_fetch_object($overtime))
			{
			$all_amt =$all_amt+$overtime_row->total_price;
			}
			
			$amt = $row->salary_structure + $al_row->amt + $com_row->amt - $deduction_row->amt + $other_row->amt + $all_amt - $loan_row->amt;
			 $max_id = maxOfAll("id","payslip");
  $max_id=$max_id+1;
  $upload_id="PAY-".$max_id; */
			
        ?>

                <tr>
					<td>
					<input type="hidden" name="emp" id="emp"  value="<?php echo $row->emp_id; ?>">
					<input type="hidden" name="day" id="day"  value="<?php echo $day; ?>">
					<input type="hidden" name="autoid" id="autoid"  value="<?php echo $row->autoid; ?>">
					<a href="emp_singleview.php?emp_id=<?php echo $row->emp_id; ?>" class="border border-success text-success p-2 rounded" >#<?php echo $row->emp_id; ?></a></td>
					<td>
					<?php echo $row->emp_name; ?></td>
					<td><?php echo $row->payroll_type; ?></td>
					<td>
					<input type="hidden" name="salary" id="salary"  value="<?php echo $row->salary; ?>">
					<?php echo $row->salary; ?></td>
					<td>
					<input type="hidden" name="amt" id="amt"  value="<?php echo $row->salary  + $row->ctc; ?>">
					<?php echo $row->salary + $row->ctc; ?></td>
					<td>
					
						<button title=" <?php echo $row->status; ?>" class=" btn btn-danger"><?php echo $row->status; ?></button>
						
					</td>
					<td>
					
					<!--<button class="btn btn-warning" type="button" data-bs-toggle="modal" title="Payslip" title="Payslip" data-bs-target="#myModal">Payslip</button> </span></h5>-->
					<a class="btn btn-warning" target="_blank" type="button" href="payslip_view.php?id=<?php echo $row->emp_id; ?>&date=<?php echo $day; ?>" title="Payslip" title="Payslip">Payslip</a> </span></h5>
					<?php
					if($row->status=="Unpaid")
					{
					?>
						<button name=" pay" type=" submit"  class=" btn btn-success">Click to Pay</button>
						<a href="#" title=" Details" class=" btn btn-info">Edit</a>
						<?php
					} ?>
					<!--<a class="btn btn-danger" title="delete" href="payslip.php?delete=d&id=<?php echo $rw_employee->id;?>&customer_id=<?php echo $rw_employee->autoid;?>" onclick="return confirm('Are you sure want to delete?')">
										<i class="fa fa-trash"></i></a>-->
						<a href="#" title=" Details" class=" btn btn-danger">Delete</a>
					</td>
        </tr>
<?php } 



		?>
		      
                </tbody>
              </table>
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
  
<!-- The Modal -->
<div class="modal" id="myModal" >
  <div class="modal-dialog">
    <div class="modal-content" style="width:120%">

      <!-- Modal Header -->
      <div class="modal-header">
        <h5 class="modal-title">Generate Payslip</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
  
      <!-- Modal body -->
      <div class="modal-body">
      <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	  <img src="assets/img/logo-small.png" alt="logo" >
	   </div>
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	  <a class="btn btn-success" type="button"  title="Download" style="float:right;margin:5px;font-size:12px"><i class="fa fa-download"></i></a> </span></h5>
	  <a class="btn btn-warning" type="button"  title="Send Mail" style="float:right;margin:5px;font-size:12px;color:white"><i class="fa fa-paper-plane"></i></a> </span></h5>
	   </div>
	   </div><hr/>
       <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	  <p><b>Name : </b> Alex</p>
	  <p><b>Position : </b> Employee</p>
	   </div>
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	   </div>
	   </div><hr/>
	<table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr>
					<th>Earning</th>
					<th>Title</th>
					<th>Type</th>
					<th>Amount</th>
                </tr>
                </thead>
                <tbody>
				
				<tr>
				<td>Basic Salary</td>
				<td></td>
				<td></td>
				<td>50000</td>
				</tr>
				<tr>
				<td>Allowance</td>
				<td>test</td>
				<td>Fixed</td>
				<td>500</td>
				</tr>
				<tr>
				<td>Commission</td>
				<td>tests</td>
				<td>Fixed</td>
				<td>500</td>
				</tr>
				<tr>
				<td>Other Payment</td>
				<td>sample</td>
				<td>Fixed</td>
				<td>500</td>
				</tr>
				<tr>
				<td>Overtime</td>
				<td>tests</td>
				<td></td>
				<td>500</td>
				</tr>
                <tr>
					<th>Deduction</th>
					<th>Title</th>
					<th>Type</th>
					<th>Amount</th>
                </tr>
				<tr>
				<td>Loan</td>
				<td>tests</td>
				<td></td>
				<td>500</td>
				</tr>
				<tr>
				<td>Saturation Deduction</td>
				<td>tests</td>
				<td></td>
				<td>500</td>
				</tr>
                </tbody>
                </table>
				<div class="row" style="text-align:right">
				<h6>Total Earnings:</h6>
				<p>6200</p>
				<h6>Total Deduction:</h6>
				<p>1200</p>
				<h6>Net Salary:</h6>
				<p>62000</p>
				</div><hr/>
				<div class="row">
				<h6>Employee Signature:</h6>
				<h6>Paid by:</h6>
				</div><hr/>
      
	  </div>

      <!-- Modal footer -->
      <div class="modal-footer">
	  
	  </div>

    </div>
  </div>
</div>
<!-- Modal End-->
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
  

 
</html>