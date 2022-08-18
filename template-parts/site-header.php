<?php
  $header_classes = 'site-header';
  $header_classes .= get_theme_mod('custom_logo') ? ' has-custom-logo' : '';
  $header_classes .= get_option('cpt_sites_show_primary_menu') ? ' show-primary-menu' : '';
  $header_classes .= get_option('cpt_sites_show_primary_menu_cta') ? ' show-header-cta' : '';

  $site_title         = get_bloginfo('name');
  $site_title_tag     = is_front_page() ? 'h1' : 'p';
  $site_description   = get_bloginfo('description');

  $site_title_classes = 'site-title-container';
  $site_title_classes .= get_option('cpt_sites_show_site_title') ? '' : ' screen-reader-text';
?>

<header class="<?php echo esc_attr($header_classes); ?>">
  <div class="site-header-primary-nav">
    <div class="site-branding">
      <?php
        if (get_theme_mod('custom_logo')) {
          echo '<a class="site-logo" href="' .  esc_url(home_url()) . '">' . wp_get_attachment_image(get_theme_mod('custom_logo'), 'tiny', false, ['alt' => $site_title]) . '</a>';
        }

        echo '<div class="' . esc_attr($site_title_classes) . '">';
          echo '<' . esc_attr($site_title_tag) . ' class="site-title"><a href="' .  esc_url(home_url()) . '">' . wp_kses_post($site_title) . '</a></' . esc_attr($site_title_tag) . '>';
          if ( $site_description ) {
            echo '<p class="site-description">' . wp_kses_post($site_description) . '</p>';
          }
        echo '</div>';
      ?>
    </div>
    <?php
      $show_primary_menu  = get_option('cpt_sites_show_primary_menu');
      $show_cta           = get_option('cpt_sites_show_primary_menu_cta');

      if ($show_primary_menu || $show_cta) {
        ?>
          <nav class="primary-menu-container">
            <?php
              if ($show_primary_menu) {
                wp_nav_menu([
                  'theme_location'  => 'primary',
                  'container_id'    => 'primary-menu',
                  'fallback_cb'     => false,
                ]);
              }

              if ($show_cta) {
                echo '<a id="header-cta" class="button" data-style="' . esc_attr(get_option('cpt_sites_primary_menu_cta_style')) . '" href="' . esc_url(get_option('cpt_sites_primary_menu_cta_url')) . '">';
                  echo wp_kses_post(get_option('cpt_sites_primary_menu_cta_text'));
                echo '</a>';
              }
            ?>
          </nav>
        <?php
      }
    ?>
  </div><!--.site-header-primary-->
  <nav class="secondary-menu-container">
    <?php
      if (get_option('cpt_sites_show_secondary_menu')) {
        wp_nav_menu([
          'theme_location'  => 'secondary',
          'container_id'    => 'secondary-menu',
          'fallback_cb'     => false,
        ]);
      }
    ?>
  </nav>
  <?php
    if ( get_option('cpt_sites_show_breadcrumbs') ) {
      breadcrumbs();
    }
  ?>
</header>
