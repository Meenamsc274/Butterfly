<?php
include '../dbc.php'; 
$id = mysqli_real_escape_string($link,$_POST['id']);
$select = mysqli_query($link,"select * from emp_asset_tbl where autoid='$id'");
$fetch = mysqli_fetch_object($select);

$details=array(
    'autoid' => $fetch->autoid,
    'employee' => $fetch->employee,
    'name' => $fetch->name,
    'amount' => $fetch->amount,
    'purchase_date' =>  $fetch->purchase_date,
    'supported_date' => $fetch->supported_date,
    'description' => $fetch->description
);
echo json_encode($details);
?>