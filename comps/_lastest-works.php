<?php if ( have_rows( 'latest_works' ) ) : ?>
  <?php $lastest_anchor_classes = 'justify-start md:ml-16 lg:ml-20 xl:ml-48 3xl:ml-80'; ?>
  <?php $lastest_element_classes = 'w-full h-auto md:w-64 lg:w-96 2xl:w-144'; ?>
  <?php $work_counter = 0; ?>
  <div class="px-8 lg:px-4 sm:container sm:mx-auto">
  	<?php while ( have_rows( 'latest_works' ) ) : the_row(); ?>
      <div class="flex flex-col w-full mx-auto items-center justify-center lg:px-28 3xl:px-64">
        <p class="leading-normal lg:leading-loose text-xl lg:text-3xl mt-12 lg:mt-24"><?php the_field( 'designer_bio' ); ?></p>
        <h2 class="leading-normal text-lg xl:text-xl 2xl:text-2xl my-16 lg:my-32"><?php the_sub_field( 'latest_work_title' ); ?></h2>
      </div>
  		<?php $latest_work = get_sub_field( 'latest_work' ); ?>
  		<?php if ( $latest_work ) : ?>
        <div class="flex flex-col mb-24 lg:mb-72">
  			<?php foreach ( $latest_work as $post ) :  ?>
  				<?php setup_postdata( $post ); ?>
          <?php $lastest_anchor_classes = lastest_works_styles($work_counter); ?>
            <div class="flex items-center <?php echo $lastest_anchor_classes ?> relative object-reveal">
              <?php
                if ($work_counter == 2 || $work_counter == 4) {
                  $lastest_element_classes = 'w-full h-auto md:w-64 lg:w-96 2xl:w-144 my-4 md:my-0';
                } elseif ($work_counter == 3) {
                  $lastest_element_classes = 'w-full h-auto md:w-96 lg:w-128 2xl:w-192 my-4 md:my-16 xl:my-24 2xl:my-24';
                } else {
                  $lastest_element_classes = 'w-full h-auto md:w-64 lg:w-96 2xl:w-144 my-4 md:my-0';
                }
               ?>
              <a class="<?php echo $lastest_element_classes; ?> relative flex flex-col" href="<?php the_permalink(); ?>">
                <div class="order-2 md:order-1 md:absolute w-full h-auto md:h-full md:top-0 md:left-0 leading-normal text-base lg:text-lg md:opacity-0 md:hover:bg-tertiary md:hover:opacity-80 md:transition-color md:transition-opacity md:duration-300 p-0 md:p-4 lg:p-12">
                  <h3 class="opacity-50 md:opacity-100 mt-8 md:mt-0 mb-1"><?php the_title(); ?></h3>
                  <p class="md:opacity-50 mb-4 md:mb-0"><?php the_field( 'work_description' ); ?></p>
                </div>
                <picture class="flex w-full order-1 lg:order-2">
                  <?php if ( get_field( 'image_option' ) == 1 ) : ?>

                    <source class="w-full h-full" media="(min-width: 1024px)" srcset="<?php the_post_thumbnail_url('full'); ?>">
                    <source class="w-full h-full" media="(min-width: 768px)" srcset="<?php the_post_thumbnail_url('tablet'); ?>">
                    <img class="w-full h-full" src="<?php the_post_thumbnail_url('mobile'); ?>" alt="<?php the_title(); ?> work's image should be here"/>

                  <?php else : ?>

                    <?php if ( have_rows( 'manual_images' ) ) : ?>
                      <?php while ( have_rows( 'manual_images' ) ) : the_row(); ?>

                        <?php if ( have_rows( 'latest_work_images' ) ) : ?>
                    			<?php while ( have_rows( 'latest_work_images' ) ) : the_row(); ?>

                            <?php if ( get_sub_field( 'lastest_works_image_desktop' ) ) : ?>
                              <source class="w-full h-full" media="(min-width: 1024px)" srcset="<?php the_sub_field( 'lastest_works_image_desktop' ); ?>">
                              <?php endif ?>

                    				<?php if ( get_sub_field( 'lastest_works_image_tablet' ) ) : ?>
                              <source class="w-full h-full" media="(min-width: 768px)" srcset="<?php the_sub_field( 'lastest_works_image_tablet' ); ?>">
                    				<?php endif ?>

                            <?php if ( get_sub_field( 'lastest_works_image_mobile' ) ) : ?>
                              <img class="w-full h-full" src="<?php the_sub_field( 'lastest_works_image_mobile' ); ?>" alt="<?php the_title(); ?> work's image should be here"/>
                            <?php endif ?>

                    			<?php endwhile; ?>
                    		<?php endif; ?>

                      <?php endwhile; ?>
                    <?php endif; ?>

                  <?php endif; ?>
                </picture>
              </a>
            </div>

          <?php $work_counter ++; ?>

  			<?php endforeach; ?>
  			<?php wp_reset_postdata(); ?>
  		<?php endif; ?>
    </div>
  	<?php endwhile; ?>
  </div>
<?php endif; ?>
