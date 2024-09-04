/*
Using this code will make a full box clickable
1. put the class "clickable_box" on the element holding the box
2. add a data element called link_selector to the element in #1 which tells the script where to find the link target
3. add the class "clickable" to every element which would has a link attached

for an example, see the fm_article_box
*/

jQuery(document).ready(function ($) {
    
    
    $('.clickable_box').each(function (e) {
        
        const box = this;
        const link_selector = $(this).data('link_selector');
        const main_link = box.querySelector(link_selector);
        //we are using 'a' here for simplicity but ideally you should put a class like 'clickable' on every clicable element inside box(a, button) and use that in query selector
        const clickable_elements = Array.from(box.querySelectorAll(".clickable"));
        clickable_elements.forEach((ele) => ele.addEventListener("click", (e) => e.stopPropagation()));

        function handle_click(event) {
            const no_text_selected = !window.getSelection().toString();
            if (no_text_selected) {
                main_link.click();
            }
        }
        box.addEventListener("click", handle_click);
    });
    
    
});
