<?php
/*
Plugin Name: Case-Insensitive Passwords
Plugin URI: http://lewayotte.com/plugins/case-insensitive-passwords/
Description: For case-insensitive WordPress authentication
Author: Lew Ayotte
Version: 0.0.1
Author URI: http://lewayotte.com/
Tags: password, case, strtolower, insensitive
*/

define( 'CIP_version' , '0.0.1' );

if ( !function_exists('wp_set_password') ) {
	function wp_set_password( $password, $user_id ) {
		global $wpdb;
		$password = strtolower( $password );
	
		$hash = wp_hash_password($password);
		$wpdb->update($wpdb->users, array('user_pass' => $hash, 'user_activation_key' => ''), array('ID' => $user_id) );
	
		wp_cache_delete($user_id, 'users');
	}
}

if ( !function_exists('wp_hash_password') ) {
	function wp_hash_password($password) {
		global $wp_hasher;
		$password = strtolower( $password );
	
		if ( empty($wp_hasher) ) {
			require_once( ABSPATH . 'wp-includes/class-phpass.php');
			// By default, use the portable hash from phpass
			$wp_hasher = new PasswordHash(8, TRUE);
		}
	
		return $wp_hasher->HashPassword($password);
	}
}

function case_insensitive_check_password( $check, $password, $hash, $user_id ) {
	global $wp_hasher;
	
	if ( !$check ) {
		if ( empty($wp_hasher) ) {
			require_once( ABSPATH . 'wp-includes/class-phpass.php');
			// By default, use the portable hash from phpass
			$wp_hasher = new PasswordHash(8, TRUE);
		}
	
		$password = strtolower( $password );
		$check = $wp_hasher->CheckPassword($password, $hash);
	}
	
	return $check;
}
add_filter( 'check_password', 'case_insensitive_check_password', 10, 4 );