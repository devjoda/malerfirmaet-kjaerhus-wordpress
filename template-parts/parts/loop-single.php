<?
// Template part for displaying a single post
global $post;
?>

<article id="post-<? the_ID(); ?>" <? post_class(''); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

	<header class="article-header">

	</header> <!-- end article header -->

	<section class="entry-content" itemprop="text">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1 class="entry-title single-title" itemprop="headline"><? the_title(); ?></h1>
					<? the_content(); ?>
				</div>
			</div>
		</div>
		<? the_post_thumbnail('full'); ?>

	</section> <!-- end article section -->

	<footer class="article-footer">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<? comments_template(); ?>
					<? wp_link_pages(array('before' => '<div class="page-links">' . esc_html__('Pages:', 'superegowp'), 'after'  => '</div>')); ?>
					<p class="tags"><? the_tags('<span class="tags-title">' . __('Tags:', 'superegowp') . '</span> ', ', ', ''); ?></p>
				</div>
			</div>
		</div>
	</footer> <!-- end article footer -->



</article> <!-- end article -->