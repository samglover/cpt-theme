<?php

namespace CPT_Sites\Inc;

/**
 * Google Fonts.
 */
function get_google_fonts_arr() {

  $fonts = [
    [
      'name'    => 'Bitter',
      'params'  => 'Bitter:ital,wght@0,400;0,700;1,400;1,700',
    ],
    [
      'name'    => 'DM Sans',
      'params'  => 'DM+Sans:ital,wght@0,400;0,700;1,400;1,700',
    ],
    [
      'name'    => 'Josefin Sans',
      'params'  => 'Josefin+Sans:ital,wght@0,400;0,700;1,400;1,700',
    ],
    [
      'name'    => 'Lato',
      'params'  => 'Lato:ital,wght@0,400;0,700;1,400;1,700',
    ],
    [
      'name'    => 'Lora',
      'params'  => 'Lora:ital,wght@0,400;0,700;1,400;1,700',
    ],
    [
      'name'    => 'Merriweather',
      'params'  => 'Merriweather:ital,wght@0,400;0,700;1,400;1,700',
    ],
    [
      'name'    => 'Montserrat',
      'params'  => 'Montserrat:ital,wght@0,400;0,700;1,400;1,700',
    ],
    [
      'name'    => 'Noto Sans',
      'params'  => 'Noto+Sans:ital,wght@0,400;0,700;1,400;1,700',
    ],
    [
      'name'    => 'Noto Serif',
      'params'  => 'Noto+Serif:ital,wght@0,400;0,700;1,400;1,700',
    ],
    [
      'name'    => 'Open Sans',
      'params'  => 'Open+Sans:ital,wght@0,400;0,700;1,400;1,700',
    ],
    [
      'name'    => 'Raleway',
      'params'  => 'Raleway:ital,wght@0,400;0,700;1,400;1,700',
    ],
    [
      'name'    => 'Roboto',
      'params'  => 'Roboto:ital,wght@0,400;0,700;1,400;1,700',
    ],
    [
      'name'    => 'Source Sans Pro',
      'params'  => 'Source+Sans+Pro:ital,wght@0,400;0,700;1,400;1,700',
    ],
    [
      'name'    => 'Source Serif Pro',
      'params'  => 'Source+Serif+Pro:ital,wght@0,400;0,700;1,400;1,700',
    ],

  ];

  return $fonts;

}

function get_font_params( $name ) {

  if ( ! $name ) { return; }

  $fonts = get_google_fonts_arr();

  foreach ( $fonts as $font ) {

    if ( $name == $font[ 'name' ] ) {
      return $font[ 'params' ];
      continue;
    }

  }

}

function google_fonts_head() {

  ob_start();

    ?>

      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <style>

        * {
          font-family: '<?php echo get_option( 'cpt_sites_body' ); ?>';
        }

        #title,
        #title a,
        #tagline,
        #header-menu a,
        h1, h1 a,
        h2, h2 a,
        h3, h3 a,
        h4, h4 a,
        h5, h5 a,
        h6, h6 a {
          font-family: '<?php echo get_option( 'cpt_sites_headings' ); ?>';
        }

      </style>

    <?php

  echo ob_get_clean();

}

add_action( 'wp_head', __NAMESPACE__ . '\google_fonts_head' );


function enqueue_google_fonts() {

  wp_register_style( 'body-font', 'https://fonts.googleapis.com/css2?family=' . get_font_params( get_option( 'cpt_sites_body' ) ) . '&display=swap' );
	wp_enqueue_style( 'body-font' );

  if ( get_option( 'cpt_sites_body' ) != get_option( 'cpt_sites_headings' ) ) {
    wp_register_style( 'heading-font', 'https://fonts.googleapis.com/css2?family=' . get_font_params( get_option( 'cpt_sites_headings' ) ) . '&display=swap' );
  	wp_enqueue_style( 'heading-font' );
  }

}

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_google_fonts' );
