/**
 * Высота под пунктов меню
 */
// function heightMenuItem() {
// 	var elem_height;
// 	$('.menu-fixed-menu-container .menu > .menu-item a').mouseover(function(i,e) {
// 		var elem = $(this); 
// 		elem.css('transition', 'none');
// 	});
// 	$('.menu-fixed-menu-container .menu > .menu-item a').mouseout(function(i,e) {
// 		var elem = $(this);
// 		elem.attr('style', 'transition: none !important;');
// 	});
// }
// heightMenuItem();


// /**
//  * Mobile menu. Горизонтальная ориентация смартфона.
//  */
// function name() {
// 	console.log('initial function name');
	
// 	// if( document.body.clientWidth <= 991 ) {
// 		$('.cookcodesmenu_btn').click(function() {
// 			if( $('.cookcodesmenu_nav').hasClass('cookcodesmenu_hidden') != 1 ) {
// 				console.log('cookcodesmenu_hidden none');
// 			}
// 			console.log('cookcodesmenu_hidden have');
// 		});
// 	// };
// }
// name();



/**
 * Mobile menu
 */
let cookcodesmenu_init = 0;
function initCookCodesMenu() {
	if( document.body.clientWidth <= 991 ) {

		let link_cookcodesmenu		= $('head link#energy-wc-cookcodesmenu-css');
		let site_logotype_carbon	= $('#site_logotype_carbon').val(),
		site_logotype_carbon_2 		= $('#site_logotype_2_carbon').val();
		hidden_home_url = $('#hidden_home_url').val();

		if( ++cookcodesmenu_init == true ) {
			$.getScript( hidden_home_url + '/wp-content/themes/energy-wc/assets/js/plugins/cookcodesmenu/jquery.cookcodesmenu.js', function() {
				if( link_cookcodesmenu.length == 0 ) {
					let style_cookcodesmenu	= document.createElement('link');
					style_cookcodesmenu.id		= 'energy-wc-cookcodesmenu-css';
					style_cookcodesmenu.rel = 'stylesheet';
					style_cookcodesmenu.type = 'text/css';
					style_cookcodesmenu.href	= hidden_home_url + '/wp-content/themes/energy-wc/assets/css/plugins/cookcodesmenu/cookcodesmenu.min.css';
					document.head.appendChild(style_cookcodesmenu);
				}
				
				$('#cookmenu #menu-fixed-menu-1').cookcodesmenu({
					brand: '<div class="logotype _position header__logotype"><a class="custom-logo-link" href="'+hidden_home_url+'" rel="home" itemprop="url"><img class="custom-logo _2" src="'+site_logotype_carbon_2+'" alt="Энергия" itemprop="logo"><img class="custom-logo _1" src="'+site_logotype_carbon+'" alt=""></a></div>',
					label: ''
				});
				if( $('.navbar-nav').hasClass('menuHidden') == 0 ) {
					$('.navbar-nav #menu-fixed-menu-1').addClass('menuHidden');
				}

				// console.log('mobile menu init');
			});
		}
	
		setTimeout(function(){
			$('.cookcodesmenu-bar').fadeTo(500, 1);
			$('.sticky-row').fadeTo(500, 1);
		},1000);
		
	}
}
initCookCodesMenu();

/**
 * Прыжок формы поиска по документу
 */
var count = 0;
function searchAnimation() {
	// $('.sticky-row.__mobile .switch-icon').click(function() {
	// 	$(this).toggleClass('__active');
	// 	$(this).siblings('.search-form').find('form').toggleClass('__active');
	// });

	let directory_url = $('input#hidden_directory_url').val();
	// console.log('works');
	
	if( document.body.clientWidth > 991 ) {
		if( $('.search-form-wrap').find('.search-form').length == 0 ) {
			// console.log('1 - ' +  document.body.clientWidth );
			$('.search-form-wrap').prepend( $('.search-form') );
			$('.cookcodesmenu_brand').siblings('.form-mobile').remove();
		}
	} else if( (document.body.clientWidth > 576) && (document.body.clientWidth <= 991.98) ) {
		if( $('.cookcodesmenu_brand').siblings('.form-mobile').length == 0 ) {
			// console.log('2 - ' + document.body.clientWidth );
			function mobile_menu_576_992(params) {
				$('.cookcodesmenu_brand').after( $('.search-form') );
				$('.cookcodesmenu_menu .search-form').wrap('<div class="form-mobile d-sm-flex"></div>');
				$('.cookcodesmenu_menu .form-mobile').append('\
					<button class="switch-icon">\
						<img class="icon-search" src="'+directory_url+'/assets/images/icons8-search-50.png" alt=""/>\
						<img class="icon-delete" src="'+directory_url+'/assets/images/icons8-delete-24.png " alt=""/>\
					</button>\
				');
		
				$('.sticky-row.__mobile .switch-icon').click(function() {
					$(this).toggleClass('__active');
					$(this).siblings('.search-form').find('form').toggleClass('__active');
				});
			}

			if( ++count == true ) {
				$(document).arrive(".cookcodesmenu_brand", function() {
					mobile_menu_576_992();
				});
			} else {
				mobile_menu_576_992();
			}
		}
	} else {
		if( $('.cookcodesmenu_nav').find('.search-form').length == 0 ) {
			// console.log( '3 - ' + document.body.clientWidth );
			function mobile_menu_575(params) {
				$('.cookcodesmenu_nav').prepend( $('.search-form') );
				$('.cookcodesmenu_brand').siblings('.form-mobile').remove();
			}

			if( ++count == true ) {
				$(document).arrive(".cookcodesmenu_brand", function() {
					mobile_menu_575();
				});
			} else {
				mobile_menu_575();
			}
		}
	}
}
searchAnimation();

