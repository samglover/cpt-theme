<?php
/**
 * Frontend functions
 *
 * @file       frontend.php
 * @package    CPT_Theme
 * @subpackage Frontend
 * @since      1.0.0
 */

add_filter( 'body_class', 'cpt_body_classes' );
/**
 * Adds a `cpt-theme` class to the <body> tag for CSS customization.
 *
 * @param array $classes An array of body class names.
 */
function cpt_body_classes( $classes ) {
	$classes[] = 'cpt-theme';
	return $classes;
}

add_filter( 'the_content_more_link', 'read_more_link' );
/**
 * Customizes the read-more link.
 */
function read_more_link() {
	ob_start()
	?>
	<p>
		<a 
			class="more-link button button-small wp-element-button" 
			href="<?php echo esc_url( get_permalink() ); ?>"
		><?php esc_html_e( 'Read More', 'cpt-theme' ); ?></a>
	</p>
	<?php
	return ob_get_clean();
}


/**
 * Checks to see if the post has a title. Must be used in the loop.
 *
 * @return bool
 */
function has_post_title( $post_id = false ) {
	if ( ! $post_id ) {
		$post_id = get_the_ID();
	}

	if ( ! $post_id ) {
		return;
	}

	if ( ! empty( get_the_title( $post_id ) ) ) {
		return true;
	}

	return false;
}
/**
 * Checks to see if the post has a title or thumnail. Must be used in the loop.
 *
 * @return bool
 */
function has_post_header( $post_id = false ) {
	if ( ! $post_id ) {
		$post_id = get_the_ID();
	}

	if ( ! $post_id ) {
		return;
	}

	if ( has_post_title( $post_id ) || has_post_thumbnail( $post_id ) ) {
		return true;
	}

	return false;
}

add_filter( 'document_title_parts', 'cpt_no_title_title_tag' );
/**
 * Uses the first 15 words of the content for the `title` tag if there is no post title.
 *
 * @param array $title_parts The post title.
 * @return string
 */
function cpt_no_title_title_tag( $title_parts ) {
	if (
		doing_action( 'wp_head' ) &&
		is_singular() &&
		! has_post_title()
	) {
		$title_parts['title'] = wp_trim_words( wp_strip_all_tags( get_the_content() ), 15, '…' );
	}

	return $title_parts;
}