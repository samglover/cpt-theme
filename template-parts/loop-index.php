<?php namespace CPT_Theme\Template_Parts; ?>

<?php if ( have_posts() ) : ?>
  <?php while ( have_posts() ) : the_post(); ?>
    <div <?php post_class(); ?>>
      <h2 class="post-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>

      <div class="thumbnail-excerpt-container">
        <?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'medium' ); } ?>

        <div class="excerpt-container">
          <p class="excerpt"><?php echo get_the_excerpt(); ?></p>
          <p class="post-byline">By <?php the_author(); ?> on <?php the_date( 'F jS, Y' ); ?></p>
        </div>
      </div>
    </div>
  <?php endwhile; ?>
  <?php echo the_posts_pagination(); ?>
<?php else : ?>
  <p class="post">No posts match your query.</p>
<?php endif; ?>
