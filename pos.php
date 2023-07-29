<?php include "dbc.php"; 
page_protect();
$created_by = $_SESSION['userid'];
$approved_by = "";
?>
<?php
if($_POST['Submit'] == "Place Order"){
	
$id = mysqli_real_escape_string($link,$_POST['id']);
$company_id = mysqli_real_escape_string($link,$_POST['company_id']);
$branch_id = mysqli_real_escape_string($link,$_POST['branch_id']);
$max_id = maxOfAll("id","runningorders_tbl");
$max_id=$max_id+1;
$sales_id="sal-".$max_id;	
$order_no = "ord-".$max_id;
$order_date = date("Y-m-d");
$invoice_no = "inv-".$max_id;
$invoice_date = date("Y-m-d");
$customer_name = mysqli_real_escape_string($link,$_POST['customer_name']);
$mobile_number = mysqli_real_escape_string($link,$_POST['mobile_number']);
$order_type = mysqli_real_escape_string($link,$_POST['order_type']);
$layout_id = mysqli_real_escape_string($link,$_POST['layout_id']);	
$layout_name = mysqli_real_escape_string($link,$_POST['layout_name']);
$layout_no = $layout_id.",".$layout_name;
$table_id = mysqli_real_escape_string($link,$_POST['table_id']);	
$table_name = mysqli_real_escape_string($link,$_POST['table_name']);
$table_no = $table_id.",".$table_name;
$tag_no = mysqli_real_escape_string($link,$_POST['tag_no']);
$sub_total = mysqli_real_escape_string($link,$_POST['sub_total']);
$grand_total = mysqli_real_escape_string($link,$_POST['grand_total']);
$paid_amount = mysqli_real_escape_string($link,$_POST['paid_amount']);
$balance_amount = mysqli_real_escape_string($link,$_POST['balance_amount']);
$description = mysqli_real_escape_string($link,$_POST['description']);
$sort_order = mysqli_real_escape_string($link,$_POST['sort_order']);
$order_status = "Pending";
$status = mysqli_real_escape_string($link,$_POST['status']);

$product_id1 = $_POST['product_id'];
$i=0;
foreach($product_id1 as $product_id2){
$max_id = maxOfAll("id","runningorders_tbl");
$max_id=$max_id+1;
$salesdetails_id="pd-".$max_id;	
$product_id = mysqli_real_escape_string($link,$_POST['oproduct_id'][$i]);
$productcode = mysqli_real_escape_string($link,$_POST['oproductcode'][$i]);
$barcode = mysqli_real_escape_string($link,$_POST['obarcode'][$i]);
$product_name = mysqli_real_escape_string($link,$_POST['oproduct_name'][$i]);
$qty = mysqli_real_escape_string($link,$_POST['oqty'][$i]);
$rate = mysqli_real_escape_string($link,$_POST['orate'][$i]);
$unit = mysqli_real_escape_string($link,$_POST['ounit'][$i]);
$discount = mysqli_real_escape_string($link,$_POST['odiscount'][$i]);
$discounttotal = mysqli_real_escape_string($link,$_POST['odiscounttotal'][$i]);
$mrp_price = mysqli_real_escape_string($link,$_POST['omrp_price'][$i]);
$selling_price = mysqli_real_escape_string($link,$_POST['oselling_price'][$i]);
$wholesale_price = mysqli_real_escape_string($link,$_POST['owholesale_price'][$i]);
$tax = mysqli_real_escape_string($link,$_POST['otax'][$i]);
$taxtotal = mysqli_real_escape_string($link,$_POST['otaxtotal'][$i]);
$linetotal = mysqli_real_escape_string($link,$_POST['ototal'][$i]);
$batch_no = mysqli_real_escape_string($link,$_POST['obatch_no'][$i]);
$expiry_date = mysqli_real_escape_string($link,$_POST['oexpiry_date'][$i]);
$avail_stock = mysqli_real_escape_string($link,$_POST['oavail_stock'][$i]);

mysqli_query($link,"INSERT INTO `runningorders_tbl` (`id`, `company_id`, `branch_id`, `customer_id`, `customer_name`, `mobile_number`, `order_type`, `layout_no`, `table_no`, `tag_no`, `order_no`, `order_date`, `financial_year`, `product_id`, `productcode`, `barcode`, `product_name`, `qty`, `rate`, `unit`, `discount`, `discounttotal`, `tax`, `taxtotal`, `linetotal`, `batch_no`, `mrp_price`, `expiry_date`, `avail_stock`, `status`, `order_status`, `section_status`, `description`, `ip_address`, `browser`, `date`, `created_by`, `approved_by`) VALUES (NULL, '$company_id', '$branch_id', '$customer_id', '$customer_name', '$mobile_number', '$order_type', '$layout_no', '$table_no', '$tag_no', '$order_no', '$order_date', '$financial_year', '$product_id', '$productcode', '$barcode', '$product_name', '$qty', '$rate', '$unit', '$discount', '$discounttotal', '$tax', '$taxtotal', '$linetotal', '$batch_no', '$mrp_price', '$expiry_date', '$avail_stock', 'active', '$order_status', '$section_status', '$description', '$ip_address', '$browser', '$date', '$created_by', '$approved_by')");

	$i++;
	}

}
if($_POST['Submit'] == "Hold Order"){
$id = mysqli_real_escape_string($link,$_POST['id']);
$company_id = mysqli_real_escape_string($link,$_POST['company_id']);
$branch_id = mysqli_real_escape_string($link,$_POST['branch_id']);
$max_id = maxOfAll("id","holdorders_tbl");
$max_id=$max_id+1;
$sales_id="sal-".$max_id;	
$order_no = "ord-".$max_id;
$order_date = date("Y-m-d");
$invoice_no = "inv-".$max_id;
$invoice_date = date("Y-m-d");
$customer_name = mysqli_real_escape_string($link,$_POST['customer_name']);
$mobile_number = mysqli_real_escape_string($link,$_POST['mobile_number']);
$order_type = mysqli_real_escape_string($link,$_POST['order_type']);
$layout_id = mysqli_real_escape_string($link,$_POST['layout_id']);	
$layout_name = mysqli_real_escape_string($link,$_POST['layout_name']);
$layout_no = $layout_id.",".$layout_name;
$table_id = mysqli_real_escape_string($link,$_POST['table_id']);	
$table_name = mysqli_real_escape_string($link,$_POST['table_name']);
$table_no = $table_id.",".$table_name;
$tag_no = mysqli_real_escape_string($link,$_POST['tag_no']);
$sub_total = mysqli_real_escape_string($link,$_POST['sub_total']);
$grand_total = mysqli_real_escape_string($link,$_POST['grand_total']);
$paid_amount = mysqli_real_escape_string($link,$_POST['paid_amount']);
$balance_amount = mysqli_real_escape_string($link,$_POST['balance_amount']);
$description = mysqli_real_escape_string($link,$_POST['description']);
$sort_order = mysqli_real_escape_string($link,$_POST['sort_order']);
$order_status = "Pending";
$status = mysqli_real_escape_string($link,$_POST['status']);

$product_id1 = $_POST['product_id'];
$i=0;
foreach($product_id1 as $product_id2){
$max_id = maxOfAll("id","holdorders_tbl");
$max_id=$max_id+1;
$salesdetails_id="pd-".$max_id;	
$product_id = mysqli_real_escape_string($link,$_POST['oproduct_id'][$i]);
$productcode = mysqli_real_escape_string($link,$_POST['oproductcode'][$i]);
$barcode = mysqli_real_escape_string($link,$_POST['obarcode'][$i]);
$product_name = mysqli_real_escape_string($link,$_POST['oproduct_name'][$i]);
$qty = mysqli_real_escape_string($link,$_POST['oqty'][$i]);
$rate = mysqli_real_escape_string($link,$_POST['orate'][$i]);
$unit = mysqli_real_escape_string($link,$_POST['ounit'][$i]);
$discount = mysqli_real_escape_string($link,$_POST['odiscount'][$i]);
$discounttotal = mysqli_real_escape_string($link,$_POST['odiscounttotal'][$i]);
$mrp_price = mysqli_real_escape_string($link,$_POST['omrp_price'][$i]);
$selling_price = mysqli_real_escape_string($link,$_POST['oselling_price'][$i]);
$wholesale_price = mysqli_real_escape_string($link,$_POST['owholesale_price'][$i]);
$tax = mysqli_real_escape_string($link,$_POST['otax'][$i]);
$taxtotal = mysqli_real_escape_string($link,$_POST['otaxtotal'][$i]);
$linetotal = mysqli_real_escape_string($link,$_POST['ototal'][$i]);
$batch_no = mysqli_real_escape_string($link,$_POST['obatch_no'][$i]);
$expiry_date = mysqli_real_escape_string($link,$_POST['oexpiry_date'][$i]);
$avail_stock = mysqli_real_escape_string($link,$_POST['oavail_stock'][$i]);

mysqli_query($link,"INSERT INTO `holdorders_tbl` (`id`, `company_id`, `branch_id`, `customer_id`, `customer_name`, `mobile_number`, `order_type`, `layout_no`, `table_no`, `tag_no`, `order_no`, `order_date`, `financial_year`, `product_id`, `productcode`, `barcode`, `product_name`, `qty`, `rate`, `unit`, `discount`, `discounttotal`, `tax`, `taxtotal`, `linetotal`, `batch_no`, `mrp_price`, `expiry_date`, `avail_stock`, `status`, `order_status`, `section_status`, `description`, `ip_address`, `browser`, `date`, `created_by`, `approved_by`) VALUES (NULL, '$company_id', '$branch_id', '$customer_id', '$customer_name', '$mobile_number', '$order_type', '$layout_no', '$table_no', '$tag_no', '$order_no', '$order_date', '$financial_year', '$product_id', '$productcode', '$barcode', '$product_name', '$qty', '$rate', '$unit', '$discount', '$discounttotal', '$tax', '$taxtotal', '$linetotal', '$batch_no', '$mrp_price', '$expiry_date', '$avail_stock', 'active', '$order_status', '$section_status', '$description', '$ip_address', '$browser', '$date', '$created_by', '$approved_by')");

	$i++;
	}

}	
if($_POST['Submit'] == "Direct Invoice"){
//echo "entered";
//exit();	
$id = mysqli_real_escape_string($link,$_POST['id']);
$company_id = mysqli_real_escape_string($link,$_POST['company_id']);
$branch_id = mysqli_real_escape_string($link,$_POST['branch_id']);
$max_id = maxOfAll("id","sales_tbl");
$max_id=$max_id+1;
$sales_id="sal-".$max_id;	
$order_no = "ord-".$max_id;
$order_date = date("Y-m-d");
$invoice_no = "inv-".$max_id;
$invoice_date = date("Y-m-d");
require("barcode.inc.php");
$type = "png";
$rand = rand();
$file = "barcode/sales/$sales_id"."_".date("d-m-Y")."_".$rand;
$barcode_url = $file.".".$type;
$encode="CODE128";
$bar= new BARCODE();
if($bar==false)
	die($bar->error());
$bar->setSymblogy($encode);
$bar->setHeight(40);
//$bar->setFont("arial");
$bar->setScale(1);
$bar->setHexColor("#000000","#FFFFFF");

$return = $bar->genBarCode($invoice_no,$type,$file);
if($return==false)
	$bar->error(true);
//$customer_id = mysqli_real_escape_string($link,$_POST['customer_id']);
//list($customer_name) = mysql_fetch_row(mysqli_query($link,"select `customer_name` from customer_tbl where customer_id='$customer_id'"));
//$financial_year = mysqli_real_escape_string($link,$_POST['financial_year']);
$customer_name = mysqli_real_escape_string($link,$_POST['customer_name']);
$mobile_number = mysqli_real_escape_string($link,$_POST['mobile_number']);
list($iscustomer) = mysqli_fetch_row(mysqli_query($link,"select count(id) from customer_tbl where customer_name='$customer_name' and mobile_number='$mobile_number'"));
if($iscustomer < 1){
	$max_id1 = maxOfAll("id","customer_tbl");
	$max_id1=$max_id1+1;
	$customer_id = "cus-".$max_id1;
	mysqli_query($link,"insert into customer_tbl (`id`,`customer_id`,`customer_name`,`mobile_number`,`date`) values ('','$customer_id','$customer_name','$mobile_number',NOW())");
}
else
{
	list($customer_id) = mysqli_fetch_row(mysqli_query($link,"select `customer_id` from customer_tbl where customer_name='$customer_name' and mobile_number='$mobile_number'"));
}
$order_type = mysqli_real_escape_string($link,$_POST['order_type']);
$layout_id = mysqli_real_escape_string($link,$_POST['layout_id']);	
$layout_name = mysqli_real_escape_string($link,$_POST['layout_name']);
$layout_no = $layout_id.",".$layout_name;
$table_id = mysqli_real_escape_string($link,$_POST['table_id']);	
$table_name = mysqli_real_escape_string($link,$_POST['table_name']);
$table_no = $table_id.",".$table_name;
$tag_no = mysqli_real_escape_string($link,$_POST['tag_no']);
$total_lineitems = mysqli_real_escape_string($link,$_POST['total_lineitems']);
$total_qty = mysqli_real_escape_string($link,$_POST['total_qty']);
$total_tax = mysqli_real_escape_string($link,$_POST['total_tax']);
$total_linediscount = mysqli_real_escape_string($link,$_POST['total_linediscount']);
$sub_total = mysqli_real_escape_string($link,$_POST['sub_total']);
$flatrate_discount = mysqli_real_escape_string($link,$_POST['flatrate_discount']);
$percentage_discount = mysqli_real_escape_string($link,$_POST['percentage_discount']);
$total_overalldiscount = mysqli_real_escape_string($link,$_POST['total_overalldiscount']);
$grand_total = mysqli_real_escape_string($link,$_POST['grand_total']);
$paid_amount = mysqli_real_escape_string($link,$_POST['paid_amount']);
$balance_amount = mysqli_real_escape_string($link,$_POST['balance_amount']);
$description = mysqli_real_escape_string($link,$_POST['description']);
$payment_id = mysqli_real_escape_string($link,$_POST['payment_id']);
$max_id = maxOfAll("id","payment_tbl");
$max_id=$max_id+1;
$payment_id="pay-".$max_id;
$sort_order = mysqli_real_escape_string($link,$_POST['sort_order']);
$order_status = "Pending";
$status = mysqli_real_escape_string($link,$_POST['status']);


if(mysqli_query($link,"INSERT INTO `sales_tbl` (`id`, `company_id`, `branch_id`, `sales_id`, `invoice_no`, `invoice_barcode`, `invoice_date`, `customer_id`, `customer_name`, `mobile_number`, `order_type`, `layout_no`, `table_no`, `tag_no`, `order_no`, `order_date`, `financial_year`, `total_lineitems`, `total_qty`, `total_tax`, `total_linediscount`, `sub_total`, `flatrate_discount`, `percentage_discount`, `total_overalldiscount`, `grand_total`, `paid_amount` , `balance_amount`, `description`, `payment_id`, `order_status`, `ip_address`, `browser`, `date`, `created_by`, `approved_by`) VALUES ('$id', '$company_id', '$branch_id', '$sales_id', '$invoice_no', '$barcode_url', '$invoice_date', '$customer_id', '$customer_name', '$mobile_number', '$order_type', '$layout_no', '$table_no', '$tag_no', '$order_no', '$order_date', '$financial_year', '$total_lineitems', '$total_qty', '$total_tax', '$total_linediscount', '$sub_total', '$flatrate_discount', '$percentage_discount', '$total_overalldiscount', '$grand_total', '$paid_amount', '$balance_amount', '$description', '$payment_id', '$order_status', '$ip_address', '$browser', '$date', '$created_by', '$approved_by')")){

//Accounting Module
$payment_mode = $_POST['payment_mode'];
$paymodes = implode(",",$payment_mode);
$type = "credit";
$payment_type = "sales";//sales
mysqli_query($link,"INSERT INTO `accounts_tbl` (`id`, `autoid`, `company_id`, `branch_id`, `date`, `type`, `amount`, `payer`, `category`, `payment_mode`, `card_no`, `cheque_no`, `cheque_dt`, `trans_no`, `description`, `invoice_no`, `subinvoice_no`, `bank_account`, `sort_order`, `status`, `ip_address`, `browser`, `created_by`, `approved_by`) VALUES (NULL, '$payment_id', '$company_id', '$branch_id', '$date', '$type', '$paid_amount', '$customer_name', '$payment_type', '$paymodes', '$card_no', '$cheque_no', '$cheque_date', '$trans_no', '$payment_desc', '$invoice_no', '$subinvoice_no', '$bank_account', '$sort_order', '$status', '$ip_address', '$browser', '$created_by', '$approved_by')");
foreach($payment_mode as $paymentmode){
if($paymentmode == "cash"){
$tender = mysqli_real_escape_string($link,$_POST['cash_tender']);	
}
if($paymentmode == "card"){
$card_no = mysqli_real_escape_string($link,$_POST['card_no']);
$card_type = mysqli_real_escape_string($link,$_POST['card_type']);
$card_operator = mysqli_real_escape_string($link,$_POST['card_operator']);
$tender = mysqli_real_escape_string($link,$_POST['card_tender']);
$trans_no = mysqli_real_escape_string($link,$_POST['trans_no']);
}
if($paymentmode == "cheque"){
$tender = mysqli_real_escape_string($link,$_POST['cheque_tender']);
$cheque_no = mysqli_real_escape_string($link,$_POST['cheque_no']);
$cheque_date = mysqli_real_escape_string($link,$_POST['cheque_date']);
$cheque_bank = mysqli_real_escape_string($link,$_POST['cheque_bank']);
}
if($paymentmode == "netbanking"){
$tender = mysqli_real_escape_string($link,$_POST['netbanking_tender']);
$ref_no = mysqli_real_escape_string($link,$_POST['ref_no']);
}
if($paymentmode == "creditnote"){
$avail_credit = mysqli_real_escape_string($link,$_POST['avail_credit']);
$tender = mysqli_real_escape_string($link,$_POST['creditnote_tender']);
}	
$payment_desc = mysqli_real_escape_string($link,$_POST['payment_desc']);
$payment_status = mysqli_real_escape_string($link,$_POST['payment_status']);	

mysqli_query($link,"INSERT INTO `payment_tbl` (`id`, `payment_id`, `company_id`, `branch_id`, `payment_type`, `invoice_no`, `payment_date`, `payment_mode`, `payment_amount`, `payment_due_date`, `card_no`, `card_type`, `card_operator`, `cheque_no`, `cheque_date`, `cheque_bank`, `trans_no`, `ref_no`, `payment_status`, `description`, `ip_address`, `browser`, `date`, `created_by`, `approved_by`) VALUES (NULL, '$payment_id', '$company_id', '$branch_id', '$payment_type', '$invoice_no', '$date', '$paymentmode', '$tender', '$payment_due_date', '$card_no', '$card_type', '$card_operator', '$cheque_no', '$cheque_date', '$cheque_bank', '$trans_no', '$ref_no', '$payment_status', '$payment_desc', '$ip_address', '$browser', '$date', '$created_by', '$approved_by')");

}	
$product_id1 = $_POST['product_id'];
$i=0;
foreach($product_id1 as $product_id2){
$max_id = maxOfAll("id","salesdetails_tbl");
$max_id=$max_id+1;
$salesdetails_id="pd-".$max_id;	
$product_id = mysqli_real_escape_string($link,$_POST['oproduct_id'][$i]);
$productcode = mysqli_real_escape_string($link,$_POST['oproductcode'][$i]);
$barcode = mysqli_real_escape_string($link,$_POST['obarcode'][$i]);
$product_name = mysqli_real_escape_string($link,$_POST['oproduct_name'][$i]);
$qty = mysqli_real_escape_string($link,$_POST['oqty'][$i]);
$rate = mysqli_real_escape_string($link,$_POST['orate'][$i]);
$unit = mysqli_real_escape_string($link,$_POST['ounit'][$i]);
$discount = mysqli_real_escape_string($link,$_POST['odiscount'][$i]);
$discounttotal = mysqli_real_escape_string($link,$_POST['odiscounttotal'][$i]);
$mrp_price = mysqli_real_escape_string($link,$_POST['omrp_price'][$i]);
$selling_price = mysqli_real_escape_string($link,$_POST['oselling_price'][$i]);
$wholesale_price = mysqli_real_escape_string($link,$_POST['owholesale_price'][$i]);
$tax = mysqli_real_escape_string($link,$_POST['otax'][$i]);
$taxtotal = mysqli_real_escape_string($link,$_POST['otaxtotal'][$i]);
$linetotal = mysqli_real_escape_string($link,$_POST['ototal'][$i]);
$batch_no = mysqli_real_escape_string($link,$_POST['obatch_no'][$i]);
$expiry_date = mysqli_real_escape_string($link,$_POST['oexpiry_date'][$i]);
$avail_stock = mysqli_real_escape_string($link,$_POST['oavail_stock'][$i]);

mysqli_query($link,"INSERT INTO `salesdetails_tbl` (`id`, `salesdetails_id`, `company_id`, `branch_id`, `sales_id`, `invoice_no`, `invoice_date`, `customer_id`, `customer_name`, `mobile_number`, `order_type`, `layout_no`, `table_no`, `tag_no`, `order_no`, `order_date`, `financial_year`, `product_id`, `productcode`, `barcode`, `product_name`, `qty`, `rate`, `unit`, `discount`, `discounttotal`, `tax`, `taxtotal`, `linetotal`, `batch_no`, `mrp_price`, `expiry_date`, `avail_stock`, `status`, `order_status`, `section_status`, `description`, `ip_address`, `browser`, `date`, `created_by`, `approved_by`) VALUES (NULL, '$salesdetails_id', '$company_id', '$branch_id', '$sales_id', '$invoice_no', '$invoice_date', '$customer_id', '$customer_name', '$mobile_number', '$order_type', '$layout_no', '$table_no', '$tag_no', '$order_no', '$order_date', '$financial_year', '$product_id', '$productcode', '$barcode', '$product_name', '$qty', '$rate', '$unit', '$discount', '$discounttotal', '$tax', '$taxtotal', '$linetotal', '$batch_no', '$mrp_price', '$expiry_date', '$avail_stock', 'active', '$order_status', '$section_status', '$description', '$ip_address', '$browser', '$date', '$created_by', '$approved_by')");

//Stock Module
list($stock_id,$avail_qty) = mysqli_fetch_row(mysqli_query($link,"select `stock_id`,`qty` from stock_tbl where company_id='$company_id' and branch_id='$branch_id' and product_id='$product_id' and productcode='$productcode' and product_name='$product_name' and batch_no='$batch_no' and expiry_date='$expiry_date' and mrp_price='$mrp_price'"));
$new_qty = $avail_qty - $qty;
mysqli_query($link,"update stock_tbl set `qty`='$new_qty' where stock_id='$stock_id'");

	$i++;
	}
$msg[] = "Successfully Saved!";
	}
	else
	{
		$err[] = "Error in saving data!";
	}
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Butterfly Paint - Store Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <?php include 'assets/common/css_file.php';?> 
    <link type="text/css" href="assets/css/jquery.autocomplete.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <style>
.img-circle{
	width:80px;
}
.qty,.unit,.rate,.discount,.discountvalue,.tax,.taxvalue{
	width:70px !important;
}
.nopadding{
	padding:0px !important;
}
</style>
  </head>
  <body>
    <div class="page-wrapper"> <?php include 'assets/common/header.php';?> 
      <section class="side-bar">
          <div class="row"> <?php include 'assets/common/left-sidebar.php';?> <div class="col-lg-10">
              <div class="container box-bg">
                <div class="box">
                    <div class="box-header">
                      <div class="row">
                        <div class="col-lg-6"><h3 class="box-heading"> Point Of Sale <small>POS</small></h3></h3></div>
                        <div class="col-lg-6">
                          <div class="breadcrumb">
                            <a href="index.php" class="breadcrumb_a">Home</a> 
                            <i class="fa fa-angle-double-right angle_double_right"></i>
                            <a href="#" class="breadcrumb_a">Sales  </a> 
                            <i class="fa fa-angle-double-right angle_double_right" aria-hidden="true"></i>
                            <a href="#" class="breadcrumb_a">Point Of Sale </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="box-body">
					
        <div class="box-header with-border">
        <div class="col-md-12" style="position:relative;">
				<div class="row mb-2">
					<div class="col-md-12">
					<button class="btn btn-outline-secondary" id="calculator_button"><i class="fa fa-calculator"></i> Calculator</button>
					<button class="btn btn-outline-secondary" id="refresh_button" onClick="runningorders()" onkeyup="runningorders()"><i class="fa fa-refresh"></i> Running Orders</button>
					<button class="btn btn-outline-secondary" id="holdedorders_button" onClick="holdedorders()" onkeyup="holdedorders()"><i class="fa fa-pause"></i> Open Hold Orders</button>
					<button class="btn btn-outline-secondary" id="lastorders_button" onClick="lastorders()" onkeyup="lastorders()"><i class="fa fa-history"></i> Last 10 Orders</button>
					<button class="btn btn-outline-secondary" id="kitchennotify_button" onClick="kitchennotification()" onkeyup="kitchennotification()"><i class="fa fa-bell"></i> Kitchen Notification</button>
					</div>
				</div>
			<div id="calculator_main">
            <div class="calculator">
                <input type="text" readonly="">
                <div class="rowc">
                    <div class="key">1</div>
                    <div class="key">2</div>
                    <div class="key">3</div>
                    <div class="key last">0</div>
                </div>
                <div class="rowc">
                    <div class="key">4</div>
                    <div class="key">5</div>
                    <div class="key">6</div>
                    <div class="key last action instant">cl</div>
                </div>
                <div class="rowc">
                    <div class="key">7</div>
                    <div class="key">8</div>
                    <div class="key">9</div>
                    <div class="key last action instant">=</div>
                </div>
                <div class="rowc">
                    <div class="key action">+</div>
                    <div class="key action">-</div>
                    <div class="key action">x</div>
                    <div class="key last action">/</div>
                </div>
          </div>    
        </div>
		
			
		</div>
		  
        </div>
                      <!-- <h5 class="second_heading">Add City</h5> -->
					  <form class="form-horizontal mt-2" method="post" enctype="multipart/form-data" action="" autocomplete="false">	
		<div class="col-md-12">
		<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-3">
				  <div class="form-group row">
					<label>Customer Name</label>
					<input type="hidden" name="company_id" id="company_id" placeholder="Company Id" class="form-control" value="<?php echo $company_id; ?>">
					<input type="hidden" name="branch_id" id="branch_id" placeholder="Branch Id" class="form-control" value="<?php echo $branch_id; ?>">
					<input type="text" name="customer_name" id="customer_name" placeholder="Customer Name" class="form-control" onfocus="callAutoComplete(this.id)" autocomplete="false">
				  </div>
				  <!-- /.form-group -->
				</div>
				<div class="col-md-3">
				  <div class="form-group row">
					<label>Mobile Number</label>
					<div class="row">
						<div class="col-lg-10 col-8">
							<input type="text" name="mobile_number" id="mobile_number" placeholder="Mobile Number" class="form-control pull-left"  onfocus="callAutoComplete(this.id)" autocomplete="false">
						</div>
						<div class="col-lg-2 col-4">
							<a href="customer_add.php" target="_blank"><button class="btn btn-outline-secondary"><i class="fa fa-plus"></i></a>
						</div>
					</div>
					
					
				  </div>
				  <!-- /.form-group -->
				</div>
				
				<div class="col-md-3">
					<div class="form-group row">
						<label>Waiter / Tag No</label>
						<select name="tag_no" id="tag_no" class="form-control">
							<option value="">Please Select</option>
							<?php
							$tagno = mysqli_query($link,"select * from tag_tbl");
							while($tagrow = mysqli_fetch_array($tagno)){
							?>
							<option value="<?php echo $tagrow['tag_name']; ?>"><?php echo $tagrow['tag_name']; ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group row">
						<label>Order Type</label>
						<select name="order_type" id="order_type" class="form-control" required onchange="ordertype()">
						<option value="">Please Select</option>
						<option value="Dine In">Dine In</option>
						<option value="Take Away">Take Away</option>
						<option value="Delivery">Delivery</option>
						</select>
					</div>
				</div>
				  <!-- /.form-group -->
				</div>
            </div>
            <!-- /.col -->
		</div>	
        </div>
		<div class="row">
			<div class="col-md-12" id="dine_in">
				<div class="row">
					<div class="col-md-12 row">
						<div class="col-md-2">
							<div class="form-group row ml-2">
								<label>Layout</label>
								<input class="form-control" type="hidden" name="layout_id" id="layout_id" readonly />
								<input class="form-control" type="text" name="layout_name" id="layout_name" onclick="display_layout()"/>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group row">
								<label>Table</label>
								<input class="form-control" type="hidden" name="table_id" id="table_id" readonly />
								<input class="form-control" type="text" name="table_name" id="table_name" onclick="display_layout()"/>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-12" id="layout_choose">
				<div class="row">
				<div class="col-md-8"><h4>Choose Your Layout </h4></div>
				<div class="col-md-4"><input class="form-control" type="text" name="search_layout" id="search_layout" placeholder="Search here..."/></div>
				</div>
				<div class="row">
				<div class="col-md-12" style="height:200px; overflow-y:auto;">
				<?php
				$layout = mysqli_query($link,"select * from layout_tbl");
				while($layoutrow = mysqli_fetch_array($layout)){
				?>
				<a class="layout_item" onclick="select_layout('<?php echo $layoutrow['layout_id']." / ".$layoutrow['layout_name']; ?>')"><div class="btn btn-default"><img src="assets/img/layout.png" alt="Layout" class="img-circle"/><br><?php echo $layoutrow['layout_name']; ?></div></a>
				<?php } ?>
				</div>
			</div>
			</div>
			<div class="col-md-12" id="table_choose">
			<!--<a href="#" onclick="update_screen()" class="pull-right"><i class="fa fa-remove"></i></a>-->
				<div class="row">
				<div class="col-md-8"><h4>Choose Your Table</h4></div>
				<div class="col-md-4"><input class="form-control" type="text" name="search_table" id="search_table" placeholder="Search here..."/></div>
				</div>
				<div class="row">
				<div class="col-md-12" id="table_list" style="height:200px; overflow-y:auto;">
				<?php
				$table = mysqli_query($link,"select * from table_tbl");
				while($tablerow = mysqli_fetch_array($table)){
				?>
				<a class="table_item" onclick="select_table('<?php echo $tablerow['table_id']." / ".$tablerow['table_name']; ?>')"><div class="btn btn-default"><img src="assets/img/table.png" alt="Table" class="img-circle"/><br><?php echo $tablerow['table_name']; ?></div></a>
				<?php } ?>
				</div>
			</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<a onclick="sel_category()" id="breadcrumb_cat"></a>
				<a onclick="sel_subcategory()" id="breadcrumb_subcat"></a>
			</div>
			<div class="col-md-5 col-sm-12 col-xs-12">
				<div class="col-md-12 nopadding" id="pos_category">
					<h4>Choose Your Category</h4>
					<input class="form-control" type="text" name="search_category" id="search_category" placeholder="Search here..."/><br>
					<div class="row">
					<div class="col-md-12" id="category_list" style="height:400px; overflow-y:auto;">
					<?php
					$category = mysqli_query($link,"select * from category_tbl");
					while($categoryrow = mysqli_fetch_array($category)){
					?>
					<a class="category_item" onclick="select_category('<?php echo $categoryrow['category_id']." / ".$categoryrow['category_name']; ?>')"><div class="btn btn-default"><img src="<?php echo $categoryrow['category_img']; ?>" alt="Category" class="img-circle"/><br><?php echo $categoryrow['category_name']; ?></div></a>
					<?php } ?>
					</div>
					</div>
				</div>
				<div class="col-md-12 nopadding" id="pos_subcategory">
					<h4>Choose Your Sub Category</h4>
					<input class="form-control" type="text" name="search_subcategory" id="search_subcategory" placeholder="Search here..."/><br>
					<div class="row">
					<div class="col-md-12" id="subcategory_list" style="height:400px; overflow-y:auto;">
					<?php
					$subcategory = mysqli_query($link,"select * from subcategory_tbl");
					while($subcategoryrow = mysqli_fetch_array($subcategory)){
					?>
					<a class="subcategory_item" onclick="select_subcategory('<?php echo $subcategoryrow['subcategory_id']." / ".$subcategoryrow['subcategory_name']; ?>')"><div class="btn btn-default"><img src="<?php echo $subcategoryrow['subcategory_img']; ?>" alt="Sub Category" class="img-circle"/><br><?php echo $subcategoryrow['subcategory_name']; ?></div></a>
					<?php } ?>
					</div>
					</div>
				</div>
				<style>
					.product_item{
						overflow:hidden;
					}
					.price {
					  background:#ccc;
					  width:100%;
					  font-weight:bold;
					  text-align:center;
					  font-size:12px;
					}
					.productname{
						font-weight:bold;
						text-align:center;
						font-size:14px;
						width: 200%;
						margin-left: -50%;
						transition: 2s;
					}
					.calculator {
    padding: 10px;
    margin-top: 0px;
    background-color: #ccc;
    border-radius: 5px;
    /*this is to remove space between divs that are inline-block*/
    font-size: 0;
}
#calculator_button{
   
    margin-right:10px;
}
.calculator > input[type=text] {
    width: 100%;    
    height: 50px;   
    border: none;
    background-color: #eee; 
    text-align: right;
    font-size: 30px;
    padding-right: 0px;
}
#calculator_main{
    position:absolute;
    width:350px;
    display:none;
	z-index:9999;
}
.calculator .rowc { 
    margin-top: 10px;
}

