<?php
	$type = get_sub_field( 'image_type' );
?>

<?php if ( get_row_layout() == 'multiple_images' ) : ?>
	<?php if ( (int) $type ) : ?>

		<section class="w-full px-8 md:px-16 lg:px-24 xl:px-32 2xl:container 2xl:mx-auto 3xl:px-64 relative">
			<?php if ( have_rows( 'cluster_images' ) ) : ?>
				<div class="flex flex-row flex-wrap my-6 md:my-12 lg:my-16 2xl:px-16">
					<?php while ( have_rows( 'cluster_images' ) ) : the_row(); ?>
						<?php if ( get_sub_field( 'image' ) ) : ?>
							<img class="w-1/3 h-20 sm:h-32 md:h-48 lg:h-64 xl:h-80 px-2 sm:px-4 md:px-8 even:mt-2 sm:even:mt-4 lg:even:mt-8 xl:even:mt-16 object-cover object-reveal" src="<?php the_sub_field( 'image' ); ?>" alt="<?php the_title(); ?> work's image should be here"/>
						<?php endif ?>
					<?php endwhile; ?>
				</div>
			<?php endif; ?>
		</section>

	<?php else : ?>

		<?php
			while ( have_rows( 'masonry_images' ) ) : the_row();
				$image_1 = get_sub_field( 'image_one' );
				$image_2 = get_sub_field( 'image_two' );
				$image_3 = get_sub_field( 'image_three' );
			endwhile;
		 ?>

		<section class="w-full px-8 md:px-16 lg:px-24 xl:px-32 2xl:container 2xl:mx-auto 3xl:px-64 relative">
			<?php if ( have_rows( 'masonry_images' ) ) : ?>
				<div class="flex flex-col lg:flex-row flex-wrap items-center mt-6 mb-4 md:mt-12 lg:my-16">
					<div class="flex flex-col w-full lg:w-1/2">
						<img class="w-full h-auto mb-4 lg:mb-24 xl:mb-28 lg:pr-12 xl:pr-14 object-cover object-reveal" src="<?php echo $image_1; ?>" alt="<?php the_title(); ?> work's 1st image should be here"/>
						<img class="w-full h-auto lg:pr-12 xl:pr-14 object-cover object-reveal" src="<?php echo $image_2; ?>" alt="<?php the_title(); ?> work's 2nd image should be here"/>
					</div>
					<div class="w-full lg:w-1/2 mt-4 lg:mt-0">
						<img class="w-full h-auto lg:mb-16 xl:mb-16 lg:pl-12 xl:pl-14 object-cover object-reveal" src="<?php echo $image_3; ?>" alt="<?php the_title(); ?> work's 3rd image should be here"/>
					</div>
				</div>
			<?php endif; ?>
		</section>

	<?php endif; ?>

<?php endif; ?>
