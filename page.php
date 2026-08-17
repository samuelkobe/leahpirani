<?php get_header(); ?>

	<main role="main">

		<section class="w-full bg-tertiary mb-8 lg:mb-16">

			<div class="flex items-end justify-start relative w-full custom-h-screen custom-h-screen-half">

				<picture>
					<source class="absolute top-0 left-0 w-full h-full object-cover" media="(min-width: 1640px)" srcset="<?php the_post_thumbnail_url('hero-large'); ?>">
					<source class="absolute top-0 left-0 w-full h-full object-cover" media="(min-width: 1024px)" srcset="<?php the_post_thumbnail_url('hero'); ?>">
					<source class="absolute top-0 left-0 w-full h-full object-cover" media="(min-width: 768px)" srcset="<?php the_post_thumbnail_url('tablet'); ?>">
					<img class="absolute top-0 left-0 w-full h-full object-cover" src="<?php the_post_thumbnail_url('mobile'); ?>" alt="<?php the_title(); ?>'s image should be here"/>
				</picture>

				<div class="w-full px-8 md:px-16 lg:px-24 xl:px-32 2xl:container 2xl:mx-auto relative z-10">
					<div class="flex flex-col items-start justify-center custom-h-screen custom-h-screen-half object-reveal animate-appear" style="animation-fill-mode: forwards;">
						<h1 class="leading-normal text-1.5xl md:text-3xl lg:text-5.5xl"><?php the_title(); ?></h1>
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

			<?php if (have_posts()): while (have_posts()) : the_post(); ?>
				<section class="w-full px-8 md:px-16 2xl:container 2xl:mx-auto relative">
					<div class="flex flex-row flex-wrap object-reveal">
						<div class="w-0 lg:w-1/4 2xl:w-1/5"></div>
						<div class="w-full lg:w-1/2 2xl:w-3/5 my-8 lg:my-16">
							<div class="leading-normal text-base lg:text-xl content-area">
								<?php the_content(); ?>
							</div>
						</div>
						<div class="w-0 lg:w-1/4 2xl:w-1/5"></div>
					</div>
				</section>
			<?php endwhile; ?>

			<?php endif; ?>

	</main>

<?php get_footer(); ?>
