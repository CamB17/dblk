<? function fm_search_form() { ?>
    <div class="fm_search_form">
       <form role="search" method="get" id="search-form" action="/">
          <input type="text" placeholder="Enter Search..." name="s" id="s">
          <label for="s" style="display:none;">Search</label>
          <button id="search_toggle" tabindex="0">
              <? icon_search(); ?>
          </button>
       </form>
    </div>
    <script type="text/javascript">
	    jQuery(document).ready(function($){
		    
		    let $search_form = $('.fm_search_form form');
    		let $search_toggle = $('.fm_search_form #search_toggle');
    		let $search_input = $('.fm_search_form #s');
            
            function search_toggle_pressed(event)
            {
                // do not submit the form yet
                event.preventDefault();
                
                // get the search query from the input
                let search_query = $search_input.val();
    		    
    		    // if input is empty
    		    if ( search_query == "" )
    		    {
    		        // toggle the active class to show the input
    		        $search_form.toggleClass('active');
    		        // focus on the input
    		        $search_input.focus();
    		    } 
    		    // if input is not empty
    		    else {
    		        // submit the form
    		        $search_form.submit();
    		    }
            }
    		
    		// if the search toggle is clicked
    		$search_toggle.click(search_toggle_pressed);
    		
    		// if the search toggle is focused and enter or spacebar is pressed
    		$search_toggle.keypress(function(event){
              if( event.keyCode == 13 || event.keyCode == 0 || event.keyCode == 32 ){
                search_toggle_pressed(event);
              }
            });
    
    	});
    </script>
<? }