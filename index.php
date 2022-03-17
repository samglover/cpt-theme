<?php namespace CPT_Theme; ?>

<?php get_header(); ?>

<div id="content-container">
  <main id="content">

    <?php if ( is_archive() ) { ?>
      <h1 class="headline"><?php echo single_term_title( '', FALSE ); ?></h1>
    <?php } ?>

    <?php if ( is_search() ) { ?>
      <h1>Search Results for "<?php echo get_search_query() ?>"</h1>
  		<?php get_search_form(); ?>
    <?php } ?>

    <?php get_template_part( 'template-parts/loop', 'index' ); ?>

  </main>
</div><!--#content-container-->

<?php get_footer(); ?>
