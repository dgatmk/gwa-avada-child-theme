<?php

function theme_enqueue_styles() {
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( 'avada-stylesheet' ) );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

function avada_lang_setup() {
	$lang = get_stylesheet_directory() . '/languages';
	load_child_theme_textdomain( 'Avada', $lang );
}
add_action( 'after_setup_theme', 'avada_lang_setup' );



/* 
 * Create new menus for the footer area.
 *   Avada only allows for up to 6 widgets areas. Since we need a location for the logo
 *   as well as 7 menu areas -- this is the best option.
 * 
 * 	 We'll keep a generic naming system here in case these menus change. Number the menus
 *   in order from left to right.
 * 
 *   To call menus: <?php wp_nav_menu( array( 'theme_location' => 'new-menu' ) ); ?>
 * 
 * DMG 2018.10.24
 */
function register_gwa_footer_menus() {
	register_nav_menus(
		array(
			'footer-menu-1' => __( 'Footer menu 1' ),
			'footer-menu-2' => __( 'Footer menu 2' ),
			'footer-menu-3' => __( 'Footer menu 3' ),
			'footer-menu-4' => __( 'Footer menu 4' ),
			'footer-menu-5' => __( 'Footer menu 5' ),
			'footer-menu-6' => __( 'Footer menu 6' ),
			'footer-menu-7' => __( 'Footer menu 7' )
		)
	);
}
add_action( 'init', 'register_gwa_footer_menus' );