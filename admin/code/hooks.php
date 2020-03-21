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
function register_developer_entities() {
    $developer_args = array(
      'public' => true,
      'label'  => 'Developers',
      'rewrite' => array( 'slug' => 'developers' ),
      'taxonomies' => array( 'developer_tag' )
    );
    register_post_type( 'developer', $developer_args );

    $taxonomy_args = array(
      'labels' => array( 'name' => 'Developer Tags' ),
      'show_ui' => true,
      'show_tagcloud' => false,
      'rewrite' => array( 'slug' => 'developers' )
    );
    register_taxonomy( 'developer_tag', array( 'developer' ), $taxonomy_args );
}

add_action( 'init', 'register_developer_entities' );
function generate_taxonomy_rewrite_rules( $wp_rewrite ) {
  $rules = array();
  $post_types = get_post_types( array( 'name' => 'developer', 'public' => true, '_builtin' => false ), 'objects' );
  $taxonomies = get_taxonomies( array( 'name' => 'developer_tag', 'public' => true, '_builtin' => false ), 'objects' );

  foreach ( $post_types as $post_type ) {
    $post_type_name = $post_type->name; // 'developer'
    $post_type_slug = $post_type->rewrite['slug']; // 'developers'

    foreach ( $taxonomies as $taxonomy ) {
      if ( $taxonomy->object_type[0] == $post_type_name ) {
        $terms = get_categories( array( 'type' => $post_type_name, 'taxonomy' => $taxonomy->name, 'hide_empty' => 0 ) );
        foreach ( $terms as $term ) {
          $rules[$post_type_slug . '/' . $term->slug . '/?$'] = 'index.php?' . $term->taxonomy . '=' . $term->slug;
        }
      }
    }
  }
  $wp_rewrite->rules = $rules + $wp_rewrite->rules;
}
add_action('generate_rewrite_rules', 'generate_taxonomy_rewrite_rules');

function register_designer_entities() {
    $designer_args = array(
      'public' => true,
      'label'  => 'designers',
      'rewrite' => array( 'slug' => 'designers' ),
      'taxonomies' => array( 'designer_tag' )
    );
    register_post_type( 'designer', $designer_args );

    $taxonomy_args = array(
      'labels' => array( 'name' => 'designer Tags' ),
      'show_ui' => true,
      'show_tagcloud' => false,
      'rewrite' => array( 'slug' => 'designers' )
    );
    register_taxonomy( 'designer_tag', array( 'designer' ), $taxonomy_args );
}

add_action( 'init', 'register_designer_entities' );
function generate_taxonomy_rewrite_rules_designer( $wp_rewrite ) {
  $rules = array();
  $post_types = get_post_types( array( 'name' => 'designer', 'public' => true, '_builtin' => false ), 'objects' );
  $taxonomies = get_taxonomies( array( 'name' => 'designer_tag', 'public' => true, '_builtin' => false ), 'objects' );

  foreach ( $post_types as $post_type ) {
    $post_type_name = $post_type->name; // 'designer'
    $post_type_slug = $post_type->rewrite['slug']; // 'designers'

    foreach ( $taxonomies as $taxonomy ) {
      if ( $taxonomy->object_type[0] == $post_type_name ) {
        $terms = get_categories( array( 'type' => $post_type_name, 'taxonomy' => $taxonomy->name, 'hide_empty' => 0 ) );
        foreach ( $terms as $term ) {
          $rules[$post_type_slug . '/' . $term->slug . '/?$'] = 'index.php?' . $term->taxonomy . '=' . $term->slug;
        }
      }
    }
  }
  $wp_rewrite->rules = $rules + $wp_rewrite->rules;
}
add_action('generate_rewrite_rules', 'generate_taxonomy_rewrite_rules_designer');