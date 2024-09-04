<? 
function fm_page_builder() 
{ 
	while (have_posts()) 
	{ the_post();
	
		$page_builder_modules = gf('page_builder');
		
		
		
		if ( have_rows('page_builder') ) 
		{
			$x = 0;
			
			while ( have_rows('page_builder') ) 
			{ the_row();
			
		
			
	        	if ( get_sub_field('hide_module') ) 
	        	{
	        		continue;
	        	}
	        
				/*
				experimental. getting the list of parameters of the func mod and
				automatically grabbing them from the page builder row, passing them 
				*/
            	$parameters = new ReflectionFunction("fm_" . get_row_layout());
            	$params = array();
            	foreach ( $parameters->getParameters() as $param)
            	{
            		$params[$param->name] = $page_builder_modules[$x][$param->name];
            	}

				// apr($page_builder_modules[$x]);
            	
            	(new dblk_module_wrapper(
            		name: get_row_layout(),
            		hide_module: $page_builder_modules[$x]["layout_settings"]['hide_module'],
            		background_color: gsf('background_color'),
            		classes: explode(" ", $page_builder_modules[$x]["layout_settings"]['custom_css_classes']),
            		padding_top: $page_builder_modules[$x]["layout_settings"]['padding_top'],
            		padding_bottom: $page_builder_modules[$x]["layout_settings"]['padding_bottom'],
            		margin_top: $page_builder_modules[$x]["layout_settings"]['margin_top'],
            		margin_bottom: $page_builder_modules[$x]["layout_settings"]['margin_bottom'],
            		inline_css: explode(";", $page_builder_modules[$x]["layout_settings"]['custom_inline_css']),
            		id: $page_builder_modules[$x]["layout_settings"]['custom_id'],
            		element: 'section',
            		params: $params
            	))->wrap();
            	
        		
	        	$x++;
			}
		}
	}
}