<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
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

					<section class="error-404 not-found">
						<header class="page-header">
							<div class="page-title">
								<h1 class="entry-title">
									<?php esc_html_e( 'Страница не может быть найдена', 'energy-wc' ); ?>
								</h1>
							</div>
						</header><!-- .page-header -->

						<div class="page-content">
							<p class="woocommerce-info">
								<?php esc_html_e( 'Извините, но ничего не соответствует вашим условиям поиска. Пожалуйста, введите другой адрес', 'energy-wc' ); ?>
							</p>
						</div><!-- .page-content -->
					</section><!-- .error-404 -->

				</div>
			</div>
		</div>
		
		<?php get_footer(); ?>
		
	</body>

</html>
