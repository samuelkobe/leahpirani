<?php
	$height = get_sub_field( 'image_height' );
  $image_1 = get_sub_field( 'image_one' );
  $image_2 = get_sub_field( 'image_two' );
  $video_1 = get_sub_field( 'video_one' );
  $video_2 = get_sub_field( 'video_two' );
	$video_element_1 = '<video
							class="w-full lg:w-1/2 h-auto lg:pr-12 xl:pr-14 lg:pb-36 xl:pb-64 mb-4 lg:mb-0 object-reveal"
							preload="metadata"
							muted
							autoplay
							loop
							playsinline
							src="' . $video_1 . '"
							type="video/mp4">
							Sorry, your browser doesn\'t support embedded videos.
            </video>';
	$video_element_2 = '<video
							class="w-full lg:w-1/2 h-auto lg:pl-12 xl:pl-14 lg:pt-36 xl:pt-64 object-reveal"
							preload="metadata"
							muted
							autoplay
							loop
							playsinline
							src="' . $video_2 . '"
							type="video/mp4">
							Sorry, your browser doesn\'t support embedded videos.
						</video>';
?>


<?php if ( get_row_layout() == 'paired_images' ) : ?>
  <?php if ( $height == 1 ) : ?>
    <section class="w-full px-8 md:px-16 lg:px-24 xl:px-32 2xl:container 2xl:mx-auto 3xl:px-64 relative">
      <div class="flex">
				<div class="flex flex-col lg:flex-row flex-wrap mb-4 mt-0 lg:my-16">
	        <img class="w-full lg:w-1/2 h-auto lg:pr-12 xl:pr-14 lg:pb-64 xl:pb-96 mb-4 lg:mb-0 object-cover object-reveal" src="<?php echo $image_1; ?>" alt="<?php the_title(); ?> work's 1st image should be here"/>
	        <img class="w-full lg:w-1/2 h-auto lg:pl-12 xl:pl-14 lg:pt-64 xl:pt-96 object-cover object-reveal" src="<?php echo $image_2; ?>" alt="<?php the_title(); ?> work's 2nd image should be here"/>
      	</div>
      </div>
    </section>
  <?php else : ?>
    <section class="w-full px-8 md:px-16 lg:px-24 xl:px-32 2xl:container 2xl:mx-auto 3xl:px-64 relative">
      <div class="flex">
				<div class="flex flex-col lg:flex-row flex-wrap mb-4 mt-0 lg:my-16">          
          <?php if ( get_sub_field( 'asset_type_paired' ) == 1 ) : ?>
            <img class="w-full lg:w-1/2 h-auto lg:pr-12 xl:pr-14 lg:pb-36 xl:pb-64 mb-4 lg:mb-0 object-reveal" src="<?php echo $image_1; ?>" alt="<?php the_title(); ?> work's 1st image should be here" />
            <img class="w-full lg:w-1/2 h-auto lg:pl-12 xl:pl-14 lg:pt-36 xl:pt-64 object-reveal" src="<?php echo $image_2; ?>" alt="<?php the_title(); ?> work's 2nd image should be here"/>
          <?php else : ?>
            <?php echo $video_element_1;?>
            <?php echo $video_element_2;?>
          <?php endif; ?>
      	</div>
      </div>
    </section>
  <?php endif; ?>
<?php endif ?>
