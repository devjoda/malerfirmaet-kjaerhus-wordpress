<?
// Register isotope script if not already included
if (!wp_script_is('isotope-js')) :
	wp_enqueue_script('isotope-js', 'https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js', array('jquery'), false, false);
endif;


if (!wp_script_is('match-height-js')) :
	wp_enqueue_script('match-height-js', THEME . '/assets/scripts/match-height.js', array('jquery'), false, false);
endif;

if (!wp_script_is('galleri-js')) :
	wp_enqueue_script('galleri-js', THEME . '/assets/scripts/galleri.js', array('jquery'), false, false);
endif;
?>


<? get_header();

// ACF Variables
?>

<div id="content" class="content">

	<main id="main" class="main" role="main">

		<section id="galleri" class="section <?= esc_attr($className); ?>">
			<div class="container-fluid filters">
				<div class="row">
					<div class="filter-group col-12" data-filter-group="type">
						<div class="filter is-checked" data-filter=".privat">
							Privat
						</div>
						<div class="filter" data-filter=".erhverv">
							Erhverv
						</div>
					</div>
				</div>
			</div>
			<div class="container-fluid">
				<div class="projekt-wrapper row">
					<?
					// WP_Query arguments
					$args = array(
						'post_type'      => 'projekter',
						'posts_per_page' => -1,
						'order'          => 'ASC',
						'orderby'        => 'menu_order',
					);

					// The Query
					$query = new WP_Query($args);
					$posts = $query->posts;
					$count = 0;
					foreach ($posts as $post) :
						$overskrift = get_the_title($post->ID) ?: 'Titel';
						$beskrivelse = get_field('projekt_beskrivelse', $post->ID) ?: 'Beskrivelse';
						$galleri = get_field('projekt_billedgalleri', $post->ID);
						$tax_type = get_the_terms($post->ID, 'type');
						$tax_type_navn = $tax_type[0]->name;
						$count++;
					?>

						<? if ($tax_type_navn == 'Privat') : ?>
							<div class="type privat case col-lg-6">
								<a data-fancybox="projekt-<?= $count ?>" href="<?= the_post_thumbnail_url('full') ?>">
									<?= get_the_post_thumbnail($post->ID, 'full'); ?>
									<div class="bottom-container">
										<div class="text">
											<h2><?= $overskrift ?></h2>
											<p> <?= $beskrivelse ?></p>
										</div>
										<div class="svg-container"><?= svg_image('arrow-right') ?></div>
									</div>
								</a>
								<div class="fancybox-image-container">
									<? foreach ($galleri as $billede_url) : ?>
										<img data-fancybox="projekt-<?= $count ?>" src="<?= $billede_url ?>" />
									<? endforeach ?>
								</div>
							</div>
						<? elseif ($tax_type_navn == 'Erhverv') : ?>
							<div class="type erhverv case col-lg-6">
								<a data-fancybox="projekt-<?= $count ?>" href="<?= the_post_thumbnail_url('full') ?>">
									<?= get_the_post_thumbnail($post->ID, 'full'); ?>
									<div class="bottom-container">
										<div class="text">
											<h2><?= $overskrift ?></h2>
											<p> <?= $beskrivelse ?></p>
										</div>
										<div class="svg-container"><?= svg_image('arrow-right') ?></div>
									</div>
								</a>
								<div class="fancybox-image-container">
									<? foreach ($galleri as $billede_url) : ?>
										<img data-fancybox="projekt-<?= $count ?>" src="<?= $billede_url ?>" />
									<? endforeach ?>
								</div>
							</div>
						<? endif; ?>

					<? endforeach; ?>
					<? wp_reset_query(); ?>
				</div>
			</div>
		</section>

	</main> <!-- end #main -->

</div> <!-- end #content -->

<? get_footer(); ?>