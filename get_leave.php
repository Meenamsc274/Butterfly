<?php
include 'dbc.php'; 
$id = mysqli_real_escape_string($link,$_POST['id']);
$select = mysqli_query($link,"select * from leave_tbl where autoid='$id'");
$fetch = mysqli_fetch_object($select);

$emp_id = $fetch->employee;
list($emp_name) = mysqli_fetch_row(mysqli_query($link,"select name from employee where emp_id = '$emp_id'"));

if($fetch->status == 0){ $status = "Pending"; }
if($fetch->status == 1){ $status = "Approved"; }
if($fetch->status == 2){ $status = "Reject"; }

$details=array(
    'emp_name' => $emp_name,
    'emp_id' => $fetch->employee,
    'leave_type' => $fetch->leave_type,
    'autoid' => $fetch->autoid,
    'date' => date('M d, Y',strtotime($fetch->date)),
    'start_date' => date('M d, Y',strtotime($fetch->start_date)),
    'end_date' => date('M d, Y',strtotime($fetch->end_date)),
    'start_date1' => $fetch->start_date,
    'end_date1' => $fetch->end_date,
    'leave_reason' => $fetch->leave_reason,
    'remark' => $fetch->remark,
    'status_text' => $status,
    'status' => $fetch->status
);
echo json_encode($details);
?>