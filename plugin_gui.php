<link rel="stylesheet" type="text/css" href="<?php echo PLUGIN_URL.'/one-stop-seo/assets/css/style.css'; ?>" />
<script type="text/javascript" src="<?php echo PLUGIN_URL.'/one-stop-seo/assets/js/script.js'; ?>"></script>
<div class="tab">
  <button class="tablinks" id="defaultOpen" onclick="openCity(event, 'welcome')">Welcome</button>
  <button class="tablinks" onclick="openCity(event, 'tracking')">Tracking</button>
  <button class="tablinks" onclick="openCity(event, 'shortcode')">Shortcode</button>
  <button class="tablinks" onclick="openCity(event, 'customcode')">Custom Code</button>
</div>

<div id="welcome" class="tabcontent">
  <?php include('gui/welcome.php'); ?>
</div>

<div id="tracking" class="tabcontent">
  <?php include('gui/tracking_code.php'); ?>
</div>

<div id="shortcode" class="tabcontent">
  <?php include('gui/shortcode.php'); ?>
</div>
<div id="customcode" class="tabcontent">
  <?php include('gui/custom_code.php'); ?>
</div>