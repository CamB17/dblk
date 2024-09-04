<?
// remove dashboard widgets
function dblk_remove_dashboard_widgets() {
    global $wp_meta_boxes;
    unset($wp_meta_boxes['dashboard']);
}
add_action('wp_dashboard_setup', 'dblk_remove_dashboard_widgets', 11 );


// Remove Smilies
add_filter('option_use_smilies','dblk_remove_smileys',99,1);
function dblk_remove_smileys($bool) {
  return false;
}

// Remove emoji
add_action('init', 'disable_wp_emoji');
function disable_wp_emoji() {
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
 
}

// remove junk from head
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'start_post_rel_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'adjacent_posts_rel_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

add_action('init', 'dblk_rm_headlink');
function dblk_rm_headlink() {
  remove_action('wp_head', 'rsd_link');
  remove_action('wp_head', 'wlwmanifest_link');
  remove_action('wp_head', 'index_rel_link');
  remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );
}

add_filter( 'next_post_rel_link', 'dblk_disable_stuff' );
function dblk_disable_stuff( $data ) {
  return false;
}


//  Stop WordPress from using the sticky class, and style WordPress sticky posts using the .wp-sticky class instead
function dblk_remove_sticky_class($classes) {
  if(in_array('sticky', $classes)) {
    $classes = array_diff($classes, array("sticky"));
    $classes[] = 'wp-sticky';
  }

  return $classes;
}
add_filter('post_class','dblk_remove_sticky_class');

// Custom Backend Footer
function dblk_custom_admin_footer() {
  _e('<span id="footer-thankyou">Developed by <a href="http://www.cameronbarclay.com" target="_blank">Cam</a></span>.', 'cam');
}
add_filter('admin_footer_text', 'dblk_custom_admin_footer');

// Login css
function dblk_login_css() {
  wp_enqueue_style( 'dblk_login_css', get_template_directory_uri() . '/styles/login.css', false );
}
add_action( 'login_enqueue_scripts', 'dblk_login_css', 10 );

// changing the logo link from wordpress.org to your site
function dblk_login_url() {  return home_url(); }
add_filter('login_headerurl', 'dblk_login_url');

// changing the alt text on the logo to show your site name
function dblk_login_title() { return get_option('blogname'); }
add_filter('login_headertitle', 'dblk_login_title');

// remove the default option in the page template selector
function dblk_remove_default_template_option() {
    global $pagenow;
    if ( in_array( $pagenow, array( 'post-new.php', 'post.php') ) && get_post_type() == 'page' ) { ?>
        <script type="text/javascript">
            (function($){
                $(document).ready(function(){
                    $('#page_template option[value="default"]').remove();
                })
            })(jQuery)
        </script>
    <?php
    }
}
add_action('admin_footer', 'dblk_remove_default_template_option', 10);

//allow extra file types in uploader
function dblk_allow_extra_file_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'dblk_allow_extra_file_types');

//add meta box to expand and contract the acf fields
function dblk_expand_acf_box() {
  ?>
  <a class="button button-primary button-large expand-acf" style="
    background-color: #8c45b1;
    border-color: #66357f;
    text-shadow: none;
    margin-bottom: 10px;
    box-shadow: none;
    ">[+] Expand ACF Fields</a><br>
  <a class="button button-primary button-large contract-acf" style="
    background-color: #de0f4c;
    border-color: #ac1642;
    text-shadow: none;
    box-shadow: none;
    ">[-] Contract ACF Fields</a>
    <script type="text/javascript">
      jQuery(document).ready(function($){


        $('.expand-acf').click(function() {

          $('.acf-field-object').each(function() {
            if ( !$(this).hasClass('open') ) {
              $(this).find('a.edit-field').click();
            }
          });

        });

        $('.contract-acf').click(function() {

          $('.acf-field-object').each(function() {
            if ( $(this).hasClass('open') ) {
              $(this).find('a.edit-field').click();
            }
          });

        });


      });
    </script>
  <?php
}