/**
 * Ресайз мобильного меню
 */
$(window).resize(function() { 
	initCookCodesMenu(); 
	searchAnimation();
});


/**
 * "Общие". Настройка атрибутов у телефона (tel:+) и электронной почты (mailto:)
 */
$(document).ready(function() {
	$('a[href="tel:+"]').each(function (i, e) {
		var element = $(e).html().replace(/\D+/g, "");
		$(this).attr('href', 'tel:+' + element);
	});
	$('a[href="mailto:"]').each(function (i, e) {
		var element = $(e).html();
		$(this).attr('href', 'mailto:' + element);
	});
});
//


/**
 * Примеры наших работ. Настройка сетки блоков в архиве
 */
$(document).ready(function() {
	
	$('.archive-wrapper._row-primery-nashih-rabot article .row').each(function(i,e) {
		if( (i % 2) != 0 ) {
			$(e).css({
				'flex-direction' : 'row-reverse',
			})
		}
	});
});

/**
 * Примеры наших работ. Настройка лайтбокса
 */
$(document).ready(function () {
	$('.images-previews-block a').click(function (e) {
		e.preventDefault();
		
		var largeImage = $(this).attr('href');
		$(this)
			.parent('.images-previews-block')
			.parent('.images-previews')
			.find('a')
			.removeClass('selected');


		$(this).addClass('selected');
		
		var fullImage = $(this)
			.parent('.images-previews-block')
			.parent('.images-previews')
			.siblings('.images-full')
			.find('img');

		fullImage.hide();
		fullImage.attr('src', largeImage);
		// fullImage.parent('a').attr('href', largeImage);
		fullImage.fadeIn();

	}); 

}); 


/**
 * Контент записи. Скачивание документа
 * Вариант 1.
 */
$(document).ready(function () {

	// var formatFiles = $('#format-download-files'),
	// 		array_formatFiles = $('#format-download-files').val().split(','),
	// 		formatFiles_list = formatFiles.siblings('ul');

	// for (let index = 0; index < array_formatFiles.length; index++) {
	// 	let element = array_formatFiles[index];
	// 	array_formatFiles[index] = element.trim();
	// 	formatFiles_list.append('<li>' + array_formatFiles[index] + '</li>');
	// }

	// console.log( array_formatFiles );
});

/**
 * Контент записи. Скачивание документа
 * Вариант 2.
 */
// setAttrDownloadToContent();
function setAttrDownloadToContent() {
	
	let arr_formatFiles = [
		'.pdf',
		'.doc',
		'.docx',
		'.txt',
	];

	let arr_content_links = $('.content-block a')
	
	for (let index_links = 0; index_links < arr_content_links.length; index_links++) {
		let element = arr_content_links[index_links];
		const element_link = arr_content_links[index_links].getAttribute('href');
		
		
		for (let index_format = 0; index_format < arr_formatFiles.length; index_format++) {
			const element_format = arr_formatFiles[index_format];
			
			if(element_link.indexOf( element_format ) != -1) {
				// console.log( element_link );
				element.setAttribute('download', 'download')
			}
		}
	}
}

/**
 * Страница товара. Галерея изображений
 */
function wrapGalleryImageSinglePage() {

	if( $('.woocommerce-page.single-product').length > 0 ) {
		
		$('.product > .row > .col-12').prepend('<div class="product-wrapper row"></div>');
		$('.product > .row > .col-12').prepend( $('.product_title') );

		$('.summary').wrap('<div class="col-sm-6 col-lg-5 summary-wrap"></div>');

		$('.product-wrapper').append( $('.summary-wrap') );
		$('.product-wrapper').append( '<div class="woocommerce-description col-sm-6 col-lg-7"></div>' );

		$('.woocommerce-description').append( $('.product-excerpt-wrap') );
		$('.woocommerce-description .product-excerpt-wrap').append( $('#product_excerpt') );


		$('.woocommerce-description').append('<div class="cart-wrap"></div>');
		$('.woocommerce-description .cart-wrap').append( $('.cart') );
		$('.woocommerce-description .cart-wrap').append('<button class="vkenergy_button _gray type="button" data-toggle="modal" data-target=".modal-manager-1"">Получить консультацию</button>');

		$('.related.products > h2').remove();
	}

}
wrapGalleryImageSinglePage();


/**
 * Форма. Клик по чекбоксу
 */
