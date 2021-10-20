<?php

namespace CPT_Sites;

?>

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

    <?php

      if ( get_theme_mod( 'custom_logo' ) ) {
        echo wp_get_attachment_image( get_theme_mod( 'custom_logo' ), 'tiny', false,
          [
            'class' => 'site-logo',
            'alt'   => get_bloginfo( 'title' ),
          ]
        );
      }

      echo '<div id="title-tagline">';

        if ( get_option( 'cpt_sites_show_site_title' ) ) {

          if ( is_front_page() ) {
            echo '<h1 id="title"><a href="' . home_url() . '">' . get_bloginfo( 'name' ) . '</a></h1>';
          } else {
            echo '<p id="title"><a href="' . home_url() . '">' . get_bloginfo( 'name' ) . '</a></p>';
          }

        }

        if ( get_option( 'cpt_sites_show_site_tagline' ) ) {
          echo '<p id="tagline">' . get_bloginfo( 'description' ) . '</p>';
        }

      echo '</div>';

      wp_nav_menu(
        [
          'menu'          => 'header-menu',
          'container_id'  => 'header-menu'
        ]
      );

    ?>


	</header>
