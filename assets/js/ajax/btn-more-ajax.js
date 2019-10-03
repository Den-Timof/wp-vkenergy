jQuery(document).ready(function($) {
	$('button#btnmore_ajax').on('click', function() {

		

		if( $('.reviews-wrapper').length != 0 ) {
			var pageID = $('.reviews-wrapper').attr('data-page-id');
			var countBlocks = $('.reviews-wrapper .review-col').length;
		} else if( $('.certificates-wrapper').length != 0 ) {
			var pageID = $('.certificates-wrapper').attr('data-page-id');
			var countBlocks = $('.certificates-wrapper .certificate-col').length;
		}

		var data = {
			id 					: pageID,
			count				: countBlocks,
			action 			: 'btn_more_ajax',
			nonce 			: btn_more_ajax.nonce
		};

		$.ajax({
			url 				: btn_more_ajax.url,
			data				: data,
			type				: 'POST',
			dataType		: 'json',
			beforeSend	: function(xhr) {
				$('#btnmore_ajax').text('Загрузка...');
			},
			error	: function(xhr) {
				console.log('error');
				$('#btnmore_ajax').text('Ошибка загрузки');
			},
			success: function(data) {
				$('#btnmore_ajax').text('Показать ещё');
				// console.log('countBlocks - ' + countBlocks );
				// console.log( 'До ' + data.fields_before);
				// console.log( 'После ' + data.fields_after);
				
					if( $('.reviews-wrapper').length != 0 ) {
						$('.reviews-wrapper').append(data.btn_more);
						countBlocks = $('.reviews-wrapper .review-col').length;
						if(data.fields_before == countBlocks ) $('#btnmore_ajax').hide();
					} 
					else if( $('.certificates-wrapper') != 0 ) {
						$('.certificates-wrapper').append(data.btn_more);
						countBlocks = $('.certificates-wrapper .certificate-col').length;
						if(data.fields_before == countBlocks ) $('#btnmore_ajax').hide();
					} 
					else {
						$('#btnmore_ajax').text('Загрузка не удалась.');
					}
				
			}
		});
	});
});