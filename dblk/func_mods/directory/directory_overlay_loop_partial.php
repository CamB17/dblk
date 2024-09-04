<?php
function directory_overlay_loop_partial(){
    
     // WP_Query arguments
            $args = array(
            	'post_type'         => array( 'restaurant', 'shop', 'service', 'stay'),
            	'post_status'       => array( 'publish' ),
            	'no_found_rows'     => true,
            	'posts_per_page'    => '300',
            	'order'             => 'ASC',
            	'orderby'           => 'title',
            );
            
            // The Query
            $query = new WP_Query( $args );
            
            // The Loop
            if ( $query->have_posts() ) :
                echo "<div class='map_overlays'>";
            	while ( $query->have_posts() ) :
            		$query->the_post();
            		
            		// Variables
            		$title = get_the_title();
            		$small_label = get_field('small_label');
            		$hide_from_directory_page = get_field('hide_from_directory_page');
            		if($small_label) {
            		    $small_label = "small_label";
            		}
            		$slug = sanitize_title_with_dashes($title);
            		if(get_post_type(get_the_ID()) == "restaurant") {
                		$link = get_the_permalink();
                		$target = "_self";
            		} else {
                		$link = gf('website');
                		$target = "_blank";
            		}
            		$space_number = gf('space_number');
            		$logo_url = gf('logo');
            		// Milk Market
            		if ($space_number == "space-1") :
            		    $top = "67%";
            		    $left = "0%";
            		    $arrow_position = "top-center";
            		// Huckleberry
            		elseif($space_number == "space-2") :
            		    $top = "35.2%";
            		    $left = "14%";
            		    $arrow_position = "left";
            		// Kachina Catnia
            		elseif ($space_number == "space-3") :
            		    $top = "10%";
            		    $left = "15%";
            		    $arrow_position = "left";
            		// Poka Lola
            		elseif ($space_number == "space-4") :
            		    $top = "33%";
            		    $left = "8%";
            		    $arrow_position = "top-center";
            		// LoDough Bakery
            		elseif ($space_number == "space-5") :
            		    $top = "21%";
            		    $left = "15%";
            		    $arrow_position = "top-center";
            		// Seven Grand
            		elseif($space_number == "space-6") :
            		    $top = "21%";
            		    $left = "35.75%";
            		    $arrow_position ="top-center";
            		// Blanchard
            		elseif($space_number == "space-7") :
            		    $top = "33.2%";
            		    $left = "31.5%";
            		    $arrow_position ="top-center";
            		 // Foraged
            		elseif($space_number == "space-8") :
            		    $top = "47%";
            		    $left = "35%";
            		    $arrow_position ="top-right";
            		 // Run for the Roses
            		elseif($space_number == "space-9") :
            		    $top = "64%";
            		    $left = "27%";
            		    $arrow_position ="bottom-center";
            		// Free Market
            		elseif($space_number == "space-10") :
            		    $top = "77%";
            		    $left = "40%";
            		    $arrow_position = "top-center";
            		 // Bruto
            		elseif($space_number == "space-11") :
            		    $top = "68.2%";
            		    $left = "29%";
            		    $arrow_position ="bottom-center";
            		// Wesbound & Down
            		elseif($space_number == "space-12") :
            		    $top = "72%";
            		    $left = "27.65%";
            		    $arrow_position = "top-center";
            		// Switchfoot
            		elseif($space_number == "space-13") :
            		    $top = "25.35%";
            		    $left = "30.65%";
            		    $arrow_position = "top-center";
            		// Deviation Distilling
            		elseif($space_number == "space-14") :
            		    $top = "64%";
            		    $left = "33%";
            		    $arrow_position = "top-center";
            		// Little Blue Ruby
            		elseif($space_number == "space-15") :
            		    $top = "35%";
            		    $left = "24%";
            		    $arrow_position = "left";
            		//  Grace Loves Lace
            		elseif($space_number == "space-16") :
            		    $top = "55%";
            		    $left = "18%";
            		    $arrow_position = "right";
            		// Blue Ruby
            		elseif($space_number == "space-17") :
            		    $top = "32%";
            		    $left = "30%";
            		    $arrow_position = "top-right";
            		// Sara O. Jewlery
            		elseif($space_number == "space-18") :
            		    $top = "48%";
            		    $left = "29.75%";
            		    $arrow_position = "top-center";
            		// Konbini
            		elseif($space_number == "space-19") :
            		    $top = "48%";
            		    $left = "39.75%";
            		    $arrow_position = "top-center";
            		//  Warby Parker
            		elseif($space_number == "space-20") :
            		    $top = "63%";
            		    $left = "23%";
            		    $arrow_position = "right";
            		// The Maven
            		elseif($space_number == "space-21") :
            		    $top = "34%";
            		    $left = "8%";
            		    $arrow_position = "top-left";
            		else :
            		    $top = "0";
            		    $left = "0";
            		    $arrow_position = "center";
            		endif;
            		
            		if(!$hide_from_directory_page) {
                		//echo "<foreignObject id='overlay2_$slug' class='overlay_hold' x='20' y='20' width='100%' height='100%'>";
                		    echo "<div id='overlay_$slug' class='overlay $slug arrow-$arrow_position' style='top: $top; left: $left;'>";
                		    echo "<a aria-hidden='true' tabindex='-1' href='$link' target='$target' class='accessible-card-link'><span class='sr-only'>Link to $title</span></a>";
                		    echo "<img src='$logo_url' alt='$title' />";
                		    echo "<div class='content'><span class='$small_label'>$title</span>";
                		   fm_button(
                                button_text: "Learn More <span class='sr-only'>About $title</span>",
                                button_color: "tertiary",
                                url: $link,
                            ); 
                		   echo "</div>";
                		echo "</div>";
            		}
            		//echo "</foreignObject>";
            	endwhile;
            	echo "</div>";
            endif;
            
            // Restore original Post Data
            wp_reset_postdata();
            
}