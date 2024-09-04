<? 
function fm_testimonials(
    $headline = null,
    // array of testimonial IDs
    array $testimonials
)
{
    $count = count($testimonials);
    $id = "testimonials_" . rand(100000, 10000000);
    
    
    if ( $headline ) {
        echo "<div class='row'>";
            echo "<div class='column small-12'>";
                echo "<h2>$headline</h2>";
            echo "</div>";
        echo "</div>";
    }

    
     
    if ( good_array($testimonials) )
    {
        echo "<div class='row'>";
            echo "<div class='columns small-12'>";
                echo "<div class='testimonials_hold' id='$id'>";

                    foreach ( $testimonials as $testimonial_id )
                    {
                        $name = get_the_title($testimonial_id);
                        $quote = gf('quote', $testimonial_id);
                        $tagline = gf('tagline', $testimonial_id);
                        $photo = gf('photo', $testimonial_id);
                        $photo_alt = $photo['alt'];
                        $photo_url = $photo['sizes']['medium'];
                        
                        echo "<div class='testimonial'>";
                            if ( $photo )
                            {
                                echo "<div class='photo'>";
                                    echo "<img src='$photo_url' alt='$photo_alt'>";
                                echo "</div>";
                            }
                            echo "<div class='content'>";
                                echo "<div class='quote_hold'>";
                                    echo $quote;
                                echo "</div>";
                                echo "<div class='meta_hold'>";
                                    echo "<p><strong>$name</strong><br>$tagline</p>";
                                echo "</div>";
                            echo "</div>";
        
                        echo "</div>";
                    }
                echo "</div>";
            echo "</div>";
        echo "</div>";
        
        if ( $count > 1 ) {
            ?>
            <script type="text/javascript">
                jQuery(document).ready(function($){
                    $('#<?= $id; ?>').slick({
                        prevArrow:"<img class='slick-prev slick-arrow' src='<?php echo get_template_directory_uri(); ?>/_images/icon_arrow_left.svg'>",
                        nextArrow:"<img class='slick-next slick-arrow' src='<?php echo get_template_directory_uri(); ?>/_images/icon_arrow_right.svg'>",
                        autoplay:true,
                        autoplaySpeed:3000,
                        dots:false
                    });
                });
            </script>
            <?
        }
    }
    
}