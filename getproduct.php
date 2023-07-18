<?php 
include('dbc.php');
$subcategory_id=$_GET['subcategory_id'];
$subcategory_name=$_GET['subcategory_name'];
$product = mysqli_query($link,"select * from product_tbl where sub_category='$subcategory_name'");
while($productrow = mysqli_fetch_array($product)){
$product_id = $productrow['product_id'];
list($selling_price) = mysqli_fetch_row(mysqli_query($link,"select `selling_price` from stock_tbl where product_id='$product_id'"));
echo "<div class=\"btn btn-default product_item\" onclick=\"addtoorder('$productrow[product_id]')\"><p class=\"price\">($default_currency) $selling_price</p><img src=\"$productrow[product_img]\" alt=\"$productrow[product_name]\" class=\"img-circle\"/><p class=\"productname\">$productrow[product_name]</p><input type=\"hidden\" name=\"productcode[]\" id=\"productcode$productrow[product_id]\" value=\"$productrow[productcode]\"><input type=\"hidden\" name=\"barcode[]\" id=\"barcode$productrow[product_id]\" value=\"$productrow[barcode]\"><input type=\"hidden\" name=\"product_name[]\" id=\"product_name$productrow[product_id]\" value=\"$productrow[product_name]\"><input type=\"hidden\" name=\"product_id[]\" id=\"product_id$productrow[product_id]\" value=\"$productrow[product_id]\"><input type=\"hidden\" style=\"width:50px;\" class=\"form-control\" name=\"rate[]\" id=\"rate$productrow[product_id]\" value=\"$selling_price\"><input type=\"hidden\" style=\"width:50px;\" class=\"form-control\" name=\"tax[]\" id=\"tax$productrow[product_id]\" value=\"$productrow[tax]\"><input type=\"hidden\" name=\"unit[]\" id=\"unit$productrow[product_id]\" value=\"$productrow[unit]\"><input type=\"hidden\" name=\"pricechange[]\" id=\"pricechange$productrow[product_id]\" value=\"$productrow[price_changeable]\"><input type=\"hidden\" name=\"stockable[]\" id=\"stockable$productrow[product_id]\" value=\"$productrow[stockable]\"></div>";

}
?>