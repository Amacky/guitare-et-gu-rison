<?php
global $chrimbo_panels;
global $chrimbo_sections;
global $chrimbo_settings_controls;
global $chrimbo_repeated_settings_controls;
global $chrimbo_customizer_defaults;

/*defaults values feature trip options*/
$chrimbo_customizer_defaults['chrimbo-feature-banner-enable']                   = 1;
$chrimbo_customizer_defaults['chrimbo-feature-banner-enable-snow-effect']       = 1;
$chrimbo_customizer_defaults['chrimbo-slider-enable-blog']                      = 1;
$chrimbo_customizer_defaults['chrimbo-slider-enable-image']                     = 1;



/*book event ticket slider enable setting*/
$chrimbo_sections['chrimbo-feature-section-options'] = array(
    'priority'       => 10,
    'title'          => esc_html__( 'Setting Options', 'chrimbo' ),
    'panel'          => 'chrimbo-feature-banner',
);

/*Feature section enable control*/
$chrimbo_settings_controls['chrimbo-feature-banner-enable'] = array(
    'setting' =>     array(
        'default'              => $chrimbo_customizer_defaults['chrimbo-feature-banner-enable']
    ),
    'control' => array(
        'label'                 =>  esc_html__( 'Enable Feature Banner', 'chrimbo' ),
        'section'               => 'chrimbo-feature-section-options',
    	'description'    		=> esc_html__( 'Enable "Feature Banner" on checked' , 'chrimbo' ),
        'type'                  => 'checkbox',
        'priority'              => 10,
        'active_callback'       => ''
    )
);

/*Feature section enable snow effect*/
$chrimbo_settings_controls['chrimbo-feature-banner-enable-snow-effect'] = array(
    'setting' =>     array(
        'default'              => $chrimbo_customizer_defaults['chrimbo-feature-banner-enable-snow-effect']
    ),
    'control' => array(
        'label'                 =>  esc_html__( 'Enable Feature Banner Snow Fall', 'chrimbo' ),
        'section'               => 'chrimbo-feature-section-options',
        'description'           => esc_html__( 'Enable "Feature Banner Snow Fall" on checked' , 'chrimbo' ),
        'type'                  => 'checkbox',
        'priority'              => 20,
        'active_callback'       => ''
    )
);


// /*for blog option */
$chrimbo_settings_controls['chrimbo-slider-enable-blog'] = array(
    'setting' => array(
        'default'          =>  $chrimbo_customizer_defaults['chrimbo-slider-enable-blog']  
    ),
    'control' => array(
        'label'             => esc_html__('Enable Slider on Blog Archive','chrimbo'),
        'section'           => 'chrimbo-feature-section-options',
        'type'              => 'checkbox',
        'priority'          => 80,
        'acticve_callback'  => ''

    )       
);

/*Feature section enable control*/
$chrimbo_settings_controls['chrimbo-slider-enable-image'] = array(
    'setting' =>     array(
        'default'              => $chrimbo_customizer_defaults['chrimbo-slider-enable-image']
    ),
    'control' => array(
        'label'                 =>  esc_html__( 'Enable Feature Banner Image ', 'chrimbo' ),
        'section'               => 'chrimbo-feature-section-options',
        'description'           => esc_html__( 'Enable "Feature Banner Image" on checked' , 'chrimbo' ),
        'type'                  => 'checkbox',
        'priority'              => 90,
        'active_callback'       => ''
    )
);