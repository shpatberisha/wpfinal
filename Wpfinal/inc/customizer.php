<?php

function carsallon_customizer( $wp_customize ) {
  
    $wp_customize->add_section(
        'sec_copyright',
        array(
            'title'       => 'Carsallon Footer Settings',
            'description' => 'Customize the footer copyright information for Carsallon.'
        )
    );


    $wp_customize->add_setting(
        'set_copyright',
        array(
            'type'              => 'theme_mod',
            'default'           => '© ' . date('Y') . ' Carsallon – All rights reserved.',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        'set_copyright',
        array(
            'label'       => 'Footer Copyright',
            'description' => 'Enter the copyright text shown in the footer.',
            'section'     => 'sec_copyright',
            'type'        => 'text'
        )
    );
}
add_action( 'customize_register', 'carsallon_customizer' )