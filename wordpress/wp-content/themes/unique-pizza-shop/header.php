<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package unique_pizza_shop
 */

?>
<?php
	/**
	 * Hook - unique_pizza_shop_action_doctype.
	 *
	 * @hooked unique_pizza_shop_doctype -  10
	 */
	do_action( 'unique_pizza_shop_action_doctype' );
?>
<head>
	<?php
	/**
	 * Hook - unique_pizza_shop_action_head.
	 *
	 * @hooked unique_pizza_shop_head -  10
	 */
	do_action( 'unique_pizza_shop_action_head' );
	?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php do_action( 'wp_body_open' ); ?>

	<?php 
	$show_preloader = unique_pizza_shop_get_option( 'show_preloader_setting' );
        if ( true === $show_preloader ) : ?>
			<div id="preloader" class="loader-head">
				<div class="preloader">
				    <div class="spinner"></div>
				    <div class="spinner-2"></div>
				</div>
			</div>
	<?php endif; ?>

	<?php
	/**
	 * Hook - unique_pizza_shop_action_before.
	 *
	 * @hooked unique_pizza_shop_page_start - 10
	 * @hooked unique_pizza_shop_skip_to_content - 15
	 */
	do_action( 'unique_pizza_shop_action_before' );
	?>

    <?php
	  /**
	   * Hook - unique_pizza_shop_action_before_header.
	   *
	   * @hooked unique_pizza_shop_header_start - 10
	   */
	  do_action( 'unique_pizza_shop_action_before_header' );
	?>
		<?php
		/**
		 * Hook - unique_pizza_shop_action_header.
		 *
		 * @hooked unique_pizza_shop_site_branding - 10
		 */
		do_action( 'unique_pizza_shop_action_header' );
		?>
    <?php
	  /**
	   * Hook - unique_pizza_shop_action_after_header.
	   *
	   * @hooked unique_pizza_shop_header_end - 10
	   */
	  do_action( 'unique_pizza_shop_action_after_header' );
	?>

	<?php
	/**
	 * Hook - unique_pizza_shop_action_before_content.
	 *
	 * @hooked unique_pizza_shop_content_start - 10
	 */
	do_action( 'unique_pizza_shop_action_before_content' );
	?>

	<!-- <?php
	  /**
	   * Hook - unique_pizza_shop_action_content.
	   */
	  do_action( 'unique_pizza_shop_action_content' );
	?> -->

