<article id="post-<?php echo get_the_ID(); ?>" <?php post_class(); ?>>
  <?php if (has_post_thumbnail()) { ?>
    <a class="wp-post-image__container" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">
      <?php the_post_thumbnail('medium'); ?>
    </a>
  <?php } ?>
  <div class="title-excerpt-footer__container">
    <header class="entry-header has-global-padding is-layout-constrained">
      <h2 class="post-title wp-block-post-title is-layout-constrained"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
    </header>
    <div class="entry-content entry-excerpt wp-block-post-content has-global-padding is-layout-constrained">
      <p class="excerpt"><?php echo wp_kses(get_the_excerpt(), 'post'); ?></p>
      <div class="clearfix"></div>
    </div>
    <footer class="entry-footer has-global-padding is-layout-constrained">
      <?php $comment_count = get_comment_count(get_the_ID())['approved']; ?>
      <p class="entry-byline">
        <?php 
          printf(__('By %1$s on %2$s.', 'cpt-theme'), 
            /* $1%s */ get_the_author_meta('display_name'),
            /* $2%s */ get_the_date('F jS, Y'),
          );
          if ($comment_count) echo ' <span class="comment-count"><a href="' . get_the_permalink() . '#comments"><i class="comments-icon">' . file_get_contents(CPT_THEME_DIR_PATH . 'assets/images/comment.svg') . '</i>&nbsp;' . $comment_count . '</a></span>';
        ?>
      </p>
    </footer>
  </div>
</article>
