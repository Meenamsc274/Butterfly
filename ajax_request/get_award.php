<?php
include '../dbc.php'; 
$id = mysqli_real_escape_string($link,$_POST['id']);
$select = mysqli_query($link,"select * from award_tbl where autoid='$id'");
$fetch = mysqli_fetch_object($select);



$details=array(
    
    'emp_id' => $fetch->employee,
    'award_type' => $fetch->award_type,
    'autoid' => $fetch->autoid,
    'date' =>  $fetch->date,
    'gift' => $fetch->gift,
    'description' => $fetch->description
);
echo json_encode($details);
?>