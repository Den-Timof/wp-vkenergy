<?php
/**
 * energy-wc functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package energy-wc
 */

if ( ! function_exists( 'energy_wc_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function energy_wc_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on energy-wc, use a find and replace
		 * to change 'energy-wc' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'energy-wc', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'energy-wc' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'energy_wc_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'energy_wc_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function energy_wc_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'energy_wc_content_width', 640 );
}
add_action( 'after_setup_theme', 'energy_wc_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function energy_wc_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'energy-wc' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'energy-wc' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'energy_wc_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function energy_wc_scripts() {

	// another style
	// wp_enqueue_style( 'energy-wc-another-media-style', get_template_directory_uri() . '/strip_another_style-min.css' );

	// Libs - Bootstrap grid
	wp_enqueue_style( 'energy-wc-style-bootstrap-grid', get_template_directory_uri() . '/assets/css/libs/bootstrap-grid.min.css' );

	// Libs - Bootstrap modal
	// wp_enqueue_style( 'energy-wc-style-bootstrap-modal', get_template_directory_uri() . '/assets/css/libs/bootstrap-modal.min.css' );
	// Libs - reset
	// wp_enqueue_style( 'energy-wc-style-reset', get_template_directory_uri() . '/assets/css/libs/reset.min.css' );
	// Libs - cookCodesMenu
	// wp_enqueue_style( 'energy-wc-cookcodesmenu', get_template_directory_uri() . '/assets/css/plugins/cookcodesmenu/cookcodesmenu.min.css' );

	// Libs CSS
	// wp_enqueue_style( 'energy-wc-style-lib', get_template_directory_uri() . '/assets/css/libs-min.css' );

	// Fonts CSS
	// wp_enqueue_style( 'energy-wc-style-fonts', get_template_directory_uri() . '/assets/css/fonts-host.css' );
	
	// FontAwesome CSS
	// wp_enqueue_style('energy-wc-style-fontawesome', 'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
	// wp_enqueue_style( 'energy-wc-style-fontawesome', get_template_directory_uri() . '/assets/css/plugins/fontawesome/font-awesome.min.css' );

	// Style CSS
	// wp_enqueue_style( 'energy-wc-style', get_stylesheet_uri() );
	wp_enqueue_style( 'energy-wc-style', get_template_directory_uri() . '/strip_general_style.min.css' );
	
	// Other-media-style
	// wp_enqueue_style( 'other-media-style', get_template_directory_uri() . '/assets/css/cut-styles/strip_other_style.min.css' );




	// Регистрация нового Jquery CDN
	wp_deregister_script( 'jquery' );
	// wp_register_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js', false, null, true );
	wp_register_script( 'jquery', get_template_directory_uri() . '/assets/js/plugins/jquery/jquery.min.js', false, null, true );
	wp_enqueue_script( 'jquery' );
	// wp_enqueue_script( 'energy-wc-jquery', get_template_directory_uri() . '/assets/js/plugins/jquery/jquery.min.js', array(), '20151215', true );
	
	session_start();
	if(isset($_SESSION['screen_width']) AND isset($_SESSION['screen_height'])){
		
		switch ( true ) {
			case ( $_SESSION['screen_width'] >= 1600 ):
					wp_enqueue_style( 'strip_big_desktop_style', get_template_directory_uri() . '/assets/css/cut-styles/strip_big_desktop_style.min.css' );
					break;
			case ($_SESSION['screen_width'] >= 992 && $_SESSION['screen_width'] < 1200 ):
				wp_enqueue_style( 'strip_small_desktop_style', get_template_directory_uri() . '/assets/css/cut-styles/strip_small_desktop_style.min.css' );
				break;
			case ($_SESSION['screen_width'] >= 576 && $_SESSION['screen_width'] < 992 ):
				wp_enqueue_style( 'strip_tablet_style', get_template_directory_uri() . '/assets/css/cut-styles/strip_tablet_style.min.css' );
				break;
			case ( $_SESSION['screen_width'] < 576 ):
					wp_enqueue_style( 'strip_mobile_style', get_template_directory_uri() . '/assets/css/cut-styles/strip_mobile_style.min.css' );
					break;
		}
	}

	// Strip Styles
	wp_enqueue_script( 'strip-styles-js', get_template_directory_uri() . '/assets/js/strip-styles-cut.js', array(), '20151215', true );

	// jQuery-Mask-Plugin-master JS
	wp_enqueue_script( 'energy-wc-mask-plugin', get_template_directory_uri() . '/assets/js/plugins/jQuery-Mask-Plugin-master/jquery.mask.min.js', array(), '20151215', true );
	
	// Libs - Bootstrap
	// wp_enqueue_script( 'energy-wc-bootstrap', get_template_directory_uri() . '/assets/js/plugins/bootstrap/bootstrap.min.js', array(), '20151215', true );

	// Libs - Arrive
	wp_enqueue_script( 'energy-wc-arrive', get_template_directory_uri() . '/assets/js/plugins/arrive/arrive.min.js', array(), '20151215', true );


	// Libs JS
	// wp_enqueue_script( 'energy-wc-lib', get_template_directory_uri() . '/assets/js/libs-min.js', array(), '20151215', true );

	// CookCodesMenu JS
	// wp_enqueue_script( 'energy-wc-cookcodesmenu', get_template_directory_uri() . '/assets/js/plugins/cookcodesmenu/jquery.cookcodesmenu.js', array(), '20151215', true );

	// Main JS
	wp_enqueue_script( 'energy-wc-main', get_template_directory_uri() . '/assets/js/main-min.js', array(), '20151215', true );

	// CF7 form
	// wp_enqueue_script( 'energy-wc-cf7-scripts', get_template_directory_uri() . '/assets/js/plugins/cf7/scripts.js', array(), '20151215', true );

	// Используется ли шаблон страницы "Контакты"
	// if( is_page_template('templates-post/page-contacts.php') ) {
		// wp_enqueue_script( 'energy-wc-api-yandex-maps-2.1', '//api-maps.yandex.ru/2.1/?lang=ru_RU', array(), '20151215', true );
	// }

	// AJAX contact-form 7
	wp_enqueue_script( 'ajax-cf7', get_template_directory_uri() . '/assets/js/ajax/ajax-cf7-min.js', array(), '20151215', true );
	wp_localize_script('ajax-cf7', 'cf7_ajax', array(
		'url' => admin_url('admin-ajax.php'),
		'nonce' => wp_create_nonce('cf7-nonce')
	));

	// AJAX contact-form 7 (form-2)
	// wp_enqueue_script( 'ajax-cf7-form2', get_template_directory_uri() . '/assets/js/ajax/ajax-cf7-form2-min.js', array(), '20151215', true );
	// wp_localize_script('ajax-cf7-form2', 'cf7_form2_ajax', array(
	// 	'url' => admin_url('admin-ajax.php'),
	// 	'nonce' => wp_create_nonce('cf7-form2-nonce')
	// ));
	
	// AJAX contact-form 7 (form-3)
	wp_enqueue_script( 'ajax-cf7-form3', get_template_directory_uri() . '/assets/js/ajax/ajax-cf7-form3-min.js', array(), '20151215', true );
	wp_localize_script('ajax-cf7-form3', 'cf7_form3_ajax', array(
		'url' => admin_url('admin-ajax.php'),
		'nonce' => wp_create_nonce('cf7-form3-nonce')
	));



	if( is_search() ) {
		// AJAX search-paginate JS
		wp_enqueue_script( 'search-paginate-ajax', get_template_directory_uri() . '/assets/js/ajax/search-paginate-ajax.js', array(), '20151215', true );
	}
	if( is_archive() ) {
		// AJAX archive-paginate-ajax JS
		wp_enqueue_script( 'archive-paginate-ajax', get_template_directory_uri() . '/assets/js/ajax/archive-paginate-ajax.js', array(), '20151215', true );
	}
	if( is_product_category() ) {
		// AJAX product_category_paginate JS
		wp_enqueue_script( 'product_category_paginate-ajax', get_template_directory_uri() . '/assets/js/ajax/product_category_paginate-ajax.js', array(), '20151215', true );
	}
	if( is_page_template('templates-post/page-certificates.php') ) {
		// AJAX btn more JS
		wp_enqueue_script( 'ajax-btn-more', get_template_directory_uri() . '/assets/js/ajax/btn-more-ajax.js', array(), '20151215', true );
		wp_localize_script('ajax-btn-more', 'btn_more_ajax', array(
			'url' => admin_url('admin-ajax.php'),
			'nonce' => wp_create_nonce('btnmore-nonce')
		));
	}

	// AJAX single-sidebar JS
	// wp_enqueue_script( 'single-sidebar-ajax', get_template_directory_uri() . '/assets/js/ajax/single-sidebar-ajax.js', array(), '20151215', true );


	// wp_enqueue_script( 'energy-wc-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	// wp_enqueue_script( 'energy-wc-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'energy_wc_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
	require get_template_directory() . '/woocommerce/includes/wc-functions.php';
	require get_template_directory() . '/woocommerce/includes/wc-functions-remove.php';
	require get_template_directory() . '/woocommerce/includes/wc-functions-archive.php';
	require get_template_directory() . '/woocommerce/includes/wc-functions-cart.php';
	require get_template_directory() . '/woocommerce/includes/wc-functions-order.php';
	require get_template_directory() . '/woocommerce/includes/wc-functions-checkout.php';
	require get_template_directory() . '/woocommerce/includes/wc-functions-single.php';
}


/**
 * Хлебные крошки
 */
require get_template_directory() . '/inc/breadcrumbs2.php';


/**
 * HTML поиска
 */
add_filter( 'get_search_form', 'my_search_form' );
function my_search_form( $form ) {

	$form = '
	<form class="searchform _position" role="search" method="get" action="' . home_url( '/' ) . '" >
		<input class="search-text" placeholder="Поиск продукции" type="text" autocomplete="off" value="' . get_search_query() . '" name="s" id="s" />
		<input class="search-button _position s-search-icon" type="submit" id="searchsubmit" value="" />
	</form>';

	return $form;
}

/*
 * Carbon fields
 */
add_action( 'after_setup_theme', 'crb_load' );
function crb_load() {
    load_template( get_template_directory() . '/inc/carbon-fields/vendor/autoload.php' );
    \Carbon_Fields\Carbon_Fields::boot();
}

add_action( 'carbon_fields_register_fields', 'magiccard_wc_register_custom_fields' );
function magiccard_wc_register_custom_fields() {
	require get_template_directory() . '/inc/custom-fields-option/metabox.php';
	require get_template_directory() . '/inc/custom-fields-option/theme-options.php';
}

/**
 * Ajax.
 */
require get_template_directory() . '/inc/ajax/btn-more-ajax.php';
require get_template_directory() . '/inc/ajax/ajax-cf7.php';
require get_template_directory() . '/inc/ajax/ajax-cf7-form2.php';
require get_template_directory() . '/inc/ajax/ajax-cf7-form3.php';

/**
 * Добавление dashicons
 */
function my_dashicons() {
	wp_enqueue_style( 'dashicons' );
}
add_action( 'wp_enqueue_scripts', 'my_dashicons' );


/**
 * Страница товара. Вкладки.
 */
add_filter('woocommerce_product_tabs','add_tabs');
function add_tabs($tabs){

	$tabs['description'] = array(
		'title'    => __( 'Описание', 'woocommerce' ),
		'priority' => 10,
		'callback' => 'woocommerce_product_description_tab'
	);
	$tabs['product_characteristics'] = array(
		'title'    => 'Характеристики товара',
		'priority' => 20,
		'callback' => 'product_characteristics_tab'
	);
	$tabs['other_products_tab'] = array(
		'title'    => 'Другие товары группы',
		'priority' => 30,
		'callback' => 'other_products_tab'
	);

	// $tabs['product_download_price-list'] = array(
	// 	'title'    => 'Скачать прайс-лист',
	// 	'priority' => 40,
	// 	'callback' => 'product_download_priceList_tab'
	// );

	return $tabs;
};

function woocommerce_product_description_tab() {
	the_content();
	echo '<div class="product-excerpt-wrap">'. CFS()->get( 'alternate_brief_description', $id ) .'</div>';
}

function product_characteristics_tab(){
	global $product;
	$id = $product->get_id();
	echo '<div class="product_characteristics_content">'. CFS()->get( 'product_characteristics', $id ) .'</div>';
}

function other_products_tab(){
	woocommerce_output_related_products();
	if( CFS()->get( 'прайс_лист_товара', $id ) != '' ) {
		echo '<a id="product-tab-price-link" href="' . CFS()->get( 'прайс_лист_товара', $id ) . '" class="d-none vkenergy_button _reverse _fontReg" download>Скачать прайс-лист</a>';
	}
}

// function product_download_priceList_tab(){
// 	global $product;
// 	$id = $product->get_id();
// 	echo '<a id="product-tab-price-link" href="' . CFS()->get( 'прайс-лист_товара', $id ) . '" class="vkenergy_button _reverse _fontReg" download>Скачать прайс-лист</a><a href="https://onfor.info/wp-content/plugins/wordpress-23-related-posts-plugin/static/thumbs/16.jpg" download>Скачать файл</a>';
// }


/**
 * Hide category product count in product archives
 */
add_filter( 'woocommerce_subcategory_count_html', '__return_false' );


//dequeue css from plugins
add_action('wp_print_styles', 'mytheme_dequeue_css_from_plugins', 100);
function mytheme_dequeue_css_from_plugins() {
	wp_deregister_style( "wp-pagenavi" );
	wp_deregister_style( "contact-form-7" );
	wp_deregister_style( "wp-block-library" );
	wp_deregister_style( "energy-wc-woocommerce-style" );
	
	if( !is_product() ) {
		wp_deregister_style( "awooc-styles" );
	}
	
	if( !is_user_logged_in() ) {
		wp_deregister_style( "dashicons" );
	}
}


/**
 * Manage WooCommerce styles and scripts.
 */
function grd_woocommerce_script_cleaner() {

	// wp_dequeue_script( 'wp-embed' );
	// wp_dequeue_script( 'wp-emoji-release' );
	
	// Remove the generator tag
	remove_action( 'wp_head', array( $GLOBALS['woocommerce'], 'generator' ) );
	// Unless we're in the store, remove all the cruft!
	if ( ! is_woocommerce() && ! is_cart() && ! is_checkout() && ! is_product() ) {
		wp_dequeue_style( 'woocommerce' );
		wp_dequeue_style( 'woocommerce_frontend_styles' );
		wp_dequeue_style( 'woocommerce-general');
		wp_dequeue_style( 'woocommerce-layout' );
		wp_dequeue_style( 'woocommerce-smallscreen' );
		wp_dequeue_style( 'woocommerce_fancybox_styles' );
		wp_dequeue_style( 'woocommerce_chosen_styles' );
		wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
		wp_dequeue_script( 'selectWoo' );
		wp_deregister_script( 'selectWoo' );
		wp_dequeue_script( 'wc-add-payment-method' );
		wp_dequeue_script( 'wc-lost-password' );
		wp_dequeue_script( 'wc_price_slider' );
		wp_dequeue_script( 'wc-single-product' );
		wp_dequeue_script( 'wc-add-to-cart' );
		wp_dequeue_script( 'wc-cart-fragments' );
		wp_dequeue_script( 'wc-credit-card-form' );
		wp_dequeue_script( 'wc-checkout' );
		wp_dequeue_script( 'wc-add-to-cart-variation' );
		wp_dequeue_script( 'wc-single-product' );
		wp_dequeue_script( 'wc-cart' );
		wp_dequeue_script( 'wc-chosen' );
		wp_dequeue_script( 'woocommerce' );
		wp_dequeue_script( 'prettyPhoto' );
		wp_dequeue_script( 'prettyPhoto-init' );
		wp_dequeue_script( 'jquery-blockui' );
		wp_dequeue_script( 'jquery-placeholder' );
		wp_dequeue_script( 'jquery-payment' );
		wp_dequeue_script( 'fancybox' );
		wp_dequeue_script( 'jqueryui' );
	}
}
add_action( 'wp_enqueue_scripts', 'grd_woocommerce_script_cleaner', 99 );


/**
 * Set WooCommerce image dimensions upon theme activation
 */
// Remove each style one by one
add_filter( 'woocommerce_enqueue_styles', 'jk_dequeue_styles' );
function jk_dequeue_styles( $enqueue_styles ) {
	unset( $enqueue_styles['woocommerce-general'] );	// Remove the gloss
	unset( $enqueue_styles['woocommerce-layout'] );		// Remove the layout
	unset( $enqueue_styles['woocommerce-smallscreen'] );	// Remove the smallscreen optimisation
	return $enqueue_styles;
}

// Or just remove them all in one line
add_filter( 'woocommerce_enqueue_styles', '__return_false' );


function my_deregister_scripts(){
	wp_deregister_script( 'wp-embed' );
	
	if( !is_product() ) {
		wp_deregister_style( "awooc-script" );
	}
 }
 add_action( 'wp_footer', 'my_deregister_scripts' );

//  add_filter( 'wpcf7_load_js', '__return_false' );
 add_filter( 'wpcf7_load_css', '__return_false' );


/**
 * Disable the emoji's
 */
function disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' ); 
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' ); 
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
	add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
 }
 add_action( 'init', 'disable_emojis' );
 
 /**
	* Filter function used to remove the tinymce emoji plugin.
	* 
	* @param array $plugins 
	* @return array Difference betwen the two arrays
	*/
 function disable_emojis_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
	return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
	return array();
	}
 }
 
 /**
	* Remove emoji CDN hostname from DNS prefetching hints.
	*
	* @param array $urls URLs to print for resource hints.
	* @param string $relation_type The relation type the URLs are printed for.
	* @return array Difference betwen the two arrays.
	*/
 function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
	if ( 'dns-prefetch' == $relation_type ) {
	/** This filter is documented in wp-includes/formatting.php */
	$emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );
 
 $urls = array_diff( $urls, array( $emoji_svg_url ) );
	}
 
 return $urls;
 }

 /**
 * @snippet       WooCommerce Disable Default CSS
 * @how-to        Watch tutorial @ https://businessbloomer.com/?p=19055
 * @sourcecode    https://businessbloomer.com/?p=21041
 * @author        Rodolfo Melogli
 * @testedwith    WooCommerce 2.6.4
 */
 
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

