<?php
require MDI_DIR . 'theme-wizard/tgm/class-tgm-plugin-activation.php';
/**
 * Recommended plugins.
 */
function mizan_importer_pro_register_recommended_plugins_set() {


	$plugins_arr = array(
		array(
			'name'             => __( 'Elementor', 'mizan-demo-importer' ),
			'slug'             => 'elementor',
			'required'         => true,
			'force_activation' => false,
		),
	);

	if ( file_exists( get_template_directory() . '/inc/plugins.json' ) ) {
		$plugins_json = file_get_contents( get_template_directory() . '/inc/plugins.json' );
		$plugins_json_decoded = json_decode($plugins_json, true);

		$plugins_arr = array();

		foreach ( $plugins_json_decoded as $plugins_arr_single ) {
			if ( isset( $plugins_arr_single['source'] ) ) {
				$plugins_arr_single['source'] = get_template_directory() . $plugins_arr_single['source'];
			}
			array_push( $plugins_arr, $plugins_arr_single );
		}

	}

	$mizan_importer_config = array();
	mizan_importer_tgmpa( $plugins_arr, $mizan_importer_config );
}
add_action( 'mizan_importer_tgmpa_register', 'mizan_importer_pro_register_recommended_plugins_set' );
