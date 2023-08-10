<?php 
include 'dbc.php'; 
page_protect();
$created_by = $_SESSION['userid'];
$approved_by = "";
$page = "holiday"; ?>


<?php 

if(isset($_POST['submit'])){
    if($_POST['submit']=='Create'){
        
        $autoid = mysqli_real_escape_string($link,$_POST['autoid']);
        $occasion = mysqli_real_escape_string($link,$_POST['occasion']);
        $start_date = mysqli_real_escape_string($link,$_POST['start_date']);
        $end_date =  mysqli_real_escape_string($link,$_POST['end_date']);
        
        if(mysqli_query($link,"INSERT INTO `holiday_tbl` (`autoid`, `occasion`, `start_date`, `end_date`,  `ip_address`, `browser`, `created_at`, `created_by`, `approved_by`) VALUES ( '$autoid', '$occasion', '$start_date', '$end_date', '$ip_address', '$browser', NOW(), '$created_by', '$approved_by')")){
            $msg[] = "Successfully Saved!";
         }else{
            $err[] = "Try again later";
        }
        
    }
    if($_POST['submit']=='Update'){
       
        $autoid = mysqli_real_escape_string($link,$_POST['autoid']);
        $occasion = mysqli_real_escape_string($link,$_POST['occasion']);
        $start_date = mysqli_real_escape_string($link,$_POST['start_date']);
        $end_date =  mysqli_real_escape_string($link,$_POST['end_date']);

        if(mysqli_query($link,"UPDATE `holiday_tbl` SET `occasion`='$occasion', `start_date`='$start_date', `end_date`='$end_date',  `ip_address`='$ip_address', `browser`='$browser', `created_by` = '$created_by', `approved_by`='$approved_by' where autoid='$autoid'")){

            $msg[] = "Successfully Updated!";
          
        }else{
            $msg[] = "Error - Try Again!";
        }
        
    }
}



