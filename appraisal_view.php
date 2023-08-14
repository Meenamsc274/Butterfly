<?php 
include 'dbc.php'; 
page_protect();
$created_by = $_SESSION['userid'];
$approved_by = "";
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
                        <div class="col-lg-6"><h3 class="box-heading"> Appraisal <small>View  Details</small></h3></h3></div>
                        <div class="col-lg-6">
                          <div class="breadcrumb">
                            <a href="index.php" class="breadcrumb_a">Home</a> 
                            <i class="fa fa-angle-double-right angle_double_right"></i>
                            <a href="appraisal.php" class="breadcrumb_a">Appraisal </a> 
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="box-body">
                      <!-- <h5 class="second_heading">Add City</h5> -->
                      <form method="post" class="padding-10" enctype="multipart/form-data">
                        <?php
$ind_id = $_GET['emp_id'];
  $sel_row=mysqli_query($link,"select * from appraisal where `autoid`='$ind_id'");
  $row5 = mysqli_fetch_object($sel_row);
  $branch =$row5->branch;
  $department =$row5->department;
  $emp =$row5->employee;
  
	  
	  
  ?>
                        <div class="row mt-3">
                        
 <h4> Appraisal Details</h4>
    
    
	
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Branch </label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
          
<?php
        $sel_rw = mysqli_query($link,"select branch_name,branch_id from branch_tbl where branch_id ='$branch'");
        $row1 = mysqli_fetch_object($sel_rw);
        ?>

        <input class ="form-control" type ="text" value="<?php echo $row1->branch_name; ?>" readonly>

        </div>
      </div>
    </div>
	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="sub_category">Employee</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
           <?php
            $sel_rw1 = mysqli_query($link,"select * from employee where emp_id ='$emp'");
            $row3 = mysqli_fetch_object($sel_rw1);
            ?>

            <input class ="form-control" type ="text" value="<?php echo $row3->name; ?>" readonly>

        </div>
      </div>
    </div> 
	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="brand_id">Appraisal Date</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
           	

				 <input class ="form-control" type ="text" value="<?php echo $row5->appraisal_date; ?>" readonly>

			
		
        </div>
      </div>
    </div>
	<table cellpadding="10" border="0">
	<tr>
	<th colspan="2" style="text-align:center">Indicator</th>
	<th style="text-align:center">Appraisal</th>
	</tr>
	<tr>
	<th colspan="3">Behavioural Competencies</th>
	</tr>
	<tr>
	<td>Business Process</td>
	<td>
	<?php 
	$i_row=mysqli_query($link,"select * from indicator where employee='$emp' ");
      $row3 = mysqli_fetch_object($i_row);
		for($i=1;$i<=5;$i++)
		{ 
	
	if($i<= $row3->business_process)
	{
		?>
		<span class="fa fa-star checked"></span>
		<?php
	}
	else{ ?>
		<span class="fa fa-star "></span>
  <?php }
		}  ?>
	</td>
	<td>
	<?php 
		for($i=1;$i<=5;$i++)
		{ 
	if($i<= $row5->business_process)
	{
		?>
		<span class="fa fa-star checked"></span>
		<?php
	}
	else{ ?>
		<span class="fa fa-star "></span>
  <?php }
		}  ?>
	</td>
	</tr>
	<tr>
	<th colspan="3">Organizational Competencies</th>
	</tr>
	<tr>
	<td>Allocating Resources</td>
	<td>
	<?php 
	$i_row=mysqli_query($link,"select * from indicator where employee='$emp' ");
      $row3 = mysqli_fetch_object($i_row);
		for($i=1;$i<=5;$i++)
		{ 
	
	if($i<= $row3->allocating_resource)
	{
		?>
		<span class="fa fa-star checked"></span>
		<?php
	}
	else{ ?>
		<span class="fa fa-star "></span>
  <?php }
		}  ?>
	</td>
	<td>
	<?php 
		for($i=1;$i<=5;$i++)
		{ 
	if($i<= $row5->allocating_resource)
	{
		?>
		<span class="fa fa-star checked"></span>
		<?php
	}
	else{ ?>
		<span class="fa fa-star "></span>
  <?php }
		}  ?>
	</td>
	</tr>
	<tr>
	<td>Oral Communication</td>
	<td>
	<?php 
	$i_row=mysqli_query($link,"select * from indicator where employee='$emp' ");
      $row3 = mysqli_fetch_object($i_row);
		for($i=1;$i<=5;$i++)
		{ 
	
	if($i<= $row3->oral_communication)
	{
		?>
		<span class="fa fa-star checked"></span>
		<?php
	}
	else{ ?>
		<span class="fa fa-star "></span>
  <?php }
		}  ?>
	</td>
	<td>
	<?php 
		for($i=1;$i<=5;$i++)
		{ 
	if($i<= $row5->oral_communication)
	{
		?>
		<span class="fa fa-star checked"></span>
		<?php
	}
	else{ ?>
		<span class="fa fa-star "></span>
  <?php }
		}  ?>
	</td>
	</tr>
	<tr>
	<td>Project Management</td>
	<td>
	<?php 
	$i_row=mysqli_query($link,"select * from indicator where employee='$emp' ");
      $row3 = mysqli_fetch_object($i_row);
		for($i=1;$i<=5;$i++)
		{ 
	
	if($i<= $row3->project_management)
	{
		?>
		<span class="fa fa-star checked"></span>
		<?php
	}
	else{ ?>
		<span class="fa fa-star "></span>
  <?php }
		}  ?>
	</td>
	<td>
	<?php 
		for($i=1;$i<=5;$i++)
		{ 
	if($i<= $row5->project_management)
	{
		?>
		<span class="fa fa-star checked"></span>
		<?php
	}
	else{ ?>
		<span class="fa fa-star "></span>
  <?php }
		}  ?>
	</td>
	</tr>
	<tr>
	<th colspan="3">Technical Competencies</th>
	</tr>
	<tr>
	<td>Leadership </td>
	<td>
	<?php 
	$i_row=mysqli_query($link,"select * from indicator where employee='$emp' ");
      $row3 = mysqli_fetch_object($i_row);
		for($i=1;$i<=5;$i++)
		{ 
	
	if($i<= $row3->leadership)
	{
		?>
		<span class="fa fa-star checked"></span>
		<?php
	}
	else{ ?>
		<span class="fa fa-star "></span>
  <?php }
		}  ?>
	</td>
	<td>
	<?php 
		for($i=1;$i<=5;$i++)
		{ 
	if($i<= $row5->leadership)
	{
		?>
		<span class="fa fa-star checked"></span>
		<?php
	}
	else{ ?>
		<span class="fa fa-star "></span>
  <?php }
		}  ?>
	</td>
	</tr><hr>
	<tr>
	<th colspan="3">Remark</th>
	</tr>
	<tr>
	<td colspan="3"><?php echo $row5->remark; ?></td>
	</tr>
	</table>
  
	
    <div class="box-footer ">
      <div>&nbsp;</div>
      <div style="border-top: 1px solid #ced4da;">&nbsp;</div>
      
      </div>
      <div>&nbsp;</div>
                        </div>
                      </form>
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
$(document).ready(function() {
$("#gender option[value='<?php echo $row5->gender; ?>']").attr("checked", "checked");
$("#branch option[value='<?php echo $row5->branch; ?>']").attr("selected", "selected");
$("#department option[value='<?php echo $row5->department; ?>']").attr("selected", "selected");
$("#designation option[value='<?php echo $row5->designation; ?>']").attr("selected", "selected");
$("#brand_id option[value='<?php echo $row1->brand_id; ?>']").attr("selected", "selected");
$("#unit option[value='<?php echo $row1->unit; ?>']").attr("selected", "selected");
$("#tax option[value='<?php echo $row1->tax; ?>']").attr("selected", "selected");
$("#batch_stock option[value='<?php echo $row1->batch_stock; ?>']").attr("selected", "selected");
$("#stockable option[value='<?php echo $row1->stockable; ?>']").attr("selected", "selected");
$("#price_changeable option[value='<?php echo $row1->price_changeable; ?>']").attr("selected", "selected");
$("#show option[value='<?php echo $row1->show; ?>']").attr("selected", "selected");
$("#status option[value='<?php echo $row1->status; ?>']").attr("selected", "selected");
});
</script>
 
</html>