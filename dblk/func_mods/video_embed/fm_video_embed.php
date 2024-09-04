<? 
function fm_video_embed(
    $cover_image_array, 
    $embed_code
)
{
    $cover_image_id = $cover_image_array['ID'];
    $cover_image_alt = $cover_image_array['alt'];
    $cover_image_url = fly_get_attachment_image_src( $cover_image_id, array( 1300, 730 ), true )['src'];
    $id = "video_embed_" . rand(100000,1000000);
    
    
    echo "<div class='fm_video_embed'>";
        echo "<img src='$cover_image_url' alt='$cover_image_alt'>";
        echo "<div class='play_icon_hold' href='#$id'>";
            icon_play();
        echo "</div>";
    echo "</div>";
    echo "<div id='$id' class='white-popup mfp-hide'>";
        echo $embed_code;
    echo "</div>";
    
    ?>
    <script type="text/javascript">
    	jQuery(document).ready(function($){
    	    
    		$('.fm_video_embed .play_icon_hold').magnificPopup({
              type:'inline',
              midClick: true // Allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source in href.
            });

    	});
    </script>
    <?
}