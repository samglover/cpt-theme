<?php

add_action('admin_menu', 'cpt_sites_submenu_pages');
function cpt_sites_submenu_pages() {
  // TODO: Check to make sure the parent admin page exists.

  add_theme_page(
    // 'themes.php',
    esc_html__('CPT Theme Options', 'cpt-theme'),
    esc_html__('CPT Theme Options', 'cpt-theme'),
    'manage_options',
    'cpt-theme-appearance',
    'site_appearance'
  );
}


add_action('admin_init', 'site_appearance_init');
function site_appearance_init() {
  add_settings_section(
    'cpt-sites-header',
    esc_html__('Header', 'cpt-theme'),
    'cpt_sites_header',
    'cpt-theme-appearance'
  );

  // Header
  register_setting('cpt-theme', 'cpt_sites_sticky_header');
  add_settings_field(
    'cpt_sites_sticky_header',
    '<label for="cpt_sites_sticky_header">' . esc_html__('Sticky Header', 'cpt-theme') . '</label>',
    'cpt_sites_sticky_header',
    'cpt-theme-appearance',
    'cpt-sites-header'
  );

  register_setting('cpt-theme', 'cpt_sites_show_preheader');
  add_settings_field(
    'cpt_sites_show_preheader',
    '<label for="cpt_sites_show_preheader">' . esc_html__('Preheader', 'cpt-theme') . '</label>',
    'cpt_sites_show_preheader',
    'cpt-theme-appearance',
    'cpt-sites-header'
  );

  register_setting('cpt-theme', 'cpt_sites_show_site_title');
  add_settings_field(
    'cpt_sites_show_site_title',
    '<label for="cpt_sites_show_site_title">' . esc_html__('Site Title', 'cpt-theme') . '</label>',
    'cpt_sites_show_site_title',
    'cpt-theme-appearance',
    'cpt-sites-header'
  );

  register_setting('cpt-theme', 'cpt_sites_show_primary_menu');
  add_settings_field(
    'cpt_sites_show_primary_menu',
    '<label for="cpt_sites_show_primary_menu">' . esc_html__('Primary Menu (in Header)', 'cpt-theme') . '</label>',
    'cpt_sites_show_primary_menu',
    'cpt-theme-appearance',
    'cpt-sites-header'
  );

  register_setting('cpt-theme', 'cpt_sites_show_primary_menu_cta');
  add_settings_field(
    'cpt_sites_show_primary_menu_cta',
    '<label for="cpt_sites_show_primary_menu_cta">' . esc_html__('Header CTA', 'cpt-theme') . '</label>',
    'cpt_sites_show_primary_menu_cta',
    'cpt-theme-appearance',
    'cpt-sites-header'
  );

  register_setting('cpt-theme', 'cpt_sites_primary_menu_cta_text');
  add_settings_field(
    'cpt_sites_primary_menu_cta_text',
    '<label for="cpt_sites_primary_menu_cta_text">' . esc_html__('Header CTA Text', 'cpt-theme') . '</label>',
    'cpt_sites_primary_menu_cta_text',
    'cpt-theme-appearance',
    'cpt-sites-header'
  );

  register_setting('cpt-theme', 'cpt_sites_primary_menu_cta_text_color');
  add_settings_field(
    'cpt_sites_primary_menu_cta_text_color',
    '<label for="cpt_sites_primary_menu_cta_text_color">' . esc_html__('Header CTA Text Color', 'cpt-theme') . '</label>',
    'cpt_sites_primary_menu_cta_text_color',
    'cpt-theme-appearance',
    'cpt-sites-header'
  );

  register_setting('cpt-theme', 'cpt_sites_primary_menu_cta_button_color');
  add_settings_field(
    'cpt_sites_primary_menu_cta_button_color',
    '<label for="cpt_sites_primary_menu_cta_button_color">' . esc_html__('Header CTA Button Color', 'cpt-theme') . '</label>',
    'cpt_sites_primary_menu_cta_button_color',
    'cpt-theme-appearance',
    'cpt-sites-header'
  );

  register_setting('cpt-theme', 'cpt_sites_primary_menu_cta_url');
  add_settings_field(
    'cpt_sites_primary_menu_cta_url',
    '<label for="cpt_sites_primary_menu_cta_url">' . esc_html__('Header CTA URL', 'cpt-theme') . '</label>',
    'cpt_sites_primary_menu_cta_url',
    'cpt-theme-appearance',
    'cpt-sites-header'
  );

  register_setting('cpt-theme', 'cpt_sites_primary_menu_cta_style');
  add_settings_field(
    'cpt_sites_primary_menu_cta_style',
    '<label for="cpt_sites_primary_menu_cta_style">' . esc_html__('Header CTA Style', 'cpt-theme') . '</label>',
    'cpt_sites_primary_menu_cta_style',
    'cpt-theme-appearance',
    'cpt-sites-header'
  );

  register_setting('cpt-theme', 'cpt_sites_primary_menu_cta_code');
  add_settings_field(
    'cpt_sites_primary_menu_cta_code',
    '<label for="cpt_sites_primary_menu_cta_code">' . esc_html__('Header CTA Code', 'cpt-theme') . '</label>',
    'cpt_sites_primary_menu_cta_code',
    'cpt-theme-appearance',
    'cpt-sites-header'
  );

  register_setting('cpt-theme', 'cpt_sites_show_secondary_menu');
  add_settings_field(
    'cpt_sites_show_secondary_menu',
    '<label for="cpt_sites_show_secondary_menu">' . esc_html__('Secondary Menu (Below Header)', 'cpt-theme') . '</label>',
    'cpt_sites_show_secondary_menu',
    'cpt-theme-appearance',
    'cpt-sites-header'
  );

  register_setting('cpt-theme', 'cpt_sites_show_breadcrumbs');
  add_settings_field(
    'cpt_sites_show_breadcrumbs',
    '<label for="cpt_sites_show_breadcrumbs">' . esc_html__('Breadcrumbs', 'cpt-theme') . '</label>',
    'cpt_sites_show_breadcrumbs',
    'cpt-theme-appearance',
    'cpt-sites-header'
  );
}


