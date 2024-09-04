<?
$newsletter_code = get_field('newsletter_code','options');
?>



<footer>
    <?php
    if ( is_front_page() ) : ?>
        <button class="back-to-top" onclick='window.scrollTo({top: 0, behavior: "smooth"});'>
            <span class="sr-only">Back to Top</span>
        </button>
    <?php
    endif; ?>

   <div class="top-footer bg_tan bg_light">
      <div class="row">
         <div class="columns small-12 medium-5 menu">
            <span class='h5 marigold'>Site Map</span>
            <div class='menus'>
                <div>
                    <?php dblk_menu('menu-header', 'menu-header', '', '1'); ?>
                </div>
                <div>
                    <?php dblk_menu('secondary-menu', 'secondary-menu', '', '1'); ?>
                </div>
                <div>
                    <?php dblk_menu('tertiary-menu', 'tertiary-menu', '', '1'); ?>
                </div>
            </div>
         </div>
         <div class="columns small-12 medium-2 contact">
             <span class='h5 marigold'><a href="/contact">Contact</a></span>
            <?= get_field('address','options'); ?>
            <?= get_field('additional_information','options'); ?>
            <? if(get_field('contact_button', 'options')["button_text"]) : 
                fm_button(
                    get_field('contact_button', 'options')["button_text"], 
                    'tertiary', 
                    get_field('contact_button', 'options')["open_in_a_new_tab"], 
                    get_field('contact_button', 'options')["url_type"],
                    get_field('contact_button', 'options')["url"],
                    get_field('contact_button', 'options')["wordpress_content"]
                );
            endif; ?>
         </div>
         <div class="columns small-12 medium-5 social">
             <? if($newsletter_code) : ?>
                 <div class='form form--newsletter'>
                     <span class='h5 marigold'>Stay Informed</span>
                     <?= do_shortcode("$newsletter_code"); ?>
                 </div>
             <? endif; ?>
             <div class='social_wrap'>
                 <span class='h5 marigold'>Follow Us</span>
                  <?php fm_social_media(); ?>
             </div>
         </div>
      </div>
   </div>
   <div class="bottom-footer bg_white">
      <div class="row ">
         <div class="columns small-12 copyright">
            <? if ( get_field('copyright_notice','options') ) : ?>
               <? 
               $notice = get_field('copyright_notice','options'); 
               echo "<p>" . str_replace('[year]', date('Y'), $notice) . "</p>";
               ?>
            <? endif; ?>
            <?php if (get_field('sub_footer_links', 'options')): ?> 
               <?php while(has_sub_field('sub_footer_links', 'options')): ?>
                  <a href="<?= get_sub_field('link_url'); ?>">
                     <?= get_sub_field('link_text'); ?>
                  </a>
               <?php endwhile; ?>
            <?php endif; ?>
         </div>
      </div>
   </div>
   <img src="<?= get_template_directory_uri(); ?>/_images/blobs/blob-footer.svg" class='footer_blob' alt='footer decoration' />
    <a class="skip-to skip-to-top" href="#top-of-page">Back to Top of Page</a>
</footer>
  



<? wp_footer(); ?>


<?= get_field('footer_code','options'); ?>


    <?php fm_menu(); ?>
    
    <script type="text/javascript">
   		//Function to add calculate the height of header+alert
        function siteTopHeight() {
           	var header_height = jQuery('.hold_header').outerHeight();
           	var alert_height = jQuery('#alert_bar').outerHeight();
           	if(!alert_height) {
           	    alert_height = 0;
           	}
           	var wpadmin_height = jQuery('#wpadminbar').outerHeight();
           	if(!wpadmin_height) {
           	    wpadmin_height = 0;
           	}
           	jQuery('#menu_mobile').css('padding-top', header_height + alert_height + wpadmin_height + 50);
           	jQuery('.directory_map_overlays').css('top', header_height + alert_height + wpadmin_height + 40);
        }
        jQuery(document).ready(function($){
   		
       		var body = $('body');
       		var menu_mobile = $('#menu_mobile');
       		var menu_mobile_container = $('#menu_mobile_container');
       		var menu_mobile_trigger_holder = $('.menu_mobile_trigger_holder');
       		var menu_label = $('.menu_mobile_trigger_holder .menu_label');
       		
            
            //run siteTopHeight on documnet ready
            siteTopHeight();
    
       		
       	
       		jQuery(document).click(function(e) {
                // if the mobile menu is active and theres a click outside of it, close it
                if (
                    !menu_mobile.is(e.target) 
                    && menu_mobile.has(e.target).length === 0
                    && body.hasClass('mobile_menu_active')
                ) 
                {
                    e.preventDefault();
                    body.removeClass('mobile_menu_active');
                    menu_label.text('Menu');
            
                } 
                // if the mobile menu trigger holder (or something inside of it) is clicked
                else if ( 
                    menu_mobile_trigger_holder.is(e.target) 
                    || menu_mobile_trigger_holder.has(e.target).length > 0
                ) {
                    body.toggleClass('mobile_menu_active');
                    menu_label.text('Close');
                }
            });
            
            //Apply siteTopHeight(); function on alert bar close
            jQuery('#alert_bar_close').on('click', function($) {
                //siteTopHeight();;
                var header_height = $('.hold_header').outerHeight();
                var wpadmin_height = $('#wpadminbar').outerHeight();
               	if(!wpadmin_height) {
               	    wpadmin_height = 0;
               	}
               	var alert_height = 0;
                $('#menu_mobile').css('padding-top', header_height + alert_height + wpadmin_height);
                $('.directory_map_overlays').css('top', header_height + alert_height + wpadmin_height + 40);
            });
       		
       	
        });
        
        //Apply siteTopHeight(); function on window resize
        window.addEventListener('resize', function(event){
            siteTopHeight();
        });
    </script>

</body>
</html>

