<?php 

if (!function_exists('fygaro_donation_post_listing')) {

    function fygaro_donation_post_listing () {

        global $wpdb;

        wp_enqueue_script('fygaro-script', plugins_url(PLUGIN_NAME).'/assets/js/main.js', ['jquery'], false, true);

        $fygaroes = get_posts([
            'post_type' => 'fygaro_donations',
            'meta_key' => 'fd'
        ]);

?>

        <div class="container-fluid">
            <div class="row">
                <?php foreach ($fygaroes as $key => $fygaro): $meta = get_post_meta($fygaro->ID, 'fd', true); $meta = unserialize($meta); ?>
                    <div class="col-md-4">
                        <div class="thumbnail">
                            <img src="<?= get_the_post_thumbnail_url($fygaro, 'post-thumbnail') ?>" />
                            <div class="caption">
                                <h3><?= $fygaro->post_title ?></h3>
                                <p><?= $fygaro->post_content ?></p>
                                <p class="form-inline">
                                    <span class="form-group">
                                        <select class="form-control fygaro-donation-select">
                                            <?php foreach ($meta as $i => $mv): ?>
                                                <option value="<?= $mv['link'] ?>"><?= $mv['currency']. ' $'. $mv['amount']; ?></option>
                                            <?php endforeach; ?>
                                        </select> 
                                        &nbsp; <a href="<?= $meta[0]['link']; ?>" class="btn btn-primary">Donate</a>
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

<?php

    }

}

add_shortcode('fygaro_donations_listing', 'fygaro_donation_post_listing');