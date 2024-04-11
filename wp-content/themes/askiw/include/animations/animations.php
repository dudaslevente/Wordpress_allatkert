<?php if( ! defined( 'ABSPATH' ) ) exit;
/**
 * Enqueue scripts and styles.
 */
function askiw__animations_scripts() {	
	wp_enqueue_style( 'style-aos-css', get_template_directory_uri() . '/include/animations/aos.css' );
	wp_enqueue_script( 'style-aos-js', get_template_directory_uri() . '/include/animations/aos.js', array(), '', true);
	wp_enqueue_script( 'style-aos-options-js', get_template_directory_uri() . '/include/animations/aos-options.js', array(), '', true);
}
add_action( 'wp_enqueue_scripts', 'askiw__animations_scripts' );
function  askiw__animation ($animation) {
	if ( get_theme_mod( $animation ) != "none" and get_theme_mod( $animation ) != ""  )  {
		return "data-aos-delay='100'"." ".
		"data-aos-duration='500'"." ".
		"data-aos='".esc_html ( get_theme_mod( $animation ) )."'";
	}
	if ( get_theme_mod( $animation  ) == "" ) {
		return "data-aos-delay='100'"." ".
		"data-aos-duration='500'"." ".
		"data-aos='slide-right'";		
	}
}
function askiw__animations() {
	$array = array(
				'' => esc_attr__( 'Default', 'askiw' ),			
				'none' => esc_attr__( 'Deactivate Animation', 'askiw' ),			
				'fade' => esc_attr__( 'fade', 'askiw' ),
				'fade-up' => esc_attr__( 'fade-up', 'askiw' ),
				'fade-down' => esc_attr__( 'fade-down', 'askiw' ),
				'fade-left' => esc_attr__( 'fade-left', 'askiw' ),
				'fade-right' => esc_attr__( 'fade-right', 'askiw' ),
				'fade-up-right' => esc_attr__( 'fade-up-right', 'askiw' ),
				'fade-up-left' => esc_attr__( 'fade-up-left', 'askiw' ),
				'fade-down-right' => esc_attr__( 'fade-down-right', 'askiw' ),
				'fade-down-left' => esc_attr__( 'fade-down-left', 'askiw' ),
				'flip-up' => esc_attr__( 'flip-up', 'askiw' ),
				'flip-down' => esc_attr__( 'flip-down', 'askiw' ),
				'flip-left' => esc_attr__( 'flip-left', 'askiw' ),
				'flip-right' => esc_attr__( 'flip-right', 'askiw' ),
				'slide-up' => esc_attr__( 'slide-up', 'askiw' ),
				'slide-down' => esc_attr__( 'slide-down', 'askiw' ),
				'slide-left' => esc_attr__( 'slide-left', 'askiw' ),
				'slide-right' => esc_attr__( 'slide-right', 'askiw' ),
				'zoom-in' => esc_attr__( 'zoom-in', 'askiw' ),
				'zoom-in-up' => esc_attr__( 'zoom-in-up', 'askiw' ),
				'zoom-in-down' => esc_attr__( 'zoom-in-down', 'askiw' ),
				'zoom-in-left' => esc_attr__( 'zoom-in-left', 'askiw' ),
				'zoom-in-right' => esc_attr__( 'zoom-in-right', 'askiw' ),
				'zoom-out' => esc_attr__( 'zoom-out', 'askiw' ),
				'zoom-out-up' => esc_attr__( 'zoom-out-up', 'askiw' ),
				'zoom-out-down' => esc_attr__( 'zoom-out-down', 'askiw' ),
				'zoom-out-left' => esc_attr__( 'zoom-out-left', 'askiw' ),
				'zoom-out-right' => esc_attr__( 'zoom-out-right', 'askiw' ),
				);
	return $array;
}
		function askiw__sanitize_animations( $input ) {
			$valid = askiw__animations();
			if ( array_key_exists( $input, $valid ) ) {
				return $input;
			} else {
				return '';
			}
		}
function askiw__animations_customize_register( $wp_customize ) {
		$wp_customize->add_panel( 'askiw__panel_animations' , array(
			'title'       => __( 'Animations', 'askiw' ),
			'priority'   => 1,
		) );
/************************************
* Animation Articles
************************************/
		$wp_customize->add_section( 'askiw__animations_section_articles' , array(
			'title'       => __( 'Animation Articles', 'askiw' ),
			'panel'       => 'askiw__panel_animations',
			'priority'   => 64,
		) );
		$wp_customize->add_setting( 'askiw__articles_animation', array (
			'sanitize_callback' => 'askiw__sanitize_animations',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'askiw__articles_animation', array(
			'label'    => __( 'Animation Articles', 'askiw' ),
			'section'  => 'askiw__animations_section_articles',
			'settings' => 'askiw__articles_animation',
			'type'     =>  'select',
            'choices'  => askiw__animations(),		
		) ) );
}
add_action( 'customize_register', 'askiw__animations_customize_register' );