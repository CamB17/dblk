<? function fm_news_archive(
        $title,
        $description,
    ) {
?>

<?php if ($title || $description) : ?>
    <div class="row intro">
        <?php if ($title) : ?>
            <div class="columns headline">
                <h2><?= $title; ?></h2>
            </div>
        <?php endif; ?>
        <?php if ($description) : ?>
            <div class="columns small-12 medium-7 description">
                <?= $description; ?>
            </div>
        <?php endif; ?>
        
    </div>
<?php endif; ?>

<div class="tenant_archive_posts <?php if ($archive_to_show == 'restaurant') : echo 'has-filters'; endif; ?>">
   
    <?php if ($archive_to_show == 'restaurant') : ?>
        <div class="row columns">
            <div class="alm-results-text"></div>
        </div>
    <?php endif; ?>
    
    <?php
    // ALM Shortcode
    echo do_shortcode('
    [ajax_load_more
        id="alm_news"
        container_type="div"
        theme_repeater="alm_news.php"
        transition_container_classes="row news_archive"
        post_type="news"
        scroll="false
        pause="true
        preloaded="true"
        preloaded_amount="20"
        posts_per_page="20"
        cache="true"
        cache_id="news_9268910229"
        seo="true"
    ]');
?>

</div>


<?php
}