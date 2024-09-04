<?php
if ( is_page() ) {

    get_template_part( 'pages/page-builder' );
}
elseif ( is_singular() ) {

    $postType = get_post_type();

    get_template_part( 'singles/' . $postType . '/' . $postType . '-single' );
}
elseif ( is_home() || is_category() ) {

    get_template_part( 'archives/post/post-archive' );
}
elseif ( is_post_type_archive() ) {

    $postType = $wp_query->query['post_type'];
    //$has_archive = get_template_part( 'archives/' . $postType . '/' . $postType . '-archive' );
    // Swap to "locate_template" as "get_tempalte_part" echos the template.
    $has_archive = locate_template( 'archives/' . $postType . '/' . $postType . '-archive.php' );

    // if the archive template files for this post type dont exist, use the default one
    if ( $has_archive ) {
       get_template_part( 'archives/' . $postType . '/' . $postType . '-archive' );
    }
    else {
        get_template_part('archives/default/default-archive');
    }
}

    
elseif ( is_search() ) {

    get_template_part( 'global/search_results/search_results' );
}
elseif ( is_404() ) {

    get_template_part( 'global/404/404' );

}
elseif ( ( is_front_page() ) && ( !get_option( 'page_on_front' ) ) ) {

    echo "<a href='/wp-admin/options-reading.php'>Set a front page.</a>";
}
else {
    echo "Blank";
}


?>


