<?php
/* Template Name: Works
Template Post Type: work */
get_header();
global $hide_the_content;
?>

  <main role="main">

    <?php the_post(); ?>

    <?php if (!post_password_required($post)) : ?>
      <?php $hide_the_content = 'hidden'; ?>
    <?php endif; ?>

    <section class="bg-tertiary <?php echo $hide_the_content; // this variable hides section after password has been provided ?>">
      <div class="w-full px-8 md:px-16 lg:px-24 xl:px-32 2xl:container 2xl:mx-auto 3xl:px-64 relative">
        <div class="flex flex-row items-center justify-center h-75vh">
          <?php the_content(); ?>
        </div>
      </div>
    </section>

    <?php if (!post_password_required($post)) : ?>

      <?php $hide_the_content = 'hidden'; ?>

      <section class="w-full bg-tertiary mb-8 lg:mb-16">
        <div class="flex items-end justify-start relative w-full custom-h-screen custom-h-screen-half">
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
          <div class="w-full px-8 md:px-16 lg:px-24 xl:px-32 2xl:container 2xl:mx-auto 3xl:px-64 relative z-10">
            <div class="flex flex-col items-start justify-center custom-h-screen custom-h-screen-half object-reveal animate-appear" style="animation-fill-mode: forwards;">

              <?php if ( get_field( 'title_option' ) == 1 ) : ?>
                <h1 class="leading-normal text-1.5xl md:text-3xl lg:text-5.5xl"><?php the_title(); ?></h1>
              <?php else : ?>
                <h1 class="leading-normal text-1.5xl md:text-3xl lg:text-5.5xl"><?php the_field( 'custom_banner_title' ); ?></h1>
              <?php endif; ?>

              <p class="leading-normal text-base md:text-lg lg:text-1.5xl mt-2 xl:mt-4"><?php the_field( 'work_attributes' ); ?></p>
            </div>
          </div>
        </div>

      </section>

      <?php // <section> added inside row loop
       if (have_rows('rows')):
        // loop through the rows of data
        while (have_rows('rows')) : the_row();
          $layout = get_row_layout();
          include 'rows/row-' . $layout . '.php';
        endwhile;
      endif; ?>

      <?php if ( get_field( 'team_section' ) == 1 ) : ?>
	      <section class="w-full px-8 md:px-16 lg:px-24 xl:px-32 2xl:container 2xl:mx-auto 3xl:px-64 relative">
          <?php get_template_part('comps/_work-team-section-content'); ?>
        </section>
      <?php else : ?>
	      <?php // echo 'false'; ?>
      <?php endif; ?>

    <?php endif; ?>

    <?php if (is_singular( 'work' )): ?>

      <section class="bg-gray-tertiary">
        <div class="w-full px-8 md:px-16 lg:px-24 xl:px-32 2xl:container 2xl:mx-auto 3xl:px-64 relative">
          <div class="flex flex-row items-center justify-center h-25vh">
            <?php get_template_part('parts/works-loop'); ?>
          </div>
        </div>
      </section>

    <?php endif; ?>

  </main>
<?php get_footer(); ?>
