<?php
define( 'ABSPATH', __DIR__ . '/fixtures/r2_wp/' );
define( 'WPINC', 'wp-includes' );

$r = require_once ABSPATH . WPINC . '/r2_functions.php';
echo $r, "\n";
var_dump( require_once( ABSPATH . WPINC . '/' . 'r2_functions.php' ) );

echo implode( ',', wp_remote_get( 'http://example.com' ) ), "\n";
echo mb_strtoupper_polyfill( 'abc' ), "\n";

function my_plugin_init() { return 'init:' . strtoupper( 'x' ) . ':' . sleep( 1 ); }
add_action( 'init', 'my_plugin_init' );
add_action( 'init', function () { return 'closure:' . usleep( 10 ); }, 5 );
add_action( 'init', static fn() => 'arrow:' . file_get_contents( ABSPATH ), 20 );
do_action( 'init' );
