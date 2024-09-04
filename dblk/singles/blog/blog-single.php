<?php get_template_part( 'global/header/header' ); 
$archive_link = dblk_get_archive_url_by_post_type_key('blog');
$grid_headline = get_field('grid_section_headline');
?>
<section class='tastemaker_banner'>
     <div class="blog-banner row align-middle">
         <div class="columns">
             <span class='h5 marigold'>Tastemaker</span>
             <h1><span><? the_title(); ?></span></h1>
         </div>
     </div>
</section>
<div class="row blog-navigation">
    <div class="small-6 columns">
        <? if($archive_link) : ?>
            <a href="<?= $archive_link; ?>" class='fm_button secondary back'>Archive</a>
        <? endif; ?>
    </div>
    <div class="small-6 columns pre_next_links">
        <? if (strlen(get_previous_post()->post_title) > 0) : 
            $permalink = get_the_permalink(get_previous_post()->ID); ?>
            <a class='fm_button tertiary back' href="<?= $permalink; ?>">Last Month</a>
        <? endif; ?>
        
        <? if (strlen(get_next_post()->post_title) > 0) :
            $permalink = get_the_permalink(get_next_post()->ID); ?>
            <a class='fm_button tertiary' href="<?= $permalink; ?>">Next Month</a>
        <? endif; ?>
    </div>
</div>

<div class="top-article-section">
    <div class="row">
        
        <div class="gallery small-12 medium-6 columns">
          <? if (get_field('images')): ?>
        	<? while(has_sub_field('images')): 
        	        $image = get_sub_field('single_image');
        	        $image_source = fly_get_attachment_image_src( $image["ID"], array( 510, 340 ), true )['src'];
        	    ?>
        	    <div class="large-image">
        	        <img src="<?= $image_source; ?>" alt="<?= $image["alt"]; ?>" />
        	    </div>
        	<? endwhile; ?>
        <? endif; ?>

        </div>
        <?
            $main_article_subheadline = get_field('subheadline_override');
        ?>
        <div class="info small-12 medium-6 columns">
            <div class="hold-me">
                <? if ($main_article_subheadline) : ?>
                    <span class="h5"><?= $main_article_subheadline; ?></span>
                <? else: ?>
                    <span class="h5">Currently</span>
                <? endif; ?>
                <h2><?= get_field('article_headline'); ?></h2>
                <?= get_field('article'); ?>
                <?
                // var
                        $btn = get_field( 'article_button' );
                        if(is_array($btn)) {
                            $btn_label  = $btn['title'];
                            $btnn_url    = $btn['url'];
                            $btn_target = $btn['target'];
                        }
                        
                    ?>
                <?php if ($btnn_url): ?>
					<a class="fm_button primary" href="<?=$btnn_url; ?>" target="<?= $btn_target; ?>"><?= $btn_label; ?></a>
		        <?php endif; ?>
            </div>
        </div> 
    </div>

</div>
<?
    $hide = get_field('hide_section');
?>
<? if ( !$hide ) : ?>
    <div class="gallery-grid">
        <img class='blob' src="<?= get_template_directory_uri(); ?>/_images/blobs/blob_tastemaker_grid.svg" alt="" role="presentation" />
        <div class="row headline-container">
            <div class="columns small-12 grid-headline">
                <span class='h1'><?= get_field('image_headline'); ?></span>
                <? if(get_field('right_headline')) : ?>
                    <span class='h3'><?= get_field('right_headline'); ?></span>
                <? endif; ?>
            </div>
        </div>
        
        <?
        $images = get_field('photos');
        if( $images ): ?>
            <div class="row photo-grid">
                <div class='columns small-12 blog_slider'>
                    <?php foreach( $images as $image ): 
                        $image_source = fly_get_attachment_image_src( $image["ID"], array( 600, 800 ), true )['src'];
                    ?>
                        <img src="<?= $image_source; ?>" alt="<?= $image['alt']; ?>" />
                    <?php endforeach; ?>
                </div>
            </div>
            <? if(count(get_field('photos')) > 1) : ?>
                <script type="text/javascript">
                    jQuery(document).ready(function($){
                        $('.blog_slider').slick({
                            prevArrow: "<img alt='previous arrow' class='slick-prev slick-arrow' src='<?= get_template_directory_uri(); ?>/_images/icon_button_arrow_white.svg'>",
                            nextArrow: "<img alt='next arrow' class='slick-next slick-arrow' src='<?= get_template_directory_uri(); ?>/_images/icon_button_arrow_white.svg'>",
                            autoplay: false,
                            slidesToShow: 4,
                            slidesToScroll: 1,
                            responsive: [
                            {
                              breakpoint: 1024,
                              settings: {
                                slidesToShow: 3,
                                slidesToScroll: 3,
                              }
                            },
                            {
                              breakpoint: 640,
                              settings: {
                                slidesToShow: 2,
                                slidesToScroll: 2
                              }
                            },
                            {
                              breakpoint: 400,
                              settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1
                              }
                            }
                          ]
                        });
                    });
                </script>
            <? endif; ?>
        <? endif; ?>
    </div>
