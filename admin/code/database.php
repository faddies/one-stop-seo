<?php

if (isset($_POST['gtmcode'])){

$gtm_code = $_POST['gtmcode'];
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

$ga_code = $_POST['gacode'];
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

$sc_code = $_POST['sccode'];
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



if (isset($_POST['customforhead'])){

$customforhead = addslashes(htmlentities($_POST['customforhead']));
global $wpdb;
$table_name = $wpdb->prefix . 'main_table';
$query = "UPDATE `$table_name` SET `option_value`='$customforhead' WHERE `data_option` = 'custom_head'";

if (strlen($customforhead) > 0) {
  $query = "UPDATE `$table_name` SET `option_value`='$customforhead' WHERE `data_option` = 'custom_head'";
 run_query($query );
}
else{
  $query = "UPDATE `$table_name` SET `option_value`='not_provided' WHERE `data_option` = 'custom_head'";
 run_query($query );
}


}




if (isset($_POST['customforbody'])){

$customforbody = htmlentities($_POST['customforbody']);
//var_dump($gtm_code);die();
global $wpdb;
$table_name = $wpdb->prefix . 'main_table';
$query = "UPDATE `$table_name` SET `option_value`='$customforbody' WHERE `data_option` = 'custom_body'";

if (strlen($customforbody) > 0) {
  $query = "UPDATE `$table_name` SET `option_value`='$customforbody' WHERE `data_option` = 'custom_body'";
 run_query($query );
}
else{
  $query = "UPDATE `$table_name` SET `option_value`='not_provided' WHERE `data_option` = 'custom_body'";
 run_query($query );
}


}

if (isset($_POST['ctcode'])){

$ct_code = $_POST['ctcode'];
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

