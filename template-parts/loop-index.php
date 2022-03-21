<article id="post-<?php echo get_the_ID(); ?>" <?php post_class(); ?>>
  <h2 class="post-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
  <div class="thumbnail-excerpt-container">
    <?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'medium' ); } ?>
    <div class="excerpt-container">
      <p class="excerpt"><?php echo get_the_excerpt(); ?></p>
      <p class="post-byline">By <?php the_author(); ?> on <?php echo get_the_date( 'F jS, Y' ); ?></p>
    </div>
  </div>
</article>
