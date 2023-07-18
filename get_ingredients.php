<?php
include "dbc.php";
$q = $_POST['q'];
//echo "select * from ingredient_tbl where ingredient_id='$q' or ingredientcode='$q' or ingredient_name='$q' or barcode='$q' or hsn_sac_code='$q'";
$sel_row = mysqli_query($link,"select * from ingredient_tbl where ingredient_id='$q' or ingredientcode='$q' or ingredient_name='$q' or barcode='$q' or hsn_sac_code='$q'");
$count = mysqli_num_rows($sel_row);
if($count > 0){
while($row = mysqli_fetch_object($sel_row)){
	$ingredient_id = $row->ingredient_id;
	$ingredientcode = $row->ingredientcode;
	$ingredient_name = $row->ingredient_name;
	$barcode = $row->barcode;
	$unit = $row->unit;
	$tax = $row->tax;
	$stockable = $row->stockable;
	$price_changeable = $row->price_changeable;
	$batch_stock = $row->batch_stock;
	
	$json_resp = array(
	"ingredient_id" => $ingredient_id,
	"ingredientcode" => $ingredientcode,
	"ingredient_name" => $ingredient_name,
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