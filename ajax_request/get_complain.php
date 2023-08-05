<?php
include '../dbc.php'; 
$id = mysqli_real_escape_string($link,$_POST['id']);
$select = mysqli_query($link,"select * from complain_tbl where autoid='$id'");
$fetch = mysqli_fetch_object($select);

$details=array(
    'autoid' => $fetch->autoid,
    'complaint_from' => $fetch->complaint_from,
    'complaint_against' => $fetch->complaint_against,
    'title' =>  $fetch->title,
    'complaint_date' =>  $fetch->complaint_date,
    'description' =>  $fetch->description
);
echo json_encode($details);
?>