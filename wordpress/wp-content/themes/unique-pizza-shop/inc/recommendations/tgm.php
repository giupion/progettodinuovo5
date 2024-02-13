<?php
	
require get_template_directory() . '/inc/recommendations/class-tgm-plugin-activation.php';

/**
 * Recommended plugins.
 */
function unique_pizza_shop_register_recommended_plugins() {
	$plugins = array(
		array(
			'name'             => __( 'Mizan Demo Importor', 'unique-pizza-shop' ),
			'slug'             => 'mizan-demo-importer',
			'required'         => false,
			'force_activation' => false,
		),
		array(
			'name'             => __( 'ElementsKit Lite', 'unique-pizza-shop' ),
			'slug'             => 'elementskit-lite',
			'required'         => false,
			'force_activation' => false,
		),
		array(
			'name'             => __( 'Prime Slider', 'unique-pizza-shop' ),
			'slug'             => 'bdthemes-prime-slider-lite',
			'required'         => false,
			'force_activation' => false,
		),
	);
	$config = array();
	unique_pizza_shop_tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'unique_pizza_shop_register_recommended_plugins' );