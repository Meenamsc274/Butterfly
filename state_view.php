<?php 
include 'dbc.php'; 
page_protect();
$created_by = $_SESSION['userid'];
$approved_by = "";
$page = "state_view";

if($_GET['del'] == "yes"){
  $state_id=$_GET['state_id'];
    if(mysqli_query($link,"delete from `state_tbl` where `state_id`='$state_id'")){
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
	              				<div class="col-lg-6"><h3 class="box-heading"> State <small>View Details</small></h3> </div>
	              				<div class="col-lg-6">
	              					<div class="breadcrumb">
	              						<a href="index.php" class="breadcrumb_a">Home</a> 
                            <i class="fa fa-angle-double-right angle_double_right"></i>
		              					<a href="#" class="breadcrumb_a">State </a> 
                            
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
          <th>Country Id</th>
          <th>State Id</th>
          <th>State Code</th>
          <th>State Name</th>
          <th>Description</th>
          <th>IP Address</th>
          <th>Browser</th>
          <th>Date</th>
          <th>Created By</th>
          <th>Approved By</th>
          <th>Status</th>
          <th>Sort Order</th>
          <th>Actions</th>
                </tr>
                </thead>
                <tbody>
        <?php
        $sel_rw = mysqli_query($link,"select * from state_tbl");
        while($row = mysqli_fetch_object($sel_rw)){
        ?>

                <tr>
          <td><?php echo $row->id; ?></td>
          <td><?php echo $row->country_id; ?></td>
          <td><?php echo $row->state_id; ?></td>
          <td><?php echo $row->state_code; ?></td>
          <td><?php echo $row->state_name; ?></td>
          <td><?php echo $row->description; ?></td>
          <td><?php echo $row->ip_address; ?></td>
          <td><?php echo $row->browser; ?></td>
          <td><?php echo $row->date; ?></td>
          <td><?php echo $row->created_by; ?></td>
          <td><?php echo $row->approved_by; ?></td>
          <td><?php echo $row->status; ?></td>
          <td><?php echo $row->sort_order; ?></td>
          <td>
            <a href="state_add.php?state_id=<?php echo $row->state_id; ?>&update=yes" title="Edit Details"><i class="fa fa-edit"></i></a>
            <a href="state_view.php?state_id=<?php echo $row->state_id; ?>&del=yes" title="Delete Details"><i class="fa fa-trash"></i></a>
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