if($_GET['del'] == "yes"){
	$autoid=$_GET['autoid'];
    if(mysqli_query($link,"delete from `holiday_tbl` where `autoid`='$autoid'")){
		header("location:holiday.php");
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
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<link rel="icon" href="assets/img/favicon.png" type="image/x-icon">
  <!-- plugins css -->
	<link rel="stylesheet" href="assets/vendors/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendors/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/style1.css">
	<link rel="stylesheet" href="assets/css/responsive.css">

	
    <?php //include 'assets/common/css_file.php';?> 
    
    <link rel="stylesheet" href="calender/css/calendar.css">
    <!-- <script src="https://code.jquery.com/jquery-3.7.0.js"></script> -->
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
                                    <h3 class="box-heading">Manage Holiday 
                                    <div class="breadcrumb">
	              						<a href="index.php" class="breadcrumb_a">Home</a> 
                            			<i class="fa fa-angle-double-right angle_double_right"></i>
		              					<a href="#" class="breadcrumb_a">Manage Holiday </a> 
	              					</div>
                                </div>
                                    </h3> 
                                  
	              				<div class="col-lg-6">
                                  <button class="btn btn-sm bg-default float-right margin-28" type="button" data-bs-toggle="modal" data-bs-target="#myModal"><i class="fa fa-plus"></i></button>
                                  <a href="holiday.php" title="list view" class="btn btn-sm bg-default float-right margin_top-28"><i class="fa fa-list"></i></a>
	              					
	              				</div>
	              			</div>
	              		</div>
	              		<div class="box-body">
	              			<!-- <h5 class="second_heading">Add Industry</h5> -->
                            <form method="post">
                        <div class="form-group row form_box_shadow">
                          
                          <div class="col-lg-12 row">
                            
                            <div class="col-md-2 offset-lg-6">
                              <label>Start Date</label>
                              <input type="date" name="start_date" class="form-control"  required>
                            </div>

                            <div class="col-md-2">
                              <label>End Date</label>
                              <input type="date" name="end_date" class="form-control"  required>
                            </div>
                            
                            <div class="col-lg-2">
                              <button type="submit" class="btn btn-sm bg-default margin_top-28" name="search" >
                                <i class="fa fa-search"></i>
                              </button>
                              <a href="holiday_calender.php" title="Reset" class="btn btn-sm btn-danger margin_top-28" data-bs-toggle="tooltip" title="" data-original-title="Reset" data-bs-original-title="Reset">
                                <i class="fa fa-trash "></i>
                            </a>
                           
                            </div>
                          </div>
                          
                        </div>
                        </form>
<div class="container">
<?php include "display_msg.php"; ?>
	<div class="row">
		<div class="col-md-8 ">
            <div class="form_box_shadow">
        <h4>Calendar </h4>	
	    <hr> 
        <div class="page-header">
		<div class="pull-right form-inline">
			<div class="btn-group">
				<button class="btn bg-default" data-calendar-nav="prev"><< Prev</button>
				<button class="btn btn-default" data-calendar-nav="today">Today</button>
				<button class="btn bg-default" data-calendar-nav="next">Next >></button>
			</div>
            <h3 class="btn-group"></h3>
			<div class="btn-group">
				
				<button class="btn bg-default active" data-calendar-view="month">Month</button>
				<button class="btn bg-default" data-calendar-view="week">Week</button>
				<button class="btn bg-default" data-calendar-view="day">Day</button>
			</div>
		</div>
	</div>
    <br>
			<div id="showEventCalendar"></div>
            </div>
		</div>
		<div class="col-md-4">
        <div class="form_box_shadow">
        
            <h5 class="">Meetin List</h5>
            <div class="margin_top-28"></div>
            <?php 
            if(isset($_POST['start_date'])){
                $start_date = $_POST['start_date'];
                $end_date = $_POST['end_date'];
                $sel_rw = mysqli_query($link,"select * from meeting_tbl where (date between '$start_date' and '$end_date') or (end_date between '$start_date' and '$end_date')");
            }else{
                $sel_rw = mysqli_query($link,"select * from meeting_tbl limit 5");
            }
            
            if(mysqli_num_rows($sel_rw)>0){
            
            while($row = mysqli_fetch_object($sel_rw)){  ?>
                <div class="row box_border">
                    <div class="col-lg-8">
                        <p class="font_weight_normal margin_0 main_color"><?php echo $row->occasion; ?></p>
                        <p class="font_weight_normal margin_0">Start Date : <?php echo date('M d, Y',strtotime($row->start_date)); ?></p>
                        <p class="font_weight_normal margin_0">End Date : <?php echo date('M d, Y',strtotime($row->end_date)); ?></p>
                    </div>
                    <div class="col-lg-4">
                        <a class="btn btn-sm bg-danger text-white float-right ml-1 mt-3" href="holiday.php?autoid=<?php echo $row->autoid; ?>&del=yes" title="Delete Details"><i class="fa fa-trash"></i></a>

                        <button class="btn btn-sm btn-success edit float-right ml-1 mt-3" id="edit<?php echo $row->autoid; ?>"  type="button" data-bs-toggle="modal" data-bs-target="#myModalEdit"><i class="fa fa-edit"></i></button>
                    </div>

                </div>
            <?php } }else{
                echo "<h5>No Holidays Found...</h5>";
            } ?>
            </div>
		</div>
	</div>	
	
</div>
<!-- Add Leave Modal -->
<div class="modal" id="myModal">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Create New Holiday</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                    <form method="post" class="padding-10" enctype="multipart/form-data">
                        <?php $max_id = maxOfAll("id","holiday_tbl");
                        $max_id=$max_id+1;
                        $upload_id="H-".$max_id; ?>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
                                <div class="form-group row">
                                    <label  for="industry_name">Occasion </label>
                                    <input type="text" class="form-control" style="width:90%" name="occasion">
                                    <input type="hidden" name="autoid" value="<?php echo $upload_id ?>">
                                </div>
                            </div>
                        
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
                                <div class="form-group row">
                                    <label  for="industry_id"> Start Date</label>
                                    <input type="date" name="start_date" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
                                <div class="form-group row">
                                    <label  for="industry_id">End Date</label>
                                    <input type="date" style="width:90%" name="end_date" class="form-control" required>
                                </div>
                            </div>

                    </div>
                </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        
                    <input type="submit" name="submit" id="submit" class="btn btn-success float-right" value="Create">
                    </form>
                    
                    </div>

                    </div>
                </div>
            </div>   
            <div class="modal" id="myModalEdit">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Holiday</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                    <form method="post" class="padding-10" enctype="multipart/form-data">
                       
                        <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
                                <div class="form-group row">
                                    <label  for="industry_name">Occasion </label>
                                    <input type="text" id="occasion" class="form-control" style="width:90%" name="occasion">
                                    <input type="hidden" name="autoid" class="autoid">
                                </div>
                            </div>
                        
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
                                <div class="form-group row">
                                    <label  for="industry_id"> Start Date</label>
                                    <input type="date" id="start_date" name="start_date" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
                                <div class="form-group row">
                                    <label  for="industry_id">End Date</label>
                                    <input type="date" name="end_date" style="width:90%" id="end_date" class="form-control" required>
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
                        </div>
                    </div>
                </div>
                </div>
<?php include 'assets/common/footer.php';?>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
<script type="text/javascript" src="js/calendar.js"></script>
<script type="text/javascript" src="js/holiday.js"></script>

<?php include 'assets/common/js_file.php';?> 
    <script>
        $(document).ready(function () {
            $('#example').DataTable();

            $('.edit').click(function(){
              
                var id_name = $(this).attr("id");
                var id = id_name.substr(4);
                var url = 'ajax_request/get_holiday.php';
                $.ajax({
                    url : url,
                    type: "POST",
                    data: {id : id},
                    dataType: "JSON",
                    success: function(data)
                    {
                    //if success close modal and reload ajax table
                        $('.autoid').val(data.autoid);
                        $('#occasion').val(data.occasion);
                        $('#start_date').val(data.start_date);
                        $('#end_date').val(data.end_date);
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                    alert('Error adding / update data');
                    }
                });
            });
        });
        
    </script>
  
</html>