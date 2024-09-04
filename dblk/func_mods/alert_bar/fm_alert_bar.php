<? function fm_alert_bar()
{

	$args = array(
	    'post_type'      => "alert-bar",
	    'posts_per_page' => 1,
	    'order'          => 'DESC',
	 );
	$alertQuery = new WP_Query( $args );
	if ( $alertQuery->have_posts() ) { $alertQuery->the_post();
	    
	    $alert_bar_content = gf('alert_bar_content');
	    
	    $cookie_class = "alert_bar_" . get_the_ID();
	    
	    if(!isset($_COOKIE[$cookie_class]) && $_COOKIE[$cookie_class] != "closed") {
	    
    	    echo "<div id='alert_bar' class='bg_burnt_umber bg_dark fm_alert_bar'>";
                echo "<div class='row'>";
                   echo "<div class='column'>";
                      echo $alert_bar_content;
                   echo "</div>";
                echo "</div>";
                echo "<button type='button' id='alert_bar_close'>";
                    icon_x();
                    echo "<span class='sr-only'>Close alert bar</span>";
                echo "</button>";
            echo "</div>";
    	    
    	    ?>
    	    <script type="text/javascript">
            	jQuery(document).ready(function($) {
            		$('#alert_bar_close').on('click', function() {
            		    $alert_bar = $('#alert_bar');
            			$alert_bar.slideUp(200);
            			Cookies.set('<?= $cookie_class; ?>', 'closed');
	            		$('body').removeClass("has_alertbar");
            		})
            		$('body').addClass("has_alertbar");
            	})
            </script>
            <?
	    }
	    
	}
	wp_reset_postdata();
    
}