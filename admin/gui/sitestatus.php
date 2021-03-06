<h3>Canonicalization Status</h3>
<p>Check if Canonicalization is Applied on your site.</p>
  <form action="<?php echo SITE_URL .'/wp-admin/options-general.php?page=one-stop-seo&button=submit' ?>" method="post">
    <input style="float: left;" type="text" hidden name="text" value="<?php echo SITE_URL ?>" />
    <?php  submit_button('Check Canonicalization'); ?>
	</form>
  
    <ul>
    
      <?php 
    
	    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['text'] ))
	    {
	      // $site_url = $_POST['text'];
          $site_url = $_POST['text'];
	      $status_result = check_url_canonicalization($site_url);
	      echo '<li>' . $status_result[0] . '</li>';
	      echo '<li>' . $status_result[1] . '</li>';
	      echo '<li>' . $status_result[2] . '</li>';
	      echo '<li>' . $status_result[3] . '</li>';


	    }
      ?>

    </ul>
    <h3>Site Map</h3>
<p>Check if Site map available for site or not.</p>
        <p>
    	
    	<?php 
    	$result = check_sitemap_status(SITE_URL); 
    	if (!$result) {
    		?>

<p>Sitemap not Found. Why Not we generate one for you?</p>
<form action="<?php echo SITE_URL .'/wp-admin/options-general.php?page=one-stop-seo&button=submit' ?>" method="post">
    <input type="text" name="generate-sitemap" hidden="">
    <?php  submit_button('Generate Sitemap'); ?>
	</form>


    		<?php
    	}
    	else{

    	echo $result;
    	}
    	?>
    	
    	
    </p>

    <h3>Robots.txt</h3>
<p>Check if robots.txt available for site or not.</p>
        <p>
    	
    	<?php 
    	$result = check_robots_status(SITE_URL); 
    	if (!$result) {
    		?>

<p>Robots.txt not Found. Why Not we generate one for you?</p>
<form action="<?php echo SITE_URL .'/wp-admin/options-general.php?page=one-stop-seo&button=submit' ?>" method="post">
    <input type="text" name="generate-robot" hidden="">
    <?php  submit_button('Generate Default Robots.txt'); ?>
	</form>


    		<?php
    	}
    	else{

    	echo $result;
    	}
    	?>
    	
    	
    </p>


    <h3>DNS Record</h3>

    <?php 

    $url = parse_url(SITE_URL);
    $host_url = $url['host'];
    $dns_record = dns_get_record($host_url,DNS_ALL - DNS_PTR);
    echo "<ul>";
    echo  "<li>Type: ". $dns_record[0]['type'] . "</li>";
    echo  "<li>IP Address: ". $dns_record[0]['ip'] . "</li>";
    echo  "</ul>";
    echo "<ul>";
    echo  "<li>Type: ". $dns_record[1]['type'] . "</li>";
    echo  "<li>Name Server: ". $dns_record[1]['target'] . "</li>";
    echo  "<li>Name Server: ". $dns_record[2]['target'] . "</li>";
    echo  "</ul>";


    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['generate-sitemap'] ))
      {
        
        $filename = ABSPATH."sitemap.xml";
        if(!file_exists($filename))
        {

          $handle = fopen( $filename, 'wa+' );
          $sitemap_data = "<?xml version='1.0' encoding='UTF-8'?>";
          $sitemap_data .= "\r\n<!--Sitemap Generated by One Stop SEO-->";
          $sitemap_data .= "\r\n<sitemapindex xmlns='http://www.sitemaps.org/schemas/sitemap/0.9'>";
           $page_urls = get_all_urls();
           foreach ($page_urls as $page_url) {
            $sitemap_data .= "\r\t<sitemap>\r\n\t\t<loc>";
            $sitemap_data .= $page_url;
            $sitemap_data .= "</loc>\r\n\t\t<lastmod>".date("Y-m-d")."T".date("h:i:s")."</lastmod>\r\n\t</sitemap>";
           }
           $sitemap_data .= "\r\n</sitemapindex>";

          fwrite( $handle, $sitemap_data);
          fclose( $handle );
        }
      }

?>



<h3>Google Page Speed Score</h3>
<p>Check Page speed Score for Mobile and Desktop</p>
  <form action="<?php echo SITE_URL .'/wp-admin/options-general.php?page=one-stop-seo&button=submit' ?>" method="post">
    <input style="float: left;" type="text" hidden name="speed_score" />
    <?php  submit_button('Check Score'); ?>
  </form>
 <?php 
  if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['speed_score'] ))
      {
   echo get_page_speed_score('https://keepclean.ae/');
 }
 ?>