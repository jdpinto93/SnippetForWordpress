<?php

//Mostrar la descripción de los cupones de WooCommerce en el frontend (carrito)

add_action('woocommerce_before_cart_totals', 'apply_product_on_coupon');
function apply_product_on_coupon() {
global $woocommerce;

if ( ! empty( $woocommerce->cart->applied_coupons ) ) {
$my_coupon = $woocommerce->cart->get_coupons() ;
foreach($my_coupon as $coupon){

if ( $post = get_post( $coupon->id ) ) {
if ( !empty( $post->post_excerpt ) ) {
echo "

".$coupon->code."";
echo "
".$post->post_excerpt."

";
				}
			}
		}
	}
}