<?php

namespace CPT_Sites\Theme_Setup;

function theme_setup() {

  add_theme_support( 'custom-logo', [ 'height' => 480, 'width'  => 720, 'flex-width' => true ] );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'wp-block-styles' );

  add_editor_style( 'editor-styles.css' );

  add_image_size( 'tiny', 0, 90 );

  register_nav_menu( 'primary', __( 'Primary Menu (In Header)', 'cpt-sites' ) );
  register_nav_menu( 'secondary', __( 'Secondary Menu (Below Header)', 'cpt-sites' ) );

}

add_action( 'after_setup_theme', __NAMESPACE__ . '\theme_setup' );


/**
 * Register Widget Areas
 */
function register_widget_areas() {

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

  $cache_buster = filemtime( CPT_SITES_DIR_PATH . '/style.css' );
	wp_register_style( 'stylesheet', CPT_SITES_DIR_URI . '/style.css', '', $cache_buster, 'all' );
	wp_enqueue_style( 'stylesheet' );

  wp_register_script( 'menus-js', CPT_SITES_DIR_URI . '/js/menus.js', '', '', true );
	wp_enqueue_script( 'menus-js' );

}

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\register_stylesheets_scripts' );
