<?php
include 'dbc.php'; 
$id = mysqli_real_escape_string($link,$_POST['id']);
$select = mysqli_query($link,"select * from attendance_tbl where autoid='$id'");
$fetch = mysqli_fetch_object($select);

$details=array(
    'emp_id' => $fetch->e_id,
    'out_time' => $fetch->out_time,
    'in_time' => $fetch->in_time,
    'autoid' => $fetch->autoid,
    'date' => $fetch->date
);
echo json_encode($details);
?>