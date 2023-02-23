full instructions for create any plugin wordpress;

<?php

//step 1: set certificate plugin in comment | f.e:
/*
Plugin Name: filter link
Plugin URI: -
Description: with this plugin, you can management links in comments;
Author: علی شجاعی فر
Version: 2.0.0
Requires at least: 5.2
Requires PHP: 5.6.20
Tested up to: 7.2
Author URI: https://icoder.click
Text Domain: filter-links
Domain Path: /languages/
*/


//step 2: check ABSPATH define | f.e:
defined('ABSPATH') || die('Access Deny!');
//or
defined('ABSPATH') || exit;


//step 3: set plugin url and directory with define | f.e: in this sample plugin name is filter link
define('FL_PATH_DIR',plugin_dir_path(__FILE__));
define('FL_PATH_URL',plugin_dir_url(__FILE__));


//step 4: set const var for main directory path | f.e: in this sample main dir is : _inc,assets,views
const FL_PATH_DIR_INC=FL_PATH_DIR.'_inc/';
const FL_PATH_DIR_ASSETS=FL_PATH_DIR.'assets/';
const FL_PATH_DIR_VIEWS=FL_PATH_DIR.'views/';


//step 5: include admin and user file with fun is_admin() | f.e:
if(is_admin()){
    include FL_PATH_DIR_INC.'admin/menu.php';
    include FL_PATH_DIR_INC.'admin/meta-box.php';
}else {
    include FL_PATH_DIR_INC.'user/form.php';
}




