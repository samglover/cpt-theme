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
    'cpt_sites_show_site_tagline',
    '<label for="cpt_sites_show_site_tagline">' . __( 'Site Tagline', 'cpt-sites' ) . '</label>',
    __NAMESPACE__ . '\cpt_sites_show_site_tagline',
    'cpt-sites-appearance',
    'header',
  );

  register_setting( 'cpt-sites', 'cpt_sites_show_site_tagline' );

  add_settings_field(
    'cpt_sites_show_primary_menu',
    '<label for="cpt_sites_show_primary_menu">' . __( 'Primary Menu (In Header)', 'cpt-sites' ) . '</label>',
    __NAMESPACE__ . '\cpt_sites_show_primary_menu',
    'cpt-sites-appearance',
    'header',
  );

  register_setting( 'cpt-sites', 'cpt_sites_show_primary_menu' );

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