function site_appearance() {
  if (!current_user_can('manage_options')) {
    wp_die(
      '<p>' . esc_html__('Sorry, you are not allowed to access this page.', 'cpt-theme') . '</p>',
      403
    );
  }

  ?>
    <div id="cpt-theme-options" class="wrap">
      <div id="cpt-theme-header">
        <?php echo file_get_contents(CPT_THEME_DIR_PATH . 'assets/images/cpt-logo.svg'); ?>
        <div id="cpt-admin-page-title">
          <h1 id="cpt-page-title"><?php esc_html_e('Customize Your Site\'s Appearance', 'cpt-theme'); ?></h1>
          <p id="cpt-subtitle"><?php esc_html_e('Client Power Tools Theme', 'cpt-theme'); ?></p>
        </div>
      </div>
      <hr class="wp-header-end">
      <form method="POST" action="options.php">
        <?php settings_fields('cpt-theme'); ?>
        <?php do_settings_sections('cpt-theme-appearance'); ?>
        <?php submit_button( esc_html__('Save Settings', 'cpt-theme') ); ?>
      </form>
    </div>
  <?php
}


function cpt_sites_header() {
}

  function cpt_sites_sticky_header() {
    ?>
      <fieldset>
        <label for="cpt_sites_sticky_header">
          <input name="cpt_sites_sticky_header" id="cpt_sites_sticky_header" type="checkbox" value="1" <?php checked(get_option('cpt_sites_sticky_header')); ?>>
          <?php esc_html_e('Make the header "sticky" so it scrolls with the page. (Desktop only.)', 'cpt-theme'); ?>
        </label>
      </fieldset>
    <?php
  }

  function cpt_sites_show_preheader() {
    ?>
      <fieldset>
        <label for="cpt_sites_show_preheader">
          <input name="cpt_sites_show_preheader" id="cpt_sites_show_preheader" type="checkbox" value="1" <?php checked(get_option('cpt_sites_show_preheader')); ?>>
          <?php esc_html_e('Show the preheader widget area.', 'cpt-theme'); ?>
        </label>
      </fieldset>
    <?php
  }

  function cpt_sites_show_site_title() {
    ?>
      <fieldset>
        <label for="cpt_sites_show_site_title">
          <input name="cpt_sites_show_site_title" id="cpt_sites_show_site_title" type="checkbox" value="1" <?php checked(get_option('cpt_sites_show_site_title')); ?>>
          <?php esc_html_e('Show the site title in the header.', 'cpt-theme'); ?>
        </label>
      </fieldset>
    <?php
  }

  function cpt_sites_show_primary_menu() {
    ?>
      <fieldset>
        <label for="cpt_sites_show_primary_menu">
          <input name="cpt_sites_show_primary_menu" id="cpt_sites_show_primary_menu" type="checkbox" value="1" <?php checked(get_option('cpt_sites_show_primary_menu')); ?>>
          <?php esc_html_e('Enable the primary menu in the header.', 'cpt-theme'); ?>
        </label>
      </fieldset>
    <?php
  }

  function cpt_sites_show_primary_menu_cta() {
    ?>
      <fieldset>
        <label for="cpt_sites_show_primary_menu_cta">
          <input name="cpt_sites_show_primary_menu_cta" id="cpt_sites_show_primary_menu_cta" type="checkbox" value="1" <?php checked(get_option('cpt_sites_show_primary_menu_cta')); ?>>
          <?php esc_html_e('Enable the header call-to-action button.', 'cpt-theme'); ?>
        </label>
      </fieldset>
    <?php
  }

  function cpt_sites_primary_menu_cta_text() {
    echo '<input name="cpt_sites_primary_menu_cta_text" class="regular-text" type="text" value="' . esc_attr(get_option('cpt_sites_primary_menu_cta_text')) . '">';
  }

  function cpt_sites_primary_menu_cta_text_color() {
    echo '<input name="cpt_sites_primary_menu_cta_text_color" class="color-field" type="text" required aria-required="true" value="' . esc_attr(get_option('cpt_sites_primary_menu_cta_text_color')) . '">';
  }

  function cpt_sites_primary_menu_cta_button_color() {
    echo '<input name="cpt_sites_primary_menu_cta_button_color" class="color-field" type="text" required aria-required="true" value="' . esc_attr(get_option('cpt_sites_primary_menu_cta_button_color')) . '">';
  }

  function cpt_sites_primary_menu_cta_url() {
    echo '<input name="cpt_sites_primary_menu_cta_url" class="regular-text" type="url" value="' . esc_attr(get_option('cpt_sites_primary_menu_cta_url')) . '">';
    echo '<p class="description">' . esc_html__('Even if you select the Modal option below, it is a good idea to have a backup URL.', 'cpt-theme') . '</p>';
  }

  function cpt_sites_primary_menu_cta_style() {
    $style = get_option('cpt_sites_primary_menu_cta_style');

    ?>
      <select name="cpt_sites_primary_menu_cta_style">
        <option value="link" <?php selected($style, 'link'); ?>>Link</option>
        <option value="modal" <?php selected($style, 'modal'); ?>>Modal</option>
      </select>
    <?php

    echo '<p class="description">' . esc_html__('Link: Clicking the button will take the visitor to the URL above. ', 'cpt-theme') . '<br />' . esc_html__('Modal: Clicking the button will show a modal (pop-up) that displays the shortcode or embed code below.', 'cpt-theme') . '</p>';
  }

  function cpt_sites_primary_menu_cta_code() {
    echo '<textarea name="cpt_sites_primary_menu_cta_code" class="regular-text" rows="5">' . esc_html(get_option('cpt_sites_primary_menu_cta_code')) . '</textarea>';
    echo '<p class="description">' . esc_html__('Paste a shortcode or embed code here. HTML is allowed.', 'cpt-theme') . '</p>';
  }

  function cpt_sites_show_secondary_menu() {
    ?>
      <fieldset>
        <label for="cpt_sites_show_secondary_menu">
          <input name="cpt_sites_show_secondary_menu" id="cpt_sites_show_secondary_menu" type="checkbox" value="1" <?php checked(get_option('cpt_sites_show_secondary_menu')); ?>>
          <?php esc_html_e('Enable the secondary menu below the header.', 'cpt-theme'); ?>
        </label>
      </fieldset>
    <?php
  }

  function cpt_sites_show_breadcrumbs() {
    ?>
      <fieldset>
        <label for="cpt_sites_show_breadcrumbs">
          <input name="cpt_sites_show_breadcrumbs" id="cpt_sites_show_breadcrumbs" type="checkbox" value="1" <?php checked(get_option('cpt_sites_show_breadcrumbs')); ?>>
          <?php esc_html_e('Show breadcrumb navigation below the header.', 'cpt-theme'); ?>
        </label>
      </fieldset>
    <?php
  }
