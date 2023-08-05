<?php 
include 'dbc.php'; 
page_protect();
$created_by = $_SESSION['userid'];
$approved_by = "";
$page = "announcement"; ?>
<?php 

if(isset($_POST['submit'])){
    if($_POST['submit']=='Create'){
        
        $autoid = mysqli_real_escape_string($link,$_POST['autoid']);
        $title = mysqli_real_escape_string($link,$_POST['title']);
        $branch = mysqli_real_escape_string($link,$_POST['branch']);
        $department = mysqli_real_escape_string($link,$_POST['department']);
        $start_date = mysqli_real_escape_string($link,$_POST['start_date']);
        $end_date =  mysqli_real_escape_string($link,$_POST['end_date']);
        $description = mysqli_real_escape_string($link,$_POST['description']);
     
        
        if(mysqli_query($link,"INSERT INTO `announcement_tbl` (`autoid`, `title`, `branch`, `department`, `start_date`, `end_date`, `description`,  `ip_address`, `browser`, `created_at`, `created_by`, `approved_by`) VALUES ( '$autoid', '$title', '$branch', '$department', '$start_date', '$end_date', '$description', '$ip_address', '$browser', NOW(), '$created_by', '$approved_by')")){
            $msg[] = "Successfully Saved!";
         }else{
            $err[] = "Try again later";
        }
        
    }
    if($_POST['submit']=='Update'){
       
        $autoid = mysqli_real_escape_string($link,$_POST['autoid']);
        $title = mysqli_real_escape_string($link,$_POST['title']);
        $branch = mysqli_real_escape_string($link,$_POST['branch']);
        $department = mysqli_real_escape_string($link,$_POST['department']);
        $start_date = mysqli_real_escape_string($link,$_POST['start_date']);
        $end_date =  mysqli_real_escape_string($link,$_POST['end_date']);
        $description = mysqli_real_escape_string($link,$_POST['description']);

        if(mysqli_query($link,"UPDATE `announcement_tbl` SET `title`='$title', `branch`='$branch', `department`='$department', `start_date`='$start_date', `end_date`='$end_date', `description`='$description', `ip_address`='$ip_address', `browser`='$browser', `created_by` = '$created_by', `approved_by`='$approved_by' where autoid='$autoid'")){

            $msg[] = "Successfully Updated!";
          
        }else{
            $msg[] = "Error - Try Again!";
        }
        
    }
}



