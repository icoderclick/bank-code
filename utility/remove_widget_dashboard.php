how to remove widget? exactly delete metabox.
this code for delete all widgets in dashboard;
<?php

//step 1: set hook wp_dashboard_setup and function | f.e:
add_action('wp_dashboard_setup', 'wpdocs_remove_dashboard_widgets');

//step 2: set function callback| f.e:
function wpdocs_remove_dashboard_widgets()
{
    /**
     * Remove all dashboard widgets
     */
    remove_meta_box('dashboard_right_now', 'dashboard', 'normal');   // Right Now
    remove_meta_box('dashboard_activity', 'dashboard', 'normal');   // activity
    remove_meta_box('dashboard_site_health', 'dashboard', 'normal');   // activity
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal'); // Recent Comments
    remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal');  // Incoming Links
    remove_meta_box('dashboard_plugins', 'dashboard', 'normal');   // Plugins
    remove_meta_box('dashboard_quick_press', 'dashboard', 'side');  // Quick Press
    remove_meta_box('dashboard_recent_drafts', 'dashboard', 'side');  // Recent Drafts
    remove_meta_box('dashboard_primary', 'dashboard', 'side');   // WordPress blog
    remove_meta_box('dashboard_secondary', 'dashboard', 'side');   // Other WordPress News
    // use 'dashboard-network' as the second parameter to remove widgets from a network dashboard.
 

}

//how to get widget id? inspect



