<?php
global $chrimbo_panels;
global $chrimbo_sections;
global $chrimbo_settings_controls;
global $chrimbo_repeated_settings_controls;
global $chrimbo_customizer_defaults;

$chrimbo_customizer_defaults['chrimbo-feature-single-buttton-enable'] = 1;

/*feature single button enable setting*/
$chrimbo_sections['chrimbo-feature-single-buttton-option'] = array(
    'priority'       => 10,
    'title'          => esc_html__( 'Enable Single-Button', 'chrimbo' ),
    'panel'          => 'chrimbo-feature-single-button',
);

/*Feature singlr button section enable control*/
$chrimbo_settings_controls['chrimbo-feature-single-buttton-enable'] = array(
    'setting' =>     array(
        'default'              => $chrimbo_customizer_defaults['chrimbo-feature-single-buttton-enable']
    ),
    'control' => array(
        'label'                 =>  esc_html__( 'Enable Event Ticket', 'chrimbo' ),
    	'description'    		=>  esc_html__( 'Enable "Event Ticket" on checked' , 'chrimbo' ),
        'section'               => 'chrimbo-feature-single-buttton-option',
        'type'                  => 'checkbox',
        'priority'              => 20,
        'active_callback'       => ''
    )
);