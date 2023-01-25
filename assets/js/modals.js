const ctaButton   = document.getElementById('header-cta');
const ctaLinks    = document.querySelectorAll('a[href*="#cpt-cta"]');
const ctaModal    = document.getElementById('cta-modal');
const ctaDismiss  = ctaModal ? ctaModal.querySelector('.dismiss-modal') : null;

if (ctaModal) ctaButton.addEventListener('click', toggleModal);
if (ctaLinks) ctaLinks.forEach(element => element.addEventListener('click', toggleModal));

function toggleModal(event) {
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
