<?php
/* Salary update */
if($_POST['submit'] == "Save Changes"){
	$autoid = mysqli_real_escape_string($link,$_POST['autoid']);
	$emp_id = mysqli_real_escape_string($link,$_POST['emp_id']);
	$payroll_type = mysqli_real_escape_string($link,$_POST['payroll_type']);
	$salary = mysqli_real_escape_string($link,$_POST['salary']);
	mysqli_query($link,"UPDATE `salarydetails_tbl` SET  `payroll_type` = '$payroll_type', `salary_structure` = '$salary' WHERE `employee_id`='$emp_id'");
	
	$qry = mysqli_query($link,"UPDATE `payslip_tbl` SET  `payroll_type` = '$payroll_type', `salary` = '$salary' WHERE `emp_id`='$emp_id'");
	if($qry){
		$msg = "Basic salary Updated Successfully!";
	}else{
		$err = "Something went wrong... Try again later!";
	}
}
?>
<?php
/* Allowance update */
if($_POST['submit'] == "Create"){
	$autoid = mysqli_real_escape_string($link,$_POST['autoid']);
	$emp_name = mysqli_real_escape_string($link,$_POST['emp_name']);
	$emp_id = mysqli_real_escape_string($link,$_POST['emp_id']);
	$allowance_type = mysqli_real_escape_string($link,$_POST['allowance_type']);
	$title = mysqli_real_escape_string($link,$_POST['title']);
	$type = mysqli_real_escape_string($link,$_POST['type']);
	$amount = mysqli_real_escape_string($link,$_POST['amount']);
	$sql = mysqli_query($link,"select * from salarydetails_tbl where employee_id='$emp_id'");
    $q = mysqli_fetch_object($sql);
	$salary=$q->salary_structure;
	$payroll=$q->payroll_type;
	if($type=="Fixed"){
		$amt=$amount;
	}else{
		$amt=$salary*$amount/100;
	}
	if(mysqli_query($link,"INSERT INTO `allowance` ( `autoid`,`emp_id`, `emp_name`, `allowance_type`, `title`, `type`, `amount`, `ip_address`, `browser`, `date`, `created_by`, `approved_by`,`status`,`sort_order`) VALUES ( '$autoid','$emp_id', '$emp_name', '$allowance_type', '$title', '$type', '$amt', '$ip_address', '$browser', NOW(), '$created_by', '$approved_by','','')")){
		$date_check = date("Y-m");
		$check=mysqli_query($link,"select ctc,salary_slip from payslip_tbl where emp_id='$emp_id' and salary_slip='$date_check'");
		$c=mysqli_num_rows($check);
		if($c>0){
			while($c_row=mysqli_fetch_object($check)){
				if($c_row->salary_slip==$date_check){
					$amt1=$c_row->ctc  + $amt;
					mysqli_query($link,"update payslip_tbl set ctc='$amt1' where emp_id='$emp_id' and salary_slip='$date_check'");   
				}
			}
		}else{
			$max_id = maxOfAll("id","payslip_tbl");
			$max_id=$max_id+1;
			$pay_id="PAY-".$max_id;
			$pay =mysqli_query($link,"INSERT INTO `payslip_tbl` ( `autoid`, `emp_id`, `emp_name`, `payroll_type`, `salary`,`ctc`, `salary_slip`, `date`,`ip_address`, `browser`, `created_by`, `approved_by`,status`) VALUES ('$pay_id', '$emp_id', '$emp_name', '$payroll', '$salary','$amt','$date_check', NOW(), '$ip_address', '$browser', '$created_by', '$approved_by','Unpaid')");
		} 
		$msg = "Allowance Added Successfully!";
	}else{
		$err = "Something went wrong... Try again later!";
	}
}

