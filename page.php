<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
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

						<?php
							while ( have_posts() ) :
								the_post();

								get_template_part( 'template-parts/content', 'page' );

								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;

							endwhile; // End of the loop.
						?>

				</div>
			</div>
		</div>

		<?php get_footer(); ?>

	</body>
</html>