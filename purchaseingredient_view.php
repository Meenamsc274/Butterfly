<?php 
include 'dbc.php'; 
page_protect();
$created_by = $_SESSION['userid'];
$approved_by = "";
$page = "purchaseingredient_view"; ?>
<?php if($_GET['del'] == "yes"){
	$purchaseingredient_id = $_GET['purchaseingredient_id'];
    if(mysqli_query($link,"delete from `purchase_tbl` where `purchaseingredient_id`='$purchaseingredient_id'")){
		$msg[] = "Successfully Deleted!";
	}
	else
	{
		$err[] = "Error - Failed To Delete!";
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
    
  </head>
  <body>
    <div class="page-wrapper"> <?php include 'assets/common/header.php';?> 
    	<section class="side-bar">
        	<div class="row"> <?php include 'assets/common/left-sidebar.php';?> <div class="col-lg-10">
            	<div class="container box-bg">
            		<div class="box">
	              		<div class="box-header">
	              			<div class="row">
	              				<div class="col-lg-6"><h3 class="box-heading"> Purchase Ingredient <small>View Details</small></h3> </div>
	              				<div class="col-lg-6">
	              					<div class="breadcrumb">
	              						<a href="index.php" class="breadcrumb_a">Home</a> 
                            			<i class="fa fa-angle-double-right angle_double_right"></i>
		              					<a href="#" class="breadcrumb_a">Purchase Ingredient Details </a> 
	              					</div>
	              				</div>
	              			</div>
	              		</div>
	              		<div class="box-body">
	              			<!-- <h5 class="second_heading">Add Industry</h5> -->
                   <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr>
		        <th>Id</th>
					<th>Purchase Details Id</th>
					<th>Company Id</th>
					<th>Branch Id</th>
					<th>Purchase Id</th>
					<th>Purchase Date</th>
					<th>PO Number</th>
					<th>PO Date</th>
					<th>Invoice No</th>
					<th>Invoice Date</th>
					<th>Vendor Code</th>
					<th>Vendor Name</th>
					<th>Ingredient Id</th>
					<th>Ingredient Code</th>
					<th>Barcode</th>
					<th>Ingredient Name</th>
					<th>Qty</th>
					<th>Rate</th>
					<th>Unit</th>
					<th>Line Discount Type</th>
					<th>Line Discount Value</th>
					<th>MRP Price</th>
					<th>Cost Price</th>
					<th>Selling Price</th>
					<th>Wholesale Price</th>
					<th>Tax</th>
					<th>Batch No</th>
					<th>Expiry Date</th>
					<th>Sort Order</th>
					<th>Status</th>
					<th>IP Address</th>
					<th>Browser</th>
					<th>Date</th>
					<th>Created By</th>
					<th>Approved By</th>
					<th>Actions</th>
                </tr>
                </thead>
                <tbody>
        <?php
        $sel_rw = mysqli_query($link,"select * from purchaseingredient_tbl");
        while($row = mysqli_fetch_object($sel_rw)){
        ?>

                <tr>
                <td><?php echo $row->id; ?></td>
					<td><?php echo $row->purchaseingredient_id; ?></td>
					<td><?php echo $row->company_id; ?></td>
					<td><?php echo $row->branch_id; ?></td>
					<td><?php echo $row->purchase_id; ?></td>
					<td><?php echo $row->purchase_date; ?></td>
					<td><?php echo $row->po_no; ?></td>
					<td><?php echo $row->po_date; ?></td>
					<td><?php echo $row->invoice_no; ?></td>
					<td><?php echo $row->invoice_date; ?></td>
					<td><?php echo $row->vendor_code; ?></td>
					<td><?php echo $row->vendor_name; ?></td>
					<td><?php echo $row->ingredient_id; ?></td>
					<td><?php echo $row->ingredientcode; ?></td>
					<td><?php echo $row->barcode; ?></td>
					<td><?php echo $row->ingredient_name; ?></td>
					<td><?php echo $row->qty; ?></td>
					<td><?php echo $row->rate; ?></td>
					<td><?php echo $row->unit; ?></td>
					<td><?php echo $row->line_discount_type; ?></td>
					<td><?php echo $row->line_discount; ?></td>
					<td><?php echo $row->mrp_price; ?></td>
					<td><?php echo $row->cost_price; ?></td>
					<td><?php echo $row->selling_price; ?></td>
					<td><?php echo $row->wholesale_price; ?></td>
					<td><?php echo $row->tax; ?></td>
					<td><?php echo $row->batch_no; ?></td>
					<td><?php echo $row->expiry_date; ?></td>
					<td><?php echo $row->sort_order; ?></td>
					<td><?php echo $row->status; ?></td>
					<td><?php echo $row->ip_address; ?></td>
					<td><?php echo $row->browser; ?></td>
					<td><?php echo $row->date; ?></td>
					<td><?php echo $row->created_by; ?></td>
					<td><?php echo $row->approved_by; ?></td>
					<td>
						<a href="purchaseingredientdetails_add.php?purchaseingredient_id=<?php echo $row->purchaseingredient_id; ?>&update=yes" title="Edit Details"><i class="fa fa-edit"></i></a>
						<a href="purchaseingredient_view.php?purchaseingredient_id=<?php echo $row->purchaseingredient_id; ?>&del=yes" title="Delete Details"><i class="fa fa-trash"></i></a>
					</td>
        </tr>
        <?php } ?>
                </tbody>
              </table>
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
  
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
  

 
</html>