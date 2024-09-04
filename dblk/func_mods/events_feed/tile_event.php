<?php function tile_event($featured){
    
    // Featured Event Check
    if ($featured) :
        $tile_class = 'featured_event_tile';
    else: 
        $tile_class = 'standard_event_tile';
    endif;
    
    // Generic Variables
    $post = get_the_ID();
    $title = get_the_title();
    $link = get_the_permalink();
    
    // Location & Categories, ETC
    $address = tribe_get_venue_details($post)['address'];
    $location = tribe_get_venue_details($post)["linked_name"];
    $categories = get_the_terms( $post, 'tribe_events_cat' );
 
    
    //Image
    $featured_image_id = get_post_thumbnail_id( $page->ID);
    $image_source = $featured_image_id;
    $alt_text = get_post_meta( $featured_image_id, '_wp_attachment_image_alt', true );
    
    // Date & Time
    $start_month = tribe_get_start_date($post, false, 'F, Y');
    $end_month = tribe_get_end_date($post, false, 'F, Y');
    $start_date = tribe_get_start_date($post, false, 'F j');
    
    // Check for all day event
    if ( tribe_event_is_all_day($post) ) :
        $start_time = 'All Day';
        $end_time = false;
    else :
        $start_time = tribe_get_start_time($post);
        $end_time = tribe_get_end_time($post);
    endif;
    
    // Check for multiday event and new month
    // If multiday & end month is a new month, show month plus day
    if ( tribe_event_is_multiday($post) && ($start_month == $end_month) ) :
        $end_date = tribe_get_end_date($post, false, ' j');
    // Else, if multiday & end month is a new month, show month plus day
    elseif (tribe_event_is_multiday($post) && ($start_month !== $end_month)): 
        $end_date = tribe_get_end_date($post, false, 'F j');
    // Otherwise we don't need an end date to show.
    else:
        $end_date = false;
    endif;
    
    
    				    
    
    ?>
    <div class="event_tile <?php echo $tile_class; ?>">
    <?php 
    // Add a clickable card if not featued
    if( $featured == false ) :
        echo "<a tabindex='-1' href='$link' class='accessible-card-link'><span class='show-for-sr'>View $title</span></a>";
    endif; ?>
    <?php if($image_source) : ?>
        <div class='image'>
             <?php echo dblk_get_responsive_image( $image_source, null, $alt_text, false ); ?>
        </div>
    <?php endif; ?>
    <div class="event_tile_inner">
        <?php if( $featured ) : ?>
            <span class="h5">Featured Event</span>
        <?php endif; ?>
        <div class="title">
            <h2><?php echo $title; ?></h2>
        </div>
        <div class="details">
            <p>
            <?php if ($location) : ?>
                <span class="location"><?php echo strip_tags($location); ?></span>
            <?php endif; ?>
            
            <?php if ($start_date || $end_date) : 
                echo $start_date ? "<span class='date'>$start_date </span>" : null;
                echo $end_date ? "<span class='sep'> – </span> <span class='date'>$end_date </span>" : null;
            endif; ?>
            <br/>
            <?php if ($start_time || $end_time) : 
                echo $start_time ? "<span class='time'>$start_time</span>" : null;
                echo $start_time && $end_time ? "<span class='sep'> – </span>" : null;
                echo $end_time ? "<span class='time'>$end_time</span>" : null;
            endif; ?>
            </p>
        </div>
        
        <?php if($categories) : ?>
            <div class='categories'>
                <?php
                    // Loop through each category
                    foreach ( $categories as $category ) {
                    // Get the custom field value for this category
                    $category_icon = get_field( 'category_icon', $category );
                    // organize the values into variables
                    $icon_src = $category_icon["url"];
                    $category_name = $category->name;
                        echo "<span class='cat h6'><img src='$icon_src' alt='$category_name' />$category_name</span>";
                    }
                  ?>
            </div>
         <?php endif; ?>
        
        <div class="bottom">
            <?php
            fm_button(
                button_text: "Learn More",
                button_color: 'primary',
                url: $link ,
            );
            ?>
        </div>
    </div>
    
   
    </div>
            

<?php
}