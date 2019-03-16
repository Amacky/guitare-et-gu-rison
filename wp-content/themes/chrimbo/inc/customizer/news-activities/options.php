<?php
global $chrimbo_panels;
global $chrimbo_sections;
global $chrimbo_settings_controls;
global $chrimbo_repeated_settings_controls;
global $chrimbo_customizer_defaults;

/*defaults values*/
$chrimbo_customizer_defaults['chrimbo-activities-enable']           = 1;
$chrimbo_customizer_defaults['chrimbo-activities-title']            = esc_html__('Events and Activity','chrimbo');
$chrimbo_customizer_defaults['chrimbo-activities-selection']        = 'from-category';
$chrimbo_customizer_defaults['chrimbo-activities-number']           = 3;
$chrimbo_customizer_defaults['chrimbo-activities-word-count']       = 30;
$chrimbo_customizer_defaults['chrimbo-activities-enable-image']         = 1;



/*activities setting*/
$chrimbo_sections['chrimbo-activities-controll-setting'] = array(
    'priority'       => 10,
    'title'          => esc_html__( 'News-Activities Options Settings', 'chrimbo' ),
    'panel'          => 'chrimbo-activities-section',
);

// enable option for news activities
$chrimbo_settings_controls['chrimbo-activities-enable'] = array(
    'setting' =>     array(
        'default'              => $chrimbo_customizer_defaults['chrimbo-activities-enable']
    ),
    'control' => array(
        'label'                 =>  esc_html__( 'Enable News-Activities Section On', 'chrimbo' ),
        'section'               => 'chrimbo-activities-controll-setting',
        'type'                  => 'checkbox',
        'priority'              => 10,
        'active_callback'       => ''
    )
);

// mian titile option 
$chrimbo_settings_controls['chrimbo-activities-title'] = array(
    'setting' =>     array(
        'default'              => $chrimbo_customizer_defaults['chrimbo-activities-title']
    ),
    'control' => array(
        'label'                 =>  esc_html__( 'Main Title Text', 'chrimbo' ),
        'section'               => 'chrimbo-activities-controll-setting',
        'type'                  => 'text',
        'priority'              => 20,
        'active_callback'       => ''
    )
);

// select the number of page option
$chrimbo_settings_controls['chrimbo-activities-number'] = array(
    'setting' =>     array(
        'default'              => $chrimbo_customizer_defaults['chrimbo-activities-number']
    ),
    'control' => array(
        'label'                 =>  esc_html__( 'Number Of News-Activities Section', 'chrimbo' ),
        'section'               => 'chrimbo-activities-controll-setting',
        'type'                  => 'select',
        'choices'               => array(
            1 => esc_html__( '1', 'chrimbo' ),
            2 => esc_html__( '2', 'chrimbo' ),
            3 => esc_html__( '3', 'chrimbo' ),
        ),
        'priority'              => 30,
        'active_callback'       => ''
    )
);

// slect number of count in news activities
$chrimbo_settings_controls['chrimbo-activities-word-count'] = array(
    'setting' =>     array(
        'default'              => $chrimbo_customizer_defaults['chrimbo-activities-word-count']
    ),
    'control' => array(
        'label'                 =>  esc_html__( 'Nesw-Activity-page- Number Of Words', 'chrimbo' ),
        'description'           =>  esc_html__( 'If you do not have selected from - Custom', 'chrimbo' ),
        'section'               => 'chrimbo-activities-controll-setting',
        'type'                  => 'number',
        'priority'              => 35,
        'input_attrs' => array( 'min' => 1, 'max' => 200),
        'active_callback'       => ''

    )
);

// select the number of page option
$chrimbo_settings_controls['chrimbo-activities-selection'] = array(
    'setting' =>     array(
        'default'              => $chrimbo_customizer_defaults['chrimbo-activities-selection']
    ),
    'control' => array(
        'label'                 =>  esc_html__( 'Select Post Type', 'chrimbo' ),
        'section'               => 'chrimbo-activities-controll-setting',
        'type'                  => 'select',
        'choices'   => array(
            'from-category' => esc_html__( 'From Category', 'chrimbo' ),
            'from-page'     => esc_html__( 'From Page', 'chrimbo' ),
        ),
        'priority'              => 40,
        'active_callback'       => ''
    )
);

/*Feature section enable control*/
$chrimbo_settings_controls['chrimbo-activities-enable-image'] = array(
    'setting' =>     array(
        'default'              => $chrimbo_customizer_defaults['chrimbo-activities-enable-image']
    ),
    'control' => array(
        'label'                 =>  esc_html__( 'Enable Feature Banner Image ', 'chrimbo' ),
        'section'               => 'chrimbo-activities-controll-setting',
        'description'           => esc_html__( 'Enable "Feature Banner Image" on checked' , 'chrimbo' ),
        'type'                  => 'checkbox',
        'priority'              => 90,
        'active_callback'       => ''
    )
);