<? 
    dblk_add_slick();
    get_template_part( 'global/header/header' ); 
    $images = gf('gallery');
    $logo = gf('logo');
    $title = get_the_title();
    $short_description = gf('short_description');
    $description = gf('long_description');
    $display_address = gf('display_address');
    $display_label = gf('display_label');
    $phone_number = gf('phone_number');
    $facebook = gf('facebook');
    $instagram = gf('instagram');
    $email = gf('email');
    $website = gf('website');
    $venue_id = gf('associated_venue');
    $tenant_feed_classes = 'module';
?>
<div class='restaurant-single'>
     <div class="row expanded slider_intro">
        <? if( $images ): ?>
            <div class='small-12 medium-7 columns'>
                <div class="gallery">
                    <? foreach( $images as $image ): ?>
                        <div class="image" style="background-image:url('<? echo $image['sizes']['large']; ?>');"> </div>
                    <? endforeach; ?>
                </div>
                <img src="<?= get_template_directory_uri(); ?>/_images/blobs/blob-eat-drink.svg" alt='' class='blob' role='presentation' />
            </div>
        <? endif; ?>
        <div class="intro small-12 medium-5 columns">
            <img src="<?= $logo; ?>" alt="<?= $title; ?>" />
            <span class='h5'><a href="/eat-drink/">Eat + Drink <span class="sr-only">Directory</span></a></span>
            <h1 class='h2'><?= $title; ?></h1>
            <?= $short_description; ?>
            <? if($website) : ?>
                <a class="fm_button secondary" target="_blank" href="<?= $website; ?>">View Website</a>
            <? endif; ?>
        </div>
    </div>
     <div class="row hours_info">
        <div class="info small-12 medium-3 columns">
            <? if($display_address) : ?>
                <div>
                    <h4>Address</h4>
                    <strong><?= $display_label; ?></strong>
                    <span><?= $display_address; ?></span>
                </div>
            <? endif; ?>
            <? if($phone_number || $email) : ?>
                <div>
                    <h4>Contact</h4>
                    <? if($phone_number) : ?>
                        <a href="tel:<?= $phone_number; ?>"><?= $phone_number; ?></a>
                    <? endif; ?>
                    <? if($email) : ?>
                        <a href="mailto:<?= $email; ?>"><?= $email; ?></a>
                    <? endif; ?>
                </div>
            <? endif; ?>
            <? if($facebook || $instagram) : ?>
                <div class='social'>
                    <h4>Social</h4>
                    <? if($facebook) : ?>
                        <a target="_blank" href="<?= $facebook; ?>"><img src="<?= get_template_directory_uri(); ?>/_images/icon_facebook.svg" alt="Facebook" /></a>
                    <? endif; ?>
                    <? if($instagram) : ?>
                        <a target="_blank" href="<?= $instagram; ?>"><img src="<?= get_template_directory_uri(); ?>/_images/icon_instagram_handle.svg" alt="Instagram" /></a>
                    <? endif; ?>
                </div>
            <? endif; ?>
        </div>
        <div class="info small-12 medium-3 columns">
            <? if (have_rows('hours')): ?>
                <div>
                    <h4>Hours</h4>
                	<? while(have_rows('hours')): the_row();
                	    $days = get_sub_field('days');
                	    $hours = get_sub_field('hours');
                	?>
                        <strong><?= $days; ?></strong>
                        <span class='hours'><?= $hours; ?></span>
                	<? endwhile; ?>
                </div>
            <? endif; ?>
        </div>
        <div class="description small-12 medium-6 columns">
            <?= $description; ?>
        </div>
    </div>
    
    <?php 
    if ( $venue_id ) :
        fm_tenant_event_feed( $title, $venue_id, $tenant_feed_classes );
    endif;
    ?>
    
    <div class="back-to-all">
        <div class="row">
             <div class="button small-12 columns">
                <a class="fm_button primary" href="/eat-drink/">Back to all Eat + Drink</a>
            </div>
        </div>
    </div>
    
</div>

<script>
    jQuery(document).ready(function($){
        $('.gallery').slick({
            arrows: true,
            // autoplay: true,
            // autoplaySpeed: 4000,
            pauseOnHover: true,
            dots: true,
            prevArrow: "<img alt='Previous' class='slick-prev slick-arrow' src='<?= get_template_directory_uri(); ?>/_images/button-arrow_white.svg'>",
            nextArrow: "<img alt='Next' class='slick-next slick-arrow' src='<?= get_template_directory_uri(); ?>/_images/button-arrow_white.svg'>",
        });
    });
</script>
<? get_template_part( 'global/footer/footer' ); 