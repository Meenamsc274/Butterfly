<?php 
include 'dbc.php'; 
page_protect();
$created_by = $_SESSION['userid'];
$approved_by = "";
$page = "complain"; ?>
<?php 

if(isset($_POST['submit'])){
    if($_POST['submit']=='Create'){
        
        $autoid = mysqli_real_escape_string($link,$_POST['autoid']);
        $complaint_from = mysqli_real_escape_string($link,$_POST['complaint_from']);
        $complaint_against = mysqli_real_escape_string($link,$_POST['complaint_against']);
        $title =  mysqli_real_escape_string($link,$_POST['title']);
        $complaint_date = mysqli_real_escape_string($link,$_POST['complaint_date']);
        $description = mysqli_real_escape_string($link,$_POST['description']);
     
        
        if(mysqli_query($link,"INSERT INTO `complain_tbl` (`autoid`, `complaint_from`, `complaint_against`, `title`, `complaint_date`, `description`,  `ip_address`, `browser`, `created_at`, `created_by`, `approved_by`) VALUES ( '$autoid', '$complaint_from', '$complaint_against', '$title', '$complaint_date', '$description', '$ip_address', '$browser', NOW(), '$created_by', '$approved_by')")){
            $msg[] = "Successfully Saved!";
         }else{
            $err[] = "Try again later";
        }
        
    }
    if($_POST['submit']=='Update'){
        $autoid = mysqli_real_escape_string($link,$_POST['autoid']);
        $complaint_from = mysqli_real_escape_string($link,$_POST['complaint_from']);
        $complaint_against = mysqli_real_escape_string($link,$_POST['complaint_against']);
        $title =  mysqli_real_escape_string($link,$_POST['title']);
        $complaint_date = mysqli_real_escape_string($link,$_POST['complaint_date']);
        $description = mysqli_real_escape_string($link,$_POST['description']);

        if(mysqli_query($link,"UPDATE `complain_tbl` SET `complaint_from`='$complaint_from', `complaint_against`='$complaint_against', `title`='$title', `complaint_date`='$complaint_date', `description`='$description', `ip_address`='$ip_address', `browser`='$browser', `created_by` = '$created_by', `approved_by`='$approved_by' where autoid='$autoid'")){

            $msg[] = "Successfully Saved!";
        }
        
    }
}



if($_GET['del'] == "yes"){
	$autoid=$_GET['autoid'];
    if(mysqli_query($link,"delete from `complain_tbl` where `autoid`='$autoid'")){
		header("location:complain.php");
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
                                    <h3 class="box-heading">Manage Complain 
                                    <div class="breadcrumb">
	              						<a href="index.php" class="breadcrumb_a">Home</a> 
                            			<i class="fa fa-angle-double-right angle_double_right"></i>
		              					<a href="#" class="breadcrumb_a"> Complain </a> 
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
					<th>Complaint From</th>
					<th>Complaint Against</th>
					<th> Title</th>
					<th>Complaint Date</th>
					<th>Description</th>
					<th>Actions</th>
                </tr>
                </thead>
                <tbody>
       	<?php $i=1;
				$sel_rw = mysqli_query($link,"select * from complain_tbl");
                
				while($row = mysqli_fetch_object($sel_rw)){
                     $complaint_from = $row->complaint_from;
                     $complaint_against = $row->complaint_against;
                    
                    list($complaint_from1) = mysqli_fetch_row(mysqli_query($link,"select name from employee where emp_id = '$complaint_from'"));
                    list($complaint_against1) = mysqli_fetch_row(mysqli_query($link,"select name from employee where emp_id = '$complaint_against'"));
                    
                     ?>  

                <tr>
				    <td><?php echo $i; ?></td>
					<td><?php echo $complaint_from1; ?></td>
					<td><?php echo $complaint_against1; ?></td>
                    <td><?php echo $row->title; ?></td>
                    <td><?php echo date('M d, Y',strtotime($row->complaint_date)); ?></td>
                    <td><?php echo $row->description; ?></td>
					          
                    <td>
                        <button class="btn btn-sm btn-success edit" id="edit<?php echo $row->autoid; ?>"  type="button" data-bs-toggle="modal" data-bs-target="#myModalEdit"><i class="fa fa-edit"></i></button>

						<a class="btn btn-sm bg-danger text-white" href="complain.php?autoid=<?php echo $row->autoid; ?>&del=yes" title="Delete Details"><i class="fa fa-trash"></i></a>
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
                        <h4 class="modal-title">Create New Complain</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                    <form method="post" class="padding-10" enctype="multipart/form-data">
                        <?php $max_id = maxOfAll("id","complain_tbl");
                        $max_id=$max_id+1;
                        $upload_id="COM-".$max_id; ?>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
                                <div class="form-group row">
                                    <label  for="industry_name">Complaint From </label>
                                    <select name="complaint_from" class="form-control" style="width:90%" required>
                                        
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
                                    <label  for="industry_id"> Complaint Against</label>
                                    <select name="complaint_against"  class="form-control" required="required">
                                        <?php $sel_emp = mysqli_query($link,"select emp_id,name from employee"); 
                                        while($fet_emp = mysqli_fetch_object($sel_emp)){
                                            ?><option value="<?php echo $fet_emp->emp_id; ?>"><?php echo $fet_emp->name; ?></option><?php
                                        } ?>
                                    </select>
                                </div>
                            </div> 

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
                                <div class="form-group row">
                                    <label  for="industry_id"> Title</label>
                                    <input type="text" style="width:90%" name="title" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
                                <div class="form-group row">
                                    <label  for="industry_id">Complaint Date</label>
                                    <input type="date" name="complaint_date" class="form-control" style="width:90%" required>
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
                        <h4 class="modal-title">Edit Complain</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                    <form method="post" class="padding-10" enctype="multipart/form-data">
                       
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
                                <div class="form-group row">
                                    <label  for="industry_name">Complaint From </label>
                                    <select name="complaint_from" id="complaint_from" class="form-control" style="width:90%" required>
                                        
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
                                    <label  for="industry_id"> Complaint Against</label>
                                    <select name="complaint_against" id="complaint_against" class="form-control" required="required">
                                        <?php $sel_emp = mysqli_query($link,"select emp_id,name from employee"); 
                                        while($fet_emp = mysqli_fetch_object($sel_emp)){
                                            ?><option value="<?php echo $fet_emp->emp_id; ?>"><?php echo $fet_emp->name; ?></option><?php
                                        } ?>
                                    </select>
                                </div>
                            </div> 

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
                                <div class="form-group row">
                                    <label  for="industry_id"> Title</label>
                                    <input type="text" id="title" style="width:90%" name="title" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
                                <div class="form-group row">
                                    <label  for="industry_id">Complaint Date</label>
                                    <input type="date" id="complaint_date" name="complaint_date" class="form-control" style="width:90%" required>
                                </div>
                            </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-pad">
                            <div class="form-group row">
                                <label for="industry_id">Description</label>
                                <textarea rows="7" id="description" name="description" placeholder="Enter Description" class="form-control"></textarea>
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
                var url = 'ajax_request/get_complain.php';
                $.ajax({
                    url : url,
                    type: "POST",
                    data: {id : id},
                    dataType: "JSON",
                    success: function(data)
                    {
                    //if success close modal and reload ajax table
                        $('.autoid').val(data.autoid);
                        $("#complaint_from option[value='"+ data.complaint_from +"']").attr("selected", "selected");
                        $("#complaint_against option[value='"+ data.complaint_against +"']").attr("selected", "selected");
                        
                        $('#title').val(data.title);
                        $('#complaint_date').val(data.complaint_date);
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