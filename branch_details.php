<?php
$sel_rw = mysqli_query($link,"select * from branch_tbl where branch_id='$branch_id'");
$row_branch = mysqli_fetch_object($sel_rw);
$branch_id = $row_branch->branch_id;
$branch_name = $row_branch->branch_name;
$branch_type = $row_branch->branch_type;
$branch_address = $row_branch->branch_address;
$branch_country = $row_branch->branch_country;
$branch_state = $row_branch->branch_state;
$branch_district = $row_branch->branch_district;
$branch_city = $row_branch->branch_city;
$branch_area = $row_branch->branch_area;
$branch_pincode = $row_branch->branch_pincode;
$branch_reg_type = $row_branch->reg_type;
$branch_reg_date = $row_branch->reg_date;
$branch_reg_no = $row_branch->reg_no;
$branch_pan_no = $row_branch->pan_no;
$branch_gst_no = $row_branch->gst_no;
$branch_email_id = $row_branch->branch_email_id;
$branch_phone_number = $row_branch->phone_number;
$branch_url = $row_branch->branch_url;
$branch_facebook_link = $row_branch->facebook_link;
$branch_twitter_link = $row_branch->twitter_link;
$branch_youtube_link = $row_branch->youtube_link;
$branch_account_name = $row_branch->account_name;
$branch_account_bank = $row_branch->account_bank;
$branch_account_branch = $row_branch->account_branch;
$branch_account_ifsc = $row_branch->account_ifsc;
$branch_account_number = $row_branch->account_number;
$branch_account_type = $row_branch->account_type;
$branch_account_swift = $row_branch->account_swift;
?>