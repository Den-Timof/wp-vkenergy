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

	<div class="row">
		<div class="col-12 col-md-6">
			<div class="images-gallery">
				<div class="row images-full">
					<!-- data-fancybox="gallery-<?php //the_ID(); ?>" -->
					<a  href="<?php the_permalink(); ?>" class="col-12 images-thumbnail-src post-thumbnail">
						<img class="attachment-post-thumbnail" alt="" src="<?php echo get_the_post_thumbnail_url(); ?>">
					</a>
				</div>
				<div class="row d-none d-sm-flex images-previews">
					<?php
						$fields = CFS()->get( 'галерея_изображений' );
						array_splice($fields, 3);
						if( $fields != '' ) {
							foreach ( $fields as $field ) {
						?>
							<div class="images-previews-block col-4">
								<!-- data-fancybox="gallery-<?php // the_ID(); ?>" -->
								<a href="<?php echo $field['изображение_галереи']; ?>">
									<img class="images-thumbnail-src-small" src="<?php	echo $field['изображение_галереи']; ?>" alt="">
								</a>
							</div>
						<?php
							}
						}
					?>
				</div>
			</div>
		</div>
		<div class="col-12 col-md-6">
			<header class="entry-header">
				<a href="<?php the_permalink(); ?>">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</a>
			</header><!-- .entry-header -->

			<div class="entry-content">
				<?php echo excerpt(35); ?>
			</div><!-- .entry-content -->

			<footer class="entry-footer">
				<a href="<?php the_permalink(); ?>">Смотреть полностью</a>
			</footer><!-- .entry-footer -->
		</div>
	</div>





</article><!-- #post-<?php the_ID(); ?> -->