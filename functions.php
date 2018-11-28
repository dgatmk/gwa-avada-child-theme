<?php
/* 
 * Native Avada child theme functions
 */
function theme_enqueue_styles() {
	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( 'avada-stylesheet' ) );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

function avada_lang_setup() {
	$lang = get_stylesheet_directory() . '/languages';
	load_child_theme_textdomain( 'Avada', $lang );
}
add_action( 'after_setup_theme', 'avada_lang_setup' );
/************************************************************************/


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
/************************************************************************/


/*
 * Events Calendar - Hide Containers if no Events
 *   We need to inject a class on the body tag in order to show/hide
 *   containers that handle the events.
 * 
 * DMG 2018.10.24
 */
function gwa_events_body_class( $classes ) {
	$gwaTime = current_time( 'timestamp' ); // Get WordPress assigned timestamp -- should take into account daylight savings time

	// Get the events from now until way in the future
	// Latest possible date PHP can handle is January 19, 2038
	$events = tribe_get_events( array( 'eventDisplay' => 'custom', 'start_date' => date( 'Y-m-d H:i', $gwaTime ), 'end_date' => '2037-12-12 23:59' ) );

	// Add classes to HTML body tag
	if( 0 >= count( $events ) ) { $classes[] = 'gwa-has-no-events';	}
	else { $classes[] = 'gwa-has-events'; }

	// Return classes	
	return $classes;
}
add_filter( 'body_class','gwa_events_body_class' );

// Date/time testing for the above...
//function gwa_time() { echo date('Y-m-d H:i', current_time( 'timestamp' ) ); }
//add_action( 'init', 'gwa_time' );
/************************************************************************/


/*
 * Download this Article - Button for single post page
 *   If we're on a single post page (single.php) check to see if
 *   there's a file attached. If so, append a download button.
 * 
 * DMG 2018.11.16
 */
function gwa_append_download_to_post( $content ) {
	$fullcontent = $content;
	
	// Only check if it's a single post
	if( is_single() ) {
		// Check if there's a file attached
		if( $file = get_field('pdf_file') ) {
			$url = $file[ 'url' ];
			$fullcontent .= '<div class="gwa-article-pdf"><a class="fusion-button button-flat button-square button-xlarge button-default button-1" href="' . $url .'" target="_blank" style="">Download This Article</a></div>';
		}
	}
	
	return $fullcontent;
}
add_filter( 'the_content', 'gwa_append_download_to_post' );
/************************************************************************/


/*
 * Recent Post Link Shortcode -
 *   We have a few locations where we're using the 'Recent Posts' 
 *   from Avada to show a single post. We need a 'Read More' for
 *   these but we don't want to have to change them manually
 *   each time we add a new posts. So a shortcode it is!
 * 
 * DMG 2018.11.20
 */
function gwa_recent_post_read_more_link( $atts ){
	$a = shortcode_atts(
		array(
			'text' => 'Read More',
			'class' => 'gwa-recent-post-link-shortcode-anchor'
		), $atts
	);
	
	$link_title = $a['text'];
	$link_class = $a['class'];
	if( 'gwa-recent-post-link-shortcode-anchor' != $link_class ) {
		$link_class .= ' gwa-recent-post-link-shortcode-anchor';
	}
	
	// Get most recent published post 
	$args_array = array( 'numberposts' => 1, 'post_type' => 'post', 'post_status' => 'publish' );
	$last_post = wp_get_recent_posts( $args_array );

	if( $last_post ) {
		// Have post - get title and link, then build link to return
		foreach( $last_post as $recent ) {
			$link = esc_url( get_the_permalink( $recent["ID"] ) );
			$title = esc_html( get_the_title( $recent["ID"] ) );
			return '<p class="gwa-recent-post-link-shortcode"><a href="' . $link . '" title="' . $title . '" class="' . $link_class . '">' . $link_title . ' &raquo;</a></p>';
		}
	}  else {
		// There are no posts - you get nothing!
		return '';
	}
}
add_shortcode( 'gwa_recent_post_link', 'gwa_recent_post_read_more_link' );
/************************************************************************/


/*
 * Remove author links
 *   We don't want to show the link to the author page for 
 *   security reasons. We've already disabled author pages
 *   using Yoast SEO plugin -- so let's not give "the bad
 *   guys" a login name.
 *
 *	 We're also making use of some JavasScript in the theme
 *	 options to remove the link and replace it with the author
 *	 display name as another precaution.
 * 
 * DMG 2018.11.28
 */
function gwa_remove_link_to_author( $link ){
	$link = get_site_url();
	return $link;
}
add_filter( 'author_link', 'gwa_remove_link_to_author', 10, 1 ); 	 	 
/************************************************************************/


