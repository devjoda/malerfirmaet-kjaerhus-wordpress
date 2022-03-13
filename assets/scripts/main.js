// -----------------------------------------------------------------------------
// This is the main JS file of the Superego theme
// -----------------------------------------------------------------------------

'use strict'

jQuery(document).ready(function ($) {
  $('html').removeClass('no-js')

  // Initialize AOS Animation
  AOS.init({
    duration: 800,
    easing: 'ease-out',
  })

  // Standard Parallax
  // var parallax = document.getElementsByClassName('parallax');
  // new simpleParallax(parallax, {
  //   scale: 1.2,
  //   delay: 0.6,
  //   transition: 'cubic-bezier(0,0,0,1)'
  // });

  // Add sticky to #header on scroll
  window.addEventListener('scroll', function () {
    var header = document.querySelector('header')
    header.classList.toggle('sticky', window.scrollY > 1)
  })

  // Formidable form click
  $('.frm_form_field input, .frm_form_field textarea').focus(function () {
    $(this).parent().addClass('focus')
  })

  $('.frm_form_field input, .frm_form_field textarea').blur(function () {
    if ($(this).val()) {
    } else {
      $(this).parent().removeClass('focus')
    }
  })

  // Mobile menu: Toggle menu
  // $('#menu-toggle .inner, #menu-overlay').click(function(){
  //   $('#mobile-menu').toggleClass('active');
  //   $('body').toggleClass('no-scroll');
  //   $('#menu-toggle .inner').toggleClass('active');
  // });

  // Mobile menu: Open dropdowns
  // $("#mobile-menu-inner ul li span").click(function() {
  //   $(this).parent().find('> .sub-menu').slideToggle();
  //   $(this).parent().toggleClass('active');
  // });
}) // End document.ready
