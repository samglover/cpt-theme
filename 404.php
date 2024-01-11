<?php get_header(); ?>

  <article id="content">
      <header class="page-header has-global-padding is-layout-constrained">
        <h1>404 Not Found</h1>
      </header>
      <div class="entry-content wp-block-post-content has-global-padding is-layout-constrained">
        <p>Sorry, I know this isn't what you were hoping to see. The page you were looking for is probably gone, but you can try searching for it just to make sure:</p>
        <form role="search" method="get" action="<?php echo esc_url(home_url()); ?>" class="wp-block-search__button-outside wp-block-search__text-button wp-block-search">
          <label for="wp-block-search__input-1" class="wp-block-search__label screen-reader-text">Search</label>
          <div class="wp-block-search__inside-wrapper ">
            <input type="search" id="wp-block-search__input-1" class="wp-block-search__input " name="s" value="<?php echo esc_attr(get_search_query()); ?>" placeholder="" required="">
            <button type="submit" class="wp-block-search__button wp-element-button">Search</button>
          </div>
        </form>
        <p>If that doesn't work, maybe you can find something else on the <a href="<?php echo esc_url(home_url()); ?>">front page</a>.</p>
      </div>
  </article>

<?php get_footer(); ?>
