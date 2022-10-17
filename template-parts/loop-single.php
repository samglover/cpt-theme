<article id="content" <?php post_class(); ?>>
  <header class="entry-header">
    <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
    <?php if (has_post_thumbnail()) the_post_thumbnail(); ?>
  </header>
  <div class="entry-content">
    <?php the_content(); ?>
    <div class="clearfix"></div>
  </div>
  <footer class="entry-footer">
    <?php wp_link_pages([
      'before'  => '<p class="post-nav-links-label">Pages</p><p class="post-nav-links">',
      'after'   => '</p>',
    ]); ?>
    <p class="entry-byline">By <?php the_author(); ?>. Last updated on <?php the_modified_date('F jS, Y'); ?>.</p>
  </footer>
</article>
