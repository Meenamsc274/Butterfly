<?php
include '../dbc.php'; 
$id = mysqli_real_escape_string($link,$_POST['id']);
$select = mysqli_query($link,"select * from announcement_tbl where autoid='$id'");
$fetch = mysqli_fetch_object($select);

$details=array(
    'autoid' => $fetch->autoid,
    'title' => $fetch->title,
    'branch' => $fetch->branch,
    'department' => $fetch->department,
    'employee' =>  $fetch->employee,
    'start_date' => $fetch->start_date,
    'end_date' => $fetch->end_date,
    'description' => $fetch->description
);
echo json_encode($details);
?>