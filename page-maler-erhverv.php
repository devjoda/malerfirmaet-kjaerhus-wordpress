<? 
if (!wp_script_is('match-height-js')) :
	wp_enqueue_script('match-height-js', THEME . '/assets/scripts/match-height.js', array('jquery'), false, false);
endif;


get_header();
?>

<div id="content" class="content">

	<main id="main" class="main" role="main">

		<? if (have_posts()) : while (have_posts()) : the_post(); ?>

				<? get_template_part('/template-parts/parts/loop', 'page'); ?>

				<section class="relaterede-projekter">
					<div class="container-fluid">
						<div class="projekt-wrapper row">
							<?
							// WP_Query arguments
							$args = array(
								'post_type'      => 'projekter',
								'posts_per_page' => -1,
								'order'          => 'DESC',
								'orderby'        => 'id',
							);
							// The Query
							$query = new WP_Query($args);
							$posts = $query->posts;
							$i = 0;
							$count = 0;
							foreach ($posts as $post) :
								$overskrift = get_the_title($post->ID) ?: 'Titel';
								$beskrivelse = get_field('projekt_beskrivelse', $post->ID) ?: 'Beskrivelse';
								$galleri = get_field('projekt_billedgalleri', $post->ID);
								$tax_type = get_the_terms($post->ID, 'type');
								$tax_type_navn = $tax_type[0]->name;
								$i++;
							?>
							<? if ($i === 1) : ?> 
								<div class="seperator"></div>
								<h3>Relaterede projekter</h3>
							<? endif ?>
								<? if (($tax_type_navn == 'Erhverv') && ($count < 2)) : ?>
									<? $count++ ?>
									<div class="type erhverv case col-lg-6">
										<a data-fancybox="projekt-erhverv-<?= $i ?>" href="<?= the_post_thumbnail_url('full') ?>">
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
												<img data-fancybox="projekt-erhverv-<?= $i ?>" src="<?= $billede_url ?>" />
											<? endforeach ?>
										</div>
									</div>
								<? endif; ?>
							<? endforeach; ?>
							<? wp_reset_query(); ?>
						</div>
					</div>
				</section>
		<? endwhile;
		endif; ?>

	</main> <!-- end #main -->

</div> <!-- end #content -->

<? get_footer(); ?>