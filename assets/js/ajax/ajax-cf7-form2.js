jQuery(document).ready(function($) {
	$('button[data-target=".modal-manager-2"]').on('click', function() {

		if( $('head link#awooc-styles-css').length == 0 ) {
			var f_home_url = $('input#hidden_home_url').val().trim();
			var awooc_style	= document.createElement('link');
					awooc_style.id		= 'awooc-styles-css';
					awooc_style.rel = 'stylesheet';
					awooc_style.type = 'text/css';
					awooc_style.href	= f_home_url + '/wp-content/themes/energy-wc/assets/css/plugins/awooc/awooc-styles.css';
					document.head.appendChild(awooc_style);
		}
		if( $('head link#contact_form_styles_css').length == 0 ) {
			var f_home_url = $('input#hidden_home_url').val().trim();
			var awooc_style	= document.createElement('link');
					awooc_style.id		= 'contact_form_styles_css';
					awooc_style.rel = 'stylesheet';
					awooc_style.type = 'text/css';
					awooc_style.href	= f_home_url + '/wp-content/themes/energy-wc/assets/css/plugins/contact-form-7/styles-cf7.min.css';
					document.head.appendChild(awooc_style);
		}

		var data = {
			action 			: 'cf7_form2_ajax',
			nonce 			: cf7_form2_ajax.nonce
		};

		$.ajax({
			url 				: cf7_form2_ajax.url,
			data				: data,
			type				: 'POST',
			dataType		: 'json',
			beforeSend	: function(xhr) {},
			error	: function(xhr) {
				console.log('error');
			},
			success: function(data) {
				$('body').prepend(data.cf7_form2);
				setFileBtn();

				var body = $('body');

				if( document.body.clientWidth >= 992 ) $('.sticky-row').css('padding-right', '17px');

				body.append('<div style="display:none;" class="modal-backdrop-custom"></div>');
				$('.modal-backdrop-custom').fadeIn(250);

				let modal = $('#modalManager_2');

				modal.removeClass('fade');
				modal.addClass('fadeIn');
				modal.addClass('d-block');
				modal.modal({
					backdrop: 'static',
					keyboard: false
				});

				// CF7 init
				$( '.modal div.wpcf7 > form' ).each( function() {
					var $form = $(this);
					$form.submit(function (event) {
						if (typeof window.FormData !== 'function') {
							return;
						}
	
						wpcf7.submit($form);
						event.preventDefault();
					});
					$( '.wpcf7-submit', $form ).after( '<span class="ajax-loader"></span>' );
				});

				modal.on('hidden.bs.modal', function (e) {
					// console.log( 'hidden.bs.modal' );

					if( $('body').hasClass('modal-open') )
						$('body').removeClass('modal-open');
						if( document.body.clientWidth >= 992 ) $('body').css('padding-right', '0');
				
					if( $('.modal-backdrop').length > 0 )
						$('.modal-backdrop').remove();

					if( document.body.clientWidth >= 992 ) $('.sticky-row').css('padding-right', '0');

					modal.fadeOut(250);
					// $(".modal#modalManager_2").removeClass('d-block');
					$(".modal-backdrop-custom").fadeOut(250);
					
					setTimeout(function() {
						$(".modal-backdrop-custom").remove();
						modal.remove();
					}, 1000);
					
				})

				set_ajax_form_cf7_hidden_inputs();

			}
		});
	});
});