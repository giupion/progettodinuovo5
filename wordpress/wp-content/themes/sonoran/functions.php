<?php

/**
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme sonoran for publication on WordPress.org
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

require_once get_template_directory() . '/inc/tgm/class-tgm-plugin-activation.php';

add_action('tgmpa_register', 'sonoran_register_required_plugins', 0);
function sonoran_register_required_plugins()
{
	$plugins = array(
		array(
			'name'      => 'Superb Addons',
			'slug'      => 'superb-blocks',
			'required'  => false,
		),
	);

	$config = array(
		'id'           => 'sonoran',
		'default_path' => '',
		'menu'         => 'tgmpa-install-plugins',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => true,
		'message'      => '',
	);

	tgmpa($plugins, $config);
}


function sonoran_pattern_styles()
{
	wp_enqueue_style('sonoran-patterns', get_template_directory_uri() . '/assets/css/patterns.css', array(), filemtime(get_template_directory() . '/assets/css/patterns.css'));
	if (is_admin()) {
		global $pagenow;
		if ('site-editor.php' === $pagenow) {
			// Do not enqueue editor style in site editor
			return;
		}
		wp_enqueue_style('sonoran-editor', get_template_directory_uri() . '/assets/css/editor.css', array(), filemtime(get_template_directory() . '/assets/css/editor.css'));
	}
}
add_action('enqueue_block_assets', 'sonoran_pattern_styles');


add_theme_support('wp-block-styles');

// Removes the default wordpress patterns
add_action('init', function () {
	remove_theme_support('core-block-patterns');
});

// Register customer Sonoran pattern categories
function sonoran_register_block_pattern_categories()
{
	register_block_pattern_category(
		'heros',
		array(
			'label'       => __('Heros', 'sonoran'),
			'description' => __('Sonoran hero patterns', 'sonoran'),
		)
	);
	register_block_pattern_category(
		'navigation_headers',
		array(
			'label'       => __('Headers', 'sonoran'),
			'description' => __('Sonoran navigation header patterns', 'sonoran'),
		)
	);
	register_block_pattern_category(
		'teams',
		array(
			'label'       => __('Teams', 'sonoran'),
			'description' => __('Sonoran team patterns', 'sonoran'),
		)
	);
}

add_action('init', 'sonoran_register_block_pattern_categories');



// Initialize information content
require_once trailingslashit(get_template_directory()) . 'inc/vendor/autoload.php';

use SuperbThemesThemeInformationContent\ThemeEntryPoint;

define('SUPERBTHEMES_INFO_CONTENT_TEXT_DOMAIN', "sonoran");

ThemeEntryPoint::init([
	"templates" => [
		array(
			'name' => __("Front Page", "sonoran"),
			'frontpage' => true,
			'required' => true,
			'image' => 'front-page.png',
		),
		array(
			'name' => __("About", "sonoran"),
			'required' => false,
			'slug' => 'about',
			'image' => 'about.png',
		),
		array(
			'name' => __("Contact", "sonoran"),
			'required' => false,
			'slug' => 'contact',
			'image' => 'contact.png',
		),
		array(
			'name' => __("Blog", "sonoran"),
			'template_only' => true,
			'required' => true,
			'image' => 'blog.png',
		),
		array(
			'name' => __("Page", "sonoran"),
			'template_only' => true,
			'required' => true,
			'image' => 'pages.png',
		),
		array(
			'name' => __("Post", "sonoran"),
			'template_only' => true,
			'required' => true,
			'image' => 'posts.png',
		),
		array(
			'name' => __("Archives", "sonoran"),
			'template_only' => true,
			'required' => true,
			'image' => 'archives.png',
		),
		array(
			'name' => __("Search", "sonoran"),
			'template_only' => true,
			'required' => true,
			'image' => 'search.png',
		),
		array(
			'name' => __("404", "sonoran"),
			'template_only' => true,
			'required' => true,
			'image' => '404.png',
		),
	],
	'theme_url' => 'https://superbthemes.com/sonoran/',
	'demo_url' => 'https://superbthemes.com/demo/sonoran/'
]);
