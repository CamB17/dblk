<?php function tile_end(){
    
    // Variables
    $title = 'Interested in seeing more events?';
    $link = '/events';
   
   ?>
    <div class="end_tile bg_dark">
        <div class="end_tile_inner">
            <div class="top">
                <h3><?php echo $title; ?></h3>
            </div>
            <div class="bottom">
                <?php
                fm_button(
                    button_text: "View All Events",
                    button_color: 'secondary',
                    url: $link,
                );
                ?>
            </div>  
        </div>
    </div>
            

<?php 
}