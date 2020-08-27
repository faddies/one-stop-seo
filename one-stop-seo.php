<?php
/**
 * Plugin Name: One Stop SEO
 * Plugin URI: 
 * Description: The is going to be the one and only one stop seo plugin Soon.
 * Version: 1.2.4
 * Author: Fahad Bin Zafar
 * Author URI: https://www.linkedin.com/in/fahadbinzafar/
 */

/* -==========- Constants  -==========- */
define("PLUGIN_DIR_PATH", plugin_dir_path(__FILE__));
define('PLUGIN_URL', plugins_url());
define('SITE_URL', get_site_url());
define('ROOTWPPATH', dirname(__FILE__) . '/');

global $wpdb;
global $all_data;

include('admin/code/plugin_functions.php');
include('admin/code/hooks.php');


/* -==========- Plugin GUI Call  -==========- */

// Main Page 
function setting_page()
{

include('plugin_gui.php');

}

// Tools Page
function tools_page()
{

include('admin/gui/tools.php');

}
/* -==========- Plugin GUI Call End -==========- */
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

/* -==========- Plugin Helping Functions  -==========- */


/* -==========- Plugin Helping Functions End -==========- */


/* -==========- Updating Data Base -==========- */


include('admin/code/database.php');


/* -==========- Updating Data Base End-==========- */


include('admin/code/front_gui_update.php');
