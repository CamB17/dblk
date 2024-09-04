<? 
function fm_gift_guide(
    array $gifts
) 
{

    if ( !empty($gifts) ) :
        echo "<div class='row gifts'>";
            foreach ( $gifts as $gift ) :
                
                $image = $gift['image'];
                $image_url = fly_get_attachment_image_src( $image['id'], array( 800, 600 ), true )['src'];
                $image_alt = $image['alt'];
                $title = $gift['title'];
                $description = $gift['description'];
                $tenant = $gift['associate_with_tennant'];
                $price = $gift['price'];
                $link = $gift['link'];
                ?>
                
                <div class='column small-12  medium-6 large-4 gift_column'>

                    <div class="gift_item">
                         <?php if ( $image ) : ?>
                            <div class="image">
                                <img src='<?php echo $image_url; ?>' alt='<?php echo $image_alt; ?>' />
                            </div>
                        <?php endif; ?>
                        <div class="top_content">
                            <?php if ( $title ) : ?>
                                <h2 class="h3"><?php echo $title; ?></h2>
                            <?php endif; ?>
                            <?php if ( $description ) : ?>
                                <p class="small"><?php echo $description; ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="bottom_content">
                            <?php if ( $tenant || $price ) : ?>
                            <div class="meta">
                                <?php if ( $tenant ) : ?>
                                    <div class="meta_item meta_tennant">From <?php echo $tenant->post_title; ?></div>
                                <?php endif; ?>
                                <?php if ( $price ) : ?>
                                    <div class="meta_item meta_price">$<?php echo $price; ?></div>
                                <?php endif; ?>
                            </div>
                            <?php endif; ?>
                            <?php
                                fm_button(
                                    button_text: 'Buy Now',
                                    button_color: 'tertiary',
                                    url: $link,
                                    open_in_a_new_tab: true,
                                );
                            ?>
                        </div>
                        <a target="_blank" tabindex='-1' href='<?php echo $link; ?>'  class='accessible-card-link'><span class='show-for-sr'>View <?php echo $title; ?></span></a>
                    </div>
                    
                </div>
              <?
                    
            endforeach;
        echo "</div>";
    endif;
    
    
    
}