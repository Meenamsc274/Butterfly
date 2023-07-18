<?php 
include('dbc.php');
$row = "";
$i=1;
$stock_query = mysqli_query($link,"select * from holdorders_tbl group by `order_no`");
//echo mysql_num_rows($stock_query);
while($stockrow = mysqli_fetch_array($stock_query)){
$order_no = $stockrow['order_no'];
$tag_no = $stockrow['tag_no'];
$order_type = $stockrow['order_type'];
$layout_no = $stockrow['layout_no'];
$table_no = $stockrow['table_no'];
$customer_name = $stockrow['customer_name'];
$mobile_number = $stockrow['mobile_number'];
list($count,$total) = mysqli_fetch_row(mysqli_query($link,"select sum(qty),sum(linetotal) from holdorders_tbl where order_no='$order_no'"));
$row .="<tr class=\"rows\">
			<td class=\"sno\">$i</td>
			<td class=\"order_no\">$order_no</td>
			<td class=\"tag_no\">$tag_no</td>
			<td class=\"order_type\">$order_type</td>
			<td class=\"layout_no\">$layout_no</td>
			<td class=\"table_no\">$table_no</td>
			<td class=\"customer_name\">$customer_name</td>
			<td class=\"mobile_number\">$mobile_number</td>
			<td class=\"total_count\">$count</td>
			<td class=\"total_amount\">$total</td>
			<td class=\"actions\"><button class=\"btn btn-default pull-left\" id=\"print_kot\" onClick=\"print_kot('$order_no')\"><i class=\"fa fa-print\"></i> Print KOT</button></td>
		</tr>";	
$i++;		
}
echo $row;
?>
