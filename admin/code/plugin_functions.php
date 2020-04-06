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

function read_files_from_path($data){
  $path =$data;  
  if (file_exists($data)) {
    $fp = fopen( $path, 'r' );
    return stream_get_contents($fp, -1);
  }
  else
    {
      return false;
    }
  
}

function read_files_from_url($data){
   $file = $data; 
   $headers = @get_headers($file);
   if ($headers && strpos( $headers[0], '200')) {
    $fp = fopen( $file, 'r' );
    return stream_get_contents($fp, -1);
    }
    else
    {
      return false;
    }
}


  if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['edit-robots'] ))
      {
        
        $filename = ABSPATH."robots.txt";
        if(file_exists($filename))
        {
          $handle = fopen( $filename, 'wa+' );
          $current = $_POST['edit-robots'];
          fwrite( $handle, $current);
          fclose( $handle );
        }
        
      }
   if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['edit-sitemap'] ))
      {
        
        $filename = ABSPATH."sitemap.xml";
        if(file_exists($filename))
        {
          $handle = fopen( $filename, 'wa+' );
          $current = $_POST['edit-sitemap'];
          fwrite( $handle, $current);
          fclose( $handle );
        }
        
      }      

  if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['edit-htaccess'] ))
      {
        
        $filename = ABSPATH.".htaccess";
        if(file_exists($filename))
        {
          $handle = fopen( $filename, 'wa+' );
          $current = $_POST['edit-htaccess'];
          fwrite( $handle, $current);
          fclose( $handle );
        }
        
      }     

if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['generate-robot'] ))
      {
        
        $filename = ABSPATH."robots.txt";
        if(!file_exists($filename))
        {
          $handle = fopen( $filename, 'wa+' );
          $current = "# robots.txt generated by One Stop SEO\r\nUser-agent: *\r\nAllow: /\r\nDisallow: /wp-admin/\r\nDisallow: /wp-includes/";
          fwrite( $handle, $current);
          fclose( $handle );
        }
        
      }

function get_all_urls(){

  $all_posts = new WP_Query('post_type=any&posts_per_page=-1&post_status=publish');
  $all_posts = $all_posts->posts;
  //header('Content-type:text/plain');
  $list_of_urls = array();
  foreach($all_posts as $post) {
        switch ($post->post_type) {
          case 'revision':
          case 'nav_menu_item':
              break;
          case 'page':
              $permalink = SITE_URL.'/'. get_page_uri($post->ID);
              break;
          case 'post':
              $permalink = get_permalink($post->ID);
              break;
          case 'attachment':
              $permalink = get_attachment_link($post->ID);
              break;
          default:
              $permalink = get_post_permalink($post->ID);
              break;
      }
     $list_of_urls[] = $permalink;
    //echo "\n{$post->post_type}\t{$permalink}\t{$post->post_title}"; 
//  var_dump($list_of_urls);
  }
//  var_dump($list_of_urls);die();



  return $list_of_urls;
}


function get_page_speed_score($site) {
    #initialize
    $use_cache = false;
    $apc_is_loaded = extension_loaded('apc');

    #set $use_cache
    if($apc_is_loaded) {
        apc_fetch("thumbnail:".$site, $use_cache);
    }

    if(!$use_cache) {
        $desktop_fetch = file_get_contents("https://www.googleapis.com/pagespeedonline/v5/runPagespeed?key=AIzaSyDKIz7bBbt7WWIkTvY1zPTz6L4bupjVDqc&locale=en_US&url=$site&strategy=desktop");
        $desktop_fetch = json_decode($desktop_fetch, true);
        var_dump($desktop_fetch);
        $desktop_score = $desktop_fetch['ruleGroups']['SPEED']['score'];


        $mobile_fetch = file_get_contents("https://www.googleapis.com/pagespeedonline/v4/runPagespeed?url=$site&screenshot=true&strategy=mobile&snapshots=false&key=AIzaSyDKIz7bBbt7WWIkTvY1zPTz6L4bupjVDqc");
        $mobile_fetch = json_decode($mobile_fetch, true);
        $mobile_score = $mobile_fetch['ruleGroups']['SPEED']['score'];


        $desktop_image = $desktop_fetch['screenshot']['data'];
        if($apc_is_loaded) {
           apc_add("thumbnail:".$site, $desktop_image, 4800);
        }
    }

    $desktop_image = str_replace(array('_', '-'), array('/', '+'), $desktop_image);
    return "<div class='speedscore'><ul><li>Desktop: ".$desktop_score ."</li><li> Mobile: " . $mobile_score."</li></ul></div><br><img src=\"data:image/jpeg;base64,".$desktop_image."\" />";
}
