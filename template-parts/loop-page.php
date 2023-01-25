<article id="content" <?php post_class(); ?>>
  <?php
    $blocks = parse_blocks($post->post_content);
    $header_classes = 'page-header';
    $header_style = '';
    if (has_post_thumbnail()) {
      $header_classes .= ' has-background-image alignfull';
      $header_style = ' style="background-image: url('. wp_get_attachment_image_url(get_post_thumbnail_id(), 'full') .');"';
    }
  ?>
  <?php if (
    count($blocks) != 0 && 
    !is_front_page() && 
    $blocks[0]['blockName'] != 'core/cover'
  ) { ?>
    <header class="<?php echo $header_classes; ?>"<?php echo $header_style; ?>>
      <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
    </header>
  <?php } ?>
  <div class="entry-content">
    <?php the_content(); ?>
    <div class="clearfix"></div>
  </div>
  <footer class="entry-footer">
    <?php wp_link_pages([
      'before'  => '<p class="post-nav-links-label">Pages</p><p class="post-nav-links">',
      'after'   => '</p>',
    ]); ?>
    <?php if (!is_front_page()) { ?>
      <p class="entry-byline">Last updated on <?php the_modified_date('F jS, Y'); ?>.</p>
    <?php } ?>
  </footer>
</article>
