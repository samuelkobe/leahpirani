<?php get_header(); ?>

	<main role="main">

		<section class="bg-tertiary">
      <div class="w-full px-8 md:px-16 lg:px-24 xl:px-32 2xl:container 2xl:mx-auto relative">
        <div class="flex flex-col items-center justify-center h-56vh md:h-75vh pt-32">
          <h1 class="leading-normal text-2xl lg:text-4xl mb-2"><?php _e( 'This page doesn\'t exist.', 'html5blank' ); ?></h1>
					<h2 class="leading-normal text-base lg:text-xl">
						<a class="hover:opacity-50 transition-opacity duration-300" href="<?php echo home_url(); ?>"><?php _e( 'Return home?', 'html5blank' ); ?></a>
					</h2>
        </div>
      </div>
    </section>

	</main>

<?php get_footer(); ?>
