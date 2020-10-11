<?php

// Setting site primary color.
$wp_customize->add_setting( 'saraswati_blog_theme_options[primary_color]',
    array(
        'default'           => $defaults['primary_color'],
        'sanitize_callback' => 'sanitize_hex_color',
    )
);

$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'saraswati_blog_theme_options[primary_color]',
        array(
            'label'       => esc_html__( 'Primary Color', 'saraswati-blog' ),
            'description' => esc_html__( 'Applied to main color of site.', 'saraswati-blog' ),
            'section'     => 'colors',  
        )
    )
);

    // Overlay Color Picker control. 
        $wp_customize->add_setting(           
             'saraswati_blog_separator',
                array(
                    'default' => '',
                    'sanitize_callback' => 'sanitize_text_field',
                )
        );
        $wp_customize->add_control(new Saraswati_Blog_Customize_Section_Separator(
            $wp_customize, 
                'saraswati_blog_separator', 
                array(
                    'type'      => 'saraswati_blog_separator',
                    'label' => esc_html__( 'Slider Caption Background Color', 'saraswati-blog' ),
                    'section'   => 'colors',
                    'priority'  => 110,
                )                   
            )
        );

    // Overlay Color Picker control. 
     $wp_customize->add_setting(
        'saraswati_blog_theme_options[slider_caption_bg_color]',
        array(
           'default'     =>  $defaults['slider_caption_bg_color'],
           'type'       => 'theme_mod',
           'capability'  => 'edit_theme_options',
           'sanitize_callback' => 'saraswati_blog_sanitize_rgba',
          

        )
    );
    $wp_customize->add_control(
        new Saraswati_Blog_Color_Control(
            $wp_customize,
             'saraswati_blog_theme_options[slider_caption_bg_color]',
            array(
              
                'section' => 'colors',
                'priority' => 110,
                
            )
        )
    );


/**
 * Theme Option
 *
 * @since 1.0.0
 */
$wp_customize->add_panel(
    'saraswati_blog_theme_options', 
    	array(
        		'priority'       => 200,
            	'capability'     => 'edit_theme_options',
            	'theme_supports' => '',
            	'title'          => esc_html__( 'Theme Options', 'saraswati-blog' ),
             ) 
);


/*adding sections for Header options*/
    $wp_customize->add_section( 'saraswati-blog-theme-header-option', array(
        'priority'       => 150,
        'capability'     => 'edit_theme_options',
        'panel'          => 'saraswati_blog_theme_options',
        'title'          => __( 'Header Option', 'saraswati-blog' )
    ) );

     /*Enable Header Top*/
    $wp_customize->add_setting( 'saraswati_blog_theme_options[saraswati-blog-theme-header-top-enable]', array(
        'capability'        => 'edit_theme_options',
        'default'           => $defaults['saraswati-blog-theme-header-top-enable'],
        'sanitize_callback' => 'saraswati_blog_sanitize_checkbox'
    ) );
    $wp_customize->add_control( 'saraswati-blog-theme-header-top-enable', array(
        'label'       => __( 'Enable Header Top Section', 'saraswati-blog' ),
        'description' => __('This section include Top Header Section', 'saraswati-blog'),
        'section'     => 'saraswati-blog-theme-header-option',
        'settings'    => 'saraswati_blog_theme_options[saraswati-blog-theme-header-top-enable]',
        'type'        => 'checkbox',
        'priority'    => 10
    ) );



 /*Top Header Menu Options */
    $wp_customize->add_setting( 'saraswati_blog_theme_options[saraswati-blog-top-header-menu]', array(
        'capability'        => 'edit_theme_options',
        'default'           => $defaults['saraswati-blog-top-header-menu'],
        'sanitize_callback' => 'saraswati_blog_sanitize_checkbox'
    ) );
    $wp_customize->add_control( 'saraswati-blog-top-header-menu', array(
        'label'     => __( 'Enable/Disable Top Header Menu', 'saraswati-blog' ),
        'section'   => 'saraswati-blog-theme-header-option',
        'settings'  => 'saraswati_blog_theme_options[saraswati-blog-top-header-menu]',
        'type'      => 'checkbox',
        'priority'  => 10
    ) );


   /*Social Options */
    $wp_customize->add_setting( 'saraswati_blog_theme_options[saraswati-blog-header-social]', array(
        'capability'        => 'edit_theme_options',
        'default'           => $defaults['saraswati-blog-header-social'],
        'sanitize_callback' => 'saraswati_blog_sanitize_checkbox'
    ) );
    $wp_customize->add_control( 'saraswati-blog-header-social', array(
        'label'     => __( 'Enable/Disable Social Share in Header', 'saraswati-blog' ),
        'section'   => 'saraswati-blog-theme-header-option',
        'settings'  => 'saraswati_blog_theme_options[saraswati-blog-header-social]',
        'type'      => 'checkbox',
        'priority'  => 10
    ) );




   /*adding sections for Breadcrumbs for pages/posts*/