function addEventCheckbox() {
	$('.checkbox .wpcf7-list-item-label').unbind('click').click(function(e) {
		
		$(this).parent('label').toggleClass('active');
		
		let inp_submit = $(this)
			.parent('label')
			.parent('.wpcf7-list-item')
			.parent('.wpcf7-acceptance')
			.parent('.wpcf7-form-control-wrap')
			.parent('.checkbox')
			.parent('.wpcf7-form')
			.find('.wpcf7-submit');
		
		inp_submit.parent('.class').toggleClass('_not-disabled');

		// inp_submit.data( 'onclick', inp_submit.onclick );

		// inp_submit.onclick = function(event) {
		// 	if( $(this) ) {

		// 	}
		// }

		// inp_submit.removeAttr('disabled');
		// console.log( inp_submit.disabled );
		// inp_submit.disabled = false;
		// console.log( inp_submit );
		// console.log( inp_submit.disabled );

		// if( inp_submit.attr('disabled') ) {
		// 	return false;
		// }
		

		// if( !inp_submit.prop('disabled') == 0 ) {
		// 	inp_submit.removeAttr('disabled');
		// 	console.log( inp_submit.prop('disabled') );
		// } else {
		// 	inp_submit.attr('disabled', '');
		// 	console.log( inp_submit.prop('disabled') );
		// }

		

	});
}
// addEventCheckbox();

/**
 * Форма. Маска телефона
 */
function addMaskToFormInput() {
	$('.phone-mask').mask('+7 (000) 000-00-00', { placeholder: "+7 (XXX) XXX-XX-XX" });
	$('.email-mask').mask("A", {
		translation: {
			"A": { pattern: /[\w@\-.+]/, recursive: true }
		}
	});
}


/**
 * Форма. Кнопка "обзор" файла
 */
function setFileBtn() {

	var if_blockPage = $('.blockPage').length > 0;
	var if_modal		 = $('.modal').length > 0;

	if( if_blockPage ) {
		var file_input		= $('.blockPage .wpcf7-file');
	} else if( if_modal ) {
		var file_input		= $('.modal .wpcf7-file');
	}
	
	var file_wrapper	= file_input.parent('.wpcf7-form-control-wrap');
			
	file_wrapper.addClass('file_upload');

	if( file_wrapper.find('.btn-label-text').length == 0 ) {
		file_wrapper.prepend('<div class="btn-label-text"></div>');
	}
	if( file_wrapper.find('button').length == 0 ) {
		file_wrapper.prepend('<button type="button">Прикрепить файл</button>');
	}

	file_wrapper.find('input[type="file"]');
	file_input.mouseover(function() {
		file_btn.css('border-bottom', '1px dashed rgba(26, 58, 146, 255)');
	});
	file_input.mouseout(function() {
		file_btn.css('border-bottom', '1px dashed #fafafa');
	});

	
	if( if_blockPage ) {
		var wrapper = $( ".blockPage .file_upload" );
	} else if( if_modal ) {
		var wrapper = $( ".modal .file_upload" );
	}
	
	var inp 		= wrapper.find( "input" ),
			btn 		= wrapper.find( "button" ),
			lbl 		= wrapper.find( "div" );
	
	btn.focus(function(){
			inp.focus()
	});
	
	// Crutches for the :focus style:
	inp.focus(function(){
		wrapper.addClass( "focus" );
	}).blur(function(){
		wrapper.removeClass( "focus" );
	});

	var file_api = ( window.File && window.FileReader && window.FileList && window.Blob ) ? true : false;

	inp.off().change(function() {
		var file_name;
		if( file_api && inp[ 0 ].files[ 0 ] )
			file_name = inp[ 0 ].files[ 0 ].name;
		else
			file_name = inp.val().replace( "C:\\fakepath\\", '' );

		// console.log( 'file_name - ' + file_name );
		

		if( ! file_name.length )
			return;

		if( lbl.is( ":visible" ) ) {
			lbl.text( file_name );
			btn.text( "Прикрепить файл" );
		} else
			btn.text( file_name );

	}).change();

	$( window ).resize(function() {
		if( if_blockPage ) {
			$( ".blockPage .file_upload input" ).triggerHandler( "change" );
		} else if( if_modal ) {
			$( ".modal .file_upload input" ).triggerHandler( "change" );
		}
	});

	var file_btn = file_wrapper.find('button'),
			file_btn_text = file_btn.text(),
			file_btn_label = file_wrapper.find('.btn-label-text'),
			file_btn_label_text = file_btn_label.text();

	// console.log( file_btn_text );
	// console.log(  );

	if( file_btn_text.indexOf('Прикрепить файл') == -1 ) {
		file_btn_label.text( file_btn_text );
		file_btn.text( 'Прикрепить файл' );
	}

}

$(document).arrive(".wpcf7", function() {
	var $newElem = $(this);
	
	setFileBtn();
	addMaskToFormInput();
	addEventCheckbox();

	$('.wpcf7-submit').parent('p').addClass('class form-submit-wrapeer _not-disabled');
	
});


/**
 * Появление предупреждения для старых браузеров
 */
// $(document).arrive(".advanced-browser-check", function() {
// 	$('body').css('overflow', 'hidden');
// });

