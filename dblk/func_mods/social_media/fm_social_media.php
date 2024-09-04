<?php function fm_social_media(){
    
if (get_field('social_icons', 'options')): ?>
<div class="social_media">
    <?php
    while(has_sub_field('social_icons', 'options')):
        
        // Variables
        $link = get_sub_field('link_url', 'options');
        $icon = get_sub_field('icon');
        $icon_alt = $icon['alt'];
        $icon_title = $icon['title'];
        $icon_url = $icon['sizes']['thumbnail'];
        
        // Assign aria-label
        if ( $icon_title == true ) :
            $icon_title = $icon_title;
        else:
            $icon_title = 'Social Media';
        endif;
    ?>
        <a href="<?php echo $link; ?>" target="_blank" rel="noopener" aria-label="Visit Our <?php echo $icon_title; ?> Page"  class="social-link">
             <img src="<?php echo $icon_url; ?>" alt="<?php echo $icon_alt; ?>">
        </a>
    <?php endwhile; ?>
</div>
<?php
endif;
                
}