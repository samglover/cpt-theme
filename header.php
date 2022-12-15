<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <?php wp_head(); ?>
</head>

<?php 
  $classes = [];
  if (get_option('show_avatars')) $classes[] = 'show-avatars';
  if (is_singular()) $classes[] = 'is-singular';
?>

<body <?php body_class($classes); ?>>
  <?php wp_body_open(); ?>
  <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'cpt-theme'); ?></a>

  <div id="page-content" class="site">
    <?php get_template_part('template-parts/site-header'); ?>
    <div id="content" class="site-content">
  		<div id="primary" class="content-area site-content__inner">
  			<main id="main" class="site-main">
