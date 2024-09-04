<? function fm_icon(
    string $icon_post_id,
    string $color
    
) { 
    
    $slug = get_post_field('post_name', $icon_post_id);
    $classes = "$slug $color";
    $svg_code = get_field('svg_code', $icon_post_id);
    echo $svg_code = str_replace("<svg", "<svg class='$classes' ", $svg_code);
    
   
}