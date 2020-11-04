<?php 

if (!function_exists('fygaro_donations_custom_init')) {

    function fygaro_donations_custom_init () {

        $args = [
            'label' => 'Fygaro Donations',
            'show_ui' => true,
            'show_in_menu' => true,
            'menu_icon' => plugins_url(PLUGIN_NAME) . '/assets/img/icon.png',
            'supports'  => ['editor', 'thumbnail', 'title'],
            'register_meta_box_cb' => 'fygaro_donations_metabox_links'
        ];
    
        register_post_type('fygaro_donations', $args);
    
    }

}

add_action('init', 'fygaro_donations_custom_init');