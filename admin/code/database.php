<?php

if (isset($_POST['gtmcode'])){

$gtm_code = sanitize_text_field($_POST['gtmcode']);
//var_dump($gtm_code);die();
global $wpdb;
$table_name = $wpdb->prefix . 'main_table';
$query = "UPDATE `$table_name` SET `option_value`='$gtm_code' WHERE `data_option` = 'gtm_code'";

if (strlen($gtm_code) > 0) {
  $query = "UPDATE `$table_name` SET `option_value`='$gtm_code' WHERE `data_option` = 'gtm_code'";
 run_query($query );
}
else{
  $query = "UPDATE `$table_name` SET `option_value`='not_provided' WHERE `data_option` = 'gtm_code'";
 run_query($query );
}

}
if (isset($_POST['gacode'])){

$ga_code = sanitize_text_field($_POST['gacode']);
//var_dump($gtm_code);die();
global $wpdb;
$table_name = $wpdb->prefix . 'main_table';
//$query = "UPDATE `$table_name` SET `option_value`='$ga_code' WHERE `data_option` = 'ga_code'";

if (strlen($ga_code) > 0) {
  $query = "UPDATE `$table_name` SET `option_value`='$ga_code' WHERE `data_option` = 'ga_code'";
 run_query($query );
}
else{
  $query = "UPDATE `$table_name` SET `option_value`='not_provided' WHERE `data_option` = 'ga_code'";
 run_query($query );
}

}






if (isset($_POST['sccode'])){

$sc_code = sanitize_text_field($_POST['sccode']);
//var_dump($gtm_code);die();
global $wpdb;
$table_name = $wpdb->prefix . 'main_table';
$query = "UPDATE `$table_name` SET `option_value`='$sc_code' WHERE `data_option` = 'sc_code'";

if (strlen($sc_code) > 0) {
  $query = "UPDATE `$table_name` SET `option_value`='$sc_code' WHERE `data_option` = 'sc_code'";
 run_query($query );
}
else{
  $query = "UPDATE `$table_name` SET `option_value`='not_provided' WHERE `data_option` = 'sc_code'";
 run_query($query );
}

}

if (isset($_POST['ctcode'])){

$ct_code = sanitize_text_field($_POST['ctcode']);
//var_dump($gtm_code);die();
global $wpdb;
$table_name = $wpdb->prefix . 'main_table';
$query = "UPDATE `$table_name` SET `option_value`='$ct_code' WHERE `data_option` = 'ct_code'";

if (strlen($ct_code) > 0) {
  $query = "UPDATE `$table_name` SET `option_value`='$ct_code' WHERE `data_option` = 'ct_code'";
 run_query($query );
}
else{
  $query = "UPDATE `$table_name` SET `option_value`='not_provided' WHERE `data_option` = 'ct_code'";
 run_query($query );
}

}

