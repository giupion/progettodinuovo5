<?php
/**
 * Help Panel.
 *
 */
?>
<!-- Help file panel -->
<div id="help-panel" class="panel-left">
    <div class="panel-aside">
        <h4><?php esc_html_e( 'Theme Customizer', 'unique-pizza-shop' ); ?></h4>
        <p><?php esc_html_e( 'To begin customizing your website, start by clicking "Customize"', 'unique-pizza-shop' ); ?></p>
        <a class="button button-primary" href="<?php echo esc_url( admin_url('customize.php') ); ?>" title="<?php esc_attr_e( 'Visit the Demo', 'unique-pizza-shop' ); ?>" target="_blank">
            <?php esc_html_e( 'Customizing', 'unique-pizza-shop' ); ?>
        </a>
    </div><!-- .panel-aside -->

    <div class="panel-aside">
        <h4><?php esc_html_e( 'Support Ticket', 'unique-pizza-shop' ); ?></h4>
        <p><?php esc_html_e( 'Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme', 'unique-pizza-shop' ); ?></p>
        <a class="button button-primary" href="<?php echo esc_url( UNIQUE_PIZZA_SHOP_SUPPORT ); ?>" title="<?php esc_attr_e( 'Visit the Support', 'unique-pizza-shop' ); ?>" target="_blank">
            <?php esc_html_e( 'Contact Support', 'unique-pizza-shop' ); ?>
        </a>
    </div><!-- .panel-aside -->

    <div class="panel-aside">
        <h4><?php esc_html_e( 'Reviews & Testimonials', 'unique-pizza-shop' ); ?></h4>
        <p><?php esc_html_e( 'All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'unique-pizza-shop' ); ?></p>
        <a class="button button-primary" href="<?php echo esc_url( UNIQUE_PIZZA_SHOP_REVIEW ); ?>" title="<?php esc_attr_e( 'Visit the Demo', 'unique-pizza-shop' ); ?>" target="_blank">
            <?php esc_html_e( 'Review', 'unique-pizza-shop' ); ?>
        </a>
    </div><!-- .panel-aside -->
</div>
