wp.domReady(() => {
  const adminBar = document.getElementById('wpadminbar') ? document.getElementById('wpadminbar') : false;
  const preheader = document.querySelector('.site-preheader') ? document.querySelector('.site-preheader') : false;
  const siteHeader = document.querySelector('.site-header');
  const primaryNav = document.querySelector('.site-header-primary-nav');
  const headerHeight = primaryNav.offsetHeight;

  document.querySelector(":root").style.setProperty('--header-height', headerHeight + 'px');

  function stickyHeader() {
    if (window.innerWidth <= 600) return; // Width at which the admin bar is no longer position: fixed.
    let adminBarHeight = adminBar ? adminBar.offsetHeight : 0;
    let preheaderHeight = preheader ? preheader.offsetHeight : 0;
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
});