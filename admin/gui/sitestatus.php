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
    <?php  submit_button('Generate Sitemap'); ?>
	</form>


    		<?php
    	}
    	else{

    	echo $result;
    	}
    	?>
    	
    	
    </p>

    <?php 

    $dns_record = dns_get_record('mummyista.ae',DNS_ALL - DNS_PTR);
    echo '<pre>';
    echo var_dump($dns_record);
    echo '</pre>';
    ?>