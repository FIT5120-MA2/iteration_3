<?php
/**
     * Load Update to Pro section
     */
     require get_template_directory() . '/inc/customizer-pro/class-customize.php';





/**
 * Saraswati blog Theme Customizer.
 *
 * @package saraswati-blog
 */


/**
 * Sanitizing the select callback example
 *
 * @since saraswati-blog 1.0.0
 *
 * @see sanitize_key()https://developer.wordpress.org/reference/functions/sanitize_key/
 * @see $wp_customize->get_control() https://developer.wordpress.org/reference/classes/wp_customize_manager/get_control/
 *
 * @param $input
 * @param $setting
 * @return sanitized output
 *
 */
if ( !function_exists('saraswati_blog_sanitize_select') ) :
    function saraswati_blog_sanitize_select( $input, $setting ) 
   {

        // Ensure input is a slug.
        $input = sanitize_key( $input );

        // Get list of choices from the control associated with the setting.
        $choices = $setting->manager->get_control( $setting->id )->choices;

        // If the input is a valid key, return it; otherwise, return the default.
        return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
    }
endif;


/**
 * Sanitize checkbox field
 *
 * @since Newie 1.0.0
 *
 * @param $checked
 * @return Boolean
 */
if ( !function_exists('saraswati_blog_sanitize_checkbox') ) :
    function saraswati_blog_sanitize_checkbox( $checked ) {
        // Boolean check.
        return ( ( isset( $checked ) && true == $checked ) ? true : false );
    }
endif;
/**
 * Sanitize RGBA color field
 *
 * @since Newie 1.0.0
 *
 * @param $checked
 * @return Boolean
 */
function saraswati_blog_sanitize_rgba( $color ) {
    if ( empty( $color ) || is_array( $color ) )
        return 'rgba(0,0,0,0)';

    // If string does not start with 'rgba', then treat as hex
    // sanitize the hex color and finally convert hex to rgba
    if ( false === strpos( $color, 'rgba' ) ) {
        return sanitize_hex_color( $color );
    }

    // By now we know the string is formatted as an rgba color so we need to further sanitize it.
    $color = str_replace( ' ', '', $color );
    sscanf( $color, 'rgba(%d,%d,%d,%f)', $red, $green, $blue, $alpha );
    return 'rgba('.$red.','.$green.','.$blue.','.$alpha.')';
}

/**
 * Sidebar layout options
 *
 * @since saraswati-blog 1.0.0
 *
 * @param null
 * @return array $saraswati_blog_sidebar_layout
 *
 */
if ( !function_exists('saraswati_blog_sidebar_layout') ) :
    function saraswati_blog_sidebar_layout()
    {
        $saraswati_blog_sidebar_layout =  array(
            'right-sidebar' => __( 'Right Sidebar', 'saraswati-blog'),
            'left-sidebar'  => __( 'Left Sidebar' , 'saraswati-blog'),
            'no-sidebar'    => __( 'No Sidebar', 'saraswati-blog')
        );
        return apply_filters( 'saraswati_blog_sidebar_layout', $saraswati_blog_sidebar_layout );
    }
endif;




/**
 *  Default Theme options
 *
 * @since saraswati-blog 1.0.0
 *
 * @param null
 * @return array $saraswati_blog_theme_layout
 *
 */
