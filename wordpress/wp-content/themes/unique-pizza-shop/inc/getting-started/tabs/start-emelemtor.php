<?php
/**
 * Start Elementor.
 *
 */
?>
<!-- Start Elementor -->
<div id="start-panel" class="panel-left visible">
    <div id="unique-pizza-shop-importer" class="tabcontent open">
        <?php if(!class_exists('Mizan_Importer_ThemeWhizzie')){
            $plugin_ins = Unique_Pizza_Shop_Plugin_Activation_Mizan_Demo_Importor::get_instance();
            $unique_pizza_shop_actions = $plugin_ins->recommended_actions;
            ?>
            <div class="unique-pizza-shop-recommended-plugins ">
                    <div class="unique-pizza-shop-action-list">
                        <?php if ($unique_pizza_shop_actions): foreach ($unique_pizza_shop_actions as $key => $unique_pizza_shop_actionValue): ?>
                                <div class="unique-pizza-shop-action" id="<?php echo esc_attr($unique_pizza_shop_actionValue['id']);?>">
                                    <div class="action-inner plugin-activation-redirect">
                                        <h3 class="action-title"><?php echo esc_html($unique_pizza_shop_actionValue['title']); ?></h3>
                                        <div class="action-desc"><?php echo esc_html($unique_pizza_shop_actionValue['desc']); ?></div>
                                        <?php echo wp_kses_post($unique_pizza_shop_actionValue['link']); ?>
                                    </div>
                                </div>
                            <?php endforeach;
                        endif; ?>
                    </div>
            </div>
        <?php }else{ ?>
            <div class="tab-outer-box">
                <h3><?php esc_html_e('Welcome to MizanThemes', 'unique-pizza-shop'); ?></h3>
                <p class="start-text"><?php esc_html_e('The demo will import after you click the Start Quickly button.', 'unique-pizza-shop'); ?></p>
                <div class="info-link">
                    <a  href="<?php echo esc_url( admin_url('admin.php?page=mizandemoimporter-wizard') ); ?>"><?php esc_html_e('Start Quickly', 'unique-pizza-shop'); ?></a>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
