<?php
/**
 * Single comment template
 *
 * @file       comment.php
 * @package    CPT_Theme
 * @subpackage Frontend
 * @since      2.3.11
 */

/**
 * Assembles the comment.
 *
 * @see wp_list_comments() in ../comments.php
 * @param object $comment The current comment object.
 * @param array  $args An array of formatting options.
 * @param int    $depth The depth of the current comment.
 */
function comment( $comment, $args, $depth ) {
	$classes  = 'comment';
	$classes .= $args['has_children'] ? ' parent' : '';

	?>
	<li 
		id="comment-<?php comment_ID(); ?>" 
		class="<?php echo esc_attr( $classes ); ?>"
	>
		<article class="comment-body">
			<header class="comment-author">
				<?php
				if ( get_option( 'show_avatars' ) ) {
					echo get_avatar( get_comment_author_email(), 32, 'mystery' );
				}
				comment_author();
				?>
			</header>
			<div class="comment-content">
				<?php comment_text(); ?>
			</div>
			<footer class="comment-meta">
				<time datetime="<?php echo esc_attr( get_comment_date( 'F jS, Y' ) ); ?>">
					<?php echo wp_kses_post( get_comment_date( 'F jS, Y' ) ); ?>
				</time>
			</footer>

			<div class="reply">
				<?php
				comment_reply_link(
					array_merge(
						$args,
						array(
							'class'     => 'comment-reply-link wp-element-button',
							'depth'     => $depth,
							'max_depth' => 10,
						)
					)
				);
				?>
			</div>
		</article>
	</li>
	<?php
}

add_filter( 'comment_reply_link', 'cpt_theme_comment_reply_link_classes' );
/**
 * Adds .wp-element-button class to the comment reply link so it uses the button element styles from theme.json.
 *
 * @param string $link_text The HTML markup for the comment reply link.
 */
function cpt_theme_comment_reply_link_classes( $link_text ) {
	$link_text = str_replace( "class='comment-reply-link'", "class='comment-reply-link wp-element-button'", $link_text );
	return $link_text;
}

add_filter( 'cancel_comment_reply_link', 'cpt_theme_cancel_comment_reply_link_classes' );
/**
 * Adds .wp-element-button class to the cancel comment reply link so it uses the button element styles from theme.json.
 *
 * @param string $link_text The HTML markup for the cancel comment reply link.
 */
function cpt_theme_cancel_comment_reply_link_classes( $link_text ) {
	$link_text = str_replace( '<a', "<a class='wp-element-button'", $link_text );
	return $link_text;
}
