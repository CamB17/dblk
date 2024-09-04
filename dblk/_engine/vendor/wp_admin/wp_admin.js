jQuery(document).ready(function ($) {
    $('body').on('click', '[data-event=remove-layout]', function (e) {
        return confirm("Delete widget?");
    });
    //alert('h');
    function add_column_width_to_heading() {
        $('.widthHelper').remove();
        $('.acf-field-56bd005663e12').each(function () {
            var width = $(this).find('.acf-input select option:selected').text();
            var width = "<span class='widthHelper'> - " + width + "</span>";
            $(this).parent().siblings('.acf-fc-layout-handle').append(width);
        });
    }
    $(window).load(function () {
        add_column_width_to_heading();
    });
    $('.acf-fc-layout-handle').click(function () {
        function show_popup() {
            add_column_width_to_heading();
        };
        window.setTimeout(show_popup, 700);
    });
    $(document).on('change', '.acf-field-56bd005663e12 select', function () {
        add_column_width_to_heading();
    });
    $('.layout[data-layout=additional_modules] .acf-fc-layout-handle').each(function () {
        $(this).append('<span class="module"> - ' + $(this).parent().find('.acf-field[data-key="field_588281987bc05"] option:selected').text() + '</span>');
    });
    $(document).on('change', '.layout[data-layout=additional_modules] .acf-field-588281987bc05 select', function () {
        $(this).parent().parent().parent().parent().find('.acf-fc-layout-handle span.module').text(" - " + $(this).find('option:selected').text());
    });
    $('.acf-field-object[data-key="field_56bcfeb92630c"] > .handle > ul > li > strong > a.edit-field').click();
    // add class to right column on edit pages after scroll for the fixing of the right column
    $(window).scroll(function () {
        var distance_from_top = $(window).scrollTop();
        if (distance_from_top > 150) {
            $('body').addClass('wp_admin_scrolled')
        }
        else {
            $('body').removeClass('wp_admin_scrolled')
        }
    });
    /*
    This script will add a collapse button to repeater tables 
    */
    // find all repeater tables with a collapse button and add to an array
    var repeater_tables = [];
    $('table.acf-table').each(function () {
        if ($(this).find('a.-collapse').length) {
            repeater_tables.push($(this));
        }
    });
    // for each repeater table with a collapse button add the UI buttons for Toggle Collapse
    $(repeater_tables).each(function () {
        // add a text based button to the top
        $(this).prepend("<div class='text acf_toggle_collapse_all'>Toggle Collapse</div>");
        // add a wordpress styled button in the button row
        $(this).siblings('.acf-actions').prepend('<a class="acf-button button button-secondary acf_toggle_collapse_all" href="#">Toggle Collapse</a>')
    });
    // assume it starts as collapsed (it doesn't always, making this smarter would be good)
    var collapsed = 0;
    // any time one of the two buttons is clicked...
    $('.acf-repeater').on('click', '.acf_toggle_collapse_all', function () {
        // if we're dealing with the button version...
        if ($(this).hasClass('acf-button')) {
            // correctly assign the acf_table element
            acf_table = $(this).parent().siblings('.acf-table');
            // if it was expanded, scroll the window to the top of this repeater
            if (collapsed == 0) {
                $([document.documentElement, document.body]).animate({
                    scrollTop: acf_table.offset().top - 170
                }, 1000);
            }
        }
        // if we're dealing with the text version at the top, assign the acf_table element
        else {
            acf_table = $(this).parent('.acf-table');
        }
        // if it is not collapsed
        if (collapsed == 0) {
            //click on the collapse button (for any rows that are not already collapsed)
            $(acf_table).find('.acf-row:not(.-collapsed) a.-collapse').click();
            // and mark the status as collapsed
            collapsed = 1;
        }
        // if it is collapsed...
        else {
            // click on the collapse button (for any rows that are already collapsed)
            $(acf_table).find('.acf-row.-collapsed a.-collapse').click();
            // and mark the status as not collapsed
            collapsed = 0;
        }
    });
});
