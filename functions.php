<?php

namespace CPT_Theme;

/**
 * Constants
 */
define( 'CPT_THEME_DIR_PATH', get_template_directory() );
define( 'CPT_THEME_DIR_URI', get_template_directory_uri() );


/**
 * Theme Files
 */
require_once( CPT_THEME_DIR_PATH . '/theme-setup.php' );
require_once( CPT_THEME_DIR_PATH . '/common/fonts.php' );

if ( is_admin() ) {
  require_once( CPT_THEME_DIR_PATH . '/admin/options.php' );
}

function customizer_options( $wp_customize ) {
  $wp_customize->add_setting( 'cpt_sites_show_site_title', [
    'capability'  => 'edit_theme_options',
    'default'     => true,
    'type'        => 'option',
  ]);

  $wp_customize->add_control( 'cpt_sites_show_site_title', [
    'label'   => __( 'Show site title?', 'cpt-theme' ),
    'section' => 'title_tagline',
    'type'    => 'checkbox',
  ]);
}

add_action( 'customize_register', __NAMESPACE__ . '\customizer_options' );


/**
 * CSS Variables
 */
function css_variables() {
  ob_start();
    ?>
      <style>
        :root {
          --header-cta-text-color: <?php echo get_option( 'cpt_sites_primary_menu_cta_text_color' ); ?>;
          --header-cta-button-color: <?php echo get_option( 'cpt_sites_primary_menu_cta_button_color' ); ?>;
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
  $classes = [];

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


/**
 * Modal Dismiss Button
 *
 * @param string $modal_ID ID of the modal container to close.
 */
function dismiss_modal( $modal_ID = null ) {
  if ( ! $modal_ID ) { return; }
  ob_start();
    ?>
      <button class="dismiss-modal" onclick="closeModal( <?php echo '\'' . $modal_ID . '\''; ?> )">
        <?php echo file_get_contents( CPT_THEME_DIR_URI . '/assets/images/close.svg' ); ?>
      </button>
    <?php
  echo ob_get_clean();
}


/**
 * Breadcrumbs
 */
function breadcrumbs() {
  if ( is_front_page() || is_home() ) { return; }
  if ( is_singular() ) {
    $post_id        = get_the_ID();
    $breadcrumbs[]  = '<span class="breadcrumb last-breadcrumb">' . get_the_title( $post_id ) . '</span>';

    if ( is_singular( 'page' ) ) {
      $parent_id = wp_get_post_parent_id( $post_id );
      while ( $parent_id ) {
        $parent_url     = get_the_permalink( $parent_id );
        $parent_title   = get_the_title( $parent_id );
        $breadcrumbs[]  = '<span class="breadcrumb"><a href="' . $parent_url . '">' . $parent_title . '</a></span>';
        $parent_id      = wp_get_post_parent_id( $parent_id );
      }
    }

    if ( is_singular() ) {
      $categories = get_the_terms( $post_id, 'category' );

      while ( $categories ) {
        $category_id        = $categories[ 0 ]->term_id;
        $category_url       = get_term_link( $category_id );
        $category_title     = $categories[ 0 ]->name;
        $breadcrumbs[]      = '<span class="breadcrumb"><a href="' . $category_url . '">' . $category_title . '</a></span>';
        $category_parent    = $categories[ 0 ]->parent;

        while ( $category_parent ) {
          $category         = get_term( $category_parent );
          $category_id      = $category->term_id;
          $category_url     = get_term_link( $category_id );
          $category_title   = $category->name;
          $breadcrumbs[]    = '<span class="breadcrumb"><a href="' . $category_url . '">' . $category_title . '</a></span>';
          $category_parent  = $category->parent;
        }
      }
    }
  } elseif ( is_post_type_archive() ) {
    $breadcrumbs[] = '<span class="breadcrumb last-breadcrumb">' . post_type_archive_title( '', false ) . '</span>';
  } elseif ( is_tax() ) {
    $breadcrumbs[] = '<span class="breadcrumb last-breadcrumb">' . single_term_title( '', false ) . '</span>';
  }

  $breadcrumbs[]  = '<span class="breadcrumb home-breadcrumb"><a href="' . home_url() . '">Home</a></span>';
  $breadcrumbs    = array_reverse( $breadcrumbs );

  ob_start();
    ?>
      <nav id="breadcrumbs" class="small">
        <?php echo implode( ' / ', $breadcrumbs ); ?>
      </nav>
    <?php
  echo ob_get_clean();
}
