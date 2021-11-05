/** Menu Collapser
 *
 * If the menu overflows the width of the menu container, this function
 * collapses the overflow into a new sub-menu.
 */
function primaryMenuCollapser() {

  let primaryMenuContainer      = document.querySelector( '#primary-menu' );
  let primaryMenuContainerWidth = primaryMenuContainer.offsetWidth;
  let primaryMenu               = document.querySelector( '#primary-menu ul.menu' );
  let primaryMenuWidth          = primaryMenu.offsetWidth;
  let collapsedMenuParent       = document.querySelector( '#primary-menu .collapsed-menu' );
  let collapsedMenu             = document.querySelector( '#primary-menu .collapsed-menu > .sub-menu' );
  let stackedHeader             = false;

  // Reconstructs the menu if the menu container is larger than the menu.
  if ( primaryMenuContainerWidth > primaryMenuWidth && collapsedMenuParent ) {
    reconstructPrimaryMenu();
  }

  // Resets widths.
  primaryMenuContainerWidth = primaryMenuContainer.offsetWidth;
  primaryMenuWidth          = primaryMenu.offsetWidth;

  // Collapses the menu if the menu container is the same width as (or smaller
  // than) the menu.
  if ( primaryMenuContainerWidth <= primaryMenuWidth ) {
    collapsePrimaryMenu();
  }

  let headerWidth = document.querySelector( '#header' ).scrollWidth;

  if ( headerWidth > window.outerWidth ) {

    let primaryMenuItems = document.querySelectorAll( '#primary-menu ul.menu > li:not( .collapsed-menu )' );

    if ( primaryMenuItems.length == 0 ) {

      document.querySelector( 'body' ).classList.add( 'stacked-header' );

      stackedHeader = true;

      reconstructPrimaryMenu()
      collapsePrimaryMenu();

    }

  }

  function reconstructPrimaryMenu() {

    if ( ! stackedHeader ) {
      document.querySelector( 'body' ).classList.remove( 'stacked-header' );
    }

    let primaryMenuItems      = document.querySelectorAll( '#primary-menu ul.menu > li:not( .collapsed-menu )' );
    let collapsedMenuItems    = document.querySelectorAll( '#primary-menu .collapsed-menu > .sub-menu > li' );

    collapsedMenuItems.forEach( function( e ) {

      let menuItem = collapsedMenu.removeChild( e );

      primaryMenu.appendChild( menuItem );

      collapsedMenuItems = document.querySelectorAll( '#primary-menu .collapsed-menu > .sub-menu > li' );

    });

    primaryMenu.removeChild( collapsedMenuParent );

  }

  function collapsePrimaryMenu() {

    collapsedMenuParent = document.querySelector( '#primary-menu .collapsed-menu' );

    // First, checks to see if the submenu already exists in order to prevent
    // multiple menus, since the function runs whenever the window is resized.
    if ( ! collapsedMenuParent ) {

      // Creates the .collapsed-menu menu item.
      let container = document.createElement( 'li' );

      container.classList.add( 'menu-item', 'menu-item-has-children', 'collapsed-menu' );
      container.insertAdjacentHTML( 'afterbegin', '<a>&bull;&bull;&bull;</a>' );
      primaryMenu.appendChild( container );

      collapsedMenuParent = document.querySelector( '#primary-menu .collapsed-menu' );

      // Creates the .collapsed-menu submenu.
      let subMenu = document.createElement( 'ul' );

      subMenu.classList.add( 'sub-menu' );
      collapsedMenuParent.appendChild( subMenu );

      collapsedMenu = document.querySelector( '#primary-menu .collapsed-menu > .sub-menu' );

    }

    let primaryMenuItems    = document.querySelectorAll( '#primary-menu ul.menu > li:not( .collapsed-menu )' );
    let numPrimaryMenuItems = primaryMenuItems.length - 1;

    while ( primaryMenuContainerWidth <= primaryMenuWidth && numPrimaryMenuItems >= 0 ) {

      let menuItem            = primaryMenu.removeChild( primaryMenuItems.item( numPrimaryMenuItems ) );
      let collapsedMenuItems  = document.querySelectorAll( '#primary-menu .collapsed-menu > .sub-menu > li' )

      collapsedMenu.insertBefore( menuItem, collapsedMenuItems.item( 0 ) );

      // Resets widths.
      primaryMenuContainerWidth = primaryMenuContainer.offsetWidth;
      primaryMenuWidth          = primaryMenu.offsetWidth;

      numPrimaryMenuItems--;

    }

  }

}

primaryMenuCollapser();
window.onresize = primaryMenuCollapser;
