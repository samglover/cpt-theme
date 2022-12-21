<article id="post-<?php echo get_the_ID(); ?>" <?php post_class(); ?>>
  <?php if (has_post_thumbnail()) { ?>
    <a class="wp-post-image__container" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">
      <?php the_post_thumbnail('medium'); ?>
    </a>
  <?php } ?>
  <div>
    <header class="entry-header">
      <h2 class="post-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
    </header>
    <div class="entry-content entry-excerpt">
      <p class="excerpt"><?php echo wp_kses(get_the_excerpt(), 'post'); ?></p>
      <div class="clearfix"></div>
    </div>
    <footer class="entry-footer">
      <?php $comment_count = get_comment_count(get_the_ID())['approved']; ?>
      <p class="entry-byline">By <?php the_author(); ?> on <?php echo get_the_date('F jS, Y'); ?>..<?php if ($comment_count) echo ' <span class="comment-count"><i class="comments-icon">' . file_get_contents(CPT_THEME_DIR_PATH . 'assets/images/comment.svg') . '</i>&nbsp;' . $comment_count . '</span>'; ?></p>
    </footer>
  </div>
</article>
