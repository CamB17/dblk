<?
function fm_directory(
    $show_found_dots,
    ) { 
?>

<div class="directory_wrap <?php echo $wrap_class; ?>">
        <img src="<?php echo get_template_directory_uri(); ?>/_images/blobs/directory_blob.svg" class="directory_blob" alt="" role="presentation"/>

        <div class="row">
            <div class="columns directory_map">
                <div class="directory_map_overlays">
                    <?php
                    // Get the Map
                    block_map();
                    
                    // Loop for Overlays
                   directory_overlay_loop_partial();
                    ?>
                </div>
            </div>
            <div class="columns directory_list">
                
                <?php
                $restaurant = get_posts( array(
                    'post_type'    => 'restaurant',
                    'post_status'    => 'publish'
                ));
                $shop = get_posts( array(
                    'post_type'    => 'shop',
                    'post_status'    => 'publish'
                ));
                $stay = get_posts( array(
                    'post_type'    => 'stay',
                    'post_status'    => 'publish'
                ));
                $service = get_posts( array(
                    'post_type'    => 'service',
                    'post_status'    => 'publish'
                ));
                ?>
                
                <?php
                // Make sure there are posts for resautants
                if( !empty ( $restaurant ) ) :
                    //Set <ol start="1">
                    $count = 1;
                    // Get the Restaurant Partial
                    directory_section_partial('restaurant', $count); 
                endif;
                
                // Make sure there are posts for shops
                if( !empty ( $shop ) ) :
                    // Set <ol start> to the count of previous post type
                    $count = wp_count_posts('restaurant')->publish + 1;
                    // Get the Shop Partial
                    directory_section_partial('shop', $count);
                endif;
                
                // Make sure there are posts for stay
                if( !empty ( $stay ) ) :
                    // Set <ol start> to the count of previous post type
                    $count = wp_count_posts('restaurant')->publish + wp_count_posts('shop')->publish + 1;
                    // Get the Shop Partial
                    directory_section_partial('stay', $count);
                endif;
                
                // Make sure there are posts for services
                if( !empty ( $service ) ) :
                    // Set <ol start> to the count of previous post type
                    $count = wp_count_posts('restaurant')->publish + wp_count_posts('shop')->publish + wp_count_posts('stay')->publish + 1;
                    // Get the Shop Partial
                    directory_section_partial('service', $count);
                endif;
                ?>
                
            </div>
        </div>

    
        <script type="text/javascript">
            jQuery(document).ready(function($){
                
                $(".directory_section .directory_list_item").hover(function() {
                    $(this).parent().addClass('list-active');
                }, function() {
                    $(this).parent().removeClass('list-active');
                })
                
               
                   $(".directory_section .directory_list_item").on('click', function(event) {
                       
                       event.stopPropagation();
                    
                        // Set up some variables
                        var idName = $(this).attr("id");
                        var spaceNumber = $(this).data("space-number");
                        var overlayName = 'overlay_' + idName;
                        var cpt = $(this).data("cpt"); 
                        
                    
                        // Add active state to list menu
                        $(".directory_section").find('.directory_list_item').parent().removeClass('list-active');
                        $(this).parent().toggleClass('list-active');
         
                        
                        
                       // Add & remove classes to highlight suite on map
                       $(".directory_map svg").find('.map-active').removeClass('map-active');
                       $(".directory_map svg").find('.shop').removeClass('shop');
                       $(".directory_map svg").find('.restaurant').removeClass('restaurant');
                       $(".directory_map svg").find('.stay').removeClass('stay');
                       $(".directory_map svg").find('.service').removeClass('service');
                        document.getElementById(spaceNumber).classList.add('map-active');
                        document.getElementById(spaceNumber).classList.add(cpt);
                        
                        // Show overlay for current active item
                        $(".map_overlays").find('.overlay-active').removeClass('overlay-active');
                        document.getElementById(overlayName).classList.add('overlay-active');
                        
    
                       
                    });
                
                
          
                    // Remove all the things when clicking anywhere but a list item.
                    $(document).click(function(event){
                        if (!$(event.target).hasClass('list-active')) {
                            $('.directory_section .directory_list_item').removeClass("list-active");
                            $('.map_overlays .overlay').removeClass("overlay-active");
                            $('.directory_map svg g').removeClass("map-active");
                        }
                    });
                      
                
                    
            });
            
        </script>
    </div>

<?php
}