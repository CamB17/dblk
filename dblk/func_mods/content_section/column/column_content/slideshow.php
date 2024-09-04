<?php 

$images = get_sub_field('photos');
$rand = rand(10000, 100000);

if( $images ): ?>

        <div class="slideshow" id="slideshow-<?= $rand; ?>">
            <?php foreach( $images as $image ): 
                $image_id = $image['ID'];
                $image_source = fly_get_attachment_image_src( $image_id, array( 1300, 680 ), true )['src'];
            ?>
                <div class="slide">
                    <div class="slide_hold">
                        <img src="<?= $image_source; ?>" alt="<?= $image['alt']; ?>" />
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

<?php endif; ?>

<script type="text/javascript">
    jQuery(document).ready(function($){

        $('#slideshow-<?= $rand; ?>').each(function() {
           $(this).slick({
                arrows:true,
                autoplay:false,
                centerMode: false,
                slidesToShow: 1,
                fade: true,
                variableWidth: false,
                dots:false,
                prevArrow:"<img class='slick-prev slick-arrow' src='<?php echo get_template_directory_uri(); ?>/_images/icon_arrow_left.svg'>",
                nextArrow:"<img class='slick-next slick-arrow' src='<?php echo get_template_directory_uri(); ?>/_images/icon_arrow_right.svg'>",
            }); 
        });

    });
</script>