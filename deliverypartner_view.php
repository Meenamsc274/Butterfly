<?php 
include 'dbc.php'; 
page_protect();
$created_by = $_SESSION['userid'];
$approved_by = "";
$page = "deliverypartner_view"; ?>
<?php if($_GET['del'] == "yes"){
	$auto_id=$_GET['auto_id'];
    if(mysqli_query($link,"delete from `deliverypartner_tbl` where `auto_id`='$auto_id'")){
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
	              				<div class="col-lg-6"><h3 class="box-heading"> Deliverypartner <small>View Details</small></h3> </div>
	              				<div class="col-lg-6">
	              					<div class="breadcrumb">
	              						<a href="index.php" class="breadcrumb_a">Home</a> 
                            			<i class="fa fa-angle-double-right angle_double_right"></i>
		              					<a href="#" class="breadcrumb_a">Deliverypartner </a> 
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
					<th>Auto Id</th>
					<th>Delivery Partner Name</th>
					<th>Address</th>
					<th>Country</th>
					<th>State</th>
					<th>District</th>
					<th>City</th>
					<th>Area</th>
					<th>Pincode</th>
					<th>Email Id</th>
					<th>Alternate Email Id</th>
					<th>Mobile Number</th>
					<th>Status</th>
					<th>Sort Order</th>
					<th>IP Address</th>
					<th>Browser</th>
					<th>Created By</th>
					<th>Approved By</th>
					<th>Actions</th>
                </tr>
                </thead>
                <tbody>
        <?php
        $sel_rw = mysqli_query($link,"select * from deliverypartner_tbl");
        while($row = mysqli_fetch_object($sel_rw)){
        ?>

                <tr>
         <td><?php echo $row->id; ?></td>
					<td><?php echo $row->auto_id; ?></td>
					<td><?php echo $row->deliverypartner_name; ?></td>
					<td><?php echo $row->address; ?></td>
					<td><?php echo $row->country; ?></td>
					<td><?php echo $row->state; ?></td>
					<td><?php echo $row->district; ?></td>
					<td><?php echo $row->city; ?></td>
					<td><?php echo $row->area; ?></td>
					<td><?php echo $row->pincode; ?></td>
					<td><?php echo $row->email_id; ?></td>
					<td><?php echo $row->alter_email_id; ?></td>
					<td><?php echo $row->mobile_number; ?></td>
					<td><?php echo $row->status; ?></td>
					<td><?php echo $row->sort_order; ?></td>
					<td><?php echo $row->ip_address; ?></td>
					<td><?php echo $row->browser; ?></td>
					<td><?php echo $row->created_by; ?></td>
					<td><?php echo $row->approved_by; ?></td>
					<td>
						<a href="deliverypartner_add.php?auto_id=<?php echo $row->auto_id; ?>&update=yes" title="Edit Details"><i class="fa fa-edit"></i></a>
						<a href="deliverypartner_view.php?auto_id=<?php echo $row->auto_id; ?>&del=yes" title="Delete Details"><i class="fa fa-trash"></i></a>
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