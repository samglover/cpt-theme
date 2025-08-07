const primaryMenuContainer = document.querySelector('.primary-menu-container');
const topLevelSubMenus = document.querySelectorAll('.primary-menu-container .menu > .menu-item-has-children');

window.addEventListener('resize', preventOffscreenSubmenus);
wp.domReady(preventOffscreenSubmenus);

function preventOffscreenSubmenus() {
	let containerRect = primaryMenuContainer.getBoundingClientRect();

	topLevelSubMenus.forEach(menu => {
		menu.classList.remove('align-submenu-right');
		let menuRect = menu.getBoundingClientRect();
		let menuCenter = menuRect.right - ((menuRect.right - menuRect.left) / 2);

		// 115px is half the max width of a submenu (230px). See /assets/scss/_menus.scss
		if ((menuCenter + 115) > containerRect.right) {
			menu.classList.add('align-submenu-right');
		}
	});
}

