<?
// Contact info
$company_email = get_theme_mod('setting_email');
$company_phone = get_theme_mod('setting_telefon');
$company_phone_trimmed = str_replace(" ", "", $company_phone);
?>

<? get_header(); ?>

<div id="content" class="content">

	<main id="main" class="main" role="main">
		<section id="page-<? the_ID(); ?>" <? post_class(''); ?>>
			<? if (have_posts()) : while (have_posts()) : the_post(); ?>

					<header class="header container-fluid">
						<div class="row">
							<div data-aos="fade-right" class="text col-12 col-xl-5">
								<h1><?= get_field('page_title') ?: get_the_title(); ?></h1>
								<div class="body"><? the_content(); ?></div>
								<div class="contact-wrapper">
									<div class="email hover-effect-1">
										<div class="svg-container"><a href="mailto:<?= $company_email; ?>"><?= svg_image('phone-btn') ?></a></div>
										<a href="mailto:<?= $company_email; ?>"><?= $company_email; ?></a>
									</div>
									<div class="phone hover-effect-1">
										<div class="svg-container"><a href="tel:<?= $company_phone_trimmed; ?>"><?= svg_image('email-btn') ?></a></div>
										<a href="tel:<?= $company_phone_trimmed; ?>"><?= $company_phone; ?></a>
									</div>
								</div>
							</div>
							<div class="image col-12 col-xl-6 offset-xl-1 ">
								<div data-aos="fade-up" class="circular-image-container"><? the_post_thumbnail('large'); ?></div>
							</div>
						</div>
						<div class="seperator"></div>
					</header>


					<?
					// WP_Query arguments
					$args = array(
						'post_type'      => 'stillingsopslag',
						'posts_per_page' => -1,
						'order'          => 'DESC',
						'orderby'        => 'ID',
					);

					// The Query
					$query = new WP_Query($args);
					$posts = $query->posts;

					foreach ($posts as $post) :
						$ansoegningsfrist = get_field('stillingsopslag_ansoegningsfrist', $post->ID) ?: 'ansøgningsfrist';
						$manchet = get_field('stillingsopslag_manchet', $post->ID) ?: 'manchet';
						$broedtekst = get_field('stillingsopslag_brodtekst', $post->ID) ?: 'brødtekst';
						$udvalgt_billede = get_the_post_thumbnail($post->ID, 'full');
						$permalink = get_the_permalink($post->ID);
					?>

						<div class="stillingsopslag-wrapper">
							<section data-aos="fade-up" id="stillingsopslag-<? the_ID(); ?>" class="stillingsopslag">
								<div class="container-fluid">
									<div class="image row">
										<div class="col-12 col-lg-6">
											<a href="<?= $permalink; ?>"><?= $udvalgt_billede ?></a>
										</div>
										<div class="text col-12 col-lg-4 offset-lg-1">
											<div class="hover-effect-1">
												<a href="<?= $permalink; ?>">
													<h2><? the_title(); ?></h2>
												</a>
												<a href="<?= $permalink; ?>">
													<p><?= $manchet ?></p>
												</a>
												<div class="svg-container">
													<a href="<?= $permalink; ?>">
														<?= svg_image('arrow-right'); ?>
													</a>
												</div>
											</div>
										</div>
									</div>
									<div class="seperator"></div>
								</div>
							</section>
						</div>
					<? endforeach; ?>

			<? endwhile;
			endif; ?>
		</section>
	</main> <!-- end #main -->

</div> <!-- end #content -->

<? get_footer(); ?>