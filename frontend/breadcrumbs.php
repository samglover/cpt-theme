<?php

function breadcrumbs($separator = '/') {
  if (is_front_page()) return;

  $breadcrumbs = [];

  // Gets the last breadcrumb (the current page) first. Then we'll walk up the 
  // ancestry tree and flip the order as the last step.
  $label = false;
  if (is_home()) {
    $label = get_the_title(get_option('page_for_posts'));
    if (is_paged()) $label .= ' (Page ' . get_query_var('paged') . ')';
  } elseif (is_singular()) {
    $label = get_the_title();
    if (get_query_var('page')) $label .= ' (Page ' . get_query_var('page') . ')';
  } elseif (is_archive()) {
    $label = get_the_archive_title();
    if (is_paged()) $label .= ' (Page ' . get_query_var('paged') . ')';
  } elseif (is_search()) {
    $label = __('Search Results for', 'cpt-theme') . ' "' . esc_html(get_search_query()) . '"';
    if (is_paged()) $label .= ' (Page ' . get_query_var('paged') . ')';
  } elseif (is_404()) {
    $label = '404 Not Found';
  }

  if ($label) {
    $breadcrumbs[] = [
      'addl_classes'  => ['last-breadcrumb'],
      'label'         => $label,
      'url'           => false,
    ];
  }

  // Gets breadcrumbs for singular posts. Parents for hierarchical post types
  // (like pages), or categories (if they exist) for non-hierarchical post types.
  if (is_singular()) {
    $post_id    = get_the_ID();
    $post_type  = get_post_type_object(get_post_type($post_id));

    if ($post_type->hierarchical) {
      $parent_id = wp_get_post_parent_id($post_id);
      while ($parent_id){
        $breadcrumbs[] = [
          'label' => get_the_title($parent_id),
          'url'   => get_the_permalink($parent_id),
        ];
        $parent_id = wp_get_post_parent_id($parent_id);
      }
    } else {
      $categories = get_the_terms($post_id, 'category');

      if ($categories){
        $category_id      = $categories[0]->term_id;
        $category_url     = get_term_link($category_id);
        $category_parent  = $categories[0]->parent;
        while ($category_parent) {
          $category = get_term($category_parent);
          $breadcrumbs[] = [
            'label' => $category->name,
            'url'   => get_term_link($category_id),
          ];
          $category_parent = $category->parent;
        }
      }
    }
  } elseif (is_category() || is_tag() || is_tax()) {
    $term       = get_queried_object();
    $ancestors  = get_ancestors($term->term_id, $term->taxonomy);

    foreach ($ancestors as $term_id) {
      $term_obj = get_term($term_id);
      $breadcrumbs[] = [
        'label' => $term_obj->name,
        'url'   => get_term_link($term_obj->term_id),
      ];
    }

    $blog_page_id = get_option('page_for_posts');
    $breadcrumbs[] = [
      'label' => get_the_title($blog_page_id),
      'url'   => get_permalink($blog_page_id),
    ];
  }

  if (is_singular('post')) {
    $blog_page_id = get_option('page_for_posts');
    $breadcrumbs[] = [
      'label' => get_the_title($blog_page_id),
      'url'   => get_permalink($blog_page_id),
    ];
  } elseif (is_singular() && !is_page()) {
    $post_type = get_post_type();
    $breadcrumbs[] = [
      'label' => apply_filters('post_type_archive_title', get_post_type_object($post_type)->labels->name, $post_type),
      'url'   => get_post_type_archive_link($post_type),
    ];
  }

  $breadcrumbs[] = [
    'addl_classes'  => ['home-breadcrumb'],
    'label'         => __('Home', 'cpt-theme'),
    'url'           => home_url(),
  ];
  
  // Flips the array.
  $breadcrumbs = array_reverse($breadcrumbs);
  $breadcrumbs = apply_filters('cpt_breadcrumbs', $breadcrumbs);

  ?>
    <div class="breadcrumbs wp-block-group has-global-padding is-layout-constrained">
      <nav class="breadcrumbs__inner wp-block-group alignwide">
        <?php foreach ($breadcrumbs as $key => $breadcrumb) { ?>
          <?php 
            $classes = ['breadcrumb'];
            if (isset($breadcrumb['addl_classes'])) {
              $classes = array_merge($classes, $breadcrumb['addl_classes']);
            }
          ?>
          <span class="<?php echo implode(' ', $classes); ?>">
            <?php if ($breadcrumb['url']) { ?>
              <a 
                href="<?php echo esc_url($breadcrumb['url']); ?>"
                alt="<?php echo esc_attr($breadcrumb['label']); ?>"
              ><?php echo esc_html($breadcrumb['label']); ?></a>
            <?php } else { ?>
              <?php echo esc_html($breadcrumb['label']); ?>
            <?php } ?>
          </span>
          <?php if ($key < count($breadcrumbs) -1) echo ' <span class="breadcrumbs-separator">' . $separator . '</span> '; ?>
        <?php } ?>
      </nav>
    </div>
  <?php
}
