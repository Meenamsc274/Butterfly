<?php
echo "select * from company_tbl where company_id='$company_id'";
$sel_rw = mysqli_query($link,"select * from company_tbl where company_id='$company_id'");
$row_company = mysqli_fetch_object($sel_rw);
$company_id = $row_company->company_id;
$company_name = $row_company->company_name;
$industry = $row_company->industry;
$company_type = $row_company->company_type;
$company_address = $row_company->company_address;
$company_country = $row_company->company_country;
$company_state = $row_company->company_state;
$company_district = $row_company->company_district;
$company_city = $row_company->company_city;
$company_area = $row_company->company_area;
$company_pincode = $row_company->company_pincode;
$reg_type = $row_company->reg_type;
$reg_date = $row_company->reg_date;
$reg_no = $row_company->reg_no;
$pan_no = $row_company->pan_no;
$gst_no = $row_company->gst_no;
$company_email_id = $row_company->company_email_id;
$phone_number = $row_company->phone_number;
$company_url = $row_company->company_url;
$facebook_link = $row_company->facebook_link;
$twitter_link = $row_company->twitter_link;
$youtube_link = $row_company->youtube_link;
$account_name = $row_company->account_name;
$account_bank = $row_company->account_bank;
$account_branch = $row_company->account_branch;
$account_ifsc = $row_company->account_ifsc;
$account_number = $row_company->account_number;
$account_type = $row_company->account_type;
$account_swift = $row_company->account_swift;
$branches = $row_company->branches;
$warehouse = $row_company->warehouse;
$logo = $row_company->logo;
?>