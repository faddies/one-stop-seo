<?php

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





//Read More Short Code
function read_more_shortcode($atts = [], $content = null)
{
    // do something to $content
    $content = "<span id='points' class='pointscss'>...</span><span id='contenttohide' class='hiddentcontentcss'>" . $content . "</span><button class='buttoncss' onclick='readmore_less()' id='readmorebutton'>Read more</button>";
    return $content;
}


//verify URL

function check_url_canonicalization($data){
  $url = parse_url($data);
  $host_url = $url['host'];
  $host_url = trim(str_replace("www.","",$host_url));

  $http_non_www = "http://" . $host_url; 
  $http_www = "http://www." . $host_url;
  $https_non_www = "https://" . $host_url; 
  $https_www = "https://www." . $host_url;
  $url_versions = array($http_non_www,$http_www,$https_non_www,$https_www);
  $results = array();
    for ($i=0; $i <= 3 ; $i++) { 
      $headers = @get_headers($url_versions[$i]);
      if($headers && strpos( $headers[0], '200')) { 
          $status = $url_versions[$i] . " Working"; 
      } 
      elseif($headers && strpos( $headers[0], '301')) { 
          $status = $url_versions[$i] . ' ' . $headers[0] . ' To ' . $headers[6]; 
      } 
      elseif($headers) { 
          $status = $url_versions[$i] . ' ' . $headers[0] . ' To ' . $headers[6]; 
      } 
      else { 
          $status = $url_versions[$i] . ' Server Error.'; 
      } 
       $results[$i] = $status;
    }
    return $results;

}

function check_sitemap_status($data){
      $headers1 = @get_headers($data . '/sitemap.xml');
      $headers2 = @get_headers($data . '/sitemap_index.xml');
      if($headers1 && strpos( $headers1[0], '200')) { 
          return 'Exist at '.$data.'/sitemap.xml';
      } elseif ($headers2 && strpos( $headers2[0], '200')) {
        return 'Exist at '.$data.'/sitemap_index.xml';
      }
      else { 
          return false;
      } 
}
function check_robots_status($data){
      $headers = @get_headers($data . '/robots.txt');
      if($headers && strpos( $headers[0], '200')) { 
          return 'Exist at '.$data.'/robots.txt';
      } 
      else { 
          return false;
      } 
}