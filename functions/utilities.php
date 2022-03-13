<?

// SVG Image function to return SVG from assets/images/svg folder
// Use echo svg_image(file_name); 
function svg_image($filename) {
  $theme_path = get_stylesheet_directory();
  $svg_file = file_get_contents($theme_path . '/assets/images/svg/' . $filename . '.svg');

  if ($svg_file) {
    return $svg_file;
  } else {
    return null;
  }
}

// appendSlide() function to append slide group elements to DOM
function appendSlide($slideGroup, $type) {
  $heading = $slideGroup['heading'];
  $body = $slideGroup['body'];
  $image_ID = $slideGroup['image'];
  if (!$heading || !$body || !$image_ID) {
    return;
  } else if ($type == 'heading') {
    return <<<HTML
        <div class="swiper-slide"><h3>$heading</h3></div>
        HTML;
  } else if ($type == 'body') {
    return <<<HTML
        <div class="swiper-slide"><p>$body</p></div>
        HTML;
  } else if ($type == 'image') {
    $image = wp_get_attachment_image($image_ID, 'full');
    return <<<HTML
        <div class="swiper-slide">$image</div>
        HTML;
  } else {
    return;
  }
}