if($_POST['submit'] == "Update"){
	$autoid = mysqli_real_escape_string($link,$_POST['autoid']);
	$emp_name = mysqli_real_escape_string($link,$_POST['emp_name']);
	$emp_id = mysqli_real_escape_string($link,$_POST['emp_id']);
	$allowance_type = mysqli_real_escape_string($link,$_POST['allowance_type']);
	$title = mysqli_real_escape_string($link,$_POST['title']);
	$type = mysqli_real_escape_string($link,$_POST['type']);
	$amount = mysqli_real_escape_string($link,$_POST['amount']);
	if($type=="Fixed"){
		$amt=$amount;
	}else{
		$sql = mysqli_query($link,"select * from salarydetails_tbl where employee_id='$emp_id'");
		$q = mysqli_fetch_object($sql);
		$salary=$q->salary_structure;
		$amt=$salary*($amount / 100);
	}
	$qry = mysqli_query($link,"UPDATE  `allowance` SET  `allowance_type`='$allowance_type', `title`='$title', `type`='$type', `amount`='$amt' WHERE autoid='$autoid'");
	if($qry){
		$msg = "Allowance Updated Successfully!";
	}else{
		$err = "Something went wrong... Try again later!";
	}
}
?>

<?php
/*  Commission Update*/
if($_POST['submit2'] == "Create"){
	$autoid = mysqli_real_escape_string($link,$_POST['autoid']);
	$emp_name = mysqli_real_escape_string($link,$_POST['emp_name']);
	$emp_id = mysqli_real_escape_string($link,$_POST['emp_id']);
	$title = mysqli_real_escape_string($link,$_POST['title']);
	$type = mysqli_real_escape_string($link,$_POST['type']);
	$amount = mysqli_real_escape_string($link,$_POST['amount']);
	$sql = mysqli_query($link,"select * from salarydetails_tbl where employee_id='$emp_id'");
    $q = mysqli_fetch_object($sql);
	$salary=$q->salary_structure;
	if($type=="Fixed"){
		$amt=$amount;
	}else{
		$amt1=$salary*($amount / 100);
		$amt= $amount ;
	}
	if(mysqli_query($link,"INSERT INTO `commission` ( `autoid`,`emp_id`, `emp_name`, `title`, `type`, `amount`, `ip_address`, `browser`, `date`, `created_by`, `approved_by`,`status`,`sort_order`) VALUES ( '$autoid','$emp_id', '$emp_name',  '$title', '$type', '$amt', '$ip_address', '$browser', NOW(), '$created_by', '$approved_by','','')")){
		$date_check = date("Y-m");
		$check=mysqli_query($link,"select ctc,salary_slip from payslip_tbl where emp_id='$emp_id' and salary_slip='$date_check'");
		$c=mysqli_num_rows($check);
		if($c>0){
			while($c_row=mysqli_fetch_object($check)){
				if($c_row->salary_slip==$date_check ){
	 				$amt1=$c_row->ctc  + $amt;
	   				mysqli_query($link,"update payslip_tbl set ctc='$amt1' where emp_id='$emp_id' and salary_slip='$date_check'");   
   				}
			}
		}else{
			$max_id = maxOfAll("id","payslip_tbl");
			$max_id=$max_id+1;
			$pay_id="PAY-".$max_id;
			$pay =mysqli_query($link,"INSERT INTO `payslip_tbl` ( `autoid`, `emp_id`, `emp_name`, `payroll_type`, `salary`,`ctc`, `salary_slip`, `date`,`ip_address`, `browser`, `created_by`, `approved_by`,status`) VALUES ('$pay_id', '$emp_id', '$emp_name', '$payroll', '$salary','$amt','$date_check', NOW(), '$ip_address', '$browser', '$created_by', '$approved_by','Unpaid')");
			$msg = "Commission Added Successfully!";
		}
	}else{
		$err = "Something went wrong... Try again later!";
				
	}
}

