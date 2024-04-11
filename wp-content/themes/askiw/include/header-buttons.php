<?php if( ! defined( 'ABSPATH' ) ) exit;
function askiw_customize_register_header_buttons( $wp_customize ) {
	
		$wp_customize->add_section( 'seos_header_buttons_section' , array(
			'title'       => __( 'Header Buttons', 'askiw' ),
			'priority'    => 2,	
			//'description' => __( 'Social media buttons', 'seos-white' ),
		) );
		
		$wp_customize->add_setting( 'button_1', array (
            'default' => ' Button 1',		
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'button_1', array(
			'label'    => __( 'Button 1 Text', 'askiw' ),
			'section'  => 'seos_header_buttons_section',			
			'settings' => 'button_1',
			'type' => 'text',
		) ) );
		
		$wp_customize->add_setting( 'button_1_link', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'button_1_link', array(
			'label'    => __( 'Button 1 URL', 'askiw' ),		
			'section'  => 'seos_header_buttons_section',
			'settings' => 'button_1_link',
		) ) );	
		
		$wp_customize->add_setting( 'button_2', array (
            'default' => ' Button 2',		
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'button_2', array(
			'label'    => __( 'Button 2 Text', 'askiw' ),
			'section'  => 'seos_header_buttons_section',			
			'settings' => 'button_2',
			'type' => 'text',
		) ) );
		
		$wp_customize->add_setting( 'button_2_link', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'button_2_link', array(
			'label'    => __( 'Button 2 URL', 'askiw' ),		
			'section'  => 'seos_header_buttons_section',
			'settings' => 'button_2_link',
		) ) );	
				
}
add_action( 'customize_register', 'askiw_customize_register_header_buttons' );


function askiw_buttons () {
	$button1 =  get_theme_mod( 'button_1', 'Button 1' );
	$button2 =  get_theme_mod( 'button_2', 'Button 2' );


	?>
	<?php if($button1) { ?>	
	<div class='fadeInLeft animated h-button-1'>	
		<a href='<?php echo esc_url(get_theme_mod( 'button_1_link' ) ); ?>'><?php  echo esc_html( get_theme_mod( 'button_1', 'Button 1' ), 'askiw' ); ?></a>
	</div>
	<?php } ?>
	<?php if($button2) { ?>	
	<div class='fadeInRight animated h-button-2'>	
		<a href='<?php echo esc_url(get_theme_mod( 'button_2_link' ) ); ?>'><?php echo esc_html( get_theme_mod( 'button_2', 'Button 2' ), 'askiw' ); ?></a>
	</div>
	<?php } ?>
<?php
}
add_action('askiw_buttons_header', 'askiw_buttons');