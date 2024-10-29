<?php

/**
 * Theme Supports, Page Excerpts, Image Sizes & Nav Menus
 */
add_action( 'after_setup_theme', 'theme_setup' );
function theme_setup() {
	add_theme_support(
		'custom-logo',
		array(
			'height'     => 480,
			'width'      => 720,
			'flex-width' => true,
		)
	);

	add_theme_support(
		'html5',
		array(
			'caption',
			'comment-form',
			'comment-list',
			'gallery',
			'script',
			'search-form',
			'style',
		)
	);

	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'title-tag' );

	add_post_type_support( 'page', 'excerpt' );

	add_image_size( 'tiny', 0, 90 );

	register_nav_menu( 'primary', __( 'Primary Menu (In Header)', 'cpt-theme' ) );
	register_nav_menu( 'secondary', __( 'Secondary Menu (Below Header)', 'cpt-theme' ) );
}


/**
 * Register Sidebars/Widget Areas
 */
add_action( 'widgets_init', 'register_widget_areas' );
function register_widget_areas() {
	register_sidebar(
		array(
			'id'          => 'preheader-widgets',
			'name'        => __( 'Preheader Widget Area', 'cpt-theme' ),
			'description' => __( 'Displayed above the main header.', 'cpt-theme' ),
		)
	);

	// register_sidebar([
	// 'id'            => 'sidebar',
	// 'name'          => __('Sidebar Widget Area', 'cpt-theme'),
	// 'description'   => __('Displayed as a sidebar when using the Sidebar page template.', 'cpt-theme'),
	// ]);

	register_sidebar(
		array(
			'id'          => 'footer-widgets',
			'name'        => __( 'Footer Widget Area', 'cpt-theme' ),
			'description' => __( 'Displayed in the footer.', 'cpt-theme' ),
		)
	);
}


/**
 * Default Theme Options
 */
add_action( 'after_switch_theme', 'default_options' );
function default_options() {
	$default_options = array(
		'cpt_sites_sticky_header'                 => false,
		'cpt_sites_show_site_title'               => true,
		'cpt_sites_show_primary_menu'             => true,
		'cpt_sites_show_secondary_menu'           => false,
		'cpt_sites_show_primary_menu_cta'         => false,
		'cpt_sites_primary_menu_cta_text_color'   => 'White',
		'cpt_sites_primary_menu_cta_button_color' => 'Coral',
		'cpt_sites_primary_menu_cta_text'         => 'Contact Us',
		'cpt_sites_primary_menu_cta_style'        => 'link',
	// Fonts moved to theme.json in 3.0.
	// Colors moved to theme.json in 3.0.
	);

	foreach ( $default_options as $key => $val ) {
		foreach ( $default_options as $key => $val ) {
			add_option( $key, $val );
		}
	}
}
