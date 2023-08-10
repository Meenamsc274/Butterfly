<?php
include '../dbc.php'; 
$id = mysqli_real_escape_string($link,$_POST['id']);
$select = mysqli_query($link,"select * from event_tbl where autoid='$id'");
$fetch = mysqli_fetch_object($select);



$details=array(
    
    'autoid' => $fetch->autoid,
    'branch' => $fetch->branch,
    'department' => $fetch->department,
    'employee' =>  $fetch->employee,
    'title' => $fetch->title,
    'start_date' => $fetch->start_date,
    'end_date' => $fetch->end_date,
    'color' => $fetch->color,
    'description' => $fetch->description
);
echo json_encode($details);
?>