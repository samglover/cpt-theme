        </main><!-- #main -->
      </div><!-- #primary -->
    </div><!-- #content -->

    <footer id="footer">
      <ul id="footer-widgets"><?php dynamic_sidebar('footer-widgets'); ?></ul>
      <p class="copyright"><small>The original content within this website is &copy; <?php echo date('Y') ?>.</small></p>
    </footer>
  </div><!-- #page -->

  <?php if ( !empty(get_option('cpt_sites_primary_menu_cta_code')) ) { ?>
    <div id="cta-modal" class="modal-container">
      <div class="modal card">
        <button class="dismiss-modal">
          <?php echo file_get_contents(CPT_THEME_DIR_URI . 'assets/images/close.svg'); ?>
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
      <div class="modal-screen"></div>
    </div>
  <?php } ?>

  <?php wp_footer(); ?>

</body>
</html>
