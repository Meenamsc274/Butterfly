<?php 
include 'dbc.php'; 
page_protect();
$created_by = $_SESSION['userid'];
$approved_by = "";
$page = "trainer_list_view"; ?>
<?php if($_GET['del'] == "yes"){
	$autoid=$_GET['autoid'];
    if(mysqli_query($link,"delete from `trainer_list_tbl` where `autoid`='$autoid'")){
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
                                    <h3 class="box-heading">Trainer List Details <small>View Details</small>
                                    <div class="breadcrumb">
	              						<a href="index.php" class="breadcrumb_a">Home</a> 
                            			<i class="fa fa-angle-double-right angle_double_right"></i>
		              					<a href="#" class="breadcrumb_a">Trainer List Details </a> 
	              					</div>
                                </div>
                                    </h3> 
                                  
	              				<div class="col-lg-6">
	              					<a class="btn btn-sm bg-default float-right margin-28" href="trainer_list_add.php"><i class="fa fa-plus"></i></a>
	              				</div>
	              			</div>
	              		</div>
	              		<div class="box-body">
	              			<!-- <h5 class="second_heading">Add Industry</h5> -->
                   <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr>
					<th>id</th>
					
					<th>Branch</th>
					<th>Training Type</th>
					<th>Status</th>
					<th>Employee</th>
					<th>Trainer</th>
					<th>Training Duration</th>
					<th>Cost</th>
					<th>Actions</th>

					<th>IP Address</th>
					<th>Browser</th>
					<th>Date</th>
					<th>Created By</th>
					<th>Approved By</th>
                </tr>
                </thead>
                <tbody>
       	<?php
				$sel_rw = mysqli_query($link,"select * from trainer_list_tbl");
                
				while($row = mysqli_fetch_object($sel_rw)){
                    $branch_id = $row->branch;
                    $emp_id = $row->employee;
                    $trainer_id = $row->trainer;
                    list($branch_name) = mysqli_fetch_row(mysqli_query($link,"select branch_name from branch_tbl where branch_id = '$branch_id'"));
                    list($emp_name) = mysqli_fetch_row(mysqli_query($link,"select name from employee where emp_id = '$emp_id'"));
                    list($trainer_name) = mysqli_fetch_row(mysqli_query($link,"select first_name from trainer_tbl where autoid = '$trainer_id'"));
				?>

                <tr>
				<td><?php echo $row->id; ?></td>
					
					<td><?php echo $branch_name; ?></td>
					<td><?php echo $row->training_type; ?></td>
					<td>
						<?php if($row->status=='Pending'){ ?><span class="badge bg-warning"><?php echo $row->status; ?></span><?php } ?>
						<?php if($row->status=='Started'){ ?><span class="badge bg-success"><?php echo $row->status; ?></span><?php } ?>
						<?php if($row->status=='Completed'){ ?><span class="badge bg-success"><?php echo $row->status; ?></span><?php } ?>
						<?php if($row->status=='Terminated'){ ?><span class="badge bg-primary"><?php echo $row->status; ?></span><?php } ?>
					</td>
					<td><?php echo $emp_name; ?></td>
					<td><?php echo $trainer_name; ?></td>
                    <td><?php echo date('M d, Y',strtotime($row->start_date))." to ".date('M d, Y',strtotime($row->end_date)); ?></td>
					<td><?php echo $row->trainer_cost; ?></td>

                  
                    <td>
						<a class="btn btn-sm btn-info" href="trainer_list_details.php?autoid=<?php echo $row->autoid; ?>" title="View Details"><i class="fa fa-eye"></i></a>
						<a class="btn btn-sm btn-success" href="trainer_list_add.php?autoid=<?php echo $row->autoid; ?>&update=yes" title="Edit Details"><i class="fa fa-edit"></i></a>
						<a class="btn btn-sm bg-danger text-white" href="trainer_list_view.php?autoid=<?php echo $row->autoid; ?>&del=yes" title="Delete Details"><i class="fa fa-trash"></i></a>
					</td>
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