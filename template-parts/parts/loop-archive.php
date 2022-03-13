<?
// Template part for displaying posts
// Used for single, index, archive, search.
?>

<article id="post-<? the_ID(); ?>" <? post_class(''); ?> role="article">

	<header class="article-header">
		<h2><a href="<? the_permalink() ?>" rel="bookmark" title="<? the_title_attribute(); ?>"><? the_title(); ?></a></h2>
	</header>
	<!-- end article header -->

	<section class="entry-content" itemprop="text">
		<a href="<? the_permalink() ?>"><? the_post_thumbnail('full'); ?></a>
		<? the_excerpt(); ?>
	</section>
	<!-- end article section -->

	<footer class="article-footer">
		<p class="tags"><? the_tags('<span class="tags-title">' . __('Tags:', 'superegowp') . '</span> ', ', ', ''); ?></p>
	</footer>
	<!-- end article footer -->

</article> <!-- end article -->