<div class="dblk-list">
<?

while ( tribe_events_have_month_days() ) : tribe_events_the_month_day(); ?>
   
	<?php
	// Get data for this day within the loop.
	$daydata = tribe_events_get_current_month_day(); 
	$day = tribe_events_get_current_month_day();
	
	
	
	// if not the same month or if same month AND today or later
	if ( 
		(
			date( 'n', strtotime( tribe_get_month_view_date() ) ) !== date('n') 
		) 
		
		||  
	
		( 
			date('n',strtotime($day['date'])) == date('n')  && date('j',strtotime($day['date'])) >= date('j') 
		) 
		
	)
	{
		
	?>

	<td class="<?php tribe_events_the_month_day_classes() ?>"
		data-day="<?php echo esc_attr( isset( $daydata['daynum'] ) ? $daydata['date'] : '' ); ?>"
		data-tribejson='<?php echo tribe_events_template_data( null, array( 'date_name' => tribe_format_date( $daydata['date'], false ) ) ); ?>'
		>
		<?php


	
		$events_label = ( 1 === $day['total_events'] ) ? tribe_get_event_label_singular() : tribe_get_event_label_plural();
		$date_label = date_i18n( tribe_get_date_option( 'dateWithoutYearFormat', 'F j' ), strtotime( $day['date'] ) );
		
	
		?>
		
		
		<!-- Day Header -->
		
		
			<?php if ( $day['total_events'] > 0 ) : ?>
				<div id="tribe-events-daynum-<?php echo $day['daynum-id'] ?>" class="day-title" data-day="<?= date('Y-m-d',strtotime($day['date'])); ?>">
					<?
						
						echo $newDate = date("l, F j", strtotime($day['date']));
						
					?>
				</div>
			<?php else : ?>
				
			<?php endif; ?>
		
		
		
		<!-- Events List -->
		<?php while ( $day['events']->have_posts() ) : $day['events']->the_post(); ?>
			<?
			global $post;

		
			$day      = tribe_events_get_current_month_day();
			$event_id = "{$post->ID}-{$day['date']}";
			$link     = tribe_get_event_link( $post );
			$title    = get_the_title( $post );
			$linkEsc = esc_url( $link );
			
			if ( $title !== "Weekly Run Club" ) :
			
			?>
			
			<div class="event">
				<div class="info">
					<div class="time">
						<?= $start_time = tribe_get_start_date( null, false, "g:iA" ); ?> - 
						<?= $start_time = tribe_get_end_date( null, false, "g:iA" ); ?>
					</div>
					
						<?
						$terms = get_the_terms($post, 'tribe_events_cat');
						if ( is_array($terms) ) :
							foreach($terms as $term) : ?>
								<div class="category">
									<span class="dot <?= $term->slug; ?>"></span> <?= $term->name; ?>
								</div>
							<? endforeach; ?>
						<? endif; ?>
						

					
				</div>
				<? if ( has_post_thumbnail() ) : ?>
					<a href="<?= get_the_permalink(); ?>">
						<div class="image">
						<?php echo tribe_event_featured_image( get_the_ID(), 'blog-post', false ); ?>
						</div>
					</a>
				<? endif; ?>
				<div class="content <? if ( !has_post_thumbnail() ) : ?>no-image<? endif; ?>  ">
					<span class="h4">
						<? the_title(); ?>
					</span>
					<? if ( tribe_get_venue() ) : ?>
						<h6>
							<?php echo tribe_get_venue() ?>
						</h6>
					<? endif; ?>
					<div class="excerpt">
						<p>
							<? the_excerpt(); ?>
						</p>
					</div>
					<a href="<? the_permalink(); ?>" class="button primary d">
						View Details
					</a>
				</div>
			</div>

			<? endif; ?>
		<?php endwhile; ?>
		
	
	</td>
	<?
	}
	?>
<?php endwhile; ?>
</div>