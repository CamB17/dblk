<?php function fm_menu(){ ?>
    
   <div id="menu_mobile_container">
        <div id="menu_mobile" class="bg_dark">
            <div class="row menu_top_row">
                <div class="columns small-12 medium-6 large-4">
                    <?php dblk_menu('menu-header', 'menu_primary', '', '3'); ?>
                </div>
                <div class="columns small-12 medium-6 large-5">
                    <?php dblk_menu('secondary-menu', 'menu_secondary', '', '3'); ?>
                </div>
                
                <?php
                global $post;
                $events = tribe_get_events( [
                    'start_date'    => 'today',
                    'posts_per_page'=> 3,
                    'featured'      => true,
                    'orderby'       => 'meta_value',
                    'meta_key'      => '_EventStartDate',
                    'order'         => 'ASC',
                ] );
                if ($events) : ?>
                <div class="columns small-12 medium-12 large-3">
                    <div class="menu_featured_events">
                        <span class="events_title">Featured Events</span>
                        <ul class="featured_events">
                        <?php
                            foreach ( $events as $post ) :
                               setup_postdata( $post );
                               $title = get_the_title($post);
                               $date = tribe_get_start_date($post, false, 'M j');
                               $day = tribe_get_start_date($post, false, 'D');
                               $time = tribe_get_start_time($post);
                               $link = get_the_permalink($post);
                               
                                echo "<li>";
                                    echo "<a href='$link'>";
                                        echo $day ? "<span class='day'>$day </span>" : null;
                                        echo $date ? "<span class='date'>$date </span>" : null;
                                        echo $time ? "<span class='time'>@ $time</span>" : null;
                                        echo $title ? "<span class='title'>$title</span>" : null;
                                    echo '</a>';
                                echo "</li>";
                                
                             endforeach;
                        ?>
                        </ul>
                        <?php
                        fm_button(
                            button_text: "View All Events",
                            button_color: 'secondary',
                            url: '/events',
                        );
                        ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            <div class="row menu_bottom_row">
                <div class="columns small-12 medium-11 large-9">
                     <?php dblk_menu('tertiary-menu', 'menu_tertiary', '', '3'); ?>
                </div>
            </div>
            
            <div class="row menu_contact_row">
                <div class="columns column_address">
                    <?= get_field('address','options'); ?>
                </div>
                <div class="columns column_social shrink">
                    <?php fm_social_media(); ?>
                </div>
            </div>
            
        </div>
    </div>
    
<?php
}