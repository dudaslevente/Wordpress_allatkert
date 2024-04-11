<?php if( ! defined( 'ABSPATH' ) ) exit;
/**
 * Read More Button
 */
	function askiw__excerpt_more( $more ) {
		if ( is_admin() ) {
			return $more;
		}
        return '<p class="link-more"><a class="myButt " href="'. esc_url(get_permalink( get_the_ID() ) ) . '">' . askiw__return_read_more_text (). '</a></p>';
	}
	add_filter( 'excerpt_more', 'askiw__excerpt_more' );	
	function askiw__excerpt_length( $length ) {
			if ( is_admin() ) {
					return $length;
			}
			return 22;
	}
	add_filter( 'excerpt_length', 'askiw__excerpt_length', 999 );
	function askiw__return_read_more_text () {
		return __( 'Read More','askiw');
	}