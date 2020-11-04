<?php 

if (!function_exists('fygaro_donations_save')) {

    function fygaro_donations_save ($post_id, $post, $update) {
        
        if (isset($_POST['fd']) && is_array($_POST['fd'])) {

            $meta = serialize($_POST['fd']);
            update_post_meta($post_id, 'fd', $meta);

        }

    }

}

add_action('save_post_fygaro_donations', 'fygaro_donations_save', 10, 3);