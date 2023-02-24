add page setting standard in wordpress with 3 steps;
source : https://developer.wordpress.org/plugins/settings/custom-settings-page/
in this sample add two section setting with names "Merchant_ID" and "Key_API"

<?php

//step 1: init ; use admin_init and register
add_action('admin_init', 'zarinpal_setting_init');
function zarinpal_setting_init()
{

    $args = [
        'type' => 'string',
        'sanitize_callback' => 'sanitize_text_field',
        'default' => NULL,
    ];
    register_setting('getaway_settings', '_merchent_id_zarinpal', $args);
    register_setting('getaway_settings', '_api_key_zarinpal', $args);
 

    add_settings_section(
        'zarinpal_merchent_id',
        '',
        'zarinpal_merchant_id_html',
        'getaway_setting'
    );
    add_settings_section(
        'zarinpal_api_key',
        '',
        'zarinpal_api_key_html',
        'getaway_setting'
    );
}


//step 2: html body ; use callback function sections or fields and write html body
function zarinpal_merchant_id_html()
{
    $merchant=get_option('_merchent_id_zarinpal');
    ?>
    <label for="merchant_zarinpal">کد درگاه </label>

    <input id="merchant_zarinpal" type="text" name="_merchent_id_zarinpal" value="<?php echo isset($merchant) ? esc_attr($merchant) : ''  ?>">

    <?php
}
function zarinpal_api_key_html()
{

    $api=get_option('_api_key_zarinpal');
    ?>

    <label for="api_zarinpal">کد api </label>

    <input id="api_zarinpal" type="text" name="_api_key_zarinpal" value="<?php echo isset($api) ? esc_attr($api) : ''  ?>">

    <?php
}



//step 3: save ; add submenu and save in table options DB
add_action('admin_menu', 'add_submenu_zarinpal');
function add_submenu_zarinpal()
{

    add_submenu_page(
        'options-general.php', //this is slug defult menu in wordpress
        'صفحه تنظیمات درگاه زرین پال',
        'درگاه زرین پال',
        'manage_options',
        'options_zarinpal',
        'options_zarinpal_callback',
        ''
    );
}

function options_zarinpal_callback()
{
    // check user capabilities
    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }

    ?>
    <div class="wrap">//defult wordpress
      
        <form action="options.php" method="post">
            <h1 style="font-family: IRANSansWeb">کد درگاه پرداخت زرین پال</h1>
            <?php
  
            settings_fields('getaway_settings');
            do_settings_sections('getaway_setting');
            submit_button('ذخیره اطلاعات');

            ?>
        </form>
    </div>
    <?php
}


// end;













?>
