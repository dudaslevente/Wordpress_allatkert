<?php
// Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit;
}
/**
 * The header for our theme
 *
 */
?>
<!DOCTYPE html>
<html itemscope itemtype="http://schema.org/WebPage" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
		<?php if ( function_exists( 'wp_body_open' ) ) { wp_body_open(); } else { do_action( 'wp_body_open' ); } ?>
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'askiw' ); ?></a>
		<?php askiw__header ();
		
		if ( get_theme_mod('askiw_home_activate_breadcrumb') and ( !is_front_page() || !is_home()) ) {
		    do_action('breadcrumbs');
		}
		
		if (get_theme_mod('askiw_home_page_breadcrumb') && (is_front_page() || is_home())) {
		    do_action('breadcrumbs');
		}
		
		if ( ( ( is_front_page() or is_home() ) and get_theme_mod( 'activate_photo_links' ) ) ) {
		    echo esc_html( askiw__photo_links() );
		}	?>	
		
		<div id="content" class="site-content">