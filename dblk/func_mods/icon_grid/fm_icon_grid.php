<? function fm_icon_grid (
   $pre_headline = null,
   $headline = null,
   $icon_group = null
    
) { 
    ?>
      <div class="row">
        <div class="columns small-12 icon_headlines">
            <h5><?= $pre_headline; ?></h5>
            <h1><?= $headline; ?></h1>
        </div>
    </div>
      <div class="row">
        <? if ( is_array($icon_group) ) {
            foreach ( $icon_group as $icon ) {
                $icon_clone =  $icon['icon_post_id'];
                $icon_color = $icon['color'];
                ?> 
            <div class="columns small-12 medium-6 large-3 icon_columns">
                <div class="icon_group">
                    <? (new dblk_module_wrapper(
                        name: 'icon',
                        params: [$icon_clone, $icon_color],
                        background_color: "#fff",
                        padding_top: 0,
                        padding_bottom: 10,
                        element: "div"
                    ))->wrap(); ?>
                    <h2><?= $icon['group_value']; ?> </h2>
                    <h3 class="h6"><?= $icon['group_label']; ?> </h3>
                </div>
            </div>
        <? } } ?>
    </div>
<? }