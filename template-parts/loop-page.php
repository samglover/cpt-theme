<?php
/**
 * Page loop template
 *
 * @file       loop-page.php
 * @package    CPT_Theme
 * @subpackage Template_Parts
 * @since      1.0.0
 */

?>

<article id="content" <?php post_class(); ?>>
	<?php
	$blocks         = parse_blocks( $post->post_content );
	$page_header_classes = 'page-header has-global-padding is-layout-constrained';

	if ( is_front_page() ) {
		$page_header_classes .= ' screen-reader-text';
	}

	if ( has_post_thumbnail() ) {
		$page_header_classes .= ' has-background-image alignfull';
	}

	if (
		! $blocks || (
			$blocks && (
				( 'core/cover' !== $blocks[0]['blockName'] )
				&& (
					! isset( $blocks[0]['innerBlocks'][0]['blockName'] )
					|| (
						isset( $blocks[0]['innerBlocks'][0]['blockName'] )
						&& 'core/cover' !== $blocks[0]['innerBlocks'][0]['blockName']
					)
				)
			)
		)
	) {
		?>
		<header 
			class="<?php echo esc_attr( $page_header_classes ); ?>"
			<?php if ( has_post_thumbnail() ) { ?>
				style="background-image: url('<?php echo esc_url( wp_get_attachment_image_url( get_post_thumbnail_id(), 'full' ) ); ?>');"
			<?php } ?>
		>
			<?php the_title( '<h1 class="entry-title wp-block-post-title">', '</h1>' ); ?>
		</header>
		<?php
	}
	?>
	<div class="entry-content wp-block-post-content has-global-padding is-layout-constrained">
		<?php the_content(); ?>
		<div class="clearfix"></div>
	</div>
	<?php
	// Show the page footer only if the page is paginated.
	global $numpages;
	if ( $numpages > 1 ) {
		?>
		<footer class="entry-footer has-global-padding is-layout-constrained">
			<?php
			wp_link_pages(
				array(
					'before' => '<p class="post-nav-links-label">Pages</p><p class="post-nav-links">',
					'after'  => '</p>',
				)
			);
			?>
		</footer>
		<?php
	}
	?>
</article>
