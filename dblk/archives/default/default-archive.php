<?php get_template_part('global/header/header'); ?>

<?php if ( have_posts() ) : ?>
    <section class="default_archive">
        <?php while ( have_posts() ) : the_post(); ?>
            <?
            // if this post has a featured image
            if ( get_post_thumbnail_id() ) {
                $image_id = get_post_thumbnail_id();
                $image = fly_get_attachment_image_src( $image_id, array( 600, 370 ), true )['src'];

            } 
            // find the post type key, get the ID of the custom post type 
            // and get the default image based on that
            else {
                
                $post_type_key = get_post_type();
                $post_type_ID = dblk_get_post_type_id_by_key($post_type_key);
                $image_id = get_field('default_image', $post_type_ID)['id'];
                $image = fly_get_attachment_image_src( $image_id, array( 600, 370 ), true )['src'];
            }
            ?>
            <div class="row post" >

                <div class="small-12 medium-6 columns image"  onclick="document.location='<?= get_the_permalink(); ?>';">
                    <div class="image_holder" style="background-image:url('<?= $image; ?>');"></div>

                </div>

                <div class="small-12 medium-6 columns info align-middle" >
                    <div class="hold-me">
                        <a href="<? the_permalink(); ?>">
                            <h4><? the_title(); ?></h4>
                        </a>
                        <h6><?= get_the_date(); ?></h6>
                        <p>
                            <?= wp_trim_words($post->post_content, 40, '...') ?>
                        </p>
                        <a href="<? the_permalink(); ?>" class="button">Read More &raquo;</a>
                    </div>
                </div>
            </div>

        <?php endwhile; ?>

        <div class="row pagination">
            <div class="small-12 columns">
                <? dblk_archive_pagination(); ?>
            </div>
        </div>

    </section>

<?php endif; ?>

<?php get_template_part('global/footer/footer'); ?>
