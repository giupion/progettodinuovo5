<?php
/**
 * Custom theme functions.
 *
 * This file contains hook functions attached to theme hooks.
 *
 * @package unique_pizza_shop
 */

if ( ! function_exists( 'unique_pizza_shop_skip_to_content' ) ) :
	/**
	 * Add Skip to content.
	 *
	 * @since 1.0.0
	 */
	function unique_pizza_shop_skip_to_content() {
	?><a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'unique-pizza-shop' ); ?></a><?php
	}
endif;

add_action( 'unique_pizza_shop_action_before', 'unique_pizza_shop_skip_to_content', 15 );

// Top Header

if ( ! function_exists( 'unique_pizza_shop_header_top_content' ) ) :

	/**
	 * Header Top.
	 *
	 * @since 1.0.0
	 */
	function unique_pizza_shop_header_top_content() {
		$phone_number_title = unique_pizza_shop_get_option( 'phone_number_title' );
		$email_address_title = unique_pizza_shop_get_option( 'email_address_title' );
		$discount_text = unique_pizza_shop_get_option( 'discount_text' );
		?>
		<?php $show_header_top = unique_pizza_shop_get_option( 'show_header_top' ); ?>
		<?php if ( true === $show_header_top ) :  ?>
		<section id="header" class="py-3">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-12 align-self-center text-md-start text-center left-box">
						<?php if( !empty($email_address_title) ):?>
						    <span class="me-3"><span class="dashicons dashicons-email me-2"></span><a href="mailto:<?php echo esc_html($email_address_title);?>"><?php echo esc_html($email_address_title);?></a></span>
						<?php endif;?>
						<?php if( !empty($phone_number_title) ):?>
						    <span><span class="dashicons dashicons-phone me-2"></span><a href="tel:<?php echo esc_html($phone_number_title);?>"><?php echo esc_html($phone_number_title);?><?php?></a></span>
						<?php endif;?>
					</div>
					<div class="col-lg-6 col-md-6 col-12 align-self-center text-md-end text-center right-box">
						<?php if( !empty($discount_text) ):?>
						    <span class="me-3"><?php echo esc_html($discount_text);?></span>
						<?php endif;?>
						<?php if ( class_exists( 'woocommerce' ) ) {?>
							<a class="cart-customlocation" href="<?php if(function_exists('wc_get_cart_url')){ echo esc_url(wc_get_cart_url()); } ?>" title="<?php esc_attr_e( 'View Shopping Cart','unique-pizza-shop' ); ?>"><span class="cart-item-box"><?php esc_html_e('Add to Cart','unique-pizza-shop'); ?><span class="mx-2 dashicons dashicons-cart"></span>( <?php echo esc_html(wp_kses_data( WC()->cart->get_cart_contents_count() ));?> )</span></a>
						<?php }?>
					</div>
				</div>
			</div>
		</section>
		<?php endif; ?>
		<?php
	}

endif;

add_action( 'unique_pizza_shop_action_before_header', 'unique_pizza_shop_header_top_content', 5 );

// Top Header end

// Middle Header

if ( ! function_exists( 'unique_pizza_shop_site_branding' ) ) :

	/**
	 * Site branding.
	 *
	 * @since 1.0.0
	 */
	function unique_pizza_shop_site_branding() {
		$data_sticky = unique_pizza_shop_get_option( 'show_data_sticky_setting' );
		?>

		<!-- responsive menu -->
		<div id="middle-header" data-sticky= "<?php echo esc_attr($data_sticky); ?>">
			<div class="container">
				<div class="row">
				    <div class="col-lg-4  col-md-4 align-self-center">
					    <div class="site-branding">
							<?php unique_pizza_shop_the_custom_logo(); ?>
							<?php $show_title = unique_pizza_shop_get_option( 'show_title' ); ?>
							<?php $show_tagline = unique_pizza_shop_get_option( 'show_tagline' ); ?>
							<?php if ( true === $show_title || false === $show_tagline ) :  ?>
								<div id="site-identity">
									<?php if ( true === $show_title ) :  ?>
										<?php if ( is_front_page() ) : ?>
											<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
										<?php else : ?>
											<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
										<?php endif; ?>
									<?php endif; ?>
									<?php if ( true === $show_tagline ) :  ?>
										<p class="site-description"><?php bloginfo( 'description' ); ?></p>
									<?php endif; ?>
								</div>
							<?php endif; ?>
					    </div>
					</div>

					<!-- right menu -->
					<div class="col-lg-8 col-md-8 align-self-center">
						<div class="toggle-menu gb_menu text-md-right">
							<button onclick="unique_pizza_shop_gb_Menu_open()" class="gb_toggle p-2"><?php esc_html_e('Menu','unique-pizza-shop'); ?></button>
						</div>
						<div id="gb_responsive" class="nav side_gb_nav">
							<nav id="top_gb_menu" class="gb_nav_menu" role="navigation" aria-label="<?php esc_attr_e( 'Menu', 'unique-pizza-shop' ); ?>">
								<?php 
								    wp_nav_menu( array( 
										'theme_location' => 'primary-menu',
										'container_class' => 'gb_navigation clearfix' ,
										'menu_class' => 'clearfix',
										'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav mb-0 px-0">%3$s</ul>',
										'fallback_cb' => 'wp_page_menu',
								    ) ); 
								?>
								<a href="javascript:void(0)" class="closebtn gb_menu" onclick="unique_pizza_shop_gb_Menu_close()">x<span class="screen-reader-text"><?php esc_html_e('Close Menu','unique-pizza-shop'); ?></span></a>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</div>

	    <?php
	}

