<?php

function collapsed_menu_item($items, $args) {
  if (!get_option('cpt_sites_show_primary_menu') || $args->theme_location != 'primary')return $items;
  ob_start();
    ?>
      <li id="collapsed-menu" class="menu-item menu-item-has-children collapsed-menu">
        <a href="#">|||</a>
        <ul class="sub-menu"></ul>
      </li>
    <?php
  $items .= ob_get_clean();
  return wp_kses_post($items);
}

add_filter('wp_nav_menu_items', 'collapsed_menu_item', 10, 2);
