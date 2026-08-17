<?php /* Template Name: Home Page */ get_header(); ?>

	<main role="main">

		<section>
			<?php get_template_part('comps/_hero-slider'); ?>
		</section>

		<section id="latest-works">
			<?php get_template_part('comps/_lastest-works'); ?>
		</section>

	</main>
<?php get_footer(); ?>
