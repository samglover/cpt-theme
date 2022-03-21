<article id="content" <?php post_class(); ?>>
  <header class="entry-header">
    <?php
      the_title('<h1 class="entry-title">', '</h1>');
      if ( has_post_thumbnail() ) { the_post_thumbnail(); }
    ?>
  </header>
  <div class="entry-content">
    <?php
      the_content();
      wp_link_pages();
    ?>
  </div>
  <footer class="entry-footer">
    <p class="post-byline">By <?php the_author(); ?>. Last updated on <?php the_modified_date( 'F jS, Y' ); ?>.</p>
  </footer>
</article>
