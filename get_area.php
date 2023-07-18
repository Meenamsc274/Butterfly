<?php 
include('dbc.php');
$country = $_GET['country'];
$state = $_GET['state'];
$district = $_GET['district'];
$city = $_GET['city'];
$area = $_GET['area'];
?>
<option value=''>Please Select</option>
<?php
$query = mysqli_query($link,"SELECT * FROM pincode_tbl WHERE country_id='$country' and state_id='$state' and district_id='$district' and city_id='$city'");
while($row = mysqli_fetch_array($query)) {
if($row['area_name']=$area)
  {
  $selected = "selected="selected"";
  }
else
  {
	  $selected = "";
  }
echo "<option value='$row[pincode_id]' $selected>$row[area_name]</option>";
}
?>