wp.domReady(() => {
  const ctaModal = document.getElementById('cta-modal');
  if (!ctaModal) return;
  
  const ctaButton = document.getElementById('header-cta');
  const ctaLinks = document.querySelectorAll('a[href*="#cpt-cta"]');
  const ctaDismiss = ctaModal.querySelector('#cta-modal .modal-dismiss');
  const ctaModalScreen = document.getElementById('cta-modal-screen');
  
  if (ctaButton) ctaButton.addEventListener('click', toggleModal);
  if (ctaLinks) ctaLinks.forEach(element => element.addEventListener('click', toggleModal));
  
    addEventListener('keyup', (event) => {
      if (event.key === 'Escape') closeModal();
    });
    document.addEventListener('click', checkClick);
  
  function toggleModal(event) {
    event.preventDefault();
    if (ctaModal.classList.contains('visible')) {
      ctaModal.classList.remove('visible');
    } else {
      ctaModal.classList.add('visible');
    }
  }
  
  function checkClick(event) {
    if (
      !event.target.closest('#header-cta') || 
      event.target.classList.contains('modal-dismiss')
    ) {
      closeModal();
    }
  }
  
  function closeModal() {
    ctaModal.classList.remove('visible');
  }
});