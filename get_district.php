<?php 
include('dbc.php');
$country = $_GET['country'];
$state = $_GET['state'];
$district = $_GET['district'];
?>
<option value=''>Please Select</option>
<?php 
$query = mysqli_query($link,"SELECT * FROM district_tbl WHERE country_id='$country' and state_id='$state'");
while($row = mysqli_fetch_array($query)) {
if($row['district_name']=$district)
  {
  $selected = "selected="selected"";
  }
else
  {
	  $selected = "";
  }
echo "<option value='$row[district_id]' $selected>$row[district_name]</option>";
}
?>