<?php
include '../dbc.php'; 
$id = mysqli_real_escape_string($link,$_POST['id']);
$select = mysqli_query($link,"select * from promotion_tbl where autoid='$id'");
$fetch = mysqli_fetch_object($select);

$details=array(
    'autoid' => $fetch->autoid,
    'emp_id' => $fetch->employee,
    'designation' => $fetch->designation,
    'promotion_title' =>  $fetch->promotion_title,
    'promotion_date' =>  $fetch->promotion_date,
    'description' =>  $fetch->description
);
echo json_encode($details);
?>