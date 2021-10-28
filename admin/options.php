<?php

namespace CPT_Sites\Admin;
use CPT_Sites\Inc;

function cpt_sites_submenu_pages() {

  // TODO: Check to make sure the parent admin page exists.

  add_submenu_page(
    'themes.php',
    __( 'Theme Options', 'cpt-sites' ),
    __( 'Theme Options', 'cpt-sites' ),
    'manage_options',
    'cpt-sites-appearance',
    __NAMESPACE__ . '\site_appearance',
  );

}

add_action( 'admin_menu', __NAMESPACE__ . '\cpt_sites_submenu_pages' );


function site_appearance_init() {

  add_settings_section(
    'header',
    __( 'Header', 'cpt-sites' ),
    __NAMESPACE__ . '\header',
    'cpt-sites-appearance',
  );

  add_settings_field(
    'cpt_sites_show_site_title',
    '<label for="cpt_sites_show_site_title">' . __( 'Site Title', 'cpt-sites' ) . '</label>',
    __NAMESPACE__ . '\cpt_sites_show_site_title',
    'cpt-sites-appearance',
    'header',
  );

  register_setting( 'cpt-sites', 'cpt_sites_show_site_title' );

  add_settings_field(
    'cpt_sites_show_primary_menu',
    '<label for="cpt_sites_show_primary_menu">' . __( 'Primary Menu (In Header)', 'cpt-sites' ) . '</label>',
    __NAMESPACE__ . '\cpt_sites_show_primary_menu',
    'cpt-sites-appearance',
    'header',
  );

  register_setting( 'cpt-sites', 'cpt_sites_show_primary_menu' );

  add_settings_field(
    'cpt_sites_show_primary_menu_cta',
    '<label for="cpt_sites_show_primary_menu_cta">' . __( 'Header CTA', 'cpt-sites' ) . '</label>',
    __NAMESPACE__ . '\cpt_sites_show_primary_menu_cta',
    'cpt-sites-appearance',
    'header',
  );

  register_setting( 'cpt-sites', 'cpt_sites_show_primary_menu_cta' );

  add_settings_field(
    'cpt_sites_show_primary_menu_cta_text',
    '<label for="cpt_sites_show_primary_menu_cta_text">' . __( 'Header CTA Text', 'cpt-sites' ) . '</label>',
    __NAMESPACE__ . '\cpt_sites_show_primary_menu_cta_text',
    'cpt-sites-appearance',
    'header',
  );

  register_setting( 'cpt-sites', 'cpt_sites_show_primary_menu_cta_text' );

  add_settings_field(
    'cpt_sites_show_primary_menu_cta_text_color',
    '<label for="cpt_sites_show_primary_menu_cta_text_color">' . __( 'Header CTA Text Color', 'cpt-sites' ) . '</label>',
    __NAMESPACE__ . '\cpt_sites_show_primary_menu_cta_text_color',
    'cpt-sites-appearance',
    'header',
  );

  register_setting( 'cpt-sites', 'cpt_sites_show_primary_menu_cta_text_color' );

  add_settings_field(
    'cpt_sites_show_primary_menu_cta_button_color',
    '<label for="cpt_sites_show_primary_menu_cta_button_color">' . __( 'Header CTA Button Color', 'cpt-sites' ) . '</label>',
    __NAMESPACE__ . '\cpt_sites_show_primary_menu_cta_button_color',
    'cpt-sites-appearance',
    'header',
  );

  register_setting( 'cpt-sites', 'cpt_sites_show_primary_menu_cta_button_color' );

  add_settings_field(
    'cpt_sites_show_primary_menu_cta_url',
    '<label for="cpt_sites_show_primary_menu_cta_url">' . __( 'Header CTA URL', 'cpt-sites' ) . '</label>',
    __NAMESPACE__ . '\cpt_sites_show_primary_menu_cta_url',
    'cpt-sites-appearance',
    'header',
  );

  register_setting( 'cpt-sites', 'cpt_sites_show_primary_menu_cta_url' );

  add_settings_field(
    'cpt_sites_show_secondary_menu',
    '<label for="cpt_sites_show_secondary_menu">' . __( 'Secondary Menu (Below Header)', 'cpt-sites' ) . '</label>',
    __NAMESPACE__ . '\cpt_sites_show_secondary_menu',
    'cpt-sites-appearance',
    'header',
  );

  register_setting( 'cpt-sites', 'cpt_sites_show_secondary_menu' );


  add_settings_section(
    'fonts',
    __( 'Fonts', 'cpt-sites' ),
    __NAMESPACE__ . '\fonts',
    'cpt-sites-appearance',
  );

  add_settings_field(
    'cpt_sites_headings',
    '<label for="cpt_sites_headings">' . __( 'Headings', 'cpt-sites' ) . '</label>',
    __NAMESPACE__ . '\cpt_sites_headings',
    'cpt-sites-appearance',
    'fonts',
  );

  register_setting( 'cpt-sites', 'cpt_sites_headings' );

  add_settings_field(
    'cpt_sites_body',
    '<label for="cpt_sites_body">' . __( 'Body', 'cpt-sites' ) . '</label>',
    __NAMESPACE__ . '\cpt_sites_body',
    'cpt-sites-appearance',
    'fonts',
  );

  register_setting( 'cpt-sites', 'cpt_sites_body' );


  add_settings_section(
    'colors',
    __( 'Colors', 'cpt-sites' ),
    __NAMESPACE__ . '\colors',
    'cpt-sites-appearance',
  );

  add_settings_field(
    'cpt_sites_heading_color',
    '<label for="cpt_sites_heading_color">' . __( 'Heading Color', 'cpt-sites' ) . '</label>',
    __NAMESPACE__ . '\cpt_sites_heading_color',
    'cpt-sites-appearance',
    'colors',
  );

  register_setting( 'cpt-sites', 'cpt_sites_heading_color' );

  add_settings_field(
    'cpt_sites_menu_text_color',
    '<label for="cpt_sites_menu_text_color">' . __( 'Menu Text Color', 'cpt-sites' ) . '</label>',
    __NAMESPACE__ . '\cpt_sites_menu_text_color',
    'cpt-sites-appearance',
    'colors',
  );

  register_setting( 'cpt-sites', 'cpt_sites_menu_text_color' );

  add_settings_field(
    'cpt_sites_menu_border_color',
    '<label for="cpt_sites_menu_border_color">' . __( 'Menu Border Color', 'cpt-sites' ) . '</label>',
    __NAMESPACE__ . '\cpt_sites_menu_border_color',
    'cpt-sites-appearance',
    'colors',
  );

  register_setting( 'cpt-sites', 'cpt_sites_menu_border_color' );

  add_settings_field(
    'cpt_sites_text_color',
    '<label for="cpt_sites_text_color">' . __( 'Text Color', 'cpt-sites' ) . '</label>',
    __NAMESPACE__ . '\cpt_sites_text_color',
    'cpt-sites-appearance',
    'colors',
  );

  register_setting( 'cpt-sites', 'cpt_sites_text_color' );

  add_settings_field(
    'cpt_sites_text_color_light',
    '<label for="cpt_sites_text_color_light">' . __( 'Text Color (Light)', 'cpt-sites' ) . '</label>',
    __NAMESPACE__ . '\cpt_sites_text_color_light',
    'cpt-sites-appearance',
    'colors',
  );

  register_setting( 'cpt-sites', 'cpt_sites_text_color_light' );

  add_settings_field(
    'cpt_sites_link_color',
    '<label for="cpt_sites_link_color">' . __( 'Link Color', 'cpt-sites' ) . '</label>',
    __NAMESPACE__ . '\cpt_sites_link_color',
    'cpt-sites-appearance',
    'colors',
  );

  register_setting( 'cpt-sites', 'cpt_sites_link_color' );

  add_settings_field(
    'cpt_sites_link_color_hover',
    '<label for="cpt_sites_link_color_hover">' . __( 'Link Color (Hover)', 'cpt-sites' ) . '</label>',
    __NAMESPACE__ . '\cpt_sites_link_color_hover',
    'cpt-sites-appearance',
    'colors',
  );

  register_setting( 'cpt-sites', 'cpt_sites_link_color_hover' );


  // TODO: Add layout & style options. Cards (w/ _px spacing value), Shadows (big or small), Corners: Square, Rounded (w/ _px value), or Round.

}

