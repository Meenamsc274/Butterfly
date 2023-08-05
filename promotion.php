<?php 
include 'dbc.php'; 
page_protect();
$created_by = $_SESSION['userid'];
$approved_by = "";
$page = "prmotion"; ?>
<?php 

if(isset($_POST['submit'])){
    if($_POST['submit']=='Create'){
        
        $autoid = mysqli_real_escape_string($link,$_POST['autoid']);
        $employee = mysqli_real_escape_string($link,$_POST['employee']);
        $designation = mysqli_real_escape_string($link,$_POST['designation']);
        $promotion_title =  mysqli_real_escape_string($link,$_POST['promotion_title']);
        $promotion_date = mysqli_real_escape_string($link,$_POST['promotion_date']);
        $description = mysqli_real_escape_string($link,$_POST['description']);
     
        
        if(mysqli_query($link,"INSERT INTO `promotion_tbl` (`autoid`, `employee`, `designation`, `promotion_title`, `promotion_date`, `description`,  `ip_address`, `browser`, `created_at`, `created_by`, `approved_by`) VALUES ( '$autoid', '$employee', '$designation', '$promotion_title', '$promotion_date', '$description', '$ip_address', '$browser', NOW(), '$created_by', '$approved_by')")){
            $msg[] = "Successfully Saved!";
         }else{
            $err[] = "Try again later";
        }
        
    }
    if($_POST['submit']=='Update'){
        $autoid = mysqli_real_escape_string($link,$_POST['autoid']);
        $employee = mysqli_real_escape_string($link,$_POST['employee']);
        $designation = mysqli_real_escape_string($link,$_POST['designation']);
        $promotion_title =  mysqli_real_escape_string($link,$_POST['promotion_title']);
        $promotion_date = mysqli_real_escape_string($link,$_POST['promotion_date']);
        $description = mysqli_real_escape_string($link,$_POST['description']);

        if(mysqli_query($link,"UPDATE `promotion_tbl` SET `employee`='$employee', `designation`='$designation', `promotion_title`='$promotion_title', `promotion_date`='$promotion_date', `description`='$description',   `ip_address`='$ip_address', `browser`='$browser', `created_by` = '$created_by', `approved_by`='$approved_by' where autoid='$autoid'")){

            $msg[] = "Successfully Saved!";
        }
        
    }
}



