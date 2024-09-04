<?php get_template_part( 'includes/header' ); ?>
<section class="search-term">
    <div class="row">
        <div class="small-12 columns">
            <h1>
                <?php printf( __( 'Search Results for "%s"', 'shape' ), '<span>' . get_search_query() . '</span>' ); ?>
            </h1>
        </div>
    </div>
</section>

<section class="search-results">
    <div class="row small-up-1 medium-up-2 large-up-3">

        <?
        if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <div class="column">

                <h4>
                    <a href="<? the_permalink(); ?>">
                        <? the_title(); ?>
                    </a>
                </h4>

                <?
                if ( get_field('custom_excerpt') ) :
                    echo get_field('custom_excerpt');
                else :
                    the_excerpt();
                endif;
                ?>
                <a href="<? the_permalink(); ?>" class="button small">
                    Read More
                </a>
            </div>

        <? endwhile; else : ?>

        <? endif; ?>

    </div>
</section>

<?php get_template_part( 'includes/footer' ); ?>