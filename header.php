<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <?php get_template_part('template-parts/site-header'); ?>

  <div id="page-content" class="site">
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'cpt-theme'); ?></a>
    <div id="content" class="site-content">
		<div id="primary" class="content-area">
			<main id="main" class="site-main">
