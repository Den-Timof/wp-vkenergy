$(document).on("click",".wp-pagenavi a", function (e) {

	var elem_link = $(e.target).attr('href');
	e.preventDefault();

	$.ajax({
		type				: 'GET',
		url 				: $(this).attr('href'),
		dataType		: 'html',
		beforeSend	: function(out) {
			
		},
		error	: function(out) {
			// console.log('error');
			// console.log( link );
			
			return location.href = elem_link;
		},
		success: function(out) {
			// console.log('succsess');

			var resultRow = $(out).find('.archive-wrapper .archive-row');
			var resultPaginate = $(out).find('.archive-wrapper .pagination-row');

			$('.archive-wrapper').empty();
			$('.archive-wrapper').append(resultRow);
			$('.archive-wrapper').append(resultPaginate);
			$(document).scrollTop(0);

			if( $('._row-primery-nashih-rabot').length != 0 ) {
				$('.archive-wrapper._row-primery-nashih-rabot article .row').each(function(i,e) {
					if( (i % 2) != 0 ) {
						$(e).css({
							'flex-direction' : 'row-reverse',
						})
					}
				});
			}
		}
	});

});