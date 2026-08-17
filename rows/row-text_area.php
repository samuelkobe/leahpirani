<section class="w-full px-8 md:px-16 2xl:container 2xl:mx-auto 3xl:px-64 relative">
  <div class="flex flex-row flex-wrap object-reveal">
    <div class="w-0 lg:w-1/4 2xl:w-1/5"></div>
    <div class="w-full lg:w-1/2 2xl:w-3/5 mb-16 mt-12 lg:my-16">
      <?php if ( get_row_layout() == 'text_area' ) : ?>
        <h2 class="text-secondary-dark text-base lg:text-2xl leading-snug"><?php the_sub_field( 'title' ); ?></h2>
        <div class="text-lg lg:text-3xl leading-snug mt-3">
          <?php the_sub_field( 'paragraphs' ); ?>
        </div>
      <?php endif; ?>
    </div>
    <div class="w-0 lg:w-1/4 2xl:w-1/5"></div>
  </div>
</section>
