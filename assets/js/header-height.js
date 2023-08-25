const primaryNav = document.querySelector('.site-header-primary-nav');
const headerHeight = primaryNav.offsetHeight;

document.querySelector(":root").style.setProperty('--header-height', headerHeight + 'px');