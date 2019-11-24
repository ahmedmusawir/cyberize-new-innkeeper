<?php

/**
 *
 * DIRECTORY RELATED FUNCTIONS
 *
 */

// Update CSS within in Admin
function admin_style() {
  wp_enqueue_style('admin-styles', get_template_directory_uri().'/assets/directory/css/admin.css');
}
add_action('admin_enqueue_scripts', 'admin_style');


/**
 *
 * To Protect the role from editing others posts. This is already done with Members plugin 
 * Thus this is useless
 *
 */


// function posts_for_current_author($query) {

// 	global $pagenow;

// 	if ( 'edit.php' != $pagenow || !$query->is_admin ) {
// 		return $query;
// 	}

// 	if ( !current_user_can( 'edit_others_posts' ) ) {

// 		global $user_ID;

// 		$query->set('listing-client', $user_ID);
// 	}

// 	return $query;
// }

// add_filter('pre_get_posts', 'posts_for_current_author');