function dblk_expand_pb_box() {
  ?>
  <a class="button button-primary button-large expand-pb" style="
    background-color: #8c45b1;
    border-color: #66357f;
    text-shadow: none;
    margin-bottom: 10px;
    box-shadow: none;
    ">[+] Expand Page Builder Modules</a><br>
  <a class="button button-primary button-large contract-pb" style="
    background-color: #de0f4c;
    border-color: #ac1642;
    text-shadow: none;
    box-shadow: none;
    ">[-] Contract Page Builder Modules</a>
    <script type="text/javascript">
      jQuery(document).ready(function($){


        $('.expand-pb').click(function() {

          $('.layout').each(function() {
            if ( $(this).hasClass('-collapsed') ) {
              $(this).find('.acf-fc-layout-handle').click();
            }
          });

        });

        $('.contract-pb').click(function() {

          $('.layout').each(function() {
            if ( !$(this).hasClass('-collapsed') ) {
              $(this).find('.acf-fc-layout-handle').click();
            }
          });

        });


      });
    </script>
  <?php
}

function dblk_add_custom_meta_boxes() {
    add_meta_box("expand_acf_box", "Expand & Contract ACF Fields", "dblk_expand_acf_box", "acf-field-group", "side", "high", null);
    add_meta_box("expand_pb_box", "Expand & Contract Page Builder", "dblk_expand_pb_box", "page", "side", "high", null);
}
// add_action("add_meta_boxes", "dblk_add_custom_meta_boxes");



// duplicate post plugin option set
update_option( 'duplicate_post_copystatus', '1' );


// shortcut to save page
add_action( 'admin_footer', function() {?>
  <script>
    ( function ( $ ) {
        'use strict';
        $( window ).load( function () {
            wpse.init();
        });
        var wpse = {
            keydown : function (e) {
                if ( e.ctrlKey && 83 === e.which ) {
                    // ctrl+p for "Publish" or "Update"
                    e.preventDefault();
                    $( '#publish' ).trigger( 'click' );
                }
                // if a pressed
                // if ( e.ctrlKey && 65 === e.which ) {
                //     // ctrl+p for "Publish" or "Update"
                //     e.preventDefault();
                //     toggle_acf_search();
                // }
            },
            set_keydown_for_document : function() {
                $(document).on( 'keydown', wpse.keydown );
            },
            set_keydown_for_tinymce : function() {
               if( typeof tinymce == 'undefined' )
                   return;
               for (var i = 0; i < tinymce.editors.length; i++)
                   tinymce.editors[i].on( 'keydown', wpse.keydown );
           },
           init : function() {
               wpse.set_keydown_for_document();
               wpse.set_keydown_for_tinymce();
           }
       }
    } ( jQuery ) );
    </script>
<?php });




# Remove theme editor
define( 'DISALLOW_FILE_EDIT', true );



add_action('admin_bar_menu', 'dblk_add_dev_toolbar_items', 100);
function dblk_add_dev_toolbar_items($admin_bar){
  $user_id = get_current_user_id();
  if ( function_exists('get_field') ) {
      if ( get_field('is_developer', 'user_' . $user_id)) {
        $admin_bar->add_menu( array(
            'id'    => 'search-acf',
            'title' => 'Search ACF',
            'href'  => '',
            'meta'  => array(
                'title' => __('Dev Links'),
                
            ),
        ));
        if ( $_GET['e'] !== null ) 
        {
            $error_link = get_the_permalink();
        } else 
        {
            $error_link = get_the_permalink() . "/?e";
        }
        $admin_bar->add_menu( array(
            'id'    => 'dblk_error_mode',
            'title' => 'Toggle Error Mode',
            'href'  => $error_link,
            
        ));
        
      }
  }
  
   
    
}


//replace wordpress logo
add_action( 'login_head', 'dblk_custom_login_css', 99999 );

