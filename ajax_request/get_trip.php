<?php
include '../dbc.php'; 
$id = mysqli_real_escape_string($link,$_POST['id']);
$select = mysqli_query($link,"select * from trip_tbl where autoid='$id'");
$fetch = mysqli_fetch_object($select);



$details=array(
    'autoid' => $fetch->autoid,
    'emp_id' => $fetch->employee,
    'start_date' => $fetch->start_date,
    'end_date' =>  $fetch->end_date,
    'purpose_of_trip' =>  $fetch->purpose_of_trip,
    'country' =>  $fetch->country,
    'reason' => $fetch->reason
);
echo json_encode($details);
?>