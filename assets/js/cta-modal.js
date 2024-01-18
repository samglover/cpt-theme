wp.domReady(() => {
  const ctaModal = document.getElementById('cta-modal');
  if (!ctaModal) return;
  
  const ctaButton = document.getElementById('header-cta');
  const ctaDismiss = document.querySelector('#cta-modal .cta-modal-dismiss');
  const ctaLinks = document.querySelectorAll('a[href*="#cpt-cta"]');
  
  if (ctaButton) ctaButton.addEventListener('click', showModal);
  if (ctaDismiss) ctaDismiss.addEventListener('click', closeModal);
  if (ctaLinks) ctaLinks.forEach(element => element.addEventListener('click', showModal));
  addEventListener('keyup', (event) => {
    if (event.key === 'Escape') closeModal();
  });

  function showModal(event) {
    if (event) event.preventDefault();
    ctaModal.classList.add('visible');
  }

  function closeModal(event) {
    if (event) event.preventDefault();
    ctaModal.classList.remove('visible');
  }
});