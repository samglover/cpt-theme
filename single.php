<?php namespace CPT_Theme; ?>

<?php get_header(); ?>

  <div id="content-container">
    <?php get_template_part( 'template-parts/loop', 'single' ); ?>
  </div><!--#content-container-->

<?php get_footer(); ?>
