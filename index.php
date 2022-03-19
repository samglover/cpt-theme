<?php namespace CPT_Theme; ?>

<?php get_header(); ?>

<div id="content-container">
  <main id="content">
    <?php if ( is_home() && ! is_front_page() && ! empty( single_post_title('', false) ) ) { ?>
      <h1 class="headline"><?php single_post_title(); ?></h1>
    <?php } elseif ( is_archive() ) { ?>
      <?php the_archive_title( '<h1 class="headline">', '</h1>' ); ?>
    <?php } elseif ( is_search() ) { ?>
      <h1 class="headline">Search Results for "<?php echo esc_html( get_search_query() ); ?>"</h1>
    	<?php get_search_form(); ?>
    <?php } ?>
    <?php get_template_part( 'template-parts/loop', 'index' ); ?>
  </main>
</div><!--#content-container-->

<?php get_footer(); ?>
