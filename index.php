<?php get_header(); ?>

<header class="page-header">
  <h1 class="headline">
    <?php
      if (is_home() && !is_front_page() && single_post_title()) {
        single_post_title();
      } elseif (is_archive()) {
        the_archive_title();
      } elseif (is_search()) {
        echo 'Search Results for "' . esc_html(get_search_query()) . '"';
      }
    ?>
  </h1>
  <?php
    if (is_search()) {
      ?>
        <form role="search" method="get" action="http://robots.local/" class="wp-block-search__button-outside wp-block-search__text-button wp-block-search">
          <label for="wp-block-search__input-1" class="wp-block-search__label screen-reader-text">Search</label>
          <div class="wp-block-search__inside-wrapper ">
            <input type="search" id="wp-block-search__input-1" class="wp-block-search__input " name="s" value="<?php echo esc_attr(get_search_query()); ?>" placeholder="" required="">
            <button type="submit" class="wp-block-search__button  ">Search</button>
          </div>
        </form>
      <?php
    }
  ?>
</header>

<?php
  if (have_posts()) {
    while (have_posts()) {
      the_post();
      get_template_part('template-parts/loop-index');
    }
    the_posts_pagination();
  } else {
    echo '<p class="post">' . __('No posts match your query.', 'cpt-theme') . '</p>';
  }
?>

<?php get_footer(); ?>
