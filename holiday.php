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
                                  <a href="holiday_calender.php" class="btn btn-sm bg-default float-right margin_top-28"><i class="fa fa-calendar"></i></a>
                                 
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
                              <input type="date" name="start_date" id="start_date" class="form-control"  required>
                            </div>

                            <div class="col-md-2">
                              <label>End Date</label>
                              <input type="date" name="end_date" id="end_date" class="form-control"  required>
                            </div>
                            
                            <div class="col-lg-2">
                              <button type="submit" class="btn btn-sm bg-default margin_top_40" name="search" >
                                <i class="fa fa-search"></i>
                              </button>
                              <a href="employee_attendance.php" title="Reset" class="btn btn-sm btn-danger margin_top_40" data-bs-toggle="tooltip" title="" data-original-title="Reset" data-bs-original-title="Reset">
                                <i class="fa fa-trash "></i>
                            </a>
                           
                            </div>
                          </div>
                          
                        </div>
                        </form>
                            <?php include "display_msg.php"; ?>
                   <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr>
					<th>S.No</th>
					<th>Occasion</th>
					<th>Start Date</th>
					<th> End Date</th>
					<th>Actions</th>
                </tr>
                </thead>
                <tbody>
       	<?php $i=1;
                if(isset($_POST['start_date'])){
                    $start_date = $_POST['start_date'];
                    $end_date = $_POST['end_date'];
                    $sel_rw = mysqli_query($link,"select * from holiday_tbl where (start_date between '$start_date' and '$end_date') or (end_date between '$start_date' and '$end_date')");
                }else{
                    $sel_rw = mysqli_query($link,"select * from holiday_tbl");
                }
				
                
				while($row = mysqli_fetch_object($sel_rw)){  ?>  

                <tr>
				    <td><?php echo $i; ?></td>
					
					<td><?php echo $row->occasion; ?></td>
                   
                    <td><?php echo date('M d, Y',strtotime($row->start_date)); ?></td>
                    <td><?php echo date('M d, Y',strtotime($row->end_date)); ?></td>
                          
                    <td>
                        <button class="btn btn-sm btn-success edit" id="edit<?php echo $row->autoid; ?>"  type="button" data-bs-toggle="modal" data-bs-target="#myModalEdit"><i class="fa fa-edit"></i></button>

						<a class="btn btn-sm bg-danger text-white" href="holiday.php?autoid=<?php echo $row->autoid; ?>&del=yes" title="Delete Details"><i class="fa fa-trash"></i></a>
					</td>
					
				</tr>
				<?php $i++; } ?>
                     </tbody>
              </table>
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
           
            <!-- Edit Modal -->

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
      	</section>
      <!--body content end--> <?php include 'assets/common/footer.php';?>
    </div>
    <!----header----->
  </body>
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