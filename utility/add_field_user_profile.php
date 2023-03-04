<?php

/*if you want to add field setting in profile.php you should use to hooks:
 * 1. show_user_profile for show custom field
 * 2. edit_user_profile for save data custom field
 */

function custom_field_setting($user){
    echo 'new field'.$user->ID;
    print_r($user);
    
}
add_action('show_user_profile','custom_field_setting');
add_action('edit_user_profile','custom_field_setting');
