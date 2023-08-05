<?php 
include 'dbc.php'; 
page_protect();
$created_by = $_SESSION['userid'];
$approved_by = "";
$page = "trainer_list_view"; ?>
<?php if($_GET['del'] == "yes"){
	  $autoid=$_GET['autoid'];
    if(mysqli_query($link,"delete from `attendance_tbl` where `autoid`='$autoid'")){
		$msg[] = "Successfully Deleted!";
	}
	else
	{
		$err[] = "Error - Failed To Delete!";
	}	
	}

  if(isset($_POST['submit'])){
    $emp_id = $_POST['employee'];
    $date = $_POST['date'];
    $in_time = $_POST['in_time'];
    $out_time = $_POST['out_time'];
    $autoid = $_POST['autoid'];

    $update = mysqli_query($link,"update attendance_tbl set e_id='$emp_id', date='$date',in_time='$in_time',out_time='$out_time' where autoid='$autoid'");

    if($update){
      $msg[] = 'Updated Successfully!';
    }else{
      $err[] = "Something went wrong!";
    }
  }
  
	?>
  <!DOCTYPE html>
<html lang="en">
  <head>
    <title>Butterfly Paint - Manage Attendance List</title>
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
                                    <h3 class="box-heading">Manage Attendance List
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
                          
                          <div class="col-lg-12 row">
                            <div class="col-lg-2">
                                <p>Type</p>
                                <label><input type="radio" name="type" value="monthly" id="monthly"> Monthly</label>
                                <label><input type="radio" name="type" value="daily" id="daily"> Daily</label>
                                
                            </div>
                            <div class="col-md-2">
                              <label>Date</label>
                              <input type="date" name="date" id="date" class="form-control"  required>
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
                              <button type="submit" class="btn btn-sm bg-default margin_top_40" name="search" >
                                <i class="fa fa-search"></i>
                              </button>
                              <a href="employee_attendance.php" title="Reset" class="btn btn-sm btn-danger margin_top_40" data-bs-toggle="tooltip" title="" data-original-title="Reset" data-bs-original-title="Reset">
                                <i class="fa fa-trash "></i>
                            </a>
                           
                            <button class="btn btn-sm bg-default margin_top_40" type="button" data-bs-toggle="modal"    data-bs-target="#myModal"><i class="fa fa-arrow-down"></i></button>
                            </div>
                          </div>
                          
                        </div>
                        </form>
                        <?php include "display_msg.php"; ?>    
                   <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr>
					<th>S.No</th>
					<th>Employee</th>
					<th>Date</th>
					<th>Status</th>
					<th>Clock In</th>
					<th>Clock Out</th>
					<th>Late</th>
					<th>Yearly Leaving</th>
					<th>Overtime</th>
					<th>Action</th>
                </tr>
                </thead>
                <tbody>
       	<?php
       
        if(isset($_POST['search'])){
           $type = $_POST['type'];
           $date = $_POST['date'];
           $branch = $_POST['branch'];
           $department = $_POST['department'];

           if($type == 'daily'){
            $cond = "branch='$branch' and department='$department' and date='$date'";
           }else{
            $month = date('m',strtotime($date));
            $year = date('Y',strtotime($date));
            $cond = "branch='$branch' and department='$department' and MONTH(date)='$month' and YEAR(date)='$year'";
           }

          $sel_rw = mysqli_query($link,"select autoid,e_id,date,in_time,out_time,daystatus,late,yearly_leaving,overtime from attendance_tbl where $cond");
        }else{
            
          $sel_rw = mysqli_query($link,"select autoid,e_id,date,in_time,out_time,daystatus,late,yearly_leaving,overtime from attendance_tbl");
        }
				
            $i=1;    
				while($row = mysqli_fetch_object($sel_rw)){
                   $emp_id = $row->e_id;

                    list($emp_name) = mysqli_fetch_row(mysqli_query($link,"select name from employee where emp_id = '$emp_id'"));
                    
                   
				?>

                <tr>
                  <td> <?php echo $i; ?> </td>
                  <td><?php echo $emp_name; ?></td>
                  <td><?php echo date('M d, Y',strtotime($row->date)); ?></td>
                  <td><?php echo $row->daystatus; ?></td>
                  <td><?php echo date('h:i A',strtotime($row->in_time)); ?></td>
                  <td><?php echo date('h:i A',strtotime($row->out_time)); ?></td>
                  <td><?php echo $row->late; ?></td>
                  <td><?php echo $row->yearly_leaving; ?></td>
                  <td><?php echo $row->overtime; ?></td>
                  <td>
                    <button type="submit" class="btn btn-sm bg-default edit" id="<?php echo $row->autoid; ?>">
                        <i class="fa fa-pencil"></i>
                    </button>
                    <a href="employee_attendance.php?id=<?php echo $row->autoid; ?>&del=yes" title="Delete" class="btn btn-sm btn-danger">
                        <i class="fa fa-trash"></i>
                    </a>   
                    
                    </td>
				</tr>
				<?php $i++; } ?>
                     </tbody>
              </table>
              
              
              </div>
        
	              		</div>
	              	</div>
            	</div>
          	</div>

            <div class="modal" id="editModal">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Attendance</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                    <form method="post" class="padding-10" enctype="multipart/form-data">
                       
                        <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
                    <div class="form-group row">
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
                        <label class="margin-left-10" for="industry_name">Employee </label>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
                            <select name="employee" class="form-control" id="employee" required>
                                <option value="">Select Employee</option>
                                <?php $sel_emp = mysqli_query($link,"select emp_id,name from employee"); 
                                while($fet_emp = mysqli_fetch_object($sel_emp)){
                                    ?><option value="<?php echo $fet_emp->emp_id; ?>"><?php echo $fet_emp->name; ?></option><?php
                                } ?>
                                
                            </select>
                            <input type="hidden" class="autoid" name="autoid" id="autoid">
                        </div>
                    </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
                    <div class="form-group row">
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
                        <label class="margin-left-10" for="industry_id">Date</label>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
                            <input type="date" name="date" id="date1" class="form-control">
                            
                        </div>
                    </div>
                    </div>

                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
                            <div class="form-group row">
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
                                <label class="margin-left-10" for="industry_id">Clock In</label>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
                                <input type="time" id="in_time" name="in_time"  class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
                            <div class="form-group row">
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
                                <label class="margin-left-10" for="industry_id">Clock Out</label>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
                                <input type="time" id="out_time" name="out_time" class="form-control">
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        
                      <input type="submit" name="submit" id="submit" class="btn btn-success float-right" value="Update">
                    </form>
                    
                    </div>

                    </div>
                </div>
            </div>  

            <div class="modal" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title"> Import employee CSV file </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                    <form method="post" action="employee_attendance_import.php" class="padding-10" enctype="multipart/form-data">
                       <p>Download sample employee CSV file <a class="btn bg-default" href="assets/uploads/csv/sample_attendance1.csv" download>Download <i class="fa fa-download"></i></a></p>
                        <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-pad">
                    <div class="form-group row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-pad">
                        <label for="industry_name">Select CSV file </label>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-pad">
                          <input type="file" name="file" class="form-control" required>
                        </div>
                    </div>
                    </div>
                 </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary">Cancel</button>    
                    <input type="submit" name="submit" id="submit" class="btn btn-success float-right" value="Upload">
                    </form>
                    
                    </div>

                    </div>
                </div>
            </div>  
      	</section>


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
           
            $("#monthly").click(function(){
              $("#date").attr("type","month");
              var today = new Date();
              var dd = String(today.getDate()).padStart(2, '0');
              var yyyy = today.getFullYear();

              const monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

              const d = new Date();
              var mm = monthNames[d.getMonth()];

              today = mm + ',' +  yyyy;
              
             $("#date").val(today);
            });

            $("#daily").click(function(){ 
              $("#date").attr("type","date");
            });

            $(".edit").click(function(){
              var id = $(this).attr("id");
              var url = 'get_attendance.php';
                $.ajax({
                  url : url,
                  type: "POST",
                  data: {id : id},
                  dataType: "JSON",
                  success: function(data)
                  {
                  //if success close modal and reload ajax table
                      $('#autoid').val(data.autoid);
                      $("#employee option[value='"+ data.emp_id +"']").attr("selected", "selected");
                      $('#date1').val(data.date);
                      $('#in_time').val(data.in_time);
                      $('#out_time').val(data.out_time);
                      $('#editModal').modal('show');
                  },
                  error: function (jqXHR, textStatus, errorThrown)
                  {
                  alert('Error adding / update data');
                  }
                });
            });
            
        });
    </script>


   </body>
</html>
