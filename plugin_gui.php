<div class="tab">
  <button class="tablinks" id="defaultOpen" onclick="openCity(event, 'welcome')">Welcome</button>
  <button class="tablinks" onclick="openCity(event, 'tracking')">Tracking</button>
  <button class="tablinks" onclick="openCity(event, 'shortcode')">Shortcode</button>
  <button class="tablinks" onclick="openCity(event, 'customcode')">Custom Code</button>
</div>

<div id="welcome" class="tabcontent">
  <?php include('welcome.php'); ?>
</div>

<div id="tracking" class="tabcontent">
  <?php include('tracking_code.php'); ?>
</div>

<div id="shortcode" class="tabcontent">
  <?php include('shortcode.php'); ?>
</div>
<div id="customcode" class="tabcontent">
  <?php include('custom_code.php'); ?>
</div>
<?php include('helper.php'); ?>