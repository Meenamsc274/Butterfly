<?php
include '../dbc.php'; 

if(isset($_POST['id'])){
    $id = mysqli_real_escape_string($link,$_POST['id']);
    $select = mysqli_query($link,"select * from competencies_tbl where autoid='$id'");
    $fetch = mysqli_fetch_object($select);

    $details=array(
        'autoid' => $fetch->autoid ,
        'name' => $fetch->name,
        'type' => $fetch->type
    );
    echo json_encode($details);
}

?>