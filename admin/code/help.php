<?php 
/* Add Some Text After Content 


add_action( 'the_content', 'add_own_content' );

function add_own_content ( $content ) {
    return $content .= '<p>This is Content</p>';
}


*/



/* Add Any code in Wp Head 

add_action('wp_head', 'add_code_to_head');
function add_code_to_head(){
?>
Head Put Code Here (it could be PHP code or plain text)
<?php
};

*/

/* Add Code After <body> tag latest wp version

add_action('wp_body', 'add_code_to_after_body_tag');
function add_code_to_after_body_tag(){
?>
<a href="#">aaa</a>
<?php  }
};

*/

/* Add Any code in Footer 

add_action('wp_footer', 'add_code_to_footer');
function add_code_to_footer(){
?>
footerPut Code Here (it could be PHP code or plain text)
<?php
};

*/


/* Add Code On Home Page Only

add_action('wp_head', 'add_code_to_head_specific_page');
function add_code_to_head_specific_page(){
if(is_front_page()) {  ?>
Put Code Here (it could be PHP code or plain text)
<?php  }
};

*/


/* Add Any code in Header Specific Page or post by id 

add_action('wp_head', 'your_function_name');
function your_function_name(){
if(is_single(73790)) {  ?>
Put Code Here (it could be PHP code or plain text)
<?php  }
};

*/

// function my_admin_scripts() {
//   wp_enqueue_scripts( 'admin-js', PLUGIN_URL.'/one-stop-seo/admin/assets/js/script.js' );
//   wp_enqueue_style( 'admin-css', PLUGIN_URL.'/one-stop-seo/admin/assets/css/style.css' );


// }
// add_action( 'admin_enqueue_scripts', 'my_admin_scripts' );

// wp_enqueue_style( 'style', '/resources/style.css' );
// wp_enqueue_scripts — front-end

// admin_enqueue_scripts — admin page

// login_enqueue_scripts — login page