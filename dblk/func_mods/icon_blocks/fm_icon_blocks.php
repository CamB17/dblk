<? function fm_icon_blocks(
    string $title = null,
    // wysiwyg
    string $description = null,
    array $icons
    
) { 
    
    if ( $title ) {
        echo "<div class='row title'>";
            echo "<div class='column'>";
                echo "<h2>$title</h2>";
                echo $description;
            echo "</div>";
        echo "</div>";
    }
    if ( !empty($icons) ) {
        echo "<div class='row icons'>";
            foreach ( $icons as $icon ) {
                
                $icon_clone = $icon['icon'];
                $icon_title = $icon['title'];
                $icon_description = $icon['description'];
                $icon_button = $icon['button'];
                
                
                echo "<div class='column content_icons'>";
                    // fm_icon(...$icon_clone);
                    (new dblk_module_wrapper(
                        name: 'icon',
                        params: $icon_clone,
                        background_color: "#fff",
                        padding_top: 0,
                        padding_bottom: 10,
                        element: "div"
                    ))->wrap();
                    echo $icon_title ? "<h5>$icon_title</h5>" : null;
                    echo $icon_description;
                    
                    if ( good_array($icon_button) )
                    {
                        echo "<div class='button_hold'>";
                            fm_button(...$icon_button);
                        echo "</div>";
                    }
                    
                echo "</div>";
                    
            }
        echo "</div>";
    }
}