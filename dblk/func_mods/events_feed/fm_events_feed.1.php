<?php function fm_events_feed_no_slider(
$title,
$events_feed = true,
$featured_event = true,
){ 
    

// Check if there is a title to show intro section
if ($title) : ?>
    <div class="event_intro bg_dark bg_rust blob_callout">
        <div class="row align-middle">
            <div class="columns small-12 medium-8 large-9">
                <h2><?php echo $title; ?></h2>
            </div>
            <div class="columns small-12 medium-8 large-3">
                <?php
                    fm_button(
                        button_text: "View All Events",
                        button_color: 'secondary',
                        url: $link ,
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
            'posts_per_page'    => 4,
            'order'             => 'ASC',
        );
        
        // The Query
        $query = new WP_Query( $args );
        
        // The Loop
        if ( $query->have_posts() ) :
            echo "<div class='events_tile_hold' id='$id'>";
            
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
        		    
        		    //Group events by day of the week (not multiday events, though)
        		    if ( ( $date_empty != $date_start ) && !tribe_event_is_multiday() ) :
                       
                       // Don't show the day tile for "today"
                       if ($now !== $date_start) :
                           
                            // Get day tile
            		        tile_day($day, $date_month, $date_day);
            		        
            		      endif;
        		        
        		        //set date_empty to match date_start
                        $date_empty = $date_start;
                    
                    
                    // Handle multiday events by hiding the day tile if it's currently happening
                    elseif ( ($now <= $date_start) && tribe_event_is_multiday()) :
            		      
                        // Get day tile 
                        tile_day($day, $date_month, $date_day);
                    
                    // End multiday things     
                    endif;
                        
                    // Get event tile
                	tile_event($featured = false);
        		 
        	       //end check for upcoming events
        		 endif;
        		 
        	endwhile;
        	
        	// Get end tile (probably will remove this)
            //tile_end();
            echo "</div>";
        endif;
        
        // Restore original Post Data
        wp_reset_postdata();
            
        ?>
        
        <script type="text/javascript">
            
             jQuery(document).ready(function($){
            mobileStatsSlider("#<?= $id; ?>", 1024);

            function mobileStatsSlider($slidername, $breakpoint) {
                var slider = $($slidername);
                var settings = {
                    mobileFirst: true,
                    dots: false,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    variableWidth: false,
                    prevArrow:"<img class='slick-prev slick-arrow slick-disabled' src='<?php echo get_template_directory_uri(); ?>/_images/icon_arrow_left.svg'>",
                    nextArrow:"<img class='slick-next slick-arrow' src='<?php echo get_template_directory_uri(); ?>/_images/icon_arrow_right.svg'>",
                    responsive: [
                        {
                        breakpoint: 800,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                          }
                          },
                          {
                            breakpoint: $breakpoint,
                            settings: "unslick"
                          }
                        ]
                      };
                    
                    slider.slick(settings);
                    
                    $(window).on("resize", function () {
                        if ($(window).width() > $breakpoint) {
                          return;
                        }
                        if (!slider.hasClass("slick-initialized")) {
                          return slider.slick(settings);
                        }
                  });
                }
                
                });
        </script>
    
<?php
    echo "</div>";
// End Events Feed check
endif; 

}