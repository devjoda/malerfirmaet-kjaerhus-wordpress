// Swiper code wrapped in function to initialize inside document.ready
var initializeSwiper = function ($block) {
  var swiper = new Swiper('.swiper-slider', {
    slidesPerView: 1,
    spaceBetween: 16,
    loop: true,
    // autoplay: {
    //   delay: 5000,
    // },
    navigation: {
      nextEl: '.swiper-button-next-slide',
      prevEl: '.swiper-button-prev-slide',
    },
  })
}

jQuery(document).ready(function ($) {
  // Initialize block on page load (front end)
  initializeSwiper()

  // Initialize block preview (editor)
  if (window.acf) {
    window.acf.addAction('render_block_preview', initializeSwiper)
  }
})