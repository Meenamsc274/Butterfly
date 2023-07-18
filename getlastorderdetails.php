<?php 
include('dbc.php');
$invoice_no = $_REQUEST['invoice_no'];
$stock_query = mysqli_query($link,"select * from sales_tbl where invoice_no='$invoice_no'");
//echo mysql_num_rows($stock_query);
$stockrow = mysqli_fetch_array($stock_query);
$invoice_no = $stockrow['invoice_no'];
$invoice_date = $stockrow['invoice_date'];
$order_no = $stockrow['order_no'];
$order_type = $stockrow['order_type'];
$layout_no = $stockrow['layout_no'];
$table_no = $stockrow['table_no'];
$tag_no = $stockrow['tag_no'];
$customer_name = $stockrow['customer_name'];
$mobile_number = $stockrow['mobile_number'];
$sub_total = $stockrow['sub_total'];
$total_tax = $stockrow['total_tax'];
$total_linediscount = $stockrow['total_linediscount'];
$grand_total = $stockrow['grand_total'];
$total_count = $stockrow['total_lineitems'];
//$row[] = $product_id;	
$row .= "<center><h3>Order Details</h3></center>
					<table id=\"datatable-responsive\" class=\"table table-bordered dt-responsive nowrap\" cellspacing=\"0\" width=\"100%\">
						<tr>
							<td>Invoice No</td>
							<td>$invoice_no</td>
							<td>Invoice Date</td>
							<td>$invoice_date</td>
						</tr>
						<tr>
							<td>Customer</td>
							<td>$customer_name,$mobile_number</td>
							<td>Order Type</td>
							<td>$order_type</td>
						</tr>
						<tr>
							<td>Waiter / Tag No</td>
							<td>$tag_no</td>
							<td>Layout - Table</td>
							<td>$layout_no - $table_no</td>
						</tr>
					</table>
					<table id=\"datatable-responsive\" class=\"table table-striped table-bordered dt-responsive nowrap\" cellspacing=\"0\" width=\"100%\">
						<thead>
						<tr>
							<th>Item</th>
							<th>Price</th>
							<th>Qty</th>
							<th>Discount</th>
							<th>GST</th>
							<th>Total</th>
						</tr>
						</thead>
						<tbody id=\"lastorderdetails-list\">";
						$i=1;
						$stock_query1 = mysqli_query($link,"select * from salesdetails_tbl where invoice_no='$invoice_no'");
						while($stockrow1 = mysqli_fetch_array($stock_query1)){
						$product_id = $stockrow['product_id'];
						$product_name = $stockrow1['product_name'];
						$qty = $stockrow1['qty'];
						$rate = $stockrow1['rate'];
						$batch_no = $stockrow1['batch_no'];
						$mrp_price = $stockrow1['mrp_price'];
						$expiry_date = $stockrow1['expiry_date'];
						$avail_stock = $stockrow1['avail_stock'];
						$discount = $stockrow1['discount'];
						$discounttotal = $stockrow1['discounttotal'];
						$tax = $stockrow1['tax'];
						$taxtotal = $stockrow1['taxtotal'];
						$total = $stockrow1['linetotal'];	
						$row .="<tr>
								<td>$product_name $batch_no $expiry_date</td>
								<td>$rate</td>
								<td>$qty</td>
								<td>$discounttotal @($discount)</td>
								<td>$taxtotal @($tax)</td>
								<td>$total</td>
							</tr>";
						$i++;		
						}	
						$row .="	
						</tbody>
					</table>
					<table id=\"datatable-responsive\" class=\"table table-bordered dt-responsive nowrap\" cellspacing=\"0\" width=\"100%\">
						<tr>
							<td>Total Count</td>
							<td>$total_count</td>
							<td>Sub Total</td>
							<td>$sub_total</td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td>Total Discount</td>
							<td>$total_linediscount</td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td>GST Total</td>
							<td>$total_tax</td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td>Delivery / Service Charge</td>
							<td>0.00</td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td>Grand Total</td>
							<td>$grand_total</td>
						</tr>
					</table>
					<div class=\"col-md-12\">
					<center>
						<button type=\"submit\" name=\"print_invoice\" id=\"print_invoice\" class=\"btn btn-default\"><i class=\"fa fa-print\"></i> Print Invoice</button>
						<button type=\"submit\" name=\"cancel_invoice\" id=\"cancel_invoice\" class=\"btn btn-default\"><i class=\"fa fa-times\"></i> Cancel Invoice</button>
						<button type=\"submit\" name=\"delete_invoice\" id=\"delete_invoice\" class=\"btn btn-default\"><i class=\"fa fa-trash\"></i> Delete Invoice</button>
					</center>
					</div>";
//echo implode(\",\",$row);
echo $row;
?>
