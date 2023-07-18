<?php 
include('dbc.php');
$q = mysqli_real_escape_string($link,strtolower($_GET["q"]));
if (!$q) return;
$db->query("SELECT `ingredient_id`,`ingredient_name` FROM ingredient_tbl where ingredient_name like '%$q%'");
  while ($line = $db->fetchNextObject()) {
		echo "$line->ingredient_id,$line->ingredient_name\n";
  }
?>