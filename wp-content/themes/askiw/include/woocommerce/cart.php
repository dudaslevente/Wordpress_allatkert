<?php // Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit;
}
/**
* WooCommerce Cart
*/
	function askiw__wc_cart_count() {
		// Returns an empty string, if the cart item is not found
				global $woocommerce;
				$total = $woocommerce->cart->get_cart_total();
				$count = WC()->cart->cart_contents_count;	
				?><a title="<?php __('View your cart','askiw'); ?>" class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>"><?php
					if ( $count == 0 ) {
						?>
						<span class="cart-contents-count"> </span>
						<span class="my-cart">
							<span class="s-cart_num">0</span>
						</span>
						<?php            
					}		
					if ( $count == 1 ) {
						?>
						<span class="my-cart"><span class="s-cart_num"><?php echo esc_html( $count ); ?></span></span>
						<?php
					}
					if ( $count > 1 ) {
						?>
						<span class="my-cart"><span class="s-cart_num"><?php echo esc_html( $count ); ?></span></span>
						<?php
					}		
				?></a>
				<?php
	}
	add_action( 'askiw__header_woo_cart', 'askiw__wc_cart_count' );
	/**
	 * Ensure cart contents update when products are added to the cart via AJAX
	 */
	function askiw__header_add_to_cart_fragment( $fragments ) {
		ob_start();
			global $woocommerce;	
			$total = $woocommerce->cart->get_cart_total();
			$count = WC()->cart->cart_contents_count;
			?><a title="<?php __('View your cart','askiw'); ?>" class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>"><?php
				if ( $count == 0 ) {
					?>
					<span class="cart-contents-count"></span>
					<span class="my-cart">
						<span class="s-cart_num">0</span>
					</span>
					<?php            
				}
				if ( $count == 1 ) {
					?>
					<span class="my-cart"><span class="s-cart_num"><?php echo esc_html( $count ); ?></span></span>
					<?php            
				}
				if ( $count > 1 ) {
					?>
					<span class="my-cart"><span class="s-cart_num"><?php echo esc_html( $count ); ?></span></span>
					<?php
				}			
			?></a>
			<?php
		$fragments['a.cart-contents'] = ob_get_clean();
		return $fragments;
	}
	add_filter( 'woocommerce_add_to_cart_fragments', 'askiw__header_add_to_cart_fragment' );