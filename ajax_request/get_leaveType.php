<?php
include '../dbc.php'; 


if(isset($_POST['id'])){
    $id = mysqli_real_escape_string($link,$_POST['id']);
    $select = mysqli_query($link,"select * from leave_type_tbl where autoid='$id'");
    $fetch = mysqli_fetch_object($select);

    $details=array(
        'autoid' => $fetch->autoid ,
        'leave_type' => $fetch->leave_type,
        'days' => $fetch->days
    );
    echo json_encode($details);
}

?>