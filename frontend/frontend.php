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
function has_post_title() {
	if ( ! in_the_loop() ) {
		return;
	}

	if ( ! empty( get_the_title() ) ) {
		return true;
	}

	return false;
}
/**
 * Checks to see if the post has a title or thumnail. Must be used in the loop.
 *
 * @return bool
 */
function has_post_header() {
	if ( ! in_the_loop() ) {
		return;
	}

	if ( has_post_title() || has_post_thumbnail() ) {
		return true;
	}

	return false;
}