<?php
/* -==========- Updating GUI/Source Code -==========- */
function add_code_to_head(){
  global $all_data;
  if($all_data[0]->option_value != 'not_provided'){
?>
<!-- Google Analytics  - One Stop SEO-->
<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $all_data[0]->option_value ?>"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', '<?php echo $all_data[0]->option_value ?>');
</script>
<!-- End Google Analytics -->
<?php
}
if($all_data[1]->option_value != 'not_provided'){
?>

<!-- Google Tag Manager - One Stop SEO-->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','<?php echo $all_data[1]->option_value ?>');</script>
<!-- End Google Tag Manager -->

<?php
}
if ($all_data[3]->option_value != 'not_provided') {
echo $all_data[3]->option_value;
}


if($all_data[2]->option_value != 'not_provided'){
?>
<!-- Google Search Console  - One Stop SEO-->
<meta name="google-site-verification" content="<?php echo $all_data[2]->option_value ?>" />
<!-- End Google Search Console -->

<?php
}
if($all_data[5]->option_value != 'not_provided'){
?>
<!-- Global site tag (gtag.js)  - One Stop SEO-->
<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $all_data[5]->option_value ?>"></script> 
<script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', '<?php echo $all_data[5]->option_value ?>'); </script> 
<!-- End Global site tag -->
<?php
}

?>

<style>
#contenttohide {display: none;}
</style>
<script>
function readmore_less() {
  var dots = document.getElementById("points");
  var moreText = document.getElementById("contenttohide");
  var btnText = document.getElementById("readmorebutton");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "Read more"; 
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "Read less"; 
    moreText.style.display = "inline";
  }
}
</script>
<?php
};


function add_code_to_footer(){
   global $all_data;
   if ($all_data[1]->option_value != 'not_provided') {

 
?>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo $all_data[1]->option_value ?>"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<?php
  }
  if ($all_data[4]->option_value != 'not_provided') {
  echo $all_data[4]->option_value;
  }
};