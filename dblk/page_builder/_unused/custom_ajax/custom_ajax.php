<script type="text/javascript">
	jQuery(document).ready(function($){
		
	    dblk_custom_ajax();
	    
        function dblk_custom_ajax(download, title) {
            $.ajax({
                url: '/wp-admin/admin-ajax.php',
                type: 'post',
                data: {
                    action: 'dblk_custom_ajax',
                    test: "exists",
                },
                success: function(data) {
                    console.log(data);
                }
            });
        }

	});
</script>