<?php

get_template_part( 'global/header/header' ); 
?>
<section class="event_archive">
    <?php echo do_shortcode('[tribe_events view="month" filter-bar="true" ]'); ?>
    
 
    <?php // echo do_shortcode('[tribe_events view="list" filter-bar="false" ]'); ?>
</section>

<script type="text/javascript">
	jQuery("document").ready(function($) {
    setTimeout(function(){
        $('span.tribe-filter-bar-c-dropdown__input').removeClass('select2-container--open');
    }, 1000);
    
    $(document).on('click', '.venue-col .tribe-filter-bar__filters-container span.select2.select2-container.select2-container--default.select2-container--below.tribe-filter-bar-c-dropdown__input.tribe-dropdown-created', function() {
        // if($(this).hasClass('select2-container--open')) {
        //     $(this).addClass('custom_open');
        // } else {
        //     $(this).removeClass('custom_open');
        // }
        $(this).toggleClass('custom_open');
    })
    
    // // Close dropdown when any element in the events bar, filter bar, or top bar is clicked or changed
    // $(document).on('click change', '.tribe-events-header__events-bar, .tribe-filter-bar, .tribe-events-c-top-bar', function() {
    //     $('.venue-col .tribe-filter-bar__filters-container span.select2.select2-container.select2-container--default.select2-container--below.tribe-filter-bar-c-dropdown__input.tribe-dropdown-created').removeClass('custom_open')
    // });
    
    // // If the user clicks specifically on the venue dropdown, prevent the above action
    // $('.venue-col .tribe-filter-bar__filters-container').on('click', function(e) {
    //     e.stopPropagation();
    // });
    var activeVenueNames;
    function hide_unactive_venues(activeVenueNames) {
        $(".venue-col .tribe-filter-bar__filters-container span.select2.select2-container.select2-container--default.select2-container--below.tribe-filter-bar-c-dropdown__input.tribe-dropdown-created .select2-results__option").each(function() {
            const venueName = $(this).text().trim();
            if (!activeVenueNames.map(v => v.trim()).includes(venueName)) {
                console.log(venueName);
                $(this).attr('data-hidden', 'true');
            }
        });
    }
    $.ajax({
        url: '/wp-json/my-custom-plugin/v1/future-venues', // The custom endpoint we created
        method: 'GET',
        success: function(response) {
            activeVenueNames = Object.values(response); // Array of active venue names
            setTimeout(function(){
                hide_unactive_venues(activeVenueNames);
            }, 1000);
        }
    });
    $(document).on('click', function() {
        hide_unactive_venues(activeVenueNames);
    });
  });
</script>
               
<? 
get_template_part( 'global/footer/footer' ); ?>
