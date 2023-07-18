<?php 
include('dbc.php');
$country = $_GET['country'];
$state = $_GET['state'];
?>
<option value=''>Please Select</option>
<?php 
$query = mysqli_query($link,"SELECT * FROM state_tbl WHERE country_id='$country'");
while($row = mysqli_fetch_array($query)) {
if($row['state_name']=$state)
  {
  $selected = "selected="selected"";
  }
else
  {
	  $selected = "";
  }
echo "<option value='$row[state_id]' $selected>$row[state_name]</option>";
}
?>