.calculator .key {
    width: 76px;
    display: inline-block;
    background-color: black;
    color: white;
    font-size: 20px;
    margin-right: 5px;
    border-radius: 5px;
    height: 50px;
    line-height: 50px;
    text-align: center;
}

.calculator .key:hover{
    cursor: pointer;
}
				</style>
				<div class="col-md-12 nopadding" id="pos_product">
					<h4>Choose Your Products</h4>
					<input class="form-control" type="text" name="search_product" id="search_product" placeholder="Search here..."/><br>
					<div class="row">
					<div class="col-md-12" id="product_list" style="height:400px; overflow-y:auto;">
					<?php
					$product = mysqli_query($link,"select * from product_tbl");
					while($productrow = mysqli_fetch_array($product)){
						$product_id = $productrow['product_id'];
						list($selling_price) = mysqli_fetch_row(mysqli_query($link,"select `selling_price` from stock_tbl where product_id='$product_id'"));
					?>
					<div class="btn btn-default product_item" onclick="addtoorder('<?php echo $productrow['product_id']; ?>')"><p class="price"><?php echo $default_currency; ?> <?php echo $selling_price; ?></p><img src="<?php echo $productrow['product_img']; ?>" alt="<?php echo $productrow['product_name']; ?>" class="img-circle"/><p class="productname"><?php echo $productrow['product_name']; ?></p><input type="hidden" name="productcode[]" id="productcode<?php echo $productrow['product_id']; ?>" value="<?php echo $productrow['productcode']; ?>"><input type="hidden" name="barcode[]" id="barcode<?php echo $productrow['product_id']; ?>" value="<?php echo $productrow['barcode']; ?>"><input type="hidden" name="product_name[]" id="product_name<?php echo $productrow['product_id']; ?>" value="<?php echo $productrow['product_name']; ?>"><input type="hidden" name="pricechange[]" id="pricechange<?php echo $productrow['product_id']; ?>" value="<?php echo $productrow['price_changeable']; ?>"><input type="hidden" name="stockable[]" id="stockable<?php echo $productrow['product_id']; ?>" value="<?php echo $productrow['stockable']; ?>"><input type="hidden" name="product_id[]" id="product_id<?php echo $productrow['product_id']; ?>" value="<?php echo $productrow['product_id']; ?>"><input type="hidden" style="width:50px;" class="form-control" name="rate[]" id="rate<?php echo $productrow['product_id']; ?>" value="<?php echo $selling_price; ?>"><input type="hidden" style="width:50px;" class="form-control" name="tax[]" id="tax<?php echo $productrow['product_id']; ?>" value="<?php echo $productrow['tax']; ?>"><input type="hidden" name="unit[]" id="unit<?php echo $productrow['product_id']; ?>" value="<?php echo $productrow['unit']; ?>"></div>
					<?php } ?>
					</div>
					</div>
				</div>
				
				</div>
			<div class="col-md-7 col-sm-12 col-xs-12">
				<div class="col-md-12 nopadding" style="height:400px; overflow-y:auto;">
					<h4>Product Id / Barcode</h4>
					<input type="text" name="barcode" id="barcode" class="form-control">
					<input type="hidden" name="total_lineitems" id="total_lineitems" value="0" class="form-control"/>
					<input type="hidden" name="total_qty" id="total_qty" value="0" class="form-control"/>
					<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
					<thead>
					<tr>
									<th>Products</th>
									<th>Qty</th>
									<th>Rate (<?php echo $default_currency; ?>)</th>
									<th>Disc (<?php echo $default_currency; ?>)</th>
									<th>GST (<?php echo $default_currency; ?>)</th>
									<th>Total (<?php echo $default_currency; ?>)</th>
									<th></th>
					</tr>
					</thead>
					<tbody>
					<tr class="item-row"></tr>
					</tbody>
				  </table>
				</div>
				<div class="col-md-12 nopadding">
				<br>
				<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
				  <tbody>
				  <tr>
									<td colspan="3">Sub Total (<?php echo $default_currency; ?>) </td>
									<td colspan="2"><input type="text" name="sub_total" id="sub_total" class="form-control" value="0.00"></td>
					</tr>
					<tr>
									<td colspan="3">Discount (<?php echo $default_currency; ?>) </td>
									<td colspan="2"><input type="text" name="discount_total" id="discount_total" class="form-control" value="0.00"></td>
					</tr>
					<tr>
									<td colspan="3">GST Total (<?php echo $default_currency; ?>) </td>
									<td colspan="2"><input type="text" name="gst_total" id="gst_total" class="form-control" value="0.00"></td>
					</tr>
					<tr>
									<td colspan="3">Grand Total (<?php echo $default_currency; ?>) </td>
									<td colspan="2"><input type="text" name="grand_total" id="grand_total" class="form-control" value="0.00"></td>
					</tr>
					<tr>
									<td colspan="3">Paid Amount (<?php echo $default_currency; ?>) </td>
									<td colspan="2"><input type="text" class="form-control" name="paid_amount" id="paid_amount" placeholder="Enter the Paid Amount" value="<?php echo $row->paid_amount; ?>" required="required" onClick="updatebal()" onkeyup="updatebal()"></td>
					</tr>
					<tr>
									<td colspan="3">Balance Amount (<?php echo $default_currency; ?>) </td>
									<td colspan="2"><input type="text" class="form-control" name="balance_amount" id="balance_amount" placeholder="Enter the Balance Amount" value="<?php echo $row->balance_amount; ?>" required="required" readonly></td>
					</tr>
					</tbody>
				  </table>
				  <br>
				  <!-- Button trigger modal -->
				  <button type="submit" class="btn btn-success" name="Submit" id="submit" value="Cancel Order"><i class="fa fa-times"></i> Cancel Order</button>
				  <button type="submit" class="btn btn-success" name="Submit" id="submit" value="Hold Order"><i class="fa fa-pause"></i> Hold Order</button>
				  <button type="submit" class="btn btn-success" name="Submit" id="submit" value="Direct Invoice"><i class="fa fa-newspaper-o"></i> Direct Invoice</button>
				  <button type="submit" class="btn btn-success" name="Submit" id="submit" value="Place Order"><i class="fa fa-cutlery"></i> Place Order</button>
				</div>
			</div>
		</div>
		<div class="modal fade" id="payment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>

                </button>
                 <h4 class="modal-title" id="myModalLabel">Payment Details</h4>
				
            </div>
            <div class="modal-body" style="padding-bottom:0px;">
                <div role="tabpanel">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#cash" aria-controls="cash" role="tab" data-toggle="tab">Cash Payment</a></li>
                        <li role="presentation"><a href="#card" aria-controls="card" role="tab" data-toggle="tab">Card Payment</a></li>
						<li role="presentation"><a href="#cheque" aria-controls="cheque" role="tab" data-toggle="tab">Cheque Payment</a></li>
						<li role="presentation"><a href="#netbanking" aria-controls="netbanking" role="tab" data-toggle="tab">Net Banking Payment</a></li>
						<li role="presentation"><a href="#creditnote" aria-controls="creditnote" role="tab" data-toggle="tab">Credit Note Payment</a></li>
                    </ul>
                    <!-- Tab panes -->
					<div class="tab-content">
					<input type="hidden" name="payment_id" id="payment_id" value="<?php echo $payment_id; ?>" />
                        <div role="tabpanel" class="tab-pane active" id="cash">
						<?php
						list($payment_desc) = mysqli_fetch_row(mysqli_query($link,"select `description` from payment_tbl where payment_id='$payment_id'"));
						$sel_cash = mysqli_query($link,"select *,count(id) as cash from payment_tbl where payment_id='$payment_id' and payment_mode='cash'");
						$row_cash = mysqli_fetch_object($sel_cash);
						$sel_card = mysqli_query($link,"select *,count(id) as card from payment_tbl where payment_id='$payment_id' and payment_mode='card'");
						$row_card = mysqli_fetch_object($sel_card);
						$sel_cheque = mysqli_query($link,"select *,count(id) as cheque from payment_tbl where payment_id='$payment_id' and payment_mode='cheque'");
						$row_cheque = mysqli_fetch_object($sel_cheque);
						$sel_netbanking = mysqli_query($link,"select *,count(id) as netbanking from payment_tbl where payment_id='$payment_id' and payment_mode='netbanking'");
						$row_netbanking = mysqli_fetch_object($sel_netbanking);
						$sel_creditnote = mysqli_query($link,"select *,count(id) as creditnote from payment_tbl where payment_id='$payment_id' and payment_mode='creditnote'");
						$row_creditnote = mysqli_fetch_object($sel_creditnote);
						?>
						<h3><input type="checkbox" name="payment_mode[]" id="cash" value="cash" onClick="paymentmode()" <?php if($row_cash->cash > 0){ echo "checked"; } ?>/> Paid By Cash</h3>
						Amount: <input type="text" class="form-control" name="cash_tender" id="cash_tender" value="<?php echo $row_cash->payment_amount; ?>" onkeyup="update_balance()" readonly="readonly"/> 
						</div>
						
						<div role="tabpanel" class="tab-pane" id="card">
						<h3><input type="checkbox" name="payment_mode[]" id="card" value="card" onClick="paymentmode()" <?php if($row_card->card > 0){ echo "checked"; } ?>/> Paid By Card</h3>
						Amount: <input type="text" class="form-control" name="card_tender" id="card_tender" onkeyup="update_balance()" readonly="readonly" value="<?php echo $row_card->payment_amount; ?>"/>
						Card Number: <input type="text" class="form-control" name="card_no" id="card_no" value="<?php echo $row_card->card_no; ?>" />
						<div class="row">
						<div class="col-md-6 nopadding">
						Card Type: <select name="card_type" class="form-control" id="card_type">
							<option value="Debit Card" <?php if($row_card->card_type == "Debit Card"){ echo "selected"; } ?>>Debit Card</option>
							<option value="Credit Card" <?php if($row_card->card_type == "Credit Card"){ echo "selected"; } ?>>Credit Card</option>
						</select>
						</div>
						<div class="col-md-6 nopadding">
						Card Operator: <select name="card_operator" class="form-control" id="card_operator">
							<option value="Visa Card" <?php if($row_card->card_operator == "Visa Card"){ echo "selected"; } ?>>Visa Card</option>
							<option value="Master Card" <?php if($row_card->card_operator == "Master Card"){ echo "selected"; } ?>>Master Card</option>
							<option value="Mastero Card" <?php if($row_card->card_operator == "Mastero Card"){ echo "selected"; } ?>>Mastero Card</option>
							<option value="Amex Card" <?php if($row_card->card_operator == "Amex Card"){ echo "selected"; } ?>>Amex Card</option>
						</select>
						</div>
						</div>
						Transaction No: <input type="text" class="form-control" name="trans_no" id="trans_no" value="<?php echo $row_card->trans_no; ?>"/>
						</div>
						
						<div role="tabpanel" class="tab-pane" id="cheque">
						<h3><input type="checkbox" name="payment_mode[]" id="cheque" value="cheque" onClick="paymentmode()" <?php if($row_cheque->cheque > 0){ echo "checked"; } ?>/> Paid By Cheque</h3>
						Amount: <input type="text" class="form-control" name="cheque_tender" id="cheque_tender" value="<?php echo $row_cheque->payment_amount; ?>" onkeyup="update_balance()" readonly="readonly"/> 
						Cheque No: <input type="text" class="form-control" name="cheque_no" id="cheque_no" value="<?php echo $row_cheque->cheque_no; ?>"/>
						Cheque Date: <input type="date" class="form-control" name="cheque_date" id="cheque_date" value="<?php echo $row_cheque->cheque_date; ?>"/>
						Cheque Bank: <input type="text" class="form-control" name="cheque_bank" id="cheque_bank" value="<?php echo $row_cheque->cheque_bank; ?>" />
						</div>
						
                        <div role="tabpanel" class="tab-pane" id="netbanking">
						<h3><input type="checkbox" name="payment_mode[]" id="netbanking" value="netbanking" onClick="paymentmode()" <?php if($row_netbanking->netbanking > 0){ echo "checked"; } ?>/> Paid By Net Banking</h3>
						Amount: <input type="text" class="form-control" name="netbanking_tender" id="netbanking_tender" value="<?php echo $row_netbanking->payment_amount; ?>" onkeyup="update_balance()" readonly="readonly"/>
						Reference No: <input type="text" class="form-control" name="ref_no" id="ref_no" value="<?php echo $row_netbanking->ref_no; ?>"/>
						</div>
						<div role="tabpanel" class="tab-pane" id="creditnote">
						<h3><input type="checkbox" name="payment_mode[]" id="creditnote" value="creditnote" onClick="paymentmode()" <?php if($row_creditnote->creditnote > 0){ echo "checked"; } ?>/> Paid By Credit Note</h3>
						Amount: <input type="text" class="form-control" name="creditnote_tender" id="creditnote_tender" value="<?php echo $row_creditnote->payment_amount; ?>" onkeyup="update_balance()" readonly="readonly"/>
						Available Credit: <input type="text" class="form-control" name="avail_credit" id="avail_credit" value="<?php echo $row_creditnote->avail_credit; ?>" />
						</div>
					</div>
                </div>
            </div>
            <div class="modal-footer" style="text-align:left; padding-top:0px;">
				Description: <textarea name="payment_desc" id="payment_desc" class="form-control"><?php  echo $payment_desc; ?></textarea>
				<b>Grand Total: <input type="text" class="form-control" name="grandtotal" id="grandtotal" value="<?php echo $row->grand_total; ?>" readonly /></b>
				<b>Balance    : <input type="text" class="form-control" name="balance" id="balance" value="<?php echo $row->balance_amount; ?>" readonly /></b> 
				<br>
                <center><button type="button" class="btn btn-default" data-dismiss="modal">OK</button></center>
                <!--<button type="button" class="btn btn-primary save">Save changes</button>-->
            </div>
        </div>
    </div>
