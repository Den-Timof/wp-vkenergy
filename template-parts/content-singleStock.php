<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package energy-wc
 */

?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<div class="row">
			<div class="col-12">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</div>
		</div>
	</header>


	<div class="entry-content">
		<div class="row">
			<div class="col-12 col-lg-6">
				<a class="d-flex justify-content-center mb-4" data-fancybox="gallery-<?php the_ID(); ?>" href="<?php echo get_the_post_thumbnail_url(); ?>" class="images-thumbnail-src post-thumbnail">
					<img class="w-100 attachment-post-thumbnail" alt="" src="<?php echo get_the_post_thumbnail_url(); ?>">
				</a>
			</div>
			<div class="col-12 col-lg-6">
				<?php the_content(); ?>
			</div>
		</div>
	</div>

</article><!-- #post-<?php the_ID(); ?> -->

