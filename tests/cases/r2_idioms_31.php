<?php
// WordPress-style conditional class/interface polyfills and pluggable functions in global code.
if ( ! interface_exists( 'WP_Contract' ) ) {
    interface WP_Contract extends Orig\Contract { const IMPL = Orig\Thing::class; }
}
if ( ! class_exists( 'WP_Thing', false ) ) :
    class WP_Thing extends \Orig\Base implements WP_Contract {
        public ?PDO $db = null;
        public static function instance(): static { static $i = null; return $i ??= new static(); }
    }
endif;
if ( ! function_exists( 'wp_thing' ) ) {
    function wp_thing( string $cls = WP_Contract::IMPL ): Orig\Base|Orig\Thing {
        return new $cls;
    }
}
if ( ! function_exists( 'wp_sleep' ) ) :
    function wp_sleep( $s ) { return sleep( $s ) . '/' . usleep( $s ); }
endif;
if ( ! class_exists( 'Orig\Thing' ) ) { class Fallback {} }

$t = WP_Thing::instance();
echo get_class( $t ), ' ', get_parent_class( $t ), ' ', $t->name(), ' ', var_export( $t instanceof Orig\Contract, true ), "\n";
echo WP_Thing::instance() === $t ? 'same' : 'diff', ' ', WP_Contract::IMPL, "\n";
echo get_class( wp_thing() ), ' ', get_class( wp_thing( 'Orig\Base' ) ), ' ', wp_sleep( 1 ), "\n";
var_dump( class_exists( 'Fallback', false ), class_exists( 'WP_Thing' ), interface_exists( 'WP_Contract' ) );
echo (string) (new ReflectionProperty( 'WP_Thing', 'db' ))->getType(), "\n";
