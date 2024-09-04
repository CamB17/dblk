<?php

// enqueue javascript
function dblk_enqueue_scripts() {
    
    if( is_admin()) {
        
        // add the admin js
        wp_register_script('dblk_admin_scripts', get_template_directory_uri() . '/_engine/vendor/wp_admin/wp_admin.js');
        wp_enqueue_script('dblk_admin_scripts');
        
        // add select2
        // wp_register_script('select2', get_template_directory_uri() . '/_engine/vendor/wp_admin/select2/select2.min.js');
        // wp_enqueue_script('select2');
        
    } else {
      
        /**
         * Remove jQuery from the glob and import seperately
         * 
         * Plan was to load jQUery in the footer using a shim (dblk_jquery_shim)
         * However, more JS conflicts than expected. Tabeling for now - no time.
         * For now, we are laoding the deafualt WP version 3.7.1
         * 
         * @todo Finish setting up jQuery to load in head.
         */
         
        // remove default wp jquery so we can manage it ourselves
          //wp_deregister_script('jquery');
        
        // $jquery_file = get_template_directory_uri() . '/_engine/vendor/jquery/jquery.js';
        // $jquery_path = filemtime(get_template_directory().'/_engine/vendor/jquery/jquery.js');
        // wp_register_script('jquery-aor', $jquery_file. "?v=" . $jquery_path, array(), false, false);
        // wp_enqueue_script('jquery-aor');
          
        // loop thru each js file in the vendors folder and enqueue it
        // if its the jquery script, add it to the header
        foreach (glob(get_template_directory() . "/_engine/vendor/**/*.js", GLOB_NOSORT) as $filename) {
              
            $basename = basename($filename, ".js");
            $in_footer = array(
                'in_footer' => true,
                'strategy'  => 'defer',
            );
            $skip_glob_load_elsewhere = false;
            // if it's the jquery file add it to the header. Now loading WP's defualt jquery version
            if ( $basename == "jquery" ) {
                //$in_footer = true;
                $skip_glob_load_elsewhere = true;
            }
            // if the file is in the wp_admin folder don't enqueue it 
            if ( strpos($filename, "/wp_admin/" ) ) {
                continue;
            }
            $relative_filename = get_template_directory_uri() . str_replace(get_template_directory(), '', $filename);
            
            // get the time it was last updated to cache busting
            $js_updated_time = filemtime($filename);
            
            if ( !$skip_glob_load_elsewhere ) {
                wp_register_script($basename, $relative_filename. "?v=" . $js_updated_time, array(), false, $in_footer);
                wp_enqueue_script($basename);
            }
        }
        
        foreach (glob(get_template_directory() . "/func_mods/**/*.js", GLOB_NOSORT) as $filename) {
              
            $basename = basename($filename, ".js");

            $relative_filename = get_template_directory_uri() . str_replace(get_template_directory(), '', $filename);
            
            // get the time it was last updated to cache busting
            $js_updated_time = filemtime($filename);
            
            if ( !$skip_glob_load_elsewhere ) {
                wp_register_script($basename, $relative_filename. "?v=" . $js_updated_time, array(), false, true);
                wp_enqueue_script($basename);
            }
        }
    }
}
add_action('wp_enqueue_scripts', 'dblk_enqueue_scripts');
add_action('admin_enqueue_scripts', 'dblk_enqueue_scripts');


// enqueue css
function dblk_enqueue_styles() {

  
    if ( is_admin() ) {
     
        wp_enqueue_style( 'admin_styles', get_template_directory_uri().'/_exports/_css-source/admin/wp-admin.css');
        // wp_enqueue_style( 'dblk_select2', get_template_directory_uri().'/_engine/vendor/wp_admin/select2/select2.min.css');
        
    } else {
        
        // loop thru the google fonts and add them to the site
        if (get_field('google_fonts','options')):
    	    while(has_sub_field('google_fonts','options')):
           
                wp_enqueue_style( get_sub_field('font_name'), get_sub_field('font_url'), [], null );
    
    	    endwhile;
    
        endif;
        
        
        // get all compiled css files into an array
        $exported_css_array = glob(get_template_directory() . "/_exports/_css-source{,/*,/*/*,/*/*/*,/*/*/*/*,/*/*/*/*/*}/*.css", GLOB_BRACE);
        
        // move global css files up to the top
        foreach ( $exported_css_array as $key => $css_file ) {
            if ( strpos($css_file, "/global/" ) ) {
                $exported_css_array = array($key => $css_file) + $exported_css_array;
            }
        }
        // move vendor css files up to the top
        foreach ( $exported_css_array as $key => $css_file ) {
            if ( strpos($css_file, "/vendor/" ) ) {
                $exported_css_array = array($key => $css_file) + $exported_css_array;
            }
        }
        // remove admin css files
        foreach ( $exported_css_array as $key => $css_file ) {
            if ( strpos($css_file, "/admin/" ) ) {
                unset($exported_css_array[$key]);
            }
        }
        
        // enqueue each exported css file 
        foreach ($exported_css_array as $filename) {
              
            $basename = basename($filename, ".js");
            $relative_filename = get_template_directory_uri() . str_replace(get_template_directory(), '', $filename);
            $css_updated_time = filemtime($filename);
            wp_enqueue_style( $basename, $relative_filename . "?v=" . $css_updated_time);
            
        }
        
        //enqueue the main stylesheet with a timestamp version for cache busting
        // $css_updated_time = filemtime(get_stylesheet_directory() . '/_exports/css/style.css');
        // wp_enqueue_style( 'main_stylesheet', get_template_directory_uri() . '/_exports/css/style.css?v=' . $css_updated_time );

    }
    
}
add_action('wp_enqueue_scripts', 'dblk_enqueue_styles', 200);
add_action('admin_enqueue_scripts', 'dblk_enqueue_styles', 200);

// register favicon
function dblk_theme_favicons() {

  if ( get_field('favicon', 'options' ) ) :
    echo '<link rel="shortcut icon" type="image/x-icon" href="'. get_field('favicon','options')['url'] . '"/>';
  endif;

}
add_action('wp_head', 'dblk_theme_favicons');


/**
 * Add JQuery Shim, so we can load JQuey in the footer
 * 
 * @link https://github.com/withjam/jqshim-head
 */
// function dblk_jquery_shim () {
//   echo '<script>
//   (function(){"use strict";var c=[],f={},a,e,d,b;if(!window.jQuery){a=function(g){c.push(g)};f.ready=function(g){a(g)};e=window.jQuery=window.$=function(g){if(typeof g=="function"){a(g)}return f};window.checkJQ=function(){if(!d()){b=setTimeout(checkJQ,100)}};b=setTimeout(checkJQ,100);d=function(){if(window.jQuery!==e){clearTimeout(b);var g=c.shift();while(g){jQuery(g);g=c.shift()}b=f=a=e=d=window.checkJQ=null;return true}return false}}})();
//   </script>';
// }

// add_filter ( 'wp_head', 'dblk_jquery_shim');
