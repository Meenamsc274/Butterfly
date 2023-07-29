<?php 
include 'dbc.php'; 
page_protect();
$created_by = $_SESSION['userid'];
$approved_by = "";
$page = "salesreturn_view"; ?>
<?php /*if($_GET['del'] == "yes"){
	$id=$_GET['id'];
    if(mysql_query("delete from `salesreturn_tbl` where `id`='$id'")){
		$msg[] = "Successfully Deleted!";
	}
	else
	{
		$err[] = "Error - Failed To Delete!";
	}	
	}*/
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
	              				<div class="col-lg-6"><h3 class="box-heading">Sales Return Details <small>View Details</small></h3> </div>
	              				<div class="col-lg-6">
	              					<div class="breadcrumb">
	              						<a href="index.php" class="breadcrumb_a">Home</a> 
                            			<i class="fa fa-angle-double-right angle_double_right"></i>
		              					<a href="#" class="breadcrumb_a">Sales Return Details </a> 
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
					<th>Invoice No</th>
					<th>Invoice Date</th>
					<th>Financial Year</th>
					<th>Total Tax</th>
					<th>Sub Total</th>
					<th>Grand Total</th>
					<th>Paid Amount</th>
					<th>Balance Amount</th>
					<th>Total Line Discount</th>
					<th>Overall Discount Flat Rate</th>
					<th>Overall Discount Percentage</th>
					<th>Overall Discount Total</th>
					<th>Total Line Items</th>
					<th>Total Qty</th>
					<th>Company</th>
					<th>Branch</th>
					<th>Customer</th>
					<th>Description</th>
                </tr>
                </thead>
                <tbody>
       <?php
				if($_GET['submit']=="Search"){
					$sel_date = mysqli_real_escape_string($link,$_GET['sel_date']);
					$split_date = explode("-",$sel_date);
					$from_date = date("Y-m-d",strtotime($split_date[0]));
					$to_date = date("Y-m-d",strtotime($split_date[1]));
					$sel_rw = mysqli_query($link,"select * from salesreturn_tbl where `invoice_date` between '$from_date' and '$to_date'");
				}
				else
				{
					$sel_rw = mysqli_query($link,"select * from salesreturn_tbl");
				}
				while($row = mysqli_fetch_object($sel_rw)){
				?>

                <tr>
					<td><?php echo $row->id; ?></td>
					<td><?php echo $row->invoice_no; ?></td>
					<td><?php echo $row->invoice_date; ?></td>
					<td><?php echo $row->financial_year; ?></td>
					<td><?php echo $row->total_tax; ?></td>
					<td><?php echo $row->sub_total; ?></td>
					<td><?php echo $row->grand_total; ?></td>
					<td><?php echo $row->paid_amount; ?></td>
					<td><?php echo $row->balance_amount; ?></td>
					<td><?php echo $row->total_linediscount; ?></td>
					<td><?php echo $row->flatrate_discount; ?></td>
					<td><?php echo $row->percentage_discount; ?></td>
					<td><?php echo $row->total_overalldiscount; ?></td>
					<td><?php echo $row->total_lineitems; ?></td>
					<td><?php echo $row->total_qty; ?></td>
					<td><?php echo get_company($row->company_id); ?></td>
					<td><?php echo get_branch($row->branch_id); ?></td>
					<td><?php echo get_customer($row->customer_id); ?></td>
					<td><?php echo $row->description; ?></td>
					<td><?php echo $row->salesreturn_id; ?></td>
					<td><?php echo $row->ip_address; ?></td>
					<td><?php echo $row->browser; ?></td>
					<td><?php echo $row->date; ?></td>
					<td><?php echo $row->created_by; ?></td>
					<td><?php echo $row->approved_by; ?></td>
					<td>
						<a href="returninvoice.php?invoice_no=<?php echo $row->invoice_no; ?>" title="View / Print Invoice"><i class="fa fa-eye"></i></a>
						<a href="returndc.php?invoice_no=<?php echo $row->invoice_no; ?>" title="View / Print DC"><i class="fa fa-eye"></i></a>
						<a href="salesdetails_add.php?salesreturn_id=<?php echo $row->salesreturn_id; ?>&update=yes" title="Edit Invoice"><i class="fa fa-edit"></i></a>
					</td>
				</tr>
				<?php } ?> </tbody>
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