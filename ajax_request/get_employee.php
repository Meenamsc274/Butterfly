<?php
include '../dbc.php'; 
$dept_id = mysqli_real_escape_string($link,$_POST['dept_id']);
$select = mysqli_query($link,"select * from employee where department ='$dept_id'");

$msg = '<option value=""> Select Employee</option>';
while($fetch = mysqli_fetch_object($select)){
    $msg .= '<option value="'.$fetch->emp_id .'">'.$fetch->name.'</option>';
}
echo $msg;
?>