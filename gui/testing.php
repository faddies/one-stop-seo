<h3>Canonicalization Status</h3>
<p>To change the style of button or content, following are the classes details:</p>
  <form action="http://localhost/plugintest/wp-admin/options-general.php?page=one-stop-seo" method="post">
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