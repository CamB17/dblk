<?php
/**
 * View: Checkbox Component
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe/events-filterbar/v2_1/components/checkbox.php
 *
 * See more documentation about our views templating system.
 *
 * @link http://evnt.is/1aiy
 *
 * @var string  $label   Label for the checkbox.
 * @var string  $value   Value for the checkbox.
 * @var string  $id      ID of the checkbox.
 * @var string  $name    Name attribute for the checkbox.
 * @var boolean $checked Whether the checkbox is checked or not.
 *
 * @version 5.0.0
 *
 */
 
 
// Get the custom field value for this category
$category_icon = get_field( 'category_icon', 'tribe_events_cat_' . $value );
$icon_src = $category_icon["url"];

$slug = get_term_by('term_taxonomy_id', $value);


if ($checked == 'checked'):
	$checked_class = 'is-checked';
else :
	$checked_class = 'is-not-checked';
endif;


?>
<div
	class="tribe-filter-bar-c-checkbox tribe-common-form-control-checkbox <?php echo $checked_class; ?> <?php echo $slug->slug; ?>">
	<input
		class="tribe-common-form-control-checkbox__input"
		id="<?php echo esc_attr( $id ); ?>"
		name="<?php echo esc_attr( $name ); ?>"
		type="checkbox"
		value="<?php echo esc_attr( $value ); ?>"
		<?php checked( $checked ); ?>
		data-js="tribe-filter-bar-c-checkbox-input"
	/>

	<label
		class="tribe-common-form-control-checkbox__label"
		for="<?php echo esc_attr( $id ); ?>"
	>
		<img src="<?php echo $icon_src; ?>" alt="<?php echo $label; ?> Icon" />
		<span><?php echo esc_html( $label ); ?></span>
	</label>
</div>



