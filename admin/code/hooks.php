<?php
global $all_data;
/* -==========- Hooks -==========- */

// Create Data Base on Plugin activation
register_activation_hook( __FILE__, 'one_stop_seo_create_table' );
register_activation_hook(__FILE__, 'yoast_deactivation');

// Add Plugin Link in Setting Menu
add_action('admin_menu', 'plugin_options');
add_action( 'admin_menu', 'sub_menu' );
add_action('admin_bar_menu', 'add_toolbar_items', 100);
add_shortcode('readmore', 'read_more_shortcode');
add_action('wp_head', 'add_code_to_head');
add_action('wp_footer', 'add_code_to_footer');


/* -==========- Hooks End -==========- */








/* -==========- Function Call -==========- */
get_data();
one_stop_seo_create_table();


/* -==========- Function Call End -==========- */












/* -==========- Functions -==========- */

// Get All DB Data
function get_data(){
  global $wpdb;
  global $all_data;
  $table_name = $wpdb->prefix . 'main_table';
  $query = "SELECT * FROM `$table_name`";
  $all_data = $wpdb->get_results($query);
}

// Plugin Page Option 
function plugin_options() {
    add_menu_page(
                      'One Stop SEO Options',
                      'One Stop SEO', 
                      'manage_options', 
                      'one-stop-seo', 
                      'setting_page',
                      'dashicons-share-alt',
                      '1'
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

// Add Sub menu Link to Side bar 
function sub_menu() {
  add_submenu_page(
    'one-stop-seo',
    'Tools',
    'Tools',
    'manage_options',
    'one-stop-seo-tools',
    'tools_page'
  );
}


// Add Link to Top Bar
function add_toolbar_items($admin_bar){
    $admin_bar->add_menu( array(
        'id'    => 'top-menu',
        'title' => 'One Stop SEO',
        'href'  => '#',
        'meta'  => array(
            'title' => __('One Stop SEO'),            
        ),
    ));
    $admin_bar->add_menu( array(
        'id'    => 'tools',
        'parent' => 'top-menu',
        'title' => 'Tools',
        'href'  => SITE_URL .'/wp-admin/admin.php?page=one-stop-seo-tools',
        'meta'  => array(
            'title' => __('Tools'),
            'class' => 'my_menu_item_class'
        ),
    ));
  }


// Create Main Table
function one_stop_seo_create_table(){
  global $wpdb;
  global $all_data;
  $table_name = $wpdb->prefix . 'main_table';
  $charset_collate = $wpdb->get_charset_collate();
  $table_creation = "CREATE TABLE  $table_name   ( 
                    id INT(9) NOT NULL AUTO_INCREMENT , 
                    data_option VARCHAR(50) NULL , 
                    option_value TEXT NULL DEFAULT 'not_provided', 
                    PRIMARY KEY(`id`),UNIQUE `data_option` (`data_option`)
                    )" . $charset_collate . ";";
  // Add Required Rows
  $add_data = "INSERT INTO `$table_name`( `data_option`) 
                VALUES 
              ('ga_code'), 
              ('gtm_code'),
              ('sc_code'),
              ('custom_head'),
              ('custom_body'),
              ('ct_code')";
  if (empty($all_data)) {
  run_query($table_creation);
  run_query($add_data);
  }
}


/* -==========- Functions End -==========- */


//register Settings
function one_stop_seo_register_settings() {
   add_option( 'enter_ga_code', 'Enter GA Code Here');
   add_option( 'enter_ga_value', 'Enter GTM Code Here');

   register_setting( 
                      'one_stop_seo_options_group', 
                      'enter_ga_code', 'enter_ga_value',
                      'myplugin_callback' 
                    );
}


function yoast_deactivation() {
    deactivate_plugins('wordpress-seo/wp-seo.php');
}
