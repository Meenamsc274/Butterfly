
   <!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Set Basic Salary</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
	   <form method="post" class="padding-10" enctype="multipart/form-data">
       <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_name">Payroll Type </label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
          <select name="payroll_type" id="payroll_type" class="form-control">
            <?php 
            $sel_rw1 = mysqli_query($link,"select * from payslip_type_tbl");
            while($row_payslip = mysqli_fetch_object($sel_rw1)){ ?>

            <option value="<?php echo $row_payslip->autoid ; ?>"><?php echo $row_payslip->name; ?></option>

            <?php } ?>
		    </select>
        </div>
      </div>
    </div>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-pad">
        <label class="margin-left-10" for="industry_id">Salary</label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-pad">
       <input type="hidden" class="form-control" name="emp_id" id="emp_id" value="<?php echo $emp_id; ?>" placeholder="Enter the Salary"  >
       <input type="hidden" class="form-control" name="emp_name" id="emp_name" value="<?php echo $employee_name; ?>" placeholder="Enter the Salary"  >
       <input type="number" class="form-control" name="salary" id="salary" value="<?php echo $row->salary_structure; ?>" placeholder="Enter the Salary"  >
        </div>
      </div>
    </div>
	 </div>

       <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      <input type="submit" name="submit" id="submit" class="btn btn-success" value="Save Changes" style="float:right">
      </form>
	 
	</div>

    </div>
  </div>
</div>  

<!-- Modal End-->
<!-- The Modal -->
<div class="modal" id="myModal1" >
  <div class="modal-dialog">
    <div class="modal-content" style="width:120%">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"><span class="modal_title">Create</span> Allowance</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
  <?php
$emp_id = $_GET['emp_id'];
  $update = mysqli_real_escape_string($link,$_GET['update']);
  if($update == "yes"){
  $sel_row=mysqli_query($link,"select * from allowance where `emp_id`='$emp_id'");
  $row5 = mysqli_fetch_object($sel_row);
  $upload_id = $row->autoid;
  }
 else
  { 
  $max_id = maxOfAll("id","allowance");
  $max_id=$max_id+1;
  $upload_id="ALL-".$max_id;
  }
 
  ?>
      <!-- Modal body -->
      <div class="modal-body">
	   <form method="post" class="padding-10" enctype="multipart/form-data">
	        <div class="row">
			 <input type="hidden" class="form-control" name="autoid" id="allowance_autoid" value="<?php echo $upload_id; ?>" readonly  >
       
       <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-pad">
      <div class="form-group row">
        <label class="" for="industry_name">Allowance Options </label>
         <select name="allowance_type" id="allowance_type" class="form-control" style="width:90%;">
         <?php 
            $sel_rw1 = mysqli_query($link,"select * from allowance_option_tbl");
            while($row_allowance = mysqli_fetch_object($sel_rw1)){ ?>

            <option value="<?php echo $row_allowance->autoid ; ?>"><?php echo $row_allowance->name; ?></option>

            <?php } ?>
		    </select>
      </div>
    </div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-pad">
      <div class="form-group row">
        <label class="" for="industry_id">Title</label>
         <input type="hidden" class="form-control" name="emp_id" id="emp_id" value="<?php echo $emp_id; ?>" placeholder="Enter the Salary"  >
       <input type="hidden" class="form-control" name="emp_name" id="emp_name" value="<?php echo $row->employee_name; ?>" placeholder="Enter the Salary"  >
       <input type="text" class="form-control" name="title" id="allowance_title" value="<?php echo $row5->title; ?>" placeholder="Enter the Title" style="width:90%;">
       
      </div>
    </div>
    </div> 
	<div class="row">
       <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-pad">
      <div class="form-group row">
        <label class="" for="industry_name">Type </label>
         <select name="type" id="allowance_type1" class="form-control" style="width:90%;">
		  <option value="Fixed">Fixed</option>
		  <option value="Percentage">Percentage</option>
		  </select>
      </div>
    </div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-pad">
      <div class="form-group row">
        <label class="" for="industry_id">Amount</label>
        <input type="number" class="form-control" name="amount" id="allowance_amount" value="<?php echo $row5->amount; ?>" placeholder="Enter the Amount" style="width:90%;">
       
      </div>
    </div>
    </div>
	
      
	  </div>

      <!-- Modal footer -->
      <div class="modal-footer">
	   <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
      
        <input type="submit" name="submit" id="allowance_submit" class="btn btn-success" value="Create" style="float:right">
      
       </form>
	  </div>

    </div>
  </div>
</div>
<!-- Modal End-->
<!-- The Modal -->
<div class="modal" id="myModal2" >
  <div class="modal-dialog">
    <div class="modal-content" style="width:120%">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"><span class="modal_title">Create</span> Commission</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
  <?php
