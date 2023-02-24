<?php

//add field or section setting in option_group and save in DB 
/*
option_group :
general, عمومی
writing, نوشتن
reading, خواندن
discussion, گفت و گو
media, رسانه
permalink, پیوندهای یکتا
privacy, حریم خصوصی
*/


//step 1: register | f.e:
add_action('admin_init','my_custom_setting');


//step 2: define function | f.e:
function my_custom_setting () {
  
   //use register_setting api for create row "option_name" and save data in DB
    $args = [
        'type' => 'string',
        'sanitize_callback'=>'sanitize_text_field',//or sanitize_text_area for textarea
        'default'=>NULL,

    ];
    register_setting('general', 'my_option',$args);
  
  
 
    //if you want to add section use add_settings_field() api | f.e:
    add_settings_field(
        'custom_section_id',
        'تنظیمات اختصاصی نوشتن',
        'my_custom_setting_callback',
        'general'
    );

    //if you want to add section use add_settings_section() api;
}

//step 3: set callback function| f.e:
function my_custom_setting_callback(){
    $setting = get_option('my_option');
    ?>

    <input type="text" name="my_option" value="<?php echo isset( $setting ) ? esc_attr( $setting ) : ''; ?>">

    <?php
}
























