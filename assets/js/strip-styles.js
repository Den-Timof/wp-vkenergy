var home_url = $('input#hidden_home_url').val().trim();

function addLinks() {
	
	let	style_mobile 	= $('head link#strip_mobile_style'),
			style_tablet 	= $('head link#strip_tablet_style'),
			style_smallD 	= $('head link#strip_small_desktop_style'),
			style_bigD 		= $('head link#strip_big_desktop_style');
	
	let array_links = [
		style_mobile,
		style_tablet,
		style_smallD,
		style_bigD,
	];
	
	function getAvailabilityLinks($exclude) {
		for (let index = 0; index < array_links.length; index++) {
			let elem = array_links[index];
			
			if( elem.length > 0 ) {
				if( $exclude == elem ) continue;
				elem.remove();
				console.log('remove');
			}
		}
	}
	// getAvailabilityLinks();
	
	switch ( true ) {
	
		// min-width: 1600 
		case (document.body.clientWidth >= 1600 ):

			if( style_bigD.length == 0 ) {
				let bigDesktopLink	= document.createElement('link');
				bigDesktopLink.id		= 'strip_big_desktop_style';
				bigDesktopLink.rel = 'stylesheet';
				bigDesktopLink.type = 'text/css';
				bigDesktopLink.href	= home_url + '/wp-content/themes/energy-wc/assets/css/cut-styles/strip_big_desktop_style.min.css';
				document.head.appendChild(bigDesktopLink);
			}
			getAvailabilityLinks(style_bigD);
			break;
	
		// min-width 992px and max-width: 1199.98
		case (document.body.clientWidth >= 992 && document.body.clientWidth < 1200 ):
			
			if( style_smallD.length == 0 ) {
				let smallDesktopLink	= document.createElement('link');
				smallDesktopLink.id		= 'strip_small_desktop_style';
				smallDesktopLink.rel = 'stylesheet';
				smallDesktopLink.type = 'text/css';
				smallDesktopLink.href	= home_url + '/wp-content/themes/energy-wc/assets/css/cut-styles/strip_small_desktop_style.min.css';
				document.head.appendChild(smallDesktopLink);
			}
			getAvailabilityLinks(style_smallD);
			break;
	
		// min-width 576px and max-width: 991.98px
		case (document.body.clientWidth >= 576 && document.body.clientWidth < 992 ):

			if( style_tablet.length == 0 ) {
				let tabletLink	= document.createElement('link');
				tabletLink.id		= 'strip_tablet_style';
				tabletLink.rel = 'stylesheet';
				tabletLink.type = 'text/css';
				tabletLink.href	= home_url + '/wp-content/themes/energy-wc/assets/css/cut-styles/strip_tablet_style.min.css';
				document.head.appendChild(tabletLink);
			}
			getAvailabilityLinks(style_tablet);
			break;
	
		// max-width: 575.98px
		case (document.body.clientWidth < 576 ):

			if( style_mobile.length == 0 ) {
				let mobileLink	= document.createElement('link');
				mobileLink.id		= 'strip_mobile_style';
				mobileLink.rel = 'stylesheet';
				mobileLink.type = 'text/css';
				mobileLink.href	= home_url + '/wp-content/themes/energy-wc/assets/css/cut-styles/strip_mobile_style.min.css';
				document.head.appendChild(mobileLink);
			}
			getAvailabilityLinks(style_mobile);
			break;
	
		default:
			getAvailabilityLinks(style_mobile);
			break;
	}
}
addLinks();

$(window).resize(function() { addLinks(); });