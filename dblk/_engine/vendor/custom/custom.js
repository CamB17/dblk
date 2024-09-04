// add padding to the top of body for the fixed header
jQuery(document).ready(function ($) {
    // Wrap iframes from youtube in div
    $('iframe[src*="youtube"]').wrap("<div class='iframe_wrapper'></div>");
    $(document).on("keypress", function (e) {
        // if you press control + w, this will take you to the login screen and will redirect you back to your current page
        if (e.ctrlKey && (e.which === 23)) {
            window.location.replace("/wp-login.php?redirect_to=" + window.location.pathname);
        }
        // if you press control + e, this will toggle error mode in php by redirecting you to ?e and back
        if (e.ctrlKey && (e.which === 5)) {
            if (window.location.href.indexOf("?e") >= 0) {
                window.location.replace(window.location.origin + window.location.pathname);
            }
            else {
                window.location.replace(window.location.origin + window.location.pathname + "?e");
            }
        }
    });
    // Commenting this out. Needed to disable our version of select2, as it was causing issues with the events calendar plugin.
    // $('.gform_wrapper select').select2({
    //     minimumResultsForSearch: Infinity
    // });
    
    // open all external links in a new tab automatically (set the target attribute on them to _blank)
    var siteDomain = window.location.host;

    $('a[href^="http://"], a[href^="https://"]').each(function() {
        var linkDomain = new URL($(this).attr('href')).host;
        
        if (linkDomain !== siteDomain) {
            $(this).attr('target', '_blank');
            $(this).attr('rel', 'noopener');
        }
    });
    
    // Move GravityForms legend below the last field (only forms added to page builder)
    // Select the .gform_required_legend and its parent .gform_heading
    var $requiredLegend = $('.wysiwyg #gform_wrapper_12 .gform_required_legend').closest('.gform_heading');

    // Find the last field of the gform-body, which should be just above the .gform_footer
    var $lastField = $('.wysiwyg #gform_wrapper_12 .gform_body').children().last();

    if ($requiredLegend.length == 0) {
        $requiredLegend = '<div class="gform_heading"> <p class="gform_required_legend">"<span class="gfield_required gfield_required_asterisk">*</span>" indicates required fields</p> </div>';
        $('.wysiwyg #gform_wrapper_12 .gform_body').append($requiredLegend);
    } else {
        // Move the $requiredLegend to just after the last field of the gform-body
        $requiredLegend.insertAfter($lastField);
    }
});