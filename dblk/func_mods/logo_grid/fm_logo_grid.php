<? 
function fm_logo_grid (
    $headline = null,
    $logo_one = null,
    $external_url_one = null,
    $logo_two = null,
    $external_url_two = null,
    $logo_three = null,
    $external_url_three = null
)
{  ?>
    <div class="logo-grid row">
        <div class="lg-headline columns large-4 medium-12">
            <h2><?= $headline; ?></h2>
        </div>
        <div class="logo-container columns large-8 medium-12">
            <? if($logo_one) : ?>
                <? if($external_url_one) : ?>
                    <a class="logo logo-1" href="<?= $external_url_one; ?>" target="_blank">
                        <img src="<?= $logo_one['url']; ?>" alt="<?php echo $logo_one['alt']; ?>" />
                    </a>
                <? else : ?>
                    <div class="logo logo-1">
                        <img src="<?= $logo_one['url']; ?>"  alt="<?php echo $logo_one['alt']; ?>" />
                    </div>
                <? endif; ?>
            <? endif; ?>
            <? if($logo_two) : ?>
                <? if($external_url_two) : ?>
                    <a class="logo logo-2" href="<?= $external_url_two; ?>" target="_blank">
                        <img src="<?= $logo_two['url']; ?>"  alt="<?php echo $logo_two['alt']; ?>" />
                    </a>
                <? else : ?>
                     <div class="logo logo-2">
                        <img src="<?= $logo_two['url']; ?>"  alt="<?php echo $logo_two['alt']; ?>" />
                    </div>
                <? endif; ?>
            <? endif; ?>
            <? if($logo_three) : ?>
                <? if($external_url_three) : ?>
                    <a class="logo logo-3" href="<?= $external_url_three; ?>" target="_blank">
                        <img src="<?= $logo_three['url']; ?>"  alt="<?php echo $logo_three['alt']; ?>" />
                    </a>
                <? else : ?>
                     <div class="logo logo-3">
                        <img src="<?= $logo_three['url']; ?>"  alt="<?php echo $logo_three['alt']; ?>" />
                    </div>
                <? endif; ?>
            <? endif; ?>
        </div>
    </div>
<? 
}