$emp_id = $_GET['emp_id'];
  $update = mysqli_real_escape_string($link,$_GET['update']);
  if($update == "yes"){
  $sel_row1=mysqli_query($link,"select * from commission where `emp_id`='$emp_id'");
  $row6 = mysqli_fetch_object($sel_row1);
  $upload_id=$row6->autoid;
  }
 else
  { 
  $max_id = maxOfAll("id","commission");
  $max_id=$max_id+1;
  $upload_id="COM-".$max_id;
  }
 
  ?>
      <!-- Modal body -->
      <div class="modal-body">
	   <form method="post" class="padding-10" enctype="multipart/form-data">
	        <div class="row">
       
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <label class="" for="industry_id">Title</label>
         <input type="hidden" class="form-control" name="autoid" id="commission_autoid" value="<?php echo $upload_id; ?>" placeholder="Enter the Salary"  >
         <input type="hidden" class="form-control" name="emp_id" id="emp_id" value="<?php echo $emp_id; ?>" placeholder="Enter the Salary"  >
       <input type="hidden" class="form-control" name="emp_name" id="emp_name" value="<?php echo $row->employee_name; ?>" placeholder="Enter the Salary"  >
       <input type="text" class="form-control" name="title" id="commission_title" value="<?php echo $row6->title; ?>" placeholder="Enter the Title" style="width:90%;">
       
      </div>
    </div>
    </div> 
	<div class="row">
       <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-pad">
      <div class="form-group row">
        <label class="" for="industry_name">Type </label>
         <select name="type" id="commission_type" class="form-control" style="width:90%;">
		  <option value="Fixed">Fixed</option>
		  <option value="Percentage">Percentage</option>
		  </select>
      </div>
    </div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-pad">
      <div class="form-group row">
        <label class="" for="industry_id">Amount</label>
        <input type="number" class="form-control" name="amount" id="commission_amount" value="<?php echo $row6->amount; ?>" placeholder="Enter the Amount" style="width:90%;">
       
      </div>
    </div>
    </div>
	
      
	  </div>

      <!-- Modal footer -->
      <div class="modal-footer">
	   <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
      
        <input type="submit" name="submit2" id="commission_submit" class="btn btn-success" value="Create" style="float:right">
       
	  
       </form>
	  </div>

    </div>
  </div>
</div>
<!-- Modal End-->
<!-- The Modal -->
<div class="modal" id="myModal3" >
  <div class="modal-dialog">
    <div class="modal-content" style="width:120%">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"><span class="modal_title">Create</span> Loan</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
  <?php
$emp_id = $_GET['emp_id'];
  $update = mysqli_real_escape_string($link,$_GET['update']);
  if($update == "yes"){
  $loan=mysqli_query($link,"select * from loan where `emp_id`='$emp_id'");
  $loan_row = mysqli_fetch_object($loan);
  $upload_id = $loan_row->autoid;
  
  }
 else
  { 
  $max_id = maxOfAll("id","loan");
  $max_id=$max_id+1;
  $upload_id="LON-".$max_id;
  }
 
 
  ?>
      <!-- Modal body -->
      <div class="modal-body">
	   <form method="post" class="padding-10" enctype="multipart/form-data">
	        <div class="row">
       
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <label class="" for="industry_id">Title</label>
         <input type="hidden" class="form-control" name="autoid" id="loan_autoid" value="<?php echo $upload_id; ?>" placeholder="Enter the Salary"  >
         <input type="hidden" class="form-control" name="emp_id" id="emp_id" value="<?php echo $emp_id; ?>" placeholder="Enter the Salary"  >
       <input type="hidden" class="form-control" name="emp_name" id="emp_name" value="<?php echo $row->employee_name; ?>" placeholder="Enter the Salary"  >
       <input type="text" class="form-control" name="title" id="loan_title" value="<?php echo $loan_row->title; ?>" placeholder="Enter the Title" style="width:90%;">
       
      </div>
    </div>
    </div> 
	<div class="row">
       <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-pad">
      <div class="form-group row">
        <label  for="industry_name">Loan Options </label>
         <select name="loan_option" id="loan_option" class="form-control" style="width:90%;">
          <?php 
            $sel_rw1 = mysqli_query($link,"select * from loan_option_tbl");
            while($row_loan = mysqli_fetch_object($sel_rw1)){ ?>

            <option value="<?php echo $row_loan->autoid ; ?>"><?php echo $row_loan->name; ?></option>

          <?php } ?>
		  </select>
      </div>
    </div> 
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-pad">
      <div class="form-group row">
        <label  for="industry_name">Type </label>
         <select name="type" id="loan_type" class="form-control" style="width:90%;">
		  <option value="Fixed">Fixed</option>
		  <option value="Percentage">Percentage</option>
		  </select>
      </div>
    </div>
    </div>
	<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-pad">
      <div class="form-group row">
        <label for="industry_id">Amount</label>
        <input type="number" class="form-control" name="amount" id="loan_amount" value="<?php echo $loan_row->amount; ?>" placeholder="Enter the Amount" style="width:90%;">
       
      </div>
    </div>
    </div>
	<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <label  for="industry_id">Reason</label>
        <textarea class="form-control" name="reason" id="loan_reason"><?php echo $loan_row->reason;?></textarea>
       
      </div>
    </div>
    </div>
	
      
	  </div>

      <!-- Modal footer -->
      <div class="modal-footer">
	   <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
      
        <input type="submit" name="submit1" id="loan_submit" class="btn btn-success" value="Create" style="float:right">
      
	  
       </form>
	  </div>

    </div>
  </div>
