<?php
include "dbc.php";
$product_id = filter($_POST['product_id']);
$sel_row = mysqli_query($link,"select *,sum(qty) as avail_qty from stock_tbl where product_id='$product_id'");
$row = mysqli_fetch_object($sel_row);
$product_id = $row->product_id;
$product_name = $row->product_name;
$productcode = $row->productcode;
$barcode = $row->barcode;
$batch_no = $row->batch_no;
$expiry_date = $row->expiry_date;
$mrp_price = $row->mrp_price;
$cost_price = $row->cost_price;
$selling_price = $row->selling_price;
$offer_price = $row->offer_price;
$wholesale_price = $row->wholesale_price;
$avail_stock = $row->avail_qty;

$json_resp = array(
"product_id" => $product_id,
"product_name" => $product_name,
"productcode" => $productcode,
"barcode" => $barcode,
"batch_no" => $batch_no,
"expiry_date" => $expiry_date,
"mrp_price" => $mrp_price,
"cost_price" => $cost_price,
"selling_price" => $selling_price,
"offer_price" => $offer_price,
"wholesale_price" => $wholesale_price,
"avail_stock" => $avail_stock
);
	
echo json_encode($json_resp);
?>