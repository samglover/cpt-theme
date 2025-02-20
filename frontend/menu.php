<?php
/**
 * Adds the collapsed menu item to the primary navigation menu.
 *
 * @file       menu.php
 * @package    CPT_Theme
 * @subpackage Frontend
 * @since      2.3.5
 * @since      3.0.7 Renamed menu.php (was responsive-menu.php).
 */

add_filter( 'wp_nav_menu_items', 'collapsed_menu_item', 10, 2 );
/**
 * Returns the collapsed menu item.
 *
 * @param string $items The HTML list content for the menu items.
 * @param object $args An object containing wp_nav_menu() arguments.
 */
function collapsed_menu_item( $items, $args ) {
	if (
		! get_option( 'cpt_sites_show_primary_menu' )
		|| 'primary' !== $args->theme_location
	) {
		return $items;
	}

	ob_start();

	?>
	<li 
		id="collapsed-menu" 
		class="menu-item menu-item-has-children collapsed-menu" 
		style="display: none;"
	>
		<a href="#">|||</a>
		<ul class="sub-menu"></ul>
	</li>
	<?php

	$items .= ob_get_clean();
	return $items;
}