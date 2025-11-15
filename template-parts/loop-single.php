<?php
/**
 * Single post loop template
 *
 * @file       loop-single.php
 * @package    CPT_Theme
 * @subpackage Template_Parts
 * @since      1.0.0
 */

?>

<?php
$has_post_header = has_post_header();
$has_post_title  = has_post_title();
?>

<article id="content" <?php post_class(); ?>>
	<?php if ( $has_post_header ) { ?>
		<header class="page-header has-global-padding is-layout-constrained">
			<?php
			if ( $has_post_title ) {
				the_title( '<h1 class="entry-title wp-block-post-title">', '</h1>' );
			}
			if ( has_post_thumbnail() ) {
				the_post_thumbnail();
			}
			?>
		</header>
	<?php } ?>
	<div class="entry-content wp-block-post-content has-global-padding is-layout-constrained">
		<?php the_content(); ?>
		<div class="clearfix"></div>
	</div>
	<footer class="entry-footer has-global-padding is-layout-constrained">
		<?php
		wp_link_pages(
			array(
				'before' => '<p class="post-nav-links-label">Pages</p><p class="post-nav-links">',
				'after'  => '</p>',
			)
		);
		?>
		<?php cpt_the_terms(); ?>
		<p class="entry-byline">
			<?php
			printf(
				// Translators: %s is the author's display name.
				esc_html__( 'By %s.', 'cpt-theme' ),
				get_the_author()
			);

			$original_date = get_the_date( 'F jS, Y' );
			$modified_date = get_the_modified_date( 'F jS, Y' );

			if ( strtotime( $modified_date ) > strtotime( $original_date ) ) {
				printf(
					// Translators: %s is the original publication date.
					' ' . esc_html__( 'Originally published on %s.', 'cpt-theme' ),
					$original_date
				);
				printf(
					// Translators: %s is the date the post was last modified.
					' ' . esc_html__( 'Last updated on %s.', 'cpt-theme' ),
					$modified_date
				);
			} else {
				printf(
					// Translators: %s is the publication date.
					' ' . esc_html__( 'Published on %s.', 'cpt-theme' ),
					$original_date
				);
			}
			?>
		</p>
	</footer>
</article>
