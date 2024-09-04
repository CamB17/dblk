<?php function fm_events_feed(
$title,
$events_feed = true,
$featured_event = true,
){ 
    

// Check if there is a title to show intro section
if ($title) : ?>
    <div class="event_intro bg_dark bg_teal blob_callout">
        <div class="row align-middle">
            <div class="columns small-12 medium-9">
                <span class='h1'><?= $title; ?></span>
            </div>
            <div class="columns small-12 medium-3">
                <?php
                    fm_button(
                        button_text: "View All Events",
                        button_color: 'secondary',
                        url: '/events/' ,
                    );
                ?>
            </div>
        </div>
    </div>
<?php
endif;


// Check if Featured Event is set to display
if ($featured_event) :
    echo "<div class='featured_events'>";
        // For post ID
        global $post;
        // Tribe Get Events Query
        $featured = tribe_get_events( [
            'start_date'    => 'today',
            'posts_per_page'=> 1,
            'featured'      => true,
        ] );
        // Foreach Loop
        foreach ( $featured as $post ) :
                // Get event tile
                tile_event($featured = true);
        endforeach;
    echo "</div>";
// End Featured Event check
endif;



// Check if Events Feed is set to display
if ($events_feed) :
    echo "<div class='events_feed'>";
    
        // Set a random id for the sider
        $id = "event_feed_" . rand(100000, 10000000);
        
        // Get the current date/time so we know what events to grab   
        $now = current_datetime()->format('Y-m-d');
        
        // Set empty date for grouping events by day
        $empty_date = '';
        
        // WP_Query arguments
        $args = array(
            'post_type'         => 'tribe_events',
            'post_status'       =>'publish',
            'posts_per_page'    => 8,
            'order'             => 'ASC',
        );
        
        // The Query
        $query = new WP_Query( $args );
        
                $total_count =  $query->found_posts;
        // 		echo $total_count;
        
        // The Loop
        if ( $query->have_posts() ) :
            echo "<div class='events_tile_hold' id='$id'>";
            $last_displayed_date = null; // Keep track of the last day tile displayed
            
            while ( $query->have_posts() ) :
                $query->the_post();
            
                // Start & End date(s)
                $date_start = tribe_get_start_date($post, true, 'Y-m-d');
                $date_start_seconds = tribe_get_start_date($post, true, 'Y-m-d H:i:s');
                $date_end = tribe_get_end_date($post, true, 'Y-m-d');
                $date_end_seconds = tribe_get_end_date($post, true, 'Y-m-d H:i:s');
                
                // Day Tile Variables
                $day = tribe_get_start_date($post, false, 'l');
                $date_month = tribe_get_start_date($post, false, 'M');
                $date_day = tribe_get_start_date($post, false, 'd');
            
                // Only show events that are today or upcoming
                if ( $now <= $date_end ) :
                    
                    if ($date_start !== $last_displayed_date) {
                        // The current event's date is different from the last displayed date, so show the day tile
                        
                        // Close previous div if a day was previously displayed
                        if ($last_displayed_date) {
                            echo '</div>';
                        }

                        // Start a new div for the new day and its events
                        echo '<div class="slide">';
                        
                        // Handle single day events
                        if (!tribe_event_is_multiday()) :
                            if ( $now !== $date_start_seconds ) :
                                // Get day tile only if not today
                                tile_day($day, $date_month, $date_day);
                            endif;
            
                        // Handle multiday events
                        elseif ( ($now <= $date_start) && tribe_event_is_multiday()) :
                            // Get day tile for the start of multiday events
                            tile_day($day, $date_month, $date_day);
                        endif;
            
                        // Update the last displayed date to the current event's date
                        $last_displayed_date = $date_start;
                    }
            
                    // Get event tile
                    tile_event($featured = false);
                    
                endif;
                
            endwhile;
            
            // Close the div if there were any events
            if ($last_displayed_date) {
                echo '</div>';
            }
        	
        	// Get end tile (probably will remove this)
            tile_end();
        	echo "</div>";
        
        ?>
        
        
        <script type="text/javascript">
            jQuery(document).ready(function($){
                do_slick();
                
            });
            jQuery(window).on('resize', function() {
                do_slick();
                
            });
            function do_slick() {
                if (!window.matchMedia("(max-width: 1024px)").matches) {
                    jQuery('#<?= $id; ?>').slick({
                        prevArrow:"<button type='button' class='slick-prev slick-arrow slick-disabled'><img src='<?php echo get_template_directory_uri(); ?>/_images/icon_arrow_left.svg' alt='Arrow Button to navigate the slider backwards' /><span class='sr-only'>navigate to previous slide</span></button>",
                        nextArrow:"<button type='button' class='slick-next slick-arrow'><img src='<?php echo get_template_directory_uri(); ?>/_images/icon_arrow_right.svg' alt='Arrow Button to navigate the slider forwards' /><span class='sr-only'>navigate to next slide</span></button>",
                        autoplay:false,
                        dots:false,
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: false,
                        variableWidth: true,
                        rows: 0 // Fix vor v1.8.0
                    });
                } else {
                    if(jQuery('#<?= $id; ?>').hasClass('slick-initialized')) {
                        jQuery('#<?= $id; ?>').slick('unslick'); 
                    };
                }
            }
        </script>
        
        <?php
        endif;
        
        // Restore original Post Data
        wp_reset_postdata();
            
        ?>
        
    
<?php
    echo "</div>";
// End Events Feed check
endif; 

}