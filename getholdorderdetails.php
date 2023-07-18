<?php 
include('dbc.php');
$order_no = $_REQUEST['order_no'];
$i=1;
$stock_query = mysqli_query($link,"select * from runningorders_tbl where order_no='$order_no'");
//echo mysql_num_rows($stock_query);
while($stockrow = mysqli_fetch_array($stock_query)){
$order_no = $stockrow['order_no'];
$table_no = $stockrow['table_no'];
$tag_no = $stockrow['tag_no'];
$customer_name = $stockrow['customer_name'];
$mobile_number = $stockrow['mobile_number'];
$order_status = $stockrow['order_status'];
$product_id = $stockrow['product_id'];
$productcode = $stockrow['productcode'];
$barcode = $stockrow['barcode'];
$product_name = $stockrow['product_name'];
$qty = $stockrow['qty'];
$unit = $stockrow['unit'];
$rate = $stockrow['rate'];
$batch_no = $stockrow['batch_no'];
$mrp_price = $stockrow['mrp_price'];
$expiry_date = $stockrow['expiry_date'];
$avail_stock = $stockrow['avail_stock'];
$discount = $stockrow['discount'];
$discounttotal = $stockrow['discounttotal'];
$tax = $stockrow['tax'];
$taxtotal = $stockrow['taxtotal'];
$total = $stockrow['linetotal'];
//$row[] = $product_id;	
$row .= "<tr class=\"item-row\"><td style=\"word-break: break-all; width:400px;\" class=\"$product_id\"><input type=\"hidden\" name=\"oproduct_id[]\" id=\"oproduct_id$product_id\" value=\"$product_id\"><input type=\"hidden\" name=\"oproductcode[]\" id=\"oproductcode$product_id\" value=\"$productcode\"><input type=\"hidden\" name=\"obarcode[]\" id=\"obarcode$product_id\" value=\"$barcode\"><input type=\"hidden\" name=\"omrp_price[]\" id=\"omrp_price$product_id\" value=\"$mrp_price\"><input type=\"hidden\" name=\"obatch_no[]\" id=\"obatch_no$product_id\" value=\"$batch_no\"><input type=\"hidden\" name=\"oexpiry_date[]\" id=\"oexpiry_date$product_id\" value=\"$expiry_date\"><input type=\"hidden\" name=\"oavail_stock[]\" id=\"oavail_stock$product_id\" value=\"$avail_stock\"><input type=\"hidden\" name=\"oproduct_name[]\" id=\"oproduct_name$product_id\" value=\"$product_name\">$product_name ($rate)</td><td><input type=\"text\" style=\"width:80px;\" class=\"form-control qty\" name=\"oqty[]\" id=\"oqty$product_id\" value=\"$qty\" onchange=\"updateorder('$product_id')\"><input type=\"text\" style=\"width:80px;\" class=\"form-control unit\" name=\"ounit[]\" id=\"ounit$product_id\" value=\"$unit\" readonly></td><td><input type=\"text\" style=\"width:80px;\" class=\"form-control rate\" name=\"orate[]\" id=\"orate$product_id\" value=\"$rate\" readonly onchange=\"updateorder('$product_id')\"></td><td><input type=\"text\" style=\"width:80px;\" class=\"form-control discount\" name=\"odiscount[]\" id=\"odiscount$product_id\" value=\"$discount\" onchange=\"updateorder('$product_id')\"><input type=\"text\" style=\"width:80px;\" class=\"form-control discountvalue\" name=\"odiscounttotal[]\" id=\"odiscounttotal$product_id\" value=\"$discounttotal\" readonly></td><td><input type=\"text\" style=\"width:80px;\" class=\"form-control tax\" name=\"otax[]\" id=\"otax$product_id\" value=\"$tax\" onchange=\"updateorder('$product_id')\"><input type=\"text\" style=\"width:80px;\" class=\"form-control taxvalue\" name=\"otaxtotal[]\" id=\"otaxtotal$product_id\" value=\"$taxtotal\" readonly></td><td><input type=\"text\" style=\"width:80px;\" class=\"form-control price\" name=\"ototal[]\" id=\"ototal$product_id\" value=\"$total\" readonly></td><td><a onclick=\"del('$product_id')\" class=\"delete$product_id\" title=\"Delete\"><i class=\"fa fa-trash\"></i></a></td></tr>";
$i++;		
}
//echo implode(",",$row);
echo $row;
?>
