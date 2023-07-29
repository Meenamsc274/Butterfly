<?php 
session_start();
include "dbc.php";
$default_currency = "inr";
$declaration = "Testing declaration";
$gst_summary = "yes";
$payment_summary = "yes";
$invoice_no = filter($_GET['invoice_no']);
$sel_invoice = mysqli_query($link,"select * from purchasereturn_tbl where invoice_no='$invoice_no'");
$rw_details = mysqli_fetch_object($sel_invoice);
$vendor_id = $rw_details->vendor_id;
$company_id = $rw_details->company_id;
$branch_id = $rw_details->branch_id;
$payment_id = $rw_details->payment_id;
$description = $rw_details->description;
include "company_details.php";
include "branch_details.php";
include "vendor_details.php";

$company_details = $company_address.", ".$company_area.", ".$company_city.", ".$company_district.", ".$company_state.", ".$company_country.", ".$company_pincode;

$branch_details =  $branch_address.", ".$branch_area.", ".$branch_city.", ".$branch_district.", ".$branch_state.", ".$branch_country.", ".$branch_pincode;

$vendor_details =  $vendor_address.", ".$vendor_area.", ".$vendor_city.", ".$vendor_district.", ".$vendor_state.", ".$vendor_country.", ".$vendor_pincode;
if($vendor_state != $branch_state){
$igst_tax = "yes";
}
else
{	
$igst_tax = "no";
}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <title>Purchase Invoice - <?php echo $invoice_no; ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="description" content="<?php echo $company_name; ?> Invoice">
    <meta name="author" content="<?php echo $company_name; ?> Invoice">
    <!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<style>
	.container{
		border: 1px solid #ddd;
	}
	</style>
</head>
<body>
<div class="container">
<div style="">
<center>
    <img src="<?php echo $logo; ?>" class="img-responsive" style="width:200px;">
    <h3><?php echo $company_name; ?></h3>
</center>
<center><?php echo $company_details; ?></center>
<center><i class="fa fa-phone"></i> <?php echo $phone_number; ?> <i class="fa fa-envelope"></i> <?php echo $company_email_id; ?></center>
<center>GST No: <?php echo $gst_no; ?></center>
<center><i class="fa fa-globe"></i> <?php echo $company_url; ?></center>
<br>
<center style="text-decoration:underline;"><h2>Purchase Return Invoice</h2></center>
<br>
</div>
<div class="row">
<div class="col-xs-12 col-md-12">
  <div class="row">
    <div class="col-xs-4 col-md-4">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Buyer Details</th>
            </tr>
          </thead>
          <tbody>
			<tr><td><?php echo $branch_name;?></td></tr>
			<tr><td><?php echo $branch_details;?></td></tr>
			<tr><td><i class="fa fa-phone"></i> <?php echo $branch_phone_number; ?> <i class="fa fa-envelope"></i> <?php echo $branch_email_id; ?></td></tr>
			<tr><td>GST No: <?php echo $branch_gst_no; ?></td></tr>
          </tbody>
        </table>
    </div>
    <div class="col-xs-4 col-md-4">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Seller Details</th>
            </tr>
          </thead>
          <tbody>
            <tr><td><?php echo $vendor_name;?></td></tr>
			<tr><td><?php echo $vendor_details;?></td></tr>
			<tr><td><i class="fa fa-phone"></i> <?php echo $vendor_mobile_number; ?> <i class="fa fa-envelope"></i> <?php echo $vendor_email_id; ?></td></tr>
			<tr><td>GST No: <?php echo $vendor_gst_no; ?></td></tr>
          </tbody>
        </table>
      </div>
    <div class="col-xs-4 col-md-4">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Purchase Invoice Details</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Purchase Invoice No : <?php echo $rw_details->invoice_no;?></td>
            </tr>
            <tr>
              <td>Purchase Invoice Date :<?php  echo $invoice_date = date("d-m-Y", strtotime($rw_details->purchasereturn_date));  ?></td>
            </tr>
            <tr>
              <td>PO No : <?php echo $rw_details->po_no;?></td>
            </tr>
			<tr>
              <td>PO Date : <?php  echo $po_date = date("d-m-Y", strtotime($rw_details->po_date));  ?></td>
            </tr>
			<tr><td>&nbsp;</td></tr>
          </tbody>
        </table>
      </div>
  </div>
