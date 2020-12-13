/**
 * SustyJS
 */

document.addEventListener("DOMContentLoaded", function() {
	/**
	 * Open in a new Window
	 *
	 * @type {NodeListOf<Element>}
	 */
	var windowLinks = document.querySelectorAll( "[data-window]" );

	for (var link of windowLinks) {
		link.onclick = function() {
			popupwindow( this.dataset.window, "Partager", 500, 500 );
		};
	}

	/**
	 * Open in a new tab.
	 *
	 * @type {NodeListOf<Element>}
	 */
	var windowTabs = document.querySelectorAll( "[data-tab]" );

	for (var tab of windowTabs) {
		tab.onclick = function () {
			window.open(this.dataset.tab);
		}
	}
});

/**
 *
 * @param url
 * @param title
 * @param w
 * @param h
 * @returns {Window}
 */
function popupwindow(url, title, w, h) {
	var left = (screen.width / 2) - (w / 2);
	var top  = (screen.height / 2) - (h / 2);
	return window.open( url, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left );
}
