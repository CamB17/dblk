<?php
function dblk_custom_images() {
  add_theme_support('post-thumbnails');
  // add_image_size('blog-post', 600, 370, true );
  // add_image_size('portrait-medium', 600, 800, true);
  // add_image_size('split-section', 1000, 550, true);
  // add_image_size('mainstage-image', 1600, 1000, true);
  // add_image_size('small-square', 500, 500, true);
}
add_action( 'after_setup_theme', 'dblk_custom_images' );

/**
How to use Fly Dynamic Image Size function
Get the image ID either through an array or by returning the ID directly
$image_id = get_sub_field('image')["ID"];
Using the fly_get_attachment_image_src() function, pass the image ID, then an array of the dynamic dimensions (this example will create an image size of 1000x600 pixels),
then a hard crop boolean. This returns an array with 'src' being the first key/value pair
$image_source = fly_get_attachment_image_src( $image_id, array( 1000, 600 ), true )['src'];
**/



/**
 * Responsive images
 */
function dblk_get_responsive_image($img_array, $classes = null, $alt_override = null, $high_priority = false)
{
    //Check if we're working with an image ID or an array
    $img_id = is_array($img_array) ? $img_array['ID'] : $img_array;
    

    if (empty($img_id)) return false;
    

    // Get image data
    $img_data = wp_get_attachment_metadata($img_id);
    $img_url = wp_get_attachment_url($img_id);
    $img_alt = $custom_alt ?: get_post_meta($img_id, '_wp_attachment_image_alt', true);
    $image_caption = wp_get_attachment_caption($img_id);

    // Get original dimensions
    $og_width = $img_data['width'] ?? null;
    $og_height = $img_data['height'] ?? null;
    $ratio = $og_width / $og_height;
    
    
    // set the widths that should be generated. be careful changing this! it will make all of the images that rely on this function regenerate if changed
    $widths = array(
        2880 => "",
        2048 => "",
        1440 => "",
        1024 => "",
        640 => ""
    );

    // loop through all of the preset widths to gather/generate the correct images
    foreach ($widths as $width => $value) {
        // if the original width is smaller/equal to this preset, get rid of the preset and set the largest width to the original width of the image
        if ($og_width <= $width) {
            unset($widths[$width]);
            $width = $og_width;
        }

        // generate the height of the image by rounding down the width / ratio
        $height = floor($width / $ratio);

        // set the image url according to the width key it corresponds to
        $widths[$width] = fly_get_attachment_image_src($img_id, array($width, $height), true)['src'] ?? null;
    }

    // sort the widths from smallest to largest
    ksort($widths);

    // generate the image srcset
    $o = "<img ";

    // print the image urls with the intrinsic size
    $o .= "srcset='";
    $x = 0;
    foreach ($widths as $width => $image_url) {
        $o .= $x > 0 ? ", " : "";
        $o .= "$image_url {$width}w";
        $x++;
    }

    // print the size selectors
    $o .= "' sizes='";
    $x = 0;
    foreach ($widths as $width => $image_url) {
        $o .= $x > 0 ? ", " : "";
        $o .= "(max-width: {$width}px) {$width}px";
        $x++;
    }

    $o .= "' ";

    // add any custom classes
    $classes .= $high_priority ? " skip-lazy" : "";
    $o .= $classes ? "class='$classes' " : null;

    // close things out with the fallback image and the alt tag
    $o .= "src='$img_url' ";
    $o .= "alt='$img_alt' ";

    $o .= $high_priority ? "fetchpriority='high' " : null;

    $o .= " />";

    return $o;
}