?>

#this funcs for add menu admin and delete first submenu



add_action('admin_menu', 'plugin_filter_link_register_menu');

function plugin_filter_link_register_menu()
{
    add_menu_page(
        'پلاگین فیلتر لینک',
        'فیلتر لینک',
        'manage_options',
        'filter-link-main',
        'filter_link_page_main',
        'dashicons-admin-links',
        null
    );

    #word-link
    add_submenu_page(
        'filter-link-main',
        'لینک کلمات',
        'لینک کلمات',
        'manage_options',
        'filter-link-convert-word',
        'filter_link_page_word_convert',
        1
    );

    #setting
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
}

function filter_link_page_word_convert()
{
    include FL_PATH_DIR_VIEWS . 'admin/word-convert.php';
    if (isset($_POST['btn_submit'])) {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            #sanitize textarea
            $words = sanitize_textarea_field($_POST['words']);

            #string to array
            $words=explode(',',$words);

            #delete empty value
            $words=array_filter($words);

            update_option('_fl_words_list',$words);

        }
    }
}

function filter_link_page_setting()
{
    echo 'this is setting page';
}
