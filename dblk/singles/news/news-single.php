<?php get_template_part( 'global/header/header' ); 
$archive_link = get_the_permalink(gf('news_archive_page', 'options'));
?>

<section class="news_single">
    <div class="row">
        <div class="small-12 columns">
            <? if ( have_posts() ) : 
                while ( have_posts() ) : the_post(); ?>

                    <? the_content(); ?>
    
                    <?
                        if($archive_link) {
                            fm_button(
                                button_text: "Back to News",
                                button_color: 'tertiary',
                                url: $archive_link,
                            );
                        }
                    ?>
                <? endwhile; 
            endif; ?>
        </div>
    </div>
</section>


<?php get_template_part( 'global/footer/footer' ); ?>