/**
 * blogPage
 */
$(document).arrive(".blockPage", function() {	
	$('.blockPage .awooc-custom-order-wrap').prepend( $('.blockPage .awwoc-close') );
	// $('.blockPage').css('padding-right', '17px');
});
// $(document).leave(".blockPage", function() {	
// 	$('.blockPage').css('padding-right', '0');
// });

/**
 * Форма. Сброс
 */
function eventClickResetForm() {
	$('button[data-toggle="modal"]').click(function(){
		$('.modal form').trigger('reset');
		$('.modal form .file_upload .btn-label-text').text('');
		$('.modal form .file_upload button').text('Прикрепить файл');
		$('.modal form input[type="submit"]').prop('disabled', true);
		$('.checkbox label').removeClass('active');
	});
}
eventClickResetForm();


/**
 * Появление iframe в видимой области экрана
 * @param {*} tag 
 */
function isVisible(tag) {

	if( $('#map').length > 0 ) {

		var t = $(tag);
		var w = $(window);
		var wt = w.scrollTop();
		var tt = t.offset().top;
		var tb = tt + t.height();

		return ((tb <= wt + w.height()) && (tt >= wt));

	}

}
$(function () {

	if( $('#map').length > 0 ) {
		if( $('.page-template-page-contacts').length > 0 ) {
			$.getScript('//api-maps.yandex.ru/2.1/?lang=ru_RU');
			setTimeout(function() {	loadYmaps();	}, 1000);
		} else {
			$(window).scroll(function () {
				var b = $("#map");
				if (!b.prop("shown") && isVisible(b)) {
					b.prop("shown", true);
					$.getScript('//api-maps.yandex.ru/2.1/?lang=ru_RU');

					setTimeout(function() {
						loadYmaps();
					}, 1000);
				}
			});
		}
	}


});
//

/**
 * Анимация верхнего меню
 */
function setHeaderFixedAnimate() {
	$(window).scroll(function () {
		
		let sticky_row = $('.header-wrapper .sticky-row'),
				sticky_logotype = sticky_row.find('.logotype'),
				sticky_menu = sticky_row.find('.menu-top'),
				sticky_menu_item = sticky_menu.find('.menu-item'),
				sticky_navbar_btn = sticky_row.find('.navbar-toggler'),
				sticky_form = sticky_row.find('.form-mobile');

		let sticky_cookcodes_btn = sticky_row.find('.cookcodesmenu_btn');
		
		let sticky_menu_item_link = sticky_menu_item.find('a');

		if( $(document).scrollTop() > 0 ) {

			if( sticky_logotype.hasClass('mode__fixed-row') == false ) {
				sticky_logotype.addClass('mode__fixed-row');
				sticky_menu.addClass('mode__fixed-row');
				sticky_navbar_btn.addClass('mode__fixed-row');
				sticky_form.addClass('mode__fixed-row');
				sticky_menu_item.addClass('mode__fixed-row');
				sticky_menu_item_link.addClass('mode__fixed-row');
				sticky_cookcodes_btn.addClass('mode__fixed-row');

				// if( ( document.body.clientWidth <= 600 ) && ( $('#wpadminbar').length > 0 ) ) {
				// 	console.log('works');
					
				// 	sticky_row.css('top','0');
				// }
			}

		} else {
			if( sticky_logotype.hasClass('mode__fixed-row') == true ) {
				sticky_logotype.removeClass('mode__fixed-row');
				sticky_menu.removeClass('mode__fixed-row');
				sticky_navbar_btn.removeClass('mode__fixed-row');
				sticky_form.removeClass('mode__fixed-row');
				sticky_menu_item.removeClass('mode__fixed-row');
				sticky_menu_item_link.removeClass('mode__fixed-row');
				sticky_cookcodes_btn.removeClass('mode__fixed-row');

				if( ( document.body.clientWidth <= 782 ) && $('#wpadminbar').length > 0 ) {
					sticky_row.css('top','46px');
				}
			}
		}
	});
}
setHeaderFixedAnimate();

/**
 * Верхнее меню. Позиция при admin
 */
function setTopMenuWhenAdmin() {
	$(document).ready(function() {
		function ifTopMenu() {
			if( ($(document).scrollTop() > 0) && ( document.body.clientWidth <= 600 ) && ( $('#wpadminbar').length > 0 ) ) {
				$('.sticky-row').css('top', '0');
			} 
			else if( ($(document).scrollTop() > 0) && ( document.body.clientWidth > 600 ) && ( document.body.clientWidth <= 782 ) && $('#wpadminbar').length > 0 ) {
				$('.sticky-row').css('top', '46px');
			}
			else if( ($(document).scrollTop() == 0) && ( document.body.clientWidth <= 782 ) && $('#wpadminbar').length > 0 ) {
				$('.sticky-row').css('top', '46px');
			}
			else if( (document.body.clientWidth > 783 ) && ($('#wpadminbar').length > 0) ) {
				$('.sticky-row').css('top', '32px');
			}
		}
		ifTopMenu();
		$(window).scroll(function () { ifTopMenu(); });
	});
}
setTopMenuWhenAdmin();

