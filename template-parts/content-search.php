<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package energy-wc
 */

?>

<div class="col-12 col-sm-6 col-lg-3 result-block">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="project-anons-block">
			<div class="project-title">
					<?php the_title(); ?>
			</div>
			<div class="project-date">
					<?php echo get_the_date( 'd F Y' ) . ' года'; ?>
			</div>
			<div class="project-thumb">
					<?php the_post_thumbnail(); ?>
			</div>
			<div class="project-content">
					<?php echo excerpt(35); ?>
			</div>
			<div class="project-link __blue-link"><a class="__blue-link _blue-feedback-button _dashed" href=" <?php the_permalink(); ?>">Подробнее</a></div>
			<div class="clear"></div>
		</div>
	</article><!-- #post-<?php the_ID(); ?> -->
</div>
