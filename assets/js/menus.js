/**
 * Menu Collapser
 *
 * If the menu overflows the width of the menu container, this function
 * collapses the overflow into a new sub-menu.
 */
const MenuContainer = document.querySelector('#primary-menu');
const Menu = document.querySelector('#primary-menu > ul.menu');

// Creates the collapsed menu item.
const CollapsedMenu = document.createElement('li');
      CollapsedMenu.classList.add('menu-item', 'menu-item-has-children', 'collapsed-menu');
      CollapsedMenu.insertAdjacentHTML('afterbegin', '<i>&bull;&bull;&bull;</i>');
const CollapsedSubMenu = document.createElement('ul');
      CollapsedSubMenu.classList.add('sub-menu');
CollapsedMenu.appendChild(CollapsedSubMenu);

function primaryMenuCollapser() {
  if ( !Menu ) { return; }
  if ( MenuContainer.offsetWidth > Menu.scrollWidth + nextItemWidth() ) { resetMenu(); }
  if ( MenuContainer.offsetWidth <= Menu.scrollWidth ) { collapseMenu(); }
}

function nextItemWidth() {
  let nextItem = CollapsedMenu.querySelector('li:first-of-type > a');
  let gap = CollapsedMenu.querySelector('li:first-of-type > a') == CollapsedMenu.querySelector('li:last-of-type > a') ? 0 : 20;
  return nextItem ? nextItem.scrollWidth + gap : 0;
}

function resetMenu() {
  let primaryMenuItems    = Menu.querySelectorAll('.menu-item:not(.sub-menu .menu-item):not(.collapsed-menu)');
  let collapsedMenuItems  = CollapsedSubMenu.querySelectorAll('.menu-item:not(.sub-menu .sub-menu .menu-item)');

  collapsedMenuItems.forEach( function(element) {
    Menu.appendChild(element);
  });

  if ( Menu.contains(CollapsedMenu) ) {
    Menu.removeChild(CollapsedMenu);
  }
}

function collapseMenu() {
  // Checks to see if the submenu already exists in order to prevent multiple
  // menus, since the function runs whenever the window is resized.
  if ( !Menu.contains(CollapsedMenu) ) {
    Menu.appendChild(CollapsedMenu);
  }

  let primaryMenuItems    = Menu.querySelectorAll('.menu-item:not(.sub-menu .menu-item):not(.collapsed-menu)');

  for (let i = primaryMenuItems.length - 1; i >= 0; i--) {
    if ( MenuContainer.offsetWidth <= Menu.scrollWidth ) {
      let collapsedMenuItems  = CollapsedSubMenu.querySelectorAll('.menu-item:not(.sub-menu .sub-menu .menu-item)');
      CollapsedSubMenu.insertBefore(primaryMenuItems.item(i), collapsedMenuItems.item(0));
    }
  }
}

// Loads the collapse function immediately, then again on page load in case the
// dimensions have changed (due to fonts, for example). Then loads it again if
// the window is resized.
primaryMenuCollapser();
window.onload = primaryMenuCollapser;
window.onresize = primaryMenuCollapser;
