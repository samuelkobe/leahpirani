<?php
/* Template Name: Works Teaser
Template Post Type: work */

get_header(); ?>

	<main role="main">

		<section class="bg-tertiary">
      <div class="w-full px-8 md:px-16 lg:px-24 xl:px-32 2xl:container 2xl:mx-auto relative">
        <div class="flex flex-col items-center justify-center h-56vh md:h-75vh pt-32">
          <h1 class="leading-normal text-2xl lg:text-4xl mb-2"><?php the_title(); ?> is not available yet</h1>
					<h2 class="leading-normal text-base lg:text-xl">This project is currently not available to the public</h2>
        </div>
      </div>
    </section>

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