</div>
</div>
<div class="row">
<div class="col-xs-12 col-md-12">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th width="2%">#</th>
            <th width="20%">Description Of Goods and Services</th>
            <th width="12%">HSN/SAC</th>
            <th width="12%">GST Rate</th>
            <th width="10%">Quantity</th>
            <th width="12%">Rate</th>
            <th width="10%">Units</th>
			<th width="10%">Discount</th>
			<th width="12%">Amount</th>
          </tr>
        </thead>
        <tbody>
        
      <?php
 	  $sel_order1 = mysqli_query($link,"select * from  purchasereturndetails_tbl where invoice_no='$invoice_no'");
	  $sno=1;
	  while($rw_details1 = mysqli_fetch_object($sel_order1)){
			$proid = $rw_details1->product_id;
			$barcode = $rw_details1->barcode;
			$product_name = $rw_details1->product_name;
			$batch_no = $rw_details1->batch_no;
			$expiry_date = $rw_details1->expiry_date;
			$hsn_sac_code = $rw_details1->hsn_sac_code;
			$price = $rw_details1->rate;
			$qty = $rw_details1->qty;
			$tax = $rw_details1->tax;
			$tax_total = $rw_details1->tax_total;
			if($igst_tax == "yes"){
			$gst_tax = $tax;
			}
			else
			{	
			$gst_tax = $tax/2;
			}
			$taxs[] = $gst_tax;
			$cgst[] = $gst_tax.",".$tax_total/2;
			$sgst[] = $gst_tax.",".$tax_total/2;
			$igst[] = $tax_total;	
			$unit = $rw_details1->unit;
			$line_discount_type = $rw_details1->line_discount_type;
			$line_discount = $rw_details1->line_discount;
			$line_discount_total = $rw_details1->line_discount_total;	
			$line_total = $rw_details1->line_total;
		  ?>
          <tr>
            <th scope="row"><?php echo $sno;?></th>
            <td><?php echo $product_name;?></td>
            <td><?php echo $hsn_sac_code; ?></td>
			<td><?php echo $tax; ?> %</td>
			<td><?php echo $qty; ?></td>
            <td><i class="fa fa-<?php echo $default_currency; ?>"></i> <?php echo $price;?></td>
            <td><?php echo $unit; ?></td>
            <td><?php echo $line_discount_total; ?></td>
            <td><i class="fa fa-<?php echo $default_currency; ?>"></i> <?php echo $line_total;?></td>
          </tr>
           
          
      <?php $sno++;} ?>
	  <tr>
		<td colspan="9"></td>
	  </tr>
	  <tr>
		  <td rowspan="7" colspan="6"><?php echo $description; ?></td>
          <th colspan="2" scope="row">Sub Total</th>
          <td><i class="fa fa-<?php echo $default_currency; ?>"></i> <?php echo $rw_details->sub_total; ?></td>
        </tr>
        <tr>
          <th colspan="2" scope="row">Discount</th>
          <td><i class="fa fa-<?php echo $default_currency; ?>"></i> <?php echo $rw_details->total_overalldiscount; ?>
          </td>
        </tr>
		<?php 
		$tax_total = $rw_details->total_tax; 
		$cgst_total = $tax_total/2;
		$sgst_total = $tax_total/2;
		$igst_total = $tax_total;
		?>
        <?php if($igst_tax == "yes"){ ?>
		<tr>
          <th colspan="2" scope="row">IGST</th>
          <td><i class="fa fa-<?php echo $default_currency; ?>"></i> <?php echo $igst_total; ?></td>
        </tr>
		<?php } else { ?>
		<tr>
          <th colspan="2" scope="row">CGST</th>
          <td><i class="fa fa-<?php echo $default_currency; ?>"></i> <?php echo $cgst_total; ?></td>
        </tr>
        <tr>
          <th colspan="2" scope="row">SGST</th>
          <td><i class="fa fa-<?php echo $default_currency; ?>"></i> <?php echo $sgst_total; ?></td>
        </tr>
		<?php } ?>
        <tr>
          <th colspan="2" scope="row">Grand Total</th>
          <td><i class="fa fa-<?php echo $default_currency; ?>"></i> <?php echo $rw_details->grand_total; ?></td>
        </tr>
		<tr>
          <th colspan="2" scope="row">Paid Amount</th>
          <td><i class="fa fa-<?php echo $default_currency; ?>"></i> <?php echo $rw_details->paid_amount; ?></td>
        </tr>
		<tr>
          <th colspan="2" scope="row">Balance Amount</th>
          <td><i class="fa fa-<?php echo $default_currency; ?>"></i> <?php echo $rw_details->balance_amount; ?></td>
        </tr>
        <tr>
			<td colspan="9"><b>Amount Chargeable (In Words):</b> <?php echo ucwords(getIndianCurrency($rw_details->grand_total)); ?></td>
		</tr>
		<tr>
			<td colspan="9"><b>Declaration:</b><br><?php echo $declaration; ?></td>
		</tr>
		<tr>
			<td colspan="9">
			<table class="table table-bordered">
			<tbody>
				<tr>
					<td width="50%"><b>For Customer Seal & Signature</b></td>
					<td width="50%"><b>For <?php echo $branch_name; ?> Seal & Signature</b></td>
				</tr>
				<tr>
					<td><br><br><br></td>
					<td><br><br><br></td>
				</tr>
			</tbody>
			</table>
			</td>
		</tr>
		<tr>
			<td colspan="9">
				<center>
				<h4>Thanks For Shopping With <?php echo $company_name; ?>! See You Again.</h4>
				</center>
			</td>
		</tr>
	</tbody>
	</table>
	</div>
</div>

