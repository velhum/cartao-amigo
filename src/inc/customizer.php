<?php
    function cartaoAmigoCustomizer( $wp_customize ) {

        // SIMULADOR
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