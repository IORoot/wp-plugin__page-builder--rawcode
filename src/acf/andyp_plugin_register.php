<?php

add_action( 'plugins_loaded', function() {
    do_action('register_andyp_plugin', [
        'title'     => 'Page Builder - Raw Code',
        'icon'      => 'console',
        'color'     => '#FF80AB',
        'path'      => __FILE__,
    ]);
} );