$( window ).resize(function() { 
	setTopMenuWhenAdmin();
});

/**
 * Верхнее меню. Внутренний правый отступ при появлении попап-окна
 */
function setPaddingRightTopMenuWhenModalOn() {
	// $('button[data-toggle="modal"]').click(function(){
	// 	$('.sticky-row').css('padding-right', '17px');
	// });
	
	// $('.modal .modal-content .close').click(function(){
	// 	setTimeout(function() {
	// 		$('.sticky-row').css('padding-right', '0');
	// 	}, 300);
	// });

	// $(document).mouseup(function (e){ // событие клика по веб-документу

	// 	if( $(".modal").hasClass('show') ) {
	// 		var div = $(".modal .modal-content"); // тут указываем ID элемента
	// 		if (!div.is(e.target) // если клик был не по нашему блоку
	// 				&& div.has(e.target).length === 0) { // и не по его дочерним элементам
	// 			setTimeout(function() {
	// 				$('.sticky-row').css('padding-right', '0');
	// 			}, 300);
	// 		}
	// 	}
	// });
}
setPaddingRightTopMenuWhenModalOn();


/**
 * Страница под-подкаталога. Настройка разметки.
 */
function setMarkupCatWrapProduct() {
	
	if( ($('.catalog-wrapper .products .product').length > 0) && ( !$('.catalog-wrapper .products .product').hasClass('product-category') ) ) {
		$('.catalog-wrapper').prepend( $('.page-title') );
		$('.catalog-wrapper').addClass('__reverse-subcat');
	} 
	else if( $('body.term-katalog-produkcii').length > 0 ) {
		$('.woocommerce-products-header__title').remove();
		// $('.thumb-cat').remove();
	}
	else {
		$('.catalog-wrapper').prepend( $('.page-title') );
		$('.catalog-wrapper').addClass('__reverse-cat');
	}
}
setMarkupCatWrapProduct();

/**
 * Верхнее меню. Активный пункт
 */
function setActiveMenuItem() {
	$('.kama_breadcrumbs span');

	let arr_breadcrumbs = $('.kama_breadcrumbs > span:not(.kb_sep)');
	let active_itemMenu;
	let arr_topMenu = $('.menu-top .menu a');

	arr_breadcrumbs.each(function(i,e) {
		if( i == 1 ) {
			active_itemMenu = $(e).text();
		}
	});

	// console.log( active_itemMenu );
	
	arr_topMenu.each(function(i,e) {
		if( active_itemMenu == $(e).text() ) {
			$(e).css('text-decoration', 'underline');
		} else if( active_itemMenu == 'Специальные акции' && $(e).text() == 'Акции' ) {
			$(e).css('text-decoration', 'underline');
		} else if( active_itemMenu == 'Примеры наших работ' && $(e).text() == 'Примеры работ' ) {
			$(e).css('text-decoration', 'underline');
		}
	});
	
}
setActiveMenuItem();

/**
 * Товар. Настройка
 */
function setProductPage() {

	if( $('body.single-product').length > 0 ) {


		let productID = $('.product.type-product').attr('id'),
				galleryProduct = $('.woocommerce-product-gallery'),
				images_gallery = galleryProduct.find('.woocommerce-product-gallery__image'),
				link_img = images_gallery.find('a');

		// Настройка лайтбокса
		link_img.attr('data-fancybox', 'gallery'+productID );

		// $('.woocommerce-product-gallery .woocommerce-product-gallery__image a[data-fancybox]').fancybox();

		// Настройка вкладки "Скачать прайс-лист"
		// console.log( $('.product-tab-price-link') );
		let price_link = $('#product-tab-price-link').attr('href');
		// console.log( price_link );
		// console.log( price_link != undefined );
		// console.log( typeof price_link );

		if( price_link != undefined ) {
			$('.woocommerce-tabs ul.tabs').append('<a id="download-price-list" href="'+price_link+'" download>Скачать прайс-лист</a>');
		}

		// $('#tab-title-product_download_price-list a').attr('href', '' + price_link);
		// $('#tab-title-product_download_price-list a').attr('download', '');

		// $('#tab-title-product_download_price-list a').on('click', function() {
		// 	$('#product-tab-price-link').click();
		// });

		// $('#tab-title-product_download_price-list a').click(function(e) {
		// 	// e.preventDefault();

		// 	// $('#product-tab-price-link').click();

		// 	$('#tab-title-product_download_price-list a').attr('href', '' + price_link);
		// 	$('#tab-title-product_download_price-list a').attr('download', '');
			
		// });

		// $('#product-tab-price-link').click(function(e) {
		// 	console.log( e.target );
		// });

		$('#awooc-custom-order-button').addClass('vkenergy_button _reverse');

	}

}
setProductPage();


function setFormOrder() {

	if( $('.awooc-form-custom-order').hasClass('awooc-hide') == 0 ) {

	}

}
setFormOrder();

$(document).ready(function(){

});




/**
 * Страницы "Сертификаты или отзывы" Настройка отображения кнопки "Показать ещё"
 */
