<?php
/**
 * Plugin Name: Kurt Vonnegut HTTP Header
 * Plugin URI: https://stenata.org/wp-kurt-legacy/
 * Version: 0.3
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
 * Log an error message.
 *
 * @param string $message The error message to log.
 */
function kurt_legacy_log_error( $message ) {
    if ( WP_DEBUG_LOG ) {
        error_log( '[Kurt Vonnegut HTTP Header] ' . $message );
    }
}

/**
 * Adds the X-Kurt-Legacy HTTP header.
 *
 * @param array $headers The existing list of headers.
 * @return array The modified list of headers.
 */
function kurt_legacy_header( $headers ) {
    $header_value = 'So it goes';
    $headers['X-Kurt-Legacy'] = $header_value;
    
    kurt_legacy_log_error( 'Added X-Kurt-Legacy header with value: ' . $header_value );
    
    return $headers;
}
add_filter( 'wp_headers', 'kurt_legacy_header' );

/**
 * Adds a meta tag to the head section with the X-Kurt-Legacy header.
 */
function kurt_legacy_meta() {
    $header_value = 'So it goes';
    echo '<meta http-equiv="X-Kurt-Legacy" content="' . esc_attr( $header_value ) . '" />';
    
    kurt_legacy_log_error( 'Added meta tag with X-Kurt-Legacy header value: ' . $header_value );
}
add_action( 'wp_head', 'kurt_legacy_meta' );

/**
 * Adds the X-Kurt-Legacy header to the email headers used by the wp_mail function.
 *
 * @param array $args The arguments for wp_mail.
 * @return array The modified arguments for wp_mail.
 */
function kurt_legacy_mail_header( $args ) {
    $header_value = 'X-Kurt-Legacy: So it goes';

    if ( ! isset( $args['headers'] ) ) {
        $args['headers'] = [];
    }

    if ( is_array( $args['headers'] ) ) {
        $args['headers'][] = $header_value;
    } elseif ( is_string( $args['headers'] ) ) {
        $args['headers'] .= "\n" . $header_value;
    }
    
    kurt_legacy_log_error( 'Added mail header with X-Kurt-Legacy header value: ' . $header_value );
    
    return $args;
}
add_filter( 'wp_mail', 'kurt_legacy_mail_header' );
