# Great Water Alliance - Custom Child Theme

**Creation Date:** 2018.10.23  
**Updated:**  
**Version:** 1.0.0  
  
	
## Description
This child theme was created from the base child theme that comes with the Avada 
WordPress theme. Parts of the previous child theme for this website have been
reused and may not be well documented.


## Documentation
---
### Header (2018.10.23 - 2018.10.24)
All header modifications were handled with CSS.

---

### Custom Footer (2018.10.23 - 2018.10.24)
**File(s):** `templates/footer-content.php`, `functions.php`

**Description:**
A custom footer was create to match the approved design for the new site.
Avada can have up to 6 footer widget areas - but we needed 8. We're making
use of one of the theme's native footer widget areas as well as the theme
option for the copyright.

#### `templates/footer-content.php`

Starting on line 24 we added a `group` class to the `<div class="fusion-row">` tag.
`group` is a CSS clearfix class that was added to the theme's Custom CSS theme option.

Lines 25-61 were removed to add in our new code:
```
			<div class="logo">
				<div class="logo-content">
					<?php if ( function_exists( 'dynamic_sidebar' ) && dynamic_sidebar( 'avada-footer-widget-1' ) ) { } ?></div>
				</div>
			<div class="gwa-widgets">
				<div class="group">
					<div class="left-group group">
						<div class="lg-col group">
							<div class="gwa-footer-menu"><?php wp_nav_menu( array( 'theme_location' => 'footer-menu-1' ) ); ?></div>
							<div class="gwa-footer-menu"><?php wp_nav_menu( array( 'theme_location' => 'footer-menu-2' ) ); ?></div>
						</div>
						<div class="lg-col group">
							<div class="gwa-footer-menu"><?php wp_nav_menu( array( 'theme_location' => 'footer-menu-3' ) ); ?></div>
							<div class="gwa-footer-menu"><?php wp_nav_menu( array( 'theme_location' => 'footer-menu-4' ) ); ?></div>
						</div>
					</div>
					<div class="right-group group">
						<div class="rg-col1 group">
							<div class="gwa-footer-menu"><?php wp_nav_menu( array( 'theme_location' => 'footer-menu-5' ) ); ?></div>
							<div class="gwa-footer-menu"><?php wp_nav_menu( array( 'theme_location' => 'footer-menu-6' ) ); ?></div>
						</div>
						<div class="rg-col2 group"><?php wp_nav_menu( array( 'theme_location' => 'footer-menu-7' ) ); ?></div>
					</div>
				</div>
				<div class="gwa-copyright-area group">
					<?php
						/*
						 *  We want to show the text from the theme options but only display the text and not any of the social icons
						 *  that would show if we used `do_action( 'avada_footer_copyright_content' );`
						 *
						 *  The layout for the two columns is handled directly in the settings using div tags and CSS placed in
						 *  the Adava Custom CSS theme option area.
						 */
						echo do_shortcode( Avada()->settings->get( 'footer_text' ) );
					?>
				</div>
			</div>
```

This code includes 7 new menus (added in the `functions.php` file) as well as a call to the Avada
shortcode that will get the theme option for the copyright textarea box.

#### `functions.php`
Added 7 new menu locations for the theme. These are used in the footer.
```
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
```
---