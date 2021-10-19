<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <div <?php post_class(); ?>>

    <h1 class="headline"><?php the_title(); ?></h1>

    <?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>

    <?php the_content(); ?>

    <?php wp_link_pages(); ?>

  </div>

<?php endwhile; endif; ?>
