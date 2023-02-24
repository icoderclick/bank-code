<?php

//type 1 : just static content | f.e 

add_shortcode('text','return_text');
function alert_message(){
   
  return 'you job is very good!';
}
//use in site: [text]


//type 2:just dynamic content

add_shortcode('text','return_text');
function alert_message($txt,$content=null){ // set $txt is require
   
  return 'you job is '.$content;
  
}
//use in site: [text]very good[/text]



//type 3: dynamic content and get attribute
add_shortcode('success_message','success_message');
function success_message($text,$content=null){
    ob_start();// for best dump
   ?>
    <a target="<?= $text['target']?>" href="<?= $text['url']?>"><div">
    <?= $content?></div></a>
<?php

    return ob_get_clean();
}
//use in site : [success_message url="https://abasmanesh.com" target="_blank"]این یک متن موفقیت است ![/success_message]



//type 4: just get attribute
add_shortcode('vid','video_function');
function video_function ($path) {
    ob_start();
    ?>
    <video controls width="100%">
        <source src="<?= $path['path']?> " type="video/mp4">
    </video>
<?php
    return ob_get_clean();
}
//use in site: [vid path="https://icoder.click/wp-content/uploads/2023/02/movie.mp4"]


/*
TIP: if you want shortcode to use Every where in site, you shoude use this function 

echo do_shortcode('[login_form]')

*/