<? endif; ?>
<?
    $faces_headline = get_field('faces_headline');
    $hide = get_field('hide_tenant_section');
?>
<? if ( !$hide ) :?>
    <div class="split-section">
        <img src="<?= get_template_directory_uri(); ?>/_images/blobs/blob_tastemaker_highlight.svg" class='blob' alt='' role="presentation" />
        <div class="row expanded">
            <div class="small-12 large-6 columns tenant-wrapper">
                <div class="hold-me slider-section">
                    <? if( $faces_headline ): ?>
                        <span class='h3'><?= $faces_headline; ?></span>
                    <? else: ?>
                        <span class='h3'>FACES OF THE BLOCK</span>
                    <? endif; ?>
                    
                    <? if (get_field('tenant')) : ?>
                    <div class="row tenant-slider">
                        <? while(has_sub_field('tenant')):
                            $headshot = get_sub_field('headshot');
                            $image_source = fly_get_attachment_image_src( $headshot["ID"], array( 550, 350 ), true )['src'];
                            $biz = get_sub_field('business_name');
                            $ig = get_sub_field('instagram_handle');
                            $ig_link = get_sub_field('instagram_link');
                            $quote = get_sub_field('quote');
                            $owner = get_sub_field('owner_name');
                            
                            $btn_tenant = get_sub_field( 'faces_button' );
                            if(is_array($btn_tenant)) {
                                $btn_label  = $btn_tenant['title'];
                                $btn_url    = $btn_tenant['url'];
                                $btn_target = $btn_tenant['target'];
                            }
                        ?>
                        
                            <div class="hold-me">
                                <div class="headshot">
                                    <img src="<?= $image_source; ?>" alt="<?= $headshot["alt"]; ?>" />
                                </div>
                                <div class="info">
                                    <h4 class='marigold'><?= $owner; ?></h4>
                                    <? if($ig_link) : ?>
                                        <a class="h5" href="<?= $ig_link; ?>" target="_blank"><?= $ig; ?></a>
                                    <? endif; ?>
                                    <? if($biz) : ?>
                                        <strong><?= $biz; ?></strong>
                                    <? endif; ?>
                                    <div class="info-text">
                                        <p> <?= $quote; ?> </p>
                                    </div>
                                    <? if ( $btn_tenant ): ?>
                						<a class="fm_button primary" href="<?= $btn_url; ?>" target="<?= $btn_target; ?>"><?= $btn_label; ?></a>
                    		        <? endif; ?>
                                </div>
                                
                            </div>
                            
                       
                        <? endwhile; ?>
                         </div>
                    <? endif; ?>
                    
                </div>
                
            </div>
             <?
                $ad_image = get_field('ad_image');
                $image_source = fly_get_attachment_image_src( $ad_image["ID"], array( 725, 710 ), true )['src'];
                $ad_link = get_field('ad_link');
                if(is_array($ad_link)) {
                    $ad_label  = $ad_link['title'];
                    $ad_url    = $ad_link['url'];
                    $ad_target = $ad_link['target'];
                }
            ?>
            <div class="columns small-12 large-6 image">
                <img src="<?= $image_source; ?>" class='top_image' alt='<?= $ad_image['alt']; ?>' />
                <div class='content bg_burnt_orange'>
                    <span class='h1'><?= get_field('ad_headline'); ?></span>
                    <p><?= get_field('ad_summary'); ?></p>
                    <? if ( $ad_link ): ?>
                        <a class="fm_button primary" href="<?= $ad_url; ?>" target="<?= $ad_target; ?>"><?= $ad_label; ?></a>
                    <? endif; ?>
                    
                </div>
            </div>
        </div>
    </div>
<? endif; ?>

<script type="text/javascript">
    jQuery(document).ready(function($){
        $('.tenant-slider').slick({
            arrows: true,
            dots: false,
            slidesToShow: 1,
            adaptiveHeight: true,
            nextArrow:"<img src='<?= get_template_directory_uri(); ?>/_images/icon_button_arrow_white.svg' alt='next slide' />",
        });
    });
</script>
    

