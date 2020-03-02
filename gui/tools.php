<h3>Canonicalization Check</h3>
<p>Check Canonicalization for any website.</p>
  <form action="<?php echo SITE_URL .'/wp-admin/options-general.php?page=one-stop-seo&button=submit' ?>" method="post">
    <input style="float: left;" type="text" name="text" value="Enter Value" />
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