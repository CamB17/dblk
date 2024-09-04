<? function fm_article_box($post_id) { 
	
    $image_id = get_post_thumbnail_id($post_id);
    if(!$image_id) {
        $image_id = get_field("image", $post_id);
    }
    if(!$image_id) {
        $image_id = get_field("default_blog_post_image", 'options');
    }
    $image = fly_get_attachment_image_src( $image_id, array( 600, 370 ), true )['src'];
    $title = get_the_title($post_id);
    $permalink = get_the_permalink($post_id);
    $excerpt = get_field('excerpt', $post_id);
?>
    
    <div class="column fm_article_box small-12 medium-4">
        <div class="hold_me clickable_box" data-link_selector=".fm_button">
            <div class="image" style="background-image:url('<?= $image; ?>');">
                
            </div>
            <div class="content">
                <h4><?= $title; ?></h4>
                <!--<p class="date "><?= get_the_date(); ?></p>-->
         
                <? if ( $excerpt) : ?>
                    <div class="excerpt">
                        <?= $excerpt; ?>
                    </div>
                <? endif; ?>
                <? 
                fm_button(
                    button_text: "Learn More",
                    button_color: "primary",
                    url: $permalink,
                    extra_classes: "clickable"
                ); 
                ?>
            </div>
        </div>
    </div>
    
    
	
<? }