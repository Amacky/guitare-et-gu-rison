<?php 
global $chrimbo_panels;
global $chrimbo_sections;
global $chrimbo_settings_controls;
global $chrimbo_repeated_settings_controls;
global $chrimbo_customizer_defaults;

/*defaults values*/
$chrimbo_customizer_defaults['chrimbo-fs-single-button-text'] = esc_html__('BOOK EVENT NOW','chrimbo');
$chrimbo_customizer_defaults['chrimbo-fs-single-button-url'] = '#';

/*fs button text*/
$chrimbo_sections['chrimbo-fs-button-text'] = array(
    'priority'       => 80,
    'title'          => esc_html__( 'Button Text', 'chrimbo' ),
    'panel'          => 'chrimbo-feature-single-button',
);

$chrimbo_settings_controls['chrimbo-fs-single-button-text'] = array(
    'setting' =>     array(
        'default'              => $chrimbo_customizer_defaults['chrimbo-fs-single-button-text']
    ),
    'control' => array(
        'label'                 =>  esc_html__( 'Button Text', 'chrimbo' ),
        'section'               => 'chrimbo-fs-button-text',
        'type'                  => 'textarea',
        'priority'              => 5,
        'active_callback'       => '',
    )
);

// button url 
$chrimbo_settings_controls['chrimbo-fs-single-button-url'] =  array(
    'setting' =>     array(
        'default'              => $chrimbo_customizer_defaults['chrimbo-fs-single-button-url']
    ),
    'control' => array(
        'label'                 =>  esc_html__( 'Button url', 'chrimbo' ),
        'section'               => 'chrimbo-fs-button-text',
        'type'                  => 'text',
        'priority'              => 10,
        'active_callback'       => '',
    )
);    