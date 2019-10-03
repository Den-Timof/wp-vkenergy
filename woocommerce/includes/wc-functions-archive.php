<?php
	if ( ! defined( 'ABSPATH' ) ) {
		exit; // Exit if accessed directly
	}

	/**
	 * Remove the breadcrumbs from woocommerce_before_main_content
	 */
	add_action( 'init', 'woo_remove_wc_breadcrumbs' );
	function woo_remove_wc_breadcrumbs() {
		remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
	}


	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
	remove_action('woocommerce_get_sidebar', 'woocommerce_sidebar', 10);

	
	add_action('woocommerce_before_main_content', 'vkenergy_archive_wrapper_start');
	function vkenergy_archive_wrapper_start() {
		?>
			<?php woocommerce_breadcrumb(); ?>
			<div class="row">
				<?php get_sidebar('shop'); ?>
				<div class="col-12 col-md-8 catalog-wrapper">
		<?php
	}
	add_action('woocommerce_after_main_content', 'vkenergy_archive_wrapper_end');
	function vkenergy_archive_wrapper_end() {
		?>
				</div>
			</div>
		<?php
	}

	add_action( 'woocommerce_after_shop_loop_item_title', 'bbloomer_custom_action', 15 );
	function bbloomer_custom_action() {
		?><span class="shop_loop_item_btn vkenergy_button _reverse">Подробнее</span><?php
	}



?>