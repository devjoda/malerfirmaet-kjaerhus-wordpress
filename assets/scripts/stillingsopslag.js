jQuery(document).ready(function ($) {
  function share_fb(url) {
    window.open(
      "https://www.facebook.com/sharer/sharer.php?u=" + url,
      "facebook-share-dialog",
      "width=626, height=436"
    );
  }
});
