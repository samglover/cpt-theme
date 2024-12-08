    </main>
    <footer id="footer" class="site-footer">
      <ul id="footer-widgets" class="footer-widgets wp-block-group is-layout-flex"><?php dynamic_sidebar('footer-widgets'); ?></ul>
      <div class="footer-meta wp-block-group has-global-padding is-layout-constrained">
        <div class="wp-block-group is-layout-flex is-content-justification-space-between">
          <p class="copyright">The original content within this website is &copy; <?php echo esc_html(date('Y')) ?>.</a></p>
          <p class="developer"><a href="https://samglover.net">Website design and development by Sam Glover.</a></p>
        </div>
      </div>
    </footer>
  </div>

  <?php if (get_option('cpt_sites_primary_menu_cta_style') == 'modal') { ?>
    <div id="cta-modal" class="modal card">
      <button class="cta-modal-dismiss">
        <span class="screen-reader-text">Close</span>
      </button>
      <?php
        $cta_code = get_option('cpt_sites_primary_menu_cta_code');
        $cta_code = wptexturize($cta_code);
        $cta_code = wpautop($cta_code);
        $cta_code = shortcode_unautop($cta_code);
        $cta_code = do_shortcode($cta_code);
        echo $cta_code;
      ?>
    </div>
    <div id="cta-modal-screen"></div>
  <?php } ?>

  <?php wp_footer(); ?>
</body>
</html>
