<?php
global $chrimbo_sections;
global $chrimbo_settings_controls;
global $chrimbo_repeated_settings_controls;
global $chrimbo_customizer_defaults;

/*defaults values*/
$chrimbo_customizer_defaults['chrimbo-default-layout']              = 'right-sidebar';
$chrimbo_customizer_defaults['chrimbo-archive-layout']              = 'thumbnail-and-excerpt';
$chrimbo_customizer_defaults['chrimbo-archive-image-align']         = 'full';
$chrimbo_customizer_defaults['chrimbo-number-of-archive-words']     = 30;
$chrimbo_customizer_defaults['chrimbo-single-post-image-align']     = 'full';


$chrimbo_sections['chrimbo-layout-options'] = array(
    'priority'       => 20,
    'title'          => esc_html__( 'Layout Options', 'chrimbo' ),
    'panel'          => 'chrimbo-theme-options',
);


/*layout-options option responsive lodader start*/
$chrimbo_settings_controls['chrimbo-default-layout'] = array(
    'setting' =>     array(
        'default'              => $chrimbo_customizer_defaults['chrimbo-default-layout'],
    ),
    'control' => array(
        'label'                 =>  esc_html__( 'Default Layout', 'chrimbo' ),
        'description'           =>  esc_html__( 'Layout for all archives, single posts and pages', 'chrimbo' ),
        'section'               => 'chrimbo-layout-options',
        'type'                  => 'select',
        'choices'               => array(
            'right-sidebar' => esc_html__( 'Content - Primary Sidebar', 'chrimbo' ),
            'left-sidebar'  => esc_html__( 'Primary Sidebar - Content', 'chrimbo' ),
            'no-sidebar'    => esc_html__( 'No Sidebar', 'chrimbo' )
        ),
        'priority'              => 20,
        'active_callback'       => ''
    )
);

$chrimbo_settings_controls['chrimbo-number-of-archive-words'] = array(
    'setting' =>     array(
        'default'              => $chrimbo_customizer_defaults['chrimbo-number-of-archive-words']
    ),
    'control' => array(
        'label'                 =>  esc_html__( 'Number Of Words For Excerpt', 'chrimbo' ),
        'description'           =>  esc_html__( 'This will controll the excerpt length on listing page', 'chrimbo' ),
        'section'               => 'chrimbo-layout-options',
        'type'                  => 'number',
        'priority'              => 40,
        'input_attrs' => array( 'min' => 1, 'max' => 2000),
        'active_callback'       => ''
    )
);


$chrimbo_settings_controls['chrimbo-single-post-image-align'] = array(
    'setting' =>     array(
        'default'              => $chrimbo_customizer_defaults['chrimbo-single-post-image-align'],
    ),
    'control' => array(
        'label'                 =>  esc_html__( 'Alignment Of Image In Single Post/Page', 'chrimbo' ),
        'description'           =>  esc_html__( 'Please note that this setting can be override form individual post/page', 'chrimbo' ),
        'section'               => 'chrimbo-layout-options',
        'type'                  => 'select',
        'choices'  => array(
            'full'      => esc_html__( 'Full', 'chrimbo' ),
            'right'     => esc_html__( 'Right', 'chrimbo' ),
            'left'      => esc_html__( 'Left', 'chrimbo' ),
            'no-image'  => esc_html__( 'No image', 'chrimbo' )
        ),
        'priority'              => 50,
    )
);