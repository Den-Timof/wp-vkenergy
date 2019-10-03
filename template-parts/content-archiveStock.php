<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package energy-wc
 */

?>


<article class="row" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="col-12 col-md-6">
		<a href="<?php the_permalink(); ?>" class="images-thumbnail-src post-thumbnail">
			<img class="attachment-post-thumbnail" alt="" src="<?php echo get_the_post_thumbnail_url(); ?>">
		</a>
	</div>
	<div class="col-12 col-md-6">
		<header class="entry-header">
			<a href="<?php the_permalink(); ?>">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</a>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php
			the_excerpt( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'energy-wc' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'energy-wc' ),
				'after'  => '</div>',
			) );
			?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<a href="<?php the_permalink(); ?>">Подробнее</a>
		</footer><!-- .entry-footer -->
	</div>

</article><!-- #post-<?php the_ID(); ?> -->