<? 
function fm_content_repeater (
    $headline = null,
    $logo_one = null,
    $logo_two = null,
    $logo_three = null
)
{  ?>
    <div class="row">
    <?php
    if( have_rows('modal_section') ):
        while ( have_rows('modal_section') ) : the_row();
          //Vars
          $title = get_sub_field('section_title');
          $section_count = get_row_index(); ?>
          <div class="small-12 medium-6 columns modal-section">
              <h3><?php echo $title; ?></h3>
                <?php
                if( have_rows('artist_repeater') ):
                    while ( have_rows('artist_repeater') ) : the_row();
                    //Vars
                    $title = get_sub_field('artist_name');
                    $content = get_sub_field('artist_info');
                    $image = get_sub_field('artist_image')['sizes']['medium'];
                    $alt = get_sub_field('artist_image')['alt'];
                    if ( $alt == "" ) :
                      $alt = "Modal Image";
                    endif;
                    $count = get_row_index();
                    ?>
                      <p>
                      <?php if($content || $image): ?>
                        <a data-open="repeaterModal-<?php echo $section_count; ?>-<?php echo $count; ?>"><?php echo $title; ?></a>
                      <?php else: ?>
                        <?php echo $title; ?>
                      <?php endif; ?>
                    </p>
    
                    <div class="reveal small repeater-modal-box" id="repeaterModal-<?php echo $section_count; ?>-<?php echo $count; ?>" data-reveal>
                      <div class="row">
                        <div class="small-12 <?php if ($image): ?> medium-8 <?php else: ?> medium-12 <? endif; ?> columns">
                          <span class='h2'><?php echo $title; ?></span>
                          <p><?php echo $content; ?></p>
                        </div>
                        <?php if ($image): ?>
                          <div class="small-12 medium-4 columns">
                            <img src="<?php echo $image; ?>" alt="<?= $alt; ?>"/>
                          </div>
                        <?php endif; ?>
                      </div>
                      <button class="close-button" data-close aria-label="Close modal" type="button">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
              <?php
              endwhile;
            endif;
            ?>
    
    </div>
        <?php
        endwhile;
    endif;
    ?>
    </div>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            // Open modal when a link with 'data-open' attribute is clicked
            $('[data-open]').on('click', function(e) {
                e.preventDefault();
                var modalId = $(this).attr('data-open');
                $('.reveal-overlay').fadeIn(); // Show the overlay
                $('#' + modalId).fadeIn(); // Show the modal
            });
        
            // Close modal when the close button is clicked or the overlay is clicked
            $('.close-button, .reveal-overlay').on('click', function() {
                $('.repeater-modal-box').fadeOut(); // Hide the modal
                $('.reveal-overlay').fadeOut(); // Hide the overlay
            });
        
            // Prevent propagation of click events from the modal to the overlay
            // This ensures that clicking on the modal doesn't close it
            $('.repeater-modal-box').on('click', function(event) {
                event.stopPropagation();
            });
        });
    </script>
<? 
}