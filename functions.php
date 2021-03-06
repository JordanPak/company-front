<?php
//=========================================//
//       COMPANY FRONT STARTER THEME       //
//=========================================//
//    Jordan Pakrosnis | JordanPak.com     //
//=========================================//



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

	// Main Styles
	wp_enqueue_style( 'cf-main', get_stylesheet_directory_uri() . '/css/style.css', array(), CHILD_THEME_VERSION );

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



/**
 * Custom Body Classes
 *
 * @since 1.0.0
 * @uses /lib/body-classes.php
 */
include_once( get_stylesheet_directory() . '/lib/body-classes.php' );



/**
 * Unregister Useless WordPress/Genesis Stuff
 *
 * @since 1.0.0
 */

// Remove Edit Link
add_filter( 'edit_post_link', '__return_false' );

// Unregister Unneeded Layouts and Sidebars
unregister_sidebar( 'sidebar-alt' );
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );
genesis_unregister_layout( 'sidebar-content-sidebar' );

// Remove Admin Menu Stuff
function cf_remove_admin_menus(){
	remove_menu_page( 'edit-comments.php' );
}
add_action( 'admin_menu', 'cf_remove_admin_menus' );

// Remove Comments
remove_action( 'genesis_after_entry', 'genesis_get_comments_template' );
remove_action( 'genesis_comments', 'genesis_do_comments' );



add_filter( 'get_the_content_more_link', 'cf_read_more_link' );
/**
* Customize Read More Link for Content Limit in Genesis Settings
*
* @author Jordan Pakrosnis
* @since 1.0.0
*
* @return string
*/
function cf_read_more_link() {
	return '... <a class="more-link" href="' . get_permalink() . '">Continue Reading</a>';
}



add_filter('genesis_footer_creds_text', 'cf_footer_creds');
/**
* Customize Footer Credits
*
* @since 1.0.0
*
* @return string
*/
function cf_footer_creds( $creds ) {
	$creds = '[footer_copyright] <b>Company Front</b> &nbsp;&middot;&nbsp; ';
	$creds .= ' Designed &amp; Developed by <a href="http://jordanpak.com" target="_BLANK">JordanPak</a>';
	return $creds;
}



/**
 * Set the Theme Color Meta for modern browsers
 *
 * @author Jordan Pakrosnis
 * @since 1.0.0
 */
add_action( 'genesis_meta', 'cf_meta_theme_color', 13 );
function cf_meta_theme_color() {
	echo '<meta name="theme-color" content="#1D1D1D">';
}



/**
 * Breakpoint Testing
 *
 * @author Jordan Pakrosnis
 * @since 1.0.0
 */
function cf_breakpoint_testing() {
	echo '<div class="breakpoint-test"><span class="name"></span><span class="size"></span></div>';
}
add_action( 'genesis_after_footer', 'cf_breakpoint_testing' );
