<?php

namespace CPT_Sites\Theme_Setup;

function theme_setup() {

  add_theme_support( 'custom-logo', [ 'height' => 480, 'width'  => 720, 'flex-width' => true ] );
  add_theme_support( 'editor-styles' );
  add_theme_support( 'html5' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'wp-block-styles' );

  add_post_type_support( 'page', 'excerpt' );

  add_editor_style( 'editor-styles.css' );

}

add_action( 'after_setup_theme', __NAMESPACE__ . '\theme_setup' );


function image_sizes() {

  add_image_size( 'tiny', 0, 90 );

}

add_action( 'after_setup_theme', __NAMESPACE__ . '\image_sizes' );


function register_stylesheets_scripts() {

  $cache_buster = filemtime( get_stylesheet_directory() . '/style.css' );
	wp_register_style( 'stylesheet', get_template_directory_uri() . '/style.css', array(), $cache_buster, 'all' );
	wp_enqueue_style( 'stylesheet' );

  wp_register_script( 'footer-js', get_template_directory_uri() . '/js/footer.js', [ 'jquery' ], '', true );
	wp_enqueue_script( 'footer-js' );

}

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\register_stylesheets_scripts' );


/**
 * Register Nav Menus
 */
function register_nav_menus() {
  register_nav_menu( 'header-menu', __( 'Header Menu', 'cpt-sites' ) );
}

add_action( 'after_setup_theme', __NAMESPACE__ . '\register_nav_menus' );
