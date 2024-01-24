const MenuContainer     = document.querySelector('#primary-menu');
const Menu              = document.querySelector('#primary-menu > .menu');
const CollapsedMenu     = document.querySelector('#collapsed-menu');
const CollapsedSubMenu  = document.querySelector('#collapsed-menu > .sub-menu');

// Loads the collapse function immediately, then again when the DOM is ready in 
// case the dimensions have changed (due to fonts, for example). Also runs 
// whenever the window is resized.
menuCollapser();
// wp.domReady(menuCollapser);
window.addEventListener('resize', menuCollapser);

/**
 * Menu Collapser
 *
 * If the menu overflows the width of the menu container, this function
 * collapses the overflow into a new sub-menu.
 */
function menuCollapser() {
  if (!Menu) return;
  if (menuContainerWidth() > menuWidth()) resetMenu();
  if (menuContainerWidth() <= menuWidth()) collapseMenu();
}

function menuContainerWidth() {
  // console.log('menuContainerWidth: ' + Math.ceil(MenuContainer.offsetWidth));
  return Math.ceil(MenuContainer.offsetWidth);
}

function menuWidth() {
  // console.log('menuWidth: ' + Math.ceil(Menu.scrollWidth));
  return Math.ceil(Menu.scrollWidth);
}

function resetMenu() {
  if (CollapsedMenu.style.display != "none") CollapsedMenu.style.display = "none";

  let collapsedMenuItems = CollapsedSubMenu.querySelectorAll('.menu-item:not(.sub-menu .sub-menu .menu-item)');
  if (collapsedMenuItems.length == 0) return;

  // console.log('Resetting the menu …');
  collapsedMenuItems.forEach(function (element) {
    Menu.insertBefore(element, CollapsedMenu);
  });
}

function collapseMenu() {
  CollapsedMenu.style.display = "revert";
  
  let primaryMenuItems = Menu.querySelectorAll('.menu-item:not(.sub-menu .menu-item):not(.collapsed-menu)');
  if (primaryMenuItems.length == 0) return;

  // console.log('Collapsing the menu …');
  for (let i = primaryMenuItems.length - 1; i >= 0; i--) {
    if (menuContainerWidth() <= menuWidth()) {
      let collapsedMenuItems = CollapsedSubMenu.querySelectorAll('.menu-item:not(.sub-menu .sub-menu .menu-item)');
      CollapsedSubMenu.insertBefore(primaryMenuItems.item(i), collapsedMenuItems.item(0));
    }
  }
}