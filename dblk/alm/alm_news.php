<?php

// Variables
$title = get_the_title();
$excerpt = get_first_sentence_of_content($post->ID);
$link = get_field('external_url');

$image_id = get_post_thumbnail_id($post->ID);
if(!$image_id) {
    $image_id = get_field('default_news_post_image', 'options')["ID"];
}
$image_url = fly_get_attachment_image_src( $image_id, array( 800, 600 ), true )['src'];
$post_date = get_the_date( 'F j, Y' );
?>
<div class="columns small-12 medium-6 large-4 news-tile-wrap">
    <div class="news-tile">
        <div class="image">
            <?= $image_id ? "<img src='$image_url' alt='photo of $title'>" : null; ?>
        </div>
        <div class="inner">
            <div class="content">
                <?= $title ? "<h2 class='h3'>$title</h2>" : null; ?>
                <!--<?= $post_date ? "<h5>$post_date</h5>" : null; ?>-->
                <?= $excerpt ? "<p class='small'> $excerpt</p>" : null; ?>
            </div>
            <?php
                fm_button(
                    button_text: "Read Article",
                    button_color: 'tertiary',
                    url: $link,
                );
            ?>
        </div>
        <a aria-hidden="true" tabindex='-1' href="<?= $link; ?>" target="_blank" class="accessible-card-link"><span class="show-for-sr">More Information About <?= $title; ?> (Opens in new window)</span></a>
    </div>
</div>