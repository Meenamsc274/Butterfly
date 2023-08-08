<?php
include "dbc.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Butterfly Paint - Store Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <?php include 'assets/common/css_file.php';?> 
  
<style>

@media print {
	#printButton
	{display:none;
	}
}
</style>  
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script type="text/javascript">

function printpage() {

document.getElementById('printButton').style.visibility="hidden";

window.print();

document.getElementById('printButton').style.visibility="visible";  

}

</script>
  </head>
  <body>
	              		<div class="box-body">
	              			<!-- <h5 class="second_heading">Add Country</h5> -->
                     <div class="card">
  <div class="card-header">Employee Payslip</div>
  <div class="card-body">
  <div class="row">
  <div class="col-sm-6">
  <img src="assets/img/logo-small.png" alt="logo" >
  </div>
  <div class="col-sm-6">
  			<button type="button"  name="print" value="Print" id="printButton" onClick="printpage();" class="btn btn-success"  style="float:right;margin:5px;font-size:12px"><i class="fa fa-download"></i> </button>
			</form>
  <!-- <a class="btn btn-success" type="button"  title="Download" style="float:right;margin:5px;font-size:12px"><i class="fa fa-download"></i></a> </span></h5>-->
	  <a class="btn btn-warning" id="printButton" type="button"  title="Send Mail" style="float:right;margin:5px;font-size:12px;color:white"><i class="fa fa-paper-plane"></i></a> </span></h5>
	  
  </div>
  </div><hr/>
  <?php
  $emp_id=$_GET['id'];
  $day=$_GET['date'];
    $sel_rw = mysqli_query($link,"select * from employee where emp_id='$emp_id'");
       $row = mysqli_fetch_object($sel_rw);
    $sel = mysqli_query($link,"select * from salarydetails_tbl where employee_id='$emp_id'");
       $row1 = mysqli_fetch_object($sel);
  ?>
       <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	  <span><b>Name : </b> <?php echo $row->name; ?></span><br/>
	  <span><b>Position : </b> Employee</span><br/>
	  <span><b>Salary Date : </b> <?php echo date('M d,Y'); ?></span><br/>
	   </div>
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	   <span style="float:right;"><b>Salary Slip : </b> <?php echo $day; ?></span><br/>
	   </div>
	   </div><hr/>
	   <table id="example" class="table dt-responsive nowrap" cellspacing="0" width="100%">
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
				<td> - </td>
				<td> - </td>
				<td><?php echo $row1->salary_structure; ?></td>
				</tr>
				<?php
				$all1=mysqli_query($link,"select SUM(amount) as amt from allowance where emp_id='$emp_id' and date like '$day%'");
				$al_row1 = mysqli_fetch_object($all1);
				$all=mysqli_query($link,"select * from allowance where emp_id='$emp_id' and date like '$day%'");
				while($all_row=mysqli_fetch_object($all))
				{
				?>
				<tr>
				<td>Allowance</td>
				<td><?php echo $all_row->title; ?></td>
				<td><?php echo $all_row->type; ?></td>
				<td><?php echo $all_row->amount; ?></td>
				</tr>
				<?php
				}
				?>
				<?php
				$com1=mysqli_query($link,"select SUM(amount) as amt from commission where emp_id='$emp_id' and date like '$day%'");
				$com_row1 = mysqli_fetch_object($com1);
				
				$com=mysqli_query($link,"select * from commission where emp_id='$emp_id' and date like '$day%'");
				while($com_row=mysqli_fetch_object($com))
				{
				?>
				<tr>
				<td>Commission</td>
				<td><?php echo $com_row->title; ?></td>
				<td><?php echo $com_row->type; ?></td>
				<td><?php echo $com_row->amount; ?></td>
				</tr>
				<?php
				}
				?>
				<?php
				$other1=mysqli_query($link,"select SUM(amount) as amt from other_payment where emp_id='$emp_id' and date like '$day%'");
				$other_row1 = mysqli_fetch_object($other1);
				$other=mysqli_query($link,"select * from other_payment where emp_id='$emp_id' and date like '$day%'");
				while($other_row=mysqli_fetch_object($other))
				{
				?>
				<tr>
				<td>Other Payment</td>
				<td><?php echo $other_row->title; ?></td>
				<td><?php echo $other_row->type; ?></td>
				<td><?php echo $other_row->amount; ?></td>
				</tr>
				<?php
				}
				?>
				<?php
				$over1=mysqli_query($link,"SELECT days * hours * rate AS total_price FROM overtime where emp_id='$emp_id' and date like '$day%'");
				$over_row1 = mysqli_fetch_object($over1);
				$over=mysqli_query($link,"select * from overtime where emp_id='$emp_id' and date like '$day%'");
				while($over_row=mysqli_fetch_object($over))
				{
				?>
				<tr>
				<td>Overtime</td>
				<td><?php echo $over_row->title; ?></td>
				<td> - </td>
				<td><?php echo $over_row->rate; ?></td>
				</tr>
				<?php
				}
				?>
                <tr>
					<th>Deduction</th>
					<th>Title</th>
					<th>Type</th>
					<th>Amount</th>
                </tr>
				<?php
				$loan1=mysqli_query($link,"select SUM(amount) as amt from loan where emp_id='$emp_id' and date like '$day%'");
				$loan_row1 = mysqli_fetch_object($loan1);
				$loan=mysqli_query($link,"select * from loan where emp_id='$emp_id' and date like '$day%'");
				while($loan_row=mysqli_fetch_object($loan))
				{
				?>
				<tr>
				<td>Loan</td>
				<td><?php echo $loan_row->title; ?></td>
				<td><?php echo $loan_row->type; ?></td>
				<td><?php echo $loan_row->amount; ?></td>
				</tr>
				<?php
				}
				?>
				<?php
				$ded1=mysqli_query($link,"select SUM(amount) as amt from deduction where emp_id='$emp_id' and date like '$day%'");
				$ded_row1 = mysqli_fetch_object($ded1);
				$deduction=mysqli_query($link,"select * from deduction where emp_id='$emp_id' and date like '$day%'");
				while($de_row=mysqli_fetch_object($deduction))
				{
				?>
				<tr>
				<td>Saturation Deduction</td>
				<td><?php echo $de_row->title; ?></td>
				<td><?php echo $de_row->type; ?></td>
				<td><?php echo $de_row->amount; ?></td>
				</tr>
				<?php
				}
				?>
				<?php
				$total_earning=$al_row1->amt + $com_row1->amt + $other_row1->amt + $over_row1->total_price;
				$total_deduction=$loan_row1->amt + $ded_row1->amt;
				$net_salary=$row1->salary_structure + $total_earning - $total_deduction;
				
				?>
				<tr>
				<td></td>
				<td></td>
				<td></td>
				<td>Total Earning
				<br/>
				<?php echo $total_earning; ?>
				</td>
				</tr>
				<tr>
				<td></td>
				<td></td>
				<td></td>
				<td>Total Deduction
				<br/>
				<?php echo $total_deduction; ?>
				</td>
				</tr>
				<tr>
				<td></td>
				<td></td>
				<td></td>
				<td>Net Salary
				<br/>
				<?php echo $net_salary; ?>
				</td>
				</tr>
				</tbody>
				</table>
  </div>
  <div class="card-footer">
  <p>Employee Signature </p>
  <p>Paid by </p>
  </div>
</div>
	              		</div>
	              
    <!----header----->
  </body>
  <?php include 'assets/common/js_file.php';?> 
  
  <script type="text/javascript">
    $(document).ready(function() {
      $(".cart-expand").hide();
    });
    $(".appicon").click(function(e) {
      $(".cart-expand").toggle();
      e.stopPropagation();
    });
    $(".cart-expand").click(function(e) {
      e.stopPropagation();
    });
    $(document).click(function() {
      $(".cart-expand").hide();
    });
  </script>
 
 
</html>