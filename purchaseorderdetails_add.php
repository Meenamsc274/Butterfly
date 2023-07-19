<?php 
include 'dbc.php'; 
page_protect();
$created_by = $_SESSION['userid'];
$approved_by = "";
?>
<?php
if($_POST['submit'] == "Submit"){
    $id =  mysqli_real_escape_string($link,$_POST['id']);
    $company_id =  mysqli_real_escape_string($link,$_POST['company_id']);
    $branch_id =  mysqli_real_escape_string($link,$_POST['branch_id']);
    $purchaseorder_id =  mysqli_real_escape_string($link,$_POST['purchaseorder_id']);
    $max_id = $db->maxOfAll("id","purchaseorder_tbl");
    $max_id=$max_id+1;
    $purchaseorder_id="pur-".$max_id;	
    $po_no =  mysqli_real_escape_string($link,$_POST['po_no']);
    require("barcode.inc.php");
    $type = "png";
    $rand = rand();
    $file = "barcode/purchaseorder/$purchaseorder_id"."_".date("d-m-Y")."_".$rand;
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
    
    $return = $bar->genBarCode($po_no,$type,$file);
    if($return==false)
        $bar->error(true);
    $po_date =  mysqli_real_escape_string($link,$_POST['po_date']);
    $vendor_id =  mysqli_real_escape_string($link,$_POST['vendor_id']);
    list($vendor_name) = mysqli_fetch_row(mysqli_query($link,"select `company_name` from vendor_tbl where vendor_id='$vendor_id'"));
    //$financial_year =  mysqli_real_escape_string($link,$_POST['financial_year']);
    $total_lineitems =  mysqli_real_escape_string($link,$_POST['total_lineitems']);
    $total_qty =  mysqli_real_escape_string($link,$_POST['total_qty']);
    $total_tax =  mysqli_real_escape_string($link,$_POST['total_tax']);
    $total_linediscount =  mysqli_real_escape_string($link,$_POST['total_linediscount']);
    $sub_total =  mysqli_real_escape_string($link,$_POST['sub_total']);
    $flatrate_discount =  mysqli_real_escape_string($link,$_POST['flatrate_discount']);
    $percentage_discount =  mysqli_real_escape_string($link,$_POST['percentage_discount']);
    $total_overalldiscount =  mysqli_real_escape_string($link,$_POST['total_overalldiscount']);
    $grand_total =  mysqli_real_escape_string($link,$_POST['grand_total']);
    $paid_amount =  mysqli_real_escape_string($link,$_POST['paid_amount']);
    $balance_amount =  mysqli_real_escape_string($link,$_POST['balance_amount']);
    $description =  mysqli_real_escape_string($link,$_POST['description']);
    $payment_id =  mysqli_real_escape_string($link,$_POST['payment_id']);
    $max_id = $db->maxOfAll("id","payment_tbl");
    $max_id=$max_id+1;
    $payment_id="pay-".$max_id;
    $sort_order =  mysqli_real_escape_string($link,$_POST['sort_order']);
    $status =  mysqli_real_escape_string($link,$_POST['status']);
    
    if(mysqli_query($link,"INSERT INTO `purchaseorder_tbl` (`id`, `company_id`, `branch_id`, `purchaseorder_id`, `po_no`, `po_barcode`, `po_date`, `vendor_id`, `vendor_name`, `financial_year`, `total_lineitems`, `total_qty`, `total_tax`, `total_linediscount`, `sub_total`, `flatrate_discount`, `percentage_discount`, `total_overalldiscount`, `grand_total`, `paid_amount` , `balance_amount`, `description`, `payment_id`, `ip_address`, `browser`, `date`, `created_by`, `approved_by`) VALUES ('$id', '$company_id', '$branch_id', '$purchaseorder_id', '$po_no', '$barcode_url', '$po_date', '$vendor_id', '$vendor_name', '$financial_year', '$total_lineitems', '$total_qty', '$total_tax', '$total_linediscount', '$sub_total', '$flatrate_discount', '$percentage_discount', '$total_overalldiscount', '$grand_total', '$paid_amount', '$balance_amount', '$description', '$payment_id', '$ip_address', '$browser', '$date', '$created_by', '$approved_by')")){
    
    
    $product_id1 = $_POST['product_id'];
    $i=0;
    foreach($product_id1 as $product_id2){
    $max_id = $db->maxOfAll("id","purchaseorderdetails_tbl");
    $max_id=$max_id+1;
    $purchaseorderdetails_id="pd-".$max_id;	
    $product_id =  mysqli_real_escape_string($link,$_POST['product_id'][$i]);
    $productcode =  mysqli_real_escape_string($link,$_POST['productcode'][$i]);
    $barcode =  mysqli_real_escape_string($link,$_POST['barcode'][$i]);
    $product_name =  mysqli_real_escape_string($link,$_POST['product_name'][$i]);
    $qty =  mysqli_real_escape_string($link,$_POST['qty'][$i]);
    $rate =  mysqli_real_escape_string($link,$_POST['rate'][$i]);
    $unit =  mysqli_real_escape_string($link,$_POST['unit'][$i]);
    $line_discount_type = $_POST['line_discount_type'][$i];
    $line_discount =  mysqli_real_escape_string($link,$_POST['line_discount'][$i]);
    $line_discount_total =  mysqli_real_escape_string($link,$_POST['line_discount_total'][$i]);
    $mrp_price =  mysqli_real_escape_string($link,$_POST['mrp_price'][$i]);
    $selling_price =  mysqli_real_escape_string($link,$_POST['selling_price'][$i]);
    $wholesale_price =  mysqli_real_escape_string($link,$_POST['wholesale_price'][$i]);
    $tax =  mysqli_real_escape_string($link,$_POST['tax'][$i]);
    $tax_total =  mysqli_real_escape_string($link,$_POST['tax_total'][$i]);
    $line_total =  mysqli_real_escape_string($link,$_POST['line_total'][$i]);
    $batch_no =  mysqli_real_escape_string($link,$_POST['batch_no'][$i]);
    $expiry_date =  mysqli_real_escape_string($link,$_POST['expiry_date'][$i]);
    mysqli_query($link,"INSERT INTO `purchaseorderdetails_tbl` (`id`, `purchaseorderdetails_id`, `company_id`, `branch_id`, `purchaseorder_id`, `po_no`, `po_date`, `vendor_id`, `vendor_name`, `product_id`, `productcode`, `barcode`, `product_name`, `qty`, `rate`, `unit`, `line_discount_type`, `line_discount`, `line_discount_total`, `mrp_price`, `selling_price`, `wholesale_price`, `tax`, `tax_total`, `line_total`, `batch_no`, `expiry_date`, `sort_order`, `status`, `ip_address`, `browser`, `date`, `created_by`, `approved_by`) VALUES (NULL, '$purchaseorderdetails_id', '$company_id', '$branch_id', '$purchaseorder_id', '$po_no', '$po_date', '$vendor_id', '$vendor_name', '$product_id', '$productcode', '$barcode', '$product_name', '$qty', '$rate', '$unit', '$line_discount_type', '$line_discount', '$line_discount_total', '$mrp_price', '$selling_price', '$wholesale_price', '$tax', '$tax_total', '$line_total', '$batch_no', '$expiry_date', '$sort_order', 'active', '$ip_address', '$browser', '$date', '$created_by', '$approved_by')");
    
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
    
    <?php
    if($_POST['submit'] == "Update"){
    $id =  mysqli_real_escape_string($link,$_POST['id']);
    $company_id =  mysqli_real_escape_string($link,$_POST['company_id']);
    $branch_id =  mysqli_real_escape_string($link,$_POST['branch_id']);
    $purchaseorder_id =  mysqli_real_escape_string($link,$_POST['purchaseorder_id']);	
    $po_no =  mysqli_real_escape_string($link,$_POST['po_no']);
    $po_date =  mysqli_real_escape_string($link,$_POST['po_date']);
    $vendor_id =  mysqli_real_escape_string($link,$_POST['vendor_id']);
    list($vendor_name) = mysqli_fetch_row(mysqli_query($link,"select `company_name` from vendor_tbl where vendor_id='$vendor_id'"));
    //$financial_year =  mysqli_real_escape_string($link,$_POST['financial_year']);
    $total_lineitems =  mysqli_real_escape_string($link,$_POST['total_lineitems']);
    $total_qty =  mysqli_real_escape_string($link,$_POST['total_qty']);
    $total_tax =  mysqli_real_escape_string($link,$_POST['total_tax']);
    $total_linediscount =  mysqli_real_escape_string($link,$_POST['total_linediscount']);
    $sub_total =  mysqli_real_escape_string($link,$_POST['sub_total']);
    $flatrate_discount =  mysqli_real_escape_string($link,$_POST['flatrate_discount']);
    $percentage_discount =  mysqli_real_escape_string($link,$_POST['percentage_discount']);
    $total_overalldiscount =  mysqli_real_escape_string($link,$_POST['total_overalldiscount']);
    $grand_total =  mysqli_real_escape_string($link,$_POST['grand_total']);
    $paid_amount =  mysqli_real_escape_string($link,$_POST['paid_amount']);
    $balance_amount =  mysqli_real_escape_string($link,$_POST['balance_amount']);
    $description =  mysqli_real_escape_string($link,$_POST['description']);
    $payment_id =  mysqli_real_escape_string($link,$_POST['payment_id']);
    $sort_order =  mysqli_real_escape_string($link,$_POST['sort_order']);
    $status =  mysqli_real_escape_string($link,$_POST['status']);
    if(mysqli_query($link,"UPDATE `purchaseorder_tbl` SET `company_id` = '$company_id', `branch_id` = '$branch_id', `purchaseorder_id` = '$purchaseorder_id', `po_no` = '$po_no', `po_date` = '$po_date', `vendor_id` = '$vendor_id', `vendor_name` = '$vendor_name', `financial_year` = '$financial_year', `total_lineitems` = '$total_lineitems', `total_qty` = '$total_qty', `total_tax` = '$total_tax', `total_linediscount` = '$total_linediscount', `sub_total` = '$sub_total', `flatrate_discount` = '$flatrate_discount', `percentage_discount` = '$percentage_discount', `total_overalldiscount` = '$total_overalldiscount', `grand_total` = '$grand_total', `paid_amount` = '$paid_amount', `payment_id` = '$payment_id', `balance_amount` = '$balance_amount', `description` = '$payment_desc', `ip_address` = '$ip_address', `browser` = '$browser', `date` = '$date', `created_by` = '$created_by', `approved_by` = '$approved_by' WHERE `purchaseorder_id`='$purchaseorder_id'")){
    
    mysqli_query($link,"delete from purchaseorderdetails_tbl where `purchaseorder_id`='$purchaseorder_id'");
    $product_id1 = $_POST['product_id'];
    $i=0;
    foreach($product_id1 as $product_id2){
    $max_id = $db->maxOfAll("id","purchaseorderdetails_tbl");
    $max_id=$max_id+1;
    $purchaseorderdetails_id="pd-".$max_id;		
    $product_id =  mysqli_real_escape_string($link,$_POST['product_id'][$i]);
    $productcode =  mysqli_real_escape_string($link,$_POST['productcode'][$i]);
    $barcode =  mysqli_real_escape_string($link,$_POST['barcode'][$i]);
    $product_name =  mysqli_real_escape_string($link,$_POST['product_name'][$i]);
    $qty =  mysqli_real_escape_string($link,$_POST['qty'][$i]);
    $rate =  mysqli_real_escape_string($link,$_POST['rate'][$i]);
    $unit =  mysqli_real_escape_string($link,$_POST['unit'][$i]);
    $line_discount_type = $_POST['line_discount_type'][$i];
    $line_discount =  mysqli_real_escape_string($link,$_POST['line_discount'][$i]);
    $line_discount_total =  mysqli_real_escape_string($link,$_POST['line_discount_total'][$i]);
    $mrp_price =  mysqli_real_escape_string($link,$_POST['mrp_price'][$i]);
    $selling_price =  mysqli_real_escape_string($link,$_POST['selling_price'][$i]);
    $wholesale_price =  mysqli_real_escape_string($link,$_POST['wholesale_price'][$i]);
    $tax =  mysqli_real_escape_string($link,$_POST['tax'][$i]);
    $tax_total =  mysqli_real_escape_string($link,$_POST['tax_total'][$i]);
    $line_total =  mysqli_real_escape_string($link,$_POST['line_total'][$i]);
    $batch_no =  mysqli_real_escape_string($link,$_POST['batch_no'][$i]);
    $expiry_date =  mysqli_real_escape_string($link,$_POST['expiry_date'][$i]);
    
    mysqli_query($link,"INSERT INTO `purchaseorderdetails_tbl` (`id`, `purchaseorderdetails_id`, `company_id`, `branch_id`, `purchaseorder_id`, `po_no`, `po_date`, `vendor_id`, `vendor_name`, `product_id`, `productcode`, `barcode`, `product_name`, `qty`, `rate`, `unit`, `line_discount_type`, `line_discount`, `line_discount_total`, `mrp_price`, `selling_price`, `wholesale_price`, `tax`, `tax_total`, `line_total`, `batch_no`, `expiry_date`, `sort_order`, `status`, `ip_address`, `browser`, `date`, `created_by`, `approved_by`) VALUES (NULL, '$purchaseorderdetails_id', '$company_id', '$branch_id', '$purchaseorder_id', '$po_no', '$po_date', '$vendor_id', '$vendor_name', '$product_id', '$productcode', '$barcode', '$product_name', '$qty', '$rate', '$unit', '$line_discount_type', '$line_discount', '$line_discount_total', '$mrp_price', '$selling_price', '$wholesale_price', '$tax', '$tax_total', '$line_total', '$batch_no', '$expiry_date', '$sort_order', 'active', '$ip_address', '$browser', '$date', '$created_by', '$approved_by')");
    
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
    
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <style>
     
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
                        <div class="col-lg-6"><h3 class="box-heading"> Purchase Order <small>Add / Update  Details</small></h3></h3></div>
                        <div class="col-lg-6">
                          <div class="breadcrumb">
                            <a href="index.php" class="breadcrumb_a">Home</a> 
                            <i class="fa fa-angle-double-right angle_double_right"></i>
                            <a href="purchaseorder_view.php" class="breadcrumb_a">Purchase Order </a> 
                            <i class="fa fa-angle-double-right angle_double_right" aria-hidden="true"></i>
                            <a href="#" class="breadcrumb_a">Add / Update Section </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="box-body">
                      <!-- <h5 class="second_heading">Add City</h5> -->
                      <form method="post" class="padding-10" enctype="multipart/form-data">
                        <?php
$purchaseorder_id = mysqli_real_escape_string($link,$_GET['purchaseorder_id']);
  $update = mysqli_real_escape_string($link,$_GET['update']);
  if($update == "yes"){
  $sel_row = mysqli_query($link,"select * from purchaseorder_tbl where `purchaseorder_id`='$purchaseorder_id'");
  $row = mysqli_fetch_object($sel_row);
  
  $upload_id = $purchaseorder_id;
  }
  else
  {
  $max_id = maxOfAll("id","purchaseorder_tbl");
  $max_id=$max_id+1;
  $upload_id="pur-".$max_id;
  }
  ?>
                        <div class="row mt-3">
                          <div class="col-md-12">
  <?php
  foreach($err as $err_msg){
  ?>
  <div class="alert alert-danger alert-dismissible">
       
       <h4><i class="icon fa fa-ban"></i> Alert!</h4>
       <?php echo $err_msg; ?>
    </div>
  <?php } ?>
  <?php
  foreach($msg as $new_msg){
  ?>
  <div class="alert alert-success alert-dismissible">
       
       <h4><i class="icon fa fa-check"></i> Alert!</h4>
       <?php echo $new_msg; ?>
    </div>
    <?php } ?>          
</div> 
<input type="hidden" class="form-control" name="id" id="id" placeholder="Enter the Id" value="<?php echo $row->id; ?>" readonly="readonly">
                          
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Purchase Id</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
        <input type="text" class="form-control" name="purchaseorder_id" id="purchaseorder_id" placeholder="Enter the Purchase Id" value="<?php echo $upload_id; ?>" readonly="readonly">
        </div>
      </div>
    </div>
     
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Company</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
            <select name="company_id" id="company_id" class="form-control">
                <?php
				$sel_rw = mysqli_query($link,"select company_name,company_id from company_tbl");
				while($row1 = mysqli_fetch_object($sel_rw)){
				?>

				<option value="<?php echo $row1->company_id; ?>"><?php echo $row1->company_name; ?></option>

				<?php } ?>
			</select>
        </div>
      </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Branch</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
        <select name="branch_id" id="branch_id" class="form-control">
            <?php
				$sel_rw = mysqli_query($link,"select branch_name,branch_id from branch_tbl");
				while($row1 = mysqli_fetch_object($sel_rw)){
				?>

				<option value="<?php echo $row1->branch_id; ?>"><?php echo $row1->branch_name; ?></option>

				<?php } ?>
			</select>
        </div>
      </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">PO Number</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
            <input type="text" class="form-control" name="po_no" id="po_no" placeholder="Enter the Po No" value="<?php echo $row->po_no; ?>" required="required">
        </div>
      </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">PO Date</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
            <input type="date" class="form-control" name="po_date" id="po_date" placeholder="Enter the Po Date" value="<?php echo $row->po_date; ?>" required="required">
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Vendor</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
            <select name="vendor_id" id="vendor_id" class="form-control">
				<?php
				$sel_rw = mysqli_query($link,"select vendor_id,company_name from vendor_tbl");
				while($row1 = mysqli_fetch_object($sel_rw)){
				?>

				<option value="<?php echo $row1->vendor_id; ?>"><?php echo $row1->company_name; ?></option>

				<?php } ?>
			</select>
        </div>
      </div>
    </div>
    </div>
    <div class="row">
    <div class="col-lg-12 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        
        <div class="col-lg-12 col-md-8 col-sm-12 col-xs-12 no-pad">
            <input class="form-control" type="text" name="search_product" id="search_product" placeholder="Search By Product Id (or) Product Code (or) Barcode (or) HSN Code (or) Product Name" />
            <input type="hidden" name="total_lineitems" id="total_lineitems" value="0" class="form-control"/>
            <input type="hidden" name="total_qty" id="total_qty" value="0" class="form-control"/>
            <br/>
        </div>
      </div>
    </div>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-pad">
		<table class="table table-bordered mg-none table1">
			<thead>
			  <tr>
				<th>Product</th>
				<th>Qty</th>
				<th>Rate</th>
				<th>Unit</th>
				<th>Selling Price</th>
				<th>Discount</th>
				<th>Tax</th>
				<th>Total</th>
				<th></th>
			  </tr>
			</thead>
			<tbody class="">
			<tr class="purchaseorder_details"></tr>
			  <?php
			  if($update == "yes"){
			  $i = 0;
			  $sel = mysqli_query($link,"select * from purchaseorderdetails_tbl where purchaseorder_id='$purchaseorder_id'");
			  while($row_purchase = mysqli_fetch_object($sel)){
			  ?>
			  <tr class="purchaseorder_details" id="<?php echo $row_purchase->product_id; ?>">
				<td width="25%">
					<input class="form-control" type="hidden" name="product_id[]" id="product_id<?php echo $i; ?>" value="<?php echo $row_purchase->product_id; ?>">
					<input class="form-control" type="hidden" name="productcode[]" id="productcode<?php echo $i; ?>" value="<?php echo $row_purchase->productcode; ?>">
					<input class="form-control" type="hidden" name="barcode[]" id="barcode<?php echo $i; ?>" value="<?php echo $row_purchase->barcode; ?>">
					<textarea class="form-control" name="product_name[]" id="product_name<?php echo $i; ?>"><?php echo $row_purchase->product_name; ?></textarea>
					<table>
						<tr>
							<td><b>Expiry Date</b></td>
							<td><b>Batch No</b></td>
						</tr>
						<tr>
							<td><input class="form-control" type="date" name="expiry_date[]" id="expiry_date<?php echo $i; ?>" value="<?php echo $row_purchase->expiry_date; ?>"></td>
							<td><input class="form-control" type="text" name="batch_no[]" id="batch_no<?php echo $i; ?>" value="<?php echo $row_purchase->batch_no; ?>"></td>
						</tr>
					</table>
				</td>
				<td width="5%">
				<input class="form-control qty" type="text" name="qty[]" id="qty<?php echo $i; ?>" value="<?php echo $row_purchase->qty; ?>" onblur="update_linetotal(<?php echo $i; ?>)">
				</td>
				<td width="10%">
				<input class="form-control" type="text" name="rate[]" id="rate<?php echo $i; ?>" value="<?php echo $row_purchase->rate; ?>" onblur="update_linetotal(<?php echo $i; ?>)">
				</td>
				<td width="10%">
				<input class="form-control" type="text" name="unit[]" id="unit<?php echo $i; ?>" value="<?php echo $row_purchase->unit; ?>">
				</td>
				<td width="10%">
				<input class="form-control" type="text" name="mrp_price[]" id="mrp_price<?php echo $i; ?>" placeholder="MRP Price" value="<?php echo $row_purchase->mrp_price; ?>">
				<input class="form-control" type="text" name="selling_price[]" id="selling_price<?php echo $i; ?>" placeholder="Selling Price" value="<?php echo $row_purchase->selling_price; ?>">
				<input class="form-control" type="text" name="wholesale_price[]" id="wholesale_price<?php echo $i; ?>" placeholder="Wholesale" value="<?php echo $row_purchase->wholesale_price; ?>">
				</td>
				<td width="10%">
				<select name="line_discount_type[]" id="line_discount_type<?php echo $i; ?>" class="form-control" onchange="update_linetotal(<?php echo $i; ?>)">
						<option value="no discount" <?php if($row_purchase->line_discount_type == "no discount"){ echo "selected"; } ?>>No Discount</option>
						<option value="flatrate" <?php if($row_purchase->line_discount_type == "flatrate"){ echo "selected"; } ?>>Flat Rate</option>
						<option value="percentage" <?php if($row_purchase->line_discount_type == "percentage"){ echo "selected"; } ?>>Percentage</option>
				</select>
				<input class="form-control" type="text" name="line_discount[]" id="line_discount<?php echo $i; ?>" placeholder="Value" value="<?php echo $row_purchase->line_discount; ?>" onblur="update_linetotal(<?php echo $i; ?>)">
				<input class="form-control linediscount" type="text" name="line_discount_total[]" id="line_discount_total<?php echo $i; ?>" placeholder="Total" value="<?php echo $row_purchase->line_discount_total; ?>" readonly>
				</td>
				<td width="10%">
				<input class="form-control" type="text" name="tax[]" id="tax<?php echo $i; ?>" value="<?php echo $row_purchase->tax; ?>" onblur="update_linetotal(<?php echo $i; ?>)">
				<input class="form-control taxvalue" type="text" name="tax_total[]" id="tax_total<?php echo $i; ?>" value="<?php echo $row_purchase->tax_total; ?>">
				</td>
				<td width="10%">
				<input class="form-control price" type="text" name="line_total[]" id="line_total<?php echo $i; ?>" value="<?php echo $row_purchase->line_total; ?>">
				</td>
				<td>
				<a class="purchasedel" href="javascript:;" title="Remove row"><i class="fa fa-close"></i></a>
				</td>
			</tr>
				<?php $i++; } }?>
			</tbody>
			</table>
		</div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-pad">
			<div class="form-group">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-pad">
				<label for="description">Description</label>
				<textarea class="form-control" name="description" id="description" placeholder="Enter the Description" rows="10"><?php echo $row->description; ?></textarea>
				</div>
			</div>
		</div>
		<h4><center><b>Overall Roundoff / Discount</b></center></h4>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-pad">
			<div class="form-group row">
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
				<label for="flatrate_discount">Discount Flat Rate</label>
				</div>
				<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
				<input type="text" class="form-control" name="flatrate_discount" id="flatrate_discount" placeholder="Enter the Overall Discount Flat Rate" value="<?php echo $row->flatrate_discount; ?>" onBlur="flat_discount_calc()">
				</div>
			</div>
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-pad">
			<div class="form-group row">
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
				<label for="percentage_discount">Discount Percentage</label>
				</div>
				<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
				<input type="text" class="form-control" name="percentage_discount" id="percentage_discount" placeholder="Enter the Overall Discount Percentage" value="<?php echo $row->percentage_discount; ?>" onBlur="percentage_discount_calc()">
				</div>
			</div>
		</div>
		</div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-pad">
			<div class="form-group row">
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
				<label for="sub_total">Sub Total</label>
				</div>
				<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
				<input type="text" class="form-control" name="sub_total" id="sub_total" placeholder="Enter the Sub Total" value="<?php echo $row->sub_total; ?>" required="required" readonly>
				</div>
			</div>
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-pad">
			<div class="form-group row">
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
				<label for="total_tax">Tax Amount</label>
				</div>
				<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
				<input type="text" class="form-control" name="total_tax" id="total_tax" placeholder="Enter the Total Tax Amount" value="<?php echo $row->total_tax; ?>" required="required" readonly>
				</div>
			</div>
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-pad">
			<div class="form-group row">
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
				<label for="total_linediscount">Line Discount</label>
				</div>
				<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
				<input type="text" class="form-control" name="total_linediscount" id="total_linediscount" placeholder="Enter the Total Line Discount Amount" value="<?php echo $row->total_linediscount; ?>" required="required" readonly>
				</div>
			</div>
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-pad">
			<div class="form-group row">
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
				<label for="total_overalldiscount">Overall Discount</label>
				</div>
				<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
				<input type="text" class="form-control" name="total_overalldiscount" id="total_overalldiscount" placeholder="Enter the Overall Discount Total" value="<?php echo $row->total_overalldiscount; ?>" required="required" readonly>
				</div>
			</div>
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-pad">
			<div class="form-group row">
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
				<label for="grand_total">Grand Total</label>
				</div>
				<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
				<input type="text" class="form-control" name="grand_total" id="grand_total" placeholder="Enter the Grand Total" value="<?php echo $row->grand_total; ?>" required="required" readonly>
				</div>
			</div>
		</div>
		</div>
   
      <div style="border-top: 1px solid #ced4da;">&nbsp;</div>
       <center>
       <?php if($update == "yes"){ ?>
        <input type="submit" name="submit" id="submit" class="btn btn-success" value="Update">
       <?php } else { ?>
        <input type="submit" name="submit" id="submit" class="btn btn-success" value="Submit">
       <?php } ?>
       </center>
      </div>
      <div>&nbsp;</div>
                        </div>
                      </form>
                    </div>
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
<script>
$(document).ready(function() {
var today = "<?php echo date('Y-m-d'); ?>";
$('#po_date').val(today);
$('#search_product').focus();  
$("#company_id option[value='<?php echo $row->company_id; ?>']").attr("selected", "selected");
$("#branch_id option[value='<?php echo $row->branch_id; ?>']").attr("selected", "selected");
$("#vendor_name option[value='<?php echo $row->vendor_name; ?>']").attr("selected", "selected");
var newgrandtotal = $('#grand_total').val();
if(newgrandtotal == ""){
	$('#sub_total').val("0.00");
	$('#total_tax').val("0.00");
	$('#total_linediscount').val("0.00");
	$('#total_overalldiscount').val("0.00");
	$('#grand_total').val("0.00");
}
});
$('#search_product').keypress(function (e) {
    
 var key = e.which;
 if(key == 13)  // the enter key code
  {
     e.preventDefault();
	 get_product();
	 return false;
  }
});
function get_product(){
    
	var q = $("#search_product").val();
    
	$.ajax({
          type: "POST",
          url: 'get_products.php',
		  data: 'q='+q,
          //data: $("#membershipForm").serialize(),
          success:function(data){
            var responseData = jQuery.parseJSON(data);
			if(responseData!="null"){
          	var product_id = responseData.product_id;
          	var productcode = responseData.productcode;
          	var product_name = responseData.product_name;
			var barcode = responseData.barcode;
			var unit = responseData.unit;
			var tax = responseData.tax;
			var price_changeable = responseData.price_changeable;
			var stockable = responseData.stockable;
			var batch_stock = responseData.batch_stock;
			var count = $('#'+product_id).length;
			if(count < 1){
				var i = $('.purchaseorder_details').length;
				addrow(i,product_id,productcode,product_name,barcode,unit,tax,price_changeable,stockable);
			}
			else
			{
				var rowcount = $('.purchaseorder_details').length;
				for(var i=1;i<=rowcount;i++){
					if(product_id == $('#product_id'+i).val()){
						var qty = $('#qty'+i).val();
						var newqty = parseFloat(qty)+1;
						$('#qty'+i).val(newqty);
						update_linetotal(i);
					}
				}
			}
			}
			else
			{
				alert("No Product Found!");
			}
			$('#search_product').val("");
		}
	});
}
function update_linetotal(i){
	var total_lineitems = 0;
	var total_qty = 0;
	$( ".qty" ).each( function(){
	  total_qty += parseFloat( $( this ).val() ) || 0;
	  total_lineitems += 1 || 0;
	});
	$('#total_qty').val(total_qty);
	$('#total_lineitems').val(total_lineitems);
	var qty = $('#qty'+i).val();
	var rate = $('#rate'+i).val();
	var discount = $('#line_discount'+i).val();
	if(discount == ""){
		discount = 0;
	}
	var discount_type = $('#line_discount_type'+i+' :selected').val();
	var discount_total = 0;
	if(discount_type == "flatrate"){
		discount_total = parseFloat(discount);
	}
	if(discount_type == "percentage"){
		discount_total = parseFloat(rate)*parseFloat(discount)/100;
	}
	discount_total = discount_total.toFixed(2);
	$('#line_discount_total'+i).val(discount_total);
	var tax = $('#tax'+i).val();
	var tax_total = parseFloat(rate)*parseFloat(tax)/100;
	tax_total = tax_total.toFixed(2);
	$('#tax_total'+i).val(tax_total);
	var line_total = parseFloat(qty) * (parseFloat(rate) + parseFloat(tax_total) - parseFloat(discount_total));
	line_total = line_total.toFixed(2);
	$('#line_total'+i).val(line_total);
	update_total();
}
function flat_discount_calc(){
	var flatrate_discount = $('#flatrate_discount').val();
	var percentage_discount = $('#percentage_discount').val();
	var sub_total = $('#sub_total').val();
	var percentage = 0;
	var total = 0;
	percentage = (parseFloat(flatrate_discount)/parseFloat(sub_total))*100;
	percentage = percentage.toFixed(2);
	flatrate_discount = parseFloat(flatrate_discount).toFixed(2);
	$('#percentage_discount').val(percentage);
	$('#total_overalldiscount').val(flatrate_discount);
	update_total();	
}
function percentage_discount_calc(){
	var flatrate_discount = $('#flatrate_discount').val();
	var percentage_discount = $('#percentage_discount').val();
	var sub_total = $('#sub_total').val();
	var percentage = 0;
	var total = 0;
	total = (parseFloat(sub_total)*parseFloat(percentage_discount))/100;
	total = total.toFixed(2);
	$('#flatrate_discount').val(total);
	$('#total_overalldiscount').val(total);
	update_total();	
}
function update_total(){
  var total = 0;
  var gsttotal = 0;
  var linediscounttotal = 0;
  var totaldiscount = $('#total_overalldiscount').val();
  $('.price').each(function(i){
    price = $(this).val();
    if (!isNaN(price)) total += Number(price);
  });
  $('.linediscount').each(function(i){
    linediscount = $(this).val();
    if (!isNaN(linediscount)) linediscounttotal += Number(linediscount);
  });
  $('.taxvalue').each(function(i){
    taxvalue = $(this).val();
    if (!isNaN(taxvalue)) gsttotal += Number(taxvalue);
  });
  sub_total = total.toFixed(2);
  if(totaldiscount != ""){
	  total = parseFloat(total)-parseFloat(totaldiscount);
  }
  total = total.toFixed(2);
  gsttotal = gsttotal.toFixed(2);
  linediscounttotal = linediscounttotal.toFixed(2);
  
  $('#total_linediscount').val(linediscounttotal);
  $('#total_tax').val(gsttotal);
  $('#sub_total').val(sub_total);
  $('#grand_total').val(total);	
}

</script>
<script type="text/javascript" src="dist/js/purchaseorderdetails_tbl.js"></script>
<script type="text/javascript" src="dist/js/jquery.autocomplete.js"></script>
<script type="text/javascript" src="dist/js/jquery-dynamic-form.js"></script>
 
</html>