
<?php
    
    // Generic Variables
    $post = get_the_ID();
    $title = get_the_title();
    $excerpt =  wp_trim_words( get_the_content(), 30, '...' );
    $link = get_the_permalink();
    
    // Location & Categories, ETC
    $address = tribe_get_venue_details($post)['address'];
    $location = tribe_get_venue_details($post)["linked_name"];
    $categories = get_the_terms( $post, 'tribe_events_cat' );
 
    
    // Image
    $featured_image_id = get_post_thumbnail_id( $post ); 
    $image_source = fly_get_attachment_image_src( $featured_image_id, array( 768, 600 ), true )['src'];
    $alt_text = get_post_meta( $featured_image_id, '_wp_attachment_image_alt', true );
    
    // Check for all day event
    if ( tribe_event_is_all_day($post) ) :
        $start_time = 'All Day';
        $end_time = false;
    else :
        $start_time = tribe_get_start_time($post);
        $end_time = tribe_get_end_time($post);
    endif;
    
    
    // Get classes for events (filtering)
    if($categories) :
        foreach ( $categories as $category ) :
            $cat_class = $category->slug;
        endforeach;
    endif;
    
    
    
    				    
    
    ?>
    <div class="row event_list_tile tribe_events_cat-<?php echo $cat_class; ?> cat_<?php echo $cat_class; ?>">
        <div class="time-location small-12 medium-3 large-3 columns">
            
            <p class="h5 time">
                <?php if ($start_time || $end_time) : 
                    echo $start_time ? "<span class='time'>$start_time</span>" : null;
                    echo $start_time && $end_time ? "<span class='sep'> – </span>" : null;
                    echo $end_time ? "<span class='time'>$end_time</span>" : null;
                endif; ?>
            </p>
            
            <?php if ($location) : ?>
                <p class="h5 location"><?php echo strip_tags($location); ?></p>
            <?php endif; ?>

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
        </div>
    <?php if($image_source) : ?>
        <div class='image small-12 medium-4 large-4 columns'>
            <img src="<?= $image_source ?>" alt="<?= $alt_text; ?>" />
        </div>
    <?php endif; ?>
    <div class="description small-12 medium-5 large-5 columns">
        <div class="title">
            <h2><?php echo $title; ?></h2>
            <?php if ($excerpt) : ?>
                <p><?php echo $excerpt; ?></p>
            <?php endif; ?>
        </div>
        <div class="details">
            
            <?php
                fm_button(
                    button_text: "View Details",
                    button_color: 'primary',
                    url: $link ,
                );
            ?>
        </div>
        
         

    </div>
    
   
    </div>
    