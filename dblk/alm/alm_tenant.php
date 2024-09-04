<?php

// Variables

$archive_to_show = gsf('archive_to_show');
$service_terms = get_the_terms( $post->ID, 'service-type' ); 
 foreach($service_terms as $service_term) {
     $service_term_name =  $service_term->name;
}

$title = get_the_title();
$excerpt = gf('short_description', $post->ID);

$website = get_the_permalink();
$target = "_self";


$images = gf('gallery');
$image_id = $images['0']['id'];
$image_url = fly_get_attachment_image_src( $image_id, array( 800, 600 ), true )['src'];


$hours = gf('hours', $post->ID);


?>

<div class="columns small-12 medium-6 large-4 tenant-tile-wrap">
    <?php
    // if ($archive_to_show == 'service') :
    //     echo "<h2 class='h5 tenant-label'>$service_term_name;</h2>";
    // endif;
    ?>
    <div class="tenant-tile">
        <div class="image">
            <?= $image_id ? "<img src='$image_url' alt='photo of $title'>" : null; ?>
        </div>
        <div class="inner">
            <div class="content">
                <?= $title ? "<h2 class='h3'>$title</h2>" : null; ?>
                <?= $excerpt ? "<p class='small'> $excerpt</p>" : null; ?>
                <?php
                if ( $hours ) :
                    echo '<ul class="hours">';
                    foreach( $hours as $hour ) :
                       $day = $hour['days']; 
                       $time = $hour['hours'];
                       ?>
                            <li>
                                <span class="day"><?= $day; ?></span>
                                <span class="time"><?= $time; ?></span>
                            </li>
                    <?php
                    endforeach;
                    echo '</ul>';
                endif;
                ?>
            </div>
            <?php
                fm_button(
                    button_text: "More Information",
                    button_color: 'tertiary',
                    url: $website,
                );
            ?>
        </div>
        <a aria-hidden="true" tabindex='-1' href="<?= $website; ?>" target="<?= $target; ?>" class="accessible-card-link"><span class="show-for-sr">More Information About <?= $title; ?></span></a>
    </div>
</div>