if($_GET['del'] == "yes"){
	$autoid=$_GET['autoid'];
    if(mysqli_query($link,"delete from `announcement_tbl` where `autoid`='$autoid'")){
		header("location:announcement.php");
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
                                    <h3 class="box-heading">Manage Announcement 
                                    <div class="breadcrumb">
	              						<a href="index.php" class="breadcrumb_a">Home</a> 
                            			<i class="fa fa-angle-double-right angle_double_right"></i>
		              					<a href="#" class="breadcrumb_a">Manage Announcement </a> 
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
					<th>Title</th>
					<th>Start Date</th>
					<th>End Date</th>
					<th>Description</th>
					
					<th>Actions</th>
                </tr>
                </thead>
                <tbody>
       	<?php $i=1;
				$sel_rw = mysqli_query($link,"select * from announcement_tbl");
                
				while($row = mysqli_fetch_object($sel_rw)){  ?>  

                <tr>
				    <td><?php echo $i; ?></td>
					<td><?php echo $row->title; ?></td>
                    <td><?php echo date('M d, Y',strtotime($row->start_date)); ?></td>
                    <td><?php echo date('M d, Y',strtotime($row->end_date)); ?></td>
                    <td><?php echo $row->description; ?></td>         
                    <td>
                        <button class="btn btn-sm btn-success edit" id="edit<?php echo $row->autoid; ?>"  type="button" data-bs-toggle="modal" data-bs-target="#myModalEdit"><i class="fa fa-edit"></i></button>

						<a class="btn btn-sm bg-danger text-white" href="announcement.php?autoid=<?php echo $row->autoid; ?>&del=yes" title="Delete Details"><i class="fa fa-trash"></i></a>
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
                        <h4 class="modal-title">Create New Announcement</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                    <form method="post" class="padding-10" enctype="multipart/form-data">
                        <?php $max_id = maxOfAll("id","announcement_tbl");
                        $max_id=$max_id+1;
                        $upload_id="ANN-".$max_id; ?>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
                                <div class="form-group row">
                                    <label  for="industry_name">Announcement Title </label>
                                    <input type="text" name="title" class="form-control" style="width: 90%;" required>
                                    <input type="hidden" name="autoid" value="<?php echo $upload_id ?>"> 
                                </div>
                            </div>
                        
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
                                <div class="form-group row">
                                    <label  for="industry_id"> Branch</label>
                                    <select name="branch" class="form-control branch" required>
                                        <option value="">Select Branch</option>
                                        <?php $sel_branch = mysqli_query($link,"select branch_id,branch_name from branch_tbl"); 
                                        while($fet_branch = mysqli_fetch_object($sel_branch)){
                                            ?><option <?php if($_GET['branch']==$fet_branch->branch_id){ echo 'selected'; } ?> value="<?php echo $fet_branch->branch_id; ?>"><?php echo $fet_branch->branch_name; ?></option><?php
                                        } ?>
                                    </select>
                                </div>
                            </div> 

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
                                <div class="form-group row">
                                    <label  for="industry_id"> Department</label>
                                    <select name="department" class="department form-control" style="width: 90%;" required>
                                        <option value="">Select Department</option>
                                        <?php $sel_dept = mysqli_query($link,"select department_id,department_name from department_tbl"); 
                                        while($fet_dept = mysqli_fetch_object($sel_dept)){
                                            ?><option value="<?php echo $fet_dept->department_id; ?>"><?php echo $fet_dept->department_name; ?></option><?php
                                        } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
                                <div class="form-group row">
                                    <label  for="industry_id">Employee</label>
                                    <select name="employee" class="employee form-control" required>
                                        <option value="">Select Employee</option>
                                       
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
                                <div class="form-group row">
                                    <label  for="industry_name">Announcement Start Date </label>
                                    <input type="date" name="start_date" class="form-control" style="width: 90%;" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
                                <div class="form-group row">
                                    <label  for="industry_name">Announcement End Date </label>
                                    <input type="date" name="end_date" class="form-control" required>
                                </div>
                            </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-pad">
                            <div class="form-group row">
                                <label for="industry_id">Announcement Description</label>
                                <textarea rows="6" name="description" placeholder="Enter Announcement Description" class="form-control"></textarea>
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
                        <h4 class="modal-title">Edit Announcement</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                    <form method="post" class="padding-10" enctype="multipart/form-data">
                       
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
                                <div class="form-group row">
                                    <label  for="industry_name">Announcement Title </label>
                                    <input type="text" id="title" name="title" class="form-control" style="width: 90%;" required>
                                    <input type="hidden" name="autoid" class="autoid">
                                </div>
                            </div>
                        
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
                                <div class="form-group row">
                                    <label  for="industry_id"> Branch</label>
                                    <select name="branch" id="branch" class="form-control branch" required>
                                        <option value="">Select Branch</option>
                                        <?php $sel_branch = mysqli_query($link,"select branch_id,branch_name from branch_tbl"); 
                                        while($fet_branch = mysqli_fetch_object($sel_branch)){
                                            ?><option <?php if($_GET['branch']==$fet_branch->branch_id){ echo 'selected'; } ?> value="<?php echo $fet_branch->branch_id; ?>"><?php echo $fet_branch->branch_name; ?></option><?php
                                        } ?>
                                    </select>
                                </div>
                            </div> 

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
                                <div class="form-group row">
                                    <label  for="industry_id"> Department</label>
                                    <select name="department" id="department" class="department form-control" style="width: 90%;" required>
                                        <option value="">Select Department</option>
                                        <?php $sel_dept = mysqli_query($link,"select department_id,department_name from department_tbl"); 
                                        while($fet_dept = mysqli_fetch_object($sel_dept)){
                                            ?><option value="<?php echo $fet_dept->department_id; ?>"><?php echo $fet_dept->department_name; ?></option><?php
                                        } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
                                <div class="form-group row">
                                    <label  for="industry_id">Employee</label>
                                    <select name="employee" id="employee" class="employee form-control" required>
                                        <option value="">Select Employee</option>
                                       
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
                                <div class="form-group row">
                                    <label  for="industry_name">Announcement Start Date </label>
                                    <input type="date" id="start_date" name="start_date" class="form-control" style="width: 90%;" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
                                <div class="form-group row">
                                    <label  for="industry_name">Announcement End Date </label>
                                    <input type="date" id="end_date" name="end_date" class="form-control" required>
                                </div>
                            </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-pad">
                            <div class="form-group row">
                                <label for="industry_id">Announcement Description</label>
                                <textarea rows="6" name="description" id="description" placeholder="Enter Announcement Description" class="form-control"></textarea>
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
                var url = 'ajax_request/get_announcement.php';
                $.ajax({
                    url : url,
                    type: "POST",
                    data: {id : id},
                    dataType: "JSON",
                    success: function(data)
                    {
                    //if success close modal and reload ajax table
                        $('.autoid').val(data.autoid);
                        $('#title').val(data.title);
                        $("#branch option[value='"+ data.branch +"']").attr("selected", "selected");
                        $("#department option[value='"+ data.department +"']").attr("selected", "selected");
                        $("#employee option[value='"+ data.employee +"']").attr("selected", "selected");
                        
                        $('#start_date').val(data.start_date);
                        
                        $('#end_date').val(data.end_date);
                        $('#description').val(data.description);
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                    alert('Error adding / update data');
                    }
                });
            });
            
            $(".branch").change(function(){
                var branch_id = $(this).val();
                $.post( "ajax_request/get_department.php", { branch_id: branch_id })
                .done(function( data ) {
                    $(".department").html(data);
                });
            });

            $(".branch").change(function(){
                var branch_id = $(this).val();
                $.post( "ajax_request/get_department.php", { branch_id: branch_id })
                .done(function( data ) {
                    $(".department").html(data);
                });
            });
            $(".department").change(function(){
                var dept_id = $(this).val();
                $.post( "ajax_request/get_employee.php", { dept_id: dept_id })
                .done(function( data ) {
                    $(".employee").html(data);
                });
            });
            
        });
        
    </script>
  
</html>