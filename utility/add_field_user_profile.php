<?php
/*if you want to add field setting in profile.php you should use to hooks:
 * 1. show_user_profile for show custom field
 * 2. personal_options_update for save data custom field (user access)
 * or
 * 2.edit_user_profile_update for save data custom filed (admin access)
 */

//step 1: show field
add_action('show_user_profile','custom_field_setting');
function custom_field_setting($user){
    include FL_PATH_DIR_VIEWS.'admin/add_setting_user_profile.php';
}


//step 2: save data in usermeta table
add_action('personal_options_update','custom_field_setting_update');
function custom_field_setting_update($user_id){
    if(!current_user_can('edit_user',$user_id))
        return false;

    return update_user_meta($user_id,'ctr_number',sanitize_text_field($_POST['ctr_number']));

}






//include file:
<style>
    #ctr {
        margin-top: 20px;
        display: flex;
        align-items: baseline;
    }
    label {
        margin-left: 20px;
    }
</style>
<div class="wrap" id="ctr">
    <label style="margin-top: 20px">شماره شناسنامه</label>
    <input type="text" value="<?php echo esc_attr(get_user_meta($user->ID,'ctr_number',true))?>" name="ctr_number">

</div>
