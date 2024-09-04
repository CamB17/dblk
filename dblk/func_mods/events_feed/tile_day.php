<?php function tile_day($day, $date_month, $date_day){
    
    // Variables
    $post = get_the_ID();
    // $day = tribe_get_start_date($post, false, 'l');
    // $date_month = tribe_get_start_date($post, false, 'M');
    // $date_day = tribe_get_start_date($post, false, 'd');
   
    
    echo "<div class='day_tile bg_dark bg_black'>";
    
        echo "<span class='day'>$day</span>";
        echo "<span class='date_month'>$date_month</span>";
        echo "<span class='date_day'>$date_day</span>";
   
    echo "</div>";
            


}