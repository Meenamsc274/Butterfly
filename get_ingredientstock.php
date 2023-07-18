<?php
include "dbc.php";
$ingredient_id = filter($_POST['ingredient_id']);
$sel_row = mysqli_query($link,"select *,sum(qty) as avail_qty from stockingredient_tbl where ingredient_id='$ingredient_id'");
$row = mysqli_fetch_object($sel_row);
$ingredient_id = $row->ingredient_id;
$ingredient_name = $row->ingredient_name;
$ingredientcode = $row->ingredientcode;
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
"ingredient_id" => $ingredient_id,
"ingredient_name" => $ingredient_name,
"ingredientcode" => $ingredientcode,
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