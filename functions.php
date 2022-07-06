<?php

/**
 * Constants
 */
define( 'CPT_THEME_DIR_PATH', trailingslashit(get_template_directory()) );
define( 'CPT_THEME_DIR_URI', trailingslashit(get_template_directory_uri()) );


/**
 * Theme Files
 */
require_once(CPT_THEME_DIR_PATH . 'theme-setup.php');
require_once(CPT_THEME_DIR_PATH . 'common/fonts.php');

if ( is_admin() ) {
  require_once(CPT_THEME_DIR_PATH . 'admin/options.php');
}

function customizer_options( $wp_customize ) {
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
  ob_start();
    ?>
      <style>
        :root {
          --header-cta-text-color: <?php echo get_option('cpt_sites_primary_menu_cta_text_color'); ?>;
          --header-cta-button-color: <?php echo get_option('cpt_sites_primary_menu_cta_button_color'); ?>;
          --link-color: <?php echo get_option('cpt_sites_link_color'); ?>;
          --link-color-hover: <?php echo get_option('cpt_sites_link_color_hover'); ?>;
        }
      </style>
    <?php
  echo ob_get_clean();
}

add_action('wp_head', 'css_variables');


/**
 * Modal Dismiss Button
 *
 * @param string $modal_ID ID of the modal container to close.
 */
function dismiss_modal($modal_ID = null) {
  if ( !$modal_ID ) { return; }
  ob_start();
    ?>
      <button class="dismiss-modal" onclick="closeModal(<?php echo '\'' . $modal_ID . '\''; ?>)">
        <?php echo file_get_contents(CPT_THEME_DIR_URI . 'assets/images/close.svg'); ?>
      </button>
    <?php
  echo ob_get_clean();
}


function collapsed_menu_item($items, $args) {
  if ( !get_option('cpt_sites_show_primary_menu') || $args->theme_location != 'primary' ) { return $items; }
  ob_start();
    ?>
      <li id="collapsed-menu" class="menu-item menu-item-has-children collapsed-menu">
        <a href="#">&bull;&bull;&bull;</a>
        <ul class="sub-menu"></ul>
      </li>
    <?php
  $items .= ob_get_clean();
  return $items;
}

add_filter('wp_nav_menu_items', 'collapsed_menu_item', 10, 2);


function breadcrumbs() {
  if ( is_front_page() ) { return; }

  // Gets the last breadcrumb first (we'll flip the order as the last step).
  ob_start();
    echo '<span class="breadcrumb last-breadcrumb">';
      if ( !empty(single_post_title('', false)) ) {
        single_post_title();
      } elseif ( is_archive() ) {
        the_archive_title();
      } elseif ( is_search() ) {
        echo 'Search';
      } elseif ( is_404() ) {
        echo '404 Not Found';
      }
    echo '</span>';

  $breadcrumbs[] = ob_get_clean();

  // Gets breadcrumbs for singular posts. Parents for hierarchical post types
  // (like pages), or categories (if they exist) for non-hierarchical post types.
  if ( is_singular() ) {
    $post_id        = get_the_ID();
    $post_type      = get_post_type_object(get_post_type($post_id));

    if ( $post_type->hierarchical ) {
      $parent_id = wp_get_post_parent_id( $post_id );
      while ( $parent_id ) {
        $parent_url     = get_the_permalink($parent_id);
        $parent_title   = get_the_title($parent_id);
        $breadcrumbs[]  = '<span class="breadcrumb"><a href="' . $parent_url . '">' . $parent_title . '</a></span>';
        $parent_id      = wp_get_post_parent_id($parent_id);
      }
    } else {
      $categories = get_the_terms($post_id, 'category');

      if ( $categories ) {
        $category_id        = $categories[0]->term_id;
        $category_url       = get_term_link($category_id);
        $category_title     = $categories[0]->name;
        $breadcrumbs[]      = '<span class="breadcrumb"><a href="' . $category_url . '">' . $category_title . '</a></span>';
        $category_parent    = $categories[0]->parent;

        while ( $category_parent ) {
          $category         = get_term($category_parent);
          $category_id      = $category->term_id;
          $category_url     = get_term_link($category_id);
          $category_title   = $category->name;
          $breadcrumbs[]    = '<span class="breadcrumb"><a href="' . $category_url . '">' . $category_title . '</a></span>';
          $category_parent  = $category->parent;
        }
      }
    }
  } elseif ( is_category() || is_tag() || is_tax() ) {
    $term       = get_queried_object();
    $ancestors  = get_ancestors($term->term_id, $term->taxonomy);

    foreach ( $ancestors as $term_id ) {
      $term_obj = get_term($term_id);
      $breadcrumbs[] = '<span class="breadcrumb"><a href="' . get_term_link($term_obj->term_id) . '">' . esc_html($term_obj->name) . '</a></span>';
    }
  }

  $breadcrumbs[]  = '<span class="breadcrumb home-breadcrumb"><a href="' . home_url() . '">Home</a></span>';
  $breadcrumbs    = array_reverse($breadcrumbs);

  ob_start();
    ?>
      <nav id="breadcrumbs" class="small breadcrumbs">
        <?php echo implode(' / ', $breadcrumbs); ?>
      </nav>
    <?php
  echo ob_get_clean();
}
