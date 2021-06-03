<?php

require get_template_directory() . '-child/inc/customizer.php';

if ( !defined( 'ABSPATH' ) ) exit;

if ( !function_exists( '_themename_parent_css' ) ):
    function _themename_parent_css() {
        wp_enqueue_style(
			'_themename_parent',
			trailingslashit( get_template_directory_uri() ) . 'style.css',
			array( 'bootstrap' ),
			'_themeversion'
		);
		if( is_rtl() ) {
			wp_enqueue_style(
				'_themename_parent_rtl',
				trailingslashit( get_template_directory_uri() ) . 'style-rtl.css',
				array( 'bootstrap' ),
				'_themeversion'
			);
		}
    }
endif;

add_action( 'wp_enqueue_scripts', '_themename_parent_css', 10 );

/**
 * Import options from the parent theme
 *
 * @since 1.0.0
 */
function _themename_get_parent_options() {
	$hestia_mods = get_option( 'theme_mods_hestia' );
	if ( ! empty( $hestia_mods ) ) {
		foreach ( $hestia_mods as $hestia_mod_k => $hestia_mod_v ) {
			set_theme_mod( $hestia_mod_k, $hestia_mod_v );
		}
	}
}
add_action( 'after_switch_theme', '_themename_get_parent_options' );

/**
 * Insere scripts (.js)
 *
 * @since 1.0.0
 */
function my_custom_scripts() {

	if( is_front_page() ){

		wp_enqueue_script(
			'jquery-mask',
			get_stylesheet_directory_uri() . '/assets/js/jquery.mask.js',
			array( 'jquery' ), // Dependências
			'_themeversion', // incluir número da versão
			true  // Carregar ao final (antes de </body>)
		);

		wp_enqueue_script(
			'jquery-visible-js',
			get_stylesheet_directory_uri() . '/assets/js/jquery.visible.min.js',
			array( 'jquery'), // Dependências
			'_themeversion', // incluir número da versão
			true  // Carregar ao final (antes de </body>)
		);

		wp_enqueue_script(
			'_themename-scripts',
			get_template_directory_uri() . '-child/assets/js/bundle.js',
			array(),
			'_themeversion',
			true );
	  
	}
	
}
add_action( 'wp_enqueue_scripts', 'my_custom_scripts' );

