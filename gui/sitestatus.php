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
	      $site_url = $_POST['text'];
	      $status_result = check_url_status($site_url);
	      echo '<li>' . $status_result[0] . '</li>';
	      echo '<li>' . $status_result[1] . '</li>';
	      echo '<li>' . $status_result[2] . '</li>';
	      echo '<li>' . $status_result[3] . '</li>';


	    }
      ?>

    </ul>