</div>
		<div id="stock" class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-xl">
				<div class="modal-content">
					<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>

					</button>
					 <h4 class="modal-title" id="myModalLabel">Stock Details</h4>
					
					</div>
					<div class="modal-body">
					<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
						<thead>
						<tr>
							<th>Product Id</th>
							<th>Product Name</th>
							<th>Product Code</th>
							<th>Barcode</th>
							<th>Batch No</th>
							<th>Expiry Date</th>
							<th>MRP</th>
							<th>Selling Price</th>
							<th>Wholesale Price</th>
							<th>Available Stock</th>
						</tr>
						</thead>
						<tbody id="stock-list">
						</tbody>
					</table>
				</div>
			</div>
		</div>
		</div>
		
		<div id="runningorders" class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-xl">
				<div class="modal-content">
				<div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>

                </button>
                 <h4 class="modal-title" id="myModalLabel">Running Order Details</h4>
				
            </div>
            <div class="modal-body">
					<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
						<thead>
						<tr>
							<th>#</th>
							<th>Order No</th>
							<th>Waiter / Tag No</th>
							<th>Order Type</th>
							<th>Layout</th>
							<th>Table</th>
							<th>Customer</th>
							<th>Mobile No</th>
							<th>Status</th>
							<th>Timer</th>
							<th>Actions</th>
						</tr>
						</thead>
						<tbody id="order-list">
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	
		<div id="holdorders" class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-xl">
				<div class="modal-content">
				<div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>

                </button>
                 <h4 class="modal-title" id="myModalLabel">Hold Order Details</h4>
				
            </div>
            <div class="modal-body">
					<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
						<thead>
						<tr>
							<th>#</th>
							<th>Order No</th>
							<th>Waiter / Tag No</th>
							<th>Order Type</th>
							<th>Layout</th>
							<th>Table</th>
							<th>Customer</th>
							<th>Mobile No</th>
							<th>Total Count</th>
							<th>Total Amount</th>
							<th>Actions</th>
						</tr>
						</thead>
						<tbody id="holdorder-list">
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	
		<div id="last_orders" class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-xl">
				<div class="modal-content">
				<div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>

                </button>
                 <h4 class="modal-title" id="myModalLabel">Last 10 Sales</h4>
				
            </div>
            <div class="modal-body">
				<div class="col-md-5">
					<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
						<thead>
						<tr>
							<th>Invoice no</th>
							<th>Order Type</th>
							<th>Table</th>
							<th>Customer</th>
						</tr>
						</thead>
						<tbody id="lastorder-list">
						</tbody>
					</table>
				</div>
				<div class="col-md-7" id="lastorderdetails">
					
				</div>
				<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>    
		</div>
		</form>
                   </div>
              </div>
            </div>
        </section>
      <!--body content end--> <?php include 'assets/common/footer.php';?>
    </div>
    <!----header----->
  </body>
  <?php include 'assets/common/js_file.php';?> 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/1.4.1/jquery-migrate.js"></script>
