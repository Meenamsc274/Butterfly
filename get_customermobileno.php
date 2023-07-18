<?php 
include('dbc.php');
$q = mysqli_real_escape_string($link,strtolower($_GET["q"]));
if (!$q) return;
$db->query("SELECT `mobile_number` FROM customer_tbl where mobile_number like '%$q%'");
  while ($line = $db->fetchNextObject()) {
		echo "$line->mobile_number\n";
  }
?>