if($_GET['del'] == "yes"){
	$autoid=$_GET['autoid'];
    if(mysqli_query($link,"delete from `promotion_tbl` where `autoid`='$autoid'")){
		header("location:promotion.php");
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
                                    <h3 class="box-heading">Manage Promotion 
                                    <div class="breadcrumb">
	              						<a href="index.php" class="breadcrumb_a">Home</a> 
                            			<i class="fa fa-angle-double-right angle_double_right"></i>
		              					<a href="#" class="breadcrumb_a">Manage Promotion </a> 
	              					</div>
                                </div>
                                    </h3> 
                                  
	              				<div class="col-lg-6">
                                  <button class="btn btn-sm bg-default float-right margin-28" type="button" data-bs-toggle="modal" data-bs-target="#myModal"><i class="fa fa-plus"></i></button>
	              					
	              				</div>
	              			</div>
	              		</div>
	              		<div class="box-body">
	              			<!-- <h5 class="second_heading">Add Industry</h5> -->
                            <?php include "display_msg.php"; ?>
                   <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr>
					<th>S.No</th>
					<th>Employee Name</th>
					<th>Designation</th>
					<th>Promotion title</th>
					<th>Promotion Date</th>
					<th>Description</th>
					<th>Actions</th>
                </tr>
                </thead>
                <tbody>
       	<?php $i=1;
				$sel_rw = mysqli_query($link,"select * from promotion_tbl");
                
				while($row = mysqli_fetch_object($sel_rw)){
                     $emp_id = $row->employee;
                     $desi_id = $row->designation;
                    
                    list($emp_name) = mysqli_fetch_row(mysqli_query($link,"select name from employee where emp_id = '$emp_id'"));
                    
                    list($designation_name) = mysqli_fetch_row(mysqli_query($link,"select designation_name from designation_tbl where designation_id  = '$desi_id'"));
                     ?>  

                <tr>
				    <td><?php echo $i; ?></td>
					<td><?php echo $emp_name; ?></td>
					<td><?php echo $designation_name; ?></td>
					
                    <td><?php echo $row->promotion_title; ?></td>
                    <td><?php echo date('M d, Y',strtotime($row->promotion_date)); ?></td>
                    
                    <td><?php echo $row->description; ?></td>
					          
                    <td>
                        <button class="btn btn-sm btn-success edit" id="edit<?php echo $row->autoid; ?>"  type="button" data-bs-toggle="modal" data-bs-target="#myModalEdit"><i class="fa fa-edit"></i></button>

						<a class="btn btn-sm bg-danger text-white" href="promotion.php?autoid=<?php echo $row->autoid; ?>&del=yes" title="Delete Details"><i class="fa fa-trash"></i></a>
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
                        <h4 class="modal-title">Create New Promotion</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                    <form method="post" class="padding-10" enctype="multipart/form-data">
                        <?php $max_id = maxOfAll("id","promotion_tbl");
                        $max_id=$max_id+1;
                        $upload_id="PRO-".$max_id; ?>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
                                <div class="form-group row">
                                    <label  for="industry_name">Employee </label>
                                    <select name="employee" class="form-control" style="width:90%" required>
                                        <option value="">Select Employee</option>
                                        <?php $sel_emp = mysqli_query($link,"select emp_id,name from employee"); 
                                        while($fet_emp = mysqli_fetch_object($sel_emp)){
                                            ?><option value="<?php echo $fet_emp->emp_id; ?>"><?php echo $fet_emp->name; ?></option><?php
                                        } ?>
                                        
                                    </select>
                                    <input type="hidden" name="autoid" value="<?php echo $upload_id ?>">
                                </div>
                            </div>
                        
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
                                <div class="form-group row">
                                    <label  for="industry_id"> Designation</label>
                                    <select name="designation"  class="form-control" required="required">
                                        <?php
                                        $sel_rw1 = mysqli_query($link,"select * from designation_tbl");
                                        while($row1 = mysqli_fetch_object($sel_rw1)){
                                        ?>

                                        <option value="<?php echo $row1->designation_id; ?>"><?php echo $row1->designation_name; ?></option>

                                        <?php } ?>
                                    </select>
                                </div>
                            </div> 

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
                                <div class="form-group row">
                                    <label  for="industry_id"> Promotion Title</label>
                                    <input type="text" style="width:90%" name="promotion_title" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
                                <div class="form-group row">
                                    <label  for="industry_id">Promotion Date</label>
                                    <input type="date" name="promotion_date" class="form-control" style="width:90%" required>
                                </div>
                            </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-pad">
                            <div class="form-group row">
                                <label for="industry_id">Description</label>
                                <textarea rows="7" name="description" placeholder="Enter Description" class="form-control"></textarea>
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
                        <h4 class="modal-title">Edit Promotion</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                    <form method="post" class="padding-10" enctype="multipart/form-data">
                       
                        <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
                    <div class="form-group row">
                        <label  for="industry_name">Employee </label>
                        
                            <select name="employee" class="form-control" id="employee" required style="width:90%">
                                <option value="">Select Employee</option>
                                <?php $sel_emp = mysqli_query($link,"select emp_id,name from employee"); 
                                while($fet_emp = mysqli_fetch_object($sel_emp)){
                                    ?><option value="<?php echo $fet_emp->emp_id; ?>"><?php echo $fet_emp->name; ?></option><?php
                                } ?>
                                
                            </select>
                            <input type="hidden" class="autoid" name="autoid" id="autoid">
                        
                    </div>
                    </div>
                    
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
                                <div class="form-group row">
                                    <label  for="industry_id"> Designation</label>
                                    <select name="designation" id="designation" class="form-control" required="required">
                                    <?php
                                    $sel_rw1 = mysqli_query($link,"select * from designation_tbl");
                                    while($row1 = mysqli_fetch_object($sel_rw1)){
                                    ?>

                                    <option value="<?php echo $row1->designation_id; ?>"><?php echo $row1->designation_name; ?></option>

                                    <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
                                <div class="form-group row">
                                    <label  for="industry_id"> Promotion Title</label>
                                    <input type="text" name="promotion_title" id="promotion_title" style="width:90%" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
                                <div class="form-group row">
                                    <label  for="industry_id">Promotion Date</label>
                                    <input type="date" name="promotion_date" id="promotion_date" class="form-control" style="width:90%" required>
                                </div>
                            </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-pad">
                            <div class="form-group row">
                                <label for="industry_id">Description</label>
                                <textarea rows="7" name="description" id="description" placeholder="Enter Description" class="form-control"></textarea>
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
                var url = 'ajax_request/get_promotion.php';
                $.ajax({
                    url : url,
                    type: "POST",
                    data: {id : id},
                    dataType: "JSON",
                    success: function(data)
                    {
                    //if success close modal and reload ajax table
                        $('.autoid').val(data.autoid);
                        $("#employee option[value='"+ data.emp_id +"']").attr("selected", "selected");
                        $("#designation option[value='"+ data.designation +"']").attr("selected", "selected");
                        
                        $('#promotion_title').val(data.promotion_title);
                        $('#promotion_date').val(data.promotion_date);
                        $('#description').val(data.description);
                       
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