<script type="text/javascript" src="assets/js/jquery.autocomplete.js"></script>
<script type="text/javascript" src="assets/js/calculator.js"></script>
<script type="text/javascript">
        $(document).ready(function() {
		$("#calculator_main").hide();	
		$("#pos_subcategory").hide();
		$("#pos_product").hide();
		$("#dine_in").hide();
		$('#layout_choose').css("display","none");
		$('#table_choose').css("display","none");
        $("#barcode").autocomplete("findproduct.php", {
        width: 220,
        autoFill: false,
        selectFirst: false
        });
        
        $("#clear").click(function() {
        $(":input").unautocomplete();
        });
		$("#barcode").on( "keydown", function(e) {
		var code = e.keyCode || e.which;
		 if(code == 13) { 
			var product = $("#barcode").val();
			var fields = product.split(' / ');
			var product_id = fields[0];
			var product_name = fields[1];	
			addtoorder(product_id);
			$("#barcode").val("");
		 }	
        });
        });
		//$('.contact-name').hide();
		
		$('#search_product').on('input',function(e){
			//alert("success");
			$('.product_item').hide();
			var txt = $('#search_product').val();
			$('.product_item').each(function(){
				//alert("enter");
			   if($(this).text().toUpperCase().indexOf(txt.toUpperCase()) != -1){
				   $(this).show();
			   }
			   else{
					$(this).hide();
				}
			});
		});
		
		$('#search_subcategory').on('input',function(e){
			//alert("success");
			$('.subcategory_item').hide();
			var txt = $('#search_subcategory').val();
			$('.subcategory_item').each(function(){
				//alert("enter");
			   if($(this).text().toUpperCase().indexOf(txt.toUpperCase()) != -1){
				   $(this).show();
			   }
			   else{
					$(this).hide();
				}
			});
		});
		
		$('#search_category').on('input',function(e){
			//alert("success");
			$('.category_item').hide();
			var txt = $('#search_category').val();
			$('.category_item').each(function(){
				//alert("enter");
			   if($(this).text().toUpperCase().indexOf(txt.toUpperCase()) != -1){
				   $(this).show();
			   }
			   else{
					$(this).hide();
				}
			});
		});
		
		$('#search_table').on('input',function(e){
			//alert("success");
			$('.table_item').hide();
			var txt = $('#search_table').val();
			$('.table_item').each(function(){
				//alert("enter");
			   if($(this).text().toUpperCase().indexOf(txt.toUpperCase()) != -1){
				   $(this).show();
			   }
			   else{
					$(this).hide();
				}
			});
		});
		
		$('#search_layout').on('input',function(e){
			//alert("success");
			$('.layout_item').hide();
			var txt = $('#search_layout').val();
			$('.layout_item').each(function(){
				//alert("enter");
			   if($(this).text().toUpperCase().indexOf(txt.toUpperCase()) != -1){
				   $(this).show();
			   }
			   else{
					$(this).hide();
				}
			});
		});
