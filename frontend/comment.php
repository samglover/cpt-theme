<?php

function comment($comment, $args, $depth) {
  $classes = 'comment';
  $classes .= $args['has_children'] ? ' parent' : '';

  ?>
    <li id="comment-<?php comment_ID(); ?>" class="<?php echo $classes; ?>">
  		<article class="comment-body">
        <header class="comment-author">
          <?php if (get_option('show_avatars')) echo get_avatar(get_comment_author_email(), 32, 'mystery'); ?>
          <?php echo comment_author(); ?>
        </header><!-- .comment-meta -->

        <div class="comment-content">
          <?php comment_text(); ?>
        </div><!-- .comment-content -->

        <footer class="comment-meta">
          <?php echo '<time datetime="' . get_comment_date('F jS, Y') . '">' . get_comment_date('F jS, Y') . '</time>'; ?>
        </footer><!-- .comment-meta -->

        <div class="reply">
          <?php comment_reply_link(array_merge($args, [
            'class'     => 'comment-reply-link wp-element-button',
            'depth'     => $depth,
            'max_depth' => 10,
          ])); ?>
        </div>
      </article><!-- .comment-body -->
  <?php
}

add_filter('comment_reply_link', 'cpt_theme_comment_reply_link_classes');
function cpt_theme_comment_reply_link_classes($link_text) {
	$link_text = str_replace("class='comment-reply-link'", "class='comment-reply-link wp-element-button'", $link_text);
	return $link_text;
}

add_filter('cancel_comment_reply_link', 'cpt_theme_cancel_comment_reply_link_classes');
function cpt_theme_cancel_comment_reply_link_classes($link_text) {
	$link_text = str_replace("<a", "<a class='wp-element-button'", $link_text);
	return $link_text;
}
