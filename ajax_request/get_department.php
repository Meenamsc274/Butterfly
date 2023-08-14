<?php
include '../dbc.php'; 
if(isset($_POST['branch_id'])){
$branch_id = mysqli_real_escape_string($link,$_POST['branch_id']);
$select = mysqli_query($link,"select * from department_tbl where branch ='$branch_id'");

$msg = '<option value=""> Select Department</option>';
while($fetch = mysqli_fetch_object($select)){
    $msg .= '<option value="'.$fetch->department_id.'">'.$fetch->department_name.'</option>';
}
echo $msg;
}

if(isset($_POST['id'])){
    $id = mysqli_real_escape_string($link,$_POST['id']);
    $select = mysqli_query($link,"select * from department_tbl where department_id='$id'");
    $fetch = mysqli_fetch_object($select);

    $details=array(
        'autoid' => $fetch->department_id,
        'name' => $fetch->department_name,
        'branch' => $fetch->branch
    );
    echo json_encode($details);
}

?>