<div class="tenant-spotlight bg_teal bg_dark">
    <img src="<?= get_template_directory_uri(); ?>/_images/blobs/blob_tastemaker_spotlight.svg" class='blob' alt='' role="presentation" />
    <div class="row">
        <div class="small-12 large-6 columns">
            <span class='h2'><?= get_field('headline'); ?></span>
            <? if ( get_field('subheadline') ) : ?>
                <span class='h5'><?= get_field('subheadline'); ?></span>
            <? endif ?>
            <div class="description">
                <?= get_field('spotlight_description'); ?>
            </div>
                <?  
                    // var
                    $tenant_button = get_field( 'tenant_button' );
                    if(is_array($tenant_button)) {
                        $tenant_button_label  = $tenant_button['title'];
                        $tenant_button_url    = $tenant_button['url'];
                        $tenant_button_target = $tenant_button['target'];
                    }
                ?>
                <? if ($tenant_button): ?>
					<a class='fm_button primary' href="<?=$tenant_button_url; ?>" target="<?= $tenant_button_target; ?>"><?= $tenant_button_label; ?></a>
		        <? endif; ?>
            
            <div class="small-12 medium-6 columns tenant-logo" style="padding: 0;">
	          <?php
	          $image = get_field('tenant_logo');
	          if( !empty($image) ): ?>
	              <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
	          <?php endif; ?>
            </div>
            
        </div>
        <div class="small-12 medium-6 columns image-grid">
            <? if (get_field('gallery_grid')) : ?>
                <? while(has_sub_field('gallery_grid')):
                    $grid_image = get_sub_field('four_images');
                    $image_source = fly_get_attachment_image_src( $grid_image["ID"], array( 280, 280 ), true )['src'];
                ?>
                    <img class='skip-lazy' src="<?= $image_source; ?>" alt="<?= $grid_image["alt"]; ?>" />
                <? endwhile; ?>
            <? endif; ?>
            
        </div>
    </div>
</div>

