<?

// Enqueue scripts
function site_scripts() {

  // Call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way
  global $wp_styles;

  /* STYLESHEETS */

  // Register Theme style.css (Used for Custom properties in backend)
  wp_enqueue_style('style', get_stylesheet_uri());

  // Register main stylesheet
  wp_enqueue_style('main-style', THEME . '/assets/styles/css/main.css', array(), filemtime(get_template_directory() . '/assets/styles/scss'), 'all');

  // Register Bootstrap Grid Style
  wp_enqueue_style('bootstrap-5-grid', THEME . '/assets/styles/vendors/bootstrap-grid.min.css', false, false, 'all');

  // Register AOS Style
  wp_enqueue_style('aos-style', THEME . '/assets/styles/vendors/aos.css');

  // Register Fancybox 3 Style
  wp_enqueue_style('fancybox-style', THEME . '/assets/styles/vendors/fancybox.css');

  // Register Swiper Style
  // wp_enqueue_style('swiper-style', THEME . '/assets/styles/vendors/swiper-bundle.min.css');

  /* SCRIPTS */

  // Register Main JS
  wp_enqueue_script('main-js', THEME . '/assets/scripts/main.js', array('jquery'), false, false);

  // Register AOS JS
  wp_enqueue_script('aos-3-js', THEME . '/assets/scripts/vendors/aos-3.js', array('jquery'), false, false);

  // Register Simple Parallax JS
  // wp_enqueue_script('parallax-js', THEME . '/assets/scripts/vendors/simpleParallax.min.js', array('jquery'), false, false);

  // Register Fancybox 3 JS
  wp_enqueue_script('fancybox-js', THEME . '/assets/scripts/vendors/fancybox.umd.js', array('jquery'), false, false);

  // Register Swiper JS
  // wp_enqueue_script('swiper-js', THEME . '/assets/scripts/vendors/swiper-bundle.min.js', array('jquery'), false, false);

  // Register Isotope JS
  // wp_enqueue_script('isotope-js', THEME . '/assets/scripts/vendors/isotope.pkgd.min.js', array('jquery'), false, false);

  // Register frontpage script & stylesheet
  // if( is_front_page() ) :
  //   wp_enqueue_script( 'home-js', THEME . '/assets/scripts/home.js', array('jquery'), false, false );
  //   wp_enqueue_style( 'home-style', THEME . '/assets/styles/css/home.css', false, false, 'all' );
  // endif;

  // Register Google fonts
  if (get_theme_mod('setting_google_fonts')) :
    wp_enqueue_style('google-fonts', get_theme_mod('setting_google_fonts'), array(), null);
  endif;

  // Register Adobe Typekit
  if (get_theme_mod('setting_adobe_typekit')) :
    wp_enqueue_style('adobe-typekit', get_theme_mod('setting_adobe_typekit'), array(), null);
  endif;
}
add_action('wp_enqueue_scripts', 'site_scripts', 999);

// Remove wp version param from any enqueued scripts
function remove_version($src) {
  if (strpos($src, 'ver='))
    $src = remove_query_arg('ver', $src);
  return $src;
}
add_filter('style_loader_src', 'remove_version', 9999);
add_filter('script_loader_src', 'remove_version', 9999);
