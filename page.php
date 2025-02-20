<?php
/**
 * Page template
 *
 * @file    page.php
 * @package CPT_Theme
 * @since   1.0.0
 */

get_header();

if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/loop-page' );
	}
	if (
		comments_open()
		|| get_comments_number()
	) {
		comments_template();
	}
} else {
	echo '<p class="post">' . esc_html__( 'No posts match your query.', 'cpt-theme' ) . '</p>';
}

get_footer();
