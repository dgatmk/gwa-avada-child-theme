<?php
/**
 * Footer content template.
 *
 * @author     ThemeFusion
 * @copyright  (c) Copyright by ThemeFusion
 * @link       http://theme-fusion.com
 * @package    Avada
 * @subpackage Core
 * @since      5.3.0
 */

$c_page_id = Avada()->fusion_library->get_page_id();

/**
 * Check if the footer widget area should be displayed.
 */
$display_footer = get_post_meta( $c_page_id, 'pyre_display_footer', true );
?>
<?php if ( ( Avada()->settings->get( 'footer_widgets' ) && 'no' !== $display_footer ) || ( ! Avada()->settings->get( 'footer_widgets' ) && 'yes' === $display_footer ) ) : ?>
	<?php $footer_widget_area_center_class = ( Avada()->settings->get( 'footer_widgets_center_content' ) ) ? ' fusion-footer-widget-area-center' : ''; ?>

	<footer role="contentinfo" class="fusion-footer-widget-area fusion-widget-area<?php echo esc_attr( $footer_widget_area_center_class ); ?>">
		<div class="fusion-row group">

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


		</div> <!-- fusion-row -->
	</footer> <!-- fusion-footer-widget-area -->
<?php endif; // End footer wigets check. ?>

<?php
/**
 * Check if the footer copyright area should be displayed.
 */
$display_copyright = get_post_meta( $c_page_id, 'pyre_display_copyright', true );
?>
<?php if ( ( Avada()->settings->get( 'footer_copyright' ) && 'no' !== $display_copyright ) || ( ! Avada()->settings->get( 'footer_copyright' ) && 'yes' === $display_copyright ) ) : ?>
	<?php $footer_copyright_center_class = ( Avada()->settings->get( 'footer_copyright_center_content' ) ) ? ' fusion-footer-copyright-center' : ''; ?>

	<footer id="footer" class="fusion-footer-copyright-area<?php echo esc_attr( $footer_copyright_center_class ); ?>">
		<div class="fusion-row">
			<div class="fusion-copyright-content">

				<?php
				/**
				 * Footer Content (Copyright area) avada_footer_copyright_content hook.
				 *
				 * @hooked avada_render_footer_copyright_notice - 10 (outputs the HTML for the Theme Options footer copyright text)
				 * @hooked avada_render_footer_social_icons - 15 (outputs the HTML for the footer social icons)..
				 */
				do_action( 'avada_footer_copyright_content' );
				?>

			</div> <!-- fusion-fusion-copyright-content -->
		</div> <!-- fusion-row -->
	</footer> <!-- #footer -->
<?php endif; // End footer copyright area check. ?>
<?php
// Displays WPML language switcher inside footer if parallax effect is used.
if ( defined( 'ICL_SITEPRESS_VERSION' ) && 'footer_parallax_effect' === Avada()->settings->get( 'footer_special_effects' ) ) {
	global $wpml_language_switcher;
	$slot = $wpml_language_switcher->get_slot( 'statics', 'footer' );
	if ( $slot->is_enabled() ) {
		echo $wpml_language_switcher->render( $slot ); // WPCS: XSS ok.
	}
}
