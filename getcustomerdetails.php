<?php
include "dbc.php";
$line = $db->queryUniqueObject("SELECT * FROM `customer_tbl` WHERE mobile_number='".$_POST['mobile_number']."'");
if($line!=NULL)
{
$customer_name = $line->customer_name;

$arr = array ("customer_name"=>"$customer_name");
echo json_encode($arr);
}
else
echo "no";
?>