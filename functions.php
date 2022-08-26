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
require_once(CPT_THEME_DIR_PATH . 'theme-setup.php');
require_once(CPT_THEME_DIR_PATH . 'common/fonts.php');

if (is_admin()){
  require_once(CPT_THEME_DIR_PATH . 'admin/options.php');
}


function register_stylesheets_scripts() {
  wp_enqueue_style('cpt-theme-normalize', CPT_THEME_DIR_URI . 'assets/css/normalize.css', [], CPT_THEME_VERSION);
	wp_enqueue_style('stylesheet', CPT_THEME_DIR_URI . 'assets/css/style.css', [], CPT_THEME_VERSION);

  if (is_singular() && comments_open() && get_option('thread_comments')){
		wp_enqueue_script('comment-reply');
	}

	wp_enqueue_script('cpt-theme-menus', CPT_THEME_DIR_URI . 'assets/js/menus.js', [], CPT_THEME_VERSION, true);
  wp_enqueue_script('cpt-theme-modals', CPT_THEME_DIR_URI . 'assets/js/modals.js', [], CPT_THEME_VERSION, true);
}

add_action('wp_enqueue_scripts', 'register_stylesheets_scripts');

function register_common_stylesheets_scripts() {
  wp_enqueue_style('cpt-theme-common', CPT_THEME_DIR_URI . 'assets/css/common.css', [], CPT_THEME_VERSION);
}

add_action('wp_enqueue_scripts', 'register_common_stylesheets_scripts');
add_action('admin_enqueue_scripts', 'register_common_stylesheets_scripts');


function register_admin_stylesheets_scripts() {
  wp_enqueue_style('cpt-theme-jost', CPT_THEME_DIR_URI . 'assets/css/jost.css', [], CPT_THEME_VERSION);
  wp_enqueue_style('cpt-theme-admin', CPT_THEME_DIR_URI . 'assets/css/admin.css', [], CPT_THEME_VERSION);

  wp_enqueue_script('cpt-theme-blocks', CPT_THEME_DIR_URI . '/assets/js/blocks.js', ['wp-blocks', 'wp-dom'], CPT_THEME_VERSION, true);

  // Color Picker
  wp_enqueue_style('wp-color-picker');
  wp_enqueue_script('color-picker', CPT_THEME_DIR_URI . 'includes/color-picker.js', ['wp-color-picker'], CPT_THEME_VERSION, true);
}

add_action('admin_enqueue_scripts', 'register_admin_stylesheets_scripts');


function customizer_options($wp_customize) {
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

add_action('customize_register', 'customizer_options');


/**
 * CSS Variables
 */
function css_variables() {
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

add_action('wp_head', 'css_variables');
add_action('admin_head', 'css_variables');


function collapsed_menu_item($items, $args) {
  if (!get_option('cpt_sites_show_primary_menu') || $args->theme_location != 'primary')return $items;
  ob_start();
    ?>
      <li id="collapsed-menu" class="menu-item menu-item-has-children collapsed-menu">
        <a href="#">&bull;&bull;&bull;</a>
        <ul class="sub-menu"></ul>
      </li>
    <?php
  $items .= ob_get_clean();
  return wp_kses_post($items);
}

add_filter('wp_nav_menu_items', 'collapsed_menu_item', 10, 2);


function breadcrumbs() {
  if (is_front_page())return;

  // Gets the last breadcrumb first (we'll flip the order as the last step).
  ob_start();
    echo '<span class="breadcrumb last-breadcrumb">';
      if (!empty(single_post_title('', false))){
        single_post_title();
      } elseif (is_archive()){
        the_archive_title();
      } elseif (is_search()){
        echo 'Search';
      } elseif (is_404()){
        echo '404 Not Found';
      }
    echo '</span>';

  $breadcrumbs[] = ob_get_clean();

  // Gets breadcrumbs for singular posts. Parents for hierarchical post types
  // (like pages), or categories (if they exist) for non-hierarchical post types.
  if (is_singular()){
    $post_id        = get_the_ID();
    $post_type      = get_post_type_object(get_post_type($post_id));

    if ($post_type->hierarchical){
      $parent_id = wp_get_post_parent_id($post_id );
      while ($parent_id){
        $parent_url     = get_the_permalink($parent_id);
        $parent_title   = get_the_title($parent_id);
        $breadcrumbs[]  = '<span class="breadcrumb"><a href="' . $parent_url . '">' . $parent_title . '</a></span>';
        $parent_id      = wp_get_post_parent_id($parent_id);
      }
    } else {
      $categories = get_the_terms($post_id, 'category');

      if ($categories){
        $category_id        = $categories[0]->term_id;
        $category_url       = get_term_link($category_id);
        $category_title     = $categories[0]->name;
        $breadcrumbs[]      = '<span class="breadcrumb"><a href="' . $category_url . '">' . $category_title . '</a></span>';
        $category_parent    = $categories[0]->parent;

        while ($category_parent){
          $category         = get_term($category_parent);
          $category_id      = $category->term_id;
          $category_url     = get_term_link($category_id);
          $category_title   = $category->name;
          $breadcrumbs[]    = '<span class="breadcrumb"><a href="' . $category_url . '">' . $category_title . '</a></span>';
          $category_parent  = $category->parent;
        }
      }
    }
  } elseif (is_category() || is_tag() || is_tax()){
    $term       = get_queried_object();
    $ancestors  = get_ancestors($term->term_id, $term->taxonomy);

    foreach ($ancestors as $term_id){
      $term_obj = get_term($term_id);
      $breadcrumbs[] = '<span class="breadcrumb"><a href="' . get_term_link($term_obj->term_id) . '">' . $term_obj->name . '</a></span>';
    }
  }

  $breadcrumbs[]  = '<span class="breadcrumb home-breadcrumb"><a href="' .  esc_url(home_url()) . '">Home</a></span>';
  $breadcrumbs    = array_reverse($breadcrumbs);

  ?>
    <nav id="breadcrumbs" class="small breadcrumbs">
      <?php echo wp_kses_post(implode(' / ', ($breadcrumbs))); ?>
    </nav>
  <?php
}
