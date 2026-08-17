<?php
	$size = get_sub_field( 'image_size' );
	$height = get_sub_field( 'image_height' );
	$image = get_sub_field( 'image' );
	$video = get_sub_field( 'video' );
	$video_element = '<video
							class="w-full h-auto object-reveal"
							preload="metadata"
							muted
							autoplay
							loop
							playsinline
							src="' . $video . '"
							type="video/mp4">
							Sorry, your browser doesn\'t support embedded videos.
						</video>';
?>


<?php if ( get_row_layout() == 'single_image' ) : ?>
	<?php switch ($size) {
		case 'full': ?>
			<section class="w-full relative">
				<div class="flex">
					<div class="w-full flex flex-col lg:flex-row flex-wrap mb-4 mt-0 lg:my-16">
						<?php if ( (int) $height == 1 ) : ?>
							<?php if ( get_sub_field( 'asset_type' ) == 1 ) : ?>
								<img class="w-full h-auto object-reveal" src="<?php echo $image; ?>" alt="<?php the_title(); ?> work's image should be here"/>
							<?php else : ?>
								<?php echo $video_element;?>
							<?php endif; ?>
						<?php else : ?>
							<?php if ( get_sub_field( 'asset_type' ) == 1 ) : ?>
								<img class="w-full h-25vh lg:h-40vh xl:h-56vh object-cover object-reveal" src="<?php echo $image; ?>" alt="<?php the_title(); ?> work's image should be here"/>
							<?php else : ?>
								<p class="text-primary text-3xl lg:text-5xl text-center mx-auto object-reveal">Videos cannot be added as banners. Check your settings for this Row.</p>
							<?php endif; ?>
						<?php endif; ?>
					</div>
				</div>
			</section>
			<?php break;
		case 'large': ?>
			<section class="w-full px-8 md:px-16 lg:px-24 xl:px-32 2xl:container 2xl:mx-auto relative">
				<div class="flex">
					<div class="w-full flex flex-col lg:flex-row flex-wrap mb-4 mt-0 lg:my-16">
						<?php if ( (int) $height == 1 ) : ?>
							<?php if ( get_sub_field( 'asset_type' ) == 1 ) : ?>
								<img class="w-full h-auto object-reveal" src="<?php echo $image; ?>" alt="<?php the_title(); ?> work's image should be here"/>
							<?php else : ?>
								<?php echo $video_element;?>
							<?php endif; ?>
						<?php else : ?>
							<?php if ( get_sub_field( 'asset_type' ) == 1 ) : ?>
								<img class="w-full h-25vh lg:h-40vh xl:h-56vh object-cover object-reveal" src="<?php echo $image; ?>" alt="<?php the_title(); ?> work's image should be here"/>
							<?php else : ?>
								<p class="text-primary text-3xl lg:text-5xl text-center mx-auto object-reveal">Videos cannot be added as banners. Check your settings for this Row.</p>
							<?php endif; ?>
						<?php endif; ?>
					</div>
				</div>
			</section>
			<?php break;
		case 'medium': ?>
		<section class="w-full px-8 md:px-16 lg:px-24 xl:px-32 2xl:container 2xl:mx-auto 3xl:px-64 relative">
			<div class="flex">
				<div class="w-full flex flex-col lg:flex-row flex-wrap mb-4 mt-0 lg:my-16">
					<div class="w-full lg:w-1/5"></div>
					<?php if ( get_sub_field( 'asset_type' ) == 1 ) : ?>
						<img class="w-full lg:w-3/5 h-auto object-reveal" src="<?php echo $image; ?>" alt="<?php the_title(); ?> work's image should be here"/>
					<?php else : ?>
						<video
							class="w-full lg:w-3/5 h-auto object-reveal"
							preload="metadata"
							muted
							autoplay
							loop
							playsinline
							src="<?php echo $video; ?>"
							type="video/mp4">
							Sorry, your browser doesn\'t support embedded videos.
						</video>
					<?php endif; ?>
					<div class="w-full lg:w-1/5"></div>
				</div>
			</div>
		</section>
		<?php break;

		default: ?>
			<p>Something went wrong.</p>
			<?php break;
	} ?>

<?php endif; ?>
