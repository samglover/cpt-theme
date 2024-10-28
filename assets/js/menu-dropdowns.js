wp.domReady(() => {
  const menusWithChildren = document.querySelectorAll('.menu-item-has-children:not(.menu-item-has-children .menu-item-has-children)');
  if (!menusWithChildren) return;
  
  const submenuDismiss = document.createElement('button');
        submenuDismiss.classList.add('submenu-dismiss');
  const submenuScreen = document.createElement('div');
        submenuScreen.classList.add('submenu-screen');
  
  addEventListener('keyup', (event) => {
    if (event.key === 'Escape') closeOpenMenus();
  });
  document.addEventListener('click', checkClick);
  menusWithChildren.forEach(element => element.addEventListener('click', toggleMenu));
  
  function toggleMenu(event) {
    let clickedMenu = event.currentTarget;
    if (clickedMenu.classList.contains('open')) {
      closeOpenMenus(clickedMenu);
    } else {
      closeOpenMenus(clickedMenu);
      clickedMenu.classList.add('open');
      clickedMenu.prepend(submenuDismiss);
      if (window.innerWidth <= 576) {
        clickedMenu.after(submenuScreen);
      }
    }
  }
  
  function checkClick(event) {
    if (
      !event.target.closest('.menu-item-has-children') || 
      event.target.classList.contains('submenu-dismiss')
    ) {
      closeOpenMenus();
    }
  }
  
  function closeOpenMenus(clickedMenu) {
    let openMenus = document.querySelectorAll('.menu-item-has-children.open');
    if (!openMenus) return;
    openMenus.forEach(function (element) {
      if (element !== clickedMenu) {
        element.classList.remove('open');
        submenuDismiss.remove();
        submenuScreen.remove();
      }
    });
  }
});
