<?php
include '../dbc.php'; 


if(isset($_POST['id'])){
    $id = mysqli_real_escape_string($link,$_POST['id']);
    $select = mysqli_query($link,"select * from designation_tbl where designation_id='$id'");
    $fetch = mysqli_fetch_object($select);

    $details=array(
        'autoid' => $fetch->designation_id ,
        'designation_name' => $fetch->designation_name,
        'dept' => $fetch->department_id
    );
    echo json_encode($details);
}

?>