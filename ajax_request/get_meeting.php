<?php
include '../dbc.php'; 
$id = mysqli_real_escape_string($link,$_POST['id']);
$select = mysqli_query($link,"select * from meeting_tbl where autoid='$id'");
$fetch = mysqli_fetch_object($select);

$details=array(
    'autoid' => $fetch->autoid,
    'title' => $fetch->title,
    'branch' => $fetch->branch,
    'department' => $fetch->department,
    'employee' =>  $fetch->employee,
    'date' => $fetch->date,
    'time' => $fetch->time,
    'description' => $fetch->description
);
echo json_encode($details);
?>