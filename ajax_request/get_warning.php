<?php
include '../dbc.php'; 
$id = mysqli_real_escape_string($link,$_POST['id']);
$select = mysqli_query($link,"select * from warning_tbl where autoid='$id'");
$fetch = mysqli_fetch_object($select);

$details=array(
    'autoid' => $fetch->autoid,
    'warning_by' => $fetch->warning_by,
    'warning_to' => $fetch->warning_to,
    'subject' =>  $fetch->subject,
    'warning_date' =>  $fetch->warning_date,
    'description' =>  $fetch->description
);
echo json_encode($details);
?>