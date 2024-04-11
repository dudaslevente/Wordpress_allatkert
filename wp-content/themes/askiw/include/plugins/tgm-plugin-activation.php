<?php
/**
 * Recommends plugins for use with the theme via the TGMA Script
 */
if( class_exists( 'WooCommerce' ) ) {
	function askiw__wp_tgmpa_register() {

		// Get array of recommended plugins
		$plugins = array(

			array(
				'name'				=> 'Invoice for WooCommerce',
				'slug'				=> 'invoice-for-woocommerce',
				'required'			=> false,
				'force_activation'	=> false,
			),

		);

		// Register notice
		tgmpa( $plugins, array(
			'id'           => 'askiw__wp_theme',
			'domain'       => 'askiw__wp',
			'menu'         => 'install-required-plugins',
			'has_notices'  => true,
			'is_automatic' => false,
			'dismissable'  => true,
		) );

	}
	add_action( 'tgmpa_register', 'askiw__wp_tgmpa_register' );
}