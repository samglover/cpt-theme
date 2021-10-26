/** Menu Collapser
 *
 * If the menu overflows the width of the menu container, this function
 * collapses the overflow into a new sub-menu.
 */
function menuCollapser() {

  let menuContainerWidth  = document.querySelector( '#header-menu' ).offsetWidth;

  let headerMenu          = document.querySelector( '#header-menu ul.menu' );
  let headerMenuWidth     = headerMenu.offsetWidth;

  let subMenuContainer    = document.querySelector( '#header-menu .collapsed-menu' );
  let subMenu             = document.querySelector( '#header-menu .collapsed-menu > .sub-menu' );

  // console.log( 'The menu container is ' + menuContainerWidth + ' pixels wide.' );
  // console.log( 'The menu is ' + headerMenuWidth + ' pixels wide.' );

  if ( menuContainerWidth <= headerMenuWidth ) {

    // First, checks to see if the submenu already exists in order to prevent
    // multiple menus, since the function runs whenever the window is resized.
    if ( ! subMenuContainer ) {

      // Creates the .collapsed-menu menu item.
      let container = document.createElement( 'li' );

      container.classList.add( 'menu-item', 'menu-item-has-children', 'collapsed-menu' );
      container.insertAdjacentHTML( 'afterbegin', '<a>&bull;&bull;&bull;</a>' );
      headerMenu.appendChild( container );

      subMenuContainer = document.querySelector( '#header-menu .collapsed-menu' );

      // Creates the .collapsed-menu submenu.
      let menu = document.createElement( 'ul' );

      menu.classList.add( 'sub-menu' );
      subMenuContainer.appendChild( menu );

      subMenu = document.querySelector( '#header-menu .collapsed-menu > .sub-menu' );

    }

    let headerMenuItems = document.querySelectorAll( '#header-menu ul.menu > li:not( .collapsed-menu )' );

    let i = headerMenuItems.length - 1;

    while ( menuContainerWidth <= headerMenuWidth && i >= 0 ) {

      let item          = headerMenu.removeChild( headerMenuItems.item( i ) );
      let subMenuItems  = document.querySelectorAll( '#header-menu .collapsed-menu > .sub-menu > li' )

      subMenu.insertBefore( item, subMenuItems.item( 0 ) );

      // Re-measure the container and menu widths. (Usually the container
      // doesn't change unless the window is resized, but sometimes it doesn't
      // load properly at narrow widths.)
      menuContainerWidth  = document.querySelector( '#header-menu' ).offsetWidth;
      headerMenuWidth     = document.querySelector( '#header-menu  ul.menu' ).offsetWidth;

      // console.log( 'The menu container is now ' + menuContainerWidth + ' pixels wide.' );
      // console.log( 'The menu is now ' + headerMenuWidth + ' pixels wide.' );

      i--;

    }

  } else if ( menuContainerWidth > headerMenuWidth && subMenuContainer ) {

    console.log( 'Needs to grow!' );

    headerMenuItems   = document.querySelectorAll( '#header-menu ul.menu > li:not( .collapsed-menu )' );
    let subMenuItems  = document.querySelectorAll( '#header-menu .collapsed-menu > .sub-menu > li' );

    let i = subMenuItems.length - 1;

    while ( menuContainerWidth > headerMenuWidth && i >= 0 ) {

      if ( subMenuItems.length > 0 ) {

        if ( ( subMenuItems.item( 0 ).offsetWidth + headerMenuWidth ) > menuContainerWidth ) {
          headerMenuItems.appendChild( subMenuItems.item( 0 ) );
        }

      } else {

        headerMenuItems.removeChild( subMenuContainer );

      }

      menuContainerWidth  = document.querySelector( '#header-menu' ).offsetWidth;
      headerMenuWidth     = document.querySelector( '#header-menu  ul.menu' ).offsetWidth;

      i--;

    }

  }

}

menuCollapser();
window.onresize = menuCollapser;
