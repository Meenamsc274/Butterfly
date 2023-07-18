<?php
include "dbc.php";
$q = $_POST['q'];
//echo "select * from product_tbl where product_id='$q' or productcode='$q' or product_name='$q' or barcode='$q' or hsn_sac_code='$q'";
$sel_row = mysqli_query($link,"select * from product_tbl where product_id='$q' or productcode='$q' or product_name='$q' or barcode='$q' or hsn_sac_code='$q'");
$count = mysqli_num_rows($sel_row);
if($count > 0){
while($row = mysqli_fetch_object($sel_row)){
	$product_id = $row->product_id;
	$productcode = $row->productcode;
	$product_name = $row->product_name;
	$barcode = $row->barcode;
	$unit = $row->unit;
	$tax = $row->tax;
	$stockable = $row->stockable;
	$price_changeable = $row->price_changeable;
	$batch_stock = $row->batch_stock;
	
	$json_resp = array(
	"product_id" => $product_id,
	"productcode" => $productcode,
	"product_name" => $product_name,
	"barcode" => $barcode,
	"unit" => $unit,
	"tax" => $tax,
	"stockable" => $stockable,
	"price_changeable" => $price_changeable,
	"batch_stock" => $batch_stock
	);
	
}
}
else
{
	$json_resp = "null";
}	
echo json_encode($json_resp);
?>