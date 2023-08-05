<?php
include '../dbc.php'; 
$id = mysqli_real_escape_string($link,$_POST['id']);
$select = mysqli_query($link,"select * from resignation_tbl where autoid='$id'");
$fetch = mysqli_fetch_object($select);



$details=array(
    'autoid' => $fetch->autoid,
    'emp_id' => $fetch->employee,
    'resignation_date' => $fetch->resignation_date,
    'last_working_date' =>  $fetch->last_working_date,
    'reason' => $fetch->reason
);
echo json_encode($details);
?>