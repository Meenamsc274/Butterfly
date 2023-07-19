<?php 
include('dbc.php');
$ingredient_id=$_GET['ingredient_id'];
$row = "";
$i=0;
$stockingredient_query = mysqli_query($link,"select * from stockingredient_tbl where ingredient_id='$ingredient_id'");
//echo mysql_num_rows($stockingredient_query);
while($stockrow = mysqli_fetch_array($stockingredient_query)){
$ingredient_id = $stockrow['ingredient_id'];
$ingredient_name = $stockrow['ingredient_name'];
$ingredientcode = $stockrow['ingredientcode'];
$barcode = $stockrow['barcode'];
$batch_no = $stockrow['batch_no'];
$expiry_date = $stockrow['expiry_date'];
$mrp_price = $stockrow['mrp_price'];
$cost_price = $stockrow['cost_price'];
$selling_price = $stockrow['selling_price'];
$wholesale_price = $stockrow['wholesale_price'];
$stock = $stockrow['qty'];

$row .="<tr class=\"rows\">
			<td class=\"ingredient_id\">$ingredient_id</td>
			<td class=\"ingredient_name\">$ingredient_name</td>
			<td class=\"ingredientcode\">$ingredientcode</td>
			<td class=\"barcode\">$barcode</td>
			<td class=\"batch_no\">$batch_no</td>
			<td class=\"expiry_date\">$expiry_date</td>
			<td class=\"mrp_price\">$mrp_price</td>
			<td class=\"cost_price\">$cost_price</td>
			<td class=\"selling_price\">$selling_price</td>
			<td class=\"wholesale_price\">$wholesale_price</td>
			<td class=\"stock\">$stock</td>
		</tr>";	
$i++;		
}
echo $row;
?>
