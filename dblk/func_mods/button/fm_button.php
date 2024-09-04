<?
function fm_button(
    string $button_text, 
    string $button_color = null, 
    // true or false
    bool $open_in_a_new_tab = false, 
    // "url" or "wordpress_content"
    string $url_type = "url",
    string $url = null,
    // post id
    int $wordpress_content = null,
    string $extra_classes = null
) {
    
    $url = $url_type == "WordPress Content" ? get_the_permalink($wordpress_content) : $url;

    $target_string = $open_in_a_new_tab ? "target='_blank'" : "";

    
    echo "<a href='$url' class='fm_button $button_color $extra_classes' $target_string >";
        echo $button_text;
    echo "</a>";
}