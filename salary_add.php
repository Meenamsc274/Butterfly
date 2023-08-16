<?php 
include 'dbc.php'; 
page_protect();
$created_by = $_SESSION['userid'];
$approved_by = "";
?>
<?php
if($_POST['submit'] == "Submit"){
$id = mysqli_real_escape_string($link,$_POST['id']);
$salary_id = mysqli_real_escape_string($link,$_POST['salary_id']);
$emp_id = mysqli_real_escape_string($link,$_POST['emp_name']);
$payroll_type = mysqli_real_escape_string($link,$_POST['payroll_type']);
$salary = mysqli_real_escape_string($link,$_POST['salary']);
$sel_rw = mysqli_query($link,"select * from employee where emp_id='$emp_id'");
        $row = mysqli_fetch_object($sel_rw);
$emp_name=$row->name;		
/* $max_id = maxOfAll("id","payslip_tbl");
  $max_id=$max_id+1;
  $pay_id="PAY-".$max_id;
 $pay =mysqli_query($link,"INSERT INTO `payslip_tbl` ( `autoid`, `emp_id`, `emp_name`, `payroll_type`, `salary`, `date`, `ip_address`, `browser`, `created_by`, `approved_by`) VALUES ('$pay_id', '$emp_id', '$emp_name', '$payroll_type', '$salary', '$date', '$ip_address', '$browser', '$created_by', '$approved_by')");
  */
//echo"INSERT INTO `salarydetails_tbl` ( `autoid`, `employee_id`, `employee_name`, `payroll_type`, `salary_structure`, `date`, `ip_address`, `browser`, `created_by`, `approved_by`) VALUES ('$salary_id', '$emp_id', '$emp_name', '$payroll_type', '$salary',  '$date', '$ip_address', '$browser', '$created_by', '$approved_by')";
 if(mysqli_query($link,"INSERT INTO `salarydetails_tbl` ( `autoid`, `employee_id`, `employee_name`, `payroll_type`, `salary_structure`, `ctc`, `date`, `ip_address`, `browser`, `created_by`, `approved_by`) VALUES ('$salary_id', '$emp_id', '$emp_name', '$payroll_type', '$salary','$salary',  '$date', '$ip_address', '$browser', '$created_by', '$approved_by')")){
 
  $msg[] = "Successfully Saved!";
  }
  else
  {
    $err[] = "Error in saving data!";
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
                        <div class="col-lg-6"><h3 class="box-heading"> Employee Salary Management <small>Add / Update  Details</small>
                        <div class="breadcrumb">
                            <a href="index.php" class="breadcrumb_a">Home</a> 
                            <i class="fa fa-angle-double-right angle_double_right"></i>
                            <a href="salary_view.php" class="breadcrumb_a">Employee Salary </a> 
                            <i class="fa fa-angle-double-right angle_double_right" aria-hidden="true"></i>
                            <a href="#" class="breadcrumb_a">Add / Update Employee Salary </a>
                          </div>
                      </h3></h3></div>
                        <div class="col-lg-6">
                          
                        </div>
                      </div>
                    </div>
                    <div class="box-body">
                      <!-- <h5 class="second_heading">Add City</h5> -->
                      <form method="post" class="padding-10" enctype="multipart/form-data">
                        <?php
  /* $category_id = mysqli_real_escape_string($link,$_GET['category_id']);
  $update = mysqli_real_escape_string($link,$_GET['update']);
  if($update == "yes"){
  $sel_row = mysqli_query($link,"select * from category_tbl where `category_id`='$category_id'");
  $row = mysql_fetch_object($sel_row);
  $upload_id = $row->category_id;
  }
  else
  { */
  $max_id = maxOfAll("id","salarydetails_tbl");
  $max_id=$max_id+1;
  $upload_id="SAL-".$max_id;
  //}
  ?>
                        <div class="row mt-3">
                          <div class="col-md-12">
  <?php
  foreach($err as $err_msg){
  ?>
  <div class="alert alert-danger alert-dismissible">
       
       <h4><i class="icon fa fa-ban"></i> Alert!</h4>
       <?php echo $err_msg; ?>
    </div>
  <?php } ?>
  <?php
  foreach($msg as $new_msg){
  ?>
  <div class="alert alert-success alert-dismissible">
       
       <h4><i class="icon fa fa-check"></i> Alert!</h4>
       <?php echo $new_msg; ?>
    </div>
    <?php } ?>          
</div>
    <input type="hidden" class="form-control" name="id" id="id" placeholder="Enter the Id" value="<?php echo $row->id; ?>" readonly="readonly">
                          
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Salary ID</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
          <input type="text" class="form-control" name="salary_id" id="salary_id" placeholder="Enter the Category Id" value="<?php echo $upload_id; ?>" >
        </div>
      </div>
    </div>
    
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Employee Name</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
         <select name="emp_name" id="emp_name" class="form-control">
        <?php
        $sel_rw = mysqli_query($link,"select emp_id,name from employee");
        while($row1 = mysqli_fetch_object($sel_rw)){
        ?>

        <option value="<?php echo $row1->emp_id; ?>"><?php echo $row1->name; ?></option>

        <?php } ?>
        </select>
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Payroll Type </label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
          <select name="payroll_type" id="payroll_type" class="form-control">
          <?php
            $sel_rw1 = mysqli_query($link,"select * from payslip_type_tbl");
            while($row_payslip = mysqli_fetch_object($sel_rw1)){ ?>

            <option value="<?php echo $row_payslip->autoid ; ?>"><?php echo $row_payslip->name; ?></option>

            <?php } ?>
		  </select>
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_id">Salary</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
       <input type="number" class="form-control" name="salary" id="salary" placeholder="Enter the Salary"  >
        </div>
      </div>
    </div>
    
    
    
    <div class="box-footer ">
      <div>&nbsp;</div>
      <div style="border-top: 1px solid #ced4da;">&nbsp;</div>
       <center>
       <?php if($update == "yes"){ ?>
        <input type="submit" name="submit" id="submit" class="btn btn-success" value="Update">
       <?php } else { ?>
        <input type="submit" name="submit" id="submit" class="btn btn-success" value="Submit">
       <?php } ?>
       </center>
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
$("#status option[value='<?php echo $row->status; ?>']").attr("selected", "selected");
});
</script>

 
</html>