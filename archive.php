<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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

	<div class="container">
		<div class="row">
			<div class="col-12">
				<?php if( function_exists('kama_breadcrumbs') ) kama_breadcrumbs(' /'); ?>
			</div>
		</div>
	</div>
	<div class="archive-body-container">

		<div class="container">
			<div class="row">
				<div class="col-12">
					<!-- <header class="page-header">
							<?php
								// the_archive_title( '<h1 class="page-title">', '</h1>' );
								// the_archive_description( '<div class="archive-description">', '</div>' );
							?>
					</header> -->
					<header class="entry-header">
						<h1 class="entry-title page-title">
							<?php wp_title(''); ?>
						</h1>
					</header><!-- .entry-header -->
				</div>
			</div>
		</div>

		<?php $cat_name = get_query_var('category_name'); ?>
		<div class="archive-wrapper _row-<?php echo $cat_name ?>">
			<?php if ( have_posts() ) : ?>


				<?php
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					/*
					* Include the Post-Type-specific template for the content.
					* If you want to override this in a child theme, then include a file
					* called content-___.php (where ___ is the Post Type name) and that will be used instead.
					*/
					?>
						
						<div class="archive-row">
							<div class="container">
								<div class="row">
									<div class="col-12">
										<?php	if( $cat_name == 'specialnye-akcii' ) { ?>
											<?php	get_template_part( 'template-parts/content', 'archiveStock' ); ?>
										<?php	} else if ( $cat_name == 'primery-nashih-rabot' ) { ?>
											<?php	get_template_part( 'template-parts/content', 'archiveExample' ); ?>
										<?php	} else { ?>
											<?php	get_template_part( 'template-parts/content', get_post_type() ); ?>
										<?php	} ?>
									</div>
								</div>
							</div>
						</div>
					<?php

				endwhile;

				?>
				<div class="pagination-row">
					<div class="container">
						<div class="row">
							<div class="col-12 paginate-col">
								<?php
									if( function_exists('wp_pagenavi') ) {
										wp_pagenavi();
									} else {
										the_posts_navigation();
									}
								?>
							</div>
						</div>
					</div>
				</div>

				<?php

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif;
			?>
		
		</div>

	</div>
		
		<?php get_footer(); ?>
		
	</body>

</html>