</div>
<!-- Modal End-->
<!-- The Modal -->
<div class="modal" id="myModal4" >
  <div class="modal-dialog">
    <div class="modal-content" style="width:120%">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"><span class="modal_title">Create</span> Saturation Deduction</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
  <?php
$emp_id = $_GET['emp_id'];
  $update = mysqli_real_escape_string($link,$_GET['update']);
  if($update == "yes"){
  $deduction=mysqli_query($link,"select * from deduction where `emp_id`='$emp_id'");
  $deduction_row = mysqli_fetch_object($deduction);
  $upload_id = $deduction_row->autoid;
  
  }
 else
  { 
  $max_id = maxOfAll("id","deduction");
  $max_id=$max_id+1;
  $upload_id="DED-".$max_id;
  }
 
 
  ?>
      <!-- Modal body -->
      <div class="modal-body">
	   <form method="post" class="padding-10" enctype="multipart/form-data">
	        <div class="row">
       
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-pad">
      <div class="form-group row">
        <label class="" for="industry_id">Title</label>
         <input type="hidden" class="form-control" name="autoid" id="deduction_autoid" value="<?php echo $upload_id; ?>" placeholder="Enter the Salary"  >
         <input type="hidden" class="form-control" name="emp_id" id="emp_id" value="<?php echo $emp_id; ?>" placeholder="Enter the Salary"  >
       <input type="hidden" class="form-control" name="emp_name" id="emp_name" value="<?php echo $row->employee_name; ?>" placeholder="Enter the Salary"  >
       <input type="text" class="form-control" name="title" id="deduction_title" value="<?php echo $deduction_row->title; ?>" placeholder="Enter the Title" style="width:90%;">
       
      </div>
    </div>
	 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-pad">
      <div class="form-group row">
        <label class="" for="industry_name">Deduction Options </label>
         <select name="deduction_option" id="deduction_option" class="form-control" style="width:90%;">
         <?php 
            $sel_rw1 = mysqli_query($link,"select * from deduction_option_tbl");
            while($row_deduction = mysqli_fetch_object($sel_rw1)){ ?>

            <option value="<?php echo $row_deduction->autoid ; ?>"><?php echo $row_deduction->name; ?></option>

          <?php } ?>
		    </select>
      </div> 
    </div> 
    </div> 
	<div class="row">
       
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-pad">
      <div class="form-group row">
        <label class="" for="industry_name">Type </label>
         <select name="type" id="deduction_type" class="form-control" style="width:90%;">
		  <option value="Fixed">Fixed</option>
		  <option value="Percentage">Percentage</option>
		  </select>
      </div>
    </div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-pad">
      <div class="form-group row">
        <label class="" for="industry_id">Amount</label>
        <input type="number" class="form-control" name="amount" id="deduction_amount" value="<?php echo $deduction_row->amount; ?>" placeholder="Enter the Amount" style="width:90%;">
       
      </div>
    </div>
    </div>
	
      
	  </div>

      <!-- Modal footer -->
      <div class="modal-footer">
	   <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
      
        <input type="submit" name="deduct" id="deduction_submit" class="btn btn-success" value="Create" style="float:right">
      
       </form>
	  </div>

    </div>
  </div>
</div>
<!-- Modal End-->
<!-- The Modal -->
<div class="modal" id="myModal5" >
  <div class="modal-dialog">
    <div class="modal-content" style="width:120%">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"><span class="modal_title">Create</span> Other Payment</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
  <?php
