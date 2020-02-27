<?php
/**
 * Plugin Name: One Stop SEO
 * Plugin URI: 
 * Description: The is going to be the one and only one stop seo plugin Soon.
 * Version: 1.0
 * Author: Fahad Bin Zafar
 * Author URI: https://www.linkedin.com/in/fahadbinzafar/
 */


global $wpdb;
global $all_data;

function get_data(){
global $wpdb;
global $all_data;
$table_name = $wpdb->prefix . 'main_table';
$query = "SELECT * FROM `$table_name`";
$all_data = $wpdb->get_results($query);
}
get_data();
//$test = get_data();
//var_dump($all_data);die();
/* -==========- Hooks -==========- */


// Create Data Base on Plugin activation
register_activation_hook( __FILE__, 'one_stop_seo_create_table' );

// Add Plugin Link in Setting Menu
add_action('admin_menu', 'plugin_options');
add_action('wp_head', 'add_code_to_head');
add_action('wp_footer', 'add_code_to_footer');

//do_action( 'user_admin_menu', 'plugin_options');
//add_action( 'admin_init', 'one_stop_seo_register_settings' );

/* -==========- Hooks End -==========- */

/* -==========- Short Code Register -==========- */

add_shortcode('readmore', 'read_more_shortcode');

/* -==========- Short Code Register End -==========- */



/* -==========- Version Check -==========- */

require 'plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
  'https://github.com/faddies/one-stop-seo',
  __FILE__,
  'one-stop-seo'
);

/* -==========- Version Check End -==========- */

/* -==========- Required Table Creation  -==========- */

// Create Main Table
function one_stop_seo_create_table(){
  global $wpdb;
  $table_name = $wpdb->prefix . 'main_table';
  $charset_collate = $wpdb->get_charset_collate();
  $table_creation = "CREATE TABLE ". $table_name . " ( 
                    id INT(9) NOT NULL AUTO_INCREMENT , 
                    option VARCHAR(50) NOT NULL , 
                    option_value TEXT NULL DEFAULT 'not_provided', 
                    PRIMARY KEY(`id`),UNIQUE `option` (`option`)
                    )" . $charset_collate . ";";
  run_query($table_creation);

// Add Required Rows
  $add_data = "INSERT INTO `wp_main_table`( `option`) 
                VALUES 
              ('ga_code'), 
              ('gtm_code'),
              ('sc_code'),
              ('custom_head'),
              ('custom_body')";
  run_query($add_data);

}



/* -==========- Required Table Creation End -==========- */






/* -==========- Plugin Registration  -==========- */

// Plugin Page Settings 

// Plugin Page Option 
function plugin_options() {
    add_options_page(
                      'One Stop SEO Options',
                      'One Stop SEO', 
                      'manage_options', 
                      'one-stop-seo', 
                      'setting_page',
                      'dashicons-admin-plugins'
                    );
    
    /*
    add_management_page();
    add_options_page();
    add_theme_page();
    add_plugins_page();
    add_users_page();
    add_dashboard_page();
    add_posts_page();
    add_media_page();
    add_links_page();
    add_pages_page();
    add_comments_page();
    add_themes_utility_last();
    add_post_type_submenus()
    */
}



function one_stop_seo_register_settings() {
   add_option( 'enter_ga_code', 'Enter GA Code Here');
   add_option( 'enter_ga_value', 'Enter GTM Code Here');

   register_setting( 
                      'one_stop_seo_options_group', 
                      'enter_ga_code', 'enter_ga_value',
                      'myplugin_callback' 
                    );
}



/* -==========- Plugin Registration End -==========- */


/* -==========- Plugin GUI Call  -==========- */

// Main Page 
function setting_page()
{

include('plugin_gui.php');

}

/* -==========- Plugin GUI Call End -==========- */








/* -==========- Plugin Helping Functions  -==========- */

// Create Database Table
function run_query($data) {
  $sql = $data;
  require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
  dbDelta( $sql );
}


// Fetch Value Specific
function fetch_data($column_filter,$value,$column_show,$table_name) {
global $wpdb;
$table_name = $wpdb->prefix . $table_name;
$query = "SELECT $column_show FROM `$table_name` WHERE `$column_filter` = '$value'";
$retrieve_data = $wpdb->get_results($query);
$value = $retrieve_data[0]->$column_show;
return $value;

}

// Return Value if not "Not Provided"
function check_value($a,$b,$c,$d){
  $result = fetch_data($a,$b,$c,$d);
  if($result=="not_provided"){
    return NULL;
  }
  else{
    return $result;
  }
}

/* -==========- Plugin Helping Functions End -==========- */






/* -==========- Updating Data Base -==========- */

if (isset($_POST['gtmcode'])){

$gtm_code = $_POST['gtmcode'];
//var_dump($gtm_code);die();
global $wpdb;
$table_name = $wpdb->prefix . 'main_table';
$query = "UPDATE `$table_name` SET `option_value`='$gtm_code' WHERE `option` = 'gtm_code'";

if (strlen($gtm_code) > 0) {
  $query = "UPDATE `$table_name` SET `option_value`='$gtm_code' WHERE `option` = 'gtm_code'";
 run_query($query );
}
else{
  $query = "UPDATE `$table_name` SET `option_value`='not_provided' WHERE `option` = 'gtm_code'";
 run_query($query );
}

}
if (isset($_POST['gacode'])){

$ga_code = $_POST['gacode'];
//var_dump($gtm_code);die();
global $wpdb;
$table_name = $wpdb->prefix . 'main_table';
$query = "UPDATE `$table_name` SET `option_value`='$ga_code' WHERE `option` = 'ga_code'";

if (strlen($ga_code) > 0) {
  $query = "UPDATE `$table_name` SET `option_value`='$ga_code' WHERE `option` = 'ga_code'";
 run_query($query );
}
else{
  $query = "UPDATE `$table_name` SET `option_value`='not_provided' WHERE `option` = 'ga_code'";
 run_query($query );
}

}






