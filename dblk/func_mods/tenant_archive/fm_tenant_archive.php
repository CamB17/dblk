<? function fm_tenant_archive(
        $headline,
        $description,
        $archive_to_show,
    ) {
?>

<?php if ($headline || $description) : ?>
    <div class="row intro">
        <?php if ($headline) : ?>
            <div class="columns headline">
                <h2><?php echo $headline; ?></h2>
            </div>
        <?php endif; ?>
        <?php if ($description) : ?>
            <div class="columns small-12 medium-7 description">
                <?php echo $description; ?>
            </div>
        <?php endif; ?>
        
    </div>
<?php endif; ?>

<?php

// Only show filters for Eat & Drink Archive
if ($archive_to_show == 'restaurant') : ?>

    <div class="row">
        <div class="columns">
            <div class="filters_wrap">
                <h3 class="filter-title">Filter By:</h3>
                <?php
                    // Filters Shortcode
                    echo do_shortcode('
                    [ajax_load_more_filters
                        id="restaurant_filters"
                        target="alm_tenant_archive"
                    ]');
                ?>
            </div>
        </div>
    </div>
    
<?php
endif;
?>

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
        id="alm_tenant_archive"
        container_type="div"
        filters="true"
        filters_scroll="false"
        target="restaurant_filters"
        theme_repeater="alm_tenant.php"
        transition_container_classes="row tenant_archive"
        post_type= ' . $archive_to_show . '
        scroll="false
        pause="true
        preloaded="true"
        preloaded_amount="3"
        posts_per_page="20"
        cache="true"
        cache_id="tenants_8562191819"
        seo="true"
    ]');
?>

</div>

<script type="text/javascript">
    jQuery(document).ready(function($){
        
        function mobileFilters() {
              // .atmosphere-filters
                $(".atmosphere-filters .alm-filter--title h3").click(function(){
                    $(this).toggleClass("open");
                    $(".atmosphere-filters .alm-filter--inner").toggleClass("visible");
                });
                
                // .genre-filters
                $(".genre-filters .alm-filter--title h3").click(function(){
                    $(this).toggleClass("open");
                    $(".genre-filters .alm-filter--inner").toggleClass("visible");
                });
        }
        
         if ($(window).width() < 640) {
            mobileFilters();
        }
            
        $(window).resize(function(){
            mobileFilters();
        });
    });
    
    
</script>


<?php
}