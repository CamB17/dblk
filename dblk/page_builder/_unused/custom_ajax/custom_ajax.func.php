<?
// this code is automatically added to the functions.php with a glob
// that looks for any php file that ends in .func.php
add_action('wp_ajax_dblk_custom_ajax' , 'dblk_custom_ajax');
add_action('wp_ajax_nopriv_dblk_custom_ajax','dblk_custom_ajax');
function dblk_custom_ajax() {
    
    // extracts all post variables with the prefix post
    filter_var_array($_POST, FILTER_SANITIZE_STRING);
    extract($_POST);
    
    echo $test;
    
    die();
}

?>