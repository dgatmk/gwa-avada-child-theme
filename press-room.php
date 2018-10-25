<?php
/**
 * Template Name: Press Room
 */
 // Do not allow directly accessing this file.
 if ( ! defined( 'ABSPATH' ) ) {
 	exit( 'Direct script access denied.' );
 }
 ?>
 <?php get_header(); ?>

 <style>
 html {overflow-y: visible !important;}
 </style>
 <div id="content" <?php Avada()->layout->add_class( 'content_class' ); ?> <?php Avada()->layout->add_style( 'content_style' ); ?>>
 	<?php //if ( category_description() ) : ?>
 		<div id="post-<?php the_ID(); ?>" <?php post_class( 'fusion-archive-description' ); ?>>
 			<div class="post-content">
 				<?php the_content(); ?>
 			</div>
 		</div>
 	<?php //endif; ?>
<div class="press-room-faq-container">
    <div class="fusion-faq-shortcode custom-faq">
        <div class="fusion-faqs-wrapper" style="display: block">
            <div class="accordian fusion-accordian">
                <div class="panel-group" id="accordian-1">
					<!-- Press Room Press Releases Tab -->
                    <?php get_template_part('templates/partials/press-releases') ?>
                    <!-- Press Room Published Articles Tab -->
                    <?php get_template_part('templates/partials/published-articles') ?>
					<!-- Press Room Fact Sheet Tab -->
                    <?php get_template_part('templates/partials/press-fact') ?>
                    <!-- Press Room Newsletter Highlights Tab -->
                    <?php get_template_part('templates/partials/newsletter-highlights') ?>
					<!-- Press Room Video Tab -->
					<?php //get_template_part('templates/partials/press-video') ?>
					<!-- Press Room Compact Council Tab -->
                    <?php get_template_part('templates/partials/press-compact') ?>
                    <!-- Presentations Tab -->
                    <?php get_template_part('templates/partials/press-presentations') ?>
				</div>
            </div>
        </div>
    </div>
</div>
 <?php do_action( 'avada_after_content' ); ?>
 <?php get_footer();

 /* Omit closing PHP tag to avoid "Headers already sent" issues. */
