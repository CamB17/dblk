<!DOCTYPE html>
<html class="no-js override" <?php language_attributes(); ?>>
<head>

   <?= get_field('tag_manager_script_code','options'); ?>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1" />
   <?php wp_head(); ?>
   <?= get_field('header_code','options'); ?>
   <?
    $right_header_button = get_field('right_header_button', 'options');
   ?>
   
</head>

<body <? body_class(); ?> >
   <?= get_field('tag_manager_noscript_code','options'); ?>
    <div id="top-of-page"></div>
    <a class="skip-to skip-to-main" href="#skip-to-main">Skip to Main Content</a>
   <div class="reveal-overlay"></div>
   <header class='header bg_black bg_dark'>
       <? fm_alert_bar(); ?>
      <div class="row hold_header">
         <div class="columns">
            <a href="<?php echo home_url(); ?>" class='logo'>
               <?
               // Primary Logo
               $logo = gf('logo', 'options');
               $logo_url = $logo['url'];
               $logo_alt = get_bloginfo('name') . " logo";
               echo $logo ? "<img src='$logo_url' alt='$logo_alt' class='logo_primary static_version skip-lazy'>" : null; 
               ?>
               <?
               // Hover Logo
               $logo = gf('logo_hover', 'options');
               $logo_url = $logo['url'];
               $logo_alt = get_bloginfo('name') . " logo";
               echo $logo ? "<img src='$logo_url' alt='$logo_alt' class='logo_primary hover_version'>" : null; 
               ?>
            </a>
            <div class='desktop_menu'>
                <?= dblk_menu("desktop-menu-header", "desktop-menu-header", null, 2); ?>
            </div>
            <? if($right_header_button["button_text"]) : 
                fm_button(
                    $right_header_button["button_text"], 
                    'primary menu', 
                    $right_header_button["open_in_a_new_tab"], 
                    $right_header_button["url_type"],
                    $right_header_button["url"],
                    $right_header_button["wordpress_content"]
                );
            endif; ?>
             <div class="menu_mobile_trigger_holder">
               <div id="menu_mobile_trigger">
                  <span></span>
                  <span></span>
                  <span></span>
                  <span></span>
               </div>
            </div>
         </div>
      </div>
      
  </header>
  <? subpage_header(); ?>
  <div id="skip-to-main"></div>
<script type="text/javascript">
    jQuery(document).ready(function($){
	   
        // clone the header and set up the cloned header to show on scroll
	    var header = $('header');
		$(window).scroll(function(){
		    
            var distance_from_top = $(window).scrollTop();
          
            if (distance_from_top > 75) {
               header.addClass('scrolled');
            } else {
               header.removeClass('scrolled');
            }
        });
        
        $('li.menu_header_item_parent').on({
            mouseenter: function () {
                var sub_menu = $(this).find('> ul');
                sub_menu.slideDown(100);
            },
            mouseleave: function () {
                var sub_menu = $(this).find('> ul');
                sub_menu.slideUp(100);
            }
        });
        
        var currentUrl = window.location.href; // get the current URL

        // Check if any 'a' element's href attribute value matches part of the current URL
        $('#menu_mobile a').each(function() {
            var linkUrl = $(this).attr('href');
            if (currentUrl.includes(linkUrl)) {
                // Add the class to the parent 'li' of the 'a' element
                $(this).closest('li').addClass('menu_item_active');
            }
        });
        
        // Check if any 'a' element's href attribute value matches part of the current URL within the desktop_menu
        $('.desktop_menu a').each(function() {
            var linkUrl = $(this).attr('href');
            if (currentUrl.includes(linkUrl)) {
                // Add the class to the parent 'li' of the 'a' element
                $(this).closest('li').addClass('menu_item_active');
            }
        });
        
        $('li.desktop-menu-header_item.desktop-menu-header_item_parent').click(function() {
            $(this).find('>ul').addClass('visible');
        }, function() {
            $(this).find('>ul').removeClass('visible');
        })
	});
</script>
