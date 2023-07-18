<?php
include "dbc.php";
$product_id = filter($_POST['product_id']);
$sel_row = mysqli_query($link,"select * from stock_tbl where product_id='$product_id'");
while($row = mysqli_fetch_object($sel_row)){
	$batch_no = $row->batch_no;
	$expiry_date = $row->expiry_date;
	$vendor_code = $row->vendor_code;
	$vendor_name = $row->vendor_name;
	$mrp_price = $row->mrp_price;
	$cost_price = $row->cost_price;
	$selling_price = $row->selling_price;
	$offer_price = $row->offer_price;
	$wholesale_price = $row->wholesale_price;
	
	
	$json_resp = array(
	"batch_no" => $batch_no,
	"expiry_date" => $expiry_date,
	"vendor_code" => $vendor_code,
	"vendor_name" => $vendor_name,
	"mrp_price" => $mrp_price,
	"cost_price" => $cost_price,
	"selling_price" => $selling_price,
	"offer_price" => $offer_price,
	"wholesale_price" => $wholesale_price
	);
	
}
echo json_encode($json_resp);
?>