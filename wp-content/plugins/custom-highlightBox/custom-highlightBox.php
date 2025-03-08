<?php
/**
 * Plugin Name: Custom Highlight Box
 * Description: A custom Gutenberg block that allows adding a heading, text, background color, and optional border.
 * Version: 1.0.0
 * Author: Anirban Das
 * License: GPL-2.0+
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

// Enqueue the block assets
function register_custom_highlight_box() {
    register_block_type( __DIR__ . '/build' );
}
add_action( 'init', 'register_custom_highlight_box' );
