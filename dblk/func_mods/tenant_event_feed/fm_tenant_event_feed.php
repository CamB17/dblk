<?php function fm_tenant_event_feed(
        $title = null,
        $venue_id = null,
        $classes = null
    ) {
?>




    <?php
    global $post;
    
    $events = tribe_get_events( [
       'posts_per_page' => 3,
       'start_date'     => 'now',
       'venue' => $venue_id,
       'tribeHideRecurrence' => false,
    ] );
        
    if  ($events ) :
    ?>
    <div class="tenant-events <?php echo $classes; ?>">
    <div class="tenant-events__headline row">
        <div class="tenant-events__headline--message small-12 medium-8 columns">
            <h2>Upcoming Events at <?php echo esc_html($title); ?></h>
        </div>
        <div class="tenant-events__headline--action small-12 medium-4 columns">
            <a class="fm_button primary" href="/events/">View All Events</a>
        </div>
    </div>
    
        <div class="tenant-events__feed row">
           <?php foreach ( $events as $post ) :
                   setup_postdata( $post ); ?>
                <div class="small-12 medium-4 columns">
                    <?php tile_event($featured = false); ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php else : ?>
        <!--<div class="tenant-events__feed tenant-events__feed--empty row">-->
        <!--    <div class="small-12 columns">-->
        <!--        <h3 class="tenant-events__empty-message">-->
        <!--            Sorry, there are no upcoming events at <?php echo esc_html($title); ?>.-->
        <!--        </h3>-->
        <!--    </div>-->
        <!--</div>-->
    <?php
    endif;
        
    // Restore original Post Data
    wp_reset_postdata();
    ?>

<?php
}