$(document).ready(function() {
	
	if( $('.page-template-page-certificates').length != 0 ) {
		if( $('.reviews-wrapper').length != 0 ) {
			var countReviewBlocks = $('#countReviewBlocks').val();
			var countBlocks = $('.reviews-wrapper .review-col').length;
			if(countReviewBlocks == countBlocks ) $('#btnmore_ajax').hide();
		} else if( $('.certificates-wrapper').length != 0 ) {
			var countSertificateBlocks = $('#countSertificateBlocks').val();
			var countBlocks = $('.certificates-wrapper .certificate-col').length;
			if(countSertificateBlocks == countBlocks ) $('#btnmore_ajax').hide();
		}
	}

});
/**
 * Работа с Яндекс.Картами
 */
function loadYmaps() {

		// Создание обработчика для события window.onLoad
		ymaps.ready(function() {
			// Создание экземпляра карты и его привязка к созданному контейнеру
			var myMap = new ymaps.Map('map', { 
				center: [0, 0], 
				zoom: 900 
			});
	
			var address = $('#address').html().replace('<br>', ',');
			// console.log(address);
			
	
			var coorCity;
	
			var destinations = {};
			destinations.City = '';
	
			var menuContainer = $('#address');
	
			for (var item in destinations) {
	
				ymaps.geocode(address, { results: 1 }).then(function (res) {
					coorCity = res.geoObjects.get(0).geometry.getCoordinates();
					destinations.City = coorCity;
					// console.log(destinations.City);
		
					// Используем замыкание, чтобы работать с конкретным свойством объекта
					(function (title, geoPoint) {
						// Создаем обработчик по щелчку на ссылке
						$('#address').bind('click', function() {
							
							// Перемещаем карту
							myMap.panTo(coorCity, {flying: true});
							return false;
						}).end().appendTo(menuContainer);
					})(item, destinations.City)
	
					// Центрируем карту на городе
					ymaps.geocode(destinations.City, { results: 1 }).then(function (res) {
						var firstGeoObject  = res.geoObjects.get(0);
						var bounds          = firstGeoObject.properties.get('boundedBy');
		
						myMap.geoObjects.add(firstGeoObject);
						myMap.setBounds(bounds, { checkZoomRange: true });
					});
				});
			};
	
		});
		
}
// $(document).ready(function() {	loadYmaps(); });







jQuery(document).ready(function($) {
	var myModalLabel2 = $('#myModalLabel2');
	var myModalLabel2__form_button = myModalLabel2.find('button[data-name=continue-btn]');
	
	myModalLabel2__form_button.click(function() {
		var url_current_page = $(this).siblings('input[name=url_current_page]').val();
		
		$('#myModalLabel2').modal('hide');

		// window.location = '//' + url_current_page;
		// history.back();
		// history.pushState(null, document.title, '//' + url_current_page);

	});

});

jQuery(function($) {
	var myModalLabel2 = $('#myModalLabel2');
	var myModalLabel2_inputScroll = myModalLabel2.find('input[name=new_scrollTop_page]').val();
	
	var myModalLabel2__form_button = myModalLabel2.find('button[data-name=continue-btn]');
	var myModalLabel2_body = myModalLabel2.find('.modal-body');
	var ml2_title = myModalLabel2_body.find('.title_product');

	if(ml2_title.text().length > 1) {
		$(document).scrollTop(myModalLabel2_inputScroll);
		myModalLabel2.modal('show');
		var url_current_page = myModalLabel2__form_button.siblings('input[name=url_current_page]').val();
		history.replaceState(null, document.title, '//' + url_current_page);
	}
});

/**
 * Берём информацию о странице для CF7
 * 	- Название страницы и её ссылка
 */
function set_ajax_form_cf7_hidden_inputs() {

	let modal = $('.modal.show');

	switch (1) {
		case $('.modal.show').length:
			modal = $('.modal.show');
			break;

		case $('.blockUI.blockPage').length:
			modal = $('.blockUI.blockPage');
			break;
	
		default:
			break;
	}

	let hidden_wp_title				= $('#hidden_wp_title');
	let hidden_wp_url_title 	= $('#hidden_wp_url_title');

	// let hidden_wp_title_text;
	// let hidden_wp_url_text;

	let modal_post_title			= modal.find('input[name="post_title"]');
	let modal_post_url				= modal.find('input[name="post_url"]');

	modal_post_title.val( document.title );
	modal_post_url.val( document.location.href );

	// let modal_post_title_trim;
	// let modal_post_url_trim;

	/**
	 * Проверка страницы:
	 * 	- Главная страница 										$('body.home')
	 * 	- Архивная страница category					$('body.archive.category')
	 * 	- Архивная страница tax-product_cat		$('body.archive.tax-product_cat')
	 * 	- Остальное
	 */

	// switch ( 1 ) {
	// 	case $('body.home').length:
	// 		// console.log( 'body.home' );
	// 		hidden_wp_title_text	= 'Главная страница сайта';
	// 		hidden_wp_url_text		= window.location.origin + window.location.pathname;
	// 		break;
		
	// 	case $('body.archive.category').length:
	// 		// console.log( 'body.archive.category' );
	// 		hidden_wp_title_text	= $('.page-title').text().trim();
	// 		hidden_wp_url_text		= window.location.origin + window.location.pathname;
	// 		break;
		
	// 	case $('body.archive.tax-product_cat').length:
	// 		// console.log( 'body.archive.tax-product_cat' );
	// 		hidden_wp_title_text	= $('.page-title').text().trim();
	// 		hidden_wp_url_text		= window.location.origin + window.location.pathname;
	// 		break;
	
	// 	default:
	// 		// console.log( 'Остальное' );
	// 		hidden_wp_title_text	= hidden_wp_title.val();
	// 		hidden_wp_url_text		= hidden_wp_url_title.val();
	// 		break;
	// }

	// hidden_wp_title_text	= hidden_wp_title_text.trim();
	// hidden_wp_url_text		= hidden_wp_url_text.trim();

	// modal_post_title.val( hidden_wp_title_text );
	// modal_post_url.val( hidden_wp_url_text );



	// console.log('hidden_wp_title_text - ' + modal_post_title.val() );
	// console.log('hidden_wp_url_text   - ' + modal_post_url.val() );
}

