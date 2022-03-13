jQuery(document).ready(function ($) {
  // Swiper code wrapped in function to initialize inside document.ready
  var initializeWOFSwiper = function ($block) {
    var swiper = new Swiper(".swiper-slider", {
      slidesPerView: 1,
      spaceBetween: 16,
      loop: true,
      // autoplay: {
      //   delay: 1000,
      // },
      navigation: {
        nextEl: ".swiper-button-next-wof-slide",
        prevEl: ".swiper-button-prev-wof-slide",
      },
    });
  };

  jQuery(document).ready(function ($) {
    // Initialize block on page load (front end)
    initializeWOFSwiper();
  });
});
