<?php 
include('dbc.php');
$category = mysqli_query($link,"select * from category_tbl");
while($categoryrow = mysqli_fetch_array($category)){
echo "<a onclick=\"select_category('$categoryrow[category_id] / $categoryrow[category_name]')\"><div class=\"btn btn-default\"><img src=\"$categoryrow[category_img]\" alt=\"$categoryrow[category_name]\" class=\"img-circle\"/><br>$categoryrow[category_name]</div></a>";
}
?>