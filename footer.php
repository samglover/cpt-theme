<?php namespace CPT_Theme; ?>

<footer id="footer">

  <ul id="footer-widgets"><?php dynamic_sidebar( 'footer-widgets' ); ?></ul>

  <p class="copyright"><small>The original content within this website is &copy; <?php echo date('Y') ?>.</small></p>

</footer>

<?php wp_footer(); ?>

</body>
</html>
