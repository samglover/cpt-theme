<?php

namespace CPT_Theme\Admin;
use CPT_Theme\Inc;

function cpt_sites_submenu_pages() {

  // TODO: Check to make sure the parent admin page exists.

  add_submenu_page(
    'themes.php',
    __( 'CPT Theme Options', 'cpt-theme' ),
    __( 'CPT Theme Options', 'cpt-theme' ),
    'manage_options',
    'cpt-theme-appearance',
    __NAMESPACE__ . '\site_appearance',
  );

}

add_action( 'admin_menu', __NAMESPACE__ . '\cpt_sites_submenu_pages' );


function site_appearance_init() {

  add_settings_section(
    'header',
    __( 'Header', 'cpt-theme' ),
    __NAMESPACE__ . '\header',
    'cpt-theme-appearance',
  );

  add_settings_field(
    'cpt_sites_show_site_title',
    '<label for="cpt_sites_show_site_title">' . __( 'Site Title', 'cpt-theme' ) . '</label>',
    __NAMESPACE__ . '\cpt_sites_show_site_title',
    'cpt-theme-appearance',
    'header',
  );

  register_setting( 'cpt-theme', 'cpt_sites_show_site_title' );

  add_settings_field(
    'cpt_sites_show_primary_menu',
    '<label for="cpt_sites_show_primary_menu">' . __( 'Primary Menu (in Header)', 'cpt-theme' ) . '</label>',
    __NAMESPACE__ . '\cpt_sites_show_primary_menu',
    'cpt-theme-appearance',
    'header',
  );

  register_setting( 'cpt-theme', 'cpt_sites_show_primary_menu' );

  add_settings_field(
    'cpt_sites_show_primary_menu_cta',
    '<label for="cpt_sites_show_primary_menu_cta">' . __( 'Header CTA', 'cpt-theme' ) . '</label>',
    __NAMESPACE__ . '\cpt_sites_show_primary_menu_cta',
    'cpt-theme-appearance',
    'header',
  );

  register_setting( 'cpt-theme', 'cpt_sites_show_primary_menu_cta' );

  add_settings_field(
    'cpt_sites_primary_menu_cta_text',
    '<label for="cpt_sites_primary_menu_cta_text">' . __( 'Header CTA Text', 'cpt-theme' ) . '</label>',
    __NAMESPACE__ . '\cpt_sites_primary_menu_cta_text',
    'cpt-theme-appearance',
    'header',
  );

  register_setting( 'cpt-theme', 'cpt_sites_primary_menu_cta_text' );

  add_settings_field(
    'cpt_sites_primary_menu_cta_text_color',
    '<label for="cpt_sites_primary_menu_cta_text_color">' . __( 'Header CTA Text Color', 'cpt-theme' ) . '</label>',
    __NAMESPACE__ . '\cpt_sites_primary_menu_cta_text_color',
    'cpt-theme-appearance',
    'header',
  );

  register_setting( 'cpt-theme', 'cpt_sites_primary_menu_cta_text_color' );

  add_settings_field(
    'cpt_sites_primary_menu_cta_button_color',
    '<label for="cpt_sites_primary_menu_cta_button_color">' . __( 'Header CTA Button Color', 'cpt-theme' ) . '</label>',
    __NAMESPACE__ . '\cpt_sites_primary_menu_cta_button_color',
    'cpt-theme-appearance',
    'header',
  );

  register_setting( 'cpt-theme', 'cpt_sites_primary_menu_cta_button_color' );

  add_settings_field(
    'cpt_sites_primary_menu_cta_url',
    '<label for="cpt_sites_primary_menu_cta_url">' . __( 'Header CTA URL', 'cpt-theme' ) . '</label>',
    __NAMESPACE__ . '\cpt_sites_primary_menu_cta_url',
    'cpt-theme-appearance',
    'header',
  );

  register_setting( 'cpt-theme', 'cpt_sites_primary_menu_cta_url' );

  add_settings_field(
    'cpt_sites_show_secondary_menu',
    '<label for="cpt_sites_show_secondary_menu">' . __( 'Secondary Menu (Below Header)', 'cpt-theme' ) . '</label>',
    __NAMESPACE__ . '\cpt_sites_show_secondary_menu',
    'cpt-theme-appearance',
    'header',
  );

  register_setting( 'cpt-theme', 'cpt_sites_show_secondary_menu' );

  add_settings_field(
    'cpt_sites_show_breadcrumbs',
    '<label for="cpt_sites_show_breadcrumbs">' . __( 'Breadcrumbs', 'cpt-theme' ) . '</label>',
    __NAMESPACE__ . '\cpt_sites_show_breadcrumbs',
    'cpt-theme-appearance',
    'header',
  );

  register_setting( 'cpt-theme', 'cpt_sites_show_breadcrumbs' );


  add_settings_section(
    'fonts',
    __( 'Fonts', 'cpt-theme' ),
    __NAMESPACE__ . '\fonts',
    'cpt-theme-appearance',
  );

  add_settings_field(
    'cpt_sites_headings',
    '<label for="cpt_sites_headings">' . __( 'Headings', 'cpt-theme' ) . '</label>',
    __NAMESPACE__ . '\cpt_sites_headings',
    'cpt-theme-appearance',
    'fonts',
  );

  register_setting( 'cpt-theme', 'cpt_sites_headings' );

  add_settings_field(
    'cpt_sites_body',
    '<label for="cpt_sites_body">' . __( 'Body', 'cpt-theme' ) . '</label>',
    __NAMESPACE__ . '\cpt_sites_body',
    'cpt-theme-appearance',
    'fonts',
  );

  register_setting( 'cpt-theme', 'cpt_sites_body' );

  add_settings_field(
    'cpt_sites_link_color',
    '<label for="cpt_sites_link_color">' . __( 'Link Color', 'cpt-theme' ) . '</label>',
    __NAMESPACE__ . '\cpt_sites_link_color',
    'cpt-theme-appearance',
    'fonts',
  );

  register_setting( 'cpt-theme', 'cpt_sites_link_color' );

  add_settings_field(
    'cpt_sites_link_color_hover',
    '<label for="cpt_sites_link_color_hover">' . __( 'Link Hover Color', 'cpt-theme' ) . '</label>',
    __NAMESPACE__ . '\cpt_sites_link_color_hover',
    'cpt-theme-appearance',
    'fonts',
  );

  register_setting( 'cpt-theme', 'cpt_sites_link_color_hover' );


  // TODO: Add layout & style options. Cards (w/ _px spacing value), Shadows (big or small), Corners: Square, Rounded (w/ _px value), or Round.

}

