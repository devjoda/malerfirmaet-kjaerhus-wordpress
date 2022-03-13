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

		<? endwhile;
		endif; ?>

		<section class="kontakt-formular">
			<div class="container-fluid">
				<div class="row">
					<div class="col-12 col-lg-7 col-xxl-5 offset-lg-3 offset-xxl-3">
						<h3>Kontakt os</h3>
						<?= FrmFormsController::get_form_shortcode(array('id' => 2, 'title' => false, 'description' => false)); ?>
					</div>
				</div>
			</div>
		</section>

	</main> <!-- end #main -->

</div> <!-- end #content -->

<? get_footer(); ?>