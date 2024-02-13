<?php
/**
 * The Secondary Sidebar.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package unique_pizza_shop
 */

?>
<?php $default_sidebar = apply_filters( 'unique_pizza_shop_filter_default_sidebar_id', 'sidebar-2', 'secondary' ); ?>
<div id="sidebar-secondary" class="widget-area sidebar" role="complementary">
	<?php if ( is_active_sidebar( $default_sidebar ) ) : ?>
		<?php dynamic_sidebar( $default_sidebar ); ?>
	<?php else : ?>
		<?php
			do_action( 'unique_pizza_shop_action_default_sidebar', $default_sidebar, 'secondary' );
		?>
	<?php endif ?>
</div>

<?php $default_sidebar1 = apply_filters( 'unique_pizza_shop_filter_default_sidebar_id1', 'sidebar-3', 'secondary1' ); ?>
<div id="sidebar-secondary1" class="widget-area sidebar" role="complementary">
	<?php if ( is_active_sidebar( $default_sidebar1 ) ) : ?>
		<?php dynamic_sidebar( $default_sidebar1 ); ?>
	<?php else : ?>
		<?php
			do_action( 'unique_pizza_shop_action_default_sidebar1', $default_sidebar1, 'secondary' );
		?>
	<?php endif ?>
</div>