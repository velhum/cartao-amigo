<?php
/**
 * The front page template file.
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Hestia
 * @since Hestia 1.0
 */

require_once('wp-content/themes/hestia-child/inc/views/front-page/class-hestia-location-section.php');
$location = new Hestia_Location_Section();

require_once('wp-content/themes/hestia-child/inc/views/front-page/class-hestia-simulator-section.php');
$simulator = new Hestia_Simulator_Section();

require_once('wp-content/themes/hestia-child/inc/views/front-page/class-hestia-register-section.php');
$register = new Hestia_Register_Section();

require_once('wp-content/themes/hestia-child/inc/views/front-page/class-hestia-partners-section.php');
$partners = new Hestia_Partners_Section();

require_once('wp-content/themes/hestia-child/inc/views/front-page/class-hestia-social-feed-section.php');
$socialFeed = new Hestia_Social_Feed_Section();

$blog         = new Hestia_Blog_Section();
$about        = new Hestia_About_Section();
$subscribe    = new Hestia_Subscribe_Section();
$contact      = new Hestia_Contact_Section();

if ( ! is_page_template() && ! get_theme_mod( 'disable_frontpage_sections', false ) ) {

		get_header();
		/**
		 * Hestia Header hook.
		 *
		 * @hooked hestia_slider_section
		 */
		do_action( 'hestia_header' ); ?>
	<div class="<?php echo esc_attr( hestia_layout() ); ?>">
		<?php
		/**
		 * Hestia Sections hook.
		 *
		 * @hooked hestia_features_section - 1
		 * @hooked hestia_about_section - 2
		 * @hooked hestia_shop_section - 3
		 * @hooked hestia_portfolio_section - 4
		 * @hooked hestia_team_section - 5
		 * @hooked hestia_pricing_section - 6
		 * @hooked hestia_testimonials_section - 7
		 * @hooked hestia_subscribe_section - 8
		 * @hooked hestia_blog_section - 9
		 * @hooked hestia_contact_section - 10
		 */

		// do_action( 'hestia_sections', false );

		
		$simulator->init();
		// $about->do_section();
		$location->init();
		$register->init();
		$partners->init();
		$subscribe->do_section();
		$socialFeed->init();
		// $blog->do_section();
		$contact->do_section();


		get_footer();

} else {
	include( get_page_template() );
} ?>
