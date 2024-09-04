<?php
function directory_loop_partial(
    $post_type = null,
    $count,
    ){
    
    // WP_Query arguments
            $args = array(
            	'post_type'         => array( $post_type ),
            	'post_status'       => array( 'publish' ),
            	'no_found_rows'     => true,
            	'posts_per_page'    => '100',
            	'order'             => 'ASC',
            	'orderby'           => 'name',
            );
            
            // The Query
            $query = new WP_Query( $args );
            
            // The Loop
            if ( $query->have_posts() ) :
                echo "<ol start='$count'>";
            	while ( $query->have_posts() ) :
            		$query->the_post();
            		
            		// Variables
            		$title = get_the_title();
            		$hide_from_directory_page = get_field('hide_from_directory_page');
            		$slug = sanitize_title_with_dashes($title);
            		if($post_type == "restaurant") {
                		$link = get_the_permalink();
                		$target = "_self";
            		} else {
                		$link = gf('website');
                		$target = "_blank";
            		}
            		if(!$hide_from_directory_page) {
                		$space_number = gf('space_number');
                		
                		echo "<li class='link-to-post'><a href='$link' class='directory_list_item' target='$target'><span>$title</span></a></li>";
                		
                		echo "<li class='link-to-map'><button type='button' id='$slug' data-space-number='$space_number' data-cpt='$post_type' class='directory_list_item'><span>$title</span></button> <a href='$link'><span class='sr-only'>View $title page</span></li>";
            		}
            		
            	endwhile;
            	echo "</ol>";
            endif;
            
            // Restore original Post Data
            wp_reset_postdata();
            
}