<?php

function foodify_pattern_styles()
{
	wp_enqueue_style('foodify-patterns', get_stylesheet_directory_uri() . '/assets/css/patterns.css', array(), filemtime(get_template_directory() . '/assets/css/patterns.css'));
	if (is_admin()) {
		global $pagenow;
		if ('site-editor.php' === $pagenow) {
			// Do not enqueue editor style in site editor
			return;
		}
		wp_enqueue_style('foodify-editor', get_stylesheet_directory_uri() . '/assets/css/editor.css', array(), filemtime(get_template_directory() . '/assets/css/editor.css'));
	}
}
add_action('enqueue_block_assets', 'foodify_pattern_styles');


add_theme_support('wp-block-styles');


// Register customer Foodify pattern categories
function foodify_register_block_pattern_categories()
{
	register_block_pattern_category(
		'heros',
		array(
			'label'       => __('Heros', 'foodify'),
			'description' => __('Foodify hero patterns', 'foodify'),
		)
	);
	register_block_pattern_category(
		'navigation_headers',
		array(
			'label'       => __('Headers', 'foodify'),
			'description' => __('Foodify navigation header patterns', 'foodify'),
		)
	);
	register_block_pattern_category(
		'teams',
		array(
			'label'       => __('Teams', 'foodify'),
			'description' => __('Foodify team patterns', 'foodify'),
		)
	);
}

add_action('init', 'foodify_register_block_pattern_categories');
