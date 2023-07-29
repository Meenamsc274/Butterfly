<?php
$sel_rw = mysqli_query($link,"select * from vendor_tbl where vendor_id='$vendor_id'");
$row_vendor = mysqli_fetch_object($sel_rw);
$vendor_id = $row_vendor->vendor_id;
$vendor_name = $row_vendor->first_name." ".$row_vendor->last_name;
$vendor_address = $row_vendor->address;
$vendor_country = $row_vendor->country;
$vendor_state = $row_vendor->state;
$vendor_district = $row_vendor->district;
$vendor_city = $row_vendor->city;
$vendor_area = $row_vendor->area;
$vendor_pincode = $row_vendor->pincode;
$vendor_gst_no = $row_vendor->gst_no;
$vendor_email_id = $row_vendor->email_id;
$vendor_mobile_number = $row_vendor->mobile_number;
?>