if($_POST['submit2'] == "Update"){
	$emp_name = mysqli_real_escape_string($link,$_POST['emp_name']);
	$autoid = mysqli_real_escape_string($link,$_POST['autoid']);
	$emp_id = mysqli_real_escape_string($link,$_POST['emp_id']);
	$title = mysqli_real_escape_string($link,$_POST['title']);
	$type = mysqli_real_escape_string($link,$_POST['type']);
	$amount = mysqli_real_escape_string($link,$_POST['amount']);
	if($type=="Fixed"){
		$amt=$amount;
	}else{
		$sql = mysqli_query($link,"select * from salarydetails_tbl where employee_id='$emp_id'");
		$q = mysqli_fetch_object($sql);
		$salary=$q->salary_structure;
		$amt1=$salary*($amount / 100);
		$amt= $amount ;
	}
	$qry = mysqli_query($link,"UPDATE  `commission` SET   `title`='$title', `type`='$type', `amount`='$amt' WHERE autoid='$autoid'");

	if($qry){
		$msg = "Commission Updated Successfully!";
	}else{
		$err = "Something went wrong... Try again later!";
	}
}
?>
<?php
/* Loan Update */
if($_POST['submit1'] == "Create"){
	$autoid = mysqli_real_escape_string($link,$_POST['autoid']);
	$emp_name = mysqli_real_escape_string($link,$_POST['emp_name']);
	$emp_id = mysqli_real_escape_string($link,$_POST['emp_id']);
	$loan_option = mysqli_real_escape_string($link,$_POST['loan_option']);
	$title = mysqli_real_escape_string($link,$_POST['title']);
	$type = mysqli_real_escape_string($link,$_POST['type']);
	$amount = mysqli_real_escape_string($link,$_POST['amount']);
	$reason = mysqli_real_escape_string($link,$_POST['reason']);
	$sql = mysqli_query($link,"select * from salarydetails_tbl where employee_id='$emp_id'");
    $q = mysqli_fetch_object($sql);
	$salary=$q->salary_structure;
	if($type=="Fixed"){
		$amt=$amount;
	}else{
	$amt=$salary*($amount / 100);
	}
	if(mysqli_query($link,"INSERT INTO `loan` ( `autoid`,`emp_id`, `emp_name`, `title`, `type`, `amount`, `loan_option`, `reason`, `ip_address`, `browser`, `date`, `created_by`, `approved_by`,`status`,`sort_order`) VALUES ( '$autoid','$emp_id', '$emp_name',  '$title', '$type', '$amt', '$loan_option', '$reason', '$ip_address', '$browser', NOW(), '$created_by', '$approved_by','','')")){
		$date_check = date("Y-m");
		$check=mysqli_query($link,"select ctc,salary_slip from payslip_tbl where emp_id='$emp_id' and salary_slip='$date_check'");
		$c=mysqli_num_rows($check);
		if($c>0){
			while($c_row=mysqli_fetch_object($check)){
				if($c_row->salary_slip==$date_check ){
	 				$amt1=$c_row->ctc  - $amt;
	   				mysqli_query($link,"update payslip_tbl set ctc='$amt1' where emp_id='$emp_id' and salary_slip='$date_check'");   
   				}
			}
		}else{
			$max_id = maxOfAll("id","payslip_tbl");
  			$max_id=$max_id+1;
  			$pay_id="PAY-".$max_id;
 			$pay =mysqli_query($link,"INSERT INTO `payslip_tbl` ( `autoid`, `emp_id`, `emp_name`, `payroll_type`, `salary`,`ctc`, `salary_slip`, `date`,`ip_address`, `browser`, `created_by`, `approved_by`,status`) VALUES ('$pay_id', '$emp_id', '$emp_name', '$payroll', '$salary','$amt','$date_check', NOW(), '$ip_address', '$browser', '$created_by', '$approved_by','Unpaid')");
			$msg = "Loan Added Successfully!";
		}
	}else{
		$err = "Something went wrong... Try again later!";
	}
}

