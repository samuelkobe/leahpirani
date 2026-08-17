<?php get_header(); ?>

	<main role="main">

		<section class="bg-tertiary object-reveal">
			<div class="w-full px-8 md:px-16 2xl:container 2xl:mx-auto pt-40 lg:pt-48 mb-24 relative">
				<div class="flex flex-row items-center justify-center h-auto">
					<div class="w-0 lg:w-1/6"></div>
					<p class="leading-normal text-2xl lg:text-4xl w-full w-2/3">Please navigate projects <a class="border-b-2" rel="Back home" href="<?php echo esc_url( home_url() ); ?>">here</a>.</p>
					<div class="w-0 lg:w-1/6"></div>
				</div>
			</div>
		</section>

		<section class="bg-tertiary object-reveal">
			<div class="w-full px-8 md:px-16 2xl:container 2xl:mx-auto pb-40 lg:pb-48 mt-24 relative">
				<div class="flex flex-row items-start justify-center h-auto">
					<div class="w-full lg:w-3/4">
						<h1 class="leading-normal text-3xl lg:text-5xl mb-12"><?php _e( 'All Works', 'html5blank' ); ?></h1>
						<?php get_template_part('loop'); ?>
						<?php get_template_part('pagination'); ?>
					</div>
				</div>
			</div>
		</section>

	</main>

<?php get_footer(); ?>
