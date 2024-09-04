<?php

// Variables
$title = get_the_title();
$excerpt = get_first_sentence_of_content($post->ID);
$link = get_the_permalink();

$image_id = gf('featured_images', $post->ID)["ID"];
if(!$image_id) {
    $image_id = get_field('default_tastemaker_post_image', 'options')["ID"];
}
$image_url = fly_get_attachment_image_src( $image_id, array( 800, 600 ), true )['src'];
?>

<div class="columns small-12 medium-6 large-4 tastemaker-tile-wrap">
    <div class="tastemaker-tile">
        <div class="image">
            <?= $image_id ? "<img src='$image_url' alt='photo of $title'>" : null; ?>
        </div>
        <div class="inner">
            <div class="content">
                <span class='type_label h6'>Tastemaker</span>
                <?= $title ? "<h2 class='h3'>$title</h2>" : null; ?>
                <?= $excerpt ? "<p class='small'> $excerpt</p>" : null; ?>
            </div>
            <?php
                fm_button(
                    button_text: "Read More",
                    button_color: 'tertiary',
                    url: $link,
                );
            ?>
        </div>
        <a aria-hidden="true" tabindex='-1' href="<?= $link; ?>" class="accessible-card-link"><span class="show-for-sr">More Information About <?= $title; ?></span></a>
    </div>
</div>