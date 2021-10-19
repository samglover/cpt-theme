<?php

function theme_setup() {

  add_theme_support( 'editor-styles' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'wp-block-styles' );

  add_post_type_support( 'page', 'excerpt' );

  add_editor_style( 'editor-styles.css' );

}

add_action( 'after_setup_theme', 'theme_setup' );


function register_stylesheets_scripts() {

  $cache_buster = filemtime( get_stylesheet_directory() . '/style.css' );
	wp_register_style( 'stylesheet', get_template_directory_uri() . '/style.css', array(), $cache_buster, 'all' );
	wp_enqueue_style( 'stylesheet' );

}

add_action( 'wp_enqueue_scripts', 'register_stylesheets_scripts' );
