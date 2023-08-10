<?php
include '../dbc.php'; 
$id = mysqli_real_escape_string($link,$_POST['id']);
$select = mysqli_query($link,"select * from document_tbl where autoid='$id'");
$fetch = mysqli_fetch_object($select);

$details=array(
    'autoid' => $fetch->autoid,
    'name' => $fetch->name,
    'role' => $fetch->role,
    'file' =>  $fetch->file,
    'description' => $fetch->description
);
echo json_encode($details);
?>