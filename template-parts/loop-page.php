<article id="content" <?php post_class(); ?>>
  <?php 
    $blocks = parse_blocks($post->post_content);
    $header_classes = 'page-header has-global-padding is-layout-constrained';
    $header_style = '';
    if (is_front_page()) $header_classes .= ' screen-reader-text';
    if (has_post_thumbnail()) {
      $header_classes .= ' has-background-image alignfull';
      $header_style = ' style="background-image: url('. wp_get_attachment_image_url(get_post_thumbnail_id(), 'full') .');"';
    }
  ?>
  <?php if (
    $blocks && 
    $blocks[0]['blockName'] != 'core/cover' && 
    (isset($blocks[0]['innerBlocks'][0]['blockName']) && $blocks[0]['innerBlocks'][0]['blockName'] != 'core/cover')
  ) { ?>
    <header class="<?php echo $header_classes; ?>"<?php echo $header_style; ?>>
      <?php the_title('<h1 class="entry-title wp-block-post-title">', '</h1>'); ?>
    </header>
  <?php } ?>
  <div class="entry-content wp-block-post-content has-global-padding is-layout-constrained">
    <?php the_content(); ?>
    <div class="clearfix"></div>
  </div>
  <?php 
    // Show the page footer only if the page is paginated.
    global $numpages;
    if ($numpages > 1) { 
  ?>
    <footer class="entry-footer has-global-padding is-layout-constrained">
      <?php wp_link_pages([
        'before'  => '<p class="post-nav-links-label">Pages</p><p class="post-nav-links">',
        'after'   => '</p>',
      ]); ?>
    </footer>
  <?php } ?>
</article>
