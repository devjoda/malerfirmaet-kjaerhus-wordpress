<?
// Add backend footer code
$code_footer = get_theme_mod('setting_footer_code');

// Company info
$company_name = get_theme_mod('setting_firma_navn');
$company_address = get_theme_mod('setting_adresse');
$company_zipcode = get_theme_mod('setting_postnummer');
$company_city = get_theme_mod('setting_by');
$company_country = get_theme_mod('setting_land');
$company_vat = get_theme_mod('setting_cvr');

// Contact info
$company_email = get_theme_mod('setting_email');
$company_phone = get_theme_mod('setting_telefon');
$company_phone_trimmed = str_replace(" ", "", $company_phone);

// Social media
$social_facebook = get_theme_mod('setting_facebook');
$social_linkedin = get_theme_mod('setting_linkedin');

// Frontpage id
$frontpage_id = get_option('page_on_front');
$references_block_id = 'seperator-block_61fba36e8c54e';
$references_url_fragment = get_permalink($frontpage_id) . '/#' . $references_block_id;

?>

<footer id="footer" class="footer" role="contentinfo">

  <div class="container-fluid">

    <div class="row">
      <div class="col-md-12">
        <nav role="navigation">
          <div class="links-container">
            <? superego_footer_links(); ?>
            <ul id="referencer">
              <li>
                <a href="<?= $references_url_fragment; ?>">Referencer</a>
              </li>
            </ul>
          </div>
          <div class="social">
            <a href="<?= $social_facebook; ?>" target="_blank" aria-label="Facebook">
              <?= svg_image('facebook') ?>
            </a>
          </div>
          <div class="company-info">
            <div>
              <p><span class="bold"><?= $company_name; ?></span></p>
              <p><?= $company_address; ?></p>
              <p><?= $company_zipcode;
                  $company_city; ?></p>
              <p class="company-phone"><span class="bold">T.&nbsp;&nbsp;</span><a href="tel:<?= $company_phone_trimmed; ?>"><?= $company_phone; ?></a></p>
              <p><span class="bold">M.&nbsp;&nbsp;</span><a href="mailto:<?= $company_email; ?>"><?= $company_email; ?></a></p>
            </div>
          </div>
          <div class="logo">
            <a id="footer-logo" href="<?= get_home_url(); ?>" title="<? wp_title(); ?> aria-label='Facebook'">
              <?= wp_get_attachment_image(257, 'full'); ?>
            </a>
          </div>
        </nav>
      </div>
    </div>
  </div>

</footer> <!-- end footer -->

</div> <!-- end #wrapper -->

<? wp_footer(); ?>

<? if ($code_footer) : echo $code_footer;
endif; ?>

</body> <!-- end body -->

</html> <!-- end page -->