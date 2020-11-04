<?php 

if (!function_exists('fygaro_donations_admin_enqueue')) {

    function fygaro_donations_admin_enqueue () {

        if (WP_DEBUG) {
            wp_register_script('fygaro-vue-script', plugins_url(PLUGIN_NAME).'/assets/js/vue.js', false, false);
        } else {
            wp_register_script('fygaro-vue-script', plugins_url(PLUGIN_NAME).'/assets/js/vue.min.js', false, false);
        }

        wp_register_script('fygaro-admin-script', plugins_url(PLUGIN_NAME).'/assets/js/admin.js', false, true);

        wp_enqueue_script('fygaro-vue-script');
        wp_enqueue_script('fygaro-admin-script', null, ['jquery'], false, true);

    }

}
add_action('admin_enqueue_scripts', 'fygaro_donations_admin_enqueue');
add_action('wp_footer', function ($post) {
    echo $post;
});