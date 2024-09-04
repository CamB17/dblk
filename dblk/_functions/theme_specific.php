<?
// this is where we put custom functions for this specific build

add_theme_support('editor-color-palette', array(
    array(
        'name'  => 'Primary',
        'slug'  => 'primary',
        'color' => '#3381c6',
    ),
    array(
        'name'  => 'Secondary',
        'slug'  => 'secondary',
        'color' => '#8211eb',
    ),
));

add_filter( 'gform_submit_button_12', 'change_submit_button', 10, 2 );
add_filter( 'gform_submit_button_18', 'change_submit_button', 10, 2 );
function change_submit_button( $button, $form ) {
    $button = "<button class='fm_button primary gform_button' id='gform_submit_button_{$form['id']}'>Submit</button>";
    return $button;
}

function remove_bg_color_text($string) {
      $string = str_replace("bg_", "", $string);
      $string = str_replace("dark", "", $string);
      $string = str_replace("light", "", $string);
      $string = str_replace(" ", "", $string);
      return $string;
}

// remove header/footer from events template
add_filter( 'tribe_events_template_include_single', 'remove_events_calendar_header_footer', 99 );
function remove_events_calendar_header_footer( $template ) {
    remove_action( 'tribe_events_single_event_before_the_content', 'tribe_get_header', 10 );
    remove_action( 'tribe_events_single_event_after_the_content', 'tribe_get_footer', 10 );
    return $template;
}


/**
 * Add Theme Supports After Setup
 */
add_action( 'after_setup_theme', 'dblk_theme_support' );
function dblk_theme_support() {
    // Add support for excerpts on pages
    add_post_type_support( 'page', 'excerpt' );
}

function truncate_string_to_words($input, $num_words = 35, $ellipses = true) {
    $words = preg_split("/[\n\r\t ]+/", $input, $num_words + 1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_OFFSET_CAPTURE);
    if (count($words) > $num_words) {
        end($words);
        $last_word = prev($words);
        $input = substr($input, 0, $last_word[1] + strlen($last_word[0]));
        if ($ellipses) {
            $input .= '...';
        }
    }
    return $input;
}


/**
 * ALM - Results Count
 */
add_filter('alm_display_results', function(){
	return '{post_count} result(s):';
});

function get_first_sentence_of_content($post_id) {
    // Get post content by post ID
    $post = get_post($post_id);
    
    
    // Get content from Tastemaker blogs
    $blog_content = get_field('article', $post_id);
    
    // Ensure it's not empty
    if (empty($post->post_content) && empty($blog_content)) {
        return null;
    }
    // Strip out HTML tags
    $content_without_html = strip_tags($post->post_content);
    
    if(!$content_without_html) {
        $content_without_html = strip_tags($blog_content);
    }

    // Extract the first sentence
    // preg_match('/(.*?[.!?])\s/', $content_without_html, $matches);

    // if (isset($matches[1])) {
    //     return $matches[1];
    // }
    if($content_without_html) {
        return truncate_string_to_words($content_without_html);
    }
    
    return null; // return null or an empty string if no valid sentence was found
}

// add_filter( 'tribe_events_month_daily_events_query_args', 'modify_tribe_query' );
// function modify_tribe_query( $args ) {
//     unset( $args['tribe_events_month_sticky'] );
//     return $args;
// }

add_filter( 'default_post_metadata', 'set_sticky_field_default', 10, 3 );
function set_sticky_field_default( $value, $post_id, $meta_key ) {
    if ( 'tribe_events' === get_post_type( $post_id ) && '_tribe_events_month_sticky' === $meta_key ) {
        $value = 'on';
    }
    return $value;
}

add_action('rest_api_init', function () {
    register_rest_route('my-custom-plugin/v1', '/future-venues', array(
        'methods' => 'GET',
        'callback' => 'get_future_venues',
    ));
});

function get_future_venues() {
    $current_date = current_time('Ymd'); // Or use date('Ymd') depending on your WP settings

    // Query events based on end date
    $events = new WP_Query(array(
        'post_type' => 'tribe_events',
        'posts_per_page' => -1, // Retrieve all events
        'meta_query' => array(
            array(
                'key' => '_EventEndDate',
                'value' => $current_date,
                'compare' => '>=',
                'type' => 'DATE'
            ),
        ),
        'fields' => 'ids', // Only fetch IDs for performance
    ));

    $active_venues = array();

    if ($events->have_posts()) {
        foreach ($events->posts as $event_id) {
            $venue_id = get_post_meta($event_id, '_EventVenueID', true);
            if ($venue_id) {
                $venue_name = get_the_title($venue_id);
                $active_venues[$venue_id] = $venue_name;
            }
        }
    }
  
    return array_unique($active_venues);
}

// Remove 'Written by' from Rank Math's meta tags
add_filter('rank_math/frontend/show_author', '__return_false');

// Remove 'Time to read' from Rank Math's meta tags
add_filter('rank_math/frontend/show_read_time', '__return_false');

// hide the asterisk note, then add within the form
// add_filter( 'gform_required_legend', '__return_empty_string' );


/**
 * Preload Assets
 */
 add_action( 'wp_head', 'dblk_preload_assets');
 function dblk_preload_assets() {
     
    if (have_rows('page_builder')): 
        while(have_rows('page_builder')): the_row();
            if( get_row_layout() == 'subpage_header' ):
                // Image field
               $image = get_sub_field('image');
               if ($image) {
                   $image_id = $image['ID'];
               }
               else {
                   $image_id = get_field('default_page_image', 'options')['ID'];
               }
               $image_source = fly_get_attachment_image_src( $image_id, array( 1600, 610 ), true )['src'];
            else:
                $image_id = null;
            endif;
                   if ($image_id == true) :
                        //Preload code
                        echo '<link rel="preload" as="image"  href="' . $image_source . '">';
          	 endif;
   	    endwhile;
	endif;
     
 }