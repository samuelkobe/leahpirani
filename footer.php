			<!-- footer -->
			<footer role="contentinfo">

				<div class="w-full px-8 md:px-16 lg:px-24 xl:px-32 2xl:container 2xl:mx-auto 3xl:px-64 relative">
					<div id="contact" class="flex flex-col flex-wrap items-start lg:pt-12 mb-8 lg:mb-0 w-full h-32 lg:h-37vh">

						<p class="leading-normal text-primary text-2xl xl:text-3xl"><?php the_field( 'footer_title_text', 'option' ); ?></p>
						<a class="leading-normal text-2xl xl:text-3xl inline-block hover:opacity-50 transition-opacity duration-300" href="mailto:<?php the_field( 'contact_email', 'option' ); ?>" target="_blank"><?php the_field( 'contact_email', 'option' ); ?></a>
						<?php if ( get_field( 'cv_file', 'option' ) ) : ?>
							<a class="inline-block mt-8 hover:opacity-50 transition-opacity duration-300" href="<?php the_field( 'cv_file', 'option' ); ?>" title="<?php the_field( 'cv_link_text', 'option' ); ?>" download><?php the_field( 'cv_link_text', 'option' ); ?></a>
						<?php endif; ?>
					</div>
				</div>

			</footer>
			<!-- /footer -->

		</div>
		<!-- /wrapper -->
		<script type="text/javascript">
			ScrollReveal().reveal('.object-reveal', { delay: 250, easing: 'ease-in-out', distance: '6rem', reset: false });
		</script>
		<?php wp_footer(); ?>


	</body>
</html>
