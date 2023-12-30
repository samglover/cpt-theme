const menusWithChildren = document.querySelectorAll('.menu-item-has-children:not(.menu-item-has-children .menu-item-has-children)');
const closeDropdown = document.createElement('div');
      closeDropdown.classList.add('close-dropdown');
const dropdownScreen = document.createElement('div');
      dropdownScreen.classList.add('dropdown-screen');

if (menusWithChildren) {
  addEventListener('keyup', (event) => {
    if (event.key === 'Escape') closeOpenMenus();
  });
  document.addEventListener('click', checkClick);
  menusWithChildren.forEach(element => element.addEventListener('click', toggleMenu));
}

function toggleMenu(event) {
  let clickedMenu = event.currentTarget;
  if (clickedMenu.classList.contains('open')) {
    closeOpenMenus(clickedMenu);
  } else {
    closeOpenMenus(clickedMenu);
    clickedMenu.classList.add('open');
    clickedMenu.prepend(closeDropdown);
    if (window.innerWidth <= 576) clickedMenu.after(dropdownScreen);
  }
}

function checkClick(event) {
  if (
    !event.target.closest('.menu-item-has-children') || 
    event.target.classList.contains('close-dropdown')
  ) {
    closeDropdown.remove();
    closeOpenMenus();
  }
}

function closeOpenMenus(clickedMenu) {
  let openMenus = document.querySelectorAll('.menu-item-has-children.open');
  if (!openMenus) return;
  openMenus.forEach(function (element) {
    if (element !== clickedMenu) element.classList.remove('open');
  });
}