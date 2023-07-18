<?php 
include('dbc.php');
$country = $_GET['country'];
$state = $_GET['state'];
$district = $_GET['district'];
$city = $_GET['city'];
$area = $_GET['area'];
$pincode = $_GET['pincode'];
?>
<option value=''>Please Select</option>
<?php
$query = mysqli_query($link,"SELECT * FROM pincode_tbl WHERE country_id='$country' and state_id='$state' and district_id='$district' and city_id='$city' and pincode_id='$area'");
while($row = mysqli_fetch_array($query)) {
if($row['pincode_id']=$pincode)
  {
  $selected = "selected="selected"";
  }
else
  {
	  $selected = "";
  }
echo "<option value='$row[pincode_id]' $selected>$row[pin_code]</option>";
}

?>