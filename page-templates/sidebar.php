<?php namespace CPT_Theme\Page_Templates; ?>
<?php /* Template Name: Sidebar */ ?>

<?php get_header(); ?>

  <div id="content-sidebar-container">

    <?php get_template_part( 'template-parts/loop', 'page' ); ?>

    <ul id="sidebar"><?php dynamic_sidebar( 'sidebar' ); ?></ul>

  </div>

<?php get_footer(); ?>
