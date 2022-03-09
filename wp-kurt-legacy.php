<?php
/**
 * Plugin Name: Kurt Vonnegut HTTP header
 * Plugin URI: https://stenata.org/wp-kurt-legacy/
 * Version: 0.2
 * Plugin URI: https://github.com/krasimirstoev/wp-kurt-legacy/
 * Description: Adds an X-Kurt-Legacy HTTP header
 * Author: Krasimir Stoev
 * Author URI: https://stenata.org
 * License: GPLv3
 */

/**
 * Add X-Kurt-Legacy HTTP header
 *
 * @param $headers
 *
 * @return array The modified list of headers.
 */
function kurt_legacy_header ( $headers ) {

	$headers['X-Kurt-Legacy'] = 'So it goes';

	return $headers;

}

add_filter( 'wp_headers', 'kurt_legacy_header' );


function kurt_legacy_meta() {

	echo '<meta http-equiv="X-Kurt-Legacy" content="So it goes" />';

}

add_action( 'wp_head', 'kurt_legacy_meta' );

/**
 * Add mail header which will be used by wp_mail function.
 *
 */

function kurt_legacy_mail_header( $args ) {

	if ( is_array( $args['headers'] ) || empty( $args['headers'] ) ) {
		$args['headers'][] = 'X-Kurt-Legacy: So it goes';
	}

	if ( is_string( $args['headers'] ) ) {
		$args['headers'] .= "X-Kurg-Legacy: So it goes\n";
	}

	return $args;

}

add_filter( 'wp_mail', 'kurt_legacy_mail_header' );
