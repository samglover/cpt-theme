const adminBar = document.getElementById('wpadminbar');
const adminBarHeight = adminBar ? adminBar.offsetHeight : 0;
const root = document.querySelector(":root"); //grabbing the root element
const siteHeader = document.querySelector('.site-header');
const primaryNav = document.querySelector('.site-header-primary-nav');
const navHeight = primaryNav.offsetHeight;

root.style.setProperty('--header-spacer-height', navHeight + 'px');

function stickyHeader() {
  if (!document.querySelector('.site-header')) return;
  let windowPosition = window.scrollY + adminBarHeight;

  // console.log(windowPosition);
  // console.log(primaryNav.offsetTop);

  if (windowPosition > siteHeader.offsetTop) {
    siteHeader.classList.add('sticky-nav');
  }

  if (windowPosition <= siteHeader.offsetTop) {
    primaryNav.classList.remove('sticky-nav');
  }
}

window.onload = stickyHeader;
window.onscroll = stickyHeader;
