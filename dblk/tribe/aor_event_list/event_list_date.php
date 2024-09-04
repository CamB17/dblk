<?php
$now = current_datetime()->format('Y-m-d');
$date_start = tribe_get_start_date($post, true, 'Y-m-d');
$date_end = tribe_get_end_date($post, true, 'Y-m-d');

echo "<div class='columns'>";
    echo "<div class='dblk-event-list-date'>";
            echo "<h2 class='h3'>";
                if ( ($now >= $date_start) && ($now <= $date_end) && tribe_event_is_multiday()) :
                    echo date('l, F d');
                else:
                    echo tribe_get_start_date($post, false, 'l, F d');
                endif;
            echo "</h2>";
    echo "</div>";
echo "</div>";
    