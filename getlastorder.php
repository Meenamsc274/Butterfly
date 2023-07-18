<?php 
include('dbc.php');
$row = "";
$i=1;
$stock_query = mysqli_query($link,"select * from sales_tbl group by `invoice_no`");
//echo mysql_num_rows($stock_query);
while($stockrow = mysqli_fetch_array($stock_query)){
$invoice_no = $stockrow['invoice_no'];
$order_type = $stockrow['order_type'];
$table_no = $stockrow['table_no'];
$customer_name = $stockrow['customer_name'];
$mobile_number = $stockrow['mobile_number'];
$row .="<tr class=\"rows\">
			<td class=\"invoice_no\">$invoice_no</td>
			<td class=\"order_type\">$order_type</td>
			<td class=\"table_no\">$table_no</td>
			<td class=\"customer_name\">$customer_name</td>
		</tr>";	
$i++;		
}
echo $row;
?>
