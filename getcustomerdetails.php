<?php
include "dbc.php";

$line = mysqli_fetch_object(mysqli_query($link,"SELECT * FROM `customer_tbl` WHERE mobile_number='".$_POST['mobile_number']."' limit 1"));
if($line!=NULL)
{
$customer_name = $line->customer_name;

$arr = array ("customer_name"=>"$customer_name");
echo json_encode($arr);
}
else
echo "no";
?>