if ( !function_exists('saraswati_blog_default_theme_options') ) :
    function saraswati_blog_default_theme_options() 
   {

        $default_theme_options = array(
            /*feature section options*/
            'saraswati-blog-feature-cat'             => 0,
            'saraswati-blog-theme-header-top-enable' => 1,
            'saraswati-blog-sticky-sidbar-enable'    => 1,
            'saraswati-blog-top-header-menu'         => 1,
            'saraswati-blog-header-social'           => 1,
            'saraswati-blog-post-meta'               => 0,
            'saraswati-blog-excerpt-lenght'          => 25,
            'saraswati-blog-footer-copyright'        => esc_html__( 'Saraswati Blog WordPress Theme, Copyright 2017', 'saraswati-blog'),
            'saraswati-blog-layout'                  => 'right-sidebar',
            'saraswati-blog-featured-image'          => 'default',
            'saraswati-blog-meta-options'            => 1,
            'breadcrumb_option'                      => 'simple',
            'saraswati-blog-realted-post'            => 0,
            'saraswati-blog-continue-reading-options'=> esc_html__( 'Continue Reading', 'saraswati-blog' ),
            'saraswati-blog-realted-post-title'      => esc_html__( 'Related Posts', 'saraswati-blog' ),
            'saraswati-blog-single-featured-image'   => 1,
            'hide-breadcrumb-at-home'                => 1 ,
            'saraswati-blog-breadcrumb-text-option'  => esc_html__( 'You Are Here', 'saraswati-blog' ),
            'primary_color'                          => '#617c58',
            'slider_caption_bg_color'                => 'rgba(255,255,255,.9)',
            'hide-slider-post-at-category'           => 1,



        ); 

        return apply_filters( 'saraswati_blog_default_theme_options', $default_theme_options );
    }
endif;

/**
 *  Get theme options
 *
 * @since saraswati-blog 1.0.0
 *
 * @param null
 * @return array saraswati_blog_theme_options
 *
 */
if ( !function_exists('saraswati_blog_get_theme_options') ) :
    function saraswati_blog_get_theme_options()
    {

        $saraswati_blog_default_theme_options = saraswati_blog_default_theme_options();
        

        $saraswati_blog_get_theme_options = get_theme_mod( 'saraswati_blog_theme_options');
        
        if( is_array( $saraswati_blog_get_theme_options )){
          
            return array_merge( $saraswati_blog_default_theme_options, $saraswati_blog_get_theme_options );
        }

        else{

            return $saraswati_blog_default_theme_options;
        }

    }
endif;


/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function saraswati_blog_customize_register( $wp_customize )
{
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
    $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';
    $wp_customize->get_setting('custom_logo')->transport = 'refresh';
    $wp_customize->add_section( 'theme_detail', array(
            'title'    => __( 'About Theme', 'saraswati-blog' ),
            'priority' => 9
        ) );
    
        
        $wp_customize->add_setting( 'upgrade_text', array(
            'default' => '',
            'sanitize_callback' => '__return_false'
        ) );
        
        $wp_customize->add_control( new Saraswati_Blog_Customize_Static_Text_Control( $wp_customize, 'upgrade_text', array(
            'section'     => 'theme_detail',
            'label'       => __( 'Upgrade to PRO', 'saraswati-blog' ),
            'description' => array('')
        ) ) );


	/*defaults options*/
    $defaults = saraswati_blog_default_theme_options() ;

    
       
    /**
     * Load customizer custom-controls
     */
    require get_template_directory() . '/inc/customizer-inc/custom-controls.php';

    /**
     * Load customizer feature section
     */
    require get_template_directory() . '/inc/customizer-inc/saraswati-blog-theme-options.php';

}
add_action( 'customize_register', 'saraswati_blog_customize_register' );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function saraswati_blog_customize_preview_js() 
{
	wp_enqueue_script( 'saraswati_blog_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151216', true );
}
add_action( 'customize_preview_init', 'saraswati_blog_customize_preview_js' );


function saraswati_blog_customizer_script() {
  
    wp_enqueue_style( 'saraswati-blog-customizer-style', get_template_directory_uri() .'/inc/css/customizer-style.css'); 

   wp_enqueue_script( 'saraswati-blog-alpha-color-picker', get_template_directory_uri() .'/inc/js/alpha-color-picker.js',array( 'jquery', 'wp-color-picker' ),
            time());
}
add_action( 'customize_controls_enqueue_scripts', 'saraswati_blog_customizer_script' );




