<?php
include 'dbc.php'; 
$sqlEvents = "SELECT id, title, start_date, end_date,color FROM event_tbl";
$resultset = mysqli_query($link, $sqlEvents) or die("database error:". mysqli_error($link));
$calendar = array();
while( $rows = mysqli_fetch_assoc($resultset) ) {	
	// convert  date to milliseconds
  
	$start = strtotime($rows['start_date']) * 1000;
	$end = strtotime($rows['end_date']) * 1000;	
	$calendar[] = array(
        'id' =>$rows['id'],
        'title' => $rows['title'],
        'url' => "#",
		"class" => $rows['color'],
        'start' => "$start",
        'end' => "$end"
    );
}
$calendarData = array(
	"success" => 1,	
    "result"=>$calendar);
echo json_encode($calendarData);
exit;
?>