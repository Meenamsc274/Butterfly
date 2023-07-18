<?php 
include('dbc.php');
$category_id=$_GET['category_id'];
$subcategory = mysqli_query($link,"select * from subcategory_tbl where category_id='$category_id'");
while($subcategoryrow = mysqli_fetch_array($subcategory)){
echo "<a onclick=\"select_subcategory('$subcategoryrow[subcategory_id] / $subcategoryrow[subcategory_name]')\"><div class=\"btn btn-default\"><img src=\"$subcategoryrow[subcategory_img]\" alt=\"$subcategoryrow[subcategory_name]\" class=\"img-circle\"/><br>$subcategoryrow[subcategory_name]</div></a>";
}
?>