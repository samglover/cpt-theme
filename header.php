<?php namespace CPT_Theme; ?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

  <?php wp_body_open(); ?>

  <?php

    if ( get_theme_mod( 'custom_logo' ) ) {
      $header_class = ' class="has-custom-logo"';
    } else {
      $header_class = '';
    }

  ?>

	<header id="header"<?php header_class(); ?>>

    <div id="logo-title">

      <?php

        if ( get_theme_mod( 'custom_logo' ) ) {
          echo '<a class="site-logo" href="' . home_url() . '">' . wp_get_attachment_image( get_theme_mod( 'custom_logo' ), 'tiny', false, [ 'alt'   => get_bloginfo( 'title' ) ] ) . '</a>';
        }

        if ( get_option( 'cpt_sites_show_site_title' ) ) {

          echo '<div id="title-tagline">';

            if ( is_front_page() ) {
              echo '<h1 id="title"><a href="' . home_url() . '">' . get_bloginfo( 'name' ) . '</a></h1>';
            } else {
              echo '<p id="title"><a href="' . home_url() . '">' . get_bloginfo( 'name' ) . '</a></p>';
            }

            if ( get_bloginfo( 'description' ) ) {
              echo '<p id="tagline">' . get_bloginfo( 'description' ) . '</p>';
            }

          echo '</div>';

        } elseif ( is_front_page() ) {

          echo '<h1 id="title">' . get_bloginfo( 'name' ) . '</h1>';

        }

      ?>

    </div>

    <div id="menu-container">

      <?php

        if ( get_option( 'cpt_sites_show_primary_menu' ) ) {

          wp_nav_menu(
            [
              'theme_location'  => 'primary',
              'container_id'    => 'primary-menu',
              'fallback_cb'     => false,
            ]
          );

        }

        if ( get_option( 'cpt_sites_show_primary_menu_cta' ) ) {

          if ( get_option( 'cpt_sites_primary_menu_cta_style' ) == 'modal' ) {
            $style = ' onclick="showModal( \'cta-modal\' )"';
          } else {
            $style = '';
          }

          echo '<a id="header-cta" class="button"' . $style . ' href="' . get_option( 'cpt_sites_primary_menu_cta_url' ) . '">';
            echo get_option( 'cpt_sites_primary_menu_cta_text' );
          echo '</a>';

        }

      ?>

    </div>

	</header>

  <?php

    if ( get_option( 'cpt_sites_show_secondary_menu' ) ) {

      wp_nav_menu([
        'theme_location'  => 'secondary',
        'container_id'    => 'secondary-menu',
        'fallback_cb'     => false,
      ]);

    }

    if ( get_option( 'cpt_sites_show_breadcrumbs' ) ) {
      breadcrumbs();
    }

  ?>
