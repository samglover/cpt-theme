<?php get_header(); ?>

<header class="page-header">
  <h1 class="headline">
    <?php
      if ( is_home() && !is_front_page() && !empty(single_post_title('', false)) ) {
        single_post_title();
      } elseif ( is_archive() ) {
        the_archive_title();
      } elseif ( is_search() ) {
        echo 'Search Results for' . esc_html(get_search_query());
      }
    ?>
  </h1>
  <?php
    if ( is_search() ) {
      get_search_form();
    }
  ?>
</header>

<?php
  if ( have_posts() ) {
    while ( have_posts() ) {
      the_post();
      get_template_part('template-parts/loop-index');
    }
    the_posts_pagination();
  } else {
    echo '<p class="post">No posts match your query.</p>';
  }
?>

<?php get_footer(); ?>
