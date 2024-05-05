// This is a hack to add the correct classes to the block editor root container.
// @see: https://stackoverflow.com/questions/75912533/has-global-padding-not-added-to-is-root-container-in-wordpress
// @see: https://stackoverflow.com/questions/5525071/how-to-wait-until-an-element-exists/61511955#61511955
window.addEventListener('load', function () {
  let rootContainer = document.querySelector('.is-root-container');
  if (rootContainer) rootContainerClasses(rootContainer);
  waitForElement('.editor-canvas__iframe').then((editorEl) => {
    let rootContainer = editorEl.contentWindow.document.querySelector('.is-root-container');
    if (rootContainer) {
      rootContainerClasses(rootContainer);
    } else {
      editorEl.onload = () => {
        rootContainer = editorEl.contentWindow.document.querySelector('.is-root-container');
        if (!rootContainer) return;
        rootContainerClasses(rootContainer);
      }
    }
  });
});

function waitForElement(selector) {
  return new Promise(resolve => {
    if (document.querySelector(selector)) return resolve(document.querySelector(selector));
    const observer = new MutationObserver(mutations => {
      if (document.querySelector(selector)) {
        observer.disconnect();
        resolve(document.querySelector(selector));
      }
    });
    observer.observe(document.body, {
      // If you get "parameter 1 is not of type 'Node'" error, see https://stackoverflow.com/a/77855838/492336
      childList: true,
      subtree: true
    });
  });
}

function rootContainerClasses(rootContainer) {
  if (!rootContainer.classList.contains('has-global-padding')) {
    rootContainer.classList.add('has-global-padding', 'is-layout-constrained');
    rootContainer.classList.remove('is-layout-flow', 'wp-block-post-content-is-layout-flow');
  } else {
    console.log('This theme is now adding .has-global-padding properly; you may remove this script.');
  }
}