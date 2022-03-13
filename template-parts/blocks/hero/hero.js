// Swiper code wrapped in function to initialize inside document.ready
var initializeHeroSwiper = function ($block) {
  var swiper = new Swiper(".swiper-hero-slider", {
    slidesPerView: 1,
    spaceBetween: 16,
    loop: true,
    autoplay: {
      delay: 3000,
    },
  });
};

jQuery(document).ready(function ($) {
  // Initialize block on page load (front end)
  initializeHeroSwiper();

  // Initialize block preview (editor)
  if (window.acf) {
    window.acf.addAction("render_block_preview", initializeHeroSwiper);
  }
});
