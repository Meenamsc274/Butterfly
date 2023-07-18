 <?php 
include 'dbc.php'; 
page_protect();
$created_by = $_SESSION['userid'];
$approved_by = "";
$page = "branch_view"; ?>
<?php if($_GET['del'] == "yes"){
	$branch_id=$_GET['branch_id'];
    if(mysqli_query($link,"delete from `branch_tbl` where `branch_id`='$branch_id'")){
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
	              				<div class="col-lg-6"><h3 class="box-heading"> Branch <small>View Details</small></h3> </div>
	              				<div class="col-lg-6">
	              					<div class="breadcrumb">
	              						<a href="index.php" class="breadcrumb_a">Home</a> 
                            			<i class="fa fa-angle-double-right angle_double_right"></i>
		              					<a href="#" class="breadcrumb_a">Branch </a> 
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
					<th>Branch Id</th>
					<th>Branch Name</th>
					<th>Branch Type</th>
					<th>Branch Address</th>
					<th>Country</th>
					<th>State</th>
					<th>District</th>
					<th>City</th>
					<th>Area</th>
					<th>Pincode</th>
					<th>Registraion Type</th>
					<th>Registration Date</th>
					<th>Registration No</th>
					<th>Branch PAN No</th>
					<th>GST No</th>
					<th>Email Id</th>
					<th>Phone Number</th>
					<th>Account Name</th>
					<th>Bank Name</th>
					<th>Bank Branch</th>
					<th>IFSC Code</th>
					<th>Account Number</th>
					<th>Account Type</th>
					<th>Swift Code</th>
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
        $sel_rw = mysqli_query($link,"select * from branch_tbl");
        while($row = mysqli_fetch_object($sel_rw)){
        ?>

                <tr>
          <td><?php echo $row->id; ?></td>
					<td><?php echo $row->branch_id; ?></td>
					<td><?php echo $row->branch_name; ?></td>
					<td><?php echo $row->branch_type; ?></td>
					<td><?php echo $row->branch_address; ?></td>
					<td><?php echo $row->branch_country; ?></td>
					<td><?php echo $row->branch_state; ?></td>
					<td><?php echo $row->branch_district; ?></td>
					<td><?php echo $row->branch_city; ?></td>
					<td><?php echo $row->branch_area; ?></td>
					<td><?php echo $row->branch_pincode; ?></td>
					<td><?php echo $row->reg_type; ?></td>
					<td><?php echo $row->reg_date; ?></td>
					<td><?php echo $row->reg_no; ?></td>
					<td><?php echo $row->branch_pan_no; ?></td>
					<td><?php echo $row->gst_no; ?></td>
					<td><?php echo $row->branch_email_id; ?></td>
					<td><?php echo $row->phone_number; ?></td>
					<td><?php echo $row->account_name; ?></td>
					<td><?php echo $row->account_bank; ?></td>
					<td><?php echo $row->account_branch; ?></td>
					<td><?php echo $row->account_ifsc; ?></td>
					<td><?php echo $row->account_number; ?></td>
					<td><?php echo $row->account_type; ?></td>
					<td><?php echo $row->account_swift; ?></td>
					<td><?php echo $row->date; ?></td>
					<td><?php echo $row->ip_address; ?></td>
					<td><?php echo $row->browser; ?></td>
					<td><?php echo $row->created_by; ?></td>
					<td><?php echo $row->approved_by; ?></td>
					<td>
						<a href="branch_add.php?branch_id=<?php echo $row->branch_id; ?>&update=yes" title="Edit Details"><i class="fa fa-edit"></i></a>
						<a href="branch_view.php?branch_id=<?php echo $row->branch_id; ?>&del=yes" title="Delete Details"><i class="fa fa-trash"></i></a>
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