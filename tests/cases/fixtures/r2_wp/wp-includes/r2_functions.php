<?php
/**
 * WordPress-ish functions file. Note: no namespace.
 */
if (!defined('ABSPATH')) { exit; }

if (!function_exists('wp_remote_get')) :
    function wp_remote_get($url, $args = array()) {
        $fh = fopen($url, 'r');
        return array('body' => file_get_contents($url), 'fh' => $fh, 'file' => basename(__FILE__), 'dir' => basename(__DIR__));
    }
endif;

if ( ! function_exists( 'mb_strtoupper_polyfill' ) ) {
    function mb_strtoupper_polyfill( $s ) { return strtoupper( $s ); }
}

$GLOBALS['wp_filter'] = $GLOBALS['wp_filter'] ?? array();
function add_action( $hook, $cb, $prio = 10 ) { $GLOBALS['wp_filter'][ $hook ][ $prio ][] = $cb; }
function do_action( $hook, ...$args ) {
    foreach ( $GLOBALS['wp_filter'][ $hook ] ?? array() as $cbs ) {
        foreach ( $cbs as $cb ) { echo call_user_func_array( $cb, $args ), "\n"; }
    }
}
return 'loaded:' . WPINC;
