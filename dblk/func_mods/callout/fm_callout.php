<? 
function fm_callout (
    $background_color = null,
    $headline = null,
    $button_text = null,
    $button_color = null,
    $open_in_a_new_tab = null,
    $url_type = null,
    $url = null,
    $wordpress_content = null
)
{  ?>
       <? ?>
        <div class="callout <?= $background_color; ?>">
            <?
                $img_src = get_template_directory_uri() . "/_images/blobs/";
                switch ($background_color) {
                    case 'bg_dark bg_rust3':
                        $img_src .= "blob-bg-callout-rust.png";
                    break;
                    case 'bg_dark bg_teal3':
                        $img_src .= "blob-bg-callout-teal.png";
                    break;
                    case 'bg_dark bg_red3':
                        $img_src .= "blob-bg-callout-red.png";
                    break;
                    case 'bg_dark bg_marigold3':
                        $img_src .= "blob-bg-callout-marigold.png";
                    break;
                }
            ?>
            <img src="<?= $img_src; ?>" alt="" role="presentation" />
            <div class='row'>
                <div class='columns small-12 medium-6'>
                    <h3><?= $headline; ?></h3>
                </div>
                <div class='columns small-12 medium-3 medium-offset-3 button_hold'>
                    <? 
                        fm_button(
                            "$button_text", 
                            'secondary', 
                            $open_in_a_new_tab, 
                            $url_type,
                            $url,
                            $wordpress_content
                        );
                    ?>
                </div>
            </div>
        </div>
<? }