<?php
/**
 * Comments template
 *
 * @file    comments.php
 * @package CPT_Theme
 * @since   2.3.12
 */

if ( post_password_required() ) {
	return;
}

$comment_count = get_comment_count( get_the_ID() )['approved'];
?>

<div id="comments" class="wp-block-group has-global-padding is-layout-constrained">
	<?php if ( have_comments() ) : ?>
		<h3 class="comments-title comments-title">
			<?php
			echo wp_kses_post( $comment_count . ' ' . _n( 'Comment', 'Comments', $comment_count, 'cpt-theme' ) );
			?>
		</h3>
		<ol class="comments-list comments-list">
			<?php
			wp_list_comments(
				array(
					'callback' => 'comment',
					'style'    => 'ol',
				)
			);
			?>
		</ol>
		<?php the_comments_pagination(); ?>
	<?php endif; ?>

	<?php ob_start(); ?>

	<p class="comment-form comment-form">
		<label for="comment">Comment <span class="required" aria-hidden="true">*</span></label>
		<textarea 
			id="comment" 
			class="comment-field" 
			name="comment" 
			cols="45" 
			rows="5" 
			maxlength="65525" 
			required=""
		></textarea>
	</p>

	<?php $comment_field = ob_get_clean(); ?>

	<?php ob_start(); ?>

	<p class="logged-in-as">
		<?php esc_html( __( 'Logged in as', 'cpt-theme' ) . ' ' . wp_get_current_user()->display_name ); ?>
		<a href="<?php echo esc_url( wp_logout_url( get_permalink() ) ); ?>">
			<?php esc_html_e( 'Log out?', 'cpt-theme' ); ?>
		</a>
	</p>

	<?php $logged_in_as = ob_get_clean(); ?>

	<?php
	comment_form(
		array(
			'class_container'      => 'comment-respond',
			'class_form'           => 'comment-form',
			'cancel_reply_before'  => '',
			'cancel_reply_link'    => __( 'Cancel Reply', 'cpt-theme' ),
			'comment_field'        => $comment_field,
			'comment_notes_before' => '',
			'logged_in_as'         => $logged_in_as,
			'submit_button'        => '<input name="%1$s" type="submit" id="%2$s" class="button wp-element-button %3$s" value="%4$s" />',
		)
	);
	?>
</div><!--#comments-->