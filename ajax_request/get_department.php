<?php
include '../dbc.php'; 
$branch_id = mysqli_real_escape_string($link,$_POST['branch_id']);
$select = mysqli_query($link,"select * from department_tbl where branch ='$branch_id'");

$msg = '<option value=""> Select Department</option>';
while($fetch = mysqli_fetch_object($select)){
    $msg .= '<option value="'.$fetch->department_id.'">'.$fetch->department_name.'</option>';
}
echo $msg;
?>