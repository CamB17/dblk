<? function subpage_header() {
	if(!is_404()) {
	    $title_override = gf('title_override');
	    $image = gf('image');
	    if(!$image) {
	    	$image = get_field('default_page_image', 'options');
	    }
	}
    
	if($image["ID"]) {
	    $image_source = $image;
	} else {
		// fallback to options page default
	    $image_source = get_field('default_page_image', 'options');
	    $add_blue_overlay = false;
	}
	
	if ( !is_front_page() && !is_search()) {
		if ( is_404() ) {
			$title = "404 Error";
		} else {
			
			$title = get_the_title();
			if(!$title) {
				$page_id = url_to_postid($_SERVER['REQUEST_URI']);
				$title = get_the_title($page_id);
			}
			if($title_override) {
				$title = $title_override;
			}
			if( tribe_is_month() && !is_tax() ) { // Month View Page
				$title = "Upcoming Events";
			    $image_source = get_field('default_event_image', 'options');
			}
			if(get_post_type($page_id) == "tribe_events") {
				$title = "Events";
			    $image_source = get_field('default_event_image', 'options');
			}
			if(get_post_type($page_id) == "shop" || get_post_type($page_id) == "service" || get_post_type($page_id) == "restaurant" || get_post_type($page_id) == "blog") {
				$title = "";
				$hide_header_image = true;
			}
		}
		?>
		
		<section class="subpage_header <?= $hide_header_image ? 'hide_header_image' : '' ?>">
			<?php if ( $image_source ) : ?>
				<div class="bg_image">
		    	    <?php echo dblk_get_responsive_image( $image_source, null, null, true ); ?>
		    	 </div>
	       	<?php endif; ?>
			<div class='overlay'></div>
			<div class="row">
				<div class="columns small-12 bg_dark">
					<? if($title) : ?>
						<h1><?= $title; ?></h1>
					<? endif; ?>
				</div>
			</div>
		</section>
		
	<? } ?>
<? }