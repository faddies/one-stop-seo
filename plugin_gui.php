
<link rel="stylesheet" type="text/css" href="<?php echo PLUGIN_URL.'/one-stop-seo/admin/assets/css/style.css'; ?>" />

<div class="tab">
  <button class="tablinks" id="defaultOpen" onclick="openCity(event, 'welcome')">Welcome</button>
  <button class="tablinks" onclick="openCity(event, 'tracking')">Tracking</button>
  <button class="tablinks" onclick="openCity(event, 'editfiles')">Edit Files</button>
  <button class="tablinks" onclick="openCity(event, 'sitestatus')">Site Health</button>
  <button class="tablinks" onclick="openCity(event, 'shortcode')">Short Codes</button>
  <!-- button class="tablinks" onclick="openCity(event, 'customcode')">Custom Code</button-->
  <button class="tablinks" onclick="openCity(event, 'support')">Support</button>
</div>

<div style="background: white; text-align: center;" id="welcome" class="tabcontent">
  <?php include('admin/gui/welcome.php'); ?>
  <img src="<?php echo PLUGIN_URL.'/one-stop-seo/admin/assets/images/seo2.gif'; ?>">
</div>

<div style="background: white;" id="tracking" class="tabcontent">
  <?php include('admin/gui/tracking_code.php'); ?>
</div>

<div style="background: white;" id="shortcode" class="tabcontent">
  <?php include('admin/gui/shortcode.php'); ?>
</div>
<div style="background: white;" id="customcode" class="tabcontent">
  <?php include('admin/gui/custom_code.php'); ?>
</div>
<div style="background: white;" id="editfiles" class="tabcontent">
  <?php include('admin/gui/edit_file.php'); ?>
</div>
<div style="background: white;" id="sitestatus" class="tabcontent">
  <?php include('admin/gui/sitestatus.php'); ?>
</div>
<div style="background: white;" id="support" class="tabcontent">

  <?php include('admin/gui/support.php'); ?>
</div>

<script type="text/javascript" src="<?php echo PLUGIN_URL.'/one-stop-seo/admin/assets/js/script.js'; ?>"></script> 