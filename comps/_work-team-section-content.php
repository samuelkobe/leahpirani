<div class="flex flex-row items-center justify-left object-reveal">
  <div class="w-full my-8 lg:my-16">
    <h3 class="leading-normal text-lg lg:text-xl mb-2 lg:mb-4 text-secondary-dark"><?php the_field( 'team_title' ); ?></h3>
      <?php if ( have_rows( 'teammates' ) ) : ?>
        <ul>
        	<?php while ( have_rows( 'teammates' ) ) : the_row(); ?>
            <li class="leading-normal text-base lg:text-lg"><?php the_sub_field( 'teammate_name' ); ?> | <?php the_sub_field( 'teammate_role' ); ?></li>
        	<?php endwhile; ?>
        </ul>
      <?php else : ?>
      	<?php // no rows found ?>
      <?php endif; ?>
  </div>
</div>
