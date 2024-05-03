// This is a hack to add the correct classes to the block editor root container.
// @see: https://stackoverflow.com/questions/75912533/has-global-padding-not-added-to-is-root-container-in-wordpress

window.addEventListener('load', rootContainerClasses);
function rootContainerClasses() {
  let rootContainer = document.querySelector('.editor-styles-wrapper .is-root-container');
  if (!rootContainer) return;
  if (!rootContainer.classList.contains('has-global-padding')) {
    rootContainer.classList.add('has-global-padding', 'is-layout-constrained');
    rootContainer.classList.remove('is-layout-flow', 'wp-block-post-content-is-layout-flow');
  } else {
    console.log('This theme is now adding .has-global-padding properly; you may remove this script.');
  }
}

