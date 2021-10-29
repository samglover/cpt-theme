<?php namespace CPT_Sites\Template_Parts; ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <div <?php post_class(); ?>>

    <?php if ( ! is_front_page() ) { ?>
      <h1 class="headline"><?php the_title(); ?></h1>
    <?php } ?>

    <?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>

    <?php the_content(); ?>
    <div class="clearfix"></div>

    <?php if ( ! is_front_page() ) { ?>
      <p class="post-byline">By <?php the_author(); ?>. Last updated on <?php the_modified_date( 'F jS, Y' ); ?>.</p>
    <?php } ?>

    <?php wp_link_pages(); ?>

  </div>

<?php endwhile; endif; ?>
