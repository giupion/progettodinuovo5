<?php
/**
 * Theme functions and definitions.
 *
 * @link https://codex.wordpress.org/Functions_File_Explained
 *
 * @package unique_pizza_shop
 */

if ( ! function_exists( 'unique_pizza_shop_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function unique_pizza_shop_setup() {
		/*
		 * Make theme available for translation.
		 */ 
		load_theme_textdomain( 'unique-pizza-shop', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Let WordPress manage the document title.
		add_theme_support( 'title-tag' );

		// Enable support for Post Thumbnails on posts and pages.
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'unique-pizza-shop-thumb', 400, 300 );

		// Register nav menu locations.
		register_nav_menus( array(
			'primary-menu'  => esc_html__( 'Primary Menu', 'unique-pizza-shop' ),
		) );

		/*
		* This theme styles the visual editor to resemble the theme style,
		* specifically font, colors, icons, and column width.
		*/
		$min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
		add_editor_style( array( '/css/editor-style' . $min . '.css', unique_pizza_shop_fonts_url() ) );

		/*
		 * Switch default core markup to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'unique_pizza_shop_custom_background_args', array(
			'default-color' => 'f7fcfe',
		) ) );

		// Enable support for selective refresh of widgets in Customizer.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Enable support for custom logo.
		add_theme_support( 'custom-logo' );

		// Load default block styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for responsive embeds.
		add_theme_support( 'responsive-embeds' );

		// Enable support for footer widgets.
		add_theme_support( 'footer-widgets', 4 );

		// Load Supports.
		require_once get_template_directory() . '/inc/support.php';

		// Add custom editor font sizes.
		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'      => __( 'Small', 'unique-pizza-shop' ),
					'shortName' => __( 'S', 'unique-pizza-shop' ),
					'size'      => 13,
					'slug'      => 'small',
				),
				array(
					'name'      => __( 'Normal', 'unique-pizza-shop' ),
					'shortName' => __( 'M', 'unique-pizza-shop' ),
					'size'      => 14,
					'slug'      => 'normal',
				),
				array(
					'name'      => __( 'Large', 'unique-pizza-shop' ),
					'shortName' => __( 'L', 'unique-pizza-shop' ),
					'size'      => 30,
					'slug'      => 'large',
				),
				array(
					'name'      => __( 'Huge', 'unique-pizza-shop' ),
					'shortName' => __( 'XL', 'unique-pizza-shop' ),
					'size'      => 36,
					'slug'      => 'huge',
				),
			)
		);

		// Editor color palette.
		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => __( 'Black', 'unique-pizza-shop' ),
					'slug'  => 'black',
					'color' => '#000',
				),
				array(
					'name'  => __( 'White', 'unique-pizza-shop' ),
					'slug'  => 'white',
					'color' => '#ffffff',
				),
				array(
					'name'  => __( 'Gray', 'unique-pizza-shop' ),
					'slug'  => 'gray',
					'color' => '#727272',
				),
				array(
					'name'  => __( 'Blue', 'unique-pizza-shop' ),
					'slug'  => 'blue',
					'color' => '#f36c02',
				),
				array(
					'name'  => __( 'Navy Blue', 'unique-pizza-shop' ),
					'slug'  => 'navy-blue',
					'color' => '#f36c02',
				),
				array(
					'name'  => __( 'Light Blue', 'unique-pizza-shop' ),
					'slug'  => 'light-blue',
					'color' => '#f7fcfe',
				),
				array(
					'name'  => __( 'Orange', 'unique-pizza-shop' ),
					'slug'  => 'orange',
					'color' => '#121212',
				),
				array(
					'name'  => __( 'Green', 'unique-pizza-shop' ),
					'slug'  => 'green',
					'color' => '#77a464',
				),
				array(
					'name'  => __( 'Red', 'unique-pizza-shop' ),
					'slug'  => 'red',
					'color' => '#e4572e',
				),
				array(
					'name'  => __( 'Yellow', 'unique-pizza-shop' ),
					'slug'  => 'yellow',
					'color' => '#f4a024',
				),
			)
		);
		global $pagenow;
		if (is_admin() && ('themes.php' == $pagenow) && isset($_GET['activated']) && wp_get_theme()->get('TextDomain') === 'unique-pizza-shop') {
			wp_redirect(admin_url('themes.php?page=unique-pizza-shop-getting-started'));
		}
	}
endif;

add_action( 'after_setup_theme', 'unique_pizza_shop_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function unique_pizza_shop_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'unique_pizza_shop_content_width', 771 );
}
add_action( 'after_setup_theme', 'unique_pizza_shop_content_width', 0 );

/**
 * Register widget area.
 */
function unique_pizza_shop_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Primary Sidebar', 'unique-pizza-shop' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here to appear in your Primary Sidebar.', 'unique-pizza-shop' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Secondary Sidebar', 'unique-pizza-shop' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add widgets here to appear in your Secondary Sidebar.', 'unique-pizza-shop' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Secondary Sidebar 1', 'unique-pizza-shop' ),
		'id'            => 'sidebar-3',
		'description'   => esc_html__( 'Add widgets here to appear in your Secondary Sidebar 1.', 'unique-pizza-shop' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'unique_pizza_shop_widgets_init' );

/**
 * Register custom fonts.
 */
function unique_pizza_shop_fonts_url() {
	$font_family   = array(
		'Nunito+Sans:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900' ,
		'Crimson+Text:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700'
	);
	
	$fonts_url = add_query_arg( array(
		'family' => implode( '&family=', $font_family ),
		'display' => 'swap',
	), 'https://fonts.googleapis.com/css2' );

	$contents = wptt_get_webfont_url( esc_url_raw( $fonts_url ) );
	return $contents;
}

/**
 * Enqueue scripts and styles.
 */
function unique_pizza_shop_scripts() {

	$min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

	wp_enqueue_style( 'unique-pizza-shop-font-awesome', get_template_directory_uri() . '/third-party/font-awesome/css/font-awesome' . $min . '.css', '', '4.7.0' );

	$fonts_url = unique_pizza_shop_fonts_url();
	if ( ! empty( $fonts_url ) ) {
		wp_enqueue_style( 'unique-pizza-shop-google-fonts', $fonts_url, array(), null );
	}

	wp_enqueue_style( 'unique-pizza-shop-style', get_stylesheet_uri() );
	wp_style_add_data( 'unique-pizza-shop-style', 'rtl', 'replace' );

	 wp_enqueue_style( 'dashicons' );
	
	// Theme stylesheet.
	wp_enqueue_style( 'unique-pizza-shop-style', get_stylesheet_uri(), null, date( 'Ymd-Gis', filemtime( get_template_directory() . '/style.css' ) ) );

	// Theme block stylesheet.
	wp_enqueue_style( 'unique-pizza-shop-block-style', get_theme_file_uri( '/css/blocks.css' ), array( 'unique-pizza-shop-style' ), '20211006' );
	wp_enqueue_style('bootstrap-style', get_template_directory_uri().'/css/bootstrap.css');
	
	wp_enqueue_script( 'unique-pizza-shop-custom-js', get_template_directory_uri(). '/js/custom.js', array('jquery') ,'',true);
	
	wp_enqueue_script( 'jquery-superfish', get_theme_file_uri( '/js/jquery.superfish.js' ), array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/js/bootstrap.js', array('jquery'), '', true);
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'unique_pizza_shop_scripts' );

/**
 * Enqueue styles for the block-based editor.
 *
 * @since Unique Pizza Shop
 */
function unique_pizza_shop_block_editor_styles() {
	// Theme block stylesheet.
	wp_enqueue_style( 'unique-pizza-shop-editor-style', get_template_directory_uri() . '/css/editor-blocks.css', array(), '20101208' );

	$fonts_url = unique_pizza_shop_fonts_url();
	if ( ! empty( $fonts_url ) ) {
		wp_enqueue_style( 'unique-pizza-shop-google-fonts', $fonts_url, array(), null );
	}
}
add_action( 'enqueue_block_editor_assets', 'unique_pizza_shop_block_editor_styles' );

define( 'IS_FREE_MIZAN_THEMES', 'unique-pizza-shop' );

/**
 * Load init.
 */
require_once get_template_directory() . '/inc/init.php';

/**
 *  Webfonts 
 */
require_once get_template_directory() . '/inc/wptt-webfont-loader.php';

require_once get_template_directory() . '/inc/recommendations/tgm.php';

require_once get_template_directory() . '/inc/upsell/class-upgrade-pro.php';

/* 
 * Getting Started
*/
require get_template_directory() . '/inc/getting-started/getting-started.php';

/* 
* Plugin Activation 
*/
require get_template_directory() . '/inc/getting-started/plugin-activation.php';

define('UNIQUE_PIZZA_SHOP_SUPPORT',__('https://wordpress.org/support/theme/unique-pizza-shop/','unique-pizza-shop'));
define('UNIQUE_PIZZA_SHOP_REVIEW',__('https://wordpress.org/support/theme/unique-pizza-shop/reviews/','unique-pizza-shop'));
define('UNIQUE_PIZZA_SHOP_BUY_NOW',__('https://www.mizanthemes.com/elementor/pizza-wordpress-theme/','unique-pizza-shop'));
define('UNIQUE_PIZZA_SHOP_LIVE_DEMO',__('https://mizanthemes.com/preview/unique-pizza-shop/','unique-pizza-shop'));
define('UNIQUE_PIZZA_SHOP_PRO_DOC',__('https://www.mizanthemes.com/setup-guide/unique-pizza-shop-pro/','unique-pizza-shop'));