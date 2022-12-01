<?php

/**
 * Constants
 */
define('CPT_THEME_DIR_PATH', trailingslashit(get_template_directory()));
define('CPT_THEME_DIR_URI', trailingslashit(get_template_directory_uri()));
define('CPT_THEME_VERSION', wp_get_theme()->get('Version'));


/**
 * Theme Files
 */
// Common
require_once(CPT_THEME_DIR_PATH . 'theme-setup.php');
require_once(CPT_THEME_DIR_PATH . 'common/fonts.php');

function cpt_theme_block_assets() {
  wp_enqueue_style('cpt-theme-common', CPT_THEME_DIR_URI . 'assets/css/common.css', [], CPT_THEME_VERSION);
}

add_action('enqueue_block_assets', 'cpt_theme_block_assets');


// Frontend
if (!is_admin()) {
  require_once(CPT_THEME_DIR_PATH . 'frontend/responsive-menu.php');
  require_once(CPT_THEME_DIR_PATH . 'frontend/breadcrumbs.php');
  require_once(CPT_THEME_DIR_PATH . 'frontend/comment.php');
}

function cpt_theme_frontend_stylesheets_scripts() {
  wp_enqueue_style('cpt-theme-normalize', CPT_THEME_DIR_URI . 'assets/css/normalize.css', [], CPT_THEME_VERSION);
	wp_enqueue_style('cpt-theme-frontend', CPT_THEME_DIR_URI . 'assets/css/frontend.css', [], CPT_THEME_VERSION);

	wp_enqueue_script('cpt-theme-menus', CPT_THEME_DIR_URI . 'assets/js/menus.js', [], CPT_THEME_VERSION, true);
  wp_enqueue_script('cpt-theme-modals', CPT_THEME_DIR_URI . 'assets/js/modals.js', [], CPT_THEME_VERSION, true);
  if (!wp_is_mobile() && get_option('cpt_sites_sticky_header')) wp_enqueue_script('cpt-theme-sticky-header', CPT_THEME_DIR_URI . 'assets/js/sticky-header.js', [], CPT_THEME_VERSION, true);
  if (is_singular() && comments_open() && get_option('thread_comments')) wp_enqueue_script('comment-reply');
}

add_action('wp_enqueue_scripts', 'cpt_theme_frontend_stylesheets_scripts');


// Admin
if (is_admin()) {
  require_once(CPT_THEME_DIR_PATH . 'admin/options.php');
}

function cpt_theme_admin_stylesheets_scripts() {
  wp_enqueue_style('cpt-theme-admin', CPT_THEME_DIR_URI . 'assets/css/admin.css', [], CPT_THEME_VERSION);
  wp_enqueue_style('wp-color-picker');

  wp_enqueue_script('color-picker', CPT_THEME_DIR_URI . 'includes/color-picker.js', ['wp-color-picker'], CPT_THEME_VERSION, true);
}

add_action('admin_enqueue_scripts', 'cpt_theme_admin_stylesheets_scripts');


/**
 * Customizer
 */
function cpt_theme_customizer_options($wp_customize) {
  $wp_customize->add_setting('cpt_sites_show_site_title', [
    'capability'  => 'edit_theme_options',
    'default'     => true,
    'type'        => 'option',
  ]);

  $wp_customize->add_control('cpt_sites_show_site_title', [
    'label'   => __('Show site title?', 'cpt-theme'),
    'section' => 'title_tagline',
    'type'    => 'checkbox',
  ]);
}

add_action('customize_register', 'cpt_theme_customizer_options');


/**
 * CSS Variables
 */
function cpt_theme_css_variables() {
  ?>
    <style>
      :root {
        --primary-color: <?php echo esc_attr(get_option('cpt_sites_primary_color')); ?>;
        --secondary-color: <?php echo esc_attr(get_option('cpt_sites_secondary_color')); ?>;
        --page-color: <?php echo esc_attr(get_option('cpt_sites_page_color')); ?>;
        --header-cta-text-color: <?php echo esc_attr(get_option('cpt_sites_primary_menu_cta_text_color')); ?>;
        --header-cta-button-color: <?php echo esc_attr(get_option('cpt_sites_primary_menu_cta_button_color')); ?>;
        --link-color: <?php echo esc_attr(get_option('cpt_sites_link_color')); ?>;
        --link-color-hover: <?php echo esc_attr(get_option('cpt_sites_link_color_hover')); ?>;
      }
    </style>
  <?php
}

add_action('wp_head', 'cpt_theme_css_variables');
add_action('admin_head', 'cpt_theme_css_variables');
