<? function fm_cta_banner() { ?>
    <div class="row align-middle ">
        <div class="columns align-left content">
            <? if ( get_sub_field('title') ) : ?>
                <h2><?= get_sub_field('title'); ?></h2>
            <? endif; ?>
            <p><?= get_sub_field('description'); ?></p>
            
        </div>
        <div class="columns text-right cta">
            <?php if (get_sub_field('buttons')): ?> 
            
            	<?php while(has_sub_field('buttons')): ?>
            
                    <? //fm_button(); ?>
            
            	<?php endwhile; ?>
            
            <?php endif; ?>
        </div>
    </div>
    
    

<? } ?>