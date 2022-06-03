<article id="post-<?php echo get_the_ID(); ?>" <?php post_class(); ?>>
  <header class="entry-header">
    <h2 class="post-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
    <?php if ( has_post_thumbnail() ) { the_post_thumbnail('medium'); } ?>
  </header>
  <div class="entry-content entry-excerpt">
    <p class="excerpt"><?php echo get_the_excerpt(); ?></p>
    <div class="clearfix"></div>
  </div>
  <footer class="entry-footer">
    <p class="entry-byline">By <?php the_author(); ?> on <?php echo get_the_date('F jS, Y'); ?></p>
  </footer>
</article>
