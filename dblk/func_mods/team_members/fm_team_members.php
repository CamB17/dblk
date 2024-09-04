<? 
function fm_team_members(
    string $headline = null,
    string $description = null,
    array $button = array(),
) 
{
    if ( $headline || $description || $button ) {
        
        echo "<div class='row intro'>";
            if ( $headline || $description ) {
                
                echo "<div class='column small-12 medium-8 large-9'>";
                    echo $headline ? "<h2>$headline</h2>" : null;
                    echo $description;
                echo "</div>";
            }
            if ( $button ) {
                
                echo "<div class='column small-12 medium-4 large-3 button_hold'>";
                    fm_button(...$button);
                echo "</div>";
            }
            
        echo "</div>";
    }
    
    $queryArray = array(
        'post_type' => 'team_member',
        'posts_per_page' => -1
    );
   
    
    $loop = new WP_Query( $queryArray ); 
    
    if ( $loop->have_posts() ) :
        
        echo "<div class='row team_members'>";
            
            while ( $loop->have_posts() ) : $loop->the_post();
            
                $name = get_the_title();
                $title = gf('title');
                $headshot_id = gf('headshot')['id'];
                $headshot_url = fly_get_attachment_image_src( $headshot_id, array( 400, 480 ), true )['src'];
                $permalink = get_the_permalink();
                
                $bio = gf('bio');
                
                echo "<div class='column small-12 medium-4 team_member'>";
                    echo "<div class='team_member_hold clickable_box' data-link_selector='.fm_button'>";
                        echo $headshot_url ? "<img src='$headshot_url' alt='photo of $name'>" : null;
                        echo $name ? "<h3>$name</h3>" : null;
                        echo $title ? "<p>$title</p>" : null;
                        fm_button(
                            button_text: "View Bio",
                            button_color: 'primary',
                            url: $permalink,
                            extra_classes: "clickable"
                        );
                    echo "</div>";
                echo "</div>";
            endwhile; 
        echo "</div>";
    endif;
    
    wp_reset_postdata(); 
    
    
}