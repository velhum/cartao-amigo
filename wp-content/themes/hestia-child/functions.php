<?php
if ( !defined( 'ABSPATH' ) ) exit;

if ( !function_exists( 'hestia_child_parent_css' ) ):
    function hestia_child_parent_css() {
        wp_enqueue_style( 'hestia_child_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array( 'bootstrap' ) );
		if( is_rtl() ) {
			wp_enqueue_style( 'hestia_child_parent_rtl', trailingslashit( get_template_directory_uri() ) . 'style-rtl.css', array( 'bootstrap' ) );
		}
		wp_enqueue_style( 'aos-style', get_stylesheet_directory_uri() . '/assets/css/aos.css', array() );
    }
endif;
add_action( 'wp_enqueue_scripts', 'hestia_child_parent_css', 10 );

/**
 * Import options from the parent theme
 *
 * @since 1.0.0
 */
function hestia_child_get_parent_options() {
	$hestia_mods = get_option( 'theme_mods_hestia' );
	if ( ! empty( $hestia_mods ) ) {
		foreach ( $hestia_mods as $hestia_mod_k => $hestia_mod_v ) {
			set_theme_mod( $hestia_mod_k, $hestia_mod_v );
		}
	}
}
add_action( 'after_switch_theme', 'hestia_child_get_parent_options' );

/**
 * Insere scripts (.js)
 *
 * @since 1.0.0
 */
function my_custom_scripts() {

    wp_enqueue_script(
		'aos-js',
		get_stylesheet_directory_uri() . '/assets/js/aos.js',
		array( 'jquery' ), // Dependências
		true, // incluir número da versão
		true  // Carregar al final (antes de </body>)
	);

    wp_enqueue_script(
		'scripts-js',
		get_stylesheet_directory_uri() . '/scripts.js',
		array( 'jquery' ), // Dependências
		true, // incluir número da versão
		true  // Carregar al final (antes de </body>)
	);

	$idRedeCredenciada = 2; // ID da página Rede Credenciada
	if( $idRedeCredenciada == get_the_ID()){
		wp_enqueue_script(
			'rede-credenciada',
			get_stylesheet_directory_uri() . '/assets/js/rede-credenciada.js',
			array( 'jquery' ), // Dependências
			true, // incluir número da versão
			true  // Carregar al final (antes de </body>)
		);
	}
}
add_action( 'wp_enqueue_scripts', 'my_custom_scripts' );

/**
 * Insere um botão para demais redes crenciadas
 * logo abaixo dos 'testimonials'
 *
 * @since 1.0.0
 */
function bt_rede_credenciada(){
	echo '<div class="buttons text-center">';
	echo '<a href="/cartao-amigo/rede-credenciada" title="Conheça os demais credenciados" class="btn btn-primary">Conheça os demais credenciados</a>';
	echo '</div>';
}
add_action( 'hestia_bottom_testimonials_section_content_hook', 'bt_rede_credenciada' );


/**
 * Insere um botão para a página de posts
 * logo abaixo da sessão Blog da página inicial
 *
 * @since 1.0.0
 */
function bt_blog(){
	echo '<div class="buttons text-center">';
	echo '<a href="/blog" title="Mais notícias" class="btn btn-primary">Mais notícias...</a>';
	echo '</div>';
}
add_action( 'hestia_bottom_blog_section_content_hook', 'bt_blog' );