if($_POST['submit1'] == "Update"){
	$autoid = mysqli_real_escape_string($link,$_POST['autoid']);
	$emp_name = mysqli_real_escape_string($link,$_POST['emp_name']);
	$emp_id = mysqli_real_escape_string($link,$_POST['emp_id']);
	$loan_option = mysqli_real_escape_string($link,$_POST['loan_option']);
	$title = mysqli_real_escape_string($link,$_POST['title']);
	$type = mysqli_real_escape_string($link,$_POST['type']);
	$amount = mysqli_real_escape_string($link,$_POST['amount']);
	$reason = mysqli_real_escape_string($link,$_POST['reason']);
	$sql = mysqli_query($link,"select * from salarydetails_tbl where employee_id='$emp_id'");
    $q = mysqli_fetch_object($sql);
	$salary=$q->salary_structure;
	if($type=="Fixed"){
		$amt=$amount;
	}else{
		$amt1=$salary*($amount / 100);
		$amt= $amount ;
	}
	$qry = mysqli_query($link,"UPDATE  `loan` SET   `title`='$title', `type`='$type', `amount`='$amt', `loan_option`='$loan_option', `reason`='$reason' WHERE autoid='$autoid'");
	if($qry){
		$msg = "Loan Updated Successfully!";
	}else{
		$err = "Something went wrong... Try again later!";
	}
}
?>
<?php
/* Saturation Deduction */
if($_POST['deduct'] == "Create"){
	$autoid = mysqli_real_escape_string($link,$_POST['autoid']);
	$emp_name = mysqli_real_escape_string($link,$_POST['emp_name']);
	$emp_id = mysqli_real_escape_string($link,$_POST['emp_id']);
	$deduction_option = mysqli_real_escape_string($link,$_POST['deduction_option']);
	$title = mysqli_real_escape_string($link,$_POST['title']);
	$type = mysqli_real_escape_string($link,$_POST['type']);
	$amount = mysqli_real_escape_string($link,$_POST['amount']);

	$sql = mysqli_query($link,"select * from salarydetails_tbl where employee_id='$emp_id'");
    $q = mysqli_fetch_object($sql);
	$salary=$q->salary_structure;
	if($type=="Fixed"){
		$amt=$amount;
	}else{
		$amt=$salary*($amount / 100);
	}
	if(mysqli_query($link,"INSERT INTO `deduction` ( `autoid`,`emp_id`, `emp_name`, `title`, `type`, `amount`, `deduction_option`, `ip_address`, `browser`, `date`, `created_by`, `approved_by`,`status`,`sort_order`) VALUES ( '$autoid','$emp_id', '$emp_name',  '$title', '$type', '$amt', '$deduction_option', '$ip_address', '$browser', NOW(), '$created_by', '$approved_by','','')")){
		$date_check = date("Y-m");
		$check=mysqli_query($link,"select ctc,salary_slip from payslip_tbl where emp_id='$emp_id' and salary_slip='$date_check'");
		$c=mysqli_num_rows($check);
 		if($c>0){
			while($c_row=mysqli_fetch_object($check)){
				if($c_row->salary_slip==$date_check ){
	 				$amt1=$c_row->ctc  - $amt;
	   				mysqli_query($link,"update payslip_tbl set ctc='$amt1' where emp_id='$emp_id' and salary_slip='$date_check'");   
   				}
			}
		}else{
			$max_id = maxOfAll("id","payslip_tbl");
  			$max_id=$max_id+1;
  			$pay_id="PAY-".$max_id;
 			$pay =mysqli_query($link,"INSERT INTO `payslip_tbl` ( `autoid`, `emp_id`, `emp_name`, `payroll_type`, `salary`,`ctc`, `salary_slip`, `date`,`ip_address`, `browser`, `created_by`, `approved_by`,status`) VALUES ('$pay_id', '$emp_id', '$emp_name', '$payroll', '$salary','$amt','$date_check', NOW(), '$ip_address', '$browser', '$created_by', '$approved_by','Unpaid')");
			$msg = "Deduction Added Successfully!";
		}
	}else{
		$err = "Something went wrong... Try again later!";
	}
}

