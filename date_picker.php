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
                        <div class="form-group row">
                          <div class="col-lg-5">

                          </div>
                          <div class="col-lg-7 row">
    <div class="col-md-4 demo">
      <label>Date</label>
      <input type="text" id="config-demo" class="form-control">
      </div>
                          </div>
                        </div>
                      </form>
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
				    <td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td>
                        <input type="checkbox" class="select_checkbox">
                        <span class="padding-10">In</span>
                        <input class="padding-10" type="time" value="08:00" name="in_time">
                        <span class="padding-10">Out</span>
                        <input class="padding-10" type="time" value="08:00" name="in_time">
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

  

    <script type="text/javascript">
      $(document).ready(function() {

  


        updateConfig();

        function updateConfig() {
          var options = {};

            options.singleDatePicker = true;
          
       
            options.showDropdowns = true;

       
            options.showWeekNumbers = true;

        
            options.showISOWeekNumbers = true;

         
            options.timePicker = true;
          
        
            options.timePicker24Hour = true;

            options.timePickerIncrement = parseInt($('#timePickerIncrement').val(), 10);

            options.timePickerSeconds = true;
          
       
            options.autoApply = true;

         
            options.dateLimit = { days: 7 };

         
            options.ranges = {
              'Today': [moment(), moment()],
              'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
              'Last 7 Days': [moment().subtract(6, 'days'), moment()],
              'Last 30 Days': [moment().subtract(29, 'days'), moment()],
              'This Month': [moment().startOf('month'), moment().endOf('month')],
              'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            };
          

        
            options.locale = {
           
              format: 'MM/DD/YYYY HH:mm',
              separator: ' - ',
              applyLabel: 'Apply',
              cancelLabel: 'Cancel',
              fromLabel: 'From',
              toLabel: 'To',
              customRangeLabel: 'Custom',
              daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr','Sa'],
              monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
              firstDay: 1
            };
         

            options.linkedCalendars = false;

         
            options.autoUpdateInput = false;

       
            options.showCustomRangeLabel = false;

            options.alwaysShowCalendars = true;

            options.parentEl = $('#parentEl').val();

          
            options.startDate = $('#startDate').val();

         
            options.endDate = $('#endDate').val();
      
            options.minDate = $('#minDate').val();

      
            options.maxDate = $('#maxDate').val();

       
            options.opens = $('#opens').val();

     
            options.drops = $('#drops').val();

         
            options.buttonClasses = $('#buttonClasses').val();

            options.applyClass = $('#applyClass').val();

        
            options.cancelClass = $('#cancelClass').val();

            $('#config-text').val("$('#demo').daterangepicker(" + JSON.stringify(options, null, '    ') + ", function(start, end, label) {\n  console.log(\"New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')\");\n});");

          $('#config1-demo').daterangepicker(options, function(start, end, label) {
            
            console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')'); 
          
          }).click();;
          
        }

        $('#config-demo').daterangepicker({
    "timePicker": true,
    "timePicker24Hour": true,
    "ranges": {
        "Today": [
            "2022-01-27T18:03:44.551Z",
            "2022-01-27T18:03:44.551Z"
        ],
        "Yesterday": [
            "2022-01-26T18:03:44.551Z",
            "2022-01-26T18:03:44.551Z"
        ],
        "Last 7 Days": [
            "2022-01-21T18:03:44.551Z",
            "2022-01-27T18:03:44.551Z"
        ],
        "Last 30 Days": [
            "2021-12-29T18:03:44.551Z",
            "2022-01-27T18:03:44.551Z"
        ],
        "This Month": [
            "2021-12-31T18:30:00.000Z",
            "2022-01-31T18:29:59.999Z"
        ],
        "Last Month": [
            "2021-11-30T18:30:00.000Z",
            "2021-12-31T18:29:59.999Z"
        ]
    },
    "startDate": "01/21/2022",
    "endDate": "01/27/2022"
}, function(start, end, label) {
  console.log("New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')");
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

            $('#select_checkbox').click(function(){
                if($(this).prop("checked") == true) {
                    $('.select_checkbox').prop('checked', true);
                }else{
                    $('.select_checkbox').prop('checked', false);
                }
            });
        });
    </script>


   </body>
</html>
