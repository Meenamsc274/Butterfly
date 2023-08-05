<?php
include '../dbc.php'; 
$id = mysqli_real_escape_string($link,$_POST['id']);
$select = mysqli_query($link,"select * from holiday_tbl where autoid='$id'");
$fetch = mysqli_fetch_object($select);

$details=array(
    'autoid' => $fetch->autoid,
    'occasion' => $fetch->occasion,
    'start_date' => $fetch->start_date,
    'end_date' => $fetch->end_date
    
);
echo json_encode($details);
?>