if($_POST['deduct'] == "Update"){
	$autoid = mysqli_real_escape_string($link,$_POST['autoid']);
	$emp_name = mysqli_real_escape_string($link,$_POST['emp_name']);
	$emp_id = mysqli_real_escape_string($link,$_POST['emp_id']);
	$deduction_option = mysqli_real_escape_string($link,$_POST['deduction_option']);
	$title = mysqli_real_escape_string($link,$_POST['title']);
	$type = mysqli_real_escape_string($link,$_POST['type']);
	$amount = mysqli_real_escape_string($link,$_POST['amount']);
	if($type=="Fixed"){
		$amt=$amount;
	}else{
		$sql = mysqli_query($link,"select * from salarydetails_tbl where employee_id='$emp_id'");
		$q = mysqli_fetch_object($sql);
		$salary=$q->salary_structure;
		$amt=$salary*($amount / 100);
	}
	$qry = mysqli_query($link,"UPDATE  `deduction` SET   `title`='$title', `type`='$type', `amount`='$amt', `deduction_option`='$deduction_option' WHERE autoid='$autoid'");
	if($qry){
		$msg = "Deduction Updated Successfully!";
	}else{
		$err = "Something went wrong... Try again later!";
	}
}
?>
<?php
/* Other Payment */
if($_POST['other'] == "Create"){
	$autoid = mysqli_real_escape_string($link,$_POST['autoid']);
	$emp_name = mysqli_real_escape_string($link,$_POST['emp_name']);
	$emp_id = mysqli_real_escape_string($link,$_POST['emp_id']);
	$title = mysqli_real_escape_string($link,$_POST['title']);
	$type = mysqli_real_escape_string($link,$_POST['type']);
	$amount = mysqli_real_escape_string($link,$_POST['amount']);
	$sql = mysqli_query($link,"select * from salarydetails_tbl where employee_id='$emp_id'");
    $q = mysqli_fetch_object($sql);
	$salary=$q->salary_structure;
	if($type=="Fixed"){
		$amt=$amount;
	}else{
		$amt=$salary*($amount / 100);
	}
	if(mysqli_query($link,"INSERT INTO `other_payment` ( `autoid`,`emp_id`, `emp_name`, `title`, `type`, `amount`, `ip_address`, `browser`, `date`, `created_by`, `approved_by`,`status`,`sort_order`) VALUES ( '$autoid','$emp_id', '$emp_name',  '$title', '$type', '$amt', '$ip_address', '$browser', NOW(), '$created_by', '$approved_by','','')")){
		$date_check = date("Y-m");
		$check=mysqli_query($link,"select ctc,salary_slip from payslip_tbl where emp_id='$emp_id' and salary_slip='$date_check'");
		$c=mysqli_num_rows($check);
		if($c>0){
			while($c_row=mysqli_fetch_object($check)){
				if($c_row->salary_slip==$date_check ){
	 				$amt1=$c_row->ctc  + $amt;
	   				mysqli_query($link,"update payslip_tbl set ctc='$amt1' where emp_id='$emp_id' and salary_slip='$date_check'");   
   				}
			}
		}else{
			$max_id = maxOfAll("id","payslip_tbl");
			$max_id=$max_id+1;
			$pay_id="PAY-".$max_id;
			$pay =mysqli_query($link,"INSERT INTO `payslip_tbl` ( `autoid`, `emp_id`, `emp_name`, `payroll_type`, `salary`,`ctc`, `salary_slip`, `date`,`ip_address`, `browser`, `created_by`, `approved_by`,status`) VALUES ('$pay_id', '$emp_id', '$emp_name', '$payroll', '$salary','$amt','$date_check', NOW(), '$ip_address', '$browser', '$created_by', '$approved_by','Unpaid')");
		
			$msg = "Other Payment Added Successfully!";
		}
	}else{
		$err = "Something went wrong... Try again later!";
	}
}
if($_POST['other'] == "Update"){
	$autoid = mysqli_real_escape_string($link,$_POST['autoid']);
	$emp_name = mysqli_real_escape_string($link,$_POST['emp_name']);
	$emp_id = mysqli_real_escape_string($link,$_POST['emp_id']);
	$title = mysqli_real_escape_string($link,$_POST['title']);
	$type = mysqli_real_escape_string($link,$_POST['type']);
	$amount = mysqli_real_escape_string($link,$_POST['amount']);
	if($type=="Fixed"){
		$amt=$amount;
	}else{
		$sql = mysqli_query($link,"select * from salarydetails_tbl where employee_id='$emp_id'");
		$q = mysqli_fetch_object($sql);
		$salary=$q->salary_structure;
		$amt=$salary*($amount / 100);
	}
	$qry = mysqli_query($link,"UPDATE  `other_payment` SET   `title`='$title', `type`='$type', `amount`='$amt' WHERE autoid='$autoid'");
	if($qry){
		$msg = "Other Payment Updated Successfully!";
	}else{
		$err = "Something went wrong... Try again later!";
	}
}
?>
<?php
/* Overtime */
if($_POST['over'] == "Create"){
	$autoid = mysqli_real_escape_string($link,$_POST['autoid']);
	$emp_name = mysqli_real_escape_string($link,$_POST['emp_name']);
	$emp_id = mysqli_real_escape_string($link,$_POST['emp_id']);
	$title = mysqli_real_escape_string($link,$_POST['title']);
	$days = mysqli_real_escape_string($link,$_POST['days']);
	$hours = mysqli_real_escape_string($link,$_POST['hours']);
	$rate = mysqli_real_escape_string($link,$_POST['rate']);
	$sql = mysqli_query($link,"select * from salarydetails_tbl where employee_id='$emp_id'");
    $q = mysqli_fetch_object($sql);
	$salary=$q->salary_structure;
	if(mysqli_query($link,"INSERT INTO `overtime` ( `autoid`,`emp_id`, `emp_name`, `title`, `days`, `hours`, `rate`, `ip_address`, `browser`, `date`, `created_by`, `approved_by`,`status`,`sort_order`) VALUES ( '$autoid', '$emp_id', '$emp_name',  '$title', '$days', '$hours', '$rate', '$ip_address', '$browser', NOW(), '$created_by', '$approved_by','','')")){
		$date_check = date("Y-m");
		$check=mysqli_query($link,"select ctc,salary_slip from payslip_tbl where emp_id='$emp_id' and salary_slip='$date_check'");
		$c=mysqli_num_rows($check);

 		if($c>0){
			while($c_row=mysqli_fetch_object($check)){
				if($c_row->salary_slip==$date_check ){
					$amt1=$c_row->ctc  + $rate;
					mysqli_query($link,"update payslip_tbl set ctc='$amt1' where emp_id='$emp_id' and salary_slip='$date_check'");   
				}
			}
		}else{
			$max_id = maxOfAll("id","payslip_tbl");
  			$max_id=$max_id+1;
  			$pay_id="PAY-".$max_id;
 			$pay =mysqli_query($link,"INSERT INTO `payslip_tbl` ( `autoid`, `emp_id`, `emp_name`, `payroll_type`, `salary`,`ctc`, `salary_slip`, `date`,`ip_address`, `browser`, `created_by`, `approved_by`,status`) VALUES ('$pay_id', '$emp_id', '$emp_name', '$payroll', '$salary','$amt','$date_check', NOW(), '$ip_address', '$browser', '$created_by', '$approved_by','Unpaid')");
		}
		$msg = "Overtime Added Successfully!";
	}else{
		$err = "Something went wrong... Try again later!";
	}
}

if($_POST['over'] == "Update"){
	$autoid = mysqli_real_escape_string($link,$_POST['autoid']);
	$emp_name = mysqli_real_escape_string($link,$_POST['emp_name']);
	$emp_id = mysqli_real_escape_string($link,$_POST['emp_id']);
	$title = mysqli_real_escape_string($link,$_POST['title']);
	$days = mysqli_real_escape_string($link,$_POST['days']);
	$hours = mysqli_real_escape_string($link,$_POST['hours']);
	$rate = mysqli_real_escape_string($link,$_POST['rate']);
	$qry = mysqli_query($link,"UPDATE  `overtime` SET   `title`='$title', `days`='$days', `hours`='$hours', `rate`='$rate' WHERE autoid='$autoid'");
	if($qry){
		$msg = "Overtime Updated Successfully!";
	}else{
		$err = "Something went wrong... Try again later!";
	}
}
?>