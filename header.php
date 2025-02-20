<?php
/**
 * Header template
 *
 * @file    header.php
 * @package CPT_Theme
 * @since   1.0.0
 */

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<?php wp_head(); ?>
</head>

<?php
$classes = array();
if ( get_option( 'show_avatars' ) ) {
	$classes[] = 'show-avatars';
}
if ( is_singular() ) {
	$classes[] = 'is-singular';
}
if ( has_post_thumbnail() ) {
	$classes[] = 'has-featured-image';
}

if ( $post ) {
	$blocks = parse_blocks( $post->post_content );
	if (
		count( $blocks ) > 0
		&& 'core/cover' === $blocks[0]['blockName']
	) {
		$classes[] = 'has-cover';
	}
}
?>

<body <?php body_class( $classes ); ?>>
	<?php wp_body_open(); ?>
	<a class="skip-link screen-reader-text" href="#content">
		<?php esc_html_e( 'Skip to content', 'cpt-theme' ); ?>
	</a>

	<div id="page-content" class="site wp-site-blocks">
		<?php get_template_part( 'template-parts/site-header' ); ?>
		<main id="main" class="site-main wp-block-group">
