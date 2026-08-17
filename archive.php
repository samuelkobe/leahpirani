<?php get_header(); ?>

	<main role="main">

		<section class="bg-tertiary">
			<div class="w-full px-8 md:px-16 lg:px-24 xl:px-32 2xl:container 2xl:mx-auto relative">
				<div class="flex flex-row items-center justify-center custom-h-screen">
          <div class="w-0 lg:w-1/6"></div>
					<div class="w-1/3">
						<h1><?php _e( 'Archives', 'html5blank' ); ?></h1>
						<?php get_template_part('loop'); ?>
						<?php get_template_part('pagination'); ?>
					</div>
          <div class="w-0 lg:w-1/6"></div>
				</div>
			</div>
		</section>

	</main>

<?php get_footer(); ?>