$wp_customize->add_section( 'breadcrumb_type',
 array(
        'priority'       => 160,
        'capability'     => 'edit_theme_options',
        'title'          => __( 'Breadcrumbs Section', 'saraswati-blog' ),
        'panel'          => 'saraswati_blog_theme_options',
      

      ) );

/* breadcrumb_option*/
$wp_customize->add_setting( 'saraswati_blog_theme_options[breadcrumb_option]',
 array(
            'capability'        => 'edit_theme_options',
            'default'           => $defaults['breadcrumb_option'],
            'sanitize_callback' => 'saraswati_blog_sanitize_select'
      ) );

$wp_customize->add_control('saraswati_blog_theme_options[breadcrumb_option]',
    array(
        'label' => esc_html__('Breadcrumb Options', 'saraswati-blog'),
         'section'   => 'breadcrumb_type',
        'settings'  => 'saraswati_blog_theme_options[breadcrumb_option]',
        'choices'   => array(
        'simple'     => esc_html__('Simple', 'saraswati-blog'),
        'disable'    => esc_html__('Disable', 'saraswati-blog'),
          ),
        'type' => 'select',
        'priority' => 10
    )
);


 /**
     * Breadcrumb Text Field Option 
     */
    $wp_customize->add_setting(
        'saraswati_blog_theme_options[saraswati-blog-breadcrumb-text-option]',
        array(
                'default'           => $defaults['saraswati-blog-breadcrumb-text-option'],
                'sanitize_callback' => 'sanitize_text_field',
             )
    );
    $wp_customize->add_control('saraswati_blog_theme_options[saraswati-blog-breadcrumb-text-option]',
        array(
                'label'      => esc_html__('Breadcrumb Text Field','saraswati-blog'),
                'section'   => 'breadcrumb_type',
                'settings'  => 'saraswati_blog_theme_options[saraswati-blog-breadcrumb-text-option]',
                'type'      => 'text',
                'priority'  => 10
             )
    );

 

    /*adding sections for category section in front page*/
$wp_customize->add_section( 'saraswati-blog-feature-category',
 array(
        'priority'       => 160,
        'capability'     => 'edit_theme_options',
        'title'          => __( 'Slider Section', 'saraswati-blog' ),
        'panel'          => 'saraswati_blog_theme_options',
        'description'    => __( 'Recommended image for slider is 1920*700', 'saraswati-blog' )

      ) );

/* feature cat selection */
$wp_customize->add_setting( 'saraswati_blog_theme_options[saraswati-blog-feature-cat]',
 array(
            'capability'		=> 'edit_theme_options',
            'default'			=> $defaults['saraswati-blog-feature-cat'],
            'sanitize_callback' => 'absint'
      ) );

$wp_customize->add_control(
    new Saraswati_Blog_Customize_Category_Dropdown_Control(
        $wp_customize,
        'saraswati_blog_theme_options[saraswati-blog-feature-cat]',
        array(
                'label'		=> __( 'Select Category', 'saraswati-blog' ),
                'section'   => 'saraswati-blog-feature-category',
                'settings'  => 'saraswati_blog_theme_options[saraswati-blog-feature-cat]',
                'type'	  	=> 'category_dropdown',
                'priority'  => 10
             )
    )
);


