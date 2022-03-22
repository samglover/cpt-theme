/**
 * Menu Collapser
 *
 * If the menu overflows the width of the menu container, this function
 * collapses the overflow into a new sub-menu.
 */
const Menu = document.querySelector('#primary-menu > ul.menu')

let i = 1;
console.log(i);
i++;

// Creates the collapsed menu item.
const CollapsedMenu = document.createElement('li');
      CollapsedMenu.classList.add('menu-item', 'menu-item-has-children', 'collapsed-menu');
      CollapsedMenu.insertAdjacentHTML('afterbegin', '<i>&bull;&bull;&bull;</i>');
const CollapsedSubMenu = document.createElement('ul');
      CollapsedSubMenu.classList.add('sub-menu');
CollapsedMenu.appendChild(CollapsedSubMenu);

function primaryMenuCollapser() {
  if ( ! Menu ) { return; }
  if ( getSpaceAvailable() > getSpaceNeeded() ) { resetMenu(); }
  if ( getSpaceAvailable() <= getSpaceNeeded() ) { collapseMenu(); }
}

function getSpaceAvailable() {
  return document.querySelector('#primary-menu').offsetWidth;
}

function getSpaceNeeded() {
  let nextItemWidth = CollapsedSubMenu.querySelector('li:first-of-type > a') ? CollapsedSubMenu.querySelector('li:first-of-type > a').scrollWidth : 0;
  return Menu.scrollWidth + nextItemWidth + 1;
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
  if ( ! Menu.contains(CollapsedMenu) ) {
    Menu.appendChild(CollapsedMenu);
  }

  let primaryMenuItems    = Menu.querySelectorAll('.menu-item:not(.sub-menu .menu-item):not(.collapsed-menu)');
  let collapsedMenuItems  = CollapsedSubMenu.querySelectorAll('.menu-item:not(.sub-menu .sub-menu .menu-item)');

  primaryMenuItems.forEach( function() {
    if ( getSpaceAvailable() <= getSpaceNeeded() ) {
      let lastItem = primaryMenuItems.length - 1;
      CollapsedSubMenu.insertBefore(primaryMenuItems.item(lastItem), collapsedMenuItems.item(0));
    }
  });
}

primaryMenuCollapser();
// window.onresize = primaryMenuCollapser;
