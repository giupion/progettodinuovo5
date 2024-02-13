jQuery(document).ready(function($) {
    'use strict';
    var this_obj = unique_pizza_shop_plugin_activate_plugin;

    $('#Mizan_Demo_Importor_editor .plugin-activation-redirect a').addClass('mdi-redirect-to-dashboard');

    $(document).on('click', '.unique-pizza-shop-plugin-install', function(event) {

        event.preventDefault();
        var button = $(this);
        var slug = button.data('slug');
        button.text(this_obj.installing + '...').addClass('updating-message');
        wp.updates.installPlugin({
            slug: slug,
            success: function(data) {
                button.attr('href', data.activateUrl);
                button.text(this_obj.activating + '...');
                button.removeClass('button-secondary updating-message unique-pizza-shop-plugin-install');
                button.addClass('button-primary unique-pizza-shop-plugin-activate');
                button.trigger('click');
            },
            error: function(data) {
                jQuery('.unique-pizza-shop-recommended-plugins .unique-pizza-shop-activation-note').css('display','block');
                //console.log('error', data);
                button.removeClass('updating-message');
                button.text(this_obj.error);
            },
        });
    });

    $(document).on('click', '.unique-pizza-shop-plugin-activate', function(event) {
        var redirect_class = jQuery(this).attr('class');
        var data_plugin = jQuery(this).attr('data-slug');

        let redirect_url = '#';
        if ( data_plugin == 'mizan-demo-importer' ) {
          redirect_url = this_obj.addon_admin_url;
        } 

        event.preventDefault();
        var button = $(this);
        var url = button.attr('href');
        if (typeof url !== 'undefined') {
            // Request plugin activation.
            jQuery.ajax({
                async: true,
                type: 'GET',
                url: url,
                beforeSend: function() {
                    button.text(this_obj.activating + '...');
                    button.removeClass('button-secondary');
                    button.addClass('button-primary activate-now updating-message');
                },
                success: function(data) {
                    if(redirect_class.indexOf('mdi-redirect-to-dashboard') != -1){
                        location.href = redirect_url;
                    }else{
                        location.reload();
                    }
                }
            });
        }
    });

   
    jQuery('.mizandemoimporter-dashboard-page-btn').click(function(){
        location.href = this_obj.mizandemoimporter_admin_url;
    });
});
