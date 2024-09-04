<? function fm_accordion($rows) {
    
    echo "<div class='fm_accordion'>";
        foreach ( $rows as $row ) {
            $title = $row['title'];
            $content = $row['content'];
            $button = $row["button_text"];

            echo "<div class='accordion'>";
            
                echo "<div class='accordion__intro'>";
                    echo "<div class='h3'>$title</div>";
                echo "</div>";
                echo "<div class='accordion__content'>";
                    echo $content;
                    if($row["button_text"]) {
                        fm_button($row["button_text"], "secondary", $row["open_in_a_new_tab"], $row["url_type"], $row["url"], $row["wordpress_content"]);
                    }
                echo "</div>";
            echo "</div>";
                
        }
    echo "</div>";
}