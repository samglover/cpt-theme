/**
 * Menu Collapser
 *
 * If the menu overflows the width of the menu container, this function
 * collapses the overflow into a new sub-menu.
 */
const Menu = document.querySelector('#primary-menu > ul.menu')

// Creates the collapsed menu item.
const CollapsedMenu = document.createElement('li');
      CollapsedMenu.classList.add('menu-item', 'menu-item-has-children', 'collapsed-menu');
      CollapsedMenu.insertAdjacentHTML('afterbegin', '<i>&bull;&bull;&bull;</i>');
const CollapsedSubMenu = document.createElement('ul');
      CollapsedSubMenu.classList.add('sub-menu');
CollapsedMenu.appendChild(CollapsedSubMenu);

function primaryMenuCollapser() {
  if ( ! Menu ) { return; }
  if ( ! Menu.contains(CollapsedMenu) && getSpaceAvailable() > getSpaceNeeded() ) { resetMenu(); }
  if ( getSpaceAvailable() <= getSpaceNeeded() ) { collapseMenu(); }

  function getSpaceAvailable() {
    return document.querySelector('#primary-menu').offsetWidth;
  }

  // Calculates the space needed for the menu.
  function getSpaceNeeded() {
    let nextItemWidth = CollapsedSubMenu.querySelector('li:first-of-type > a') ? CollapsedSubMenu.querySelector('li:first-of-type > a').scrollWidth : 0;
    console.log(nextItemWidth);
    return Menu.scrollWidth + nextItemWidth + 1;
  }

  function resetMenu() {
    let primaryMenuItems    = Menu.querySelectorAll('.menu-item:not(.sub-menu .menu-item):not(.collapsed-menu)');
    let collapsedMenuItems  = CollapsedSubMenu.querySelectorAll('.menu-item:not(.sub-menu .sub-menu .menu-item)');
    collapsedMenuItems.forEach( function(e) {
      Menu.appendChild(e);
    });
    if ( Menu.contains(CollapsedMenu) ) {
      Menu.removeChild(CollapsedMenu);
    }
    if ( getSpaceAvailable() <= getSpaceNeeded() ) {
      collapseMenu();
    }
  }

  function collapseMenu() {
    // Checks to see if the submenu already exists in order to prevent multiple
    // menus, since the function runs whenever the window is resized.
    if ( ! Menu.contains(CollapsedMenu) ) {
      Menu.appendChild(CollapsedMenu);
    }
    let primaryMenuItems    = Menu.querySelectorAll('.menu-item:not(.sub-menu .menu-item):not(.collapsed-menu)');
    let collapsedMenuItems  = CollapsedSubMenu.querySelectorAll('.menu-item:not(.sub-menu .sub-menu .menu-item)');
    primaryMenuItems.forEach( function(e) {
      if ( getSpaceAvailable() <= getSpaceNeeded() ) {
        let lastItem = primaryMenuItems.length - 1;
        CollapsedSubMenu.insertBefore(primaryMenuItems.item(lastItem), collapsedMenuItems.item(0));
      } else {
        return;
      }
    });
  }
}

window.onload = primaryMenuCollapser;
window.onresize = primaryMenuCollapser;
