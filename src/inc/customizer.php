<?php

    /**
     * Remove os controles de customização originais do tema pai
     */
    function removeSections( $wp_customize ){
        $wp_customize->remove_section( 'hestia_upsell_main_section' );
        $wp_customize->remove_section( 'hestia_footer_content' );
        $wp_customize->remove_section( 'hestia_blog_layout' );
        $wp_customize->remove_section( 'nav_menus' );
        $wp_customize->remove_section( 'widgets' );
        $wp_customize->remove_section( 'static_front_page' );
        $wp_customize->remove_section( 'hestia_docs_section' );
        $wp_customize->remove_section( 'obfx_header_footer_scripts' );
        $wp_customize->remove_section( 'title_tagline' ); // Site identity
        $wp_customize->remove_section( 'static_front_page' ); // Homepage settings
        $wp_customize->remove_section( 'colors' ); // Colors
        $wp_customize->remove_section( 'header_image' ); // Header imagen
        $wp_customize->remove_section( 'background_image' ); // Background image
        $wp_customize->remove_section( 'themes' ); // Themes
        $wp_customize->remove_control( 'custom_css' ); // Custom CSS 
        
        $wp_customize->remove_panel( 'hestia_header_options' );
        $wp_customize->remove_panel( 'hestia_frontpage_sections' );
        $wp_customize->remove_panel( 'hestia_appearance_settings' );
        $wp_customize->remove_panel( 'nav_menus'); // Menus
        $wp_customize->remove_panel( 'widgets' ); // Widgets
    }
    add_action('customize_register', 'removeSections', 30);


    /**
     * SIMULADOR
     */
    function cartaoAmigoCustomizer( $wp_customize ) {

        $wp_customize->add_section(
            'sec_simulator', array(
                'title' => 'Simulador',
                'description' => 'Simula gastos de um plano de saúde vs. Cartão Amigo'
            )
        );

        $wp_customize->add_setting(
            'set_simulator_title', array(
                'type' => 'theme_mod',
                'default' => 'Pague somente o que for usar!',
                'sanitize_callback' => 'wp_filter_nohtml_kses'
            )
        );

        $wp_customize->add_control(
            'set_simulator_title', array(
                'label' => 'Título',
                'description' => 'Título da sessão Simulador',
                'section' => 'sec_simulator',
                'type' => 'text'
            )
        );

    }
    add_action('customize_register', 'cartaoAmigoCustomizer');

    /**
     * REDE CREDENCIADA - PARTNERS
     */
    function rede_credenciada_customize_register( $wp_customize ) {
 
        if ( ! class_exists( 'CustomizeImageGalleryControl\Control' ) ) {
            return;
        }
     
        $wp_customize->add_section(
            'sec_rede_credenciada', array(
            'title'      => __( 'Rede credenciada' ),
            'priority'   => 25,
        ) );
        $wp_customize->add_setting(
            'set_rede_credenciada', array(
            'default' => array(),
            'sanitize_callback' => 'wp_parse_id_list',
        ) );
        $wp_customize->add_control(
            new CustomizeImageGalleryControl\Control(
            $wp_customize,
            'set_rede_credenciada',
            array(
                'label'    => __( 'Logomarcas (200x67 pixels)' ),
                'section'  => 'sec_rede_credenciada',
                'settings' => 'set_rede_credenciada',
                'type'     => 'image_gallery',
            )
        ) );
    }
    add_action( 'customize_register', 'rede_credenciada_customize_register' );


