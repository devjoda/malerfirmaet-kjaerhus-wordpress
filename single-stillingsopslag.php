<?
// Variables
$titel = get_the_title();
$id = the_ID();
$ansoegningsfrist = get_field('stillingsopslag_frist', $id);
$manchet = get_field('stillingsopslag_manchet', $id);
$broedtekst = get_field('stillingsopslag_brodtekst', $id);
$company_email = get_theme_mod('setting_email');
$company_phone = get_theme_mod('setting_telefon');
$company_phone_trimmed = str_replace(" ", "", $company_phone);
?>

<? get_header(); ?>

<script>
	function share_fb(url) {
		window.open('https://www.facebook.com/sharer/sharer.php?u=' + url, 'facebook-share-dialog', "width=626, height=436")
	}
</script>

<div id="content" class="content">

	<main id="main" class="main" role="main">
		<section id="post-type-stillingsopslag-<? the_ID(); ?>" <? post_class(''); ?>>


			<div class="container-fluid">
				<div class="row">
					<div data-aos="fade-right" class="heading col-12">
						<h1><?= $titel ?></h1>
					</div>
				</div>
				<div class="row">
					<div data-aos="fade-right" class="details col-12 col-lg-4 col-xxl-3">

						<? if ($ansoegningsfrist) : ?>
							<div class="ansoegningsfrist">
								<p>Ansøgningsfrist</p>
								<p><?= $ansoegningsfrist ?></p>
							</div>
							<div class="seperator"></div>
						<? endif; ?>

						<div class="del-med-en-ven">
							<p>Del med en ven</p>
							<div class="svg-wrapper">
								<div class="svg-container hover-effect-1" onclick="share_fb('<? the_permalink(); ?>');return false;" rel="nofollow" share_url="<? the_permalink(); ?>" target="_blank"><?= svg_image('facebook-btn'); ?></div>
								<div class="svg-container hover-effect-1"><a href="https://linkedin.com/shareArticle?url=<?= the_permalink(); ?>/&title=<?= the_title(); ?>&source=<?= home_url(); ?>" target="_blank"><?= svg_image('linkedin-btn'); ?></a></div>
							</div>
						</div>

						<? if ($company_email || $company_email) : ?>
							<div class="seperator trailing"></div>
							<div class="kontakt-os">
								<p>Kontakt os</p>

								<div class="svg-wrapper">
									<? if ($company_email) : ?>
										<div class="email hover-effect-1">
											<div class="svg-container"><a href="mailto:<?= $company_email; ?>"><?= svg_image('phone-btn') ?></a></div>
											<a href="mailto:<?= $company_email; ?>"><?= $company_email; ?></a>
										</div>
									<? endif ?>
									<? if ($company_phone) : ?>
										<div class="phone hover-effect-1">
											<div class="svg-container"><a href="tel:<?= $company_phone_trimmed; ?>"><?= svg_image('email-btn') ?></a></div>
											<a href="tel:<?= $company_phone_trimmed; ?>"><?= $company_phone; ?></a>
										</div>
									<? endif ?>
								</div>

							</div>
						<? endif ?>

					</div>

					<div data-aos="fade-in" data-aos-delay="300" class="image col-12 col-lg-7 col-xl-6 offset-lg-1 offset-xl-1 offset-xxl-1">
						<? if (has_post_thumbnail()) : ?>
							<? the_post_thumbnail('full'); ?>
						<? endif ?>
					</div>

				</div>
				<div class="row">
					<div class="article-body col-12 col-lg-7 col-xl-6 offset-lg-5 offset-xxl-4">
						<? if ($manchet) : ?>
							<p class="manchet"><?= $manchet ?></p>
						<? endif; ?>
						<? if ($broedtekst) : ?>
							<div class="broedtekst"><?= $broedtekst ?></div>
						<? endif; ?>
						<h3>Søg stillingen</h3>
						<div>
							<?= FrmFormsController::get_form_shortcode(array('id' => 1, 'title' => false, 'description' => false)); ?>
						</div>
					</div>
				</div>

			</div>
		</section>

	</main> <!-- end #main -->

</div> <!-- end #content -->

<? get_footer(); ?>