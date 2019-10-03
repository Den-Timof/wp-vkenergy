<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package energy-wc
 */

?>
<!DOCTYPE html><html <?php language_attributes(); ?>>

	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>

		<?php	//get_template_part( 'template-parts/content', 'modalForm' ); ?>

		<?php get_header(); ?>

		<div class="breadcrumbs-row">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<?php if( function_exists('kama_breadcrumbs') ) kama_breadcrumbs(' /'); ?>
					</div>
				</div>
			</div>
		</div>

		<?php
			$array_post_cat = get_the_category( get_the_ID() );
			foreach( $array_post_cat as $post_cat_elem ) {
		?>
		<div class="single-wrapper _row-<?php echo $post_cat_elem->slug; ?>">
			<div class="container">
				<div class="row">
					<div class="col-12">
	
						<?php
						while ( have_posts() ) :
							the_post();
	
							?>
							
							<?php	if( $post_cat_elem->slug == 'specialnye-akcii' || $post_cat_elem->slug == 'akcija' ) { ?>
								<?php	get_template_part( 'template-parts/content', 'singleStock' ); ?>
							<?php	} else if ( $post_cat_elem->slug == 'primery-nashih-rabot' || $post_cat_elem->slug == 'работа' ) { ?>
								<?php	get_template_part( 'template-parts/content', 'singleExample' ); ?>
							<?php	} else { ?>
								<?php	get_template_part( 'template-parts/content', get_post_type() ); ?>
							<?php	} ?>
							
						<?php
						
						endwhile; // End of the loop.
						?>
	
					</div>
				</div>
			</div>
		</div>

		<?php	if( $post_cat_elem->slug == 'specialnye-akcii' || $post_cat_elem->slug == 'akcija' ) { ?>
			<div class="stock-footer">
				<div class="container-fluid p-0">
					<div class="row">
						<div class="offset-lg-6"></div>
						<div class="col-12 col-lg-6 footer-col _stocks-list">
							<div class="stocks-list-wrap">
								<h1 class="entry-title">Акции и спецпредложения</h1>
								<div class="btn-stocks-all">
									<a class="_blue-feedback-button _dashed" href="<?php echo get_category_link(55); ?>">Смотреть всё</a>
								</div>
								<ul class="other-stock">
									<?php
										$id						=	get_category_by_slug('akcija')->cat_ID;
										$count_items	= 3;
					
										$args = array(
											'cat'							=>	$id,
											'posts_per_page'	=>	$count_items,
											'orderby' => 'rand',
										);
										$recent = new WP_Query( $args );
								
										while( $recent->have_posts() ) {
											$recent->the_post();
										?>
											<li>
												<p><?php the_excerpt(); ?></p>
												<a class=" _blue-feedback-button _dashed" href="<?php the_permalink(); ?>">Узнать больше</a>
											</li>
										<?php
										}
										wp_reset_postdata();
								
									?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php	} ?>

		<?php
			break;
			}
		?>
		
		<?php get_footer(); ?>
		
	</body>

</html>