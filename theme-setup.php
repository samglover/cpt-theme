<?php

namespace CPT_Theme\Theme_Setup;

function theme_setup() {

  add_theme_support( 'align-full' );
  add_theme_support( 'custom-logo', [ 'height' => 480, 'width'  => 720, 'flex-width' => true ] );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'wp-block-styles' );

  add_image_size( 'tiny', 0, 90 );

  register_nav_menu( 'primary', __( 'Primary Menu (In Header)', 'cpt-theme' ) );
  register_nav_menu( 'secondary', __( 'Secondary Menu (Below Header)', 'cpt-theme' ) );

}

add_action( 'after_setup_theme', __NAMESPACE__ . '\theme_setup' );


function default_options() {

  $default_options = [

    // Heading
		'cpt_sites_show_site_title'               => true,
		'cpt_sites_show_primary_menu'	            => true,
    'cpt_sites_show_secondary_menu'           => false,
    'cpt_sites_show_primary_menu_cta'         => false,
    'cpt_sites_primary_menu_cta_text_color'   => 'White',
    'cpt_sites_primary_menu_cta_button_color' => 'Coral',
    'cpt_sites_primary_menu_cta_text'         => 'Contact Us',
    'cpt_sites_primary_menu_cta_style'        => 'normal',

    // Fonts
    'cpt_sites_headings'                      => 'Josefin Sans',
    'cpt_sites_body'                          => 'Source Serif Pro',

    // Colors
    'cpt_sites_link_color'                    => 'SlateBlue',
    'cpt_sites_link_color_hover'              => 'DarkSlateBlue',


  ];

  foreach ( $default_options as $key => $val ) {

    if ( ! get_option( $key ) ) {
      update_option( $key, $val );
    }

  }

}

add_action( 'after_switch_theme', __NAMESPACE__ . '\default_options' );


/**
 * Register Widget Areas
 */
function register_widget_areas() {

  register_sidebar(
    [
      'id'            => 'sidebar',
      'name'          => __( 'Sidebar Widget Area' ),
      'description'   => __( 'Displayed as a sidebar when using the Sidebar page template.' ),
    ]
  );

  register_sidebar(
    [
      'id'            => 'footer-widgets',
      'name'          => __( 'Footer Widget Area' ),
      'description'   => __( 'Displayed in the footer.' ),
    ]
  );

}

add_action( 'widgets_init', __NAMESPACE__ . '\register_widget_areas' );


function register_stylesheets_scripts() {

  wp_enqueue_style( 'normalize-css', CPT_THEME_DIR_URI . '/css/normalize.css' );
	wp_enqueue_style( 'stylesheet', CPT_THEME_DIR_URI . '/style.css', '', filemtime( CPT_THEME_DIR_PATH . '/style.css' ) );

	wp_enqueue_script( 'menus-js', CPT_THEME_DIR_URI . '/js/menus.js', '', '', true );
  wp_enqueue_script( 'modals-js', CPT_THEME_DIR_URI . '/js/modals.js', '', '', true );

}

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\register_stylesheets_scripts' );


function register_admin_stylesheets_scripts() {

  wp_enqueue_style( 'admin-css', CPT_THEME_DIR_URI . '/css/admin.css' );

  wp_enqueue_script( 'admin-js', CPT_THEME_DIR_URI . '/js/admin.js', '', '', true );

  // Color Picker
  wp_enqueue_style( 'wp-color-picker' );
  wp_enqueue_script( 'color-picker', CPT_THEME_DIR_URI . '/js/color-picker.js', [ 'wp-color-picker' ], '', true );

}

add_action( 'admin_enqueue_scripts', __NAMESPACE__ . '\register_admin_stylesheets_scripts' );