/**
 * Product category paginate
 */
function setPaginateText() {
	if( $('body.tax-product_cat').length > 0 ) {
		$('.woocommerce-pagination a.next').text(' Следующая ');
		$('.woocommerce-pagination a.prev').text(' Предыдущая ');
	}
} 
setPaginateText();


/**
 * Single product. thumb
 */
function setLightboxSingleProduct() {
	// if( $('body.single-product').length > 0 ) {
		if( document.body.clientWidth >= 992 ) {
		$(document).arrive(".fancybox-container", function(newElem) {
			$(this).find('.fancybox-slide--current');
				$('.sticky-row').css('padding-right', '18px');
			});
			$(document).leave(".fancybox-container", function() {
				$(this).find('.fancybox-slide--current');
				$('.sticky-row').css('padding-right', '0');
			});
		}
	// }
}
setLightboxSingleProduct();

/**
 * wrap product category block
 */
function wrapProductCategoryBlock() {
	if( $('body.archive.tax-product_cat').length > 0 ) {
		$('.product-category.product').each(function(i,e) {
			$(e).find('img').wrap('<span class="product-category-img-wrap"></span>');
		});
	}
}
wrapProductCategoryBlock();


/**
 * data-src to src
 */
function setDataSrc() {
	$(document).ready(function() {
		$('img[data-src]').each(function(i,e) {
			
			let dataSrc_img = $(this).attr('data-src').trim();
			$(this).attr('src', dataSrc_img );
			$(this).removeAttr('data-src');
		});
	});
}
setDataSrc();

// function setDataSrcSet() {
// 	$(document).ready(function() {
// 		$('source[data-srcset]').each(function(i,e) {
// 			// console.log('source[data-srcset]' + i);
			
// 			let dataSrcSet_img = $(this).attr('data-srcset').trim();
// 			$(this).attr('srcset', dataSrcSet_img );
// 			$(this).removeAttr('data-srcset');
// 		});
// 	});
// }
// setDataSrcSet();
let home_url_2 = $('input#hidden_home_url').val().trim();
let directory_url = 'wp-content/themes/energy-wc/';


/**
 * Появление стилей и скрипта в видимой области слайдера "slick"
 */
function isVisibleSlickSlider(tag) {
	var elem 				= $(tag),												// Элемент
			win 				= $(window),										// Окно
			w_sTop 			= win.scrollTop(),						// Значение прокрутки окна
			t_offsetTop = elem.offset().top,						// Расстояние до верхней границы элемента
			topHeight 	= t_offsetTop + elem.height();		// Расстояние до нижней границы элемента

	return ( ( t_offsetTop >= w_sTop ) );
	// return ( ( t_offsetTop <= w_sTop + win.height() ) );
}

let slick_visible = 0;
let slick_block = $('.__slick-slider');
function ajax_slick_slider() {
	if( slick_block.length > 0 ) {

		if( !slick_block.prop('shown') && isVisibleSlickSlider(slick_block) ) {
			slick_block.prop('shown', true);

			if( $('head link#slick_style').length == 0 ) {
				var slick_style	= document.createElement('link');
						slick_style.id		= 'slick_style';
						slick_style.rel		= 'stylesheet';
						slick_style.type	= 'text/css';
						slick_style.href	= home_url_2 + '/' + directory_url +'assets/css/plugins/slick/slick.min.css';
						document.head.appendChild(slick_style);

				console.log('slick style init');
			}

			if( ++slick_visible ) {
				$.getScript( home_url_2 + '/' + directory_url + 'assets/js/plugins/slick/slick.min.js', function() {
					slick_block.slick({
						arrows: false,
						autoplay: true,
						dots: true,
					});
					setTimeout(function(){
						slick_block.fadeTo(500, 1);
					},1000);
				});

				console.log('slick script init');
			}
		}
	}
}
ajax_slick_slider();
$(window).scroll(function() { ajax_slick_slider() });


