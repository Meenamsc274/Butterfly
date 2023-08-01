<?php 
include 'dbc.php'; 
page_protect();
$created_by = $_SESSION['userid'];
$approved_by = "";
$page = "trainer_list_view"; ?>
<?php if($_GET['del'] == "yes"){
	$autoid=$_GET['autoid'];
    if(mysqli_query($link,"delete from `trainer_tbl` where `autoid`='$autoid'")){
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
	              				<div class="col-lg-6">
                                    <h3 class="box-heading">Trainer Details <small>View Details</small>
                                    <div class="breadcrumb">
	              						<a href="index.php" class="breadcrumb_a">Home</a> 
                            			<i class="fa fa-angle-double-right angle_double_right"></i>
		              					<a href="#" class="breadcrumb_a">Trainer Details </a> 
	              					</div>
                                </div>
                                    </h3> 
                                  
	              				<div class="col-lg-6">
	              					<a class="btn btn-sm bg-default float-right margin-28" href="trainer_add.php"><i class="fa fa-plus"></i></a>
	              				</div>
	              			</div>
	              		</div>
	              		<div class="box-body">
	              			<!-- <h5 class="second_heading">Add Industry</h5> -->
                   <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr>
		        		<th>id</th>
					<th>Trainer Id</th>
					<th>Branch</th>
					<th>Full Name</th>
					<th>Contact</th>
					<th>Email</th>
                    <th>Actions</th>
					<th>Expertise</th>
					<th>Address</th>
					<th>IP Address</th>
					<th>Browser</th>
					<th>Date</th>
					<th>Created By</th>
					<th>Approved By</th>
					
                </tr>
                </thead>
                <tbody>
       	<?php
				$sel_rw = mysqli_query($link,"select * from trainer_tbl");
                
				while($row = mysqli_fetch_object($sel_rw)){
                    $branch_id = $row->branch;
                    list($branch_name) = mysqli_fetch_row(mysqli_query($link,"select branch_name from branch_tbl where branch_id = '$branch_id'"));
				?>

                <tr>
					<td><?php echo $row->id; ?></td>
					<td><?php echo $row->autoid; ?></td>
					<td><?php echo $branch_name; ?></td>
					<td><?php echo $row->first_name." ".$row->last_name; ?></td>
					<td><?php echo $row->contact; ?></td>
					<td><?php echo $row->email; ?></td>
                    <td>
						<a class="btn btn-sm btn-success" href="trainer_add.php?autoid=<?php echo $row->autoid; ?>&update=yes" title="Edit Details"><i class="fa fa-edit"></i></a>
						<a class="btn btn-sm bg-danger text-white" href="trainer_view.php?autoid=<?php echo $row->autoid; ?>&del=yes" title="Delete Details"><i class="fa fa-trash"></i></a>
					</td>
					<td><?php echo $row->expertise; ?></td>
					<td><?php echo $row->address; ?></td>
					
					<td><?php echo $row->ip_address; ?></td>
					<td><?php echo $row->browser; ?></td>
					<td><?php echo $row->date; ?></td>
					<td><?php echo $row->created_by; ?></td>
					<td><?php echo $row->approved_by; ?></td>
					
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