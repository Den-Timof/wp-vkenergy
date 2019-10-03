<?php
	if ( ! defined( 'ABSPATH' ) ) {
		exit; // Exit if accessed directly
	}

	// Меняем порядок woocommerce_before_single_product_summary
	remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);
	remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20);

	// Меняем порядок woocommerce_single_product_summary
	remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
	remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
	remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
	remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
	remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
	remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
	remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50);

	remove_action('woocommerce_get_sidebar', 'woocommerce_sidebar', 10);

	add_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
	add_action('woocommerce_single_product_summary', 'woocommerce_show_product_sale_flash', 6);
	add_action('woocommerce_single_product_summary', 'woocommerce_show_product_images', 7);
	add_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 8);
	add_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 10);


	add_action('woocommerce_before_single_product_summary', 'vkenergy_single_wrapper_start');
	function vkenergy_single_wrapper_start() {
		?>
			<div class="row">
				<?php get_sidebar('shop'); ?>
				<div class="col-12">
		<?php
	}
	add_action('woocommerce_after_single_product_summary', 'vkenergy_single_wrapper_end');
	function vkenergy_single_wrapper_end() {
		?>
				</div>
			</div>
		<?php
	}

	// remove_action( 'woocommerce_product_thumbnails', 'woocommerce_show_product_thumbnails', 20 );
	// add_action( 'woocommerce_product_thumbnails', 'bbloomer_custom_action', 10 );
	// function bbloomer_custom_action() {
	// 	echo 'TEST';
	// }

	/**
	 * Remove related products output
	 */
	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

?>