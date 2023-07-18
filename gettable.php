<?php 
include('dbc.php');
$layout_id=$_GET['layout_id'];
$table = mysqli_query($link,"select * from table_tbl where layout_id='$layout_id'");
while($tablerow = mysqli_fetch_array($table)){

echo "<a onclick=\"select_table('$tablerow[table_id] / $tablerow[table_name]')\"><div class=\"btn btn-default\"><img src=\"dist/img/table.png\" alt=\"Table\" class=\"img-circle\"/><br>$tablerow[table_name]</div></a>";
}

?>