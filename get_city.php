<?php 
include('dbc.php');
$country = $_GET['country'];
$state = $_GET['state'];
$district = $_GET['district'];
$city = $_GET['city'];
?>
<option value=''>Please Select</option>
<?php
$query = mysqli_query($link,"SELECT * FROM city_tbl WHERE country_id='$country' and state_id='$state' and district_id='$district'");
while($row = mysqli_fetch_array($query)) {
if($row['city_name']=$city)
  {
  $selected = "selected="selected"";
  }
else
  {
	  $selected = "";
  }
echo "<option value='$row[city_id]' $selected>$row[city_name]</option>";
}

?>