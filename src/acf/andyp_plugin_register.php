<?php

add_action( 'plugins_loaded', function() {
    do_action('register_andyp_plugin', [
        'title'     => 'Page Builder - Raw Code',
        'icon'      => 'console',
        'color'     => '#70579F',
        'path'      => __FILE__,
    ]);
} );