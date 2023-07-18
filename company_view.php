 <?php 
include 'dbc.php'; 
page_protect();
$created_by = $_SESSION['userid'];
$approved_by = "";
$page = "company_view";

if($_GET['del'] == "yes"){
	$company_id=$_GET['company_id'];
    if(mysqli_query($link,"delete from `company_tbl` where `company_id`='$company_id'")){
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
	              				<div class="col-lg-6"><h3 class="box-heading"> Company <small>View Details</small></h3> </div>
	              				<div class="col-lg-6">
	              					<div class="breadcrumb">
	              						<a href="index.php" class="breadcrumb_a">Home</a> 
                            			<i class="fa fa-angle-double-right angle_double_right"></i>
		              					<a href="#" class="breadcrumb_a">Company </a> 
	              					</div>
	              				</div>
	              			</div>
	              		</div>
	              		<div class="box-body">
	              			<!-- <h5 class="second_heading">Add Industry</h5> -->
                   <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr>
		          <th>id</th>
					<th>Company_id</th>
					<th>Company Name</th>
					<th>Industry</th>
					<th>Company Type</th>
					<th>Company Address</th>
					<th>Country</th>
					<th>State</th>
					<th>District</th>
					<th>City</th>
					<th>Area</th>
					<th>Pincode</th>
					<th>Registraion Type</th>
					<th>Registration Date</th>
					<th>Registration No</th>
					<th>PAN No</th>
					<th>GST No</th>
					<th>Email Id</th>
					<th>Phone Number</th>
					<th>URL</th>
					<th>Facebook Page Link</th>
					<th>Twitter Page Link</th>
					<th>Youtube Page Link</th>
					<th>Account Name</th>
					<th>Bank Name</th>
					<th>Bank Branch</th>
					<th>IFSC Code</th>
					<th>Account Number</th>
					<th>Account Type</th>
					<th>Swift Code</th>
					<th>No Of Branches</th>
					<th>No Of Warehouse</th>
					<th>Company Logo</th>
					<th>Date</th>
					<th>IP Address</th>
					<th>Browser</th>
					<th>Created By</th>
					<th>Approved By</th>
					<th>Actions</th>
                </tr>
                </thead>
                <tbody>
        <?php
        $sel_rw = mysqli_query($link,"select * from company_tbl");
        while($row = mysqli_fetch_object($sel_rw)){
        ?>

                <tr>
          <td><?php echo $row->id; ?></td>
					<td><?php echo $row->company_id; ?></td>
					<td><?php echo $row->company_name; ?></td>
					<td><?php echo $row->industry; ?></td>
					<td><?php echo $row->company_type; ?></td>
					<td><?php echo $row->company_address; ?></td>
					<td><?php echo $row->company_country; ?></td>
					<td><?php echo $row->company_state; ?></td>
					<td><?php echo $row->company_district; ?></td>
					<td><?php echo $row->company_city; ?></td>
					<td><?php echo $row->company_area; ?></td>
					<td><?php echo $row->company_pincode; ?></td>
					<td><?php echo $row->reg_type; ?></td>
					<td><?php echo $row->reg_date; ?></td>
					<td><?php echo $row->reg_no; ?></td>
					<td><?php echo $row->pan_no; ?></td>
					<td><?php echo $row->gst_no; ?></td>
					<td><?php echo $row->company_email_id; ?></td>
					<td><?php echo $row->phone_number; ?></td>
					<td><?php echo $row->company_url; ?></td>
					<td><?php echo $row->facebook_link; ?></td>
					<td><?php echo $row->twitter_link; ?></td>
					<td><?php echo $row->youtube_link; ?></td>
					<td><?php echo $row->account_name; ?></td>
					<td><?php echo $row->account_bank; ?></td>
					<td><?php echo $row->account_branch; ?></td>
					<td><?php echo $row->account_ifsc; ?></td>
					<td><?php echo $row->account_number; ?></td>
					<td><?php echo $row->account_type; ?></td>
					<td><?php echo $row->account_swift; ?></td>
					<td><?php echo $row->branches; ?></td>
					<td><?php echo $row->warehouse; ?></td>
					<td><?php echo $row->logo; ?></td>
					<td><?php echo $row->date; ?></td>
					<td><?php echo $row->ip_address; ?></td>
					<td><?php echo $row->browser; ?></td>
					<td><?php echo $row->created_by; ?></td>
					<td><?php echo $row->approved_by; ?></td>
					<td>
						<a href="company_add.php?company_id=<?php echo $row->company_id; ?>&update=yes" title="Edit Details"><i class="fa fa-edit"></i></a>
						<a href="company_view.php?company_id=<?php echo $row->company_id; ?>&del=yes" title="Delete Details"><i class="fa fa-trash"></i></a>
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
  <script type="text/javascript">
    $(document).ready(function() {
      $(".cart-expand").hide();
    });
    $(".appicon").click(function(e) {
      $(".cart-expand").toggle();
      e.stopPropagation();
    });
    $(".cart-expand").click(function(e) {
      e.stopPropagation();
    });
    $(document).click(function() {
      $(".cart-expand").hide();
    });
  </script>

 
</html>