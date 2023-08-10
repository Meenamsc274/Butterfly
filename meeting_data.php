<?php
include 'dbc.php'; 
$sqlEvents = "SELECT id, title, date FROM meeting_tbl";
$resultset = mysqli_query($link, $sqlEvents) or die("database error:". mysqli_error($link));
$calendar = array();
while( $rows = mysqli_fetch_assoc($resultset) ) {	
	// convert  date to milliseconds
  
	$start = strtotime($rows['date']) * 1000;
	$end = strtotime($rows['date']) * 1000;	
	$calendar[] = array(
        'id' =>$rows['id'],
        'title' => $rows['title']." ".date('M d, Y',strtotime($rows['date']))." ".date('h:i A',strtotime($rows['time'])),
        'url' => "#",
		"class" => 'event-important',
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