/**
 * Menu Collapser
 *
 * If the menu overflows the width of the menu container, this function
 * collapses the overflow into a new sub-menu.
 */

const Header        = document.querySelector( '#header' );
const LogoWidth     = document.querySelector( '#logo-title' ).scrollWidth;
const Menu          = document.querySelector( '#primary-menu ul.menu' );
const MenuMaxWidth  = Menu ? Menu.scrollWidth : 0;
const CTAWidth      = document.querySelector( '#header-cta' ) ? document.querySelector( '#header-cta' ).scrollWidth : 0;

const CollapsedMenuParent = document.createElement( 'li' );
      CollapsedMenuParent.classList.add( 'menu-item', 'menu-item-has-children', 'collapsed-menu' );
      CollapsedMenuParent.insertAdjacentHTML( 'afterbegin', '<a>&bull;&bull;&bull;</a>' );

const CollapsedMenu       = document.createElement( 'ul' );
      CollapsedMenu.classList.add( 'sub-menu' );

CollapsedMenuParent.appendChild( CollapsedMenu );

function primaryMenuCollapser() {
  let stackedHeader = false;

  if ( getSpaceAvailable() > Menu.offsetWidth ) {
    resetMenu();
  }

  if ( getSpaceAvailable() <= MenuMaxWidth + 1 + 20 + CTAWidth ) { // 1 is a cheap "round-up," and 20 is for the grid gap.
    collapseMenu();
  }

  if ( getSpaceAvailable() < Menu.scrollWidth + CTAWidth ) {
    stackHeader();
  }

  function getSpaceAvailable() {
    let headerStyle   = window.getComputedStyle( Header );
    let headerPadding = parseFloat( headerStyle.paddingLeft ) + parseFloat( headerStyle.paddingRight )
    let headerWidth   = Header.offsetWidth - headerPadding;

    if ( stackedHeader ) {
      return headerWidth - 20;
    } else {
      return headerWidth - LogoWidth - 20;
    }
  }

  function resetMenu() {
    // Removes the #stacked-header body class if the header should no longer be stacked.
    if ( ! stackedHeader ) {
      document.querySelector( 'body' ).classList.remove( 'stacked-header' );
    }

    let primaryMenuItems    = document.querySelectorAll( '#primary-menu ul.menu > li:not( .collapsed-menu )' );
    let collapsedMenuItems  = CollapsedMenu.querySelectorAll( 'li:not( .sub-menu .sub-menu li )' );

    collapsedMenuItems.forEach( function( e ) {
      let menuItem = CollapsedMenu.removeChild( e );

      Menu.appendChild( menuItem );

      collapsedMenuItems = document.querySelectorAll( '#primary-menu .collapsed-menu > .sub-menu > li' );
    });

    if ( Menu.contains( CollapsedMenuParent ) ) {
      Menu.removeChild( CollapsedMenuParent );
    }
  }

  function collapseMenu() {
    // Checks to see if the submenu already exists in order to prevent multiple
    // menus, since the function runs whenever the window is resized.
    if ( ! Menu.contains( CollapsedMenuParent ) ) {
      Menu.appendChild( CollapsedMenuParent );
    }

    let menuContainer       = document.querySelector( '#menu-cta' );
    let primaryMenuItems    = document.querySelectorAll( '#primary-menu ul.menu > li:not( .collapsed-menu )' );
    let numPrimaryMenuItems = primaryMenuItems.length - 1; // Adjusts the counter to node keys, which start at 0.

    while ( getSpaceAvailable() <= getMenuWidth() && numPrimaryMenuItems >= 0 ) {
      let menuItem        = Menu.removeChild( primaryMenuItems.item( numPrimaryMenuItems ) );
      collapsedMenuItems  = document.querySelectorAll( '#primary-menu .collapsed-menu > .sub-menu > li' )

      CollapsedMenu.insertBefore( menuItem, collapsedMenuItems.item( 0 ) );

      numPrimaryMenuItems--;
    }

    function getMenuWidth() {
      return stackedHeader ? Menu.offsetWidth + CTAWidth + 20 : menuContainer.scrollWidth;
    }
  }

  function stackHeader() {
    document.querySelector( 'body' ).classList.add( 'stacked-header' );
    stackedHeader = true;

    resetMenu();
    collapseMenu();
  }

}

primaryMenuCollapser();
window.onresize = primaryMenuCollapser;