<?php if($gst_summary == "yes"){ ?>
<div class="row">
<div class="col-xs-12 col-md-12">
<h4><center><b>GST Summary</b></center></h4>
<table class="table table-bordered">
      <tbody>
	    <tr>
			<td></td>
			<?php foreach ( $taxs as $tax) { ?>
				<td><b>@ <?php echo $tax; ?>%</b></td>
			<?php } ?>
			<td><b>Total</b></td>
		</tr>
		<?php if($igst_tax == "yes"){ ?>
		<tr>
			<th scope="row">IGST</th>
			<?php 
			foreach ( $taxs as $tax) {
			$keys = array_keys($igst, $tax); 
			foreach ($keys as $key){
			$tax_val = explode(",",$igst[$key]);
			$tax_val1 =+ $tax_val[1];
			}
			?>
			<td><i class="fa fa-<?php echo $default_currency; ?>"></i> <?php echo $tax_val1; ?></td>
			<?php } ?>
			<td><i class="fa fa-<?php echo $default_currency; ?>"></i> <?php echo $sgst_total; ?></td>
		</tr>
		<?php } else { ?>
		<tr>
			<th scope="row">CGST</th>
			<?php 
			foreach ( $taxs as $tax) {
			$keys = array_keys($cgst, $tax); 
			foreach ($keys as $key){
			$tax_val = explode(",",$cgst[$key]);
			$tax_val1 =+ $tax_val[1];
			}
			?>
			<td><i class="fa fa-<?php echo $default_currency; ?>"></i> <?php echo $tax_val1; ?></td>
			<?php } ?>
			<td><i class="fa fa-<?php echo $default_currency; ?>"></i> <?php echo $cgst_total; ?></td>
			  
        </tr>
		<tr>
			<th scope="row">SGST</th>
			<?php 
			foreach ( $taxs as $tax) {
			$keys = array_keys($sgst, $tax); 
			foreach ($keys as $key){
			$tax_val = explode(",",$sgst[$key]);
			$tax_val1 =+ $tax_val[1];
			}
			?>
			<td><i class="fa fa-<?php echo $default_currency; ?>"></i> <?php echo $tax_val1; ?></td>
			<?php } ?>
			<td><i class="fa fa-<?php echo $default_currency; ?>"></i> <?php echo $sgst_total; ?></td>
		</tr>
		<?php } ?>
		<tr>
			<th scope="row">Total</th>
			<?php foreach ( $taxs as $tax) { ?>
			<td>&nbsp;</td>
			<?php } ?>
			<td><i class="fa fa-<?php echo $default_currency; ?>"></i> <?php echo $tax_total; ?></td>
		</tr>
      </tbody>
    </table>
</div>
</div>
<?php } if($payment_summary == "yes"){ ?>
<div class="row">
<div class="col-xs-12 col-md-12">
<h4><center><b>Payment Summary</b></center></h4>
<table class="table table-bordered">
    <tbody>
	  <tr>
		<th scope="row">#</th>
		<th scope="row" width="20%">Payment Mode</th>
		<th scope="row" width="40%">Payment Details</th>
		<th scope="row" width="20%">Amount</th>
		<th scope="row" width="20%">Total</th>
	  </tr>
	  <?php
		$i = 1;
		$sel_payment = mysqli_query($link,"select * from payment_tbl where payment_id='$payment_id'");
		while($row_payment = mysqli_fetch_object($sel_payment)){
	  ?>
	  <tr>
		<td><?php echo $i; ?></td>
		<td><?php echo ucfirst($row_payment->payment_mode); ?></td>
		<?php 
		$paymentmode = $row_payment->payment_mode; 
		?>
		<td>
			<?php if($paymentmode == "card"){ ?>
			<?php echo $row_payment->card_no; ?><br>
			<?php echo $row_payment->card_type; ?><br>
			<?php echo $row_payment->card_operator; ?><br>
			<?php echo $row_payment->trans_no; ?>
			<?php } ?>
			<?php if($payment_mode == "cheque"){ ?>
			<?php echo $row_payment->cheque_no; ?><br>
			<?php echo $row_payment->cheque_date; ?><br>
			<?php echo $row_payment->cheque_bank; ?>
			<?php } ?>
			<?php if($payment_mode == "netbanking"){ ?>
			<?php echo $row_payment->ref_no; ?>
			<?php } ?>
		</td>
		<td>
			<i class="fa fa-<?php echo $default_currency; ?>"></i> <?php echo $row_payment->payment_amount; ?>
		</td>
		<td><i class="fa fa-<?php echo $default_currency; ?>"></i> <?php echo $rw_details->paid_amount; ?></td>
	  </tr>
		<?php $i++; } ?>
	</tbody>
</table>
</div>
</div>
<?php } ?>

</div>
<br><br>
<center id="printarea">
<button name="print" type="button" value="Print" id="printButton" onClick="printpage()" class="btn btn-danger" >
<i class="fa fa-print"> </i> Print Invoice</button>
 
</center>

<br><br>
<script type="text/javascript">

function printpage() {

document.getElementById('printarea').style.visibility="hidden";

window.print();

document.getElementById('printarea').style.visibility="visible";  

}

</script>

</div>
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>