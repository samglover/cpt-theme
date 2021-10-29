<?php

namespace CPT_Sites;

/**
 * Constants
 */
define( 'CPT_SITES_DIR_PATH', get_template_directory() );
define( 'CPT_SITES_DIR_URI', get_template_directory_uri() );


/**
 * Theme Files
 */
require_once( CPT_SITES_DIR_PATH . '/theme-setup.php' );
require_once( CPT_SITES_DIR_PATH . '/inc/fonts.php' );

if ( is_admin() ) {
  require_once( CPT_SITES_DIR_PATH . '/admin/options.php' );
}

function customizer_options( $wp_customize ) {

  $wp_customize->add_setting( 'cpt_sites_show_site_title',
    [
      'capability'  => 'edit_theme_options',
      'default'     => true,
      'type'        => 'option',
    ]
  );

  $wp_customize->add_control( 'cpt_sites_show_site_title',
    [
      'label'   => __( 'Show site title?', 'cpt-sites' ),
      'section' => 'title_tagline',
      'type'    => 'checkbox',
    ]
  );

}

add_action( 'customize_register', __NAMESPACE__ . '\customizer_options' );


/**
 * CSS Variables
 */
function css_variables() {

  ob_start();

  ?>

    <style>

      body {
        --header-cta-text-color: <?php echo get_option( 'cpt_sites_show_primary_menu_cta_text_color' ); ?>;
        --header-cta-button-color: <?php echo get_option( 'cpt_sites_show_primary_menu_cta_button_color' ); ?>;
        --link-color: <?php echo get_option( 'cpt_sites_link_color' ); ?>;
        --link-color-hover: <?php echo get_option( 'cpt_sites_link_color_hover' ); ?>;
      }

    </style>

  <?php

  echo ob_get_clean();

}

add_action( 'wp_head', __NAMESPACE__ . '\css_variables' );


/**
 * Header Classes
 */
function header_class() {

  $classes = array();

  if ( get_theme_mod( 'custom_logo' ) ) {
    $classes[] = 'has-custom-logo';
  }

  if ( get_option( 'cpt_sites_show_site_title' ) ) {
    $classes[] = 'show-site-title';
  }

  if ( get_option( 'cpt_sites_show_site_tagline' ) ) {
    $classes[] = 'show-site-tagline';
  }

  if ( get_option( 'cpt_sites_show_primary_menu' ) ) {
    $classes[] = 'show-primary-menu';
  }

  if ( get_option( 'cpt_sites_show_primary_menu_cta' ) ) {
    $classes[] = 'show-header-cta';
  }

  if ( get_option( 'cpt_sites_show_secondary_menu' ) ) {
    $classes[] = 'show-secondary-menu';
  }

  if ( ! empty( $classes ) ) {
    echo ' class="' . implode( ' ', $classes ) . '"';
  } else {
    return;
  }

}
