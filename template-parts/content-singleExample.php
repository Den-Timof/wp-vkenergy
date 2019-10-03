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
			<div class="col-12">
				<?php the_content(); ?>
			</div>
		</div>
	</div>
	<div class="entry-gallery">
		<div class="row">
			<?php
				$fields = CFS()->get( 'галерея_изображений' );
				if( $fields != '' ) {
					foreach ( $fields as $field ) {
				?>
					<div class="col-12 col-sm-6 col-lg-4">
						<a class="gallery-block" data-fancybox="gallery-<?php the_ID(); ?>" href="<?php echo $field['изображение_галереи']; ?>">
							<img class="images-thumbnail-src-small" src="<?php	echo $field['изображение_галереи']; ?>" alt="">
						</a>
					</div>
				<?php
					}
				}
			?>
		</div>
	</div>
	<footer class="entry-footer">
		<div class="row">
			<div class="col-12 col-md-6">
				<ul class="other-posts">
					<strong>Смотрите также:</strong>
					<?php
						
						$id						=	get_category_by_slug('rabota')->cat_ID;
						$count_items	= 3;
						$paged				= get_query_var( 'paged', 1 );

						$args = array(
							'cat'							=>	$id,
							'posts_per_page'	=>	$count_items,
							'orderby' => 'rand',
						);
						$recent = new WP_Query( $args );
				
						while( $recent->have_posts() ) {
							$recent->the_post();
						?>
							<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
						<?php
						}
						wp_reset_postdata();
				
					?>
				</ul>
			</div>
			<div class="col-12 col-md-6 entry-footer-col _button">
				<button class="btn-calculation vkenergy_button _reverse _general _fontReg" type="button" data-toggle="modal" data-target=".modal-manager-3">Заказать расчёт стоимости</button>
			</div>
		</div>
	</footer>

</article><!-- #post-<?php the_ID(); ?> -->
