<? function fm_tastemaker_archive() {
?>

<div class="tastemaker_archive_posts">
   
    <?php
    // ALM Shortcode
    echo do_shortcode('
    [ajax_load_more
        id="alm_tastemaker"
        container_type="div"
        theme_repeater="alm_tastemaker.php"
        transition_container_classes="row tastemaker_archive"
        post_type="blog"
        scroll="false
        pause="true
        preloaded="true"
        preloaded_amount="6"
        posts_per_page="20"
        cache="true"
        cache_id="blog_2814676302"
        seo="true"
    ]');
?>

</div>


<?php
}