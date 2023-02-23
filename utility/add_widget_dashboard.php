how to add widget in dashboard

<?php

//step 1: set hook wp_dashboard_setup and function | f.e:
add_action('wp_dashboard_setup','fl_register_dashboard_widget');


//step 2: set function and use wp_add_widget_dashboard for add | f.e:
function fl_register_dashboard_widget(){
    wp_add_dashboard_widget(
        'fl_dashboard_widget',
        'فیلتر لینک ها',
        'fl_callback_widget',
        '',
        '',
        'normal',
        'high'
    );

}


//step 3: set function callback and end | f.e :
function fl_callback_widget(){
   echo 'this is my firsg widget';
}
















