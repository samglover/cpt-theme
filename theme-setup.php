<?php

function theme_setup() {
  add_theme_support( 'align-full' );
  add_theme_support( 'custom-logo', [
    'height' => 480,
    'width'  => 720,
    'flex-width' => true
  ]);
  add_theme_support('editor-styles');
  add_theme_support('html5', [
    'caption',
    'comment-form',
    'comment-list',
    'gallery',
    'script',
    'search-form',
    'style',
  ]);
	add_theme_support('post-thumbnails');
	add_theme_support('responsive-embeds');
	add_theme_support('title-tag');
	add_theme_support('wp-block-styles');

  add_image_size('tiny', 0, 90);

  add_editor_style(CPT_THEME_DIR_URI . 'assets/css/editor-styles.css');

  register_nav_menu('primary', __('Primary Menu (In Header)', 'cpt-theme'));
  register_nav_menu('secondary', __('Secondary Menu (Below Header)', 'cpt-theme'));
}

add_action('after_setup_theme', 'theme_setup');


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
    if ( !get_option($key) ) {
      update_option($key, $val);
    }
  }

}

add_action('after_switch_theme', 'default_options');


/**
 * Register Widget Areas
 */
function register_widget_areas() {
  register_sidebar([
    'id'            => 'sidebar',
    'name'          => __('Sidebar Widget Area', 'cpt-theme'),
    'description'   => __('Displayed as a sidebar when using the Sidebar page template.', 'cpt-theme'),
  ]);

  register_sidebar([
    'id'            => 'footer-widgets',
    'name'          => __('Footer Widget Area', 'cpt-theme'),
    'description'   => __('Displayed in the footer.', 'cpt-theme'),
  ]);
}

add_action('widgets_init', 'register_widget_areas');


function register_stylesheets_scripts() {
  wp_enqueue_style('normalize', CPT_THEME_DIR_URI . 'assets/css/normalize.css');
	wp_enqueue_style('stylesheet', CPT_THEME_DIR_URI . 'assets/css/style.css', '', filemtime(CPT_THEME_DIR_PATH . 'style.css'));

  if ( is_singular() && comments_open() && get_option('thread_comments') ) {
		wp_enqueue_script('comment-reply');
	}

	wp_enqueue_script('menus', CPT_THEME_DIR_URI . 'assets/js/menus.js', '', '', true);
  wp_enqueue_script('modals', CPT_THEME_DIR_URI . 'assets/js/modals.js', '', '', true);
}

add_action('wp_enqueue_scripts', 'register_stylesheets_scripts');


function register_admin_stylesheets_scripts() {
  // Enqueue the Jost font unless the Client Power Tools plugin is installed, in
  // which case it is already enqueued by the plugin.
  if ( !is_plugin_active('client-power-tools/client-power-tools.php') ) {
    wp_enqueue_style('jost', CPT_THEME_DIR_URI . 'assets/css/jost.css');
  }
  wp_enqueue_style('admin', CPT_THEME_DIR_URI . 'assets/css/admin.css');

  wp_enqueue_script('admin', CPT_THEME_DIR_URI . 'assets/js/admin.js', '', '', true);

  // Color Picker
  wp_enqueue_style('wp-color-picker');
  wp_enqueue_script('color-picker', CPT_THEME_DIR_URI . 'includes/color-picker.js', ['wp-color-picker'], '', true);
}

add_action('admin_enqueue_scripts', 'register_admin_stylesheets_scripts');
