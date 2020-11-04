<?php 

if (!function_exists('fygaro_donations_metabox_links')) {

    function fygaro_donations_metabox_links () {

        add_meta_box(
            'fygaro-donation-link',
            'Fygaro',
            'fygaro_donations_metabox_links_callback'
        );
    }

}

if (!function_exists('fygaro_donations_metabox_links_callback')) {

    function fygaro_donations_metabox_links_callback () { 

        global $post;
        $fd = get_post_meta($post->ID, 'fd', true);
        $fd = $fd ? json_encode(unserialize($fd)) : json_encode([]);
        wp_add_inline_script('fygaro-admin-script', 'var  fd_admin_app = null;', 'before');
        wp_add_inline_script('fygaro-admin-script', "fd_admin_app.links = $fd;", 'after');
    ?>
    
    <div id="fygaro_links">
        <table cellpadding="0" cellspacing="10" width="100%">
            <thead>
                <tr>
                    <th align="left">Currency</th>
                    <th align="left">Amount</th>
                    <th align="left">Buy Now Link</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(link, key) in links">
                    <td>
                        <select :name="'fd['+key+'][currency]'">
                            <option :value="currency.value" v-for="currency in currencies" :selected="link.currency == currency.value">{{ currency.value }}</option>
                        </select>
                    </td>
                    <td><label><input :name="'fd['+key+'][amount]'" :value="link.amount" /></label></td>
                    <td><label><input :name="'fd['+key+'][link]'" :value="link.link" /></label></td>
                    <td></td>
                </tr>
            </tbody>
            <tfoot>
                <tr><td colspan="4"><button type="button" v-on:click="links.push({});">Add New</button</td>
            </tfoot>
        </table>
    </div>
<?php }

}



