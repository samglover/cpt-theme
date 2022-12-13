function handleCTAModal() {
  if (!document.getElementById('cta-modal')) return;
  const ctaButton   = document.getElementById('header-cta');
  const ctaModal    = document.getElementById('cta-modal');
  const ctaDismiss  = ctaModal.querySelector('.dismiss-modal');

  ctaButton.addEventListener('click', toggleModal);

  function toggleModal(event) {
    if (!ctaModal) return;
    event.preventDefault();

    if (ctaModal.classList.contains('visible')) {
      ctaModal.classList.remove('visible');
    } else {
      ctaModal.classList.add('visible');
      ctaDismiss.addEventListener('click', closeModal);
    }
  }

  function closeModal() {
    ctaModal.classList.remove('visible');
    ctaDismiss.removeEventListener('click', closeModal);
  }
}

window.onload = handleCTAModal;
