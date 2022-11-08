const adminBarHeight = document.getElementById('wpadminbar') ? document.getElementById('wpadminbar').offsetHeight : 0;
const preheaderHeight = document.querySelector('.site-preheader') ? document.querySelector('.site-preheader').offsetHeight : 0;
const siteHeader = document.querySelector('.site-header');
const primaryNav = document.querySelector('.site-header-primary-nav');
const navHeight = primaryNav.offsetHeight;

document.querySelector(":root").style.setProperty('--header-spacer-height', navHeight + 'px');

function stickyHeader() {
  let windowPosition = window.scrollY + adminBarHeight;
  let headerPosition = siteHeader.offsetTop + adminBarHeight + preheaderHeight;

  if (windowPosition > headerPosition) {
    siteHeader.classList.add('sticky-nav');
    if (adminBarHeight) primaryNav.style.top = adminBarHeight + 'px';
  }

  if (windowPosition <= headerPosition) {
    siteHeader.classList.remove('sticky-nav');
  }
}

window.onload = stickyHeader;
window.onscroll = stickyHeader;