add_action( 'admin_init', __NAMESPACE__ . '\site_appearance_init' );


function site_appearance() {

  if ( ! current_user_can( 'manage_options' ) ) {
    wp_die(
      '<p>' . __( 'Sorry, you are not allowed to access this page.', 'cpt-theme' ) . '</p>',
      403
    );
  }

  ob_start();

    ?>

      <div id="cpt-theme-options" class="wrap">

        <div id="cpt-theme-header">
          <img src="<?php echo CPT_THEME_DIR_URI; ?>/admin/images/cpt-logo.svg" height="auto" width="100%" />
          <div>
            <h1><?php _e( 'Customize Your Site\'s Appearance', 'cpt-theme' ); ?></h1>
            <p><?php _e( 'Client Power Tools Theme', 'cpt-theme' ); ?></p>
          </div>
        </div>
        <hr class="wp-header-end">

        <form method="POST" action="options.php">
          <?php settings_fields( 'cpt-theme' ); ?>
          <?php do_settings_sections( 'cpt-theme-appearance' ); ?>
          <?php submit_button( __( 'Save Settings', 'cpt-theme' ) ); ?>
        </form>

      </div>

    <?php

  echo ob_get_clean();

}

function header() {
}

  function cpt_sites_show_site_title() {

    ob_start();

        ?>

          <fieldset>
            <label for="cpt_sites_show_site_title">
              <input name="cpt_sites_show_site_title" id="cpt_sites_show_site_title" type="checkbox" value="1" <?php checked( get_option( 'cpt_sites_show_site_title' ) ); ?>>
              <?php _e( 'Show the site title in the header.', 'cpt-theme' ); ?>
            </label>
          </fieldset>

        <?php

      echo ob_get_clean();

  }

  function cpt_sites_show_site_tagline() {

    ob_start();

        ?>

          <fieldset>
            <label for="cpt_sites_show_site_tagline">
              <input name="cpt_sites_show_site_tagline" id="cpt_sites_show_site_tagline" type="checkbox" value="1" <?php checked( get_option( 'cpt_sites_show_site_tagline' ) ); ?>>
              <?php _e( 'Show the site tagline in the header.', 'cpt-theme' ); ?>
            </label>
          </fieldset>

        <?php

      echo ob_get_clean();

  }

  function cpt_sites_show_primary_menu() {

    ob_start();

        ?>

          <fieldset>
            <label for="cpt_sites_show_primary_menu">
              <input name="cpt_sites_show_primary_menu" id="cpt_sites_show_primary_menu" type="checkbox" value="1" <?php checked( get_option( 'cpt_sites_show_primary_menu' ) ); ?>>
              <?php _e( 'Enable the primary menu in the header.', 'cpt-theme' ); ?>
            </label>
          </fieldset>

        <?php

      echo ob_get_clean();

  }

  function cpt_sites_show_primary_menu_cta() {

    ob_start();

        ?>

          <fieldset>
            <label for="cpt_sites_show_primary_menu_cta">
              <input name="cpt_sites_show_primary_menu_cta" id="cpt_sites_show_primary_menu_cta" type="checkbox" value="1" <?php checked( get_option( 'cpt_sites_show_primary_menu_cta' ) ); ?>>
              <?php _e( 'Enable the header call-to-action button.', 'cpt-theme' ); ?>
            </label>
          </fieldset>

        <?php

      echo ob_get_clean();

  }

  function cpt_sites_primary_menu_cta_text() {
    echo '<input name="cpt_sites_primary_menu_cta_text" class="regular-text" type="text" value="' . get_option( 'cpt_sites_primary_menu_cta_text' ) . '">';
  }

  function cpt_sites_primary_menu_cta_text_color() {
    echo '<input name="cpt_sites_primary_menu_cta_text_color" class="color-field" type="text" required aria-required="true" value="' . get_option( 'cpt_sites_primary_menu_cta_text_color' ) . '">';
  }

  function cpt_sites_primary_menu_cta_button_color() {
    echo '<input name="cpt_sites_primary_menu_cta_button_color" class="color-field" type="text" required aria-required="true" value="' . get_option( 'cpt_sites_primary_menu_cta_button_color' ) . '">';
  }

  function cpt_sites_primary_menu_cta_url() {
    echo '<input name="cpt_sites_primary_menu_cta_url" class="regular-text" type="url" value="' . get_option( 'cpt_sites_primary_menu_cta_url' ) . '">';
  }

  function cpt_sites_show_secondary_menu() {

    ob_start();

        ?>

          <fieldset>
            <label for="cpt_sites_show_secondary_menu">
              <input name="cpt_sites_show_secondary_menu" id="cpt_sites_show_secondary_menu" type="checkbox" value="1" <?php checked( get_option( 'cpt_sites_show_secondary_menu' ) ); ?>>
              <?php _e( 'Enable the secondary menu below the header.', 'cpt-theme' ); ?>
            </label>
          </fieldset>

        <?php

      echo ob_get_clean();

  }

  function cpt_sites_show_breadcrumbs() {

    ob_start();

        ?>

          <fieldset>
            <label for="cpt_sites_show_breadcrumbs">
              <input name="cpt_sites_show_breadcrumbs" id="cpt_sites_show_breadcrumbs" type="checkbox" value="1" <?php checked( get_option( 'cpt_sites_show_breadcrumbs' ) ); ?>>
              <?php _e( 'Show breadcrumb navigation below the header.', 'cpt-theme' ); ?>
            </label>
          </fieldset>

        <?php

      echo ob_get_clean();

  }


function fonts() {
}

  function font_select( $name ) {

    if ( ! $name ) { return; }

    $fonts = Inc\get_google_fonts_arr();

    ob_start();

      echo '<select name="' . $name . '">';

          foreach( $fonts as $font ) {

            $selected = '';

            if ( $font[ 'name' ] == get_option( $name ) ) {
              $selected = ' selected';
            }

            echo '<option value="' . $font[ 'name' ] . '"' . $selected . '>' . $font[ 'name' ] . '</option>';

          }

      echo '</select>';

    echo ob_get_clean();


  }

  function cpt_sites_headings() {
    font_select( 'cpt_sites_headings' );
  }

  function  cpt_sites_body() {
    font_select( 'cpt_sites_body' );
  }

  function cpt_sites_link_color() {
    echo '<input name="cpt_sites_link_color" class="color-field" type="text" required aria-required="true" value="' . get_option( 'cpt_sites_link_color' ) . '">';
  }

  function cpt_sites_link_color_hover() {
    echo '<input name="cpt_sites_link_color_hover" class="color-field" type="text" required aria-required="true" value="' . get_option( 'cpt_sites_link_color_hover' ) . '">';
  }
