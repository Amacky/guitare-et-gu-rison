<?php 
global $chrimbo_panels;
global $chrimbo_sections;
global $chrimbo_settings_controls;
global $chrimbo_repeated_settings_controls;
global $chrimbo_customizer_defaults;

/*defaults values*/
$chrimbo_customizer_defaults['chrimbo-event-featured-event-title']          = esc_html__('Upcoming Event','chrimbo');
$chrimbo_customizer_defaults['chrimbo-event-featured-event-content']        = esc_html__('Christmas Party','chrimbo');
$chrimbo_customizer_defaults['chrimbo-event-featured-event-icon']           = 'fa-question-circle-o';
$chrimbo_customizer_defaults['chrimbo-event-featured-location-title']       = esc_html__('Location','chrimbo');
$chrimbo_customizer_defaults['chrimbo-event-featured-location-content']     = esc_html__('New York, USA','chrimbo');
$chrimbo_customizer_defaults['chrimbo-event-featured-location-icon']        = 'fa-map-marker';
$chrimbo_customizer_defaults['chrimbo-event-featured-time-title']           = esc_html__('Event Date','chrimbo');
$chrimbo_customizer_defaults['chrimbo-event-featured-time-content']         = esc_html__('22 Dec, 2017','chrimbo');
$chrimbo_customizer_defaults['chrimbo-event-featured-time-icon']            = 'fa-calendar';

/*acivity section options-setting*/
$chrimbo_sections['chrimbo-fs-acitivity-section-setting'] = array(
    'priority'       => 80,
    'title'          => esc_html__( 'Main-Event-Setting', 'chrimbo' ),
    'panel'          => 'chrimbo-feature-event-section',
);

// acitivity -section for event 
$chrimbo_settings_controls['chrimbo-event-featured-event-title'] = array(
    'setting' =>     array(
        'default'              =>  $chrimbo_customizer_defaults['chrimbo-event-featured-event-title'] 
    ),
    'control' => array(
        'label'                 =>  esc_html__( 'Title For event', 'chrimbo' ),
        'section'               => 'chrimbo-fs-acitivity-section-setting',
        'type'                  => 'text',
        'priority'              => 5,
        'active_callback'       => '',
    )
);

$chrimbo_settings_controls['chrimbo-event-featured-event-content'] = array(
    'setting' =>     array(
        'default'              =>  $chrimbo_customizer_defaults['chrimbo-event-featured-event-content'] 
    ),
    'control' => array(
        'label'                 =>  esc_html__( 'Content For event', 'chrimbo' ),
        'section'               => 'chrimbo-fs-acitivity-section-setting',
        'type'                  => 'text',
        'priority'              => 10,
        'active_callback'       => '',
    )
);

$chrimbo_settings_controls['chrimbo-event-featured-event-icon'] = array(
    'setting' =>     array(
        'default'              => $chrimbo_customizer_defaults['chrimbo-event-featured-event-icon']
    ),
    'control' => array(
        'label'                 =>  esc_html__( 'Icon for event', 'chrimbo' ),
        'description'           => sprintf( __( 'Use font awesome icon: Eg: %1$s . %2$s See more here %3$s', 'chrimbo' ), 'fa-desktop','<a href="'.esc_url('http://fontawesome.io/cheatsheet/').'" target="_blank">','</a>' ),
        'section'               => 'chrimbo-fs-acitivity-section-setting',
        'type'                  => 'text',
        'priority'              => 15,
        'active_callback'       => '',
    )
); 

// acitivity -section for location
$chrimbo_settings_controls['chrimbo-event-featured-location-title'] = array(
    'setting' =>     array(
        'default'              => $chrimbo_customizer_defaults['chrimbo-event-featured-location-title'] 
    ),
    'control' => array(
        'label'                 =>  esc_html__( 'Title For location', 'chrimbo' ),
        'section'               => 'chrimbo-fs-acitivity-section-setting',
        'type'                  => 'text',
        'priority'              => 20,
        'active_callback'       => '',
    )
);


$chrimbo_settings_controls['chrimbo-event-featured-location-content'] = array(
    'setting' =>     array(
        'default'              =>  $chrimbo_customizer_defaults['chrimbo-event-featured-location-content'] 
    ),
    'control' => array(
        'label'                 =>  esc_html__( 'Content For location', 'chrimbo' ),
        'section'               => 'chrimbo-fs-acitivity-section-setting',
        'type'                  => 'text',
        'priority'              => 25,
        'active_callback'       => '',
    )
);

$chrimbo_settings_controls['chrimbo-event-featured-location-icon'] = array(
    'setting' =>     array(
        'default'              =>  $chrimbo_customizer_defaults['chrimbo-event-featured-location-icon'] 
    ),
    'control' => array(
        'label'                 =>  esc_html__( 'Icon For location', 'chrimbo' ),
        'description'           => sprintf( __( 'Use font awesome icon: Eg: %1$s . %2$s See more here %3$s', 'chrimbo' ), 'fa-desktop','<a href="'.esc_url('http://fontawesome.io/cheatsheet/').'" target="_blank">','</a>' ),
        'section'               => 'chrimbo-fs-acitivity-section-setting',
        'type'                  => 'text',
        'priority'              => 30,
        'active_callback'       => '',
    )
);

// acitivity -section for time
$chrimbo_settings_controls['chrimbo-event-featured-time-title'] = array(
    'setting' =>     array(
        'default'              => $chrimbo_customizer_defaults['chrimbo-event-featured-time-title'] 
    ),
    'control' => array(
        'label'                 =>  esc_html__( 'Title For time', 'chrimbo' ),
        'section'               => 'chrimbo-fs-acitivity-section-setting',
        'type'                  => 'text',
        'priority'              => 35,
        'active_callback'       => '',
    )
);

$chrimbo_settings_controls['chrimbo-event-featured-time-content'] = array(
    'setting' =>     array(
        'default'              => $chrimbo_customizer_defaults['chrimbo-event-featured-time-content']
    ),
    'control' => array(
        'label'                 =>  esc_html__( 'Content For time', 'chrimbo' ),
        'section'               => 'chrimbo-fs-acitivity-section-setting',
        'type'                  => 'text',
        'priority'              => 40,
        'active_callback'       => '',
    )
);    

$chrimbo_settings_controls['chrimbo-event-featured-time-icon'] = array(
    'setting' =>     array(
        'default'              => $chrimbo_customizer_defaults['chrimbo-event-featured-time-icon']
    ),
    'control' => array(
        'label'                 =>  esc_html__( 'Content For icon', 'chrimbo' ),
        'description'           => sprintf( __( 'Use font awesome icon: Eg: %1$s . %2$s See more here %3$s', 'chrimbo' ), 'fa-desktop','<a href="'.esc_url('http://fontawesome.io/cheatsheet/').'" target="_blank">','</a>' ),
        'section'               => 'chrimbo-fs-acitivity-section-setting',
        'type'                  => 'text',
        'priority'              => 45,
        'active_callback'       => '',
    )
); 