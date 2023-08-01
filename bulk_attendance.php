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

  if(isset($_POST['submit'])){

    $datefilter = $_POST['datefilter'];
      $dates = explode('-',$datefilter);
      $start_date = date('Y-m-d',strtotime($dates[0]));
      $end_date = date('Y-m-d',strtotime($dates[1]));

    $period = new DatePeriod(
      new DateTime($start_date),
      new DateInterval('P1D'),
      new DateTime($end_date)
    ); 

    foreach($_POST['employee'] as $emp_id){
      
      $in_time = $_POST['in_time_'].$emp_id;
      $out_time = $_POST['out_time_'].$emp_id;

     
      foreach ($period as $key => $value) {
        $date =  $value->format('Y-m-d');

        $max = maxOfAll('id','attendance_tbl');

        $autoid = 'ATT-'.$max+1;

        $sel = mysqli_query($link,"select id from attendance_tbl where date='$date' and e_id='$emp_id'");
        if(mysqli_num_rows($sel)==0){
          $insert = mysqli_query($link,"insert into attendance_tbl(`autoid`,`date`,`in_time`,`out_time`,`daystatus`, `ip_address`, `browser`, `created_at`, `created_by`, `approved_by`)values('$autoid','$date','$in_time','$out_time','Present', '$ip_address', '$browser', NOW(), '$created_by', '$approved_by')");
        }else{
          $update = mysqli_query($link,"update attendance_tbl set `date` = '$date',`in_time` = '$in_time',`out_time` = '$out_time',`daystatus` = 'Present', `ip_address` = '$ip_address', `browser` = '$browser', `updated_at` = NOW(), `created_by` = '$created_by', `approved_by` = '$approved_by'");
        }
      }
    }

    $branch = $_POST['branch'];
    $department = $_POST['department'];

    $sel_rw1 = mysqli_query($link,"select emp_id,name,branch,department from employee where branch='$branch' and department='$department' and doj>='$start_date'");

    while($rw1 = mysqli_fetch_object($sel_rw1)){
      $eid = $rw1->emp_id;
      foreach ($period as $key => $value) {
        $date =  $value->format('Y-m-d');
        if(in_array($eid, $_POST['employee'])){
          $sel = mysqli_query($link,"select id from attendance_tbl where date='$date' and e_id='$emp_id'");
          if(mysqli_num_rows($sel)==0){
            $insert = mysqli_query($link,"insert into attendance_tbl(`autoid`,`date`,`in_time`,`out_time`,`daystatus`, `ip_address`, `browser`, `created_at`, `created_by`, `approved_by`)values('$autoid','$date','$in_time','$out_time','Present', '$ip_address', '$browser', NOW(), '$created_by', '$approved_by')");
          }else{
            $update = mysqli_query($link,"update attendance_tbl set `date` = '$date',`in_time` = '$in_time',`out_time` = '$out_time',`daystatus` = 'Present', `ip_address` = '$ip_address', `browser` = '$browser', `updated_at` = NOW(), `created_by` = '$created_by', `approved_by` = '$approved_by'");
          }
        }
      }
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
                                    <h3 class="box-heading">Manage Bulk Attendance 
                                    <div class="breadcrumb">
	              						<a href="index.php" class="breadcrumb_a">Home</a> 
                            			<i class="fa fa-angle-double-right angle_double_right"></i>
		              					<a href="#" class="breadcrumb_a">Attendance </a> 
	              					</div>
                                </div>
                                    </h3> 
                                  
	              				<div class="col-lg-6">
	              					
	              				</div>
	              			</div>
	              		</div>
	              		<div class="box-body">
	              			<!-- <h5 class="second_heading">Add Industry</h5> -->
                      <form method="post">
                        <div class="form-group row form_box_shadow">
                          
                          <div class="col-lg-8 row">
                            <div class="col-md-4 demo">
                              <label>Date</label>
                              <input type="text" name="datefilter" class="form-control" value="<?php echo $_GET['datefilter']; ?>" autocomplete="off" required>
                            </div>
                            <div class="col-lg-3">
                              <label>Branch</label>
                              <select name="branch" id="branch" class="form-control" required>
                                <option value="">Select Branch</option>
                                <?php $sel_branch = mysqli_query($link,"select branch_id,branch_name from branch_tbl"); 
                                while($fet_branch = mysqli_fetch_object($sel_branch)){
                                    ?><option <?php if($_GET['branch']==$fet_branch->branch_id){ echo 'selected'; } ?> value="<?php echo $fet_branch->branch_id; ?>"><?php echo $fet_branch->branch_name; ?></option><?php
                                } ?>
                              </select>
                            </div>
                            <div class="col-lg-3">
                              <label>Department</label>
                              <select name="department" id="department" class="form-control" required="required">
                                <option value="">Select Department</option>
                                <?php
                                $sel_rw1 = mysqli_query($link,"select * from department_tbl");
                                while($row1 = mysqli_fetch_object($sel_rw1)){
                                ?>

                                <option <?php if($_GET['department']==$row1->department_id){ echo 'selected'; } ?> value="<?php echo $row1->department_id ; ?>"><?php echo $row1->department_name; ?></option>

                                <?php } ?>
                              </select>
                            </div>
                            <div class="col-lg-2">
                              <button type="submit" class="btn bg-default margin_top_40" name="search" >
                                <i class="fa fa-search"></i>
                              </button>
                            </div>
                          </div>
                          
                        </div>
                     
                   <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr>
					<th>id</th>
					<th>Employee ID</th>
					<th>Employee</th>
					<th>Branch</th>
					<th>Department</th>
					<th><input type="checkbox" id="select_checkbox"> Attendance</th>
                </tr>
                </thead>
                <tbody>
       	<?php
        if(isset($_POST['search'])){
          $datefilter = $_POST['datefilter'];
          $branch = $_POST['branch'];
          $department = $_POST['department'];

          header("location:bulk_attendance.php?datefilter=$datefilter&branch=$branch&department=$department");
          echo "<script>window.location.href='bulk_attendance.php?datefilter=$datefilter&branch=$branch&department=$department'</script>";
        }

        if(isset($_GET['datefilter'])){
          $datefilter = $_GET['datefilter'];
          $branch = $_GET['branch'];
          $department = $_GET['department'];
          $dates = explode('-',$datefilter);
          $start_date = date('Y-m-d',strtotime($dates[0]));

          $sel_rw = mysqli_query($link,"select emp_id,name,branch,department from employee where branch='$branch' and department='$department' and doj>='$start_date'");
        }else{
          $sel_rw = mysqli_query($link,"select emp_id,name,branch,department from employee");
        }
				
            $i=1;    
				while($row = mysqli_fetch_object($sel_rw)){
                    $branch_id = $row->branch;
                    $dept_id = $row->department;
                    
                    list($branch_name) = mysqli_fetch_row(mysqli_query($link,"select branch_name from branch_tbl where branch_id = '$branch_id'"));
                    
                    list($department_name) = mysqli_fetch_row(mysqli_query($link,"select department_name  from department_tbl where department_id = '$dept_id'"));
				?>

                <tr>
                  <td> <?php echo $i; ?> </td>
                  <td><a href="emp_singleview.php?emp_id=<?php echo $row->emp_id; ?>" class="btn btn-outline-default"><?php echo $row->emp_id; ?></a></td>
                  <td><?php echo $row->name; ?></td>
                  <td><?php echo $branch_name; ?></td>
                  <td><?php echo $department_name; ?></td>
                  <td>
                        <input type="checkbox" class="select_checkbox in_out" name="employee[]" value="<?php echo $row->emp_id; ?>" id="in_out<?php echo $i; ?>">
                        <span  class="span_hide in_out<?php echo $i; ?>">
                        <span class="padding-10">In</span>
                        <input class="padding-10" type="time" value="08:00" name="in_time_<?php echo $row->emp_id; ?>">
                        <span class="padding-10">Out</span>
                        <input class="padding-10" type="time" name="out_time_<?php echo $row->emp_id; ?>" value="20:00">
                        </span>
                    </td>
				</tr>
				<?php $i++; } ?>
                     </tbody>
              </table>
              
              <center><input type="submit" name="submit" value="Update" class="btn bg-default margin-20"></center>
              </div>
        </form>
	              		</div>
	              	</div>
            	</div>
          	</div>
      	</section>

  

    <script type="text/javascript">
      $(document).ready(function() {

       

        $(function() {

$('input[name="datefilter"]').daterangepicker({
  maxDate: 0,
  minDate: '-1M',
    autoUpdateInput: false,
    locale: {
        cancelLabel: 'Clear'
    }
    
});

$('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {
    $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
});

$('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
    $(this).val('');
});

});
      });
      </script>

 <!--body content end--> <?php include 'assets/common/footer.php';?>
 </div>
    <!----header----->

    <script src="assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
	
  <!-- <script src="assets/vendors/jquery/jquery-3.6.0.min.js"></script> -->
  
  <script src="assets/plugins/dataTables/js/jquery.dataTables.min.js"></script>
  <script src="assets/plugins/dataTables/js/dataTables.bootstrap4.min.js"></script>
  <script src="assets/plugins/dataTables/js/dataTables.responsive.min.js"></script>
  <script src="assets/plugins/dataTables/js/responsive.bootstrap4.min.js"></script>
  
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
  
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
            $('.span_hide').hide();
            
            $('#select_checkbox').click(function(){
                if($(this).prop("checked") == true) {
                    $('.select_checkbox').prop('checked', true);
                    
                    $('.span_hide').show();
                }else{
                    $('.select_checkbox').prop('checked', false);
                    $('.span_hide').hide();
                }
            });
            $('.in_out').click(function(){
              if($(this).prop("checked") == true) {
                var class_name = $(this).attr("id");
                $('.'+class_name).show();
              }else{
                var class_name = $(this).attr("id");
                $('.'+class_name).hide();
              }
            });
        });
    </script>


   </body>
</html>
