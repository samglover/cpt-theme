<?php
  $header_classes = 'site-header';
  $header_classes .= get_theme_mod('custom_logo') ? ' has-custom-logo' : '';
  $header_classes .= get_option('cpt_sites_show_preheader') ? ' show-preheader' : '';
  $header_classes .= get_option('cpt_sites_show_primary_menu') ? ' show-primary-menu' : '';
  $header_classes .= get_option('cpt_sites_show_primary_menu_cta') ? ' show-header-cta' : '';

  $site_title         = get_bloginfo('name');
  $site_title_tag     = is_front_page() ? 'h1' : 'p';
  $site_description   = get_bloginfo('description');

  $site_title_classes = 'site-title-container';
  $site_title_classes .= get_option('cpt_sites_show_site_title') ? '' : ' screen-reader-text';

  $show_primary_menu  = get_option('cpt_sites_show_primary_menu');
  $show_cta           = get_option('cpt_sites_show_primary_menu_cta');
?>

<header class="<?php echo esc_attr($header_classes); ?>">
  <?php if (get_option('cpt_sites_show_preheader')) { ?>
    <div class="site-preheader wp-block-group alignfull has-global-padding is-layout-constrained">
      <div class="site-preheader__inner wp-block-group alignwide">
        <ul id="preheader-widgets">
          <?php dynamic_sidebar('preheader-widgets'); ?>
        </ul>
      </div>
    </div>
  <?php } ?>
  <?php if (get_option('cpt_sites_sticky_header')) { ?>
    <div class="sticky-header-spacer" aria-hidden="true"></div>
  <?php } ?>
  <div class="site-header-primary-nav wp-block-group alignfull has-global-padding is-layout-constrained">
    <div class="site-header-primary-nav__inner wp-block-group alignwide">
      <div class="site-branding">
        <?php if (get_theme_mod('custom_logo')) { ?>
          <a class="site-logo" href="<?php echo esc_url(home_url()); ?>">
            <?php echo wp_get_attachment_image(get_theme_mod('custom_logo'), 'tiny', false, ['alt' => $site_title]); ?>
          </a>
        <?php } ?>
        <div class="<?php echo esc_attr($site_title_classes); ?>">
          <?php echo '<' . esc_attr($site_title_tag) . ' class="site-title"><a href="' . esc_url(home_url()) . '">' . wp_kses_post($site_title) . '</a></' . esc_attr($site_title_tag) . '>'; ?>
          <?php if ( $site_description ) { ?>
            <p class="site-description"><?php echo wp_kses_post($site_description); ?></p>
          <?php } ?>
        </div>
      </div>
      <?php if ($show_primary_menu || $show_cta) { ?>
        <nav class="primary-menu-container">
          <?php
            if ($show_primary_menu) {
              wp_nav_menu([
                'theme_location'  => 'primary',
                'container_id'    => 'primary-menu',
                'fallback_cb'     => false,
              ]);
            }
          ?>
          <?php if ($show_cta) { ?>
            <a id="header-cta" class="button" data-style="<?php echo esc_attr(get_option('cpt_sites_primary_menu_cta_style')); ?>" href="<?php echo esc_url(get_option('cpt_sites_primary_menu_cta_url')); ?>">
              <?php echo wp_kses_post(get_option('cpt_sites_primary_menu_cta_text')); ?>
            </a>
          <?php } ?>
        </nav>
      <?php } ?>
    </div>
  </div>
  <?php if (get_option('cpt_sites_show_secondary_menu')) { ?>
    <nav class="secondary-menu-container site-header-secondary-nav wp-block-group alignfull has-global-padding is-layout-constrained">
    <?php
      wp_nav_menu([
        'container_class' => 'site-header-secondary-nav__inner wp-block-group alignwide',
        'container_id'    => 'secondary-menu',
        'fallback_cb'     => false,
        'theme_location'  => 'secondary',
      ]);
    ?>
    </nav>
  <?php } ?>
</header>
<?php if (get_option('cpt_sites_show_breadcrumbs')) breadcrumbs(); ?>
