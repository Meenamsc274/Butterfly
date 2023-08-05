<?php
include '../dbc.php'; 
$id = mysqli_real_escape_string($link,$_POST['id']);
$select = mysqli_query($link,"select * from termination_tbl where autoid='$id'");
$fetch = mysqli_fetch_object($select);

$details=array(
    'autoid' => $fetch->autoid,
    'employee' => $fetch->employee,
    'termination_type' => $fetch->termination_type,
    'notice_date' =>  $fetch->notice_date,
    'termination_date' =>  $fetch->termination_date,
    'description' =>  $fetch->description
);
echo json_encode($details);
?>