add_action( 'admin_init', __NAMESPACE__ . '\site_appearance_init' );


function site_appearance() {

  if ( ! current_user_can( 'manage_options' ) ) {
    wp_die(
      '<p>' . __( 'Sorry, you are not allowed to access this page.', 'cpt-sites' ) . '</p>',
      403
    );
  }

  ob_start();

    ?>

      <div class="wrap">

        <h1><?php _e( 'Customize Your Site\'s Appearance', 'cpt-sites' ); ?></h1>

        <form method="POST" action="options.php">
          <?php settings_fields( 'cpt-sites' ); ?>
          <?php do_settings_sections( 'cpt-sites-appearance' ); ?>
          <?php submit_button( __( 'Save Settings', 'cpt-sites' ) ); ?>
        </form>

      </div>

    <?php

  echo ob_get_clean();

}

function header() {

  echo '<p>' . __( 'You can also modify these options using the customizer.', 'cpt-sites' ) . '</p>';

}

  function cpt_sites_show_site_title() {

    ob_start();

        ?>

          <fieldset>
            <label for="cpt_sites_show_site_title">
              <input name="cpt_sites_show_site_title" id="cpt_sites_show_site_title" type="checkbox" value="1" <?php checked( get_option( 'cpt_sites_show_site_title' ) ); ?>>
              <?php _e( 'Show the site title in the header.', 'cpt-sites' ); ?>
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
              <?php _e( 'Show the site tagline in the header.', 'cpt-sites' ); ?>
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
              <?php _e( 'Enable the primary menu in the header.', 'cpt-sites' ); ?>
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
              <?php _e( 'Enable the header call-to-action button.', 'cpt-sites' ); ?>
            </label>
          </fieldset>

        <?php

      echo ob_get_clean();

  }

  function cpt_sites_show_primary_menu_cta_text() {
    echo '<input name="cpt_sites_show_primary_menu_cta_text" class="regular-text" type="text" value="' . get_option( 'cpt_sites_show_primary_menu_cta_text' ) . '">';
  }

  function cpt_sites_show_primary_menu_cta_text_color() {
    echo '<input name="cpt_sites_show_primary_menu_cta_text_color" class="color-field" type="text" required aria-required="true" value="' . get_option( 'cpt_sites_show_primary_menu_cta_text_color' ) . '">';
  }

  function cpt_sites_show_primary_menu_cta_button_color() {
    echo '<input name="cpt_sites_show_primary_menu_cta_button_color" class="color-field" type="text" required aria-required="true" value="' . get_option( 'cpt_sites_show_primary_menu_cta_button_color' ) . '">';
  }

  function cpt_sites_show_primary_menu_cta_url() {
    echo '<input name="cpt_sites_show_primary_menu_cta_url" class="regular-text" type="url" value="' . get_option( 'cpt_sites_show_primary_menu_cta_url' ) . '">';
  }

  function cpt_sites_show_secondary_menu() {

    ob_start();

        ?>

          <fieldset>
            <label for="cpt_sites_show_secondary_menu">
              <input name="cpt_sites_show_secondary_menu" id="cpt_sites_show_secondary_menu" type="checkbox" value="1" <?php checked( get_option( 'cpt_sites_show_secondary_menu' ) ); ?>>
              <?php _e( 'Enable the secondary menu below the header.', 'cpt-sites' ); ?>
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

function colors() {
  echo '<p>' . __( 'Enter hex values.', 'cpt-sites' ) . '</p>';
}

  function cpt_sites_heading_color() {
    echo '<input name="cpt_sites_heading_color" class="color-field" type="text" required aria-required="true" value="' . get_option( 'cpt_sites_heading_color' ) . '">';
  }

  function cpt_sites_menu_text_color() {
    echo '<input name="cpt_sites_menu_text_color" class="color-field" type="text" required aria-required="true" value="' . get_option( 'cpt_sites_menu_text_color' ) . '">';
  }

  function cpt_sites_menu_border_color() {
    echo '<input name="cpt_sites_menu_border_color" class="color-field" type="text" required aria-required="true" value="' . get_option( 'cpt_sites_menu_border_color' ) . '">';
  }

  function cpt_sites_text_color() {
    echo '<input name="cpt_sites_text_color" class="color-field" type="text" required aria-required="true" value="' . get_option( 'cpt_sites_text_color' ) . '">';
  }

  function cpt_sites_text_color_light() {
    echo '<input name="cpt_sites_text_color_light" class="color-field" type="text" required aria-required="true" value="' . get_option( 'cpt_sites_text_color_light' ) . '">';
  }

  function cpt_sites_link_color() {
    echo '<input name="cpt_sites_link_color" class="color-field" type="text" required aria-required="true" value="' . get_option( 'cpt_sites_link_color' ) . '">';
  }

  function cpt_sites_link_color_hover() {
    echo '<input name="cpt_sites_link_color_hover" class="color-field" type="text" required aria-required="true" value="' . get_option( 'cpt_sites_link_color_hover' ) . '">';
  }
