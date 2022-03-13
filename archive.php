<?

/**
 * Displays archive pages if a speicifc template is not set.
 *
 * For more info: https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

get_header(); ?>

<div class="content">

	<div class="inner-content grid-x grid-margin-x grid-padding-x">

		<main class="main small-12 medium-8 large-8 cell" role="main">

			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<header>
							<h1 class="page-title"><? the_archive_title(); ?></h1>
							<? the_archive_description('<div class="taxonomy-description">', '</div>'); ?>
						</header>
					</div>
				</div>
				<div class="row">
					<div class="col-md-8">
						<? if (have_posts()) : while (have_posts()) : the_post(); ?>

								<? get_template_part('/template-parts/parts/loop', 'archive'); ?>

							<? endwhile; ?>

							<? superego_page_navi(); ?>

						<? else : ?>

							<? get_template_part('/template-parts/parts/content', 'missing'); ?>

						<? endif; ?>
					</div>
					<div class="col-md-4">
						<? get_sidebar(); ?>
					</div>
				</div>
			</div>

		</main> <!-- end #main -->

	</div> <!-- end #inner-content -->

</div> <!-- end #content -->

<? get_footer(); ?>