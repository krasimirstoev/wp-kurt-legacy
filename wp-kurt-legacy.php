<?php
/**
 * Plugin Name: Kurt Vonnegut HTTP Header
 * Plugin URI: https://stenata.org/wp-kurt-legacy/
 * Version: 0.2
 * Description: Adds an X-Kurt-Legacy HTTP header
 * Author: Krasimir Stoev
 * Author URI: https://stenata.org
 * License: GPLv3
 */

// Prevent direct access to the plugin file.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Adds the X-Kurt-Legacy HTTP header.
 *
 * @param array $headers The existing list of headers.
 * @return array The modified list of headers.
 */
function kurt_legacy_header( $headers ) {
    $headers['X-Kurt-Legacy'] = 'So it goes';
    return $headers;
}
add_filter( 'wp_headers', 'kurt_legacy_header' );

/**
 * Adds a meta tag to the head section with the X-Kurt-Legacy header.
 */
function kurt_legacy_meta() {
    echo '<meta http-equiv="X-Kurt-Legacy" content="So it goes" />';
}
add_action( 'wp_head', 'kurt_legacy_meta' );

/**
 * Adds the X-Kurt-Legacy header to the email headers used by the wp_mail function.
 *
 * @param array $args The arguments for wp_mail.
 * @return array The modified arguments for wp_mail.
 */
function kurt_legacy_mail_header( $args ) {
    if ( ! isset( $args['headers'] ) ) {
        $args['headers'] = [];
    }

    if ( is_array( $args['headers'] ) ) {
        $args['headers'][] = 'X-Kurt-Legacy: So it goes';
    } elseif ( is_string( $args['headers'] ) ) {
        $args['headers'] .= "\nX-Kurt-Legacy: So it goes";
    }

    return $args;
}
add_filter( 'wp_mail', 'kurt_legacy_mail_header' );
