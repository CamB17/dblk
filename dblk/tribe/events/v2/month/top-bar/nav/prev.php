<?php
/**
 * View: Top Bar Navigation Previous Template
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe/events/v2/month/top-bar/nav/prev.php
 *
 * See more documentation about our views templating system.
 *
 * @link http://evnt.is/1aiy
 *
 * @var string $prev_url The URL to the previous page, if any, or an empty string.
 *
 * @version 5.3.0
 *
 */
 
use Tribe__Date_Utils as Dates;

$default_date        = $now;
$selected_date_value = $this->get( [ 'bar', 'date' ], $default_date );
$datepicker_date     = Dates::build_date_object( $selected_date_value )->format( $date_formats->compact );


if ($selected_date_value) :
	$date = $selected_date_value; 
else:
	$date = $now;
endif;


$past_date = date('F o', strtotime($date. ' -1 month'));
?>

	<a
		href="<?php echo esc_url( $prev_url ); ?>"
		class="tribe-common-c-btn-icon tribe-common-c-btn-icon--caret-left tribe-events-c-top-bar__nav-link tribe-events-c-top-bar__nav-link--prev"
		aria-label="<?php esc_attr_e( 'Previous month', 'the-events-calendar' ); ?>"
		title="<?php esc_attr_e( 'Previous month', 'the-events-calendar' ); ?>"
		data-js="tribe-events-view-link"
		rel="<?php echo esc_attr( $prev_rel ); ?>"
	>
		<?php $this->template( 'components/icons/caret-left', [ 'classes' => [ 'tribe-common-c-btn-icon__icon-svg', 'tribe-events-c-top-bar__nav-link-icon-svg' ] ] ); ?>
		<span class="show-for-large"><?php echo $past_date; ?></span>
	</a>