if (isset($_POST['sccode'])){

$sc_code = $_POST['sccode'];
//var_dump($gtm_code);die();
global $wpdb;
$table_name = $wpdb->prefix . 'main_table';
$query = "UPDATE `$table_name` SET `option_value`='$sc_code' WHERE `option` = 'sc_code'";

if (strlen($sc_code) > 0) {
  $query = "UPDATE `$table_name` SET `option_value`='$sc_code' WHERE `option` = 'sc_code'";
 run_query($query );
}
else{
  $query = "UPDATE `$table_name` SET `option_value`='not_provided' WHERE `option` = 'sc_code'";
 run_query($query );
}

}



if (isset($_POST['customforhead'])){

$customforhead = addslashes(htmlentities($_POST['customforhead']));
var_dump($customforhead);die();
global $wpdb;
$table_name = $wpdb->prefix . 'main_table';
$query = "UPDATE `$table_name` SET `option_value`='$customforhead' WHERE `option` = 'custom_head'";

if (strlen($customforhead) > 0) {
  $query = "UPDATE `$table_name` SET `option_value`='$customforhead' WHERE `option` = 'custom_head'";
 run_query($query );
}
else{
  $query = "UPDATE `$table_name` SET `option_value`='not_provided' WHERE `option` = 'custom_head'";
 run_query($query );
}


}




if (isset($_POST['customforbody'])){

$customforbody = htmlentities($_POST['customforbody']);
//var_dump($gtm_code);die();
global $wpdb;
$table_name = $wpdb->prefix . 'main_table';
$query = "UPDATE `$table_name` SET `option_value`='$customforbody' WHERE `option` = 'custom_body'";

if (strlen($customforbody) > 0) {
  $query = "UPDATE `$table_name` SET `option_value`='$customforbody' WHERE `option` = 'custom_body'";
 run_query($query );
}
else{
  $query = "UPDATE `$table_name` SET `option_value`='not_provided' WHERE `option` = 'custom_body'";
 run_query($query );
}


}




/* -==========- Updating Data Base End-==========- */


/* -==========- Updating GUI/Source Code -==========- */
function add_code_to_head(){
  global $all_data;
  if($all_data[0]->option_value != 'not_provided'){
?>
<!-- Google Analytics  - One Stop SEO-->
<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $all_data[0]->option_value ?>"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', '<?php echo $all_data[0]->option_value ?>');
</script>
<!-- End Google Analytics -->
<?php
}
if($all_data[1]->option_value != 'not_provided'){
?>

<!-- Google Tag Manager - One Stop SEO-->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','<?php echo $all_data[1]->option_value ?>');</script>
<!-- End Google Tag Manager -->

<?php
}
if ($all_data[3]->option_value != 'not_provided') {
echo $all_data[3]->option_value;
}


if($all_data[2]->option_value != 'not_provided'){
?>
<!-- Google Search Console  - One Stop SEO-->
<meta name="google-site-verification" content="<?php echo $all_data[2]->option_value ?>" />
<!-- End Google Search Console -->

<?php
}
?>

<style>
#contenttohide {display: none;}
</style>
<script>
function readmore_less() {
  var dots = document.getElementById("points");
  var moreText = document.getElementById("contenttohide");
  var btnText = document.getElementById("readmorebutton");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "Read more"; 
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "Read less"; 
    moreText.style.display = "inline";
  }
}
</script>
<?php
};


function add_code_to_footer(){
   global $all_data;
   if ($all_data[1]->option_value != 'not_provided') {

 
?>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo $all_data[1]->option_value ?>"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<?php
  }
  if ($all_data[4]->option_value != 'not_provided') {
  echo $all_data[4]->option_value;
  }
};


/* -==========- Updating GUI/Source Code End -==========- */



/* -==========- ShortCode -==========- */

function read_more_shortcode($atts = [], $content = null)
{
    // do something to $content
    $content = "<span id='points' class='pointscss'>...</span><span id='contenttohide' class='hiddentcontentcss'>" . $content . "</span><button class='buttoncss' onclick='readmore_less()' id='readmorebutton'>Read more</button>";
    return $content;
}


/* -==========- ShortCode End-==========- */





/* Add Some Text After Content 


add_action( 'the_content', 'add_own_content' );

function add_own_content ( $content ) {
    return $content .= '<p>This is Content</p>';
}


*/



/* Add Any code in Wp Head 

add_action('wp_head', 'add_code_to_head');
function add_code_to_head(){
?>
Head Put Code Here (it could be PHP code or plain text)
<?php
};

*/

/* Add Code After <body> tag latest wp version

add_action('wp_body', 'add_code_to_after_body_tag');
function add_code_to_after_body_tag(){
?>
<a href="#">aaa</a>
<?php  }
};

*/

/* Add Any code in Footer 

add_action('wp_footer', 'add_code_to_footer');
function add_code_to_footer(){
?>
footerPut Code Here (it could be PHP code or plain text)
<?php
};

*/


/* Add Code On Home Page Only

add_action('wp_head', 'add_code_to_head_specific_page');
function add_code_to_head_specific_page(){
if(is_front_page()) {  ?>
Put Code Here (it could be PHP code or plain text)
<?php  }
};

*/


/* Add Any code in Header Specific Page or post by id 

add_action('wp_head', 'your_function_name');
function your_function_name(){
if(is_single(73790)) {  ?>
Put Code Here (it could be PHP code or plain text)
<?php  }
};

*/