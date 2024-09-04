<? function fm_in_page_navigation(
    array $navigation_items
) {
    
?>
    <div class="row">
        <?php if (!empty($navigation_items) ) { $x = 1; ?> 
            <div class="column">
            	<? foreach ( $navigation_items as $item ) { ?>
            
                   
                        <a href="#<?= $item['element_id']; ?>" class="<?= $x == 1 ? "active" : ""; ?>">
                            <?= $item['display_text']; ?>
                        </a>
                 
                        <? $x++; ?>
            	<? } ?>
            </div>
        <? } ?>
    </div>
    <script>
    $('.fm_in_page_navigation').addClass('original').clone().insertAfter('.fm_in_page_navigation').addClass('cloned').css('position', 'fixed').css('top', '120').css('z-index', '4').removeClass('original').hide();
    
    $(window).scroll(function() {
        stickIt();
    });
    
    function stickIt() {
    
        var orgElementPos = $('.fm_in_page_navigation.original').offset();
        orgElementTop = orgElementPos.top;
        
        if ($(window).width() > 600) {
            adminBarHeight = $('#wpadminbar').outerHeight();
        } else {
            adminBarHeight = 0;
        }
    
        headerHeight = $('header.scrolled').outerHeight();
        
        totalHeight = headerHeight + adminBarHeight;
    
        barOffset = $('.fm_in_page_navigation').outerHeight();
        
        // console.log("el top: " + orgElementTop);
        // console.log("win top: " + $(window).scrollTop());
        // console.log("total height: " + totalHeight);
        if ($(window).scrollTop() >= (orgElementTop - totalHeight )) {
            // scrolled past the original position; now only show the cloned, sticky element.
            // console.log('fire');
            // Cloned element should always have same left position and width as original element.     
            orgElement = $('.original');
            coordsOrgElement = orgElement.offset();
            leftOrgElement = coordsOrgElement.left;
            widthOrgElement = orgElement.css('width');
            $('.cloned').css('left', leftOrgElement + 'px').css('top', 0).css('width', widthOrgElement).css('margin-top', totalHeight).show();
            $('.original').css('visibility', 'hidden');
        }
        else {
            // not scrolled past the menu; only show the original menu.
            $('.cloned').hide();
            $('.original').css('visibility', 'visible');
        }
    }
    
    </script>
    <script type="text/javascript">
    	jQuery(document).ready(function($){
    	    var sectionIDs = new Array();
    	    var sectionOffsets = new Array();
    	    var browserHeight;
    	    
    	    function configure() {
    	        $('.fm_in_page_navigation:not(.cloned) a').each(function() {
        	        var id = $(this).attr('href');
      
        	        if ( $(id).length  ) {
        	            var offset = $(document).find(id).offset().top;
            	        sectionIDs.push(id);
            	        sectionOffsets.push(offset);
        	        }
        	        
        	    });
        	    browserHeight = $(window).height();
    	    }
    
    	    configure();
    	    $(window).on('resize', function(){
                configure();
            });
    	    
    	    //console.log(sectionIDs);
    	    //console.log(sectionOffsets);
    		
    		$(window).scroll(function(){
                var distanceFromTop = $(document).scrollTop();
                $.each(sectionOffsets, function(index, value) {
                    if ( (value - distanceFromTop < browserHeight / 2) && ( value - distanceFromTop > 0 ) ) {
                        id = sectionIDs[index];
                        if ( !$(id).hasClass('active') ) {
                            $('.fm_in_page_navigation a').removeClass('active');
                            $('.fm_in_page_navigation a[href="'+id+'"]').addClass('active');
                        }
                    }
                })
            });
            
            
            
    
    	});
    </script>
<? }