<?php 
include 'dbc.php'; 
page_protect();
$created_by = $_SESSION['userid'];
$approved_by = "";
$page = "assets"; ?>
<?php 

if(isset($_POST['submit'])){
    if($_POST['submit']=='Create'){
        
        $autoid = mysqli_real_escape_string($link,$_POST['autoid']);
        $employee = mysqli_real_escape_string($link,$_POST['employee']);
        $name = mysqli_real_escape_string($link,$_POST['name']);
        $amount = mysqli_real_escape_string($link,$_POST['amount']);
        $supported_date = mysqli_real_escape_string($link,$_POST['supported_date']);
        $purchase_date = mysqli_real_escape_string($link,$_POST['purchase_date']);
        $description = mysqli_real_escape_string($link,$_POST['description']);
        
        
        if(mysqli_query($link,"INSERT INTO `emp_asset_tbl` (`autoid`, `employee`, `name`, `amount`, `supported_date`, `purchase_date`, `description`, `ip_address`, `browser`, `created_at`, `created_by`, `approved_by`) VALUES ( '$autoid', '$employee', '$name', '$amount', '$supported_date', '$purchase_date', '$description', '$ip_address', '$browser', NOW(), '$created_by', '$approved_by')")){
            $msg[] = "Successfully Saved!";
            
         }else{
            $err[] = "Try again later";
            $err[] = "INSERT INTO `emp_asset_tbl` (`autoid`, `employee`, `name`, `amount`, `supported_date`, `purchase_date`, `description`, `ip_address`, `browser`, `created_at`, `created_by`, `approved_by`) VALUES ( '$autoid', '$employee', '$name', '$amount', '$supported_date', '$purchase_date', '$description', '$ip_address', '$browser', NOW(), '$created_by', '$approved_by')";

        }
        
    }
    if($_POST['submit']=='Update'){
       
        $autoid = mysqli_real_escape_string($link,$_POST['autoid']);
        $employee = mysqli_real_escape_string($link,$_POST['employee']);
        $name = mysqli_real_escape_string($link,$_POST['name']);
        $amount = mysqli_real_escape_string($link,$_POST['amount']);
        $supported_date = mysqli_real_escape_string($link,$_POST['supported_date']);
        $purchase_date = mysqli_real_escape_string($link,$_POST['purchase_date']);
        $description = mysqli_real_escape_string($link,$_POST['description']);

        if(mysqli_query($link,"UPDATE `emp_asset_tbl` SET `employee`='$employee', `name`='$name', `amount`='$amount', `supported_date`='$supported_date', `purchase_date`='$purchase_date', `description`='$description',  `ip_address`='$ip_address', `browser`='$browser', `created_by` = '$created_by', `approved_by`='$approved_by' where autoid='$autoid'")){

            $msg[] = "Successfully Updated!";
          
        }else{
            $msg[] = "Error - Try Again!";
        }
    }
}