/* Hide/Show Slider Post in Category Section */

$wp_customize          -> add_setting( 'saraswati_blog_theme_options[hide-slider-post-at-category]',
 array(
        'capability'        => 'edit_theme_options',
        'default'           => $defaults['hide-slider-post-at-category'],
        'sanitize_callback' => 'saraswati_blog_sanitize_checkbox'
      ) );

$wp_customize           -> add_control('saraswati_blog_theme_options[hide-slider-post-at-category]',
            array(
                    'label'     => __( 'Show Slider Post on Category Post', 'saraswati-blog'),
                    'section'   => 'saraswati-blog-feature-category',
                    'type'      => 'checkbox',
                    'priority'  => 10
                 )
    );


/*adding sections for category selection for promo section in homepage*/
$wp_customize        -> add_section( 'saraswati-blog-site-layout',
 array(
        'priority'       => 160,
        'capability'     => 'edit_theme_options',
        'panel'          => 'saraswati_blog_theme_options',
        'title'          => __( 'Blog Section Options', 'saraswati-blog' )
      ) );

/* Sidebar selection */
$wp_customize          -> add_setting( 'saraswati_blog_theme_options[saraswati-blog-layout]',
 array(
        'capability'		=> 'edit_theme_options',
        'default'			=> $defaults['saraswati-blog-layout'],
        'sanitize_callback' => 'saraswati_blog_sanitize_select'
      ) );

