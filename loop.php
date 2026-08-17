<div class="flex flex-row flex-wrap">
<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	<div class="w-48 lg:w-1/2 2xl:w-1/3 mx-auto lg:mx-0 lg:px-4 mb-8 lg:mb-24">

		<a class="w-full inline-block" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
			<div class="flex flex-col lg:flex-row lg:flex-wrap w-full lg:items-center">

				<div class="w-full md:w-auto">
					<?php if ( has_post_thumbnail()) : ?>
						<?php the_post_thumbnail(array(120,120)); ?>
					<?php endif; ?>
				</div>

				<div class="w-auto mt-2 lg:mt-0 lg:ml-4">
					<h2 class="leading-normal text-xl xl:text-2xl"><?php the_title(); ?></h2>
					<p class="leading-normal text-base xl:text-xl"><?php the_time('M j, Y'); ?></p>
					<?//php the_time('g:i a'); ?>
					<?//php the_tags( __( 'Tags: ', 'html5blank' ), ', ', '<br>'); // Separated by commas with a line break at the end ?>
					<?//php _e( 'Categorised in: ', 'html5blank' ); the_category(', '); // Separated by commas ?>
				</div>

			</div>
		</a>
	</div>
	<?php endwhile; ?>
	<?php else: ?>
		<h2 class="leading-normal text-xl lg:text-3xl">Oops, looks like there are no posts at this time. Go back <a class="border-b-2" rel="Back home" href="<?php echo esc_url( home_url() ); ?>">home</a> to navigate the website.</h2>
<?php endif; ?>
</div>
