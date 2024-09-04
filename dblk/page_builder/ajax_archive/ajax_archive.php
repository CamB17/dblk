<div class="row">
    <div class="column">
        
        <?
        
        $post_type = dblk_get_post_type_key_by_id(gsf('post_type'));
        $taxonomies = gsf('taxonomies');
        $search = gsf('search');
        $posts_per_page = gsf('posts_per_page');
        $visible_posts_on_load = gsf('visible_posts_on_load');
        
        $filters = [];
        if ( isset($taxonomies) ) {
            foreach ( $taxonomies as $taxonomy ) {
                $filters[] = array(
                    "key" =>  "taxonomy",
                    "field_type" =>  "select",
                    "taxonomy" =>  $taxonomy,
                    "taxonomy_operator" =>  "IN",
                    "title" =>  "",
                    "show_count" =>  false,
                    "section_toggle" =>  false,
                    
                );
            }
        }
        if ( $search ) {
            $filters[] = array(
                "key" =>  "search",
                "field_type" =>  "text",
                "title" =>  "",
                "show_count" =>  false,
                "section_toggle" =>  false,
                "placeholder" => "Search...",
            );
        }
        
        

        
        $filter_array = array(
            "id" =>  "filter_test",
            "style" =>  "button",
            "reset_button" =>  true,
            "reset_button_label" =>  "Reset",
            "date_created" =>  1617912226,
            "date_modified" =>  1617912226,
            "filters" =>  $filters
        );
        echo alm_filters($filter_array, '4279175039');
        echo do_shortcode('[ajax_load_more 
            id="4279175039" 
            target="filter_test" 
            filters="true" 
            filters_scroll="true"  
            theme_repeater="alm_article.php" 
            post_type="' . $post_type . '" 
            pause="true" 
            scroll="false" 
            button_loading_label="Loading..." 
            posts_per_page="' . $posts_per_page .'"
            preloaded="true" 
            
            ]');
        ?>
        
    </div>
</div>


<script type="text/javascript">
	jQuery(document).ready(function($){
	    
	    var category_select = $('.alm-filters .alm-filter--taxonomy[data-taxonomy="category"] select').attr('id', 'category_select');
	    var tutorial_select = $('.alm-filters .alm-filter--taxonomy[data-taxonomy="tutorial-type"] select').attr('id', 'tutorial_select');
	    var all_selects = $('.alm-filters select');
	    
	    var select2_options = {
	        width: "width: '300px'",
		    minimumResultsForSearch: -1
	    }
		
		category_select.select2(select2_options);
		tutorial_select.select2(select2_options);
		
		all_selects.on('change', function(e) {
			$('.alm-filters--submit button').click();
		});

	});
</script>
