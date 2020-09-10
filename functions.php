<?php
/**
 * Susty WP functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Susty
 */

require get_template_directory() . '/classes/class-susty-svg-icons.php';
require get_template_directory() . '/inc/icon-functions.php';

if ( ! function_exists( 'susty_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function susty_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Susty WP, use a find and replace
		 * to change 'susty' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'susty', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'susty' ),
				'menu-2' => esc_html__( 'Secondary', 'susty' ),
				'menu-3' => esc_html__( 'Social', 'susty' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'susty_custom_background_args',
				array(
					'default-color' => 'fffefc',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'width'       => 150,
				'flex-width'  => false,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'susty_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function susty_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'susty_content_width', 640 );
}
add_action( 'after_setup_theme', 'susty_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function susty_scripts() {
	$theme_version = wp_get_theme()->get( 'Version' );

	wp_enqueue_style( 'susty-style', get_stylesheet_uri(), array(), $theme_version );
	wp_enqueue_script( 'susty-js', get_template_directory_uri() . '/assets/js/susty.js', array(), $theme_version, true );

	wp_script_add_data( 'susty-js', 'async', true );

	wp_deregister_script( 'wp-embed' );
}
add_action( 'wp_enqueue_scripts', 'susty_scripts' );


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

// Remove dashicons in frontend for unauthenticated users
add_action( 'wp_enqueue_scripts', 'susty_dequeue_dashicons' );
function susty_dequeue_dashicons() {
	if ( ! is_user_logged_in() ) {
		wp_deregister_style( 'dashicons' );
	}
}

// Remove Gutenberg style
function susty_remove_wp_block_library_css() {
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'wp-block-library-theme' );
}
add_action( 'wp_enqueue_scripts', 'susty_remove_wp_block_library_css' );

/**
 * Count the number of words in post content
 * @param string $content The post content
 * @return integer $count Number of words in the content
 */
function isa_count_content_words( $content ) {
	$decode_content = html_entity_decode( $content );
	$filter_shortcode = do_shortcode( $decode_content );
	$strip_tags = wp_strip_all_tags( $filter_shortcode, true );

	return str_word_count( $strip_tags );
}

function the_content_time_to_read() {
	$timeToRead = ceil( isa_count_content_words( get_the_content() ) / 250 );
	?>
	<small class="entry-time">
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/star.svg" width="15" alt="Temps de lecture">
		<span>Temps de lecture : <?php echo $timeToRead ?> min.</span>
	</small>
	<?php
}

/** * Completely Remove jQuery From WordPress */
function my_init() {
	if (!is_admin()) {
		wp_deregister_script('jquery');
		wp_register_script('jquery', false);
	}
}
add_action('init', 'my_init');
