<?
// Template part for displaying page content in page.php 

// Variables
$id = get_the_ID();
$title = get_field('page_title') ?: get_the_title();
$subheading = get_field('page_underoverskrift', $id);
$featured_image = get_the_post_thumbnail(null, 'full');
$content = get_the_content();

?>

<article id="post-<? the_ID(); ?>" <? post_class(''); ?> role="article" itemscope itemtype="http://schema.org/WebPage">
		<div class="container-fluid">

			<div data-aos="fade-right" class="row">
				<div class="title col-12">
					<h1><?= $title ?> </h1>
				</div>
			</div>
			<div data-aos="fade-up" class="row">
				<? if ($featured_image) : ?>
					<div class="featured-image col-12">
						<?= $featured_image ?>
					</div>
				<? endif ?>
			</div>
			<div class="row article-body">
				<? if ($subheading) : ?>
					<div class="subheading col-12 col-lg-3 col-xl-3 col-xxl-2 offset-xl-1 offset-xxl-2">
						<h2><?= $subheading ?> </h2>
					</div>
				<? endif ?>

				<? if (!empty($content)) : ?>
					<div class="content col-12 col-lg-8 col-xl-7 col-xxl-5 offset-lg-1 offset-xl-0 offset-xxl-1">
						<?= $content ?>
					</div>
				<? endif; ?>


			</div>
		</div>

</article> <!-- end article -->