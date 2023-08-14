<?php
include '../dbc.php'; 
$id = mysqli_real_escape_string($link,$_POST['id']);
$select = mysqli_query($link,"select * from branch_tbl where branch_id ='$id'");
$fetch = mysqli_fetch_object($select);

$details=array(
    'autoid' => $fetch->branch_id ,
    'branch_name' => $fetch->branch_name
);
echo json_encode($details);
?>