<article id="content" <?php post_class(); ?>>
  <header class="entry-header">
    <?php
      if ( !is_front_page() ) {
        the_title('<h1 class="entry-title">', '</h1>');
      }
      if ( has_post_thumbnail() ) { the_post_thumbnail(); }
    ?>
  </header>
  <div class="entry-content">
    <?php the_content(); ?>
    <div class="clearfix"></div>
  </div>
  <footer class="entry-footer">
    <?php wp_link_pages(); ?>
    <?php if ( !is_front_page() ) { ?>
      <p class="entry-byline">By <?php the_author(); ?>. Last updated on <?php the_modified_date('F jS, Y'); ?>.</p>
    <?php } ?>
  </footer>
</article>
