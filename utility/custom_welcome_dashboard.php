<?php

//step 1: remove default wordpress welcome with action wp_dashboard_setup | f.e:
add_action('wp_dashboard_setup', 'remove_defult_welcome');

function remove_defult_welcome(){
  
  //use remove action welcome_panel
      remove_action('welcome_panel','wp_welcome_panel');
}

// step 2: set custom wp welcome with action welcome_panel | f.e:
add_action('welcome_panel','custom_welcome');

function custom_welcome(){?>

//html code
<div style="height: 240px;width: 90%;padding: 20px;background: #fff;text-align: center">welcome to my site</div>


<?php
}



