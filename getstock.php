<?php 
include('dbc.php');
$product_id=$_GET['product_id'];
$row = "";
$i=0;
$stock_query = mysqli_query($link,"select * from stock_tbl where product_id='$product_id'");
//echo mysql_num_rows($stock_query);
while($stockrow = mysqli_fetch_array($stock_query)){
$product_id = $stockrow['product_id'];
$product_name = $stockrow['product_name'];
$productcode = $stockrow['productcode'];
$barcode = $stockrow['barcode'];
$batch_no = $stockrow['batch_no'];
$expiry_date = $stockrow['expiry_date'];
$mrp_price = $stockrow['mrp_price'];
$selling_price = $stockrow['selling_price'];
$wholesale_price = $stockrow['wholesale_price'];
$stock = $stockrow['qty'];

$row .="<tr class=\"rows\">
			<td class=\"product_id\">$product_id</td>
			<td class=\"product_name\">$product_name</td>
			<td class=\"productcode\">$productcode</td>
			<td class=\"barcode\">$barcode</td>
			<td class=\"batch_no\">$batch_no</td>
			<td class=\"expiry_date\">$expiry_date</td>
			<td class=\"mrp_price\">$mrp_price</td>
			<td class=\"selling_price\">$selling_price</td>
			<td class=\"wholesale_price\">$wholesale_price</td>
			<td class=\"stock\">$stock</td>
		</tr>";	
$i++;		
}
echo $row;
?>