$emp_id = $_GET['emp_id'];
  $update = mysqli_real_escape_string($link,$_GET['update']);
  if($update == "yes"){
  $other_payment=mysqli_query($link,"select * from other_payment where `emp_id`='$emp_id'");
  $other_row = mysqli_fetch_object($other_payment);
  $upload_id = $other_row->autoid;
  
  }
 else
  { 
  $max_id = maxOfAll("id","other_payment");
  $max_id=$max_id+1;
  $upload_id="OTH-".$max_id;
  }
 
 
  ?>
      <!-- Modal body -->
      <div class="modal-body">
	   <form method="post" class="padding-10" enctype="multipart/form-data">
	        <div class="row">
       
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-pad">
      <div class="form-group row">
        <label class="" for="industry_id">Title</label>
         <input type="hidden" class="form-control" name="autoid" id="other_payment_autoid" value="<?php echo $upload_id; ?>" placeholder="Enter the Salary"  >
         <input type="hidden" class="form-control" name="emp_id" id="emp_id" value="<?php echo $emp_id; ?>" placeholder="Enter the Salary"  >
       <input type="hidden" class="form-control" name="emp_name" id="emp_name" value="<?php echo $row->employee_name; ?>" placeholder="Enter the Salary"  >
       <input type="text" class="form-control" name="title" id="other_payment_title" value="<?php echo $other_row->title; ?>" placeholder="Enter the Title" style="width:90%;">
       
      </div>
    </div>
    </div> 
	<div class="row">
       
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-pad">
      <div class="form-group row">
        <label class="" for="industry_name">Type </label>
         <select name="type" id="other_payment_type" class="form-control" style="width:90%;">
		  <option value="Fixed">Fixed</option>
		  <option value="Percentage">Percentage</option>
		  </select>
      </div>
    </div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-pad">
      <div class="form-group row">
        <label class="" for="industry_id">Amount</label>
        <input type="number" class="form-control" name="amount" id="other_payment_amount" value="<?php echo $other_row->amount; ?>" placeholder="Enter the Amount" style="width:90%;">
       
      </div>
    </div>
    </div>
	
      
	  </div>

      <!-- Modal footer -->
      <div class="modal-footer">
	   <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
      
        <input type="submit" name="other" id="other_payment_submit" class="btn btn-success" value="Create" style="float:right">
     
	  
       </form>
	  </div>

    </div>
  </div>
</div>
<!-- Modal End-->
<!-- The Modal -->
<div class="modal" id="myModal7" >
  <div class="modal-dialog">
    <div class="modal-content" style="width:120%">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"><span class="modal_title">Create</span> Overtime</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
  <?php
$emp_id = $_GET['emp_id'];
  $update = mysqli_real_escape_string($link,$_GET['update']);
  if($update == "yes"){
  $overtime=mysqli_query($link,"select * from overtime where `emp_id`='$emp_id'");
  $overtime_row = mysqli_fetch_object($overtime);
  $upload_id = $overtime_row->autoid;
  
  }
 else
  { 
  $max_id = maxOfAll("id","overtime");
  $max_id=$max_id+1;
  $upload_id="OVR-".$max_id;
  }
 
 
  ?>
      <!-- Modal body -->
      <div class="modal-body">
	   <form method="post" class="padding-10" enctype="multipart/form-data">
	        <div class="row">
       
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-pad">
      <div class="form-group row">
        <label class="" for="industry_id">Overtime Title</label>
         <input type="hidden" class="form-control" name="autoid" id="overtime_autoid" value="<?php echo $upload_id; ?>" placeholder="Enter the Salary"  >
         <input type="hidden" class="form-control" name="emp_id" id="emp_id" value="<?php echo $emp_id; ?>" placeholder="Enter the Salary"  >
       <input type="hidden" class="form-control" name="emp_name" id="emp_name" value="<?php echo $row->employee_name; ?>" placeholder="Enter the Salary"  >
       <input type="text" class="form-control" name="title" id="overtime_title" value="<?php echo $overtime_row->title; ?>" placeholder="Enter the Title" style="width:90%;">
       
      </div>
    </div>
	
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-pad">
      <div class="form-group row">
        <label class="" for="industry_name">Number of Days </label>
          <input type="number" class="form-control" name="days" id="overtime_days" value="<?php echo $overtime_row->days; ?>" placeholder="Enter Days" style="width:90%;">
       
      </div>
    </div>
    </div> 
	<div class="row">
       
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-pad">
      <div class="form-group row">
        <label class="" for="industry_id">Hours</label>
        <input type="number" class="form-control" name="hours" id="overtime_hours" value="<?php echo $overtime_row->hours; ?>" placeholder="Enter the Hours" style="width:90%;">
       
      </div>
    </div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-pad">
      <div class="form-group row">
        <label class="" for="industry_id">Rate</label>
        <input type="number" class="form-control" name="rate" id="overtime_rate" value="<?php echo $overtime_row->rate; ?>" placeholder="Enter the Rate" style="width:90%;">
       
      </div>
    </div>
    </div>
	
      
	  </div>

      <!-- Modal footer -->
      <div class="modal-footer">
	   <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
    
        <input type="submit" name="over" id="overtime_submit" class="btn btn-success" value="Create" style="float:right">
      
	  
       </form>
	  </div>

    </div>
  </div>
</div>
<!-- Modal End-->