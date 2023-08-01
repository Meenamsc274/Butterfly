<?php 
include 'dbc.php'; 
page_protect();
$created_by = $_SESSION['userid'];
$approved_by = "";
$page = "employee_view"; ?>
<?php if($_GET['del'] == "yes"){
	$emp_id = $_GET['emp_id'];
    if(mysqli_query($link,"delete from `employee` where `emp_id`='$emp_id'")){
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
	              				<div class="col-lg-6"><h3 class="box-heading"> Employee <small>View Details</small></h3> </div>
	              				<div class="col-lg-6">
								
	              					<div class="breadcrumb">
									<a href="employee_add.php" class="btn btn-success"style="font-size:10px;margin-right:9px"><i class="fa fa-plus"></i></a> 
                            			<a href="index.php" class="breadcrumb_a">Home</a> 
                            			<i class="fa fa-angle-double-right angle_double_right"></i>
		              					<a href="#" class="breadcrumb_a">Employee </a> 
	              					</div>
	              				</div>
	              			</div>
	              		</div>
	              		<div class="box-body">
	              			<!-- <h5 class="second_heading">Add Industry</h5> -->
                   <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr>
					<th>Employee Id</th>
					<th>Name</th>
					<th>Email</th>
					<th>Branch</th>
					<th>Department</th>
					<th>Designation</th>
					<th>Date of Joining</th>
					<th>Actions</th>
                </tr>
                </thead>
                <tbody>
        <?php
        $sel_rw = mysqli_query($link,"select * from employee");
        while($row = mysqli_fetch_object($sel_rw)){
        ?>

                <tr>
					<td><a href="emp_singleview.php?emp_id=<?php echo $row->emp_id; ?>" class="border border-success text-success p-2 rounded" ><?php echo $row->emp_id; ?></a></td>
					<td><?php echo $row->name; ?></td>
					<td><?php echo $row->email; ?></td>
					<td><?php echo $row->branch; ?></td>
					<td><?php echo $row->department; ?></td>
					<td><?php echo $row->designation; ?></td>
					<td><?php echo $row->doj; ?></td>
					<td>
						<a href="employee_add.php?emp_id=<?php echo $row->emp_id; ?>&Update=yes" title="Edit Details"><i class="fa fa-edit"></i></a>
						<a href="employee_view.php?emp_id=<?php echo $row->emp_id; ?>&del=yes" title="Delete Details"><i class="fa fa-trash"></i></a>
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