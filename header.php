<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

  <?php wp_body_open(); ?>

	<header id="header">

		<?php if ( is_front_page() ) { ?>

			<h1 id="title"><a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a></h1>

		<?php } else { ?>

			<p id="title"><a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a></p>

		<?php } ?>

	</header>
