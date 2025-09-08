<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Enqueue parent and child theme styles properly
 */
function myportfolio_child_enqueue_styles() {
    // Enqueue parent style
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

    // Enqueue child style after parent
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( 'parent-style' ),
        wp_get_theme()->get( 'Version' )
    );
}
add_action( 'wp_enqueue_scripts', 'myportfolio_child_enqueue_styles' );

/**
 * Optional: add basic theme supports (title tag, menus, custom-logo)
 * You can remove any you don't need.
 */
function myportfolio_child_theme_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'custom-logo' );
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'myportfolio' ),
    ) );
}
add_action( 'after_setup_theme', 'myportfolio_child_theme_setup' );
