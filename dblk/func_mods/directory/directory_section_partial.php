<?php
function directory_section_partial(
    $post_type = null,
    $count,
    ){

        // Set up the post type object so we can grab the title and archive link
        $post_type_object   = get_post_type_object( $post_type );
        $post_type_singular = $post_type_object->labels->singular_name;
        $post_type_plural   = $post_type_object->labels->name;
        if($post_type_plural == "Eat And Drink") {
            $post_type_plural = "Eat & Drink";
            $post_type_url = "/eat-drink/";
        }
        if($post_type_plural == "Service") {
            $post_type_plural = "Services";
            $post_type_url = "/service/";
        }
        if($post_type_plural == "Stay") {
            $post_type_url = "/stay/";
        }
        if($post_type_plural == "Shop") {
            $post_type_url = "/shop/";
        }
        $post_type_slug     = $post_type_object->rewrite['slug'];
        $post_type_archive  = home_url($post_type_slug);
        
        
        echo "<div class='directory_section directory_section--$post_type'>";
        
            // Display the Post Type Title
            echo "<h2 class='directory_section_title h3'><a href='$post_type_url'>$post_type_plural</a></h2>";

             directory_loop_partial($post_type, $count);
        
            // Archive Button Link
            // fm_button(
            //     button_text: "More On $post_type_plural",
            //     button_color: "tertiary",
            //     url: $post_type_archive,
            // ); 
            
        echo "</div>";
            
}