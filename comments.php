<?php
  if (post_password_required()) return;
  $comment_count = get_comment_count(get_the_ID())['approved'];
?>

<div id="comments" class="wp-block-group has-global-padding is-layout-constrained">
  <?php if (have_comments()) : ?>
    <h3 class="comments-title comments-title"><?php echo $comment_count . ' ' . _n('Comment', 'Comments', $comment_count, 'cpt-theme'); ?></h3>
    <ol class="comments-list comments-list">
      <?php wp_list_comments([
        'callback' => 'comment',
        'style' => 'ol',
      ]); ?>
    </ol>
    <?php the_comments_pagination(); ?>
  <?php endif; ?>
  <?php
    ob_start();
      ?>
        <p class="comment-form comment-form">
          <label for="comment">Comment <span class="required" aria-hidden="true">*</span></label>
          <textarea id="comment" class="comment-field" name="comment" cols="45" rows="5" maxlength="65525" required=""></textarea>
        </p>
      <?php
    $comment_field = ob_get_clean();

    comment_form([
      'class_container'     => 'comment-respond',
      'class_form'          => 'comment-form',
      'cancel_reply_before' => '',
      'cancel_reply_link'   => __('Cancel Reply', 'cpt-theme'),
      'cancel_reply_before' => '',
      'comment_field'       => $comment_field,
      'comment_notes_before' => '',
      'logged_in_as'        => '<p class="logged-in-as">' . __('Logged in as', 'cpt-theme') . ' ' . wp_get_current_user()->display_name . '. <a href="' . wp_logout_url(get_permalink()) . '">' . __('Log out?', 'cpt-theme') . '</a></p>',
      'submit_button'       => '<input name="%1$s" type="submit" id="%2$s" class="button %3$s" value="%4$s" />',
    ]);
  ?>
</div><!--#comments-->