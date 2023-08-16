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
                        <div class="col-lg-6"><h3 class="box-heading"> Indicator <small>View  Details</small>
                        <div class="breadcrumb">
                            <a href="index.php" class="breadcrumb_a">Home</a> 
                            <i class="fa fa-angle-double-right angle_double_right"></i>
                            <a href="indicator.php" class="breadcrumb_a">Indicator </a> 
                          </div></h3>
                      </div>
                        <div class="col-lg-6">
                          
                        </div>
                      </div>
                    </div>
                    <div class="box-body">
                      <!-- <h5 class="second_heading">Add City</h5> -->
                      <form method="post" class="padding-10" enctype="multipart/form-data">
                        <?php
$ind_id = $_GET['emp_id'];
  $sel_row=mysqli_query($link,"select * from indicator where `autoid`='$ind_id'");
  $row5 = mysqli_fetch_object($sel_row);
  $branch =$row5->branch;
  $department =$row5->department;
  $designation =$row5->designation;
  
  ?>
                        <div class="row mt-3">
                        
 <h4> Indicator Details</h4>
    
    
	
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
        <label class="margin-left-10" for="sub_category">Department</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
           <?php
            $sel_rw1 = mysqli_query($link,"select * from department_tbl where department_id ='$department'");
            $row3 = mysqli_fetch_object($sel_rw1);
            ?>

            <input class ="form-control" type ="text" value="<?php echo $row3->department_name; ?>" readonly>

        </div>
      </div>
    </div> 
	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="brand_id">Designation</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
           	

				 <input class ="form-control" type ="text" value="<?php echo $row5->designation; ?>" readonly>

			
		
        </div>
      </div>
    </div>
	
   <h4>Behavioural Competencies</h4>
	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="lowstock_alert">Business Process </label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
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
		(<?php echo $row5->business_process; ?>)
        </div>
      </div>
    </div>
	<h4>Organizational Competencies</h4>
	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="lowstock_alert">Allocating Resources </label>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
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
		(<?php echo $row5->allocating_resource; ?>)
        </div>
      </div>
    </div>
	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="lowstock_alert">Oral Communication </label>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
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
		(<?php echo $row5->oral_communication; ?>)
        </div>
      </div>
    </div>
	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="lowstock_alert">Project Management  </label>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
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
		(<?php echo $row5->project_management; ?>)
        </div>
      </div>
    </div>
	<h4>Technical Competencies</h4>
	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="lowstock_alert">Leadership </label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
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
		(<?php echo $row5->leadership; ?>)
        </div>
      </div>
    </div>
	
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