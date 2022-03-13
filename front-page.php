<? get_header(); ?>

<div id="content" class="content">

	<main id="main" class="main" role="main">

		<? if (have_posts()) : while (have_posts()) : the_post(); ?>

				<? the_content(); ?>

		<? endwhile;
		endif; ?>

	</main> <!-- end #main -->

</div> <!-- end #content -->

<? get_footer(); ?>