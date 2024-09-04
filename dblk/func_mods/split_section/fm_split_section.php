<? function fm_split_section(
    $title = null,
    // wysiwyg
    $content = null,
    /*
    Array
    (
        [0] => Array
            (
                [button] => Array
                    (
                        [button_text] => Button Text
                        [button_color] => secondary
                        [open_in_a_new_tab] => 
                        [url_type] => WordPress Content
                        [wordpress_content] => 412
                        [url] => #
                    )
            )
        ), etc
    )
    */
    $buttons = null,
    $background_color,
    // wp image array
    $background_image = null,
    $contain_image = false,
    // "image_left_content_right" or "image_right_content_left"
    $layout = "image_left_content_right",
    $add_video_popup = false,
    $video_embed_code = null,
    // stretched or contained
    $width = "stretched",
    // vertical alignment
    $image_alignment = "center",
    // crop_landscape or natural
    $image_ratio = "crop_landscape"
    
    ) {
    
    $image_alt = $background_image["alt"];
    $width = 'stretched';
    $image_id = $background_image["ID"];
    $image_source = fly_get_attachment_image_src( $image_id, array( 1200, 800 ), true )['src'];
    $image_ratio = null;
    
    if ( $layout == "image_right_content_left" ) :
        $row_class .= " content_first";
    endif;
        $row_class .= " ";
        $row_class .=  $background_color; 

    if ( $add_video_popup && $video_embed_code ) :
        $rand = rand(100000,9999999);
        $row_class .= " video";
        $video_trigger_class = "trigger-video-popup";
        $popup_id = "split-video-" . $rand;
        $popup_href = 'href="#' . $popup_id . '"';
    endif;
    
    
    ?>
    
    <div class="row<?= $row_class; ?> <?= $width; ?>">
    
    
        <div class="columns small-12 medium-6 align_<?= $image_alignment; ?> hold_image <?= $video_trigger_class; ?> <?= $image_ratio; ?>" <?= $popup_href; ?>>
            <img class="<?= $contain_image ? 'contain_image' : '' ?> <?= $layout; ?>" src="<?= $image_source; ?>" alt="<?= $image_alt; ?>">
            
            <?= $add_video_popup ? "<div class='play_video'></div>" : null; ?>

        </div>
        <div class="columns small-12 medium-6 hold_content">
            <div class="content">
                <?= $title ? "<h2>$title</h2>" : null; ?>
                <?= $content; ?>
                <? if ( is_array($buttons) ) {
                    echo "<div class='button_hold'>";
                        foreach ( $buttons as $button ) {
                            fm_button(...$button['button']);
                        }
                    echo "</div>";
                }
                ?>

            </div>
        </div>
    </div>
    
    <? if ( $add_video_popup && $video_embed_code ) : ?>
    
        <div id="<?= $popup_id; ?>" class="white-popup mfp-hide">
            <?= $video_embed_code; ?>
        </div>
        <script type="text/javascript">
        	jQuery(document).ready(function($){
        		
        		$('.<?= $video_trigger_class; ?>').magnificPopup({
                  type:'inline',
                  midClick: true // Allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source in href.
                });
        
        	});
        </script>
    
    <? endif; ?>
<? }