</script>
<script>
function addtoorder(product_id){
	//alert(product_id);
	//alert("entered addtoorder");
	var productcode = $('#productcode'+product_id).val();
	var barcode = $('#barcode'+product_id).val();
	var product_name = $('#product_name'+product_id).val();
	var rate = $('#rate'+product_id).val();
	var tax = $('#tax'+product_id).val();
	var taxtotal = (parseFloat(rate)*parseFloat(tax))/100;
	var unit = $('#unit'+product_id).val();
	var qty = "1";
	var discount = "0.00";
	var discounttotal = "0.00";
	var total = (parseFloat(rate)+parseFloat(taxtotal))*parseFloat(qty);
	total = total.toFixed(2);
	var i = $('.item-row').length;
	/*var total_qty = $('#total_qty').val()
	$('#total_qty').val(total_qty);
	$('#total_lineitems').val(i);*/
	var pricechange = $('#pricechange'+product_id).val();
	if(pricechange=="yes"){
		var readonly = "readonly";
	}
	var stockable = $('#stockable'+product_id).val();
	if(stockable == "yes"){
		$.get("getstock.php?product_id="+product_id, function(data) {
		$("#stock-list").html(data);
		$('#stock').modal('show');
		});
		$("#stock-list").one("click","tr.rows", function(e){
			//alert("stock-list");
			//var row = $(this).closest('tr').html();
			//alert(row);
			var product_id = $(this).closest('tr').children('td.product_id').text();
			var product_name = $(this).closest('tr').children('td.product_name').text();
			var batch_no = $(this).closest('tr').children('td.batch_no').text();
			var mrp_price = parseFloat($(this).closest('tr').children('td.mrp_price').text());
			var rate = $(this).closest('tr').children('td.selling_price').text();
			var expiry_date = $(this).closest('tr').children('td.expiry_date').text();
			var avail_stock = $(this).closest('tr').children('td.stock').text();
			
			//alert(product_id+product_name+batch_no+mrp_price+selling_price+expiry_date);
			var tax = $('#tax'+product_id).val();
			var taxtotal = (parseFloat(rate)*parseFloat(tax))/100;
			var qty = "1";
			var discount = "0.00";
			var discounttotal = "0.00";
			var total = (parseFloat(rate)+parseFloat(taxtotal))*parseFloat(qty);
			total = total.toFixed(2);
		
			var pro = $('#oproduct_id'+product_id).length;
			var current_mrp = parseFloat($('#omrp_price'+product_id).val());
			var current_qty = parseFloat($('#oavail_stock'+product_id).val());
			var current_batchno = $('#obatch_no'+product_id).val();
			var current_expiry = $('#oexpiry_date'+product_id).val();
			var expiry = (new Date(expiry_date)).toDateString();
			var expiry1 = (new Date(current_expiry)).toDateString();
			var batch = (new String(batch_no)).valueOf();
			var batch1 = (new String(current_batchno)).valueOf();
			//alert(pro+expiry+expiry1+batch+batch1+mrp_price+current_mrp);
			//alert(expiry + expiry1);
			//alert(current_expiry.toDateString());
			//alert(pro);
			if((avail_stock > qty) || (current_qty > qty)){
			if((pro == 0) || (expiry != expiry1) || (mrp_price != current_mrp) || (batch != batch1)){
			i++;
			$(".item-row:last").after('<tr class="item-row"><td style="word-break: break-all; width:400px;" class="'+product_id+'"><input type="hidden" name="oproduct_id[]" id="oproduct_id'+product_id+'" value="'+product_id+'"><input type="hidden" name="oproductcode[]" id="oproductcode'+product_id+'" value="'+productcode+'"><input type="hidden" name="obarcode[]" id="obarcode'+product_id+'" value="'+barcode+'"><input type="hidden" name="omrp_price[]" id="omrp_price'+product_id+'" value="'+mrp_price+'"><input type="hidden" name="obatch_no[]" id="obatch_no'+product_id+'" value="'+batch_no+'"><input type="hidden" name="oexpiry_date[]" id="oexpiry_date'+product_id+'" value="'+expiry_date+'"><input type="hidden" name="oavail_stock[]" id="oavail_stock'+product_id+'" value="'+avail_stock+'"><input type="hidden" name="oproduct_name[]" id="oproduct_name'+product_id+'" value="'+product_name+'">'+product_name+' ('+rate+')</td><td><input type="text" style="width:80px;" class="form-control qty" name="oqty[]" id="oqty'+product_id+'" value="'+qty+'" onchange="updateorder(\''+product_id+'\')"><input type="text" style="width:80px;" class="form-control unit" name="ounit[]" id="ounit'+product_id+'" value="'+unit+'" readonly></td><td><input type="text" style="width:80px;" class="form-control rate" name="orate[]" id="orate'+product_id+'" value="'+rate+'" '+readonly+' onchange="updateorder(\''+product_id+'\')"></td><td><input type="text" style="width:80px;" class="form-control discount" name="odiscount[]" id="odiscount'+product_id+'" value="'+discount+'" onchange="updateorder(\''+product_id+'\')"><input type="text" style="width:80px;" class="form-control discountvalue" name="odiscounttotal[]" id="odiscounttotal'+product_id+'" value="'+discounttotal+'" readonly></td><td><input type="text" style="width:80px;" class="form-control tax" name="otax[]" id="otax'+product_id+'" value="'+tax+'" onchange="updateorder(\''+product_id+'\')"><input type="text" style="width:80px;" class="form-control taxvalue" name="otaxtotal[]" id="otaxtotal'+product_id+'" value="'+taxtotal+'" readonly></td><td><input type="text" style="width:80px;" class="form-control price" name="ototal[]" id="ototal'+product_id+'" value="'+total+'" readonly></td><td><a onclick="del(\''+product_id+'\')" class="delete'+product_id+'" title="Delete"><i class="fa fa-trash"></i></a></td></tr>');
			updateorder(product_id);
			}
			else
			{
				//alert("entered else");
				i++;
				var qty = $('#oqty'+product_id).val();
				qty = parseFloat(qty)+1;
				$('#oqty'+product_id).val(qty);
				updateorder(product_id);
			}
			}
			else
			{
				alert("No Stock Available!");
			}	
			$('#stock').modal('hide');
			optionsmodule(product_id);
		
    });
	}
	else
	{
		//alert("entered main else");
		var pro = $('#oproduct_id'+product_id).length;
		if(pro == 0){
			i++;
			$(".item-row:last").after('<tr class="item-row"><td style="word-break: break-all; width:400px;" class="'+product_id+'"><input type="hidden" name="oproduct_id[]" id="oproduct_id'+product_id+'" value="'+product_id+'"><input type="hidden" name="oproductcode[]" id="oproductcode'+product_id+'" value="'+productcode+'"><input type="hidden" name="obarcode[]" id="obarcode'+product_id+'" value="'+barcode+'"><input type="hidden" name="oproduct_name[]" id="oproduct_name'+product_id+'" value="'+product_name+'">'+product_name+' ('+rate+')</td><td><input type="text" style="width:80px;" class="form-control qty" name="oqty[]" id="oqty'+product_id+'" value="'+qty+'" onchange="updateorder(\''+product_id+'\')"><input type="text" style="width:80px;" class="form-control unit" name="ounit[]" id="ounit'+product_id+'" value="'+unit+'" readonly></td><td><input type="text" style="width:80px;" class="form-control rate" name="orate[]" id="orate'+product_id+'" value="'+rate+'" '+readonly+' onchange="updateorder(\''+product_id+'\')"></td><td><input type="text" style="width:80px;" class="form-control discount" name="odiscount[]" id="odiscount'+product_id+'" value="'+discount+'" onchange="updateorder(\''+product_id+'\')"><input type="text" style="width:80px;" class="form-control discountvalue" name="odiscounttotal[]" id="odiscounttotal'+product_id+'" value="'+discounttotal+'" readonly></td><td><input type="text" style="width:80px;" class="form-control tax" name="otax[]" id="otax'+product_id+'" value="'+tax+'" onchange="updateorder(\''+product_id+'\')"><input type="text" style="width:80px;" class="form-control taxvalue" name="otaxtotal[]" id="otaxtotal'+product_id+'" value="'+taxtotal+'" readonly></td><td><input type="text" style="width:80px;" class="form-control price" name="ototal[]" id="ototal'+product_id+'" value="'+total+'" readonly></td><td><a onclick="del(\''+product_id+'\')" class="delete'+product_id+'" title="Delete"><i class="fa fa-trash"></i></a></td></tr>');
			updateorder(product_id);
			}
			else
			{
				var qty = $('#oqty'+product_id).val();
				qty = parseFloat(qty)+1;
				$('#oqty'+product_id).val(qty);
				updateorder(product_id);
			}
	}	
	
	
    //alert(product_id+price);
}
function del(product_id){
	var qty = $('#oqty'+product_id).val();
	if(qty > 1){
	qty = parseFloat(qty)-1;
	$('#oqty'+product_id).val(qty);
	updateorder(product_id);
	}
	else
	{
		$('#oqty'+product_id).parents('.item-row').remove();
	}	
}
function optionsmodule(product_id){
			$.get("getoptions.php?product_id="+product_id, function(data) {
				$("#options-list").html(data);
				$('#options').modal('show');
			});
			var i=1;
			//$("#apply").on("click", function(){
			//	alert("success");
			//$('#options').html("Addon for");	
			
			updateorder(product_id);
			$('#options').modal('hide');
			//alert(values.join("\n"));
			//});
}
function applyoptions(product_id){
	//alert("success");
	var values = new Array();
			$.each($("input[name='options[]']:checked"), function() {
			  
			  var option = $(this).val();
			  var fields = option.split(' / ');
			  var option_id = fields[0];
			  var option_name = fields[1];
			  var rate = fields[2];
			  var crate = $('#orate'+product_id).val();
			  var newrate = parseFloat(rate)+parseFloat(crate);
			  newrate = newrate.toFixed(2);
			  $('#orate'+product_id).val(newrate);
			  values.push("<br> + "+option_name+" ("+rate+")");
			  // or you can do something to the actual checked checkboxes by working directly with  'this'
			  // something like $(this).hide() (only something useful, probably) :P
			});
			var product = $('.'+product_id).html();
			var newproduct = product+values.join();
			$('.'+product_id).html(newproduct);
}
function updateorder(product_id){
	//alert(product_id);
	//total = parseFloat(total) - parseFloat(discounttotal);
	var stockable = $('#stockable'+product_id).val();
	if(stockable == "yes"){
		var pro = $('#oproduct_id'+product_id).length;
		//alert(pro);
		//for (let i = 0; i <= pro; i++) {
			let pro_id = document.querySelectorAll('#oproduct_id'+product_id);
			for (let index = 0; index < pro_id.length; ++index) {
			var qty = document.getElementsByName('oqty[]');
			var avail_qty = document.getElementsByName('oavail_stock[]');
			var rate = document.getElementsByName('orate[]');
			var tax = document.getElementsByName('otax[]');
			var discount = document.getElementsByName('odiscount[]');
			
			var itaxtotal = document.getElementsByName('otaxtotal[]'); 
			var idiscounttotal = document.getElementsByName('odiscounttotal[]'); 
			var itotal = document.getElementsByName('ototal[]'); 
			
			var qty1 = parseFloat(qty[index].value);
			var avail_qty1 = parseFloat(avail_qty[index].value);
			var rate1 = rate[index].value;
			var tax1 = tax[index].value;
			var discount1 = discount[index].value;
			
			//alert(qty1);
			//alert(avail_qty1);
			var taxtotal = (parseFloat(qty1)*parseFloat(rate1)*parseFloat(tax1))/100;
			taxtotal = taxtotal.toFixed(2);
			var discounttotal = (parseFloat(qty1)*parseFloat(rate1)*parseFloat(discount1))/100;
			discounttotal = discounttotal.toFixed(2);
			var total = ((parseFloat(rate1)*parseFloat(qty1))+parseFloat(taxtotal)-parseFloat(discounttotal));
			total = total.toFixed(2);
			
			if(qty1 > avail_qty1){
				alert("No Stock Available!");
				qty[index].value = "1";
			}
			else
			{
				itaxtotal[index].value = taxtotal;
				idiscounttotal[index].value = discounttotal;
				itotal[index].value = total;
			}
		}
	}
	else
	{
		var qty = $('#oqty'+product_id).val();
		var rate = $('#orate'+product_id).val();
		var tax = $('#otax'+product_id).val();
		var taxtotal = (parseFloat(qty)*parseFloat(rate)*parseFloat(tax))/100;
		taxtotal = taxtotal.toFixed(2);
		var discount = $('#odiscount'+product_id).val();
		var discounttotal = (parseFloat(qty)*parseFloat(rate)*parseFloat(discount))/100;
		discounttotal = discounttotal.toFixed(2);
		var total = ((parseFloat(rate)*parseFloat(qty))+parseFloat(taxtotal)-parseFloat(discounttotal));
		total = total.toFixed(2);
		$('#otaxtotal'+product_id).val(taxtotal);
		$('#odiscounttotal'+product_id).val(discounttotal);
		$('#ototal'+product_id).val(total);
	}	
	//$('#ototal'+product_id).val(total);
	//alert(total);
	update_total();
}
function update_total() {
var total_lineitems = 0;
var total_qty = 0;
$( ".qty" ).each( function(){
  total_qty += parseFloat( $( this ).val() ) || 0;
  total_lineitems += 1 || 0;
});
$('#total_qty').val(total_qty);
$('#total_lineitems').val(total_lineitems);
  var total = 0;
  var gsttotal = 0;
  $('.price').each(function(i){
    price = $(this).val();
    if (!isNaN(price)) total += Number(price);
  });
  $('.taxvalue').each(function(i){
    taxvalue = $(this).val();
    if (!isNaN(taxvalue)) gsttotal += Number(taxvalue);
  });

  total = total.toFixed(2);
  gsttotal = gsttotal.toFixed(2);
  //$('#subtotal').html("&#8377;"+total);
  //$('#total').html("&#8377;"+total);
  $('#gst_total').val(gsttotal);
  $('#sub_total').val(total);
  $('#grand_total').val(total);
  update_balance();
}
function select_layout(layout_id) {
	var fields = layout_id.split(' / ');
	var layout_id = fields[0];
	var layout_name = fields[1];
	$('#layout_id').val(layout_id);
	$('#layout_name').val(layout_name);
    $.get("gettable.php?layout_id="+layout_id, function(data) {
		$("#table_list").html(data);
    });
	update_screen();
}
function select_table(table_id){
	var fields = table_id.split(' / ');
	var table_id = fields[0];
	var table_name = fields[1];
	$('#table_id').val(table_id);
	$('#table_name').val(table_name);
	update_screen();
}
function update_screen(){
	var layout_name = $('#layout_name').val();
	var table_name = $('#table_name').val();
	if(layout_name != "" && table_name != ""){
	$('#layout_choose').css("display","none");
	$('#table_choose').css("display","none");
	}
}
function display_layout(){
	var layout_id = $('#layout_id').val("");
	var table_id = $('#table_id').val("");
	var layout_name = $('#layout_name').val("");
	var table_name = $('#table_name').val("");
	$('#layout_choose').css("display","block");
	$('#table_choose').css("display","block");
}
function select_category(category) {
	var fields = category.split(' / ');
	var category_id = fields[0];
	var category_name = fields[1];
	$.get("getsubcategory.php?category_id="+category_id+"&category_name="+category_name, function(data) {
		$("#pos_category").hide();
		$("#pos_subcategory").show();
		$("#breadcrumb_cat").html(category_name + " > ");
		$("#subcategory_list").html(data);
    });
}
function select_subcategory(subcategory) {
	var fields = subcategory.split(' / ');
	var subcategory_id = fields[0];
	var subcategory_name = fields[1];
	$.get("getproduct.php?subcategory_id="+subcategory_id+"&subcategory_name="+subcategory_name, function(data) {
		$("#pos_subcategory").hide();
		$("#pos_product").show();
		$("#breadcrumb_subcat").html(subcategory_name + " > ");
		$("#product_list").html(data);
    });
}
function sel_category() {
	$("#pos_category").show();
	$("#pos_subcategory").hide();
	$("#pos_product").hide();
	$("#breadcrumb_cat").html("");
	$("#breadcrumb_subcat").html("");
}
function sel_subcategory(){
	$("#pos_category").hide();
	$("#pos_subcategory").show();
	$("#pos_product").hide();
}
function updatebal(){
	paymentmode();
	$('#payment').modal('show');
	update_balance();
}
function paymentmode(){
	$.each($("input[name='payment_mode[]']:checked"), function(){            
        var sel = $(this).val();
		$('#'+sel+'_tender').removeAttr("readonly");
    });
	$.each($("input[name='payment_mode[]']:not(:checked)"), function(){
		var sel = $(this).val();
		$('#'+sel+'_tender').attr("readonly","readonly");
	});	
}
function update_balance(){
	var newgrandtotal = $('#grand_total').val();
	if(newgrandtotal == "" || isNaN(newgrandtotal)){ newgrandtotal = 0; }
	$('#grandtotal').val(newgrandtotal);
	var grandtotal = parseFloat($('#grandtotal').val());
	$('#balance').val(grandtotal);
	var cash = parseFloat($('#cash_tender').val());
	var card = parseFloat($('#card_tender').val());
	var cheque = parseFloat($('#cheque_tender').val());
	var netbanking = parseFloat($('#netbanking_tender').val());
	var creditnote = parseFloat($('#creditnote_tender').val());
	if(cash == "" || isNaN(cash)){ cash = 0; }
	if(card == "" || isNaN(card)){ card = 0; }
	if(cheque == "" || isNaN(cheque)){ cheque = 0; }
	if(netbanking == "" || isNaN(netbanking)){ netbanking = 0; }
	if(creditnote == "" || isNaN(creditnote)){ creditnote = 0; }
	var total_paid = parseFloat(cash+card+cheque+netbanking+creditnote);
	var balance = grandtotal - total_paid;
	balance = balance.toFixed(2);
	total_paid = total_paid.toFixed(2);
	$('#balance').val(balance);
	$('#paid_amount').val(total_paid);
	$('#balance_amount').val(balance);
}
function ordertype(){
	var ordertype = $('#order_type').children("option:selected").val();
	if(ordertype == "Dine In"){
		$('#dine_in').show();
		$('#layout_choose').css("display","block");
		$('#table_choose').css("display","block");
	}
	else{
		$('#dine_in').hide();
		$('#layout_choose').css("display","none");
		$('#table_choose').css("display","none");
	}
	//alert(ordertype);
}
$(document).on('mouseenter','.product_item',function(){
		var that = $(this);
		var item_name_width = Math.ceil(that.find('.productname').width());
		var item_name_width_half = Math.ceil(item_name_width/2);
		var item_name_width_quartar = Math.ceil(item_name_width_half/2);
		// that.find('.item_name').css('margin-left','-'+item_name_width_half+'px');
		that.find('.productname').css('margin-left','-100%');
		interval = setInterval(function() {
			// var current_position = parseInt(that.find('.item_name').css('margin-left'));
			var current_position = Math.ceil(parseInt(that.find('.productname').css('margin-left')));
			if(current_position==-Math.abs(item_name_width_half) || current_position==-Math.abs(item_name_width_half+1) || current_position==-Math.abs(item_name_width_half-1)){
				that.find('.productname').css('margin-left','0%');	
			}else if(current_position==0){
				that.find('.productname').css('margin-left','-100%');
			}else if(current_position==item_name_width_quartar || current_position==(item_name_width_quartar+1) || current_position==(item_name_width_quartar-1)){
				that.find('.productname').css('margin-left','-100%');
			}else{
				that.find('.productname').css('margin-left','0%');
			}

		},2030);
	});
