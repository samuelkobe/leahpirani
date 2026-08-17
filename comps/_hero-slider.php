<div class="swiper-container swiper-hero">

    <?php if ( have_rows( 'hero_works_slider' ) ) : ?>
      <div class="swiper-wrapper bg-tertiary w-full">
    	<?php while ( have_rows( 'hero_works_slider' ) ) : the_row(); ?>
    		<?php $work_for_hero_slider = get_sub_field( 'work_for_hero_slider' ); ?>
    		<?php if ( $work_for_hero_slider ) : ?>
    			<?php foreach ( $work_for_hero_slider as $post ) :  ?>
    				<?php setup_postdata( $post ); ?>
            <div class="swiper-slide w-full bg-tertiary">
              <div class="flex items-end justify-start relative w-full custom-h-screen">
                <?php if ( get_field( 'image_option' ) == 1 ) : ?>
                  <picture>
                    <source class="absolute top-0 left-0 w-full h-full object-cover" media="(min-width: 1640px)" srcset="<?php the_post_thumbnail_url('hero-large'); ?>">
                    <source class="absolute top-0 left-0 w-full h-full object-cover" media="(min-width: 1024px)" srcset="<?php the_post_thumbnail_url('hero'); ?>">
                    <source class="absolute top-0 left-0 w-full h-full object-cover" media="(min-width: 768px)" srcset="<?php the_post_thumbnail_url('tablet'); ?>">
                    <img class="absolute top-0 left-0 w-full h-full object-cover" src="<?php the_post_thumbnail_url('mobile'); ?>" alt="<?php the_title(); ?> work's image should be here"/>
                  </picture>
                <?php else : ?>

                <?php if ( have_rows( 'manual_images' ) ) : ?>
                  <?php while ( have_rows( 'manual_images' ) ) : the_row(); ?>

                    <?php if ( get_sub_field( 'asset_type' ) == 1 ) : ?>
                      <picture>
                        <?php if ( get_sub_field( 'hero_image' ) ) : ?>
                          <source class="absolute top-0 left-0 w-full h-full object-cover" media="(min-width: 1024px)" srcset="<?php the_sub_field( 'hero_image' ); ?>">
                        <?php endif ?>
                        <?php if ( get_sub_field( 'tablet_image' ) ) : ?>
                          <source class="absolute top-0 left-0 w-full h-full object-cover" media="(min-width: 768px)" srcset="<?php the_sub_field( 'tablet_image' ); ?>">
                        <?php endif ?>
                        <?php if ( get_sub_field( 'mobile_image' ) ) : ?>
                          <img class="absolute top-0 left-0 w-full h-full object-cover" src="<?php the_sub_field( 'mobile_image' ); ?>" alt="<?php the_title(); ?> work's image should be here"/>
                        <?php endif ?>
                      </picture>
                    <?php else : ?>

                      <?php 
                      $video = get_sub_field( 'hero_video' );
                      $video_element = '<video
                                          class="absolute top-0 left-0 w-full h-full object-cover"
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

                      <?php echo $video_element;?>

                    <?php endif; ?>

                  <?php endwhile; ?>
                <?php endif; ?>
              <?php endif; ?>

                <div class="fixed w-full z-10">
                  <div class="flex flex-col w-full h-32 relative px-8 md:px-16 lg:px-24 xl:px-32 3xl:px-64 2xl:container 2xl:mx-auto">

                    <div class="w-full h-16 flex flex-row items-end relative pb-6 sm:pb-0">

                      <div class="w-1/3">
                        <a class="inline-flex flex-col w-auto" href="<?php the_permalink(); ?>">
                          <h2 class="leading-normal text-lg xl:text-2xl"><?php the_title(); ?></h2>
                          <span class="leading-normal text-base xl:text-lg mb-2 md:mb-0 hover:text-gray-400 hover:transition-colors duration-250">View Project</span>
                        </a>
                        <div class="swiper-pagination text-secondary sm:hidden m-0 md:-ml-2"></div>
                      </div>

                      <div class="w-1/3 h-16 flex items-end justify-center relative -mb-6 sm:mb-0">
                        <a href="#" class="cta-arrow" aria-label="Call to action arrow - scroll down">
                          <div class="w-auto h-8 z-20 arrow-bounce relative">
                            <svg width="21px" height="25px" viewBox="0 0 21 25" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                              <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g transform="translate(-630.000000, -598.000000)" fill="#FFFFFF">
                                  <polygon transform="translate(640.500000, 610.500000) rotate(-270.000000) translate(-640.500000, -610.500000) " points="642.338902 600 641.156768 601.164279 649.799831 609.67664 628 609.67664 628 611.32336 649.799831 611.32336 641.156768 619.835721 642.338902 621 653 610.500082"></polygon>
                                </g>
                              </g>
                            </svg>
                          </div>
                        </a>
                      </div>

                      <div class="w-1/3 flex flex-row items-end justify-end">
                        <div class="hidden sm:inline swiper-pagination text-secondary"></div>
                      </div>

                    </div>


                    <div class="w-full h-16"></div>

                  </div>
                </div>

              </div>
            </div>
    			<?php endforeach; ?>
    			<?php wp_reset_postdata(); ?>
    		<?php endif; ?>
    	<?php endwhile; ?>
    <?php endif; ?>
  </div>
</div>
