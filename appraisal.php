<?php 
include 'dbc.php'; 
page_protect();
$created_by = $_SESSION['userid'];
$approved_by = "";
$page = "appraisal"; ?>
<?php if($_GET['del'] == "yes"){
	$emp_id = $_GET['emp_id'];
    if(mysqli_query($link,"delete from `appraisal` where `autoid`='$emp_id'")){
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
   <style> 
   .checked {
  color: orange;
}
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
	              				<div class="col-lg-6">
                                    <h3 class="box-heading"> Manage Appraisal 
                                    <div class="breadcrumb">
	              						<a href="index.php" class="breadcrumb_a">Home</a> 
                            			<i class="fa fa-angle-double-right angle_double_right"></i>
		              					<a href="appraisal.php" class="breadcrumb_a">Appraisal  </a> 
	              					</div>
                                </div>
                                    </h3> 
                                  
	              				<div class="col-lg-6">
                                  <a class="btn btn-sm bg-default float-right margin-28" href="appraisal_add.php"  ><i class="fa fa-plus"></i></a>
	              					
	              				</div>
	              			</div>
					
	              		</div>
	              		<div class="box-body">
	              			<!-- <h5 class="second_heading">Add Industry</h5> -->
                   <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr>
					<th>Branch</th>
					<th>Department</th>
					<th>Designation</th>
					<th>Employee</th>
					<th>Target Rating</th>
					<th>Overall Rating</th>
					<th>Appraisal Date</th>
					<th>Actions</th>
                </tr>
                </thead>
                <tbody>
        <?php
		
  $sel_row=mysqli_query($link,"select * from appraisal ");
  while($row5 = mysqli_fetch_object($sel_row))
  {
	  $emp_id=$row5->employee;
	  $dept_id=$row5->department;
	  $branch_id=$row5->branch;
	  $d_row=mysqli_query($link,"select * from department_tbl where department_id='$dept_id' ");
      $row1 = mysqli_fetch_object($d_row);
	  $i_row=mysqli_query($link,"select * from indicator where employee='$emp_id' ");
      $row3 = mysqli_fetch_object($i_row);
	  $b_row=mysqli_query($link,"select * from branch_tbl where branch_id='$branch_id' ");
      $row2 = mysqli_fetch_object($b_row);
		?>
		<tr>
		<td><?php echo $row2->branch_name; ?></td>
		<td><?php echo $row1->department_name; ?></td>
		<td><?php echo $row5->designation; ?></td>
		<td><?php echo $row5->employee; ?></td>
		<td><?php 
		for($i=1;$i<=5;$i++)
		{ 
	$j=round($row3->overall);
	if($i<= $j)
	{
		?>
		<span class="fa fa-star checked"></span>
		<?php
	}
	else{ ?>
		<span class="fa fa-star "></span>
  <?php }
		}  ?>
		(<?php echo $row3->overall; ?>)</td>
		<td><?php 
		for($i=1;$i<=5;$i++)
		{ 
	if($i<= $row5->overall)
	{
		?>
		<span class="fa fa-star checked"></span>
		<?php
	}
	else{ ?>
		<span class="fa fa-star "></span>
  <?php }
		}  ?>
		(<?php echo $row5->overall; ?>)</td>
		<td><?php echo $row5->appraisal_date; ?></td>
		<td>
		<a href="appraisal_view.php?emp_id=<?php echo $row5->autoid; ?>" title="View Details" class="btn btn-info"><i class="fa fa-eye"></i></a>				
		<!--<a href="#" title="Edit Details" class="btn btn-success"><i class="fa fa-edit"></i></a>	-->			
		<a href="appraisal.php?emp_id=<?php echo $row5->autoid; ?>&del=yes" title="Delete Details" class="btn btn-danger" onClick="return confirm('Are you sure want to delete?');"><i class="fa fa-trash"></i></a>				
		</td>
		</tr>
		<?php
  }
  ?>
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