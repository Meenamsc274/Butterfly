<?php
include '../dbc.php'; 
$id = mysqli_real_escape_string($link,$_POST['id']);
$select = mysqli_query($link,"select * from transfer_tbl where autoid='$id'");
$fetch = mysqli_fetch_object($select);



$details=array(
    'autoid' => $fetch->autoid,
    'emp_id' => $fetch->employee,
    'branch' => $fetch->branch,
    
    'department' =>  $fetch->department,
    'transfer_date' => $fetch->transfer_date,
    'description' => $fetch->description
);
echo json_encode($details);
?>