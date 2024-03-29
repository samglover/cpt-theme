    </main>
    <footer id="footer" class="site-footer wp-block-group alignfull has-global-padding is-layout-constrained">
      <div class="site-footer__inner wp-block-group has-global-padding is-layout-constrained">
        <ul id="footer-widgets" class="footer-widgets wp-block-group is-layout-flex"><?php dynamic_sidebar('footer-widgets'); ?></ul>
        <p class="footer-meta">
          <span class="copyright">The original content within this website is &copy; <?php echo esc_html(date('Y')) ?>.</a></span>
          <span class="developer"><a href="https://samglover.net">Website design and development by Sam Glover.</a></span>
        </p>
      </div>
    </footer>
  </div>

  <?php if (get_option('cpt_sites_primary_menu_cta_style') == 'modal') { ?>
    <div id="cta-modal" class="modal card">
      <button class="cta-modal-dismiss"></button>
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