endif;

add_action( 'unique_pizza_shop_action_header', 'unique_pizza_shop_site_branding' );


/////////////////////////////////// copyright start/////////////////////////////

if ( ! function_exists( 'unique_pizza_shop_footer_copyright' ) ) :

	/**
	 * Footer copyright
	 *
	 * @since 1.0.0
	 */
	function unique_pizza_shop_footer_copyright() {

		// Check if footer is disabled.
		$footer_status = apply_filters( 'unique_pizza_shop_filter_footer_status', true );
		if ( true !== $footer_status ) {
			return;
		}

		// Copyright content.
		$copyright_text = unique_pizza_shop_get_option( 'copyright_text' );
		$copyright_text = apply_filters( 'unique_pizza_shop_filter_copyright_text', $copyright_text );
		if ( ! empty( $copyright_text ) ) {
			$copyright_text = wp_kses_data( $copyright_text );
		}

		// Powered by content.
		$powered_by_text = sprintf( __( 'Unique Pizza Shop by %s', 'unique-pizza-shop' ), '<span>' . __( 'Mizan Themes', 'unique-pizza-shop' ) . '</span>' );
		?>

		<div class="colophon-inner">
		    <?php if ( ! empty( $copyright_text ) ) : ?>
			    <div class="colophon-column">
			    	<div class="copyright">
			    		<?php echo $copyright_text; ?>
			    	</div><!-- .copyright -->
			    </div><!-- .colophon-column -->
		    <?php endif; ?>

		    <?php if ( ! empty( $powered_by_text ) ) : ?>
			    <div class="colophon-column">
			    	<div class="site-info">
			    		<a href="<?php echo esc_url('https://www.mizanthemes.com/elementor/free-pizza-wordpress-theme/','unique-pizza-shop'); ?>"><?php echo $powered_by_text; ?></a>
			    	</div><!-- .site-info -->
			    </div><!-- .colophon-column -->
		    <?php endif; ?>

		</div><!-- .colophon-inner -->

	    <?php
	}

endif;

add_action( 'unique_pizza_shop_action_footer', 'unique_pizza_shop_footer_copyright', 10 );

// /////////////////////////////////sidebar//////////////////


if ( ! function_exists( 'unique_pizza_shop_add_sidebar' ) ) :

	/**
	 * Add sidebar.
	 *
	 * @since 1.0.0
	 */
	function unique_pizza_shop_add_sidebar() {

		global $post;

		$global_layout = unique_pizza_shop_get_option( 'global_layout' );
		$global_layout = apply_filters( 'unique_pizza_shop_filter_theme_global_layout', $global_layout );

		// Check if single.
		if ( $post && is_singular() ) {
			$post_options = get_post_meta( $post->ID, 'unique_pizza_shop_theme_settings', true );
			if ( isset( $post_options['post_layout'] ) && ! empty( $post_options['post_layout'] ) ) {
				$global_layout = $post_options['post_layout'];
			}
		}

		// Include primary sidebar.
		if ( 'no-sidebar' !== $global_layout ) {
			get_sidebar();
		}
		// Include Secondary sidebar.
		switch ( $global_layout ) {
			case 'three-columns':
			get_sidebar( 'secondary' );
			break;

			default:
			break;
		}

		// Include Secondary sidebar.
		switch ( $global_layout ) {
			case 'four-columns':
			get_sidebar( 'secondary' );
			break;

			default:
			break;
		}

	}

endif;

add_action( 'unique_pizza_shop_action_sidebar', 'unique_pizza_shop_add_sidebar' );

//////////////////////////////////////// single page


if ( ! function_exists( 'unique_pizza_shop_add_image_in_single_display' ) ) :

	/**
	 * Add image in single post.
	 *
	 * @since 1.0.0
	 */
	function unique_pizza_shop_add_image_in_single_display() {

		global $post;

		if ( has_post_thumbnail() ) {

			$values = get_post_meta( $post->ID, 'unique_pizza_shop_theme_settings', true );
			$unique_pizza_shop_theme_settings_single_image = isset( $values['single_image'] ) ? esc_attr( $values['single_image'] ) : '';

			if ( ! $unique_pizza_shop_theme_settings_single_image ) {
				$unique_pizza_shop_theme_settings_single_image = unique_pizza_shop_get_option( 'single_image' );
			}

			if ( 'disable' !== $unique_pizza_shop_theme_settings_single_image ) {
				$args = array(
					'class' => 'aligncenter',
				);
				the_post_thumbnail( esc_attr( $unique_pizza_shop_theme_settings_single_image ), $args );
			}
		}

	}

endif;

add_action( 'unique_pizza_shop_single_image', 'unique_pizza_shop_add_image_in_single_display' );

if ( ! function_exists( 'unique_pizza_shop_footer_goto_top' ) ) :

	/**
	 * Go to top.
	 *
	 * @since 1.0.0
	 */
	function unique_pizza_shop_footer_goto_top() {
		$show_scroll_to_top = unique_pizza_shop_get_option( 'show_scroll_to_top' );
        if ( true === $show_scroll_to_top ) :
			echo '<a href="#page" class="scrollup" id="btn-scrollup"><i class="fa fa-angle-up"><span class="screen-reader-text">' . esc_html__( 'Scroll Up', 'unique-pizza-shop' ) . '</span></i></a>';
	    endif;
	}

endif;

add_action( 'unique_pizza_shop_action_after', 'unique_pizza_shop_footer_goto_top', 20 );