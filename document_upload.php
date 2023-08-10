<?php 
include 'dbc.php'; 
page_protect();
$created_by = $_SESSION['userid'];
$approved_by = "";
$page = "meeting"; ?>
<?php 

if(isset($_POST['submit'])){
    if($_POST['submit']=='Create'){
        
        $autoid = mysqli_real_escape_string($link,$_POST['autoid']);
        $role = mysqli_real_escape_string($link,$_POST['role']);
        $name = mysqli_real_escape_string($link,$_POST['name']);  
        $description = mysqli_real_escape_string($link,$_POST['description']);

        $err=array();
        $file = $_FILES['file']['name'];
        if($file != "")
        {
            $extension=array("jpeg","jpg","png","gif","pdf");
            $ext=pathinfo($file,PATHINFO_EXTENSION);

            if(!in_array($ext,$extension)) {
                $err[] = "Invalid file type. Only jpg,png and pdf types are accepted.";
            }
        }
        
        if(count($err)==0){
            if(mysqli_query($link,"INSERT INTO `document_tbl` (`autoid`, `name`, `role`, `description`, `ip_address`, `browser`, `created_at`, `created_by`, `approved_by`) VALUES ( '$autoid', '$name', '$role', '$description', '$ip_address', '$browser', NOW(), '$created_by', '$approved_by')")){
                if($file != "")
                {
                    $secondname=rand(0,10000000000);
                    $uploaddir = "uploads/document/";
                    $upload_pic = $uploaddir.$secondname.$file;     
                    
                    move_uploaded_file($_FILES['file']['tmp_name'], $upload_pic);
                    mysqli_query($link,"UPDATE document_tbl SET `file` = '$upload_pic' WHERE autoid ='$autoid'");
                }   
                $msg[] = "Successfully Saved!";
                
             }else{
                $err[] = "Try again later";
               // $err[] = "";
            }
        }      
        
    }
    if($_POST['submit']=='Update'){
       
        $autoid = mysqli_real_escape_string($link,$_POST['autoid']);
        $role = mysqli_real_escape_string($link,$_POST['role']);
        $name = mysqli_real_escape_string($link,$_POST['name']);  
        $description = mysqli_real_escape_string($link,$_POST['description']);
        
        $err=array();
        $file = $_FILES['file']['name'];
        if($file != "")
        {
            $extension=array("jpeg","jpg","png","gif","pdf");
            $ext=pathinfo($file,PATHINFO_EXTENSION);

            if(!in_array($ext,$extension)) {
                $err[] = "Invalid file type. Only jpg,png and pdf types are accepted.";
            }
        }
        if(count($err)==0){
            if(mysqli_query($link,"UPDATE `document_tbl` SET `name`='$name', `role`='$role', `description`='$description',  `ip_address`='$ip_address', `browser`='$browser', `created_by` = '$created_by', `approved_by`='$approved_by' where autoid='$autoid'")){
                if($file != "")
                {
                    $secondname=rand(0,10000000000);
                    $uploaddir = "uploads/document/";
                    $upload_pic = $uploaddir.$secondname.$file;     
                    
                    move_uploaded_file($_FILES['file']['tmp_name'], $upload_pic);
                    mysqli_query($link,"UPDATE document_tbl SET `file` = '$upload_pic' WHERE autoid ='$autoid'");
                } 
                $msg[] = "Successfully Updated!";
            
            }else{
                $msg[] = "Error - Try Again!";
            }
        }
    }
}