<div class="trending-section">
    <div class="row">
        <div class="small-12 large-6 columns">
            <? if ($grid_headline): ?>
                <p class="h2"><?= $grid_headline; ?></p>
            <? else: ?>
            <p class="h2">#Trending</p>
            <? endif; ?>
            <!--Grid Wrapper-->
            <div class="main-wrapper">
            <div class="grid-wrapper">
                <?
                    // Image var
                    $top_vertical_grid_image = get_field('top_left_vertical_image_');
                    $top_vertical_grid_image_source = fly_get_attachment_image_src( $top_vertical_grid_image["ID"], array( 500, 820 ), true )['src'];
                    $top_portrait_grid_image = get_field('top_right_portrait_image');
                    $top_portrait_grid_image_source = fly_get_attachment_image_src( $top_portrait_grid_image["ID"], array( 500, 400 ), true )['src'];
                    $bottom_vertical_grid_image = get_field('bottom_right_vertical_image');
                    $bottom_vertical_grid_image_source = fly_get_attachment_image_src( $bottom_vertical_grid_image["ID"], array( 500, 820 ), true )['src'];
                    $bottom_portrait_grid_image = get_field('bottom_left_portrait_image');
                    $bottom_portrait_grid_image_source = fly_get_attachment_image_src( $bottom_portrait_grid_image["ID"], array( 500, 400 ), true )['src'];

                    // Cta var
                    $v1_cta = get_field('vertical_cta');
                    $v2_cta = get_field('vertical_two_cta');
                    $p1_cta = get_field('portrait_cta');
                    $p2_cta = get_field('portrait_two_cta');
                    
                    if ( get_field('button_1' ) ) :
                        $button_1       = get_field( 'button_1' );
                        $btn_label_1    =  $button_1['title'];
                        $btn_url_1    = $button_1['url'];
                        $btn_target_1 = $button_1['target'];
                    endif;
                    
                    if ( get_field('button_2' ) ) :
                        $button_2       = get_field( 'button_2' );
                        $btn_label_2    =  $button_2['title'];
                        $btn_url_2    = $button_2['url'];
                        $btn_target_2 = $button_2['target'];
                    endif;
                    
                    if ( get_field('button_3' ) ) :
                        $button_3        = get_field( 'button_3' );
                        $btn_label_3    =  $button_3['title'];
                        $btn_url_3    = $button_3['url'];
                        $btn_target_3 = $button_3['target'];
                    endif;
                    

                    if ( get_field('button_4' ) ) :
                        $button_4        = get_field( 'button_4' );
                        $btn_label_4    =  $button_4['title'];
                        $btn_url_4    = $button_4 ['url'];
                        $btn_target_4 = $button_4 ['target'];
                    endif;
                    
                        
                    $insta_feed = get_field('instagram_feed');
                ?>
                
                <div class="box_hold tall">
		           <img src="<?php echo $top_vertical_grid_image_source; ?>" alt="<?php echo $top_vertical_grid_image['alt']; ?>" />
		            
	               <? if ($v1_cta) : ?>
    	                <div class="cta">
    	                    <div class="cta_hold">
    	                        <div class="cta_title_hold">
    	                            <p><?= $v1_cta; ?></p>
    	                            <? if ($button_1) : ?>
    	                                <a class="fm_button primary" href="<?= $btn_url_1; ?>" target="<?= $btn_target_1; ?>"><?= $btn_label_1; ?></a>
    	                            <?endif; ?>
    	                        </div>
    	                    </div>
    	                </div>
	                <? endif; ?>
	                
	            </div>
	            <? if ($v1_cta) : ?>
                    <div class="mobile cta_title_hold">
    	               <p><?= $v1_cta; ?></p>
    	                   <? if ($button_1) : ?>
    	                       <a class="fm_button primary" href="<?= $btn_url_1; ?>" target="<?= $btn_target_1; ?>"><?= $btn_label_1; ?></a>
    	                   <?endif; ?>
                    </div>
                <? endif; ?>
	            
	            <div class="box_hold">
		            <img src="<?php echo $top_portrait_grid_image_source; ?>" alt="<?php echo $top_portrait_grid_image['alt']; ?>" />
		            
	                <? if ($p1_cta) : ?>
    	                <div class="cta">
    	                    <div class="cta_hold">
    	                        <div class="cta_title_hold">
    	                            <p><?= $p1_cta; ?></p>
    	                            <? if ($button_2) : ?>
    	                                <a class="fm_button primary" href="<?= $btn_url_2; ?>" target="<?= $btn_target_2; ?>"><?= $btn_label_2; ?></a>
    	                            <?endif; ?>
    	                        </div>
    	                    </div>
    	                </div>
	                <? endif; ?>
	            </div>
	            <? if ($p1_cta) : ?>
                    <div class="mobile cta_title_hold">
    	               <p><?= $p1_cta; ?></p>
    	                   <? if ($button_2) : ?>
    	                       <a class="fm_button primary" href="<?= $btn_url_2; ?>" target="<?= $btn_target_2; ?>"><?= $btn_label_2; ?></a>
    	                   <?endif; ?>
                    </div>
                <? endif; ?>
	            
	            <div class="box_hold tall">
	                
		            <img src="<?php echo $bottom_vertical_grid_image_source; ?>" alt="<?php echo $bottom_vertical_grid_image['alt']; ?>" />
		            <? if ($v2_cta) : ?>
    	                <div class="cta">
    	                    <div class="cta_hold">
    	                        <div class="cta_title_hold">
    	                            <p><?= $v2_cta; ?></p>
    	                            <? if ($button_3) : ?>
    	                                <a class="fm_button primary" href="<?= $btn_url_3; ?>" target="<?= $btn_target_3; ?>"><?= $btn_label_3; ?></a>
    	                            <?endif; ?>
    	                        </div>
    	                    </div>
    	                </div>
	                <? endif; ?>
	            </div>
	            <? if ($v2_cta) : ?>
                    <div class="mobile cta_title_hold">
    	               <p><?= $v2_cta; ?></p>
    	                   <? if ($button_3) : ?>
    	                       <a class="fm_button primary" href="<?= $btn_url_3; ?>" target="<?= $btn_target_3; ?>"><?= $btn_label_3; ?></a>
    	                   <?endif; ?>
                    </div>
                <? endif; ?>
	            
	            
	            <div class="box_hold">
		            <img src="<?php echo $bottom_portrait_grid_image_source; ?>" alt="<?php echo $bottom_portrait_grid_image['alt']; ?>" />
	                 <? if ($p2_cta) : ?>
    	                <div class="cta">
    	                    <div class="cta_hold">
    	                        <div class="cta_title_hold">
    	                            <p><?= $p2_cta; ?></p>
    	                            <? if ($button_4) : ?>
    	                                <a class="fm_button primary" href="<?= $btn_url_4; ?>" target="<?= $btn_target_4; ?>"><?= $btn_label_4; ?></a>
    	                            <?endif; ?>
    	                        </div>
    	                    </div>
    	                </div>
	                <? endif; ?>
	            </div>
	            <? if ($p2_cta) : ?>
                    <div class="mobile cta_title_hold">
    	                     <p><?= $p2_cta; ?></p>
    	                 <? if ($button_4) : ?>
    	                    <a class="fm_button primary" href="<?= $btn_url_4; ?>" target="<?= $btn_target_4; ?>"><?= $btn_label_4; ?></a>
    	                 <?endif; ?>
    	                </div>
	                <? endif; ?>
	            
            </div>
            
            </div>
        </div>
        
        <div class="small-12 large-6 columns">
            <div class="insta-hold-me">
                
                <? echo do_shortcode('[instagram-feed feed="2"]'); ?>
            </div>
            
        </div>
    </div>
</div>
   

<?php get_template_part( 'global/footer/footer' ); ?>
