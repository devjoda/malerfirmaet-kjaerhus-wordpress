<?
// Register isotope script if not already included
if (!wp_script_is('isotope-js')) :
	wp_enqueue_script('isotope-js', 'https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js', array('jquery'), false, false);
endif;

// Register Swiper if not already included
if (!wp_script_is('swiper-js')) :
	wp_enqueue_script('swiper-js', THEME . '/assets/scripts/vendors/swiper-bundle.min.js', array('jquery'), false, false);
	wp_enqueue_style('swiper-style', THEME . '/assets/styles/vendors/swiper-bundle.min.css');
endif;

if (!wp_script_is('wall-of-fame-js')) :
	wp_enqueue_script('wall-of-fame-js', THEME . '/assets/scripts/wall-of-fame.js', array('jquery'), false, false);
endif;
?>


<? get_header();

// ACF Variables
?>

<div id="content" class="content">

	<main id="main" class="main" role="main">
		<section id="wall-of-fame" class="section <?= esc_attr($className); ?>">
			<div class="container-fluid inner">

				<div class="row swiper-container swiper-slider">
					<div class="swiper-wrapper">

						<?
						// WP_Query arguments
						$args = array(
							'post_type'      => 'wall_of_fame',
							'posts_per_page' => -1,
							'order'          => 'ASC',
							'orderby'        => 'menu_order',
						);

						// The Query
						$query = new WP_Query($args);
						$posts = $query->posts;
						foreach ($posts as $post) :
							$overskrift = get_the_title($post->ID) ?: 'Titel';
						?>
							<? if (has_post_thumbnail()) : ?>
								<div data-aos="fade-up" class="swiper-slide">
									<div class="swiper-slide-inner">
										<div class="image-wrapper"><a data-caption="<?= $overskrift ?>" data-fancybox="wall-of-fame-gallery-top" href="<?= the_post_thumbnail_url('full') ?>"><?= the_post_thumbnail('large'); ?></a></div>
										<div class="social-wrapper">
											<div class="social"><a class="pinterest" data-pin-do="buttonPin" data-pin-tall="true" data-pin-round="true" href="https://www.pinterest.com/pin/create/button/?url=<?= get_permalink(get_the_ID()); ?>&media=<? the_post_thumbnail_url('full'); ?>&description=<? the_title(); ?>"><?= svg_image('pinterest-wof') ?></a></div>
											<div class="social"><a download href="<?= the_post_thumbnail_url('full'); ?>"><?= svg_image('download-wof') ?></a></div>
										</div>
									</div>
								</div>
							<? endif; ?>
						<? endforeach; ?>
						<? wp_reset_query(); ?>
					</div>
					<div class="swiper-navigation-wrapper">
						<div class="swiper-navigation">
							<div class="swiper-button-prev-wof-slide"><?= svg_image('arrow-left') ?></div>
							<div class="swiper-button-next-wof-slide"><?= svg_image('arrow-right') ?></div>
						</div>
					</div>
				</div>
				<div class="row wof-grid">
					<?
					// WP_Query arguments
					$args = array(
						'post_type'      => 'wall_of_fame',
						'posts_per_page' => -1,
						'order'          => 'ASC',
						'orderby'        => 'menu_order',
					);

					// The Query
					$query = new WP_Query($args);
					$posts = $query->posts;
					foreach ($posts as $post) :
						$overskrift = get_the_title($post->ID) ?: 'Titel';
					?>
						<? if (has_post_thumbnail()) : ?>
							<div class="wof-grid-item">
								<a data-caption="<?= $overskrift ?>" data-fancybox="wall-of-fame-gallery-bottom" href="<?= the_post_thumbnail_url('full'); ?>">
									<?= the_post_thumbnail('large'); ?>
								</a>
								<div class="social-wrapper">
									<div class="social"><a class="pinterest" data-pin-do="buttonPin" data-pin-tall="true" data-pin-round="true" href="https://www.pinterest.com/pin/create/button/?url=<?= get_permalink(get_the_ID()); ?>&media=<? the_post_thumbnail_url('full'); ?>&description=<? the_title(); ?>"><?= svg_image('pinterest-wof') ?></a></div>
									<div class="social"><a download href="<?= the_post_thumbnail_url('full'); ?>"><?= svg_image('download-wof') ?></a></div>
								</div>
							</div>
						<? endif; ?>
					<? endforeach; ?>
					<? wp_reset_query(); ?>
				</div>
		</section>

	</main> <!-- end #main -->

</div> <!-- end #content -->

<? get_footer(); ?>