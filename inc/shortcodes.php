<?php

namespace CPT_Theme\Inc;

/**
 * List Child Pages
 */

// Explodes a comma-separated list (',' and ', ').
// Nabbed from the excellent Display Posts Shortcode plugin.
// https://wordpress.org/plugins/display-posts-shortcode/
function explode_csv( $string = '' ) {
  $string = str_replace( ', ', ',', $string );
  return explode( ',', $string );
}

function list_child_pages( $atts ) {

  // Defaults
  $atts = shortcode_atts( [
    'parent'  => get_the_ID(),
    'exclude' => false,
  ], $atts );

  $exclude      = $atts[ 'exclude' ];
  $post__not_in = array();

  // Maps string of comma-separated post IDs to exclude to an array.
  if ( ! empty( $exclude ) ) {
		$post__not_in = array_map( 'intval', explode_csv( $exclude ) );
	}

  // Excludes the current page, just in case the current page is a child of
  // $atts[ 'parent' ].
  $post__not_in[] = get_the_ID();

  $args = [
    'meta_key'        => '_yoast_wpseo_meta-robots-noindex',
    'meta_value'      => [ 0, 2 ], // 0 = not set; 2 = no.
    'order'           => 'ASC',
    'orderby'			    => 'menu_order',
    'post__not_in'    => $post__not_in,
    'post_parent'     => $atts[ 'parent' ],
    'posts_per_page'  => -1,
    'post_type'       => 'page',
  ];

  $child_pages_query = new \WP_Query( $args );

  ob_start();

    if ( $child_pages_query->have_posts() ) :

      echo '<h2>More About ' . get_the_title() . '</h2>';
      echo '<ul class="child-pages">';

        while ( $child_pages_query->have_posts() ) : $child_pages_query->the_post();

          echo '<li><a href="' . get_the_permalink() . '" title="' . get_the_title() . '">' . get_the_title() . '</a></li>';

        endwhile;

        wp_reset_postdata();

      echo '</ul>';

    endif;

  return ob_get_clean();

}

add_shortcode( 'list-child-pages', __NAMESPACE__ .  '\list_child_pages' );
