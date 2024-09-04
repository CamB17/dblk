<?php
/*
Template Name: Events
*/

get_template_part( 'global/header/header' ); 
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
$event_id = url_to_postid($_SERVER['REQUEST_URI']);
$categories = get_the_terms( $event_id, 'tribe_events_cat' );
$events_label_singular = tribe_get_event_label_singular();
$events_label_plural   = tribe_get_event_label_plural();
$start_date = tribe_get_start_date($event_id, false, 'l, F j');
$end_date = tribe_get_end_date($event_id, false, 'l, F j');
$range_event = false;
if($start_date != $end_date) {
	$range_event = true;
}
?>
<div class='event_listing'>
    <div class='row'>
        <div class='column small-12'>
            <div class='top_section'>
                <div class='title_cat'>
                    <h2><?= get_the_title($event_id); ?></h2>
                    <? if($categories) : ?>
                        <div class='categories'>
                            <?
                                // Loop through each category
                                foreach ( $categories as $category ) {
                                    // Get the custom field value for this category
                                    $category_icon = get_field( 'category_icon', $category );
                                    
                                    // organize the values into variables
                                    $icon_src = $category_icon["url"];
                                    $category_name = $category->name;
                                    
                                    echo "<span class='cat h6'><img src='$icon_src' alt='$category_name' />$category_name</span>";
                                }
                            ?>
                        </div>
                    <? endif; ?>
                </div>
                <div class='time_loc'>
                    <div class='time <?= $range_event ? 'range_event' : '' ?>'>
                        <h4 class='teal'>time</h4>
                        <span class='h6'><?= $start_date; ?>
                            <? if($range_event) : ?>
        						<span class="h6">&nbsp;- <?= $end_date; ?></span>
        					<? endif; ?>
                        </span>
    				<? if ( !tribe_event_is_all_day($event_id) ) : ?>
                        <p><?= tribe_get_start_date($event_id, false, 'g:iA'); ?> – <?= tribe_get_end_date($event_id, false, 'g:iA'); ?></p>
                    <? else : ?>
                        <p>All Day</p>
					<? endif; ?>
    					<a href="<?php echo Tribe__Events__Main::instance()->esc_gcal_url( tribe_get_gcal_link($event_id) ); ?>" class="fm_button tertiary">Add to GCalendar</a>
        				<?
        				// this tribe function must, annoyingly, be used in the loop
        				$queryArray = array(
        				    'post_type' => 'tribe_events',
        				    'posts_per_page' => 1,
        				    'p' => $event_id
        				);
        				$loop = new WP_Query( $queryArray );
        				if ( $loop->have_posts() ) : ?>
        				    <? while ( $loop->have_posts() ) : $loop->the_post(); ?>
        						<div class="hold_me" style="width:100%;">
        							<a href="<?= esc_url( tribe_get_single_ical_link($event_id) ); ?>" class="fm_button tertiary">Add to iCalendar</a>
        						</div>
        				    <? endwhile; ?>
        				<? endif; ?>
        				<? wp_reset_postdata(); ?>
                    </div>
                    <?php if ( tribe_get_venue($event_id) ) : ?>
                    <div class='location'>
                        <h4 class='teal'>location</h4>
                        <span class='h6'><?= strip_tags(tribe_get_venue_details($event_id)["linked_name"]); ?></span>
            			<p class='address'><a href="<?= esc_url( tribe_get_map_link( $event_id ) ); ?>" target="_blank"><?= $address = tribe_get_venue_details($event_id)['address']; ?></a></p>
            			<? if ( tribe_get_map_link( $event_id ) ) : ?>
            				<a href="<?= esc_url( tribe_get_map_link( $event_id ) ); ?>" target="_blank" class="fm_button tertiary">Get Directions</a>
            			<? endif; ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class='bottom_section'>
                <div class='content'>
                    <div class='column small-12 medium-5'>
        				<?= wpautop(get_the_content(null, false, $event_id)); ?>
                        <?= fm_button('Back to Monthly View', 'primary', false, 'url', '/events/', null, "inverted no_arrow"); ?>
                    </div>
    				<? $featured_image_id = get_post_thumbnail_id( $event_id ); 
    				    $image_source = fly_get_attachment_image_src( $featured_image_id, array( 590, 360 ), true )['src'];
    				    $alt_text = get_post_meta( $featured_image_id, '_wp_attachment_image_alt', true );
    				    if($image_source) :
    				?>
        				<div class='column small-12 medium-6 medium-offset-1'>
        				    
        				    <img src="<?= $image_source ?>" alt="<?= $alt_text; ?>" />
        				</div>
    				<? endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<? 
get_template_part( 'global/footer/footer' ); ?>