let fancybox_visible = 0;
let fancybox_block = $('a[data-fancybox]');

function ajax_fancybox() {
	if( fancybox_block.length > 0 ) {
		if( !fancybox_block.prop('shown') && isVisibleSlickSlider(fancybox_block) ) {
			fancybox_block.prop('shown', true);

			if( $('head link#fancybox_style').length == 0 ) {
				var fancybox_style			= document.createElement('link');
						fancybox_style.id		= 'fancybox_style';
						fancybox_style.rel	= 'stylesheet';
						fancybox_style.type = 'text/css';
						fancybox_style.href	= home_url_2 + '/' + directory_url + 'assets/css/plugins/fancybox/jquery.fancybox.min.css';
						document.head.appendChild(fancybox_style);
				console.log('fancybox style init');
			}

			if( ++fancybox_visible == true ) {
				$.getScript(home_url_2 + '/' + directory_url+'assets/js/plugins/fancybox/jquery.fancybox.min.js', function() {
					fancybox_block.fancybox();
					console.log('fancybox script init');
				});
			}
		}
	
	}
}
ajax_fancybox();
$(window).scroll(function() { ajax_fancybox() });




/**
 * Страницы "Сертификаты или отзывы" Настройка отображения кнопки "Показать ещё"
 */
$(document).ready(function() {
	
	if( $('.page-template-page-certificates').length != 0 ) {
		if( $('.reviews-wrapper').length != 0 ) {
			var countReviewBlocks = $('#countReviewBlocks').val();
			var countBlocks = $('.reviews-wrapper .review-col').length;
			if(countReviewBlocks == countBlocks ) $('#btnmore_ajax').hide();
		} else if( $('.certificates-wrapper').length != 0 ) {
			var countSertificateBlocks = $('#countSertificateBlocks').val();
			var countBlocks = $('.certificates-wrapper .certificate-col').length;
			if(countSertificateBlocks == countBlocks ) $('#btnmore_ajax').hide();
		}
	}

});
/**
 * Работа с Яндекс.Картами
 */
function loadYmaps() {

		// Создание обработчика для события window.onLoad
		ymaps.ready(function() {
			// Создание экземпляра карты и его привязка к созданному контейнеру
			var myMap = new ymaps.Map('map', { 
				center: [0, 0], 
				zoom: 900 
			});
	
			var address = $('#address').html().replace('<br>', ',');
			// console.log(address);
			
	
			var coorCity;
	
			var destinations = {};
			destinations.City = '';
	
			var menuContainer = $('#address');
	
			for (var item in destinations) {
	
				ymaps.geocode(address, { results: 1 }).then(function (res) {
					coorCity = res.geoObjects.get(0).geometry.getCoordinates();
					destinations.City = coorCity;
					// console.log(destinations.City);
		
					// Используем замыкание, чтобы работать с конкретным свойством объекта
					(function (title, geoPoint) {
						// Создаем обработчик по щелчку на ссылке
						$('#address').bind('click', function() {
							
							// Перемещаем карту
							myMap.panTo(coorCity, {flying: true});
							return false;
						}).end().appendTo(menuContainer);
					})(item, destinations.City)
	
					// Центрируем карту на городе
					ymaps.geocode(destinations.City, { results: 1 }).then(function (res) {
						var firstGeoObject  = res.geoObjects.get(0);
						var bounds          = firstGeoObject.properties.get('boundedBy');
		
						myMap.geoObjects.add(firstGeoObject);
						myMap.setBounds(bounds, { checkZoomRange: true });
					});
				});
			};
	
		});
		
}
// $(document).ready(function() {	loadYmaps(); });








jQuery(document).ready(function($) {
	var myModalLabel2 = $('#myModalLabel2');
	var myModalLabel2__form_button = myModalLabel2.find('button[data-name=continue-btn]');
	
	myModalLabel2__form_button.click(function() {
		var url_current_page = $(this).siblings('input[name=url_current_page]').val();
		
		$('#myModalLabel2').modal('hide');

		// window.location = '//' + url_current_page;
		// history.back();
		// history.pushState(null, document.title, '//' + url_current_page);

	});

});

jQuery(function($) {
	var myModalLabel2 = $('#myModalLabel2');
	var myModalLabel2_inputScroll = myModalLabel2.find('input[name=new_scrollTop_page]').val();
	
	var myModalLabel2__form_button = myModalLabel2.find('button[data-name=continue-btn]');
	var myModalLabel2_body = myModalLabel2.find('.modal-body');
	var ml2_title = myModalLabel2_body.find('.title_product');

	if(ml2_title.text().length > 1) {
		$(document).scrollTop(myModalLabel2_inputScroll);
		myModalLabel2.modal('show');
		var url_current_page = myModalLabel2__form_button.siblings('input[name=url_current_page]').val();
		history.replaceState(null, document.title, '//' + url_current_page);
	}
});

function hrefStyleList() {
	$('a[href$=".pdf"]').each(function(i,e) {
		$(e).parent('li').parent('ul').css('list-style', 'none');
		$(e).parent('li').parent('ol').css('list-style', 'none');
	});
}
hrefStyleList();