<?

#this funcs for add menu admin and delete first submenu



add_action('admin_menu', 'plugin_filter_link_register_menu');

function plugin_filter_link_register_menu()
{
    add_menu_page(
        'پلاگین فیلتر لینک',
        'فیلتر لینک',
        'manage_options',
        'filter-link-main',
        'filter_link_page_dashboard',
        'dashicons-admin-links' // for icon wordpress: https://developer.wordpress.org/resource/dashicons/#admin-links
    
    );


    #setting page
    add_submenu_page(
        'filter-link-main',
        'تنظیمات',
        'تنظیمات',
        'manage_options',
        'filter-link-setting',
        'filter_link_page_setting'
    );
    
    remove_submenu_page('filter-link-main', 'filter-link-main');
}


function filter_link_page_dashboard()
{
    echo 'this is dashboard page';
}


function filter_link_page_setting()
{
    echo 'this is setting page';
}
