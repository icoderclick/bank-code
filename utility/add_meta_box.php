

//for add meta box and meta data in post and page
//this code is very security 

<?


//step 1 : set hook add_meta_boxes | f.e:
add_action('add_meta_boxes', 'fl_register_meta_boxes');


//step 2 : set function hook and add metabox with api add_meta_box | f.e: in this sample has been added two metabox
function fl_register_meta_boxes()
{
    //api
    add_meta_box(
        'fl_video_url_meta_box',
        'لینک ویدیو',
        'fl_video_url_callback_html',
        '',  //screen : post,page,dashboard
        'normal',
        'high',
        ''
    );

  //api
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



//step 3 : set callback function and add nonce field for security | f.e:
function fl_video_url_callback_html($post)
{
    //security: Add an nonce field (require)
    wp_nonce_field('fl_nonce_action_video_url', 'fl_nonce_name_video_url');
    ?>

    <label for="">لینک ویدیو</label>
    <input type="url" name="link_video" value="<?= get_post_meta($post->ID, '_fl_video_url', true) ?>">

    <?php
}


function fl_price_callback_html($post)
{
    //security: Add an nonce field (require)
    wp_nonce_field('fl_nonce_action_price', 'fl_nonce_name_price');
    ?>
    <label for="">قیمت</label>
    <input type="text" name="price" value="<?= get_post_meta($post->ID, '_fl_price', true) ?>">
    <?php
}




//step 4 : save data in DB with set hook save_post | f.e:
add_action('save_post', 'fl_save_meta_box');


//step 5 : set function hook and nonce security | f.e:
function fl_save_meta_box($post_id)
{
    
    //security: check if our nonce is set (require)
    if (!isset($_POST['fl_nonce_name_video_url']) && !isset($_POST['fl_nonce_name_price']))
        return $post_id;

    $nonce_video_url=$_POST['fl_nonce_name_video_url'];
    $nonce_price=$_POST['fl_nonce_name_price'];


    //security: verify that the nonce is valid
    if (!wp_verify_nonce($nonce_video_url, 'fl_nonce_action_video_url') &&
        !wp_verify_nonce($nonce_price, 'fl_nonce_action_price'))
        return $post_id;


    //security: deActive AutoSave for this fields (optional)
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return $post_id;
    }

  
    //security: check the user permission (require)
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

   //sanitize data and save in DB:
    if (!empty($_POST['link_video']) || !empty($_POST['price'])) {
      
        //Sanitize the user input and update data (require)
        update_post_meta($post_id, '_fl_video_url', sanitize_text_field($_POST['link_video']));
        update_post_meta($post_id, '_fl_price', sanitize_text_field($_POST['price']));
    }

}



?>

