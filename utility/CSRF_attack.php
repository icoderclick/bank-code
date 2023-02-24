this code for prevention attack CSRF and INJECTION in wordpress;

<?php

//1 : add an nonce field in html > form

/**
 * @param int|string $action  Optional. Action name. Default -1.
 * @param string     $name    Optional. Nonce name. Default '_wpnonce'.
 * @param bool       $referer Optional. Whether to set the referer field for validation. Default true.
 * @param bool       $echo    Optional. Whether to display or return hidden form field. Default true.
 * @return string Nonce field HTML markup.
 * "fl" is signature plugin
 */
wp_nonce_field('fl_nonce_action_video_url', 'fl_nonce_name_video_url');

//f.e:

function fl_price_callback_html($post)
{
    //Add an nonce field
    wp_nonce_field('fl_nonce_action_video_url', 'fl_nonce_name_video_url');
    ?>
    <label for="">قیمت</label>
    <input type="text" name="price" value="<?= get_post_meta($post->ID, '_fl_price', true) ?>">
    <?php
}




//2 : save data in DB

//step one :check if nonce is set
if (!isset($_POST['fl_nonce_name_video_url']) && !isset($_POST['fl_nonce_name_price']))
        return $post_id;

    $nonce_video_url=$_POST['fl_nonce_name_video_url'];
    $nonce_price=$_POST['fl_nonce_name_price'];


//step two :verify that the nonce is valid
 if (!wp_verify_nonce($nonce_video_url, 'fl_nonce_action_video_url') &&
        !wp_verify_nonce($nonce_price, 'fl_nonce_action_price'))
        return $post_id;



//step three :to deActive auto save for this field
if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return $post_id;
    }

//step four :check the user permission
/*
** list capability
Read posts (read)
Write and edit posts (edit_posts)
Publish posts (publish_posts)
Install plugins (install_plugins)
Delete themes (delete_themes)
Create users (create_users)
Moderate comments (moderate_comments)
... https://wordpress.org/documentation/article/roles-and-capabilities/
*/
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
  //f.e:

 if (!empty($_POST['link_video']) || !empty($_POST['price'])) {
    
        //Sanitize the user input and update data
        update_post_meta($post_id, '_fl_video_url', sanitize_text_field($_POST['link_video']));
        update_post_meta($post_id, '_fl_price', sanitize_text_field($_POST['price']));
    }
        


