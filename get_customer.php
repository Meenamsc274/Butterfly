<?php 
include('dbc.php');
$q = mysqli_real_escape_string($link,strtolower($_GET["q"]));
if (!$q) return;
$db->query("SELECT `customer_name` FROM customer_tbl where customer_name like '%$q%'");
  while ($line = $db->fetchNextObject()) {
		echo "$line->customer_name\n";
  }
?>