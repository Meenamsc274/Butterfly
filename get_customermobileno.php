<?php 
include('dbc.php');
$q = mysqli_real_escape_string($link,strtolower($_GET["q"]));
if (!$q) return;
$sel = mysqli_query($link,"SELECT `mobile_number` FROM customer_tbl where mobile_number like '%$q%'");
  while ($line = mysqli_fetch_object($sel)) { 
		echo "$line->mobile_number\n";
  }
?>