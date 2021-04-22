<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the page header div.
 *
 * @package Hestia
 * @since Hestia 1.0
 */
$wrapper_div_classes = 'wrapper ';
if ( is_single() ) {
	$wrapper_div_classes .= join( ' ', get_post_class() );
}

$layout               = apply_filters( 'hestia_header_layout', get_theme_mod( 'hestia_header_layout', 'default' ) );
$disabled_frontpage   = get_theme_mod( 'disable_frontpage_sections', false );
$wrapper_div_classes .=
	(
		( is_front_page() && ! is_page_template() && ! is_home() && false === (bool) $disabled_frontpage ) ||
		( class_exists( 'WooCommerce', false ) && ( is_product() || is_product_category() ) ) ||
		( is_archive() && ( class_exists( 'WooCommerce', false ) && ! is_shop() ) )
	) ? '' : ' ' . $layout . ' ';

$header_class = '';
$hide_top_bar = get_theme_mod( 'hestia_top_bar_hide', true );
if ( (bool) $hide_top_bar === false ) {
	$header_class .= 'header-with-topbar';
}

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset='<?php bloginfo( 'charset' ); ?>'>
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/favicons/favicon.ico" />
    <!-- generics -->
    <link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/favicons/favicon-32.png" sizes="32x32">
    <link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/favicons/favicon-57.png" sizes="57x57">
    <link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/favicons/favicon-76.png" sizes="76x76">
    <link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/favicons/favicon-96.png" sizes="96x96">
    <link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/favicons/favicon-128.png" sizes="128x128">
    <link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/favicons/favicon-192.png" sizes="192x192">
    <link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/favicons/favicon-228.png" sizes="228x228">

    <!-- Android -->
    <link rel="shortcut icon" sizes="196x196" href=“<?php echo get_stylesheet_directory_uri(); ?>/assets/favicons/favicon-196.png">

    <!-- iOS -->
    <link rel="apple-touch-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/favicons/favicon-120.png" sizes="120x120">
    <link rel="apple-touch-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/favicons/favicon-152.png" sizes="152x152">
    <link rel="apple-touch-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/favicons/favicon-180.png" sizes="180x180">

    <!-- Windows 8 IE 10-->
    <meta name="msapplication-TileColor" content="#FFFFFF">
    <meta name="msapplication-TileImage" content="<?php echo get_stylesheet_directory_uri(); ?>/assets/favicons/favicon-144.png">

    <!— Windows 8.1 + IE11 and above —>
    <meta name="msapplication-config" content="<?php echo get_stylesheet_directory_uri(); ?>/assets/favicons/favicons/browserconfig.xml" />

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div class="<?php echo esc_attr( $wrapper_div_classes ); ?>">
		<header class="header <?php echo esc_attr( $header_class ); ?>">
			<?php
			hestia_before_header_trigger();
			do_action( 'hestia_do_top_bar' );
			do_action( 'hestia_do_header' );
			hestia_after_header_trigger();
			?>
		</header>
