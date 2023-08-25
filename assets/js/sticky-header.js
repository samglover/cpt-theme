const adminBarHeight = document.getElementById('wpadminbar') ? document.getElementById('wpadminbar').offsetHeight : 0;
const preheaderHeight = document.querySelector('.site-preheader') ? document.querySelector('.site-preheader').offsetHeight : 0;
const siteHeader = document.querySelector('.site-header');
const primaryNav = document.querySelector('.site-header-primary-nav');

function stickyHeader() {
  let windowPosition = window.scrollY + adminBarHeight;
  let primaryNavPosition = siteHeader.offsetTop + adminBarHeight + preheaderHeight;

  if (windowPosition > primaryNavPosition) {
    siteHeader.classList.add('sticky-nav');
    if (adminBarHeight) primaryNav.style.top = adminBarHeight + 'px';
  }

  if (windowPosition <= primaryNavPosition) {
    siteHeader.classList.remove('sticky-nav');
    primaryNav.style.top = null;
  }
}

window.onload = stickyHeader;
window.onscroll = stickyHeader;
