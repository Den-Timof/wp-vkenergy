<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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

		<div class="container search-result-container">
			<div class="row search-row-container">
				<div class="col-12 search-col-container">

					<?php 
						global $product;
						$args = array_merge( $wp_query->query, array( 
							'post_type'				=> "product",
							'post_status'			=> 'publish',
							'posts_per_page'	=>	4
						));
						query_posts($args);
					?>

					<?php if ( have_posts() ) : ?>

						<header class="page-header">
							<div class="page-title">
								<h2 class="entry-title">
									<?php
									/* translators: %s: search query. */
									printf( esc_html__( 'Результаты поиска по запросу: %s', 'energy-wc' ), '<span>' . get_search_query() . '</span>' );
									?>
								</h2>
							</div>
						</header><!-- .page-header -->

						<div class="row">
						

						<?php
						/* Start the Loop */
						while ( have_posts() ) :
							the_post();

							/**
							 * Run the loop for the search to output the results.
							 * If you want to overload this in a child theme then include a file
							 * called content-search.php and that will be used instead.
							 */
							get_template_part( 'template-parts/content', 'search' );

						endwhile;
						
						?>
							<div class="col-12 pagination-row">
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
							</div>
						<?php

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif;
					?>

				</div>
			</div>
		</div>
		
		<?php get_footer(); ?>
		
	</body>

</html>
