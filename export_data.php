<?php
include_once("dbc.php");
//$day="2023-08";
$day=$_GET['day'];
$sql_query="SELECT emp_id as EmpId,emp_name as Name,salary as Salary,ctc as NetSalary , status as Status,payroll_type as PayrollType FROM payslip_tbl WHERE salary_slip like '$day%'";
$resultset = mysqli_query($link, $sql_query) or die("database error:". mysqli_error($link));
$developer_records = array();
while( $rows = mysqli_fetch_assoc($resultset) ) {
	$developer_records[] = $rows;
}	
if(isset($_POST["export_data"])) {	
	$filename = "payslip_".date('Ymd-s') . ".xls";			
	header("Content-Type: application/vnd.ms-excel");
	header("Content-Disposition: attachment; filename=\"$filename\"");	
	$show_coloumn = false;
	if(!empty($developer_records)) {
	  foreach($developer_records as $record) {
		if(!$show_coloumn) {
		  // display field/column names in first row
		  //echo implode("\t", array_keys($record)) . "\n";
		  $head =implode("\t", array_keys($record)) . "\n";
		  echo ucfirst($head);
		  
		  $show_coloumn = true;
		}
		echo implode("\t", array_values($record)) . "\n";
	  }
	}
	exit;  
}
?>