if($_GET['del'] == "yes"){
	$autoid=$_GET['autoid'];
    if(mysqli_query($link,"delete from `emp_asset_tbl` where `autoid`='$autoid'")){
		header("location:emp_asset.php");
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
                                    <h3 class="box-heading">Manage Assets 
                                    <div class="breadcrumb">
	              						<a href="index.php" class="breadcrumb_a">Home</a> 
                            			<i class="fa fa-angle-double-right angle_double_right"></i>
		              					<a href="#" class="breadcrumb_a"> Assets </a> 
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
					<th>Users</th>
					<th>Purchase Date</th>
					<th>Supported Date</th>
					<th>Amount</th>
					<th>Description</th>
					<th>Actions</th>
                </tr>
                </thead>
                <tbody>
       	<?php $i=1;
                
                $sel_rw = mysqli_query($link,"select * from emp_asset_tbl");
                
				while($row = mysqli_fetch_object($sel_rw)){  ?>  

                <tr>
				    <td><?php echo $i; ?></td>
					
					<td><?php echo $row->name; ?></td>
					<td> </td>
                    <td><?php echo date('M d, Y',strtotime($row->purchase_date)); ?></td>
                    <td><?php echo date('M d, Y',strtotime($row->supported_date)); ?></td>
                    <td><?php echo $row->amount; ?></td>
                    <td><?php echo $row->description; ?></td>
                          
                    <td>
                        <button class="btn btn-sm btn-success edit" id="edit<?php echo $row->autoid; ?>"  type="button" data-bs-toggle="modal" data-bs-target="#myModalEdit"><i class="fa fa-edit"></i></button>

						<a class="btn btn-sm bg-danger text-white" href="emp_asset.php?autoid=<?php echo $row->autoid; ?>&del=yes" title="Delete Details"><i class="fa fa-trash"></i></a>
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
                        <h4 class="modal-title">Create New Assets</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                    <form method="post" class="padding-10" enctype="multipart/form-data">
                        <?php $max_id = maxOfAll("id","emp_asset_tbl");
                        $max_id=$max_id+1;
                        $upload_id="EA-".$max_id; ?>
                        <div class="row">
                        
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-pad">
                                <div class="form-group row">
                                    <label  for="industry_id">Employee</label>
                                    <select name="employee" class="employee form-control" required>
                                        <option value="">Select Employee</option>
                                        <?php $select = mysqli_query($link,"select * from employee");
                                        while($fetch = mysqli_fetch_object($select)){ ?>
                                            <option value="<?php echo $fetch->emp_id; ?>"><?php echo $fetch->name; ?></option>
                                        <?php } ?>
                                    </select>
                                    <input type="hidden" name="autoid" value="<?php echo $upload_id; ?>">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mt-1">
                                <div class="form-group row">
                                    <label  for="industry_id"> Name</label>
                                    <input type="text" style="width:90%" name="name" class="form-control" required>
                                </div>
                            </div>
                        
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
                                <div class="form-group row">
                                    <label  for="industry_id"> Amount</label>
                                    <input type="number" name="amount" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mt-1">
                                <div class="form-group row">
                                    <label  for="industry_id"> Purchase Date</label>
                                    <input type="date" name="purchase_date" style="width:90%" class="form-control" required>
                                </div>
                            </div>
                        
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
                                <div class="form-group row">
                                    <label  for="industry_id"> Supported Date</label>
                                    <input type="date" style="width:90%" name="supported_date" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-6 col-sm-12 col-xs-12 mt-1">
                                <div class="form-group row">
                                    <label  for="industry_id">Description</label>
                                    <textarea rows="5" name="description" class="form-control" ></textarea>
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
                        <h4 class="modal-title">Edit Assets</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                    <form method="post" class="padding-10" enctype="multipart/form-data">
                       
                        <div class="row">
                        
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-pad">
                            <div class="form-group row">
                                <label  for="industry_id">Employee</label>
                                <select name="employee" id="employee" class="employee form-control" required>
                                    <option value="">Select Employee</option>
                                    <?php $select = mysqli_query($link,"select * from employee");
                                    while($fetch = mysqli_fetch_object($select)){ ?>
                                        <option value="<?php echo $fetch->emp_id; ?>"><?php echo $fetch->name; ?></option>
                                    <?php } ?>
                                </select>
                                <input type="hidden" name="autoid" id="autoid">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mt-1">
                            <div class="form-group row">
                                <label  for="industry_id"> Name</label>
                                <input type="text" style="width:90%" id="name" name="name" class="form-control" required>
                            </div>
                        </div>
                    
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
                            <div class="form-group row">
                                <label  for="industry_id"> Amount</label>
                                <input type="number" id="amount" name="amount" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mt-1">
                            <div class="form-group row">
                                <label  for="industry_id"> Purchase Date</label>
                                <input type="date" id="purchase_date" name="purchase_date" style="width:90%" class="form-control" required>
                            </div>
                        </div>
                    
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-pad">
                            <div class="form-group row">
                                <label  for="industry_id"> Supported Date</label>
                                <input type="date" id="supported_date" style="width:90%" name="supported_date" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-6 col-sm-12 col-xs-12 mt-1">
                            <div class="form-group row">
                                <label  for="industry_id">Description</label>
                                <textarea rows="5" id="description" name="description" class="form-control" ></textarea>
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
                var url = 'ajax_request/get_emp_asset.php'; 
                $.ajax({
                    url : url,
                    type: "POST",
                    data: {id : id},
                    dataType: "JSON",
                    success: function(data)
                    {
                    //if success close modal and reload ajax table
                        $('.autoid').val(data.autoid);
                        $('#employee').val(data.employee);
                        $('#name').val(data.name);
                        $('#amount').val(data.amount);
                        $('#purchase_date').val(data.purchase_date);
                        $('#supported_date').val(data.supported_date);
                        
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