<?php

function breadcrumbs() {
  if (is_front_page()) return;

  // Gets the last breadcrumb (the current page) first. Then we'll walk up the 
  // ancestry tree and flip the order as the last step.
  ob_start();
    echo '<span class="breadcrumb last-breadcrumb">';
      if (is_home()) {
        echo get_the_title(get_option('page_for_posts'));
      } elseif (is_singular()) {
        single_post_title();
      } elseif (is_archive()) {
        the_archive_title();
      } elseif (is_search()) {
        echo __('Search Results for', 'cpt-theme') . ' "' . esc_html(get_search_query()) . '"';
      } elseif (is_404()) {
        echo '404 Not Found';
      }

      if (is_singular() && get_query_var('page')) echo ' (Page ' . get_query_var('page') . ')';
      if ((is_home() || is_archive() || is_search()) && is_paged()) echo ' (Page ' . get_query_var('paged') . ')';
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

  if (is_singular('post')) {
    $blog_page_id = get_option('page_for_posts');
    $breadcrumbs[] = '<span class="breadcrumb"><a href="' . get_permalink($blog_page_id) . '">' . get_the_title($blog_page_id) . '</a></span>';
  } elseif (is_singular()) {
    $post_type = get_post_type();
    $link = get_post_type_archive_link($post_type);
    $title = apply_filters('post_type_archive_title', get_post_type_object($post_type)->labels->name, $post_type);
    $breadcrumbs[] = '<span class="breadcrumb"><a href="' . $link . '">' . $title . '</a></span>';
  }
  
  $breadcrumbs[]  = '<span class="breadcrumb home-breadcrumb"><a href="' .  esc_url(home_url()) . '">Home</a></span>';
  $breadcrumbs    = array_reverse($breadcrumbs);

  ?>
    <div class="breadcrumbs wp-block-group has-global-padding is-layout-constrained">
      <nav class="breadcrumbs__inner wp-block-group alignwide">
        <?php echo wp_kses_post(implode(' / ', ($breadcrumbs))); ?>
      </nav>
  </div>
  <?php
}
