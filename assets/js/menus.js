/**
 * Menu Collapser
 *
 * If the menu overflows the width of the menu container, this function
 * collapses the overflow into a new sub-menu.
 */
const Padding = 20;
const Menu    = document.querySelector('#primary-menu > ul.menu');

const CollapsedMenu = document.createElement( 'li' );
      CollapsedMenu.classList.add( 'menu-item', 'menu-item-has-children', 'collapsed-menu' );
      CollapsedMenu.insertAdjacentHTML( 'afterbegin', '<i>&bull;&bull;&bull;</i>' );

const CollapsedSubMenu = document.createElement( 'ul' );
      CollapsedSubMenu.classList.add( 'sub-menu' );

CollapsedMenu.appendChild( CollapsedSubMenu );

function primaryMenuCollapser() {
  if ( ! Menu ) { return; }
  let stackedHeader = false;

  if ( getSpaceAvailable() > getSpaceNeeded() ) {
    resetMenu();
  }

  if ( getSpaceAvailable() <= getSpaceNeeded() ) {
    collapseMenu();
  }

  function getSpaceAvailable() {
    return document.querySelector('#primary-menu').offsetWidth;
  }

  // Calculates the space needed for the menu.
  // The + 1 is a cheap "round-up" in case of fractional pixels.
  function getSpaceNeeded() {
    if ( CollapsedSubMenu.length > 0 ) {
      let collapsedMenuWidth = document.querySelector('.collapsed-menu > i').scrollWidth;
      let nextItem      = CollapsedSubMenu.children[0].children[0];     // Gets the <a> element inside the <li> element.
      let nextItemWidth = nextItem ? (nextItem.scrollWidth * 1.25) : 0; // Multiplied by 1.25 to account for the different font sizes.

      if ( nextItem && nextItem.length == 1 ) {
        return Menu.scrollWidth - collapsedMenuWidth + nextItemWidth + 1;
      } else {
        return Menu.scrollWidth + nextItemWidth + 1;
      }
    } else {
      return Menu.scrollWidth;
    }
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
primaryMenuCollapser();
window.onresize = primaryMenuCollapser;
