<?php if( ! defined( 'ABSPATH' ) ) exit;
function askiw__customize_register_content( $wp_customize ) {
/**
 * Recent Posts
 */
		$wp_customize->add_section( 'seos_content_section' , array(
			'title'       => __( 'Content Options', 'askiw' ),
			'priority'    => 2,	
			//'description' => __( 'Social media buttons', 'seos-white' ),
		) );
 		$wp_customize->add_setting( 'content_max_width', array (
            'default' => 1210,		
			'sanitize_callback' => 'absint',
		) );
		$wp_customize->add_control( 'content_max_width', array(
		  'type' => 'range',
		  'section' => 'seos_content_section',
		  'settings' => 'content_max_width',
		  'label' => __( 'Content max width', 'askiw' ),
		  'input_attrs' => array(
			'min' => 1210,
			'max' => 2000,
			'step' => 1,
		  ),
		) );
 		$wp_customize->add_setting( 'content_padding', array (
            'default' => 0,		
			'sanitize_callback' => 'absint',
		) );
		 $wp_customize->add_control( 'content_padding', array(
		  'type' => 'range',
		  'section' => 'seos_content_section',
		  'settings' => 'content_padding',
		  'label' => __( 'Content Padding', 'askiw' ),
		  'input_attrs' => array(
			'min' => 0,
			'max' => 100,
			'step' => 1,
		  ),
		) );
 		$wp_customize->add_setting( 'hide_home_content', array (
            'default' => '',		
			'sanitize_callback' => 'askiw__sanitize_checkbox',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hide_home_content', array(
			'label'    => __( 'Hide sidebar and content on home page', 'askiw' ),
			'section'  => 'seos_content_section',
			'priority'    => 1,				
			'settings' => 'hide_home_content',
			'type' => 'checkbox',
		) ) );
		
		$wp_customize->add_setting( 'hide_featured', array (
            'default' => '',		
			'sanitize_callback' => 'askiw__sanitize_checkbox',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hide_featured', array(
			'label'    => __( 'Show featured images on all single pages.', 'askiw' ),
			'section'  => 'seos_content_section',
			'priority'    => 1,				
			'settings' => 'hide_featured',
			'type' => 'checkbox',
		) ) );
		
 		$wp_customize->add_setting( 'article_font_size', array (
            'default' => '',		
			'sanitize_callback' => 'absint',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'article_font_size', array(
			'label'    => __( 'Article Font Size in px.', 'askiw' ),
			'section'  => 'seos_content_section',
			'priority'    => 1,				
			'settings' => 'article_font_size',
			'type' => 'number',
			'input_attrs'     => array(
				'min'  => 10,
				'max'  => 30,
				'step' => 1,
			),
		) ) );
		
 		$wp_customize->add_setting( 'article_justify', array (
            'default' => '',		
			'sanitize_callback' => 'askiw__sanitize_checkbox',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'article_justify', array(
			'label'    => __( 'Article Text Align - Justify', 'askiw' ),
			'section'  => 'seos_content_section',
			'priority'    => 1,				
			'settings' => 'article_justify',
			'type' => 'checkbox',
		) ) );		
		
}
add_action( 'customize_register', 'askiw__customize_register_content' );
/********************************************
* Content Styles
*********************************************/ 	
function askiw__content_styles () {
        $article_justify = esc_attr(get_theme_mod( 'article_justify' ) );
        $content_max_width = esc_attr(get_theme_mod( 'content_max_width' ) );
        $hide_home_content = esc_attr(get_theme_mod( 'hide_home_content' ) );
        $content_padding = esc_attr(get_theme_mod( 'content_padding' ) );
        $homepage_columns = esc_attr(get_theme_mod( 'homepage_columns' ) );
        $article_font_size = esc_attr(get_theme_mod( 'article_font_size' ) );
		if( $article_font_size ) { $article_font_size_style = "article, article p, article ul, article ol {font-size: {$article_font_size}px;}";} else {$article_font_size_style ="";}
		if( $article_justify ) { $article_justify_style = "body article, body article p {text-align: justify;}";} else {$article_justify_style ="";}
		if( $content_max_width ) { $content_max_width_style = "#content,.h-center {max-width: {$content_max_width}px !important;}";} else {$content_max_width_style ="";}
		if( $hide_home_content and ( is_front_page() ) ) { $hide_home_content_style = ".home #content #primary, .home #content #secondary {display: none !important;}";} else {$hide_home_content_style ="";}
		if( $content_padding ) { $content_padding_style = "#content,.h-center {padding: {$content_padding}px !important; overflow: hidden;}";} else {$content_padding_style ="";}
		if( $homepage_columns == "1" and is_home()) { $homepage_columns_style1 = ".home article {width: 100%;}";} else {$homepage_columns_style1 ="";}
		if( $homepage_columns == "2" and is_home()) { $homepage_columns_style2 = ".home article {width: 45%;}";} else {$homepage_columns_style2 ="";}
        wp_add_inline_style( 'custom-style-css', 
		$content_max_width_style.$hide_home_content_style.$content_padding_style.$homepage_columns_style1.$homepage_columns_style2.$article_font_size_style.$article_justify_style
		);
}
add_action( 'wp_enqueue_scripts', 'askiw__content_styles' );