$choices                = saraswati_blog_sidebar_layout();
$wp_customize           -> add_control('saraswati_blog_theme_options[saraswati-blog-layout]',
            array(
                    'choices'   => $choices,
                    'label'		=> __( 'Select Sidebar Options', 'saraswati-blog'),
                    'section'   => 'saraswati-blog-site-layout',
                    'settings'  => 'saraswati_blog_theme_options[saraswati-blog-layout]',
                    'type'	  	=> 'select',
                    'priority'  => 10
                 )
    );


   /**
     * Enter Excerpt Length
     */
    $wp_customize->add_setting(
        'saraswati_blog_theme_options[saraswati-blog-excerpt-lenght]',
        array(
                'default'           => $defaults['saraswati-blog-excerpt-lenght'],
                'sanitize_callback' => 'absint',
             )
    );
    $wp_customize->add_control('saraswati_blog_theme_options[saraswati-blog-excerpt-lenght]',
        array(
                'label'      => esc_html__('Enter Excerpt Length ','saraswati-blog'),
                'section'    => 'saraswati-blog-site-layout',
                'description' => esc_html__('Enter Your Excerpt Lenght.', 'saraswati-blog'),
                'settings'  => 'saraswati_blog_theme_options[saraswati-blog-excerpt-lenght]',
                'type'      => 'number',
                'priority'  => 10
             )
    );


   /*Featured Image Options*/
            $wp_customize->add_setting( 'saraswati_blog_theme_options[saraswati-blog-featured-image]', array(
                'capability'        => 'edit_theme_options',
                'transport' => 'refresh',
                'default'           => $defaults['saraswati-blog-featured-image'],
                'sanitize_callback' => 'saraswati_blog_sanitize_select'
            ) );
            $wp_customize->add_control( 'saraswati_blog_theme_options[saraswati-blog-featured-image]', array(
                'choices' => array(
                            'left-image'  => __('Left Image','saraswati-blog'),
                            'right-image' => __('Right Image','saraswati-blog'),
                            'default'  => __('Default','saraswati-blog'),
                            'hide-image'  => __('Hide Image','saraswati-blog')       
                            ),
                'label'     => __( 'Featured Image Options', 'saraswati-blog' ),
                'description' => __('Select the options to change the featured image position or hide', 'saraswati-blog'),
                'section'   => 'saraswati-blog-site-layout',
                'settings'  => 'saraswati_blog_theme_options[saraswati-blog-featured-image]',
                'type'      => 'select',
                'priority'  => 10
            ) );

    
    /*Meta Options*/
            $wp_customize->add_setting( 'saraswati_blog_theme_options[saraswati-blog-meta-options]', array(
                'capability'        => 'edit_theme_options',
                'transport'         => 'refresh',
                'default'           => $defaults['saraswati-blog-meta-options'],
                'sanitize_callback' => 'saraswati_blog_sanitize_checkbox'
            ) );
            $wp_customize->add_control( 'saraswati_blog_theme_options[saraswati-blog-meta-options]', array(
                'label'     => __( 'Meta Show/Hide Options', 'saraswati-blog' ),
                'description' => __('Checked to hide Meta Options', 'saraswati-blog'),
                'section'   => 'saraswati-blog-site-layout',
                'settings'  => 'saraswati_blog_theme_options[saraswati-blog-meta-options]',
                'type'      => 'checkbox',
                'priority'  => 10
            ) );
    

    /*Continue Reading Text Options*/
            $wp_customize->add_setting( 'saraswati_blog_theme_options[saraswati-blog-continue-reading-options]', array(
                'capability'        => 'edit_theme_options',
                'transport'         => 'refresh',
                'default'           => $defaults['saraswati-blog-continue-reading-options'],
                'sanitize_callback' => 'sanitize_text_field'
            ) );
            $wp_customize->add_control( 'saraswati_blog_theme_options[saraswati-blog-continue-reading-options]', array(
                'label'     => __( 'Continue Reading Text', 'saraswati-blog' ),
                'description' => __('Enter Text For Continue Reading', 'saraswati-blog'),
                'section'   => 'saraswati-blog-site-layout',
                'settings'  => 'saraswati_blog_theme_options[saraswati-blog-continue-reading-options]',
                'type'      => 'text',
                'priority'  => 10
            ) );

  /**
     * Related Posts title
     */
    $wp_customize->add_setting(
        'saraswati_blog_theme_options[saraswati-blog-realted-post-title]',
        array(
                'default'           => $defaults['saraswati-blog-realted-post-title'],
                'sanitize_callback' => 'sanitize_text_field',
             )
    );
    $wp_customize->add_control('saraswati_blog_theme_options[saraswati-blog-realted-post-title]',
        array(
                'label'      => esc_html__('Related Posts title ','saraswati-blog'),
                'section'   => 'saraswati-blog-single-option',
                'settings'  => 'saraswati_blog_theme_options[saraswati-blog-realted-post-title]',
                'type'      => 'text',
                'priority'  => 10
             )
    );



/*adding sections for Single Post Options*/
    $wp_customize        -> add_section( 'saraswati-blog-single-option', 
        array(
                'priority'       => 170,
                'capability'     => 'edit_theme_options',
                'theme_supports' => '',
                'panel'          => 'saraswati_blog_theme_options',
                'title'          => __( 'Single Post Options', 'saraswati-blog' )
             ) );

/* Single Feature Image options */
$wp_customize          -> add_setting( 'saraswati_blog_theme_options[saraswati-blog-single-featured-image]',
 array(
        'capability'        => 'edit_theme_options',
        'default'           => $defaults['saraswati-blog-single-featured-image'],
        'sanitize_callback' => 'saraswati_blog_sanitize_checkbox'
      ) );

$wp_customize           -> add_control('saraswati_blog_theme_options[saraswati-blog-single-featured-image]',
            array(
                    'label'     => __( 'Featured Image Options', 'saraswati-blog'),
                    'description' => __('Show/Hide Featured Image on Single Post', 'saraswati-blog'),
                    'section'   => 'saraswati-blog-single-option',
                    'settings'  => 'saraswati_blog_theme_options[saraswati-blog-single-featured-image]',
                    'type'      => 'checkbox',
                    'priority'  => 10
                 )
    );



