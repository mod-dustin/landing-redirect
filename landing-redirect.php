<?php
/**
 * @package Landing Redirect
 * @version 1.0
 */
/*
Plugin Name:   Landing Redirect
Plugin URI:    https://www.ministryofdesign.com.au/
Description:   When activated redirects all visitors not logged-in to /landing/, if page with that title exists.
Author:        Ministry of Design
Version:       1.0
Author URI:    https://www.ministryofdesign.com.au/
License:       GPL-2.0 or later
License URI:   http://www.gnu.org/licenses/gpl-2.0.txt
*/

function the_slug_exists($post_name) {
    global $wpdb;
    if($wpdb->get_row("SELECT post_name FROM wp_posts WHERE post_name = '" . $post_name . "'", 'ARRAY_A')) {
        return true;
    } else {
        return false;
    }
}

function mod_landing_redirect()
{
	$landing_slug = 'landing';
    
    if (the_slug_exists($landing_slug) && !is_page($landing_slug) && !is_user_logged_in()) {
        wp_redirect(site_url('/'. $landing_slug));
        exit();
    } else if (is_page($landing_slug) && is_user_logged_in()) {
        
    } else {  
        
    }
    
}

add_action('template_redirect', 'mod_landing_redirect');