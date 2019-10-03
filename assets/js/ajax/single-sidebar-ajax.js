$(document).on("click",".service-sidebar-list li a", function (e) {
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
			return location.href = elem_link;
		},
		success: function(out) {

			var result = $(out).find('.single-service-row .content-singlePage-col .content-singlePage-wrapper');

			$('.single-service-row .content-singlePage-col').empty();
			$('.single-service-row .content-singlePage-col').append(result);

			// setAttrDownloadToContent();

		}
	});

});