<?php if (get_sub_field('buttons')): ?>

    <?php while(has_sub_field('buttons')): ?>

        <? fm_button(); ?>

    <?php endwhile; ?>

<?php endif; ?>
