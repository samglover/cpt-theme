<?php namespace CPT_Theme\Template_Parts; ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <main id="content" <?php post_class(); ?>>
    <h1 class="post-title"><?php the_title(); ?></h1>
    <p class="post-byline">By <?php the_author(); ?> on <?php the_date( 'F jS, Y' ); ?></p>

    <?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>

    <?php the_content(); ?>
    <div class="clearfix"></div>

    <?php wp_link_pages(); ?>
  </main>
<?php endwhile; endif; ?>
