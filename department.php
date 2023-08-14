<?php 
include 'dbc.php'; 
page_protect();
$created_by = $_SESSION['userid'];
$approved_by = "";
$page = "department"; ?>
<?php 

if(isset($_POST['submit'])){
    if($_POST['submit']=='Create'){
        $autoid = mysqli_real_escape_string($link,$_POST['autoid']);
        $department_name = mysqli_real_escape_string($link,$_POST['department_name']);
        $branch = mysqli_real_escape_string($link,$_POST['branch']);
       
        if(mysqli_query($link,"INSERT INTO `department_tbl` ( `department_id`, `department_name`, `branch`, `date`, `created_by`, `approved_by`) VALUES ( '$autoid', '$department_name', '$branch', NOW(), '$created_by', '$approved_by')")){
            $msg[] = "Successfully Saved!";
        }
        else
        {
            $err[] = "Error in saving data!";
            
        }
    }

    if($_POST['submit']=='Update'){
        $autoid = mysqli_real_escape_string($link,$_POST['autoid']);
        $department_name = mysqli_real_escape_string($link,$_POST['department_name']);
        $branch = mysqli_real_escape_string($link,$_POST['branch']);

        if(mysqli_query($link,"update `department_tbl` set `department_name`='$department_name', `branch`='$branch',  `date`= NOW(), `created_by`='$created_by', `approved_by`='$approved_by' where department_id = '$autoid'")){
            $msg[] = "Successfully Updated!";
        }
        else
        {
            $err[] = "Error in saving data!";
            
        }
    }
}

if($_GET['del'] == "yes"){
	$autoid=$_GET['autoid'];
    if(mysqli_query($link,"delete from `department_tbl` where `department_id`='$autoid'")){
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
                                    <h3 class="box-heading">Manage Department 
                                    <div class="breadcrumb">
	              						<a href="index.php" class="breadcrumb_a">Home</a> 
                            			<i class="fa fa-angle-double-right angle_double_right"></i>
		              					<a href="#" class="breadcrumb_a"> Department </a> 
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
                            
                            <div class="row">
                                <div class="col-lg-3">
                                    <?php include "assets/common/side_menu.php"; ?>
                                </div>
                                <div class="col-lg-9">
                                    
                                    <div class="form_box_shadow p-4">
                                        <?php include "display_msg.php"; ?>
                                        <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>S.No</th>
                                                    <th>Branch </th>
                                                    <th>Department </th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i=1;
                                                $sel_rw = mysqli_query($link,"select * from department_tbl");
                                                while($row = mysqli_fetch_object($sel_rw)){ 
                                                    $branch = $row->branch;
                                                    list($branch_name) = mysqli_fetch_row(mysqli_query($link,"select branch_name from branch_tbl where branch_id='$branch'")); ?>

                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $branch_name; ?></td>
                                                    <td><?php echo $row->department_name; ?></td>
                                                    <td>
                                                    <button class="btn btn-sm btn-success edit" id="edit<?php echo $row->department_id ; ?>"  type="button" data-bs-toggle="modal" data-bs-target="#myModalEdit"><i class="fa fa-edit"></i></button>
                                                        <a class="btn btn-sm bg-danger text-white" href="department.php?autoid=<?php echo $row->department_id; ?>&del=yes" title="Delete Details"><i class="fa fa-trash"></i></a>
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
            	</div>
          	</div>

             <!-- Add Leave Modal -->
             <div class="modal" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Create New Department</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                    <form method="post" class="padding-10" enctype="multipart/form-data">
                        <?php   $max_id = maxOfAll("id","department_tbl");
                                $max_id=$max_id+1;
                                $upload_id="dep-".$max_id;
                         ?>
                        <div class="row">

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-pad">
                            <div class="form-group row">
                                <label  for="industry_id">Branch</label>
                                <select name="branch" style="width:90%" class="form-control" required>
                                    <option value="">Select Branch</option>
                                    <?php $sel_branch = mysqli_query($link,"select branch_id,branch_name from branch_tbl"); 
                                    while($fet_branch = mysqli_fetch_object($sel_branch)){
                                        ?><option value="<?php echo $fet_branch->branch_id; ?>"><?php echo $fet_branch->branch_name; ?></option><?php
                                    } ?>
                                </select>
                            </div>
                        </div>    
                   
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-pad">
                            <div class="form-group row">
                                
                                <label for="industry_id"> Name </label>
                                <input type="text" name="department_name"  class="form-control">
                                <input type="hidden" name="autoid" value="<?php echo $upload_id; ?>">
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
                <div class="modal-dialog">
                    <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Department</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                    <form method="post" class="padding-10" enctype="multipart/form-data">
                       
                        <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-pad">
                            <div class="form-group row">
                                <label  for="industry_id">Branch</label>
                                <select name="branch" id="branch" style="width:90%" class="form-control" required>
                                    <option value="">Select Branch</option>
                                    <?php $sel_branch = mysqli_query($link,"select branch_id,branch_name from branch_tbl"); 
                                    while($fet_branch = mysqli_fetch_object($sel_branch)){
                                        ?><option value="<?php echo $fet_branch->branch_id; ?>"><?php echo $fet_branch->branch_name; ?></option><?php
                                    } ?>
                                </select>
                            </div>
                        </div>  
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-pad">
                                <div class="form-group row">
                                    
                                    <label for="industry_name">Name </label>
                                    <input type="text" name="department_name" id="name" class="form-control" required />
                                            
                                    <input type="hidden" class="autoid" name="autoid" id="autoid">
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
                var url = 'ajax_request/get_department.php';
                $.ajax({
                    url : url,
                    type: "POST",
                    data: {id : id},
                    dataType: "JSON",
                    success: function(data)
                    {
                    //if success close modal and reload ajax table
                        $('.autoid').val(data.autoid);
                        $('#name').val(data.name);
                        $("#branch option[value='"+ data.branch +"']").attr("selected", "selected");
                    
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