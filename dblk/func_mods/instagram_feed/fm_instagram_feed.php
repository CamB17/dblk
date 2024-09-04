<? function fm_instagram_feed(
    $title = null,
    $feed_number = 1,
    $instagram_handle = null,
    $external_instagram_account_url = null,
) { 
    if ( $title ) {
        echo "<div class='row title'>";
            echo "<div class='column small-12'>";
                echo "<span class='h1'>$title</span>";
                if($external_instagram_account_url) :
                    echo "<div class='handle'>";
                        echo "<a class='h5' href='$external_instagram_account_url' target='_blank'><img src='" . get_template_directory_uri() . "/_images/icon_instagram_handle.svg' alt='View Instagram Page' />$instagram_handle</a>";
                    echo "</div>";
                endif;
            echo "</div>";
        echo "</div>";
    }
    
    echo "<div class='feed_wrap row'>";
        echo "<div class='columns small-12'>";
        	echo do_shortcode("[instagram-feed feed=$feed_number]");
        echo "</div>";
    echo "</div>";
}