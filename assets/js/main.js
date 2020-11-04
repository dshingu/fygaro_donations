jQuery(document).ready(function () {

    jQuery('.fygaro-donation-select').on('change', function (e) {
        jQuery(this).next().attr('href', jQuery(this).val());
    });

});