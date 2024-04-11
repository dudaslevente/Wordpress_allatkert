<?php
// Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_action( 'customize_register', 'askiw__header_top_customize_register' );
function askiw__header_top_customize_register( $wp_customize ) {
/***********************************************************************************
 * Back to top button Options
 ***********************************************************************************/
		$wp_customize->add_section( 'header_top' , array(
			'title'       => __( 'Header Top', 'askiw' ),
			'priority'   => 2,
		) );
		$wp_customize->add_setting( 'activate_header_top', array (
		    'default' => true,	
			'sanitize_callback' => 'askiw__sanitize_checkbox',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'activate_header_top', array(
			'priority'    => 1,
			'label'    => __( 'Activate Header Top', 'askiw' ),
			'section'  => 'header_top',
			'settings' => 'activate_header_top',
			'type' => 'checkbox',
		) ) );

 	    $wp_customize->add_setting( 'header_email', array (
		    'default' => 'email@seosthemes.com',	
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'header_email', array(
			'label'    => __( 'E-mail', 'askiw' ),
			'priority'    => 3,
			'section'  => 'header_top',
			'settings' => 'header_email',
			'type' => 'text',
		) ) );
 	    $wp_customize->add_setting( 'header_address', array (
			'default' => 'Str. 368',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'header_address', array(
			'label'    => __( 'Address', 'askiw' ),
			'priority'    => 3,
			'section'  => 'header_top',
			'settings' => 'header_address',
			'type' => 'text',
		) ) );
 	    $wp_customize->add_setting( 'header_phone', array (
			'default' => '+01234567890',		
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'header_phone', array(
			'label'    => __( 'Phone', 'askiw' ),
			'priority'    => 3,
			'section'  => 'header_top',
			'settings' => 'header_phone',
			'type' => 'text',
		) ) );
		$wp_customize->add_setting( 'askiw__header_search', array (
            'default' => true,		
			'sanitize_callback' => 'askiw__sanitize_checkbox',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'askiw__header_search', array(
			'label'    => __( 'Activate Search Icon:', 'askiw' ),
			'section'  => 'header_top',
			'priority'    => 3,				
			'settings' => 'askiw__header_search',
			'type' => 'checkbox',
		) ) );
		
		if( class_exists( 'WooCommerce' ) ) {
			$wp_customize->add_setting( 'askiw__header_cart', array (
				'default' => true,		
				'sanitize_callback' => 'askiw__sanitize_checkbox',
			) );
			$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'askiw__header_cart', array(
				'label'    => __( 'Activate WooCommerce Cart:', 'askiw' ),
				'section'  => 'header_top',
				'priority'    => 3,				
				'settings' => 'askiw__header_cart',
				'type' => 'checkbox',
			) ) );
		}
}		
	
	
function askiw__header () {
?>
<header class="site-header" itemscope="itemscope" itemtype="http://schema.org/WPHeader">
		<?php if ( get_theme_mod( 'activate_header_top', true ) ) { ?>
		<div class="header-top">
			<div id="top-contacts" class="before-header">
						<?php if (get_theme_mod('header_email', 'email@seosthemes.com')) { ?>
							<div class="h-email" itemprop="email"><a href="mailto:<?php echo esc_html( get_theme_mod( 'header_email', 'email@seosthemes.com') ); ?>"><span class="dashicons dashicons-email-alt"> </span> <?php echo esc_html( get_theme_mod( 'header_email', 'email@seosthemes.com') ); ?></a></div>
						<?php } ?>
						<?php if (get_theme_mod('header_address','Str. 368')) { ?>
							<div class="h-address" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress"><span class="dashicons dashicons-location"></span><?php echo esc_html( get_theme_mod( 'header_address','Str. 368') ); ?></div>
						<?php } ?>
						<?php if (get_theme_mod('header_phone','+01234567890')) { ?>
							<div class="h-phone" itemprop="telephone"><a href="tel:<?php echo esc_html( get_theme_mod( 'header_phone','+01234567890') ); ?>"><span class="dashicons dashicons-phone"> </span> <?php echo esc_html( get_theme_mod( 'header_phone','+01234567890') ); ?></a></div>
						<?php } ?>
						
						<div class="cont-mob">
						<?php
						if (get_theme_mod('askiw__header_search', true) ) {  do_action( 'askiw__header_search_top' ); }
						if (get_theme_mod('askiw__header_cart', true) ) { do_action( 'askiw__header_woo_cart' ); }
						?>	
						</div>
			</div>
		</div>
		<?php }	?>
	<?php if( !get_theme_mod( 'hide_menu' ) ) { ?>
	<div id="grid-top" class="grid-top">
		<!-- Site Navigation  -->
			<div class="header-right" itemprop="logo" itemscope="itemscope" itemtype="http://schema.org/Brand">
					<?php the_custom_logo(); ?>
			</div>	
		<button id="s-button-menu" class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><img alt="mobile" src="<?php echo esc_url(get_template_directory_uri() ) . '/images/mobile.jpg'; ?>"/></button>
		<div class="mobile-cont">
			<div class="mobile-logo" itemprop="logo" itemscope="itemscope" itemtype="http://schema.org/Brand">
					<?php the_custom_logo(); ?>
			</div>
		</div>

		<nav id="site-navigation" class="main-navigation">

			<button class="menu-toggle"><?php esc_html_e( 'Menu', 'askiw' ); ?></button>
			<?php wp_nav_menu( array( 
			'theme_location' => 'primary',
			'menu_id' => 'primary-menu'	
			) ); ?>
		</nav><!-- #site-navigation -->
		
	</div>
	<?php } ?>
	<!-- Header Image  -->
	<div class="all-header">
	    <div class="s-shadow"></div>
	    <div class="s-hidden">
			<?php if (get_theme_mod( 'header_image_position' ) == 'default' ) { ?>
			<img id="masthead" style="<?php askiw__heade_image_zoom_speed (); ?>" class="header-image" src='<?php echo esc_url(get_template_directory_uri() ) . '/images/header.webp'; ?>' alt="<?php esc_attr_e( 'header image','askiw' ); ?>"/>	
			<?php } ?>
			<?php if (get_theme_mod( 'header_image_position' ) == 'real' ) { ?>
			<img id="masthead" style="<?php askiw__heade_image_zoom_speed (); ?>" class="header-image" src='<?php if ( !is_home() and has_post_thumbnail() and get_post_meta( get_the_ID(), 'askiw__value_header_image', true ) ) { the_post_thumbnail_url(); } else { header_image(); } ?>' alt="<?php esc_attr_e( 'header image','askiw' ); ?>"/>	
			<?php } else { ?>
			<div id="masthead" class="header-image" style="<?php askiw__heade_image_zoom_speed (); ?> background-image: url( '<?php if (  !is_home() and has_post_thumbnail() and get_post_meta( get_the_ID(), 'askiw__value_header_image', true ) ) { the_post_thumbnail_url(); } else { header_image(); } ?>' );"></div>
			<?php } ?>
		</div>
		<div class="site-branding">
		<?php if ( display_header_text() == true ) { ?>
			<?php
			
			
			if ( is_front_page() && is_home() ) :
				?>
					<h1 id="site-title" class="site-title" itemscope itemtype="http://schema.org/Brand"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><span class="ml2"><?php bloginfo( 'name' ); ?></span></a></h1>
					<?php
				else :
					?>
					<p id="site-title" class="site-title" itemscope itemtype="http://schema.org/Brand"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><span class="ml2"><?php bloginfo( 'name' ); ?></span></a></p>
					<?php
				endif;
				$askiw__description = esc_html(get_bloginfo( 'description', 'display' ) );
				if ( $askiw__description || is_customize_preview() ) :
					?>    
					<p class="site-description" itemprop="headline">
						<span class="word"><?php echo esc_html($askiw__description); ?></span>
					</p>
				<?php endif; ?>	
		<?php } 
		    do_action('askiw_buttons_header'); 
		?>	
		</div>

		<!-- .site-branding -->
	</div>
</header>
<?php }