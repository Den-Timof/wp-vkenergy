$(document).on("click",".wp-pagenavi a", function (e) {

	var elem_link = $(e.target).attr('href');
	e.preventDefault();

	$.ajax({
		type				: 'GET',
		url 				: $(this).attr('href'),
		dataType		: 'html',
		beforeSend	: function(out) {},
		error	: function(out) {
			// console.log('error');
			// console.log( link );
			
			return location.href = elem_link;
		},
		success: function(out) {
			
			var result = $(out).find('.search-col-container > .row');
			// console.log( result );
			
			if( result == undefined ) {
				return location.href = elem_link;
			}

			$('.search-col-container > .row').remove();
			$('.search-col-container').append(result);
			$(document).scrollTop(0);

		}
	});

});