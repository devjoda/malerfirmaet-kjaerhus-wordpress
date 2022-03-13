<?
// The template for displaying all single posts and attachments

get_header();

?>

<div id="content" class="content">
	<main id="main" class="main" role="main">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<? if (have_posts()) : while (have_posts()) : the_post(); ?>

							<? get_template_part('/template-parts/parts/loop', 'single'); ?>

						<? endwhile;
					else : ?>

						<? get_template_part('/template-parts/parts/content', 'missing'); ?>

					<? endif; ?>
				</div>
				<div class="col-md-4">
					<? get_sidebar(); ?>
				</div>
			</div>
		</div>

	</main> <!-- end #main -->

</div> <!-- end #content -->

<? get_footer(); ?>