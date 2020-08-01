/**
 * SustyJS
 */

(function(d) {
	var link  = document.createElement( 'link' );
	link.id   = 'gfonts';
	link.rel  = 'stylesheet';
	link.href = 'https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@400;700&family=Roboto:wght@900&display=swap';
	document.head.appendChild( link );
})( document );

var windowLinks = document.querySelectorAll("[data-window]");


for (var link of windowLinks) {
	var URI = link.dataset.window;

	link.onclick = function() {
		popupwindow(URI, "Partager", 500, 500);
	};
}

function popupwindow(url, title, w, h) {
	var left = (screen.width/2)-(w/2);
	var top = (screen.height/2)-(h/2);
	return window.open(url, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
}