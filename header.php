<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<link rel="stylesheet" type="text/css" href="https://unpkg.com/swiper/swiper-bundle.min.css">
		<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
		<script src="https://unpkg.com/scrollreveal"></script>
    <script>
        ScrollReveal({ reset: true });
    </script>

		<?php wp_head(); ?>

	</head>
	<body <?php body_class('bg-tertiary leading-normal text-secondary font-body'); ?>>

		<!-- site wrapper -->
		<div>

			<!-- header -->
			<header id="header" class="w-full h-32 z-50" role="banner">

				<div class="w-full px-8 md:px-16 lg:px-24 xl:px-32 2xl:container 2xl:mx-auto 3xl:px-64 relative">
					<div class="flex flex-row flex-wrap items-start pt-12 w-full">

						<div class="order-0 w-8/12">
							<a class="inline-block" href="<?php echo esc_url( home_url() );  ?>">
								<?php if ( get_field( 'text_or_logo_file_toggle', 'option' ) == 1 ) : ?>
									<h1 class="font-header leading-normal text-secondary text-base xl:text-xl uppercase"><?php the_field( 'header_title_text', 'option' ); ?></h1>
								<?php else : ?>
									<?php $menu_logo_file = get_field( 'menu_logo_file', 'option' ); ?>
									<?php if ( $menu_logo_file ) : ?>
										<img src="<?php echo esc_url( $menu_logo_file['url'] ); ?>" alt="<?php echo esc_attr( $menu_logo_file['alt'] ); ?>" />
									<?php endif; ?>
								<?php endif; ?>
							</a>
						</div>

						<div class="order-1 absolute w-1/6 mt-16 sm:mt-0 sm:relative sm:flex sm:flex-col sm:items-end">
							<!-- nav -->
							<nav id="menu" class="invisible" role="navigation">
								<?php html5blank_nav(); ?>
							</nav>
							<!-- /nav -->
						</div>

						<div class="order-2 w-1/3 sm:w-1/6 flex justify-end items-start">
							<!-- button -->
							<button id="menu-button" class="hamburger inline-flex flex-col items-center justify-start h-4 focus:outline-none mt-2" type="button" name="navigation button" aria-label="navigation button">
								<span class="w-8 h-2px bg-secondary inline-block mb-1 transition-transform ease-out duration-150 origin-custom"></span>
								<span class="w-8 h-2px bg-secondary inline-block mt-1 transition-transform ease-out duration-150 origin-custom"></span>
							</button>
							<!-- /button -->
						</div>

					</div>
				</div>

			</header>
			<!-- /header -->

			<!-- header menu background overlay -->
			<div class="fixed h-screen w-full bg-tertiary menu-overlay">
				<div class="hidden md:flex 2xl:container 2xl:mx-auto relative w-full h-full">
					<div id="menu-image-location" class="hidden absolute top-50p lg:bottom-0 left-0 mb-32 ml-8 md:ml-16 lg:ml-24 xl:ml-32 3xl:ml-64 border-gray-100 md:w-80 md:h-80 xl:w-128 xl:h-128 w-full">
						<img class="blackout bottom absolute top-0 left-0 object-cover w-full h-full" src="<?php bloginfo('template_url'); ?>/img/blackout.jpg" alt="Title here eventually">
						<img class="top absolute top-0 left-0 object-cover w-full h-full" src="<?php bloginfo('template_url'); ?>/img/blackout.jpg" alt="Title here eventually">
					</div>
				</div>
			</div>
			<!-- /header menu background overlay -->
