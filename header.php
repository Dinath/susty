<?php
/**
 * The header for our theme
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Susty
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="preconnect" href="https://www.google-analytics.com">
    <link rel="preconnect" href="https://www.googletagmanager.com">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="page">
	
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'susty' ); ?></a>

	<header id="masthead">
		<?php
		if ( is_front_page() && is_home() ) :
			?>
			<h1 class="site-title">
				<?php
				has_custom_logo() ?
					the_custom_logo() :
					sprintf( '<a href="%s" rel="home">%s</a>', home_url( '/' ), get_bloginfo( 'name' ) );
				?>
			</h1>
			<?php
		else :
			?>
			<p class="site-title">
				<?php
				has_custom_logo() ?
					the_custom_logo() :
					sprintf( '<a href="%s" rel="home">%s</a>', home_url( '/' ), get_bloginfo( 'name' ) );
				?>
			</p>
			<?php
		endif;
		?>
		<?php
		if ( has_nav_menu( 'menu-1' ) ) :
			?>
			<nav>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				)
			);
			?>
			</nav>
			<?php
		endif;
		?>
	</header>

	<div id="main-content">
