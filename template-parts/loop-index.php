<?php
/**
 * Index loop template
 *
 * @file       loop-index.php
 * @package    CPT_Theme
 * @subpackage Template_Parts
 * @since      1.0.0
 */

?>

<article id="post-<?php echo esc_attr( get_the_ID() ); ?>" <?php post_class(); ?>>
	<?php if ( has_post_thumbnail() ) { ?>
		<a 
			class="wp-post-image__container" 
			href="<?php the_permalink(); ?>" 
			rel="bookmark" title="<?php the_title(); ?>"
		>
			<?php the_post_thumbnail( 'medium' ); ?>
		</a>
	<?php } ?>
	<div class="title-excerpt-footer__container">
		<header class="entry-header has-global-padding is-layout-constrained">
			<h2 class="post-title wp-block-post-title is-layout-constrained">
				<a 
					href="<?php the_permalink(); ?>" 
					rel="bookmark" 
					title="<?php the_title(); ?>"
				>
					<?php the_title(); ?>
				</a>
			</h2>
		</header>
		<div class="entry-content entry-excerpt wp-block-post-content has-global-padding is-layout-constrained">
			<p class="excerpt"><?php echo wp_kses_post( get_the_excerpt() ); ?></p>
			<div class="clearfix"></div>
		</div>
		<footer class="entry-footer has-global-padding is-layout-constrained">
			<?php $comment_count = get_comment_count( get_the_ID() )['approved']; ?>
			<p class="entry-byline">
				<?php
				printf(
					// Translators: %1$s is the author's display name. %2$s is the publication date.
					esc_html__( 'By %1$s on %2$s.', 'cpt-theme' ),
					/* $1%s */ esc_html( get_the_author_meta( 'display_name' ) ),
					/* $2%s */ esc_html( get_the_date( 'F jS, Y' ) ),
				);
				?>
				<?php if ( $comment_count ) { ?>
					<span class="comment-count">
						<a href="<?php echo esc_url( get_the_permalink() ); ?>#comments">
							<i class="comments-icon"></i>
							<?php echo esc_html( $comment_count ); ?>
						</a>
					</span>
				<?php } ?>
			</p>
		</footer>
	</div>
</article>
