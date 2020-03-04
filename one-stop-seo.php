<?php
/**
 * Plugin Name: One Stop SEO
 * Plugin URI: 
 * Description: The is going to be the one and only one stop seo plugin Soon.
 * Version: 1.1.6
 * Author: Fahad Bin Zafar
 * Author URI: https://www.linkedin.com/in/fahadbinzafar/
 */

/* -==========- Constants  -==========- */
define("PLUGIN_DIR_PATH", plugin_dir_path(__FILE__));
define('PLUGIN_URL', plugins_url());
define('SITE_URL', get_site_url());

global $wpdb;
global $all_data;


include('admin/code/hooks.php');

/* -==========- Version Check -==========- */

require 'plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
  'https://github.com/faddies/one-stop-seo',
  __FILE__,
  'one-stop-seo'
);

/* -==========- Version Check End -==========- */



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


/* -==========- Plugin Helping Functions  -==========- */
include('admin/code/plugin_functions.php');

/* -==========- Plugin Helping Functions End -==========- */


/* -==========- Updating Data Base -==========- */


include('admin/code/database.php');


/* -==========- Updating Data Base End-==========- */


include('admin/code/front_gui_update.php');
