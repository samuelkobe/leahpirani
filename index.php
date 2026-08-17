<?php get_header(); ?>

	<main role="main">

		<section class="bg-tertiary object-reveal">
			<div class="w-full px-8 md:px-16 2xl:container 2xl:mx-auto py-40 lg:py-48 relative">
				<div class="flex flex-row items-center justify-center h-auto">
					<div class="w-full lg:w-3/4">
						<h1 class="leading-normal text-3xl lg:text-5xl mb-12"><?php _e( 'Latest Posts', 'html5blank' ); ?></h1>
						<?php get_template_part('loop'); ?>
						<?php get_template_part('pagination'); ?>
					</div>
				</div>
			</div>
		</section>

	</main>

<?php get_footer(); ?>
