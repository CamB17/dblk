<? function fm_recent_post_feed(
    string $headline = null,
    $button = null

) { ?>
    <div class="row title">
        <div class="small-12 medium-6 column text">
            <?= $headline ? "<h2>$headline</h2>" : null; ?>
        </div>
        <div class="small-12 medium-6 column link text-right">
            <? if ( $button ) {
                $button['button_color'] = "tertiary";
                fm_button(...$button);
            } ?>
        </div>
    </div>
    <div class="row posts">
        <?
        $queryArray = array(
            'post_type' => 'post',
            'posts_per_page' => 3
        );
        ?>
        
        <? $loop = new WP_Query( $queryArray ); ?>
        
        <? if ( $loop->have_posts() ) : ?>
            
            <? while ( $loop->have_posts() ) : $loop->the_post(); 
                
                fm_article_box(get_the_ID());
            
            endwhile; ?>
           
        <? endif; ?>
        
        <? wp_reset_postdata(); ?>
    </div>
<? }