$(document).on('mouseleave','.product_item',function(){
		var that = $(this);
		that.find('.productname').css('margin-left','-50%');
		clearInterval(interval);
	});
$(document).ready(function(){	
$('#calculator_button').on('click',function(){
		if($('#calculator_main').css('display')=='none'){
			$('#calculator_main').css('display','block');	
		}else{
			$('#calculator_main').css('display','none');
		}
		
});	
set_calculator_position();
});
function set_calculator_position() {
	/*var calculator_button_top = $('#calculator_button').offset().top;
	var calculator_button_left = $('#calculator_button').offset().left;
	var calculator_button_height = $('#calculator_button').height();
	var calculator_button_width = $('#calculator_button').width();
	var calculator_width = $('#calculator_main').width();
	var left_for_calculator = calculator_button_left+calculator_button_width+calculator_button_width-calculator_width;
	var total_top_for_calculator = calculator_button_top + calculator_button_height+5;*/
	$('#calculator_main').css('top',34).css('left',14);
}
function runningorders(){
	$.get("getrunningorder.php", function(data) {
		$("#order-list").html(data);
		$('#runningorders').modal('show');
		$("#order-list").one("click","tr.rows", function(e){
			var order_no = $(this).closest('tr').children('td.order_no').text();
			var customer_name = $(this).closest('tr').children('td.customer_name').text();
			var mobile_number = $(this).closest('tr').children('td.mobile_number').text();
			var tag_no = $(this).closest('tr').children('td.tag_no').text();
			var order_type = $(this).closest('tr').children('td.order_type').text();
			var layout_no = $(this).closest('tr').children('td.layout_no').text();
			var table_no = $(this).closest('tr').children('td.table_no').text();
			var layout = layout_no.split(",");
			var table = table_no.split(",");
			$('#customer_name').val(customer_name);
			$('#mobile_number').val(mobile_number);
			$("#tag_no option[value='"+tag_no+"']").attr("selected", "selected");
			$("#order_type option[value='"+order_type+"']").attr("selected", "selected");
			ordertype();
			select_layout(layout[0]+' / '+layout[1]);
			select_table(table[0]+' / '+table[1]);
			/*$('#layout_id').val(layout[0]);
			$('#layout_name').val(layout[1]);
			$('#table_id').val(table[0]);
			$('#table_name').val(table[1]);*/
			
			$.get("getrunningorderdetails.php?order_no="+ order_no, function(data1) {
				//alert(data1);
			$(".item-row").html("");	
			$(".item-row:last").after(data1);
			update_total();
			$('#runningorders').modal('hide');
			});	
		});
	});
}
function holdedorders(){
	$.get("getholdorder.php", function(data) {
		$("#holdorder-list").html(data);
		$('#holdorders').modal('show');
		$("#holdorder-list").one("click","tr.rows", function(e){
			var order_no = $(this).closest('tr').children('td.order_no').text();
			var customer_name = $(this).closest('tr').children('td.customer_name').text();
			var mobile_number = $(this).closest('tr').children('td.mobile_number').text();
			var tag_no = $(this).closest('tr').children('td.tag_no').text();
			var order_type = $(this).closest('tr').children('td.order_type').text();
			var layout_no = $(this).closest('tr').children('td.layout_no').text();
			var table_no = $(this).closest('tr').children('td.table_no').text();
			var layout = layout_no.split(",");
			var table = table_no.split(",");
			$('#customer_name').val(customer_name);
			$('#mobile_number').val(mobile_number);
			$("#tag_no option[value='"+tag_no+"']").attr("selected", "selected");
			$("#order_type option[value='"+order_type+"']").attr("selected", "selected");
			ordertype();
			select_layout(layout[0]+' / '+layout[1]);
			select_table(table[0]+' / '+table[1]);
			/*$('#layout_id').val(layout[0]);
			$('#layout_name').val(layout[1]);
			$('#table_id').val(table[0]);
			$('#table_name').val(table[1]);*/
			
			$.get("getholdorderdetails.php?order_no="+ order_no, function(data1) {
				//alert(data1);
			$(".item-row").html("");	
			$(".item-row:last").after(data1);
			update_total();
			$('#holdorders').modal('hide');
			});	
		});
	});
}
function lastorders(){
	$.get("getlastorder.php", function(data) {
		$("#lastorder-list").html(data);
		$('#last_orders').modal('show');
		$("#lastorder-list").on("click","tr.rows", function(e){
			var invoice_no = $(this).closest('tr').children('td.invoice_no').text();
			$.get("getlastorderdetails.php?invoice_no="+ invoice_no, function(data1) {
				$("#lastorderdetails").html("");
				$("#lastorderdetails").html(data1);
			});
		});	
	});
}	
</script>
<script>
function callAutoComplete(idname)
{ 
	
	$("#"+idname).autocomplete("get_customermobileno.php", {
	width: 250,
	autoFill: false,
	selectFirst: false,
	mobile_number: $("#mobile_number").val()
	});
}
$(document).ready(function() {
	$("#mobile_number").blur(function()
	{
	$.post('getcustomerdetails.php', {mobile_number: $("#mobile_number").val()},
	function(data){
	if(data=='no') //if username not avaiable
	{
	alert("no customer found");
	}
	else
	{
	$("#customer_name").val(data.customer_name);
	}
	}, 'json');
	});
});
</script>
</html>