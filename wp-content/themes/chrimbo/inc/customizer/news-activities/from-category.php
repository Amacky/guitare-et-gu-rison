<?php
global $chrimbo_panels;
global $chrimbo_sections;
global $chrimbo_settings_controls;
global $chrimbo_repeated_settings_controls;
global $chrimbo_customizer_defaults;

/*defaults values*/
$chrimbo_customizer_defaults['chrimbo-activities-category'] = 0;



/*page selection*/
$chrimbo_sections['chrimbo-activities-category'] = array(
    'priority'       => 40,
    'title'          => esc_html__( 'News-Activities Form Category', 'chrimbo' ),
    'description'    => esc_html__( 'This option only work when you have selected "category" in "Select Activities Section From" ', 'chrimbo' ),
    'panel'          => 'chrimbo-activities-section',
);

/*creating setting control for chrimbo-news-activities-page start*/
$chrimbo_settings_controls['chrimbo-activities-category'] = array(
        'setting' =>     array(
            'default'              => $chrimbo_customizer_defaults['chrimbo-activities-category'],
        ),
        'control' => array(
            'label'                 =>  esc_html__( 'Select Post For Slide ', 'chrimbo' ),
            'section'               => 'chrimbo-activities-category',
            'type'                  => 'category_dropdown',
            'priority'              => 20,
            'description'           => ''
        ),

    'chrimbo-activities-category-divider' => array(
        'control' => array(
            'section'               => 'chrimbo-activities-category',
            'type'                  => 'message',
            'priority'              => 30,
            'description'           => '<br /><hr />'
        )
    )
);