/* Related post Section */
$wp_customize          -> add_setting( 'saraswati_blog_theme_options[saraswati-blog-realted-post]',
 array(
        'capability'        => 'edit_theme_options',
        'default'           => $defaults['saraswati-blog-realted-post'],
        'sanitize_callback' => 'saraswati_blog_sanitize_checkbox'
      ) );

$wp_customize           -> add_control('saraswati_blog_theme_options[saraswati-blog-realted-post]',
            array(
                    'label'     => __( 'Show/Hide Related Post', 'saraswati-blog'),
                    'section'   => 'saraswati-blog-single-option',
                    'settings'  => 'saraswati_blog_theme_options[saraswati-blog-realted-post]',
                    'type'      => 'checkbox',
                    'priority'  => 10
                 )
    );


$wp_customize          -> add_setting( 'saraswati_blog_theme_options[saraswati-blog-post-meta]',
 array(
        'capability'        => 'edit_theme_options',
        'default'           => $defaults['saraswati-blog-post-meta'],
        'sanitize_callback' => 'saraswati_blog_sanitize_checkbox'
      ) );

$wp_customize           -> add_control('saraswati_blog_theme_options[saraswati-blog-post-meta]',
            array(
                    'label'     => __( 'Show/Hide Related Post Post Meta', 'saraswati-blog'),
                    'section'   => 'saraswati-blog-single-option',
                    'settings'  => 'saraswati_blog_theme_options[saraswati-blog-post-meta]',
                    'type'      => 'checkbox',
                    'priority'  => 10
                 )
    );


/*adding sections for footer options*/
    $wp_customize        -> add_section( 'saraswati-blog-footer-option', 
        array(
                'priority'       => 170,
                'capability'     => 'edit_theme_options',
                'theme_supports' => '',
                'panel'          => 'saraswati_blog_theme_options',
                'title'          => __( 'Footer Option', 'saraswati-blog' )
             ) );

    /*copyright*/
    $wp_customize           -> add_setting( 'saraswati_blog_theme_options[saraswati-blog-footer-copyright]',
      array(
                'capability'        => 'edit_theme_options',
                'default'           => $defaults['saraswati-blog-footer-copyright'],
                'sanitize_callback' => 'wp_kses_post'
            ) );
    $wp_customize   -> 
    add_control( 'saraswati-blog-footer-copyright',
     array(
            'label'     => __( 'Copyright Text', 'saraswati-blog' ),
            'section'   => 'saraswati-blog-footer-option',
            'settings'  => 'saraswati_blog_theme_options[saraswati-blog-footer-copyright]',
            'type'      => 'text',
            'priority'  => 10
          ) );




/*adding sections for Sticky Sidebar Options*/
    $wp_customize        -> add_section( 'saraswati-blog-sticky-sidbar-option', 
        array(
                'priority'       => 170,
                'capability'     => 'edit_theme_options',
                'theme_supports' => '',
                'panel'          => 'saraswati_blog_theme_options',
                'title'          => __( 'Sticky Sidebar Option', 'saraswati-blog' )
             ) );

/* Single Feature Image options */
$wp_customize          -> add_setting( 'saraswati_blog_theme_options[saraswati-blog-sticky-sidbar-enable]',
 array(
        'capability'        => 'edit_theme_options',
        'default'           => $defaults['saraswati-blog-sticky-sidbar-enable'],
        'sanitize_callback' => 'saraswati_blog_sanitize_checkbox'
      ) );

$wp_customize           -> add_control('saraswati_blog_theme_options[saraswati-blog-sticky-sidbar-enable]',
            array(
                    'label'     => __( 'Sticky Sidebar Options', 'saraswati-blog'),
                    'description' => __('Sticky Sidebar Option Enable/Disable Sticky Sidebar', 'saraswati-blog'),
                    'section'   => 'saraswati-blog-sticky-sidbar-option',
                    'settings'  => 'saraswati_blog_theme_options[saraswati-blog-sticky-sidbar-enable]',
                    'type'      => 'checkbox',
                    'priority'  => 10
                 )
    );