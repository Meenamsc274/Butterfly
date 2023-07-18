<?php 
include('dbc.php');
$product_id=$_GET['product_id'];
$row = "";
$i=0;
$stock_query = mysqli_query($link,"select * from options_tbl where product_id='$product_id'");
//echo mysql_num_rows($stock_query);
while($stockrow = mysqli_fetch_array($stock_query)){
$product_id = $stockrow['product_id'];
$options_id = $stockrow['options_id'];
$options_name = $stockrow['options_name'];
$rate = $stockrow['rate'];

$row .="<tr class=\"rows\">
			<td class=\"check\"><input type=\"hidden\" name=\"options_productid"<input type=\"checkbox\" name=\"options[]\" id=\"options_$options_id\" value=\"$options_id / $options_name / $rate\" class=\"form-controls\" /></td>
			<td class=\"options_name\">$options_name</td>
			<td class=\"rate\">$rate</td>
		</tr>";	
$i++;		
}
echo $row;
?>
