$(document).on("click",".woocommerce-pagination a", function (e) {

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

			var resultRow = $(out).find('.catalog-wrapper > .columns-4 > .products');
			var resultPaginate = $(out).find('.catalog-wrapper > .columns-4 > .woocommerce-pagination');

			$('.catalog-wrapper > .columns-4').empty();
			$('.catalog-wrapper > .columns-4').append(resultRow);
			$('.catalog-wrapper > .columns-4').append(resultPaginate);
			$(document).scrollTop(0);

			setPaginateText();

		}
	});

});