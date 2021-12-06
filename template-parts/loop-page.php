<?php namespace CPT_Theme\Template_Parts; ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <main id="content" <?php post_class(); ?>>

    <?php if ( ! is_front_page() ) { ?>
      <h1 class="headline"><?php the_title(); ?></h1>
    <?php } ?>

    <?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>

    <?php the_content(); ?>
    <div class="clearfix"></div>

    <?php if ( ! is_front_page() ) { ?>
      <?php if ( ! has_shortcode( $post->post_content, 'list-child-pages' ) ) { echo 'Shortcode Not Found!'; echo do_shortcode( '[list-child-pages]' ); } ?>
      <p class="post-byline">By <?php the_author(); ?>. Last updated on <?php the_modified_date( 'F jS, Y' ); ?>.</p>
    <?php } ?>

    <?php wp_link_pages(); ?>

  </main>

<?php endwhile; endif; ?>
