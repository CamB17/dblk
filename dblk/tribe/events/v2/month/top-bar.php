<?php
/**
 * View: Top Bar
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe/events/v2/month/top-bar.php
 *
 * See more documentation about our views templating system.
 *
 * @link http://evnt.is/1aiy
 *
 * @version 5.0.1
 *
 */
?>
<div class="tribe-events-c-top-bar tribe-events-header__top-bar">

	<?php $this->template( 'month/top-bar/nav/prev' ); ?>

	<?php

	?>

	<time
		datetime="<?php echo esc_attr( $the_date->format( 'Y-m' ) ); ?>"
		class="tribe-events-c-top-bar__datepicker-time"
	>
		<span class="tribe-events-c-top-bar__datepicker-mobile">
			<?php echo esc_html( $formatted_grid_date ); ?>
		</span>
		<span class="tribe-events-c-top-bar__datepicker-desktop tribe-common-a11y-hidden">
			<?php echo esc_html( $formatted_grid_date ); ?>
		</span>
	</time>
	
	<?php $this->template( 'month/top-bar/nav/next' ); ?>
	

	<?php $this->template( 'components/top-bar/actions' ); ?>

</div>
