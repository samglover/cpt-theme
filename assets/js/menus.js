const MenuContainer     = document.querySelector('#primary-menu');
const Menu              = document.querySelector('#primary-menu > .menu');
const CollapsedMenu     = document.querySelector('#collapsed-menu');
const CollapsedSubMenu  = document.querySelector('#collapsed-menu > .sub-menu');

/**
 * Menu Collapser
 *
 * If the menu overflows the width of the menu container, this function
 * collapses the overflow into a new sub-menu.
 */
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
  let primaryMenuItems = Menu.querySelectorAll('.menu-item:not(.sub-menu .menu-item):not(.collapsed-menu)');
  let collapsedMenuItems = CollapsedSubMenu.querySelectorAll('.menu-item:not(.sub-menu .sub-menu .menu-item)');

  collapsedMenuItems.forEach( function(element) {
    Menu.insertBefore(element, CollapsedMenu);
  });

  CollapsedMenu.style.display = "none";
}

function collapseMenu() {
  CollapsedMenu.style.display = "revert";

  let primaryMenuItems = Menu.querySelectorAll('.menu-item:not(.sub-menu .menu-item):not(.collapsed-menu)');

  for (let i = primaryMenuItems.length - 1; i >= 0; i--) {
    if ( MenuContainer.offsetWidth <= Menu.scrollWidth ) {
      let collapsedMenuItems = CollapsedSubMenu.querySelectorAll('.menu-item:not(.sub-menu .sub-menu .menu-item)');
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


/**
 * Drop-Down Menus
 */
let dropDownMenus = document.querySelectorAll('.menu-item-has-children');

dropDownMenus.forEach(function(element) {
  element.addEventListener('click', toggleSubMenu);
});

function toggleSubMenu() {
  event.stopPropagation();
  
  if ( this.classList.contains('open') ) {
    this.classList.remove('open');
  } else {
    closeOtherSubMenus(this);
    this.classList.add('open');
    document.addEventListener('click', closeOtherSubMenus);
  }
}

function closeOtherSubMenus(subMenu = null) {
  let openSubMenus = document.querySelectorAll('.menu-item-has-children.open');
  openSubMenus.forEach( function(element) {
    if ( subMenu !== null && element != subMenu ) {
      element.classList.remove('open');
    }
  });
  document.removeEventListener('click', closeOtherSubMenus);
}