function dblk_custom_login_css() {

    $background_color = get_field('wp_login_background_color','options');
    $logo = get_field('logo','options')['url'];
    $use_white_text = get_field('wp_login_use_white_text', 'options');
    ?>
    <style type="text/css">
    #login {
      width:300px;
    }
    html .login h1 a {
      background: url(<?= $logo; ?>) no-repeat top center;
      width: 100%;
      background-size: contain;
    }
    p#nav, p#backtoblog {
      text-align:center;
    }
    .login form {
      max-width:250px;
    }
    body.login {
      background-color: <?= $background_color; ?>;
    }
    <? if ( $use_white_text ) : ?>
      .login #backtoblog a, .login #nav a {
        color: white;
      }
    <? endif; ?>
    .mo_image_id {
      display: none;
    }
    br {
        display: none;
    }
    .mo-openid-app-icons {
      margin-bottom: 18px;
      display: block !important;
      border-bottom: 1px solid #e4e4e4;
      padding-bottom: 8px;
    }
    a.login-button {
        margin-right: 5px;
    }
    .mo-openid-app-icons p {
        font-size: 14px;
    }


    </style>
    <?
    if ( get_field('favicon', 'options' ) ) :
      echo '<link rel="shortcut icon" type="image/x-icon" href="'. get_field('favicon','options')['url'] . '"/>';
    endif;

}
// make pb default page type
function dblk_make_pb_template_default() {
    global $post;
    if ( 'page' == $post->post_type 
        && 0 != count( get_page_templates( $post ) ) 
        && '' == $post->page_template // Only when page_template is not set
    ) {
        $post->page_template = "pages/page-builder.php";
    }
}
add_action('add_meta_boxes', 'dblk_make_pb_template_default', 1);

//remove items from admin bar
function dblk_modify_admin_bar() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
    $wp_admin_bar->remove_menu('updates');
    $wp_admin_bar->remove_menu('alm-cache');
    $wp_admin_bar->remove_menu('new_draft');
    $wp_admin_bar->remove_menu('customize');
    $wp_admin_bar->remove_menu('wp-logo');
    $wp_admin_bar->remove_menu('search');
}
add_action( 'wp_before_admin_bar_render', 'dblk_modify_admin_bar' );

// Removes from admin menu
add_action( 'admin_menu', 'dblk_remove_from_admin_menu' );
function dblk_remove_from_admin_menu() {
    remove_menu_page( 'edit-comments.php' );
    // removes revision meta box
    
    
}

// Removes from post and pages
add_action('init', 'dblk_remove_comment_support', 100);

function dblk_remove_comment_support() {
    remove_post_type_support( 'post', 'comments' );
    remove_post_type_support( 'page', 'comments' );
}


// change howdy to welcome
add_filter( 'admin_bar_menu', 'dblk_replace_wordpress_howdy', 25 );
function dblk_replace_wordpress_howdy( $wp_admin_bar ) {
  $my_account = $wp_admin_bar->get_node('my-account');
  $newtext = str_replace( 'Howdy,', 'Welcome,', $my_account->title );
  $wp_admin_bar->add_node( array(
  'id' => 'my-account',
  'title' => $newtext,
  ) );
}

// remove site health widget from dashboard 
add_action('wp_dashboard_setup', 'remove_site_health_dashboard_widget');
function remove_site_health_dashboard_widget()
{
    remove_meta_box('dashboard_site_health', 'dashboard', 'normal');
}






// turn off rank math link suggestions
add_filter( 'rank_math/settings/titles/link_suggestions', function( $default, $post_type ) {
    return "off";
    exit;
}, 10, 2 );




// custom styles for editor
add_filter('mce_css', 'dblk_editor_style');
function dblk_editor_style($url) {
    $url = get_template_directory_uri().'/_exports/_css-source/admin/editor.css';
    return $url;
}

function dblk_add_slick() {
   wp_enqueue_style( 'slick-css', get_template_directory_uri() . '/assets/scripts/slick/slick.css' );
   wp_enqueue_script( 'slick-js', get_template_directory_uri() . '/assets/scripts/slick/slick.min.js', array(), '1.0', true );
}
