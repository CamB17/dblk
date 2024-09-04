<? function fm_featured_pages(
        $featured_pages,
        $headline,
        $blob_color,
        $description,
    ) {
  
 ?>

<?php if ($headline || $description) : ?>
    <div class="row intro">
        <?php if ($headline) : ?>
            <div class="columns headline">
                <h2 class="h1"><?php echo $headline; ?></h2>
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
if( $featured_pages ): 
    //count each
    $count_each = 0;
    //count total number of pages
    $total = count($featured_pages);
    //columns based on count
    if ($total == 4) :
        $columns = 'medium-6 large-3';
    elseif ($total == 3) :
        $columns = 'medium-6 large-4';
    else :
        $columns = 'medium-6  large-6';
    endif;
?>
    <? if($blob_color == "orange") : ?>
        <img class='blob orange' src="<?= get_template_directory_uri(); ?>/_images/blobs/blob_featured_pages_bg.svg" alt='' role="presentation" />
    <? else : ?>
        <img class='blob green' src="<?= get_template_directory_uri(); ?>/_images/blobs/featured_pages_blob.svg" alt='' role="presentation" />
    <? endif; ?>
    <div class="row row-<?php echo $total; ?>">
    <?php foreach( $featured_pages as $page ): 
        $link = get_permalink( $page->ID );
        $page_title = get_the_title( $page->ID );
        $featured_button_label_override = get_field('featured_button_label_override', $page->ID);
        $button_label = "More Information";
        if($featured_button_label_override) {
            $button_label = $featured_button_label_override;
        }
        $featured_title_override = get_field('featured_title_override', $page->ID);
        if($featured_title_override) {
            $page_title = $featured_title_override;
        }
        $excerpt = get_the_excerpt( $page->ID );
        //$image = get_the_post_thumbnail( $page->ID, 'large' );
        $image = get_post_thumbnail_id( $page->ID);
        if(!$image) {
            //$image = "<img src='" . fly_get_attachment_image_src( $header_image["ID"], array( 740, 540 ), true )['src'] . "' alt='$page_title' />"; 
            $image = get_field('image', $page->ID);
        }
        
       

        
        //headline check for ADA heading order + styling change
        if ($headline) :
            $title = "<h3 class='h2'>$page_title</h3>";
        else:
            $title = "<h2 class='h3'>$page_title</h2>";
        endif;
    
        // Assign classes and variables for the dots to each column
        $count_each++;
        $class = 'featured_page--' . $count_each; 
        if ($count_each == 1) :
            $by = '4x4';
            $size = 'sm';
            $position = 'bottom left';
            $dots_color = 'marigold';
        elseif ($count_each == 2) :
            $by = '2x5';
            $size = 'sm';
            $position = 'bottom left';
            $dots_color = 'red';
        elseif ($count_each == 3) :
            $by = '3x3';
            $size = 'sm';
            $position = 'bottom left';
            $dots_color = 'teal';
        elseif ($count_each == 4) :
            $by = '5x2';
            $size = 'sm';
            $position = 'bottom left';
            $dots_color = 'cotton_candy';
        endif;
        
        ?>
        <div class="columns small-12 <?php echo $columns; ?> <?php echo $class;?> featured_page_columns">
            <div class="featured_page">
                <a tabindex='-1' href='<?php echo $link; ?>'  class='accessible-card-link'><span class='show-for-sr'>View <?php echo$$page_title; ?></span></a>
                <div class="top_content">
                    <?php echo $title; ?>
                    <div class="image">
                        <?php echo dblk_get_responsive_image( $image, null, $page_title, false ); ?>
                    </div>
                    <?php if ($excerpt) : ?>
                        <p><?php echo $excerpt; ?></p>
                    <?php endif; ?>
                </div>
                <div class="bottom_content">
                <?php
                    fm_button(
                        button_text: "$button_label",
                        button_color: 'secondary',
                        url: $link,
                    );
                ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    </div>
<?php endif;
}