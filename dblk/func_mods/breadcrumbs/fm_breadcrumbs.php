<? function breadcrumbs() {
	
	// Set to true if the breadcrumbs on this site should start with a link to home
	$display_home = true;
	$breadcrumbs = [];
	if ( $display_home ) {
		$breadcrumbs[] = array(
			'title' => 'Home', 
			'url' => '/'
		);
	}
	
	// Setup variables
	$separator = " » ";
	$post_ID = get_the_ID();
	$post_type = get_post_type();
	
	// get the archive page IDs
	$news_archive_page_ID = get_field('news_archive_page','options');
	$post_archive_page_ID = get_option( 'page_for_posts' );
	
	
	if ( $post_ID == $news_archive_page_ID ) {
		
		$breadcrumbs = dblk_get_page_ancestors($news_archive_page_ID, $breadcrumbs);
		
	}

	elseif ( $post_type == "page" ) {
		
		
		$breadcrumbs = dblk_get_page_ancestors($post_ID, $breadcrumbs);
	
	}
	elseif ( is_search() ) {
	
	}
	elseif ( is_404() ){
	
	}
	elseif ( $post_type == "post" ) {
		
		
		// get the ancestors of the post archive page
		$breadcrumbs = dblk_get_page_ancestors($post_archive_page_ID, $breadcrumbs);
		
		// if not the post archive, add the archive to end of the breadcrumbs
		
		if ( !(is_home() || is_category()) ) {
			$breadcrumbs[] = array(
				'title' => get_the_title($post_archive_page_ID),
				'url' => get_permalink( $post_archive_page_ID )
			);
		}
	
	}
	elseif ( $post_type == "news" ) {
		
		
		// get the ancestors of this page
		$breadcrumbs = dblk_get_page_ancestors($news_archive_page_ID, $breadcrumbs);
		$breadcrumbs[] = array(
			'title' => get_the_title($news_archive_page_ID),
			'url' => get_permalink( $news_archive_page_ID )
		);
		

	}
	
	
	// output the breadcrumbs
	
	$counter = 1;
	foreach ( $breadcrumbs as $breadcrumb ) {
		echo $counter > 1 ? $separator : "";
		$counter++;
		echo "<a href='{$breadcrumb['url']}'>{$breadcrumb['title']}</a>";
	}



} 

function dblk_get_page_ancestors( $page_id, $breadcrumbs = [] ) {

	$ancestors = array_reverse(get_ancestors($page_id, 'page'));
	foreach ( $ancestors as $ancestor_ID ) {
		$breadcrumbs[] = array(
			'title'	=> get_the_title($ancestor_ID),
			'url' => get_the_permalink($ancestor_ID)
		);
	}
	return $breadcrumbs;
}