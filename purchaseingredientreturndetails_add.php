<?php 
include 'dbc.php'; 
page_protect();
$created_by = $_SESSION['userid'];
$approved_by = "";
?>
<?php
if($_POST['submit'] == "Submit"){
    $id = mysqli_real_escape_string($link,$_POST['id']);
    $company_id = mysqli_real_escape_string($link,$_POST['company_id']);
    $branch_id = mysqli_real_escape_string($link,$_POST['branch_id']);
    $purchaseingredientreturn_id = mysqli_real_escape_string($link,$_POST['purchaseingredientreturn_id']);
    $max_id = maxOfAll("id","purchaseingredientreturn_tbl");
    $max_id=$max_id+1;
    $purchaseingredientreturn_id="pur_re-".$max_id;	
    $purchaseingredientreturn_date = mysqli_real_escape_string($link,$_POST['purchaseingredientreturn_date']);
    $po_no = mysqli_real_escape_string($link,$_POST['po_no']);
    $po_date = mysqli_real_escape_string($link,$_POST['po_date']);
    $invoice_no = mysqli_real_escape_string($link,$_POST['invoice_no']);
    require("barcode.inc.php");
    $type = "png";
    $rand = rand();
    $file = "barcode/purchaseingredientreturn/$purchaseingredientreturn_id"."_".date("d-m-Y")."_".$rand;
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
    $invoice_date = mysqli_real_escape_string($link,$_POST['invoice_date']);
    $vendor_id = mysqli_real_escape_string($link,$_POST['vendor_id']);
    list($vendor_name) = mysqli_fetch_row(mysqli_query($link,"select `company_name` from vendor_tbl where vendor_id='$vendor_id'"));
    //$financial_year = mysqli_real_escape_string($link,$_POST['financial_year']);
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
    $status = mysqli_real_escape_string($link,$_POST['status']);
    
    if(mysqli_query($link,"INSERT INTO `purchaseingredientreturn_tbl` (`id`, `company_id`, `branch_id`, `purchaseingredientreturn_id`, `purchaseingredientreturn_date`, `po_no`, `po_date`, `invoice_no`, `invoice_barcode`, `invoice_date`, `vendor_id`, `vendor_name`, `financial_year`, `total_lineitems`, `total_qty`, `total_tax`, `total_linediscount`, `sub_total`, `flatrate_discount`, `percentage_discount`, `total_overalldiscount`, `grand_total`, `paid_amount` , `balance_amount`, `description`, `payment_id`, `ip_address`, `browser`, `date`, `created_by`, `approved_by`) VALUES ('$id', '$company_id', '$branch_id', '$purchaseingredientreturn_id', '$purchaseingredientreturn_date', '$po_no', '$po_date', '$invoice_no', '$barcode_url', '$invoice_date', '$vendor_id', '$vendor_name', '$financial_year', '$total_lineitems', '$total_qty', '$total_tax', '$total_linediscount', '$sub_total', '$flatrate_discount', '$percentage_discount', '$total_overalldiscount', '$grand_total', '$paid_amount', '$balance_amount', '$description', '$payment_id', '$ip_address', '$browser', '$date', '$created_by', '$approved_by')")){
    
    //Accounting Module
    $payment_mode = $_POST['payment_mode'];
    $paymodes = implode(",",$payment_mode);
    $type = "credit";
    $payment_type = "purchaseingredientreturn";//sales
    mysqli_query($link,"INSERT INTO `accounts_tbl` (`id`, `autoid`, `company_id`, `branch_id`, `date`, `type`, `amount`, `payer`, `category`, `payment_mode`, `card_no`, `cheque_no`, `cheque_dt`, `trans_no`, `description`, `invoice_no`, `subinvoice_no`, `bank_account`, `sort_order`, `status`, `ip_address`, `browser`, `created_by`, `approved_by`) VALUES (NULL, '$payment_id', '$company_id', '$branch_id', '$date', '$type', '$paid_amount', '$vendor_name', '$payment_type', '$paymodes', '$card_no', '$cheque_no', '$cheque_date', '$trans_no', '$payment_desc', '$invoice_no', '$subinvoice_no', '$bank_account', '$sort_order', '$status', '$ip_address', '$browser', '$created_by', '$approved_by')");
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
        
    $ingredient_id1 = $_POST['ingredient_id'];
    $i=0;
    foreach($ingredient_id1 as $ingredient_id2){
    $max_id = maxOfAll("id","purchaseingredientreturndetails_tbl");
    $max_id=$max_id+1;
    $purchaseingredientreturndetails_id="pdr-".$max_id;	
    $ingredient_id = mysqli_real_escape_string($link,$_POST['ingredient_id'][$i]);
    $ingredientcode = mysqli_real_escape_string($link,$_POST['ingredientcode'][$i]);
    $barcode = mysqli_real_escape_string($link,$_POST['barcode'][$i]);
    $ingredient_name = mysqli_real_escape_string($link,$_POST['ingredient_name'][$i]);
    $qty = mysqli_real_escape_string($link,$_POST['qty'][$i]);
    $rate = mysqli_real_escape_string($link,$_POST['rate'][$i]);
    $unit = mysqli_real_escape_string($link,$_POST['unit'][$i]);
    $line_discount_type = $_POST['line_discount_type'][$i];
    $line_discount = mysqli_real_escape_string($link,$_POST['line_discount'][$i]);
    $line_discount_total = mysqli_real_escape_string($link,$_POST['line_discount_total'][$i]);
    $mrp_price = mysqli_real_escape_string($link,$_POST['mrp_price'][$i]);
    $selling_price = mysqli_real_escape_string($link,$_POST['selling_price'][$i]);
    $wholesale_price = mysqli_real_escape_string($link,$_POST['wholesale_price'][$i]);
    $tax = mysqli_real_escape_string($link,$_POST['tax'][$i]);
    $tax_total = mysqli_real_escape_string($link,$_POST['tax_total'][$i]);
    $line_total = mysqli_real_escape_string($link,$_POST['line_total'][$i]);
    $batch_no = mysqli_real_escape_string($link,$_POST['batch_no'][$i]);
    $expiry_date = mysqli_real_escape_string($link,$_POST['expiry_date'][$i]);
    mysqli_query($link,"INSERT INTO `purchaseingredientreturndetails_tbl` (`id`, `purchaseingredientreturndetails_id`, `company_id`, `branch_id`, `purchaseingredientreturn_id`, `purchaseingredientreturn_date`, `po_no`, `po_date`, `invoice_no`, `invoice_date`, `vendor_id`, `vendor_name`, `ingredient_id`, `ingredientcode`, `barcode`, `ingredient_name`, `qty`, `rate`, `unit`, `line_discount_type`, `line_discount`, `line_discount_total`, `mrp_price`, `selling_price`, `wholesale_price`, `tax`, `tax_total`, `line_total`, `batch_no`, `expiry_date`, `sort_order`, `status`, `ip_address`, `browser`, `date`, `created_by`, `approved_by`) VALUES (NULL, '$purchaseingredientreturndetails_id', '$company_id', '$branch_id', '$purchaseingredientreturn_id', '$purchaseingredientreturn_date', '$po_no', '$po_date', '$invoice_no', '$invoice_date', '$vendor_id', '$vendor_name', '$ingredient_id', '$ingredientcode', '$barcode', '$ingredient_name', '$qty', '$rate', '$unit', '$line_discount_type', '$line_discount', '$line_discount_total', '$mrp_price', '$selling_price', '$wholesale_price', '$tax', '$tax_total', '$line_total', '$batch_no', '$expiry_date', '$sort_order', 'active', '$ip_address', '$browser', '$date', '$created_by', '$approved_by')");
    
    //Stock Module
    list($count) = mysqli_fetch_row(mysqli_query($link,"select count(id) as count from stockingredient_tbl where company_id='$company_id' and branch_id='$branch_id' and ingredient_id='$ingredient_id' and ingredientcode='$ingredientcode' and ingredient_name='$ingredient_name' and batch_no='$batch_no' and expiry_date='$expiry_date' and vendor_id='$vendor_id' and vendor_name='$vendor_name' and mrp_price='$mrp_price'"));
    if($count > 0){
        list($stockingredient_id,$avail_qty) = mysqli_fetch_row(mysqli_query($link,"select `stockingredient_id`,`qty` from stockingredient_tbl where company_id='$company_id' and branch_id='$branch_id' and ingredient_id='$ingredient_id' and ingredientcode='$ingredientcode' and ingredient_name='$ingredient_name' and batch_no='$batch_no' and expiry_date='$expiry_date' and vendor_id='$vendor_id' and vendor_name='$vendor_name' and mrp_price='$mrp_price'"));
        $new_qty = $avail_qty - $qty;
        mysqli_query($link,"update stockingredient_tbl set `qty`='$new_qty' where stockingredient_id='$stockingredient_id'");
    }
    else
    {	
    $max_id = maxOfAll("id","stockingredient_tbl");
    $max_id=$max_id+1;
    $stockingredient_id="sto-".$max_id;
    mysqli_query($link,"INSERT INTO `stockingredient_tbl` (`id`, `stockingredient_id`, `company_id`, `branch_id`, `ingredient_id`, `ingredientcode`, `barcode`, `ingredient_name`, `qty`, `batch_no`, `expiry_date`, `vendor_id`, `vendor_name`, `mrp_price`, `cost_price`, `selling_price`, `offer_price`, `wholesale_price`, `tax`, `status`, `ip_address`, `browser`, `date`, `created_by`, `approved_by`) VALUES (NULL, '$stockingredient_id', '$company_id', '$branch_id', '$ingredient_id', '$ingredientcode', '$barcode', '$ingredient_name', '$qty', '$batch_no', '$expiry_date', '$vendor_id', '$vendor_name', '$mrp_price', '$rate', '$selling_price', '$offer_price', '$wholesale_price', '$tax', '$status', '$ip_address', '$browser', '$date', '$created_by', '$approved_by')");
    }
    
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
    $id = mysqli_real_escape_string($link,$_POST['id']);
    $company_id = mysqli_real_escape_string($link,$_POST['company_id']);
    $branch_id = mysqli_real_escape_string($link,$_POST['branch_id']);
    $purchaseingredientreturn_id = mysqli_real_escape_string($link,$_POST['purchaseingredientreturn_id']);	
    $purchaseingredientreturn_date = mysqli_real_escape_string($link,$_POST['purchaseingredientreturn_date']);
    $po_no = mysqli_real_escape_string($link,$_POST['po_no']);
    $po_date = mysqli_real_escape_string($link,$_POST['po_date']);
    $invoice_no = mysqli_real_escape_string($link,$_POST['invoice_no']);
    $invoice_date = mysqli_real_escape_string($link,$_POST['invoice_date']);
    $vendor_id = mysqli_real_escape_string($link,$_POST['vendor_id']);
    list($vendor_name) = mysqli_fetch_row(mysqli_query($link,"select `company_name` from vendor_tbl where vendor_id='$vendor_id'"));
    //$financial_year = mysqli_real_escape_string($link,$_POST['financial_year']);
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
    $sort_order = mysqli_real_escape_string($link,$_POST['sort_order']);
    $status = mysqli_real_escape_string($link,$_POST['status']);
    if(mysqli_query($link,"UPDATE `purchaseingredientreturn_tbl` SET `company_id` = '$company_id', `branch_id` = '$branch_id', `purchaseingredientreturn_id` = '$purchaseingredientreturn_id', `purchaseingredientreturn_date` = '$purchaseingredientreturn_date', `po_no` = '$po_no', `po_date` = '$po_date', `invoice_no` = '$invoice_no', `invoice_date` = '$invoice_date', `vendor_id` = '$vendor_id', `vendor_name` = '$vendor_name', `financial_year` = '$financial_year', `total_lineitems` = '$total_lineitems', `total_qty` = '$total_qty', `total_tax` = '$total_tax', `total_linediscount` = '$total_linediscount', `sub_total` = '$sub_total', `flatrate_discount` = '$flatrate_discount', `percentage_discount` = '$percentage_discount', `total_overalldiscount` = '$total_overalldiscount', `grand_total` = '$grand_total', `paid_amount` = '$paid_amount', `payment_id` = '$payment_id', `balance_amount` = '$balance_amount', `description` = '$description', `ip_address` = '$ip_address', `browser` = '$browser', `date` = '$date', `created_by` = '$created_by', `approved_by` = '$approved_by' WHERE `purchaseingredientreturn_id`='$purchaseingredientreturn_id'")){
    
    //Accounting Module
    $payment_mode = $_POST['payment_mode'];
    $paymodes = implode(",",$payment_mode);
    $type = "credit";
    $payment_type = "purchaseingredientreturn";//sales
    mysqli_query($link,"UPDATE `accounts_tbl` SET `company_id` = '$company_id', `branch_id` = '$branch_id', `date` = '$date', `type` = '$type', `amount` = '$paid_amount', `payer` = '$customer_name', `category` = '$payment_type', `payment_mode` = '$paymodes', `card_no` = '$card_no', `cheque_no` = '$cheque_no', `cheque_dt` = '$cheque_dt', `trans_no` = '$trans_no', `description` = '$payment_desc', `invoice_no` = '$invoice_no', `subinvoice_no` = '$subinvoice_no', `bank_account` = '$bank_account', `sort_order` = '$sort_order', `status` = '$status', `ip_address` = '$ip_address', `browser` = '$browser', `created_by` = '$created_by', `approved_by` = '$approved_by' WHERE `autoid`='$payment_id'");
    
    mysqli_query($link,"delete from payment_tbl where payment_id='$payment_id'");
    
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
    
    //Stock Module
    $sel_qty = mysqli_query($link,"select `ingredient_id`,`qty` from purchaseingredientreturndetails_tbl where `purchaseingredientreturn_id`='$purchaseingredientreturn_id'");
    while($row_qty = mysqli_fetch_object($sel_qty)){
        $oldingredient[] = $row_qty->ingredient_id.",".$row_qty->qty;
    }
    //End Stock Module
    
    mysqli_query($link,"delete from purchaseingredientreturndetails_tbl where `purchaseingredientreturn_id`='$purchaseingredientreturn_id'");
    $ingredient_id1 = $_POST['ingredient_id'];
    $i=0;
    foreach($ingredient_id1 as $ingredient_id2){
    $max_id = maxOfAll("id","purchaseingredientreturndetails_tbl");
    $max_id=$max_id+1;
    $purchaseingredientreturndetails_id="pdr-".$max_id;		
    $ingredient_id = mysqli_real_escape_string($link,$_POST['ingredient_id'][$i]);
    $ingredientcode = mysqli_real_escape_string($link,$_POST['ingredientcode'][$i]);
    $barcode = mysqli_real_escape_string($link,$_POST['barcode'][$i]);
    $ingredient_name = mysqli_real_escape_string($link,$_POST['ingredient_name'][$i]);
    $qty = mysqli_real_escape_string($link,$_POST['qty'][$i]);
    $rate = mysqli_real_escape_string($link,$_POST['rate'][$i]);
    $unit = mysqli_real_escape_string($link,$_POST['unit'][$i]);
    $line_discount_type = $_POST['line_discount_type'][$i];
    $line_discount = mysqli_real_escape_string($link,$_POST['line_discount'][$i]);
    $line_discount_total = mysqli_real_escape_string($link,$_POST['line_discount_total'][$i]);
    $mrp_price = mysqli_real_escape_string($link,$_POST['mrp_price'][$i]);
    $selling_price = mysqli_real_escape_string($link,$_POST['selling_price'][$i]);
    $wholesale_price = mysqli_real_escape_string($link,$_POST['wholesale_price'][$i]);
    $tax = mysqli_real_escape_string($link,$_POST['tax'][$i]);
    $tax_total = mysqli_real_escape_string($link,$_POST['tax_total'][$i]);
    $line_total = mysqli_real_escape_string($link,$_POST['line_total'][$i]);
    $batch_no = mysqli_real_escape_string($link,$_POST['batch_no'][$i]);
    $expiry_date = mysqli_real_escape_string($link,$_POST['expiry_date'][$i]);
    
    mysqli_query($link,"INSERT INTO `purchaseingredientreturndetails_tbl` (`id`, `purchaseingredientreturndetails_id`, `company_id`, `branch_id`, `purchaseingredientreturn_id`, `purchaseingredientreturn_date`, `po_no`, `po_date`, `invoice_no`, `invoice_date`, `vendor_id`, `vendor_name`, `ingredient_id`, `ingredientcode`, `barcode`, `ingredient_name`, `qty`, `rate`, `unit`, `line_discount_type`, `line_discount`, `line_discount_total`, `mrp_price`, `selling_price`, `wholesale_price`, `tax`, `tax_total`, `line_total`, `batch_no`, `expiry_date`, `sort_order`, `status`, `ip_address`, `browser`, `date`, `created_by`, `approved_by`) VALUES (NULL, '$purchaseingredientreturndetails_id', '$company_id', '$branch_id', '$purchaseingredientreturn_id', '$purchaseingredientreturn_date', '$po_no', '$po_date', '$invoice_no', '$invoice_date', '$vendor_id', '$vendor_name', '$ingredient_id', '$ingredientcode', '$barcode', '$ingredient_name', '$qty', '$rate', '$unit', '$line_discount_type', '$line_discount', '$line_discount_total', '$mrp_price', '$selling_price', '$wholesale_price', '$tax', '$tax_total', '$line_total', '$batch_no', '$expiry_date', '$sort_order', 'active', '$ip_address', '$browser', '$date', '$created_by', '$approved_by')");
    
    //Stock Module
    list($count) = mysqli_fetch_row(mysqli_query($link,"select count(id) as count from stockingredient_tbl where company_id='$company_id' and branch_id='$branch_id' and ingredient_id='$ingredient_id' and ingredientcode='$ingredientcode' and ingredient_name='$ingredient_name' and batch_no='$batch_no' and expiry_date='$expiry_date' and vendor_id='$vendor_id' and vendor_name='$vendor_name' and mrp_price='$mrp_price'"));
    if($count > 0){
        list($stockingredient_id,$ingredient_id,$avail_qty) = mysqli_fetch_row(mysqli_query($link,"select `stockingredient_id`,`ingredient_id`,`qty` from stockingredient_tbl where company_id='$company_id' and branch_id='$branch_id' and ingredient_id='$ingredient_id' and ingredientcode='$ingredientcode' and ingredient_name='$ingredient_name' and batch_no='$batch_no' and expiry_date='$expiry_date' and vendor_id='$vendor_id' and vendor_name='$vendor_name' and mrp_price='$mrp_price'"));
        foreach($oldingredient as $pro){
            //echo $pro;
            $prod = explode(",",$pro);
            $oldingredient_id = $prod[0];
            $oldqty = $prod[1];
            if($oldingredient_id == $ingredient_id){
                if($oldqty != $qty){
                    $new_qty = $avail_qty + $oldqty - $qty;
                    mysqli_query($link,"update stockingredient_tbl set `qty`='$new_qty' where stockingredient_id='$stockingredient_id'");
                }
            }
        }
    }
    else
    {	
    $max_id = maxOfAll("id","stockingredient_tbl");
    $max_id=$max_id+1;
    $stockingredient_id="sto-".$max_id;
    mysqli_query($link,"INSERT INTO `stockingredient_tbl` (`id`, `stockingredient_id`, `company_id`, `branch_id`, `ingredient_id`, `ingredientcode`, `barcode`, `ingredient_name`, `qty`, `batch_no`, `expiry_date`, `vendor_id`, `vendor_name`, `mrp_price`, `cost_price`, `selling_price`, `offer_price`, `wholesale_price`, `tax`, `status`, `ip_address`, `browser`, `date`, `created_by`, `approved_by`) VALUES (NULL, '$stockingredient_id', '$company_id', '$branch_id', '$ingredient_id', '$ingredientcode', '$barcode', '$ingredient_name', '$qty', '$batch_no', '$expiry_date', '$vendor_id', '$vendor_name', '$mrp_price', '$rate', '$selling_price', '$offer_price', '$wholesale_price', '$tax', '$status', '$ip_address', '$browser', '$date', '$created_by', '$approved_by')");
    }
    
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
                        <div class="col-lg-6"><h3 class="box-heading"> Purchase Ingredient Return <small>Add / Update  Details</small></h3></h3></div>
                        <div class="col-lg-6">
                          <div class="breadcrumb">
                            <a href="index.php" class="breadcrumb_a">Home</a> 
                            <i class="fa fa-angle-double-right angle_double_right"></i>
                            <a href="purchaseingredientreturn_view.php" class="breadcrumb_a">Purchase Ingredient Return </a> 
                            <i class="fa fa-angle-double-right angle_double_right" aria-hidden="true"></i>
                            <a href="#" class="breadcrumb_a">Add / Update Purchase Ingredient Return </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="box-body">
                      <!-- <h5 class="second_heading">Add City</h5> -->
                      <form method="post" class="padding-10" enctype="multipart/form-data">
                        <?php
$purchaseingredientreturn_id = mysqli_real_escape_string($link,$_GET['purchaseingredientreturn_id']);
$update = mysqli_real_escape_string($link,$_GET['update']);
if($update == "yes"){
$sel_row = mysqli_query($link,"select * from purchaseingredientreturn_tbl where `purchaseingredientreturn_id`='$purchaseingredientreturn_id'");
$row = mysqli_fetch_object($sel_row);
$upload_id = $row->purchaseingredientreturn_id;
$payment_id = $row->payment_id;
$sel_payment = mysqli_query($link,"select * from payment_tbl where `payment_id`='$payment_id'");
$row_payment = mysqli_fetch_object($sel_payment);
}
else
{
$max_id = maxOfAll("id","purchaseingredientreturn_tbl");
$max_id=$max_id+1;
$upload_id="pur_re-".$max_id;
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
        <label class="margin-left-10" for="industry_name">Purchase Ingredient Return Id</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
        <input type="text" class="form-control" name="purchaseingredientreturn_id" id="purchaseingredientreturn_id" placeholder="Enter the Purchase Ingredient Return Id" value="<?php echo $upload_id; ?>" readonly="readonly">
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
        <label class="margin-left-10" for="industry_name">Purchase Ingredient Return Date</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
        <input type="date" class="form-control" name="purchaseingredientreturn_date" id="purchaseingredientreturn_date" placeholder="Enter the Purchase Ingredient Return Date" value="<?php echo $row->purchaseingredientreturn_date; ?>" required="required">
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
        <label class="margin-left-10" for="industry_name">Invoice No</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
            <input type="text" class="form-control" name="invoice_no" id="invoice_no" placeholder="Enter the Invoice No" value="<?php echo $row->invoice_no; ?>" required="required">
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Invoice Date</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
        <input type="date" class="form-control" name="invoice_date" id="invoice_date" placeholder="Enter the Invoice Date" value="<?php echo $row->invoice_date; ?>" required="required">
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
        <input class="form-control" type="text" name="search_ingredient" id="search_ingredient" placeholder="Search By Ingredient Id (or) Ingredient Code (or) Barcode (or) HSN Code (or) Ingredient Name" />
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
				<th>Ingredient</th>
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
			<tr class="purchaseingredientreturn_details"></tr>
			  <?php
			  if($update == "yes"){
			  $i = 0;
			  $sel = mysqli_query($link,"select * from purchaseingredientreturndetails_tbl where purchaseingredientreturn_id='$purchaseingredientreturn_id'");
			  while($row_purchaseingredientreturn = mysqli_fetch_object($sel)){
			  ?>
			  <tr class="purchaseingredientreturn_details" id="<?php echo $row_purchaseingredientreturn->ingredient_id; ?>">
				<td width="25%">
					<input class="form-control" type="hidden" name="ingredient_id[]" id="ingredient_id<?php echo $i; ?>" value="<?php echo $row_purchaseingredientreturn->ingredient_id; ?>">
					<input class="form-control" type="hidden" name="ingredientcode[]" id="ingredientcode<?php echo $i; ?>" value="<?php echo $row_purchaseingredientreturn->ingredientcode; ?>">
					<input class="form-control" type="hidden" name="barcode[]" id="barcode<?php echo $i; ?>" value="<?php echo $row_purchaseingredientreturn->barcode; ?>">
					<textarea class="form-control" name="ingredient_name[]" id="ingredient_name<?php echo $i; ?>"><?php echo $row_purchaseingredientreturn->ingredient_name; ?></textarea>
					<table>
						<tr>
							<td><b>Expiry Date</b></td>
							<td><b>Batch No</b></td>
						</tr>
						<tr>
							<td><input class="form-control" type="date" name="expiry_date[]" id="expiry_date<?php echo $i; ?>" value="<?php echo $row_purchaseingredientreturn->expiry_date; ?>"></td>
							<td><input class="form-control" type="text" name="batch_no[]" id="batch_no<?php echo $i; ?>" value="<?php echo $row_purchaseingredientreturn->batch_no; ?>"></td>
						</tr>
					</table>
				</td>
				<td width="5%">
				<input class="form-control qty" type="text" name="qty[]" id="qty<?php echo $i; ?>" value="<?php echo $row_purchaseingredientreturn->qty; ?>" onblur="update_linetotal(<?php echo $i; ?>)">
				</td>
				<td width="10%">
				<input class="form-control" type="text" name="rate[]" id="rate<?php echo $i; ?>" value="<?php echo $row_purchaseingredientreturn->rate; ?>" onblur="update_linetotal(<?php echo $i; ?>)">
				</td>
				<td width="10%">
				<input class="form-control" type="text" name="unit[]" id="unit<?php echo $i; ?>" value="<?php echo $row_purchaseingredientreturn->unit; ?>">
				</td>
				<td width="15%">
				<input class="form-control" type="text" name="mrp_price[]" id="mrp_price<?php echo $i; ?>" placeholder="MRP Price" value="<?php echo $row_purchaseingredientreturn->mrp_price; ?>">
				<input class="form-control" type="text" name="selling_price[]" id="selling_price<?php echo $i; ?>" placeholder="Selling Price" value="<?php echo $row_purchaseingredientreturn->selling_price; ?>">
				<input class="form-control" type="text" name="wholesale_price[]" id="wholesale_price<?php echo $i; ?>" placeholder="Wholesale" value="<?php echo $row_purchaseingredientreturn->wholesale_price; ?>">
				</td>
				<td width="15%">
				<select name="line_discount_type[]" id="line_discount_type<?php echo $i; ?>" class="form-control" onchange="update_linetotal(<?php echo $i; ?>)">
						<option value="no discount" <?php if($row_purchaseingredientreturn->line_discount_type == "no discount"){ echo "selected"; } ?>>No Discount</option>
						<option value="flatrate" <?php if($row_purchaseingredientreturn->line_discount_type == "flatrate"){ echo "selected"; } ?>>Flat Rate</option>
						<option value="percentage" <?php if($row_purchaseingredientreturn->line_discount_type == "percentage"){ echo "selected"; } ?>>Percentage</option>
				</select>
				<input class="form-control" type="text" name="line_discount[]" id="line_discount<?php echo $i; ?>" placeholder="Value" value="<?php echo $row_purchaseingredientreturn->line_discount; ?>" onblur="update_linetotal(<?php echo $i; ?>)">
				<input class="form-control linediscount" type="text" name="line_discount_total[]" id="line_discount_total<?php echo $i; ?>" placeholder="Total" value="<?php echo $row_purchaseingredientreturn->line_discount_total; ?>" readonly>
				</td>
				<td width="10%">
				<input class="form-control" type="text" name="tax[]" id="tax<?php echo $i; ?>" value="<?php echo $row_purchaseingredientreturn->tax; ?>" onblur="update_linetotal(<?php echo $i; ?>)">
				<input class="form-control taxvalue" type="text" name="tax_total[]" id="tax_total<?php echo $i; ?>" value="<?php echo $row_purchaseingredientreturn->tax_total; ?>">
				</td>
				<td width="10%">
				<input class="form-control price" type="text" name="line_total[]" id="line_total<?php echo $i; ?>" value="<?php echo $row_purchaseingredientreturn->line_total; ?>">
				</td>
				<td>
				<a class="purchaseingredientreturndel" href="javascript:;" title="Remove row"><i class="fa fa-close"></i></a>
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
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-pad">
			<div class="form-group row">
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
				<label for="grand_total">Paid Amount</label>
				</div>
				<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
				<input type="text" class="form-control" name="paid_amount" id="paid_amount" placeholder="Enter the Paid Amount" value="<?php echo $row->paid_amount; ?>" required="required" onClick="update_balance()" onkeyup="update_balance()">
				</div>
			</div>
		</div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-pad">
			<div class="form-group row">
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
				<label for="grand_total">Balance Amount</label>
				</div>
				<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
				<input type="text" class="form-control" name="balance_amount" id="balance_amount" placeholder="Enter the Balance Amount" value="<?php echo $row->balance_amount; ?>" required="required" readonly>
				</div>
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
							<th>Ingredient Id</th>
							<th>Ingredient Name</th>
							<th>Ingredient Code</th>
							<th>Bar Code</th>
							<th>Batch No</th>
							<th>Expiry Date</th>
							<th>MRP</th>
							<th>Cost Price</th>
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
$('#invoice_date').val(today);
$('#po_date').val(today);
$('#purchaseingredientreturn_date').val(today);	
$('#search_ingredient').focus();  
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
	$('#paid_amount').val("0.00");
	$('#balance_amount').val("0.00");
	$('#cash_tender').val("0.00");
	$('#card_tender').val("0.00");
	$('#cheque_tender').val("0.00");
	$('#netbanking_tender').val("0.00");
	$('#creditnote_tender').val("0.00");
}
});
$('#search_ingredient').keypress(function (e) {
    
 var key = e.which;
 if(key == 13)  // the enter key code
  {
     e.preventDefault();
	 get_ingredient();
	 return false;
  }
});
function get_ingredient(){
	var q = $("#search_ingredient").val();
	$.ajax({
          type: "POST",
          url: 'get_ingredients.php',
		  data: 'q='+q,
          //data: $("#membershipForm").serialize(),
          success:function(data){
            var responseData = jQuery.parseJSON(data);
			if(responseData!="null"){
          	var ingredient_id = responseData.ingredient_id;
          	var ingredientcode = responseData.ingredientcode;
          	var ingredient_name = responseData.ingredient_name;
			var barcode = responseData.barcode;
			var unit = responseData.unit;
			var tax = responseData.tax;
			var price_changeable = responseData.price_changeable;
			var stockable = responseData.stockable;
			var batch_stock = responseData.batch_stock;
			if(batch_stock == "yes"){
				$.get("purchaseingredient_getstock.php?ingredient_id="+ingredient_id, function(data) {
				$("#stock-list").html(data);
				$('#stock').modal('show');
				});
				$("#stock-list").one("click","tr.rows", function(e){
					//alert("entered stock");
					var ingredient_id = $(this).closest('tr').children('td.ingredient_id').text();
					var ingredient_name = $(this).closest('tr').children('td.ingredient_name').text();
					var ingredientcode = $(this).closest('tr').children('td.ingredientcode').text();
					var barcode = $(this).closest('tr').children('td.barcode').text();
					var batch_no = $(this).closest('tr').children('td.batch_no').text();
					var mrp_price = parseFloat($(this).closest('tr').children('td.mrp_price').text());
					var cost_price = $(this).closest('tr').children('td.cost_price').text();
					var selling_price = $(this).closest('tr').children('td.selling_price').text();
					var wholesale_price = $(this).closest('tr').children('td.wholesale_price').text();
					var expiry_date = $(this).closest('tr').children('td.expiry_date').text();
					var avail_stock = $(this).closest('tr').children('td.stock').text();
					var qty = "1";
					var discount = "0.00";
					var discounttotal = "0.00";
					var rowcount = $('.purchaseingredientreturn_details').length;
					//alert(rowcount);
					for(var i=1;i<=rowcount;i++){
						//alert(i);
						var check = $('#ingredient_id'+i).val();
						//alert(check);
						if (typeof check !== 'undefined'){
							if(ingredient_id == $('#ingredient_id'+i).val() && batch_no == $('#batch_no'+i).val()){
							var found = "yes";
							var j = i;
							break;
							}
							else
							{
							var found = "no";	
							var j = i;
							}
						}
						else
						{
							var found = "no";	
							var j = i;
						}	
					}
					//alert(found);
					//alert(j);
					if(found == "no"){
						if(qty < avail_stock){
						addrow(j,ingredient_id,ingredientcode,ingredient_name,barcode,expiry_date,batch_no,unit,qty,cost_price,mrp_price,selling_price,wholesale_price,tax,price_changeable,stockable);
						}
						else{
							alert("No stock available!");
						}
					}
					else
					{	
						var qty = $('#qty'+j).val();
						var newqty = parseFloat(qty)+1;
						if(newqty < avail_stock){
						$('#qty'+j).val(newqty);
						update_linetotal(j);
						}
						else{
							alert("No stock available!");
						}
					}
					if(price_changeable=="no")
					{
						$('#rate'+j).attr("readonly","readonly");
					}
					$('#stock').modal('hide');
				
			});
			}
			else{
				$.ajax({
				  type: "POST",
				  url: 'get_ingredientstock.php',
				  data: 'ingredient_id='+ingredient_id,
				  //data: $("#membershipForm").serialize(),
				  success:function(data){
					var responseData = jQuery.parseJSON(data);
						if(responseData!="null"){
								var ingredient_id = responseData.ingredient_id;
								var ingredient_name = responseData.ingredient_name;
								var ingredientcode = responseData.ingredientcode;
								var barcode = responseData.barcode;
								var batch_no = responseData.batch_no;
								var expiry_date = responseData.expiry_date;
								var mrp_price = responseData.mrp_price;
								var cost_price = responseData.cost_price;
								var selling_price = responseData.selling_price;
								var wholesale_price = responseData.wholesale_price;
								var avail_stock = responseData.avail_stock;
								var qty = "1";
								var discount = "0.00";
								var discounttotal = "0.00";
								var rowcount = $('.purchaseingredientreturn_details').length;
								var count = $('#'+ingredient_id).length;
								if(count < 1){
									if(qty < avail_stock){
										addrow(rowcount,ingredient_id,ingredientcode,ingredient_name,barcode,expiry_date,batch_no,unit,qty,cost_price,mrp_price,selling_price,wholesale_price,tax,price_changeable,stockable);
										var j = rowcount+1;
									}
									else
									{
										alert("No stock available!");
									}
								}
								else
								{
									for(var i=1;i<=rowcount;i++){
										if(ingredient_id == $('#ingredient_id'+i).val()){
											var qty = $('#qty'+i).val();
											var newqty = parseFloat(qty)+1;
											$('#qty'+i).val(newqty);
											update_linetotal(i);
											var j = i;
										}
									}
								}
								if(price_changeable=="no")
								{
									$('#rate'+j).attr("readonly","readonly");
								}
									
						}
						else{
							alert("No Ingredient Found!");
						}				
				}
			});	
			}
			}

			else
			{
				alert("No Ingredient Found!");
			}
			$('#search_ingredient').val("");
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
	paymentmode();
	$('#payment').modal('show');
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
function balance_calc(){
	var paid = $('#paid_amount').val();
	paid = parseFloat(paid).toFixed(2);
	$('#paid_amount').val(paid);
	var grand_total = $('#grand_total').val();
	var balance = parseFloat(grand_total)-parseFloat(paid);
	balance = balance.toFixed(2);
	$('#balance_amount').val(balance);
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
<script type="text/javascript" src="assets/js/purchaseingredientreturndetails_tbl.js"></script>
<script type="text/javascript" src="assets/js/jquery.autocomplete.js"></script>
<script type="text/javascript" src="assets/js/jquery-dynamic-form.js"></script>
 
</html>