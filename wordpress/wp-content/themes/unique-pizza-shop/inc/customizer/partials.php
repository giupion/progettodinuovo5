<?php
/**
 * Customizer partials.
 *
 * @package unique_pizza_shop
 */

/**
 * Render the site title for the selective refresh partial.
 *
 * @since 1.0.0
 *
 * @return void
 */
function unique_pizza_shop_customize_partial_blogname() {

	bloginfo( 'name' );

}

/**
 * Render the site title for the selective refresh partial.
 *
 * @since 1.0.0
 *
 * @return void
 */
function unique_pizza_shop_customize_partial_blogdescription() {

	bloginfo( 'description' );

}

/**
 * Partial for copyright text.
 *
 * @since 1.0.0
 *
 * @return void
 */
function unique_pizza_shop_render_partial_copyright_text() {

	$copyright_text = unique_pizza_shop_get_option( 'copyright_text' );
	$copyright_text = apply_filters( 'unique_pizza_shop_filter_copyright_text', $copyright_text );
	if ( ! empty( $copyright_text ) ) {
		$copyright_text = wp_kses_data( $copyright_text );
	}
	echo $copyright_text;

}
