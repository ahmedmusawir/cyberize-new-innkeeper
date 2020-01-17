<?php

/**
 *
 * ACF RELATED FUNCTIONS
 *
 */

/*======================================
=            ACF Google Map            =
======================================*/

function my_acf_init() {
	
	acf_update_setting('google_api_key', 'AIzaSyCLPeaPHJFYJCR0xKMI-0aGPZpuc2aru8U');
}

add_action('acf/init', 'my_acf_init');

/*=====  End of ACF Google Map  ======*/ 

/**
 *
 * The following can remove or add ACF field based on User Role
 *
 */

// $user = wp_get_current_user();

// if ( in_array( 'listing_client', (array) $user->roles ) ) {

// 	function my_acf_prepare_field( $field ) {

// 		return false;
// 	}
	    
// 	add_filter('acf/prepare_field/name=payment_type', 'my_acf_prepare_field');
// }


/**
 *
 * Following are the types of ways the ACF filter above works
 *
 */


// all
// add_filter('acf/prepare_field', 'my_acf_prepare_field');

// type
// add_filter('acf/prepare_field/type=text', 'my_acf_prepare_field');

// name

// key
// add_filter('acf/prepare_field/key=field_508a263b40457', 'my_acf_prepare_field');