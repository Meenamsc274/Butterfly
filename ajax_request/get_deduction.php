<?php
include '../dbc.php'; 

if(isset($_POST['id'])){
    $id = mysqli_real_escape_string($link,$_POST['id']);
    $select = mysqli_query($link,"select * from deduction where autoid='$id'");
    $fetch = mysqli_fetch_object($select);

    $details=array(
        'autoid' => $fetch->autoid,
        'deduction_option' => $fetch->deduction_option,
        
        'title' => $fetch->title,
        'type' => $fetch->type,
        'amount' => $fetch->amount,
        'reason' => $fetch->reason,
    );
    echo json_encode($details);
}

?>