<? function fm_content_section(
    $columns = array(),
    $full_width_content = false,
    $instagram_feed = false 
) {

    
    // determine if we should add full width to the mix
    // http://foundation.zurb.com/sites/docs/grid.html#fluid-row
    $expanded = null;
    if ( get_sub_field('full_width_content') == 1 ) {
        $expanded = " expanded";
    }
    ?>
    
    
    <div class="row <?= $expanded; ?>">
        <?php
        // check if the flexible content field has rows of data
        if( have_rows('columns') ):
    
            // loop through the rows of data
            while ( have_rows('columns') ) : the_row();
    
                if( get_row_layout() == 'column' ):
                    get_template_part( '/func_mods/content_section/column/column' );
    
                endif;
    
            endwhile;
    
        endif;
        ?>
    </div>

	
<? }