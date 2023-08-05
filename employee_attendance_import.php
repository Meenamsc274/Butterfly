<?php


require('assets/plugins/excelReader/excel_reader2.php');
require('assets/plugins/excelReader/SpreadsheetReader.php');
require('dbc.php');


if(isset($_POST['submit'])){


  $mimes = ['application/vnd.ms-excel','text/xls','text/xlsx','text/csv','application/vnd.oasis.opendocument.spreadsheet'];
  if(in_array($_FILES["file"]["type"],$mimes)){


    $uploadFilePath = 'assets/uploads/csv/'.basename($_FILES['file']['name']);
    move_uploaded_file($_FILES['file']['tmp_name'], $uploadFilePath);


    $Reader = new SpreadsheetReader($uploadFilePath);


    $totalSheet = count($Reader->sheets());


    //echo "You have total ".$totalSheet." sheets".


    $html="<table border='1'>";
    //$html.="<tr><th>Title</th><th>Description</th></tr>";
    $arr = array();

    /* For Loop for all sheets */
    for($i=0;$i<$totalSheet;$i++){


      $Reader->ChangeSheet($i);

      $k=0;
      foreach ($Reader as $Row)
      {
        $k++;
        if($k==1){
          continue;
        }
          
        $max_id = maxOfAll("id","attendance_tbl");
        $max_id=$max_id+1;
        $upload_id="ATT-".$max_id;

        
        $emp_email = isset($Row[0]) ? $Row[0] : '';
        $date = isset($Row[1]) ? $Row[1] : '';
        $in_time = isset($Row[2]) ? $Row[2] : '';
        $out_time = isset($Row[3]) ? $Row[3] : '';

        $date = date('Y-m-d',strtotime($date));

        list($emp_id,$branch,$department) = mysqli_fetch_row(mysqli_query($link,"select emp_id,branch,department  from employee where email='$emp_email'"));

        if(!empty($emp_id)){

          $sel = mysqli_query($link,"select id from attendance_tbl where date='$date' and e_id='$emp_id'");
          
          if(mysqli_num_rows($sel)==0){
            $insert = mysqli_query($link,"insert into attendance_tbl(`autoid`, `e_id`, `date`,`in_time`,`out_time`,`daystatus`, `ip_address`, `browser`, `created_at`, `created_by`, `approved_by`, `branch`, `department`)values('$upload_id','$emp_id','$date','$in_time','$out_time','Present', '$ip_address', '$browser', NOW(), '$created_by', '$approved_by', '$branch', '$department')");
          
          }else{
            $fet = mysqli_fetch_object($sel);
            $autoid = $fet->autoid;
            $insert = mysqli_query($link,"update attendance_tbl set date='$date' and in_time='$in_time' and out_time='$out_time' where autoid='$autoid'");
          }
  

          if($insert){
            echo "user_insert success";
            echo "<br>";
          }else{
            echo "user_insert failed";
            echo "<br>";
          }
          
        }

      }


    }
    if(count($arr)==0){
      header("location:employee_attendance.php");
    }else{
      echo "<br>";
      echo "<a href='employee_attendance.php'>Back</a>";
    }
    
    $html.="";
    echo $html;
    echo "<br />";


  }else { 
    die("<br/>Sorry, File type is not allowed. Only Excel file."); 
  }


}


?>