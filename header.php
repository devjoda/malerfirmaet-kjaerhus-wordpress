<?
// Header and body backend scripts
$code_head = get_theme_mod('setting_header_code');
$code_body = get_theme_mod('setting_body_code');
$theme_color = get_theme_mod('setting_theme_color');

// Facebook
$social_facebook = get_theme_mod('setting_facebook');

// Theme path
$theme_path = get_stylesheet_directory();
$logo_path = get_template_directory() . '/assets/images/logo.png';

// get global Mobile Detect
global $detect;

if (!wp_script_is('header-js')) :
	wp_enqueue_script('header-js', THEME . '/assets/scripts/header.js', array('jquery'), false, false);
endif;
?>
<!doctype html>

<!--
Lavet af Superego - https://superego.nu
Telefon: +45 78 70 29 29 - Email: horsens@superego.nu
 -->

<html class="no-js" <? language_attributes(); ?> dir="ltr">

<head>
	<meta charset="<? bloginfo('charset'); ?>">
	<? if (!is_plugin_active('wordpress-seo/wp-seo.php')) : ?>
		<title><? wp_title(); ?></title>
	<? endif; ?>
	<meta name="description" content="Vi leverer kvalitetsarbejde til absolut konkurrencedygtige priser" />

	<!-- Force IE to use the latest rendering engine available -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<!-- Mobile Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="theme-color" content="<?= $theme_color; ?>">

	<? if (!function_exists('has_site_icon') || !has_site_icon()) : ?>
		<link rel="icon" href="<?= get_template_directory_uri(); ?>/assets/images/theme-default/favicon.png">
		<link href="<?= get_template_directory_uri(); ?>/assets/images/theme-default/apple-icon-touch.png" rel="apple-touch-icon" />
	<? endif; ?>

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

	<? wp_head(); ?>

	<? get_template_part('/template-parts/parts/variables'); ?>

	<? if ($code_head) :
		echo $code_head;
	endif; ?>
</head>

<body <? body_class(); ?>>

	<? if ($code_body) :
		echo $code_body;
	endif; ?>

	<div id="wrapper" class="wrapper">
		<header id="main-header" class="header" role="banner" aria-label="Site header">
			<div class="container-fluid">
				<div class="row">
					<div class="site-logo-container col-2 ">
						<a id="site-logo" href="<?= get_home_url(); ?>" title="<? wp_title(); ?>">
							<?= wp_get_attachment_image(257, 'full', false, array("loading" => "false")); ?>
						</a>
					</div>

					<div class="col-10">
						<nav id="main-navigation">
							<? superego_top_nav(); ?>
						</nav>

						<div class="burger col-10">
							<span></span>
						</div>

						<nav id="main-navigation-mobile">
							<? wp_nav_menu(array(
								'container' => false,
								'menu' => '10',
							)); ?>
							<div class="social">
								<a href="<?= $social_facebook; ?>" target="_blank" aria-label="Facebook">
									<?= svg_image('facebook') ?>
								</a>
							</div>
						</nav>

						<div class="overlay"></div>
						</nav>

					</div>

				</div>
			</div>
		</header> <!-- end #main-header -->