if($_GET['del'] == "yes"){
	$autoid=$_GET['autoid'];
    if(mysqli_query($link,"delete from `document_tbl` where `autoid`='$autoid'")){
		header("location:document_upload.php");
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
                                    <h3 class="box-heading">Manage Document 
                                    <div class="breadcrumb">
	              						<a href="index.php" class="breadcrumb_a">Home</a> 
                            			<i class="fa fa-angle-double-right angle_double_right"></i>
		              					<a href="#" class="breadcrumb_a">Manage Document </a> 
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
					<th>Name</th>
					<th>Document</th>
					<th>Role</th>
					
					<th>Description</th>
					<th>Actions</th>
                </tr>
                </thead>
                <tbody>
       	<?php $i=1;
                
                $sel_rw = mysqli_query($link,"select * from document_tbl");
                
				while($row = mysqli_fetch_object($sel_rw)){  ?>  

                <tr>
				    <td><?php echo $i; ?></td>
					
					<td><?php echo $row->name; ?></td>
					<td>
                        <a href="<?php echo $row->file; ?>" class="btn bg-default btn-sm" download>
                            <i class="fa fa-download"></i>
                        </a>
                        <a href="<?php echo $row->file; ?>" class="btn btn-secondary btn-sm" target="_blank">
                            <i class="fa fa-eye"></i>
                        </a>
                    </td>
                    
                    <td><?php 
                        if($row->role == 0){ echo 'All'; }  
                        if($row->role == 5){ echo 'accountant'; }  
                        if($row->role == 6){ echo 'client'; }  
                        if($row->role == 7){ echo 'HR'; }  
                        if($row->role == 8){ echo 'Employee'; }  
                    ?></td>
                    <td><?php echo $row->description; ?></td>
                          
                    <td>
                        <button class="btn btn-sm btn-success edit" id="edit<?php echo $row->autoid; ?>"  type="button" data-bs-toggle="modal" data-bs-target="#myModalEdit"><i class="fa fa-edit"></i></button>

						<a class="btn btn-sm bg-danger text-white" href="document_upload.php?autoid=<?php echo $row->autoid; ?>&del=yes" title="Delete Details"><i class="fa fa-trash"></i></a>
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
                <div class="modal-dialog ">
                    <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Create New Document</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                    <form method="post" class="padding-10" enctype="multipart/form-data">
                        <?php $max_id = maxOfAll("id","document_tbl");
                        $max_id=$max_id+1;
                        $upload_id="DU-".$max_id; ?>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mt-1">
                                <div class="form-group row">
                                    <label  for="industry_id"> Name</label>
                                    <input type="text" style="width:90%" name="name" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
                                <div class="form-group row">
                                    <label  for="industry_id">Role</label>
                                    <select name="role" class="form-control" required>
                                        <option value="0">All</option>
                                        <option value="5">accountant</option>
                                        <option value="6">client</option>
                                        <option value="7">HR</option>
                                        <option value="8">Employee</option>
                                       
                                    </select>
                                    <input type="hidden" name="autoid" value="<?php echo $upload_id; ?>">
                                </div>
                            </div>
                            
                            <div class="col-lg-12 col-md-6 col-sm-12 col-xs-12 mt-1">
                                <div class="form-group row">
                                    <label  for="industry_id">Description</label>
                                    <textarea rows="5" name="description" class="form-control" ></textarea>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mt-1">
                                <div class="form-group row">
                                    <label  for="industry_id"> Document</label>
                                    <input type="file" style="width:90%" name="file" class="form-control" required>
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
                        <h4 class="modal-title">Edit Document</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                    <form method="post" class="padding-10" enctype="multipart/form-data">
                       
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mt-1">
                                <div class="form-group row">
                                    <label  for="industry_id"> Name</label>
                                    <input type="text" style="width:90%" name="name" id="name" class="form-control" required>
                                    <input type="hidden" name="autoid" class="autoid">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
                                <div class="form-group row">
                                    <label  for="industry_id">Role</label>
                                    <select id="role" name="role" class="form-control" required>
                                        <option value="0">All</option>
                                        <option value="5">accountant</option>
                                        <option value="6">client</option>
                                        <option value="7">HR</option>
                                        <option value="8">Employee</option>
                                       
                                    </select>
                                   
                                </div>
                            </div>
                            
                            <div class="col-lg-12 col-md-6 col-sm-12 col-xs-12 mt-1">
                                <div class="form-group row">
                                    <label  for="industry_id">Description</label>
                                    <textarea rows="5" name="description" id="description" class="form-control" ></textarea>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mt-1">
                                <div class="form-group row">
                                    <label  for="industry_id"> Document</label>
                                    <input type="file" style="width:90%" name="file" class="form-control" required>
                                    <img src="" id="file">
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
                var url = 'ajax_request/get_document.php'; 
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
                        $('#role').val(data.role);
                        $('#file').attr("src", data.file);
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