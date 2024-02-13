<?php
/**
 * Helper functions related to customizer and options.
 *
 * @package unique_pizza_shop
 */

if ( ! function_exists( 'unique_pizza_shop_get_global_layout_options' ) ) :

	/**
	 * Returns global layout options.
	 *
	 * @since 1.0.0 
	 *
	 * @return array Options array.
	 */
	function unique_pizza_shop_get_global_layout_options() {

		$choices = array(
			'left-sidebar'  => esc_html__( 'Primary Sidebar - Content', 'unique-pizza-shop' ),
			'right-sidebar' => esc_html__( 'Content - Primary Sidebar', 'unique-pizza-shop' ),
			'three-columns' => esc_html__( 'Three Columns', 'unique-pizza-shop' ),
			'four-columns' => esc_html__( 'Four Columns', 'unique-pizza-shop' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'unique-pizza-shop' ),
		);
		$output = apply_filters( 'unique_pizza_shop_filter_layout_options', $choices );
		return $output;

	}

endif;

if ( ! function_exists( 'unique_pizza_shop_get_archive_layout_options' ) ) :

	/**
	 * Returns archive layout options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function unique_pizza_shop_get_archive_layout_options() {

		$choices = array(
			'full'    => esc_html__( 'Full Post', 'unique-pizza-shop' ),
			'excerpt' => esc_html__( 'Post Excerpt', 'unique-pizza-shop' ),
		);
		$output = apply_filters( 'unique_pizza_shop_filter_archive_layout_options', $choices );
		if ( ! empty( $output ) ) {
			ksort( $output );
		}
		return $output;

	}

endif;

if ( ! function_exists( 'unique_pizza_shop_get_image_sizes_options' ) ) :

	/**
	 * Returns image sizes options.
	 *
	 * @since 1.0.0
	 *
	 * @param bool  $add_disable True for adding No Image option.
	 * @param array $allowed Allowed image size options.
	 * @return array Image size options.
	 */
	function unique_pizza_shop_get_image_sizes_options( $add_disable = true, $allowed = array(), $show_dimension = true ) {

		global $_wp_additional_image_sizes;
		$get_intermediate_image_sizes = get_intermediate_image_sizes();
		$choices = array();
		if ( true === $add_disable ) {
			$choices['disable'] = esc_html__( 'No Image', 'unique-pizza-shop' );
		}
		$choices['thumbnail'] = esc_html__( 'Thumbnail', 'unique-pizza-shop' );
		$choices['medium']    = esc_html__( 'Medium', 'unique-pizza-shop' );
		$choices['large']     = esc_html__( 'Large', 'unique-pizza-shop' );
		$choices['full']      = esc_html__( 'Full (original)', 'unique-pizza-shop' );

		if ( true === $show_dimension ) {
			foreach ( array( 'thumbnail', 'medium', 'large' ) as $key => $_size ) {
				$choices[ $_size ] = $choices[ $_size ] . ' (' . get_option( $_size . '_size_w' ) . 'x' . get_option( $_size . '_size_h' ) . ')';
			}
		}

		if ( ! empty( $_wp_additional_image_sizes ) && is_array( $_wp_additional_image_sizes ) ) {
			foreach ( $_wp_additional_image_sizes as $key => $size ) {
				$choices[ $key ] = $key;
				if ( true === $show_dimension ){
					$choices[ $key ] .= ' ('. $size['width'] . 'x' . $size['height'] . ')';
				}
			}
		}

		if ( ! empty( $allowed ) ) {
			foreach ( $choices as $key => $value ) {
				if ( ! in_array( $key, $allowed ) ) {
					unset( $choices[ $key ] );
				}
			}
		}

		return $choices;

	}

endif;


if ( ! function_exists( 'unique_pizza_shop_get_image_alignment_options' ) ) :

	/**
	 * Returns image options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function unique_pizza_shop_get_image_alignment_options() {

		$choices = array(
			'none'   => _x( 'None', 'alignment', 'unique-pizza-shop' ),
			'left'   => _x( 'Left', 'alignment', 'unique-pizza-shop' ),
			'center' => _x( 'Center', 'alignment', 'unique-pizza-shop' ),
			'right'  => _x( 'Right', 'alignment', 'unique-pizza-shop' ),
		);
		return $choices;

	}

endif;

if ( ! function_exists( 'unique_pizza_shop_get_featured_slider_transition_effects' ) ) :

	/**
	 * Returns the featured slider transition effects.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function unique_pizza_shop_get_featured_slider_transition_effects() {

		$choices = array(
			'fade'       => _x( 'fade', 'transition effect', 'unique-pizza-shop' ),
			'fadeout'    => _x( 'fadeout', 'transition effect', 'unique-pizza-shop' ),
			'none'       => _x( 'none', 'transition effect', 'unique-pizza-shop' ),
			'scrollHorz' => _x( 'scrollHorz', 'transition effect', 'unique-pizza-shop' ),
		);
		$output = apply_filters( 'unique_pizza_shop_filter_featured_slider_transition_effects', $choices );

		if ( ! empty( $output ) ) {
			ksort( $output );
		}

		return $output;

	}

endif;

if ( ! function_exists( 'unique_pizza_shop_get_featured_slider_content_options' ) ) :

	/**
	 * Returns the featured slider content options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function unique_pizza_shop_get_featured_slider_content_options() {

		$choices = array(
			'home-page' => esc_html__( 'Static Front Page Only', 'unique-pizza-shop' ),
			'disabled'  => esc_html__( 'Disabled', 'unique-pizza-shop' ),
		);
		$output = apply_filters( 'unique_pizza_shop_filter_featured_slider_content_options', $choices );
		if ( ! empty( $output ) ) {
			ksort( $output );
		}
		return $output;

	}

endif;

if ( ! function_exists( 'unique_pizza_shop_get_featured_slider_type' ) ) :

	/**
	 * Returns the featured slider type.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function unique_pizza_shop_get_featured_slider_type() {

		$choices = array(
			'featured-page' => __( 'Featured Pages', 'unique-pizza-shop' ),
		);

		$output = apply_filters( 'unique_pizza_shop_filter_featured_slider_type', $choices );

		if ( ! empty( $output ) ) {
			ksort( $output );
		}

		return $output;

	}

endif;

if ( ! function_exists( 'unique_pizza_shop_get_numbers_dropdown_options' ) ) :

	/**
	 * Returns numbers dropdown options.
	 *
	 * @since 1.0.0
	 *
	 * @param int $min Min.
	 * @param int $max Max.
	 * @param string $prefix Prefix.
	 * @param string $suffix Suffix.
	 *
	 * @return array Options array.
	 */
	function unique_pizza_shop_get_numbers_dropdown_options( $min = 1, $max = 4, $prefix = '', $suffix = '' ) {

		$output = array();

		if ( $min <= $max ) {
			for ( $i = $min; $i <= $max; $i++ ) {
				$string = $prefix . $i . $suffix;
				$output[ $i ] = $string;
			}
		}

		return $output;

	}

endif;