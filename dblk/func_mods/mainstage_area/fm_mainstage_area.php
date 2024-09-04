<?
function fm_mainstage_area(
    $background_image = null,
    $background_video = null,
    $headline = null,
    $sub_headline = null,
    $sub_section_text = null
)
{
    
        $image_id = $background_image['ID'];
        $image_source = fly_get_attachment_image_src( $image_id, array( 1600, 900 ), true )['src'];
        $small_image_source = fly_get_attachment_image_src( $image_id, array( 800, 540 ), true )['src'];
        	    
    ?>
    
    <style>
        .mainstage-slides .slide {
            background-image:url('<?php echo $small_image_source; ?>');
        }
        
         @media screen and (min-width: 800px) {
           .mainstage-slides .slide {
                background-image:url('<?php echo $image_source; ?>');
            }
        }
    </style>
    
    <?php
        $rand_class = "mainstage_area_" . rand(1000,9999);
        echo "<div class='mainstage-slides slides $rand_class'>";
        	    echo "<div class='slide skip-lazy '>";
        	        if ( $background_video ) 
        	        {
        	            echo "<video class='show-for-medium skip-lazy' preload='metadata' loop='' autoplay='' muted='' webkit-plasinline='' poster='$image_source'>";
        	                echo "<source type='video/mp4' src='$background_video'>";
                        echo "</video>";
        	        }
        	        echo "<div class='row'>";
        	            echo "<div class='column small-12 medium-10 medium-offset-1'>";
        	                echo "<img src='/wp-content/themes/jr3/_images/ms_arrow.svg' class='ms_arrow' alt='discover dairy block' />";
            	            $sub_h1 = $sub_headline ? "<strong>$sub_headline</strong>" : "";
            	            echo $headline ? "<h1><span>$headline</span> $sub_h1</h1>" : "";
            	        echo "</div>";
        	        echo "</div>";
        	    echo "</div>";
        echo "</div>";
        if($sub_section_text) {
            echo "<div class='bottom_area bg_white'>";
                echo "<div class='row'>";
                    echo "<div class='columns small-12 medium-10 medium-offset-1'>";
                        echo "<span class='h2'>$sub_section_text</span>";
                    echo "</div>";
                echo "</div>";
            echo "</div>";
        }
}