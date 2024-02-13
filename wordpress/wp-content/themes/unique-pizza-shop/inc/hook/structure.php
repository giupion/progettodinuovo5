<?php
/**
 * Theme functions related to structure.
 *
 * This file contains structural hook functions.
 *
 * @package unique_pizza_shop
 */

if ( ! function_exists( 'unique_pizza_shop_doctype' ) ) :
	/**
	 * Doctype Declaration.
	 *
	 * @since 1.0.0
	 */
	function unique_pizza_shop_doctype() {
	?><!DOCTYPE html> <html <?php language_attributes(); ?>><?php
	}
endif;

add_action( 'unique_pizza_shop_action_doctype', 'unique_pizza_shop_doctype', 10 );


if ( ! function_exists( 'unique_pizza_shop_head' ) ) :
	/**
	 * Header Codes.
	 *
	 * @since 1.0.0
	 */
	function unique_pizza_shop_head() {
	?>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php
	}
endif;
add_action( 'unique_pizza_shop_action_head', 'unique_pizza_shop_head', 10 );

if ( ! function_exists( 'unique_pizza_shop_page_start' ) ) :
	/**
	 * Page Start.
	 *
	 * @since 1.0.0
	 */
	function unique_pizza_shop_page_start() {
	?>
    <div id="page" class="hfeed site">
    <?php
	}
endif;
add_action( 'unique_pizza_shop_action_before', 'unique_pizza_shop_page_start' );

if ( ! function_exists( 'unique_pizza_shop_page_end' ) ) :
	/**
	 * Page End.
	 *
	 * @since 1.0.0
	 */
	function unique_pizza_shop_page_end() {
	?></div><!-- #page --><?php
	}
endif;

add_action( 'unique_pizza_shop_action_after', 'unique_pizza_shop_page_end' );

if ( ! function_exists( 'unique_pizza_shop_content_start' ) ) :
	/**
	 * Content Start.
	 *
	 * @since 1.0.0
	 */
	function unique_pizza_shop_content_start() {
	?><div id="content" class="site-content"><?php if(!is_page_template( 'home-page-template.php' )) { ?><div class="container"><?php } ?><div class="inner-wrapper"><?php
	}
endif;
add_action( 'unique_pizza_shop_action_before_content', 'unique_pizza_shop_content_start' );


if ( ! function_exists( 'unique_pizza_shop_content_end' ) ) :
	/**
	 * Content End.
	 *
	 * @since 1.0.0
	 */
	function unique_pizza_shop_content_end() {
	?></div><!-- .inner-wrapper --></div><!-- .container --><?php if(!is_page_template( 'home-page-template.php' )) { ?></div><?php } ?><!-- #content --><?php
	}
endif;
add_action( 'unique_pizza_shop_action_after_content', 'unique_pizza_shop_content_end' );


if ( ! function_exists( 'unique_pizza_shop_header_start' ) ) :
	/**
	 * Header Start.
	 *
	 * @since 1.0.0
	 */
	function unique_pizza_shop_header_start() {
		?><header id="masthead" class="site-header" role="banner"><?php
	}
endif;
add_action( 'unique_pizza_shop_action_before_header', 'unique_pizza_shop_header_start' );

if ( ! function_exists( 'unique_pizza_shop_header_end' ) ) :
	/**
	 * Header End.
	 *
	 * @since 1.0.0
	 */
	function unique_pizza_shop_header_end() {
	?></div><!-- .container --></header><!-- #masthead --><?php
	}
endif;
add_action( 'unique_pizza_shop_action_after_header', 'unique_pizza_shop_header_end' );



if ( ! function_exists( 'unique_pizza_shop_footer_start' ) ) :
	/**
	 * Footer Start.
	 *
	 * @since 1.0.0
	 */
	function unique_pizza_shop_footer_start() {
		$footer_status = apply_filters( 'unique_pizza_shop_filter_footer_status', true );
		if ( true !== $footer_status ) {
			return;
		}
	?><footer id="colophon" class="site-footer" role="contentinfo"><div class="container"><?php
	}
endif;
add_action( 'unique_pizza_shop_action_before_footer', 'unique_pizza_shop_footer_start' );


if ( ! function_exists( 'unique_pizza_shop_footer_end' ) ) :
	/**
	 * Footer End.
	 *
	 * @since 1.0.0
	 */
	function unique_pizza_shop_footer_end() {
		$footer_status = apply_filters( 'unique_pizza_shop_filter_footer_status', true );
		if ( true !== $footer_status ) {
			return;
		}
	?></div><!-- .container --></footer><!-- #colophon --><?php
	}
endif;
add_action( 'unique_pizza_shop_action_after_footer', 'unique_pizza_shop_footer_end' );
