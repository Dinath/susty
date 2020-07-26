<?php
/**
 * SVG icons related functions
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

/**
 * Gets the SVG code for a given icon.
 */
function susty_get_icon_svg( $icon, $size = 24 ) {
	return Susty_SVG_Icons::get_svg( 'ui', $icon, $size );
}

/**
 * Gets the SVG code for a given social icon.
 */
function susty_get_social_icon_svg( $icon, $size = 24 ) {
	return Susty_SVG_Icons::get_svg( 'social', $icon, $size );
}

/**
 * Detects the social network from a URL and returns the SVG code for its icon.
 */
function susty_get_social_link_svg( $uri, $size = 24 ) {
	return Susty_SVG_Icons::get_social_link_svg( $uri, $size );
}

/**
 * Display SVG icons in social links menu.
 *
 * @param  string  $item_output The menu item output.
 * @param  WP_Post $item        Menu item object.
 * @param  int     $depth       Depth of the menu.
 * @param  array   $args        wp_nav_menu() arguments.
 * @return string  $item_output The menu item output with social icon.
 */
function susty_nav_menu_social_icons( $item_output, $item, $depth, $args ) {

	$svg = susty_get_social_link_svg( $item->url, 22 );

	if ( ! empty( $svg ) ) {
		$item_output = sprintf(
			'<a href="%s" target="_blank">%s</a>',
			$item->url,
			str_replace( $item_output, '</span>' . $svg, $item_output )
		);
	}

	return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'susty_nav_menu_social_icons', 10, 4 );
