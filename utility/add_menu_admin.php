
this funcs for add menu admin and delete first submenu

<?

//step 1: set hook admin_menu | f.e:
add_action('admin_menu', 'plugin_filter_link_register_menu');



//step 2: add menu and submenu for apis add_menu_page,add_submenu_page and delete first submenu with remove_submenu_page api | f.e:
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


    // add submenu page
    add_submenu_page(
        'filter-link-main',
        'تنظیمات',
        'تنظیمات',
        'manage_options',
        'filter-link-setting',
        'filter_link_page_setting'
    );
    
    
    // remove submenu page
    remove_submenu_page('filter-link-main', 'filter-link-main');
}

//callback functions (views)

function filter_link_page_dashboard()
{
    echo 'this is dashboard page';
}
function filter_link_page_setting()
{
    echo 'this is setting page';
}




