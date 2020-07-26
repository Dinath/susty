/**
 * SustyJS
 */

WebFontConfig = {
	google: { families: [
	        'Roboto:900:latin',
	        'Roboto+Slab:400,700:latin',
        ]
	}
};

(function(d) {
	var wf   = d.createElement( 'script' ), s = d.scripts[0];
	wf.src   = '/wp-content/themes/susty/assets/js/webfontloader.js?ver=1.6.28';
	wf.async = true;
	s.parentNode.insertBefore( wf, s );
})( document );
