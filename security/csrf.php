this code for prevention attack CSRF and INJECTION in wordpress;

example:

<?php

function fl_register_meta_boxes()
{

    add_meta_box(
        'fl_video_url_meta_box',
        'لینک ویدیو',
        'fl_video_url_callback_html',
        '',
        'normal',
        'high',
        ''
    );

    add_meta_box(
        'fl_price_meta_box',
        'قیمت',
        'fl_price_callback_html',
        '',
        'normal',
        'high',
        ''
    );

}

function fl_video_url_callback_html($post)
{
    #Add an nonce field
    wp_nonce_field('fl_nonce_action_video_url', 'fl_nonce_name_video_url');
    ?>
    <label for="">لینک ویدیو</label>
    <input type="url" name="link_video" value="<?= get_post_meta($post->ID, '_fl_video_url', true) ?>">
    <?php
}

function fl_price_callback_html($post)
{
    #Add an nonce field
    wp_nonce_field('fl_nonce_action_price', 'fl_nonce_name_price');
    ?>
    <label for="">قیمت</label>
    <input type="text" name="price" value="<?= get_post_meta($post->ID, '_fl_price', true) ?>">
    <?php
}

function fl_save_meta_box($post_id)
{
    #check if our nonce is set
    if (!isset($_POST['fl_nonce_name_video_url']) && !isset($_POST['fl_nonce_name_price']))
        return $post_id;

    $nonce_video_url=$_POST['fl_nonce_name_video_url'];
    $nonce_price=$_POST['fl_nonce_name_price'];


    #verify that the nonce is valid;
    if (!wp_verify_nonce($nonce_video_url, 'fl_nonce_action_video_url') &&
        !wp_verify_nonce($nonce_price, 'fl_nonce_action_price'))
        return $post_id;


    #deActive AutoSave for this fields
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return $post_id;
    }

    #check the user permission

     if ( 'page' == $_POST['post_type'] ) {
            if ( ! current_user_can( 'edit_page', $post_id ) ) {
                return $post_id;
            }
        } else {
            if ( ! current_user_can( 'edit_post', $post_id ) ) {
                return $post_id;
            }
        }
    /* OK, it's safe for us to save the data now. */


    if (!empty($_POST['link_video']) || !empty($_POST['price'])) {
        #Sanitize the user input and update data
        update_post_meta($post_id, '_fl_video_url', sanitize_text_field($_POST['link_video']));
        update_post_meta($post_id, '_fl_price', sanitize_text_field($_POST['price']));
    }

}


add_action('add_meta_boxes', 'fl_register_meta_boxes');
add_action('save_post', 'fl_save_meta_box');

?>
