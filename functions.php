<?php

/**
 * Child Theme Constants
 *
 * @since 1.0.0
 */
define( 'CHILD_THEME_NAME', 'Company Front' );
define( 'CHILD_THEME_AUTHOR', 'Jordan Pakrosnis' );
define( 'CHILD_THEME_AUTHOR_URL', 'http://jordanpak.com/' );
define( 'CHILD_THEME_URL', 'https://github.com/JordanPak/company-front' );
define( 'CHILD_THEME_VERSION', '1.0.0' );
define( 'TEXT_DOMAIN', 'company-front' );



/**
 * Start Genesis Engine
 *
 * @since 1.0.0
 */
include_once( get_template_directory() . '/lib/init.php' );



/**
 * Load Assets
 *
 * @since 1.0.0
 */
add_action( 'wp_enqueue_scripts', 'cf_load_assets' );
function cf_load_assets() {

	// Google Fonts
	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Lato:400,700,700italic', array(), CHILD_THEME_VERSION );

	// FontAwesome
	wp_enqueue_style( 'font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css', array(), CHILD_THEME_VERSION );

	// Javascript
	wp_enqueue_script( 'cf-global', get_stylesheet_directory_uri() . '/assets/js/global.js', array( 'jquery' ), CHILD_THEME_VERSION, true );

} // cf_load_assets()



/**
 *
 * Theme Support
 *
 * @since 1.0.0
 *
 */
 add_theme_support( 'genesis-responsive-viewport' );
 add_theme_support( 'html5',  array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
 add_theme_support( 'genesis-after-entry-widget-area' );
