<?php
// Get the current date/time so we know what events to grab   
$now = current_datetime()->format('Y-m-d');
$current_month = current_datetime()->format('m');
        
// Set empty date for grouping events by day
$date_empty = '';
        
// WP_Query arguments
$args = array(
    'post_type'         => 'tribe_events',
    'post_status'       => 'publish',
    'posts_per_page'    => 50,
    'meta_key'          => '_EventStartDate',
    'orderby'           => '_EventStartDate',
    'order'             => 'ASC',
    'meta_query'        => array(
        array(
            'key'       => '_EventStartDate',
            'value'     => $now,
            'compare'   => '>=',
            'type'      => 'DATE'
        )
    )
);
        
// The Query
$query = new WP_Query( $args );
        
// The Loop
if ( $query->have_posts() ) :
    while ( $query->have_posts() ) : $query->the_post();

        // Start & End date(s)
        $date_start = tribe_get_start_date($post, true, 'Y-m-d');
        $date_start_month = tribe_get_start_date($post, true, 'm');
    	$date_start_seconds = tribe_get_start_date($post, true, 'Y-m-d H:i:s');
        $date_end = tribe_get_end_date($post, true, 'Y-m-d');
        $date_end_seconds = tribe_get_end_date($post, true, 'Y-m-d H:i:s');
        		
        		
        // Only show events that are today or upcoming
        // if ( ($now <= $date_end) && ($current_month == $date_start_month) ) :
        if ($now <= $date_end) :
        		    
            // Group events by day of the week (not multiday events, though)
        	if ( ( $date_empty != $date_start ) && !tribe_event_is_multiday() ) :
                       
                // Get day tile
            	get_template_part('tribe/dblk_event_list/event_list_date');
            		
        		//set date_empty to match date_start
                $date_empty = $date_start;
                    
                    
            // Else if Multiday event
            elseif ( tribe_event_is_multiday()) :
            		      
                // Get day tile 
                get_template_part('tribe/dblk_event_list/event_list_date');
                    
            // End multiday things     
            endif;

            // Get event tile
            get_template_part('tribe/dblk_event_list/event_list_tile');
        		 
        	//End check for upcoming events
        	endif;
    
    //Endwhile 		 
    endwhile;

// End Loop
endif;
        
// Restore original Post Data
wp_reset_postdata();
        
?>