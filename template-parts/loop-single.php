<article id="content" <?php post_class(); ?>>
  <header class="page-header has-global-padding is-layout-constrained">
    <?php the_title('<h1 class="entry-title wp-block-post-title">', '</h1>'); ?>
    <?php if (has_post_thumbnail()) the_post_thumbnail(); ?>
  </header>
  <div class="entry-content wp-block-post-content has-global-padding is-layout-constrained">
    <?php the_content(); ?>
    <div class="clearfix"></div>
  </div>
  <footer class="entry-footer has-global-padding is-layout-constrained">
    <?php wp_link_pages([
      'before'  => '<p class="post-nav-links-label">Pages</p><p class="post-nav-links">',
      'after'   => '</p>',
    ]); ?>
    <p class="entry-byline">By <?php the_author(); ?>. Last updated on <?php the_modified_date('F jS, Y'); ?>.</p>
  </footer>
</article>
